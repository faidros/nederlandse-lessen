<?php
require_once 'config.php';

// Initialize Users Database
try {
    $db = getUserDB();
    $schema = file_get_contents(__DIR__ . '/database/init_users.sql');
    $db->exec($schema);
    echo "Users database initialized successfully.\n";
} catch (Exception $e) {
    die("Error initializing users database: " . $e->getMessage() . "\n");
}

// Initialize Languages Database
try {
    $db = getLanguageDB();
    $schema = file_get_contents(__DIR__ . '/database/init_languages.sql');
    $db->exec($schema);
    echo "Languages database initialized successfully.\n";
    
    // Insert Dutch language
    $stmt = $db->prepare("INSERT OR IGNORE INTO languages (code, name, flag_emoji, active) VALUES (?, ?, ?, ?)");
    $stmt->execute(['nl', 'Nederlands', '🇳🇱', 1]);
    echo "Dutch language added.\n";
    
} catch (Exception $e) {
    die("Error initializing languages database: " . $e->getMessage() . "\n");
}

echo "\nDatabase initialization complete!\n";
