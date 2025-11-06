<?php
require_once 'config.php';
requireLogin();

$user = getCurrentUser();
$db_users = getUserDB();
$db_lang = getLanguageDB();

// Get selected language from session or default to Dutch
if (!isset($_SESSION['selected_language'])) {
    $_SESSION['selected_language'] = 'nl'; // Default to Dutch
}

// Handle language switching
if (isset($_GET['lang'])) {
    $lang_code = $_GET['lang'];
    $stmt = $db_lang->prepare("SELECT * FROM languages WHERE code = ? AND active = 1");
    $stmt->execute([$lang_code]);
    if ($stmt->fetch()) {
        $_SESSION['selected_language'] = $lang_code;
        header('Location: dashboard.php');
        exit;
    }
}

// Get all active languages
$stmt = $db_lang->prepare("SELECT * FROM languages WHERE active = 1 ORDER BY name");
$stmt->execute();
$available_languages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get selected language
$stmt = $db_lang->prepare("SELECT * FROM languages WHERE code = ?");
$stmt->execute([$_SESSION['selected_language']]);
$language = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$language) {
    die('Språk inte hittat. Vänligen välj ett språk.');
}

// Get user stats for this language (create if not exists)
$stmt = $db_users->prepare("SELECT * FROM user_stats WHERE user_id = ? AND language_id = ?");
$stmt->execute([$user['id'], $language['id']]);
$stats = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$stats) {
    // Create stats if they don't exist
    $stmt = $db_users->prepare("INSERT INTO user_stats (user_id, language_id) VALUES (?, ?)");
    $stmt->execute([$user['id'], $language['id']]);
    $stmt = $db_users->prepare("SELECT * FROM user_stats WHERE user_id = ? AND language_id = ?");
    $stmt->execute([$user['id'], $language['id']]);
    $stats = $stmt->fetch(PDO::FETCH_ASSOC);
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
            <p>Fortsätt din resa med <?php echo htmlspecialchars($language['name']); ?></p>
        </div>
        
        <!-- Language Switcher -->
        <?php if (count($available_languages) > 1): ?>
            <div class="language-switcher">
                <h3>Välj språk:</h3>
                <div class="language-buttons">
                    <?php foreach ($available_languages as $lang): ?>
                        <a href="dashboard.php?lang=<?php echo $lang['code']; ?>" 
                           class="language-btn <?php echo $lang['code'] === $language['code'] ? 'active' : ''; ?>">
                            <span class="language-flag"><?php echo $lang['flag_emoji']; ?></span>
                            <span class="language-name"><?php echo htmlspecialchars($lang['name']); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="stats-bar">
            <div class="stat-card">
                <div class="stat-icon">🎯</div>
                <div class="stat-info">
                    <div class="stat-label">Genomförda lektioner</div>
                    <div class="stat-number"><?php echo $stats['lessons_completed'] ?? 0; ?></div>
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
                    <div class="stat-number"><?php echo $language['code'] === 'nl' ? 'B1' : 'A2'; ?></div>
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
