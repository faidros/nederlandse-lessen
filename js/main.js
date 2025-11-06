// Main JavaScript file for Nederlandse Lessen

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

// Add animation class when elements come into view
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
        }
    });
}, observerOptions);

document.querySelectorAll('.feature-card, .lesson-card').forEach(el => {
    observer.observe(el);
});

// Keyboard shortcuts
document.addEventListener('keydown', (e) => {
    // Press 'Escape' to go back
    if (e.key === 'Escape') {
        const backButton = document.querySelector('.back-button');
        if (backButton) {
            backButton.click();
        }
    }
});

console.log('🇳🇱 Nederlandse Lessen loaded successfully!');
