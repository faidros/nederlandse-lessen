<?php
require_once 'config.php';
requireLogin();

// Simple admin check - first user is admin
$user = getCurrentUser();
if ($user['id'] != 1) {
    die('Only the first registered user has admin access.');
}

$db_lang = getLanguageDB();

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_language'])) {
        $code = trim($_POST['lang_code']);
        $name = trim($_POST['lang_name']);
        $emoji = trim($_POST['lang_emoji']);
        
        $stmt = $db_lang->prepare("INSERT INTO languages (code, name, flag_emoji, active) VALUES (?, ?, ?, 1)");
        $stmt->execute([$code, $name, $emoji]);
        $success_msg = "Språk '$name' tillagt!";
    }
}

// Get all languages
$stmt = $db_lang->query("SELECT * FROM languages ORDER BY id");
$languages = $stmt->fetchAll(PDO::FETCH_ASSOC);

$page_title = 'Admin - ' . SITE_NAME;
include 'includes/header.php';
?>

<div class="container" style="padding: 2rem 0;">
    <h1>Administratörspanel</h1>
    <p>Här kan du hantera språk och lektioner.</p>
    
    <?php if (isset($success_msg)): ?>
        <div class="message success" style="display: block;"><?php echo $success_msg; ?></div>
    <?php endif; ?>
    
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
        
        <!-- Add Language -->
        <div class="auth-card">
            <h2>Lägg till nytt språk</h2>
            <form method="POST" class="auth-form">
                <div class="form-group">
                    <label for="lang_code">Språkkod (t.ex. 'es', 'fr', 'de')</label>
                    <input type="text" id="lang_code" name="lang_code" required maxlength="5">
                </div>
                
                <div class="form-group">
                    <label for="lang_name">Språknamn</label>
                    <input type="text" id="lang_name" name="lang_name" required>
                </div>
                
                <div class="form-group">
                    <label for="lang_emoji">Flagg-emoji</label>
                    <input type="text" id="lang_emoji" name="lang_emoji" placeholder="🇪🇸">
                </div>
                
                <button type="submit" name="add_language" class="btn btn-primary btn-block">Lägg till språk</button>
            </form>
        </div>
        
        <!-- Current Languages -->
        <div class="auth-card">
            <h2>Befintliga språk</h2>
            <div style="margin-top: 1rem;">
                <?php foreach ($languages as $lang): ?>
                    <div style="padding: 1rem; background: var(--bg-light); border-radius: 8px; margin-bottom: 1rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <strong><?php echo $lang['flag_emoji']; ?> <?php echo htmlspecialchars($lang['name']); ?></strong>
                                <br>
                                <small>Kod: <?php echo htmlspecialchars($lang['code']); ?></small>
                            </div>
                            <div>
                                <?php
                                $stmt = $db_lang->prepare("SELECT COUNT(*) as count FROM lessons WHERE language_id = ?");
                                $stmt->execute([$lang['id']]);
                                $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
                                ?>
                                <span class="lesson-theme"><?php echo $count; ?> lektioner</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <!-- Quick Stats -->
    <div style="margin-top: 3rem;">
        <h2>Statistik</h2>
        <div class="stats-bar">
            <?php
            $stmt = $db_lang->query("SELECT COUNT(*) as count FROM languages WHERE active = 1");
            $lang_count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
            
            $stmt = $db_lang->query("SELECT COUNT(*) as count FROM lessons");
            $lesson_count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
            
            $stmt = $db_lang->query("SELECT COUNT(*) as count FROM exercises");
            $exercise_count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
            
            $db_users = getUserDB();
            $stmt = $db_users->query("SELECT COUNT(*) as count FROM users");
            $user_count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
            ?>
            
            <div class="stat-card">
                <div class="stat-icon">🌍</div>
                <div class="stat-info">
                    <div class="stat-label">Aktiva språk</div>
                    <div class="stat-number"><?php echo $lang_count; ?></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">📚</div>
                <div class="stat-info">
                    <div class="stat-label">Totalt antal lektioner</div>
                    <div class="stat-number"><?php echo $lesson_count; ?></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">✍️</div>
                <div class="stat-info">
                    <div class="stat-label">Totalt antal övningar</div>
                    <div class="stat-number"><?php echo $exercise_count; ?></div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-info">
                    <div class="stat-label">Registrerade användare</div>
                    <div class="stat-number"><?php echo $user_count; ?></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Instructions -->
    <div class="auth-card" style="margin-top: 2rem;">
        <h2>Hur man lägger till lektioner</h2>
        <ol style="line-height: 2;">
            <li>Skapa ett nytt PHP-skript baserat på <code>populate_lessons.php</code></li>
            <li>Ändra <code>$lang_id</code> till det nya språkets ID</li>
            <li>Skapa lektionsdata med övningar</li>
            <li>Kör skriptet för att lägga till lektionerna i databasen</li>
        </ol>
        <p><strong>Tips:</strong> Varje lektion bör ha 5-10 övningar av olika typer för bästa variation.</p>
    </div>
    
    <div style="margin: 2rem 0; text-align: center;">
        <a href="dashboard.php" class="btn btn-outline">← Tillbaka till Dashboard</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
