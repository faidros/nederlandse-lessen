<?php
// Simple debug page to check database status
require_once 'config.php';

echo "<h1>Database Debug</h1>";

// Check Users Database
echo "<h2>Users Database</h2>";
try {
    $db = getUserDB();
    
    $stmt = $db->query("SELECT COUNT(*) as count FROM users");
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p>✅ Users table: {$count['count']} users</p>";
    
    $stmt = $db->query("SELECT * FROM users LIMIT 5");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($users);
    echo "</pre>";
    
    $stmt = $db->query("SELECT COUNT(*) as count FROM user_stats");
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p>User stats: {$count['count']} records</p>";
    
} catch (Exception $e) {
    echo "<p>❌ Error: " . $e->getMessage() . "</p>";
}

// Check Languages Database
echo "<h2>Languages Database</h2>";
try {
    $db = getLanguageDB();
    
    $stmt = $db->query("SELECT * FROM languages");
    $languages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<p>Languages: " . count($languages) . "</p>";
    echo "<pre>";
    print_r($languages);
    echo "</pre>";
    
    $stmt = $db->query("SELECT COUNT(*) as count FROM lessons");
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p>✅ Lessons table: {$count['count']} lessons</p>";
    
    $stmt = $db->query("SELECT COUNT(*) as count FROM exercises");
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p>✅ Exercises table: {$count['count']} exercises</p>";
    
    // Show first few lessons
    $stmt = $db->query("SELECT * FROM lessons LIMIT 5");
    $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3>First 5 Lessons:</h3>";
    echo "<pre>";
    print_r($lessons);
    echo "</pre>";
    
} catch (Exception $e) {
    echo "<p>❌ Error: " . $e->getMessage() . "</p>";
}

// Check Session
echo "<h2>Session Info</h2>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if (isLoggedIn()) {
    echo "<p>✅ User is logged in</p>";
    $user = getCurrentUser();
    echo "<pre>";
    print_r($user);
    echo "</pre>";
} else {
    echo "<p>❌ User is NOT logged in</p>";
}
