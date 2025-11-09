<?php
require_once '../config.php';
requireAdmin();

$db_users = getUserDB();
$db_lang = getLanguageDB();

// Get statistics
$stmt = $db_users->query("SELECT COUNT(*) as total FROM users");
$total_users = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $db_lang->query("SELECT COUNT(*) as total FROM lessons");
$total_lessons = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $db_lang->query("SELECT COUNT(*) as total FROM exercises");
$total_exercises = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $db_lang->query("SELECT COUNT(*) as total FROM languages WHERE active = 1");
$total_languages = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

// Recent activity
$stmt = $db_users->query("SELECT username, created_at FROM users ORDER BY created_at DESC LIMIT 5");
$recent_users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Most active users
$stmt = $db_users->query("
    SELECT u.username, SUM(us.lessons_completed) as total_completed 
    FROM users u 
    LEFT JOIN user_stats us ON u.id = us.user_id 
    GROUP BY u.id 
    ORDER BY total_completed DESC 
    LIMIT 5
");
$active_users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Lesson statistics - need to manually combine data from both databases
$all_lessons = $db_lang->query("SELECT id, title FROM lessons")->fetchAll(PDO::FETCH_ASSOC);
$popular_lessons = [];

foreach ($all_lessons as $lesson) {
    $stmt = $db_users->prepare("
        SELECT COUNT(DISTINCT user_id) as completions, AVG(score) as avg_score
        FROM user_progress 
        WHERE lesson_id = ? AND completed = 1
    ");
    $stmt->execute([$lesson['id']]);
    $stats = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($stats['completions'] > 0) {
        $popular_lessons[] = [
            'title' => $lesson['title'],
            'completions' => $stats['completions'],
            'avg_score' => $stats['avg_score']
        ];
    }
}

// Sort by completions and take top 10
usort($popular_lessons, function($a, $b) {
    return $b['completions'] - $a['completions'];
});
$popular_lessons = array_slice($popular_lessons, 0, 10);

$page_title = 'Admin Dashboard - ' . SITE_NAME;
include '../includes/header.php';
?>

<style>
.admin-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 30px 20px;
}

.admin-nav {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.admin-nav h1 {
    margin: 0 0 20px 0;
    color: #333;
}

.admin-nav-links {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.admin-nav-links a {
    padding: 10px 20px;
    background: #58cc02;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s;
}

.admin-nav-links a:hover {
    background: #46a302;
    transform: translateY(-2px);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-box {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.stat-box h3 {
    margin: 0 0 10px 0;
    color: #666;
    font-size: 14px;
    text-transform: uppercase;
}

.stat-box .big-number {
    font-size: 48px;
    font-weight: 800;
    color: #58cc02;
    margin: 10px 0;
}

.stat-box .stat-icon {
    font-size: 32px;
    margin-bottom: 10px;
}

.admin-section {
    background: white;
    padding: 25px;
    border-radius: 12px;
    margin-bottom: 25px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.admin-section h2 {
    margin: 0 0 20px 0;
    color: #333;
    border-bottom: 2px solid #58cc02;
    padding-bottom: 10px;
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
}

.admin-table th {
    text-align: left;
    padding: 12px;
    background: #f7f7f7;
    font-weight: 600;
    color: #333;
}

.admin-table td {
    padding: 12px;
    border-bottom: 1px solid #eee;
}

.admin-table tr:hover {
    background: #f9f9f9;
}

.badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

.badge-success {
    background: #d4edda;
    color: #155724;
}

.badge-warning {
    background: #fff3cd;
    color: #856404;
}

.badge-info {
    background: #d1ecf1;
    color: #0c5460;
}
</style>

<div class="admin-container">
    <div class="admin-nav">
        <h1>🔧 Admin Dashboard</h1>
        <div class="admin-nav-links">
            <a href="index.php">📊 Dashboard</a>
            <a href="users.php">👥 Användare</a>
            <a href="lessons.php">📚 Lektioner</a>
            <a href="languages.php">🌍 Språk</a>
            <a href="statistics.php">📈 Statistik</a>
            <a href="backup.php">💾 Backup</a>
            <a href="activity-log.php">📋 Aktivitetslogg</a>
            <a href="../dashboard.php">← Tillbaka till siten</a>
        </div>
    </div>

    <div class="stats-grid">
        <div class="stat-box">
            <div class="stat-icon">👥</div>
            <h3>Totalt användare</h3>
            <div class="big-number"><?php echo $total_users; ?></div>
        </div>
        <div class="stat-box">
            <div class="stat-icon">🌍</div>
            <h3>Aktiva språk</h3>
            <div class="big-number"><?php echo $total_languages; ?></div>
        </div>
        <div class="stat-box">
            <div class="stat-icon">📚</div>
            <h3>Totalt lektioner</h3>
            <div class="big-number"><?php echo $total_lessons; ?></div>
        </div>
        <div class="stat-box">
            <div class="stat-icon">✨</div>
            <h3>Totalt övningar</h3>
            <div class="big-number"><?php echo $total_exercises; ?></div>
        </div>
    </div>

    <div class="admin-section">
        <h2>👥 Senaste användare</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Användarnamn</th>
                    <th>Registrerad</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recent_users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo date('Y-m-d H:i', strtotime($user['created_at'])); ?></td>
                    <td><span class="badge badge-success">Aktiv</span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="admin-section">
        <h2>🏆 Mest aktiva användare</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Användarnamn</th>
                    <th>Slutförda lektioner</th>
                    <th>Nivå</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($active_users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo $user['total_completed'] ?? 0; ?></td>
                    <td>
                        <?php 
                        $completed = $user['total_completed'] ?? 0;
                        if ($completed >= 50) {
                            echo '<span class="badge badge-success">Expert</span>';
                        } elseif ($completed >= 20) {
                            echo '<span class="badge badge-info">Avancerad</span>';
                        } else {
                            echo '<span class="badge badge-warning">Nybörjare</span>';
                        }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="admin-section">
        <h2>📊 Populäraste lektioner</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Lektion</th>
                    <th>Antal slutföranden</th>
                    <th>Genomsnittspoäng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($popular_lessons as $lesson): ?>
                <tr>
                    <td><?php echo htmlspecialchars($lesson['title']); ?></td>
                    <td><?php echo $lesson['completions'] ?? 0; ?></td>
                    <td><?php echo $lesson['avg_score'] ? round($lesson['avg_score']) . '%' : 'N/A'; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
