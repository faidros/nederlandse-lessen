<?php
require_once 'config.php';

if (isLoggedIn()) {
    redirect('dashboard.php');
}

$page_title = 'Logga in - ' . SITE_NAME;
include 'includes/header.php';
?>

<div class="auth-container">
    <div class="auth-card">
        <h1>Välkommen tillbaka!</h1>
        <p class="auth-subtitle">Logga in för att fortsätta lära dig</p>
        
        <form id="loginForm" class="auth-form">
            <div class="form-group">
                <label for="username">Användarnamn eller e-post</label>
                <input type="text" id="username" name="username" required autocomplete="username">
            </div>
            
            <div class="form-group">
                <label for="password">Lösenord</label>
                <input type="password" id="password" name="password" required autocomplete="current-password">
            </div>
            
            <div id="message" class="message"></div>
            
            <button type="submit" class="btn btn-primary btn-block">Logga in</button>
        </form>
        
        <p class="auth-footer">
            Har du inget konto? <a href="register.php">Registrera dig här</a>
        </p>
    </div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const messageEl = document.getElementById('message');
    const submitBtn = e.target.querySelector('button[type="submit"]');
    
    // Disable button
    submitBtn.disabled = true;
    submitBtn.textContent = 'Loggar in...';
    
    try {
        const response = await fetch('includes/login.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            messageEl.className = 'message success';
            messageEl.textContent = data.message;
            messageEl.style.display = 'block';
            setTimeout(() => window.location.href = data.redirect, 500);
        } else {
            messageEl.className = 'message error';
            messageEl.textContent = data.message;
            messageEl.style.display = 'block';
            submitBtn.disabled = false;
            submitBtn.textContent = 'Logga in';
        }
    } catch (error) {
        console.error('Error:', error);
        messageEl.className = 'message error';
        messageEl.textContent = 'Ett fel uppstod. Försök igen.';
        messageEl.style.display = 'block';
        submitBtn.disabled = false;
        submitBtn.textContent = 'Logga in';
    }
});
</script>

<?php include 'includes/footer.php'; ?>
