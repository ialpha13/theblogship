/**
 * Navbar Interactions
 * Handles mobile menu toggle and scroll behavior
 */

document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('ms-navbar');
    const menuBtn = document.getElementById('ms-menu-toggle');
    const mobileMenu = document.getElementById('ms-mobile-menu');
    const overlay = document.getElementById('ms-nav-overlay');
    
    let lastScrollY = window.scrollY;
    let isMenuOpen = false;

    // Toggle Menu Function
    function toggleMenu() {
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
            mobileMenu.classList.add('open');
            overlay.classList.add('open');
            menuBtn.setAttribute('aria-expanded', 'true');
            menuBtn.innerHTML = '<i class="ri-close-line"></i>';
        } else {
            mobileMenu.classList.remove('open');
            overlay.classList.remove('open');
            menuBtn.setAttribute('aria-expanded', 'false');
            menuBtn.innerHTML = '<i class="ri-menu-3-line"></i>';
        }
    }

    // Event Listeners
    if (menuBtn) menuBtn.addEventListener('click', toggleMenu);
    if (overlay) overlay.addEventListener('click', toggleMenu);

    // Scroll Behavior
    window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;
        
        // Add background when scrolled
        if (currentScrollY > 20) {
            navbar.classList.add('is-scrolled');
        } else {
            navbar.classList.remove('is-scrolled');
        }

        // Hide/Show on scroll (Mobile only preference, but good for all)
        // Only hide if we've scrolled down a bit and menu is closed
        if (currentScrollY > 100 && !isMenuOpen) {
            if (currentScrollY > lastScrollY) {
                // Scrolling down
                navbar.classList.add('is-hidden');
            } else {
                // Scrolling up
                navbar.classList.remove('is-hidden');
            }
        } else {
            navbar.classList.remove('is-hidden');
        }

        lastScrollY = currentScrollY;
    }, { passive: true });
});