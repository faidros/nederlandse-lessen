<?php
require_once '../config.php';
requireAdmin();

$db_users = getUserDB();

// Get activity log
$stmt = $db_users->query("SELECT * FROM admin_log ORDER BY created_at DESC LIMIT 100");
$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$page_title = 'Aktivitetslogg - Admin - ' . SITE_NAME;
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
    font-size: 13px;
}

.admin-table th {
    text-align: left;
    padding: 12px;
    background: #f7f7f7;
    font-weight: 600;
}

.admin-table td {
    padding: 12px;
    border-bottom: 1px solid #eee;
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
        <h2>📋 Aktivitetslogg (senaste 100)</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Tidpunkt</th>
                    <th>Admin</th>
                    <th>Åtgärd</th>
                    <th>Detaljer</th>
                    <th>IP</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $log): ?>
                <tr>
                    <td><?php echo date('Y-m-d H:i:s', strtotime($log['created_at'])); ?></td>
                    <td><strong><?php echo htmlspecialchars($log['admin_username']); ?></strong></td>
                    <td><?php echo htmlspecialchars($log['action']); ?></td>
                    <td><?php echo htmlspecialchars($log['details']); ?></td>
                    <td><?php echo htmlspecialchars($log['ip_address']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
