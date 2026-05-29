/**
 * About Page Scripts
 * Handles scroll animations
 */

document.addEventListener('DOMContentLoaded', () => {
    initAnimations();
});

function initAnimations() {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-in-view');
                obs.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const animElements = document.querySelectorAll('.ab-anim');
    animElements.forEach(el => observer.observe(el));
}
