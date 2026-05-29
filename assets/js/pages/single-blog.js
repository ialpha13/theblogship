/**
 * Single Blog Page Logic
 * Handles: Table of Contents, Scroll Spy, Copy Code, Progress Bar, Lightbox
 */
document.addEventListener('DOMContentLoaded', () => {
    initTOC();
    initProgressBar();
    initCopyCode();
    initLightbox();
});

function initTOC() {
    const article = document.querySelector('.sb-prose');
    const tocContainer = document.getElementById('sbTocList');
    if (!article || !tocContainer) return;

    const headings = article.querySelectorAll('h2');
    if (headings.length === 0) {
        document.querySelector('.sb-sidebar').style.display = 'none';
        return;
    }

    // Generate Links
    headings.forEach((heading, index) => {
        // Create ID if missing
        if (!heading.id) {
            heading.id = 'section-' + (index + 1);
        }

        const li = document.createElement('li');
        const a = document.createElement('a');
        a.href = '#' + heading.id;
        a.className = 'sb-toc__link';
        a.textContent = heading.textContent;

        // Smooth Scroll with Offset
        a.addEventListener('click', (e) => {
            e.preventDefault();
            const target = document.getElementById(heading.id);
            if (target) {
                const headerOffset = 100; // Adjust for navbar height
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
                // Update URL hash without jumping
                history.pushState(null, null, '#' + heading.id);
            }
        });
        
        li.appendChild(a);
        tocContainer.appendChild(li);
    });

    // Scroll Spy
    const observerOptions = {
        root: null,
        rootMargin: '-100px 0px -60% 0px',
        threshold: 0
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Remove active class from all
                document.querySelectorAll('.sb-toc__link').forEach(link => link.classList.remove('is-active'));
                
                // Add to current
                const id = entry.target.id;
                const activeLink = document.querySelector(`.sb-toc__link[href="#${id}"]`);
                if (activeLink) activeLink.classList.add('is-active');
            }
        });
    }, observerOptions);

    headings.forEach(h => observer.observe(h));
}

function initProgressBar() {
    const bar = document.createElement('div');
    Object.assign(bar.style, {
        position: 'fixed',
        top: '0',
        left: '0',
        height: '3px',
        background: '#38BDF8', // Brand blue
        zIndex: '9999',
        width: '0%',
        transition: 'width 0.1s linear'
    });
    document.body.appendChild(bar);

    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        bar.style.width = scrolled + "%";
    }, { passive: true });
}

function initCopyCode() {
    const codeBlocks = document.querySelectorAll('pre');
    
    codeBlocks.forEach(block => {
        // Ensure relative positioning for button placement
        if (getComputedStyle(block).position === 'static') {
            block.style.position = 'relative';
        }

        const btn = document.createElement('button');
        btn.innerHTML = '<i class="ri-file-copy-line"></i>';
        btn.title = 'Copy Code';
        
        // Inline styles to work without external CSS dependency
        Object.assign(btn.style, {
            position: 'absolute',
            top: '10px',
            right: '10px',
            background: 'rgba(255, 255, 255, 0.1)',
            border: '1px solid rgba(255, 255, 255, 0.2)',
            borderRadius: '6px',
            color: '#fff',
            padding: '4px 8px',
            cursor: 'pointer',
            fontSize: '16px',
            transition: 'all 0.2s ease',
            zIndex: '10'
        });

        btn.addEventListener('click', async () => {
            const code = block.querySelector('code') ? block.querySelector('code').innerText : block.innerText;
            try {
                await navigator.clipboard.writeText(code);
                btn.innerHTML = '<i class="ri-check-line" style="color:#34d399"></i>';
                setTimeout(() => btn.innerHTML = '<i class="ri-file-copy-line"></i>', 2000);
            } catch (err) {
                console.error('Copy failed', err);
                btn.innerHTML = '<i class="ri-error-warning-line" style="color:#f87171"></i>';
            }
        });

        block.appendChild(btn);
    });
}

function initLightbox() {
    const images = document.querySelectorAll('.sb-prose img');
    if (!images.length) return;

    // Create Lightbox DOM
    const lightbox = document.createElement('div');
    lightbox.className = 'sb-lightbox';
    lightbox.innerHTML = `
        <div class="sb-lightbox__backdrop"></div>
        <img class="sb-lightbox__img" src="" alt="Zoomed Image">
        <button class="sb-lightbox__close"><i class="ri-close-line"></i></button>
    `;
    document.body.appendChild(lightbox);

    const lbImg = lightbox.querySelector('.sb-lightbox__img');
    const closeBtn = lightbox.querySelector('.sb-lightbox__close');
    const backdrop = lightbox.querySelector('.sb-lightbox__backdrop');

    // Styles (Injected here to avoid CSS dependency)
    Object.assign(lightbox.style, {
        position: 'fixed',
        inset: '0',
        zIndex: '10000',
        display: 'none',
        alignItems: 'center',
        justifyContent: 'center',
        opacity: '0',
        transition: 'opacity 0.3s ease'
    });
    Object.assign(backdrop.style, {
        position: 'absolute',
        inset: '0',
        background: 'rgba(0,0,0,0.9)',
        backdropFilter: 'blur(5px)'
    });
    Object.assign(lbImg.style, {
        maxWidth: '90%',
        maxHeight: '90vh',
        zIndex: '1',
        borderRadius: '8px',
        boxShadow: '0 20px 50px rgba(0,0,0,0.5)',
        transform: 'scale(0.9)',
        transition: 'transform 0.3s ease'
    });
    Object.assign(closeBtn.style, {
        position: 'absolute',
        top: '20px',
        right: '20px',
        background: 'transparent',
        border: 'none',
        color: '#fff',
        fontSize: '32px',
        cursor: 'pointer',
        zIndex: '2'
    });

    const openLightbox = (src) => {
        lbImg.src = src;
        lightbox.style.display = 'flex';
        // Force reflow
        lightbox.offsetHeight; 
        lightbox.style.opacity = '1';
        lbImg.style.transform = 'scale(1)';
    };

    const closeLightbox = () => {
        lightbox.style.opacity = '0';
        lbImg.style.transform = 'scale(0.9)';
        setTimeout(() => {
            lightbox.style.display = 'none';
            lbImg.src = '';
        }, 300);
    };

    images.forEach(img => {
        img.style.cursor = 'zoom-in';
        img.addEventListener('click', () => openLightbox(img.src));
    });

    closeBtn.addEventListener('click', closeLightbox);
    backdrop.addEventListener('click', closeLightbox);
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && lightbox.style.display === 'flex') closeLightbox();
    });
}