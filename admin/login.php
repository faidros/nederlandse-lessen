<?php
require_once '../config.php';

// If already admin, redirect to dashboard
if (isAdmin()) {
    redirect('index.php');
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (loginAdmin($username, $password)) {
        logAdminActivity('login', 'Admin logged in');
        redirect('index.php');
    } else {
        $error = 'Felaktigt användarnamn eller lösenord.';
        logAdminActivity('failed_login', "Failed login attempt for username: $username");
    }
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .admin-login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .admin-login-box {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        
        .admin-login-box h1 {
            text-align: center;
            margin: 0 0 10px 0;
            color: #333;
            font-size: 28px;
        }
        
        .admin-login-box .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        
        .admin-logo {
            text-align: center;
            font-size: 64px;
            margin-bottom: 20px;
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="admin-login-container">
        <div class="admin-login-box">
            <div class="admin-logo">🔐</div>
            <h1>Admin Login</h1>
            <p class="subtitle"><?php echo SITE_NAME; ?> Administration</p>
            
            <?php if ($error): ?>
                <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Användarnamn</label>
                    <input type="text" id="username" name="username" class="form-input" required autofocus>
                </div>
                
                <div class="form-group">
                    <label for="password">Lösenord</label>
                    <input type="password" id="password" name="password" class="form-input" required>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;">Logga in</button>
            </form>
            
            <div style="margin-top: 20px; text-align: center;">
                <a href="../index.php" style="color: #666; text-decoration: none;">← Tillbaka till siten</a>
            </div>
        </div>
    </div>
</body>
</html>
