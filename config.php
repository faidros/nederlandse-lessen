<?php
// Database configuration
define('DB_USERS', __DIR__ . '/database/users.db');
define('DB_LANGUAGES', __DIR__ . '/database/languages.db');

// Site configuration
define('SITE_NAME', 'Beyond');
define('BASE_URL', '/');

// Admin configuration
define('ADMIN_USERNAME', 'admin'); // Change this!
define('ADMIN_PASSWORD', '$2y$10$EFXPEziyTs1RmuMJxfnlvuyYEltFrHQjf8nnVa2srSKjXFfWZXW5i'); // Current: "admin123" - CHANGE THIS!

// Session configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 if using HTTPS
session_start();

// Helper functions
function getUserDB() {
    $db = new PDO('sqlite:' . DB_USERS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function getLanguageDB() {
    $db = new PDO('sqlite:' . DB_LANGUAGES);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    $db = getUserDB();
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function redirect($url) {
    header('Location: ' . $url);
    exit;
}

function isAdmin() {
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
}

function requireAdmin() {
    if (!isAdmin()) {
        header('Location: login.php');
        exit;
    }
}

function loginAdmin($username, $password) {
    if ($username === ADMIN_USERNAME && password_verify($password, ADMIN_PASSWORD)) {
        $_SESSION['is_admin'] = true;
        $_SESSION['admin_username'] = $username;
        return true;
    }
    return false;
}

function logAdminActivity($action, $details = '') {
    $db = getUserDB();
    $stmt = $db->prepare("INSERT INTO admin_log (admin_username, action, details, ip_address, created_at) VALUES (?, ?, ?, ?, datetime('now'))");
    $stmt->execute([
        $_SESSION['admin_username'] ?? 'unknown',
        $action,
        $details,
        $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ]);
}
