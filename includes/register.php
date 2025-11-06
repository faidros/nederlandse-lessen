<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Validation
if (empty($username) || empty($email) || empty($password)) {
    echo json_encode(['success' => false, 'message' => 'Alla fält måste fyllas i']);
    exit;
}

if (strlen($username) < 3) {
    echo json_encode(['success' => false, 'message' => 'Användarnamn måste vara minst 3 tecken']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Ogiltig e-postadress']);
    exit;
}

if (strlen($password) < 6) {
    echo json_encode(['success' => false, 'message' => 'Lösenord måste vara minst 6 tecken']);
    exit;
}

if ($password !== $confirm_password) {
    echo json_encode(['success' => false, 'message' => 'Lösenorden matchar inte']);
    exit;
}

try {
    $db = getUserDB();
    
    // Check if username or email already exists
    $stmt = $db->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    if ($stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Användarnamn eller e-post finns redan']);
        exit;
    }
    
    // Create user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $hashed_password]);
    
    $user_id = $db->lastInsertId();
    
    // Initialize user stats for all available languages
    $db_lang = getLanguageDB();
    $languages = $db_lang->query("SELECT id FROM languages WHERE active = 1")->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($languages as $lang) {
        $stmt = $db->prepare("INSERT INTO user_stats (user_id, language_id) VALUES (?, ?)");
        $stmt->execute([$user_id, $lang['id']]);
    }
    
    // Log user in
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    
    echo json_encode(['success' => true, 'message' => 'Konto skapat!', 'redirect' => 'dashboard.php']);
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Ett fel uppstod: ' . $e->getMessage()]);
}
