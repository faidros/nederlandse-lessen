<?php
require_once 'config.php';
requireLogin();

$user = getCurrentUser();
$db_users = getUserDB();
$db_lang = getLanguageDB();

// Get user stats (create if not exists)
$stmt = $db_users->prepare("SELECT * FROM user_stats WHERE user_id = ?");
$stmt->execute([$user['id']]);
$stats = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$stats) {
    // Create stats if they don't exist
    $stmt = $db_users->prepare("INSERT INTO user_stats (user_id) VALUES (?)");
    $stmt->execute([$user['id']]);
    $stmt = $db_users->prepare("SELECT * FROM user_stats WHERE user_id = ?");
    $stmt->execute([$user['id']]);
    $stats = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get Dutch language
$stmt = $db_lang->prepare("SELECT * FROM languages WHERE code = 'nl'");
$stmt->execute();
$language = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$language) {
    die('Nederlands språk inte hittat. Vänligen kör setup.php och populate_lessons.php.');
}

// Get all lessons
$stmt = $db_lang->prepare("SELECT * FROM lessons WHERE language_id = ? ORDER BY lesson_number");
$stmt->execute([$language['id']]);
$lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get user progress for each lesson
$stmt = $db_users->prepare("SELECT lesson_id, completed, score FROM user_progress WHERE user_id = ? AND language_id = ?");
$stmt->execute([$user['id'], $language['id']]);
$progress = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $progress[$row['lesson_id']] = $row;
}

$page_title = 'Dashboard - ' . SITE_NAME;
include 'includes/header.php';
?>

<div class="dashboard">
    <div class="container">
        <div class="dashboard-header">
            <h1>Hej, <?php echo htmlspecialchars($user['username']); ?>! 👋</h1>
            <p>Fortsätt din resa med nederländska</p>
        </div>
        
        <div class="stats-bar">
            <div class="stat-card">
                <div class="stat-icon">🎯</div>
                <div class="stat-info">
                    <div class="stat-label">Genomförda lektioner</div>
                    <div class="stat-number"><?php echo $stats['total_lessons_completed'] ?? 0; ?></div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📚</div>
                <div class="stat-info">
                    <div class="stat-label">Tillgängliga lektioner</div>
                    <div class="stat-number"><?php echo count($lessons); ?></div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">⚡</div>
                <div class="stat-info">
                    <div class="stat-label">Aktuell nivå</div>
                    <div class="stat-number">B1</div>
                </div>
            </div>
        </div>
        
        <div class="lessons-section">
            <h2>Dina lektioner</h2>
            
            <?php if (empty($lessons)): ?>
                <div class="empty-state">
                    <p>Inga lektioner tillgängliga ännu. Kolla tillbaka snart!</p>
                </div>
            <?php else: ?>
                <div class="lessons-grid">
                    <?php foreach ($lessons as $lesson): 
                        $isCompleted = isset($progress[$lesson['id']]) && $progress[$lesson['id']]['completed'];
                        $score = $isCompleted ? $progress[$lesson['id']]['score'] : 0;
                    ?>
                        <div class="lesson-card <?php echo $isCompleted ? 'completed' : ''; ?>">
                            <div class="lesson-number">Lektion <?php echo $lesson['lesson_number']; ?></div>
                            <div class="lesson-theme"><?php echo htmlspecialchars($lesson['theme']); ?></div>
                            <h3 class="lesson-title"><?php echo htmlspecialchars($lesson['title']); ?></h3>
                            <p class="lesson-description"><?php echo htmlspecialchars($lesson['description']); ?></p>
                            
                            <?php if ($isCompleted): ?>
                                <div class="lesson-status">
                                    <span class="status-badge completed">✓ Genomförd</span>
                                    <span class="lesson-score"><?php echo $score; ?>%</span>
                                </div>
                                <a href="lesson.php?id=<?php echo $lesson['id']; ?>" class="btn btn-outline btn-small">Öva igen</a>
                            <?php else: ?>
                                <a href="lesson.php?id=<?php echo $lesson['id']; ?>" class="btn btn-primary btn-small">Börja lektion</a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
