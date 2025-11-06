<?php
require_once 'config.php';

echo "🔧 Fixar user_stats för befintliga användare...\n\n";

$db_users = getUserDB();
$db_lang = getLanguageDB();

try {
    // Get all users
    $users = $db_users->query("SELECT DISTINCT id FROM users")->fetchAll(PDO::FETCH_ASSOC);
    
    // Get all active languages
    $languages = $db_lang->query("SELECT id FROM languages WHERE active = 1")->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($users as $user) {
        foreach ($languages as $lang) {
            // Check if stats exist for this user-language combination
            $stmt = $db_users->prepare("SELECT id FROM user_stats WHERE user_id = ? AND language_id = ?");
            $stmt->execute([$user['id'], $lang['id']]);
            
            if (!$stmt->fetch()) {
                // Create missing stats
                $stmt = $db_users->prepare("INSERT INTO user_stats (user_id, language_id) VALUES (?, ?)");
                $stmt->execute([$user['id'], $lang['id']]);
                echo "✓ Skapade stats för user_id={$user['id']}, language_id={$lang['id']}\n";
            }
        }
    }
    
    echo "\n✅ Alla användare har nu stats för alla språk!\n";
    
} catch (Exception $e) {
    echo "\n❌ Fel: " . $e->getMessage() . "\n";
}
?>
