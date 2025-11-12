<?php
require_once 'config.php';

$db = getLanguageDB();

// Add theory_content column to lessons table
try {
    $db->exec("ALTER TABLE lessons ADD COLUMN theory_content TEXT");
    echo "✅ Tillagt 'theory_content' kolumn till lessons-tabellen\n";
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'duplicate column name') !== false) {
        echo "ℹ️  Kolumnen 'theory_content' finns redan\n";
    } else {
        echo "❌ Fel: " . $e->getMessage() . "\n";
    }
}
