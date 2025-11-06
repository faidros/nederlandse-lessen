<?php
require_once __DIR__ . '/../config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isLoggedIn()) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$lesson_id = (int)($_POST['lesson_id'] ?? 0);
$score = (int)($_POST['score'] ?? 0);
$completed = (int)($_POST['completed'] ?? 0);

if (!$lesson_id) {
    echo json_encode(['success' => false, 'message' => 'Invalid lesson']);
    exit;
}

try {
    $db_users = getUserDB();
    $db_lang = getLanguageDB();
    $user_id = $_SESSION['user_id'];
    
    // Get language_id for this lesson
    $stmt = $db_lang->prepare("SELECT language_id FROM lessons WHERE id = ?");
    $stmt->execute([$lesson_id]);
    $lesson = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$lesson) {
        echo json_encode(['success' => false, 'message' => 'Lesson not found']);
        exit;
    }
    
    // Check if progress exists
    $stmt = $db_users->prepare("SELECT id, completed FROM user_progress WHERE user_id = ? AND lesson_id = ?");
    $stmt->execute([$user_id, $lesson_id]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($existing) {
        // Update existing progress
        $stmt = $db_users->prepare("UPDATE user_progress SET score = ?, completed = ?, completed_at = CURRENT_TIMESTAMP WHERE id = ?");
        $stmt->execute([$score, $completed, $existing['id']]);
        
        // If newly completed, update stats for this language
        if ($completed && !$existing['completed']) {
            $stmt = $db_users->prepare("UPDATE user_stats SET lessons_completed = lessons_completed + 1, last_activity_date = DATE('now') WHERE user_id = ? AND language_id = ?");
            $stmt->execute([$user_id, $lesson['language_id']]);
        }
    } else {
        // Insert new progress
        $stmt = $db_users->prepare("INSERT INTO user_progress (user_id, language_id, lesson_id, score, completed, completed_at) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)");
        $stmt->execute([$user_id, $lesson['language_id'], $lesson_id, $score, $completed]);
        
        // Update stats if completed
        if ($completed) {
            $stmt = $db_users->prepare("UPDATE user_stats SET lessons_completed = lessons_completed + 1, last_activity_date = DATE('now') WHERE user_id = ? AND language_id = ?");
            $stmt->execute([$user_id, $lesson['language_id']]);
        }
    }
    
    echo json_encode(['success' => true, 'message' => 'Progress saved']);
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
