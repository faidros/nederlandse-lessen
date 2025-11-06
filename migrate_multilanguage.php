<?php
require_once 'config.php';

echo "🔄 Migrerar databas för flerspråksstöd...\n\n";

$db_users = getUserDB();
$db_lang = getLanguageDB();

try {
    // Start transaction
    $db_users->beginTransaction();
    
    // 1. Create new user_stats table with language_id
    echo "1. Skapar ny user_stats tabell med language_id...\n";
    $db_users->exec("
        CREATE TABLE user_stats_new (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            language_id INTEGER NOT NULL,
            lessons_completed INTEGER DEFAULT 0,
            total_xp INTEGER DEFAULT 0,
            current_streak INTEGER DEFAULT 0,
            longest_streak INTEGER DEFAULT 0,
            last_activity_date DATE,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            UNIQUE(user_id, language_id)
        )
    ");
    
    // 2. Get Dutch language ID
    $stmt = $db_lang->query("SELECT id FROM languages WHERE code = 'nl'");
    $dutch = $stmt->fetch(PDO::FETCH_ASSOC);
    $dutch_id = $dutch['id'];
    
    echo "2. Nederländska språk-ID: {$dutch_id}\n";
    
    // 3. Migrate existing data to new table (all old stats go to Dutch)
    echo "3. Migrerar befintlig data till nederländska...\n";
    $db_users->exec("
        INSERT INTO user_stats_new (user_id, language_id, lessons_completed, current_streak, longest_streak, last_activity_date)
        SELECT user_id, {$dutch_id}, total_lessons_completed, current_streak, longest_streak, last_activity_date
        FROM user_stats
    ");
    
    // 4. Drop old table and rename new one
    echo "4. Byter ut gamla tabellen...\n";
    $db_users->exec("DROP TABLE user_stats");
    $db_users->exec("ALTER TABLE user_stats_new RENAME TO user_stats");
    
    // 5. Update user_progress table to include language_id if needed
    echo "5. Kollar user_progress tabell...\n";
    $columns = $db_users->query("PRAGMA table_info(user_progress)")->fetchAll(PDO::FETCH_ASSOC);
    $has_language_id = false;
    foreach ($columns as $col) {
        if ($col['name'] === 'language_id') {
            $has_language_id = true;
            break;
        }
    }
    
    if (!$has_language_id) {
        echo "6. Lägger till language_id i user_progress...\n";
        
        // Create new user_progress table
        $db_users->exec("
            CREATE TABLE user_progress_new (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                lesson_id INTEGER NOT NULL,
                language_id INTEGER NOT NULL,
                completed BOOLEAN DEFAULT 0,
                score INTEGER DEFAULT 0,
                attempts INTEGER DEFAULT 0,
                last_attempt DATETIME,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                UNIQUE(user_id, lesson_id)
            )
        ");
        
        // Migrate data - get lesson_id's language from lessons table
        $progress_rows = $db_users->query("SELECT * FROM user_progress")->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($progress_rows as $row) {
            // Get language_id for this lesson
            $stmt = $db_lang->prepare("SELECT language_id FROM lessons WHERE id = ?");
            $stmt->execute([$row['lesson_id']]);
            $lesson = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($lesson) {
                $stmt = $db_users->prepare("
                    INSERT INTO user_progress_new 
                    (user_id, lesson_id, language_id, completed, score, attempts, last_attempt, created_at)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
                ");
                $stmt->execute([
                    $row['user_id'],
                    $row['lesson_id'],
                    $lesson['language_id'],
                    $row['completed'],
                    $row['score'],
                    $row['attempts'],
                    $row['last_attempt'],
                    $row['created_at']
                ]);
            }
        }
        
        // Drop old and rename new
        $db_users->exec("DROP TABLE user_progress");
        $db_users->exec("ALTER TABLE user_progress_new RENAME TO user_progress");
        
        echo "✓ user_progress uppdaterad\n";
    } else {
        echo "✓ user_progress har redan language_id\n";
    }
    
    // Commit transaction
    $db_users->commit();
    
    echo "\n✅ Migration klar!\n";
    echo "Databasen stöder nu flera språk.\n";
    
} catch (Exception $e) {
    $db_users->rollBack();
    echo "\n❌ Fel vid migration: " . $e->getMessage() . "\n";
    exit(1);
}
?>
