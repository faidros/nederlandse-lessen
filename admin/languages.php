<?php
require_once '../config.php';
requireAdmin();

$db_lang = getLanguageDB();

// Get all languages
$languages = $db_lang->query("SELECT * FROM languages ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

$page_title = 'Språk - Admin - ' . SITE_NAME;
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
        <h2>🌍 Alla språk</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Flagga</th>
                    <th>Namn</th>
                    <th>Kod</th>
                    <th>Status</th>
                    <th>Skapad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($languages as $lang): ?>
                <tr>
                    <td style="font-size: 32px;"><?php echo $lang['flag_emoji']; ?></td>
                    <td><strong><?php echo htmlspecialchars($lang['name']); ?></strong></td>
                    <td><?php echo htmlspecialchars($lang['code']); ?></td>
                    <td><?php echo $lang['active'] ? '✅ Aktivt' : '❌ Inaktivt'; ?></td>
                    <td><?php echo date('Y-m-d', strtotime($lang['created_at'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
