<?php
require_once '../config.php';
requireAdmin();

$message = '';

// Handle backup export
if (isset($_POST['export_users'])) {
    $filename = 'users_backup_' . date('Y-m-d_His') . '.db';
    $filepath = __DIR__ . '/../database/users.db';
    
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . filesize($filepath));
    readfile($filepath);
    
    logAdminActivity('export_backup', 'Exported users database');
    exit;
}

if (isset($_POST['export_languages'])) {
    $filename = 'languages_backup_' . date('Y-m-d_His') . '.db';
    $filepath = __DIR__ . '/../database/languages.db';
    
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Length: ' . filesize($filepath));
    readfile($filepath);
    
    logAdminActivity('export_backup', 'Exported languages database');
    exit;
}

$page_title = 'Backup - Admin - ' . SITE_NAME;
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
    margin-bottom: 20px;
}

.admin-section h2 {
    margin: 0 0 20px 0;
    color: #333;
    border-bottom: 2px solid #58cc02;
    padding-bottom: 10px;
}

.backup-card {
    padding: 20px;
    border: 2px solid #ddd;
    border-radius: 8px;
    margin-bottom: 15px;
}

.backup-card h3 {
    margin: 0 0 10px 0;
    color: #333;
}

.backup-card p {
    color: #666;
    margin-bottom: 15px;
}

.warning-box {
    background: #fff3cd;
    border: 1px solid #ffc107;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.warning-box h3 {
    margin: 0 0 10px 0;
    color: #856404;
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
        <h2>💾 Backup & Export</h2>
        
        <div class="warning-box">
            <h3>⚠️ Viktigt!</h3>
            <p>Spara backups på en säker plats. Dessa filer innehåller all användardata och lektionsinnehåll.</p>
        </div>
        
        <div class="backup-card">
            <h3>👥 Användardatabas</h3>
            <p>Innehåller: Användare, progress, statistik, admin-logg</p>
            <p><strong>Storlek:</strong> <?php echo round(filesize(__DIR__ . '/../database/users.db') / 1024, 2); ?> KB</p>
            <form method="POST" style="display: inline;">
                <button type="submit" name="export_users" class="btn btn-primary">📥 Ladda ner users.db</button>
            </form>
        </div>
        
        <div class="backup-card">
            <h3>🌍 Språkdatabas</h3>
            <p>Innehåller: Språk, lektioner, övningar</p>
            <p><strong>Storlek:</strong> <?php echo round(filesize(__DIR__ . '/../database/languages.db') / 1024, 2); ?> KB</p>
            <form method="POST" style="display: inline;">
                <button type="submit" name="export_languages" class="btn btn-primary">📥 Ladda ner languages.db</button>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
