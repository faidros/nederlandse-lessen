<?php
require_once '../config.php';
requireAdmin();

$db_lang = getLanguageDB();

// Handle lesson deletion
if (isset($_POST['delete_lesson'])) {
    $lesson_id = (int)$_POST['lesson_id'];
    $stmt = $db_lang->prepare("SELECT title FROM lessons WHERE id = ?");
    $stmt->execute([$lesson_id]);
    $lesson = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($lesson) {
        // Delete exercises first
        $db_lang->prepare("DELETE FROM exercises WHERE lesson_id = ?")->execute([$lesson_id]);
        $db_lang->prepare("DELETE FROM lessons WHERE id = ?")->execute([$lesson_id]);
        
        logAdminActivity('delete_lesson', "Deleted lesson: {$lesson['title']} (ID: $lesson_id)");
        $success = "Lektion '{$lesson['title']}' har tagits bort.";
    }
}

// Get filter parameters
$language_filter = isset($_GET['language']) ? (int)$_GET['language'] : null;
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Get all languages for filter
$languages = $db_lang->query("SELECT * FROM languages WHERE active = 1 ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

// Build query
$query = "SELECT l.*, lg.name as language_name, lg.flag_emoji, 
          (SELECT COUNT(*) FROM exercises WHERE lesson_id = l.id) as exercise_count
          FROM lessons l 
          JOIN languages lg ON l.language_id = lg.id 
          WHERE 1=1";

$params = [];

if ($language_filter) {
    $query .= " AND l.language_id = ?";
    $params[] = $language_filter;
}

if ($search) {
    $query .= " AND (l.title LIKE ? OR l.theme LIKE ? OR l.description LIKE ?)";
    $searchParam = "%$search%";
    $params[] = $searchParam;
    $params[] = $searchParam;
    $params[] = $searchParam;
}

$query .= " ORDER BY lg.name, l.lesson_number";

$stmt = $db_lang->prepare($query);
$stmt->execute($params);
$lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);

$page_title = 'Lektioner - Admin - ' . SITE_NAME;
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

.filters {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.filters select,
.filters input {
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
}

.filters input[type="text"] {
    flex: 1;
    min-width: 250px;
}

.filters button {
    padding: 10px 20px;
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

.btn-info {
    background: #17a2b8;
}

.btn-info:hover {
    background: #138496;
}

.success-message {
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    border: 1px solid #c3e6cb;
}

.lesson-actions {
    display: flex;
    gap: 5px;
}

.badge {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
}

.badge-success {
    background: #d4edda;
    color: #155724;
}

.btn-create {
    background: #28a745;
    color: white;
    padding: 12px 24px;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 20px;
}

.btn-create:hover {
    background: #218838;
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
        <h2>📚 Alla lektioner (<?php echo count($lessons); ?>)</h2>
        
        <?php if (isset($success)): ?>
            <div class="success-message"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        
        <a href="edit-lesson.php" class="btn-create">➕ Skapa ny lektion</a>
        
        <form method="GET" class="filters">
            <select name="language" onchange="this.form.submit()">
                <option value="">Alla språk</option>
                <?php foreach ($languages as $lang): ?>
                    <option value="<?php echo $lang['id']; ?>" <?php echo $language_filter == $lang['id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($lang['flag_emoji'] . ' ' . $lang['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <input type="text" name="search" placeholder="Sök lektion..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary">🔍 Sök</button>
            <?php if ($language_filter || $search): ?>
                <a href="lessons.php" class="btn btn-outline">✕ Rensa filter</a>
            <?php endif; ?>
        </form>
        
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Språk</th>
                    <th>#</th>
                    <th>Titel</th>
                    <th>Tema</th>
                    <th>Beskrivning</th>
                    <th>Övningar</th>
                    <th>Åtgärder</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lessons as $lesson): ?>
                <tr>
                    <td><?php echo $lesson['flag_emoji']; ?> <?php echo htmlspecialchars($lesson['language_name']); ?></td>
                    <td><strong><?php echo $lesson['lesson_number']; ?></strong></td>
                    <td><strong><?php echo htmlspecialchars($lesson['title']); ?></strong></td>
                    <td><span class="badge badge-success"><?php echo htmlspecialchars($lesson['theme']); ?></span></td>
                    <td><?php echo htmlspecialchars(substr($lesson['description'], 0, 60)) . '...'; ?></td>
                    <td><?php echo $lesson['exercise_count']; ?> övningar</td>
                    <td>
                        <div class="lesson-actions">
                            <a href="edit-lesson.php?id=<?php echo $lesson['id']; ?>" class="btn btn-info btn-small">✏️ Redigera</a>
                            <form method="POST" style="display: inline;" onsubmit="return confirm('Är du SÄKER på att du vill ta bort denna lektion och alla dess övningar? Detta kan inte ångras!');">
                                <input type="hidden" name="lesson_id" value="<?php echo $lesson['id']; ?>">
                                <button type="submit" name="delete_lesson" class="btn btn-danger btn-small">🗑️ Ta bort</button>
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
