<?php
require_once 'config.php';

echo "🔄 Synkar lessons_completed från user_progress till user_stats...\n\n";

$db_users = getUserDB();
$db_lang = getLanguageDB();

try {
    // Get all languages
    $languages = $db_lang->query("SELECT id FROM languages WHERE active = 1")->fetchAll(PDO::FETCH_ASSOC);
    
    // Get all users
    $users = $db_users->query("SELECT DISTINCT id FROM users")->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($users as $user) {
        foreach ($languages as $lang) {
            // Count completed lessons for this user and language
            $stmt = $db_users->prepare("
                SELECT COUNT(*) as count 
                FROM user_progress 
                WHERE user_id = ? AND language_id = ? AND completed = 1
            ");
            $stmt->execute([$user['id'], $lang['id']]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $completed_count = $result['count'];
            
            // Update user_stats
            $stmt = $db_users->prepare("
                UPDATE user_stats 
                SET lessons_completed = ? 
                WHERE user_id = ? AND language_id = ?
            ");
            $stmt->execute([$completed_count, $user['id'], $lang['id']]);
            
            if ($completed_count > 0) {
                echo "✓ User {$user['id']}, Language {$lang['id']}: {$completed_count} lessons completed\n";
            }
        }
    }
    
    echo "\n✅ Synkronisering klar!\n";
    
} catch (Exception $e) {
    echo "\n❌ Fel: " . $e->getMessage() . "\n";
}
?>
