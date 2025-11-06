<?php
require_once 'config.php';

if (isLoggedIn()) {
    redirect('dashboard.php');
}

$page_title = 'Registrera - ' . SITE_NAME;
include 'includes/header.php';
?>

<div class="auth-container">
    <div class="auth-card">
        <h1>Skapa ett konto</h1>
        <p class="auth-subtitle">Börja lära dig nederländska idag!</p>
        
        <form id="registerForm" class="auth-form">
            <div class="form-group">
                <label for="username">Användarnamn</label>
                <input type="text" id="username" name="username" required minlength="3" autocomplete="username">
            </div>
            
            <div class="form-group">
                <label for="email">E-post</label>
                <input type="email" id="email" name="email" required autocomplete="email">
                <small>E-post används endast för inloggning (ingen e-post skickas)</small>
            </div>
            
            <div class="form-group">
                <label for="password">Lösenord</label>
                <input type="password" id="password" name="password" required minlength="6" autocomplete="new-password">
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Bekräfta lösenord</label>
                <input type="password" id="confirm_password" name="confirm_password" required minlength="6" autocomplete="new-password">
            </div>
            
            <div id="message" class="message"></div>
            
            <button type="submit" class="btn btn-primary btn-block">Skapa konto</button>
        </form>
        
        <p class="auth-footer">
            Har du redan ett konto? <a href="login.php">Logga in här</a>
        </p>
    </div>
</div>

<script>
document.getElementById('registerForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const messageEl = document.getElementById('message');
    const submitBtn = e.target.querySelector('button[type="submit"]');
    
    // Disable button
    submitBtn.disabled = true;
    submitBtn.textContent = 'Skapar konto...';
    
    try {
        const response = await fetch('includes/register.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            messageEl.className = 'message success';
            messageEl.textContent = data.message;
            messageEl.style.display = 'block';
            setTimeout(() => window.location.href = data.redirect, 1000);
        } else {
            messageEl.className = 'message error';
            messageEl.textContent = data.message;
            messageEl.style.display = 'block';
            submitBtn.disabled = false;
            submitBtn.textContent = 'Skapa konto';
        }
    } catch (error) {
        console.error('Error:', error);
        messageEl.className = 'message error';
        messageEl.textContent = 'Ett fel uppstod. Försök igen.';
        messageEl.style.display = 'block';
        submitBtn.disabled = false;
        submitBtn.textContent = 'Skapa konto';
    }
});
</script>

<?php include 'includes/footer.php'; ?>
