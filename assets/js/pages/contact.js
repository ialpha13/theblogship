/**
 * Contact Page Scripts
 * Handles animations and form interactions
 */

document.addEventListener('DOMContentLoaded', () => {
    initAnimations();
    initForm();
    checkToast();
    initAccordion();
});

/**
 * Initialize scroll animations
 */
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
                obs.unobserve(entry.target); // Only animate once
            }
        });
    }, observerOptions);

    const animElements = document.querySelectorAll('.ct-anim');
    animElements.forEach(el => observer.observe(el));
}

/**
 * Initialize contact form handling
 */
function initForm() {
    const form = document.getElementById('contactForm');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        // The form will submit naturally to PHP, 
        // but we add the loading state for visual feedback immediately.
        const btn = form.querySelector('.ct-submit');
        if (btn) {
            btn.classList.add('is-loading');
            btn.setAttribute('disabled', 'true');
        }
    });
}

/**
 * Check for toast messages in URL parameters
 */
function checkToast() {
    const params = new URLSearchParams(window.location.search);
    const type = params.get('type');
    const msg = params.get('message');
    
    if (type && msg) {
        const toast = document.getElementById('ct-toast');
        if (toast) {
            // Set content
            const icon = type === 'success' ? '<i class="ri-checkbox-circle-line" style="color:#34d399; font-size:18px;"></i>' : '<i class="ri-error-warning-line" style="color:#f87171; font-size:18px;"></i>';
            
            toast.innerHTML = icon;
            const span = document.createElement('span');
            span.textContent = decodeURIComponent(msg);
            toast.appendChild(span);
            
            // Show toast
            toast.classList.add(type === 'success' ? 'success' : 'error');
            toast.classList.add('is-visible');
            
            // Hide after 5 seconds
            setTimeout(() => {
                toast.classList.remove('is-visible');
            }, 5000);
            
            // Clean URL without refreshing
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    }
}

/**
 * Initialize FAQ Accordion
 */
function initAccordion() {
    const btns = document.querySelectorAll('.ct-acc-btn');
    
    btns.forEach(btn => {
        btn.addEventListener('click', () => {
            const item = btn.parentElement;
            const content = item.querySelector('.ct-acc-content');
            const isOpen = item.classList.contains('is-open');
            
            // Close all others (optional, but cleaner)
            document.querySelectorAll('.ct-acc-item').forEach(i => {
                i.classList.remove('is-open');
                i.querySelector('.ct-acc-content').style.maxHeight = null;
            });

            if (!isOpen) {
                item.classList.add('is-open');
                content.style.maxHeight = content.scrollHeight + "px";
            }
        });
    });
}