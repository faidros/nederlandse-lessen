<?php
require_once '../config.php';
requireAdmin();

$db_users = getUserDB();
$db_lang = getLanguageDB();

// Handle user deletion
if (isset($_POST['delete_user'])) {
    $user_id = (int)$_POST['user_id'];
    $stmt = $db_users->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        // Delete user progress and stats
        $db_users->prepare("DELETE FROM user_progress WHERE user_id = ?")->execute([$user_id]);
        $db_users->prepare("DELETE FROM user_stats WHERE user_id = ?")->execute([$user_id]);
        $db_users->prepare("DELETE FROM users WHERE id = ?")->execute([$user_id]);
        
        logAdminActivity('delete_user', "Deleted user: {$user['username']} (ID: $user_id)");
        $success = "Användare '{$user['username']}' har tagits bort.";
    }
}

// Handle reset progress
if (isset($_POST['reset_progress'])) {
    $user_id = (int)$_POST['user_id'];
    $stmt = $db_users->prepare("SELECT username FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        $db_users->prepare("DELETE FROM user_progress WHERE user_id = ?")->execute([$user_id]);
        $db_users->prepare("UPDATE user_stats SET lessons_completed = 0, total_xp = 0, current_streak = 0 WHERE user_id = ?")->execute([$user_id]);
        
        logAdminActivity('reset_progress', "Reset progress for user: {$user['username']} (ID: $user_id)");
        $success = "Progress återställd för '{$user['username']}'.";
    }
}

// Get all users with stats
$stmt = $db_users->query("
    SELECT 
        u.id,
        u.username,
        u.email,
        u.created_at,
        SUM(us.lessons_completed) as total_completed,
        SUM(us.total_xp) as total_xp,
        MAX(us.current_streak) as best_streak,
        MAX(us.last_activity_date) as last_active
    FROM users u
    LEFT JOIN user_stats us ON u.id = us.user_id
    GROUP BY u.id
    ORDER BY u.created_at DESC
");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$page_title = 'Användare - Admin - ' . SITE_NAME;
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
}

.admin-nav-links a:hover {
    background: #46a302;
}

.admin-section {
    background: white;
    padding: 25px;
    border-radius: 12px;
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

.btn-small {
    padding: 6px 12px;
    font-size: 13px;
    margin: 0 5px;
}

.btn-danger {
    background: #dc3545;
}

.btn-danger:hover {
    background: #c82333;
}

.btn-warning {
    background: #ffc107;
    color: #000;
}

.btn-warning:hover {
    background: #e0a800;
}

.success-message {
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    border: 1px solid #c3e6cb;
}

.user-actions {
    display: flex;
    gap: 5px;
}
</style>

<div class="admin-container">
    <div class="admin-nav">
        <div class="admin-nav-links">
            <a href="index.php">📊 Dashboard</a>
            <a href="users.php">👥 Användare</a>
            <a href="lessons.php">📚 Lektioner</a>
            <a href="languages.php">🌍 Språk</a>
            <a href="backup.php">💾 Backup</a>
            <a href="activity-log.php">📋 Aktivitetslogg</a>
        </div>
    </div>

    <div class="admin-section">
        <h2>👥 Alla användare (<?php echo count($users); ?>)</h2>
        
        <?php if (isset($success)): ?>
            <div class="success-message"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Användarnamn</th>
                    <th>Email</th>
                    <th>Registrerad</th>
                    <th>Slutförda</th>
                    <th>XP</th>
                    <th>Streak</th>
                    <th>Senast aktiv</th>
                    <th>Åtgärder</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><strong><?php echo htmlspecialchars($user['username']); ?></strong></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo date('Y-m-d', strtotime($user['created_at'])); ?></td>
                    <td><?php echo $user['total_completed'] ?? 0; ?></td>
                    <td><?php echo $user['total_xp'] ?? 0; ?></td>
                    <td><?php echo $user['best_streak'] ?? 0; ?> 🔥</td>
                    <td><?php echo $user['last_active'] ?? 'Aldrig'; ?></td>
                    <td>
                        <div class="user-actions">
                            <form method="POST" style="display: inline;" onsubmit="return confirm('Är du säker på att du vill återställa denna användares progress?');">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="reset_progress" class="btn btn-warning btn-small">🔄 Återställ</button>
                            </form>
                            <form method="POST" style="display: inline;" onsubmit="return confirm('Är du SÄKER på att du vill ta bort denna användare? Detta kan inte ångras!');">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="delete_user" class="btn btn-danger btn-small">🗑️ Ta bort</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
