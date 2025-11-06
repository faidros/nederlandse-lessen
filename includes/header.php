<?php
// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? SITE_NAME; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <a href="<?php echo isLoggedIn() ? 'dashboard.php' : 'index.php'; ?>">
                    🇳🇱 <span><?php echo SITE_NAME; ?></span>
                </a>
            </div>
            <div class="nav-menu">
                <?php if (isLoggedIn()): 
                    $user = getCurrentUser();
                    $db = getUserDB();
                    // Get total lessons completed across all languages
                    $stmt = $db->prepare("SELECT SUM(lessons_completed) as total FROM user_stats WHERE user_id = ?");
                    $stmt->execute([$user['id']]);
                    $stats = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div class="user-stats">
                        <span class="stat-item">
                            <span class="stat-icon">🏆</span>
                            <span class="stat-value"><?php echo $stats['total'] ?? 0; ?></span>
                        </span>
                    </div>
                    <div class="user-menu">
                        <span class="username">👤 <?php echo htmlspecialchars($user['username']); ?></span>
                        <a href="logout.php" class="btn btn-outline">Logga ut</a>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline">Logga in</a>
                    <a href="register.php" class="btn btn-primary">Registrera</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <main class="main-content">
