<?php
require_once 'config.php';

if (isLoggedIn()) {
    redirect('dashboard.php');
}

$page_title = 'Välkommen - ' . SITE_NAME;
include 'includes/header.php';
?>

<div class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Lär dig nederländska på B1-nivå</h1>
            <p class="hero-subtitle">Gratis, roligt och effektivt språklärande</p>
            <div class="hero-features">
                <div class="feature">
                    <span class="feature-icon">📚</span>
                    <span>60 lektioner</span>
                </div>
                <div class="feature">
                    <span class="feature-icon">✨</span>
                    <span>300 övningar</span>
                </div>
                <div class="feature">
                    <span class="feature-icon">🎯</span>
                    <span>B1-nivå</span>
                </div>
                <div class="feature">
                    <span class="feature-icon">📱</span>
                    <span>Mobilanpassad</span>
                </div>
            </div>
            <div class="hero-cta">
                <a href="register.php" class="btn btn-primary btn-large">Kom igång gratis</a>
                <a href="login.php" class="btn btn-outline btn-large">Har du redan ett konto?</a>
            </div>
        </div>
        <div class="hero-image">
            <div class="mascot">🇳🇱</div>
        </div>
    </div>
</div>

<div class="features-section">
    <div class="container">
        <h2>Varför välja våra nederländska lektioner?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-card-icon">✍️</div>
                <h3>Varierade övningar</h3>
                <p>Flervalsfrågor, översättningar, matchning, ordbyggnad och idiom med förklaringar</p>
            </div>
            <div class="feature-card">
                <div class="feature-card-icon">📊</div>
                <h3>Följ din framsteg</h3>
                <p>Se hur många lektioner du har slutfört och ditt resultat över alla 60 lektioner</p>
            </div>
            <div class="feature-card">
                <div class="feature-card-icon">🎨</div>
                <h3>Tematiska lektioner</h3>
                <p>Idiomatiska uttryck, grammatik och verkliga situationer som resande, shopping, jobb</p>
            </div>
            <div class="feature-card">
                <div class="feature-card-icon">�</div>
                <h3>Hjälp när du behöver</h3>
                <p>Använd ledtrådsknappar, få förklaringar när du svarar fel och lär dig av misstag</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
