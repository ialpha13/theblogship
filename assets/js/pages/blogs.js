/**
 * Blogs Page Logic
 * Handles: Animations, Spotlight Population, Search, Filtering, Chips
 */
document.addEventListener('DOMContentLoaded', () => {
    initAnimations();
    initBlogSystem();
});

/**
 * 1. Blog System (Search, Filter, Chips)
 */
function initBlogSystem() {
    const searchInput = document.getElementById('searchInput');
    const chipsContainer = document.getElementById('blChips');
    const countEl = document.getElementById('blCount');
    const clearBtn = document.getElementById('blClear');
    const emptyState = document.getElementById('blEmpty');
    const resetBtn = document.getElementById('blReset');
    const cards = document.querySelectorAll('.blx-card');

    // A. Generate Chips from Cards
    if (chipsContainer && cards.length) {
        const categories = ['All', ...new Set(Array.from(cards).map(c => c.getAttribute('data-category')))].sort();
        
        chipsContainer.innerHTML = categories.map(cat => 
            `<button class="bl-chip ${cat === 'All' ? 'is-active' : ''}" data-filter="${cat}">${cat}</button>`
        ).join('');
    }

    // B. Filtering Logic
    let currentFilter = 'All';
    let currentSearch = '';

    const filterCards = () => {
        let visible = 0;
        cards.forEach(card => {
            const cat = card.getAttribute('data-category');
            const title = (card.getAttribute('data-title') || '').toLowerCase();
            const tags = (card.getAttribute('data-tags') || '').toLowerCase();
            
            const matchCat = currentFilter === 'All' || cat === currentFilter;
            const matchSearch = !currentSearch || title.includes(currentSearch) || tags.includes(currentSearch);

            if (matchCat && matchSearch) {
                card.classList.remove('is-hidden');
                visible++;
            } else {
                card.classList.add('is-hidden');
            }
        });

        // Update UI
        if (countEl) countEl.textContent = `${visible} post${visible !== 1 ? 's' : ''}`;
        if (emptyState) emptyState.classList.toggle('is-show', visible === 0);
        if (clearBtn) {
            clearBtn.style.display = (currentFilter !== 'All' || currentSearch) ? 'inline-flex' : 'none';
        }
    };

    // Event Listeners
    if (chipsContainer) {
        chipsContainer.addEventListener('click', (e) => {
            if (e.target.classList.contains('bl-chip')) {
                document.querySelectorAll('.bl-chip').forEach(c => c.classList.remove('is-active'));
                e.target.classList.add('is-active');
                currentFilter = e.target.getAttribute('data-filter');
                filterCards();
            }
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            currentSearch = e.target.value.toLowerCase().trim();
            filterCards();
        });
    }

    const resetAll = () => {
        currentFilter = 'All';
        currentSearch = '';
        if (searchInput) searchInput.value = '';
        document.querySelectorAll('.bl-chip').forEach(c => c.classList.toggle('is-active', c.getAttribute('data-filter') === 'All'));
        filterCards();
    };

    if (clearBtn) clearBtn.addEventListener('click', resetAll);
    if (resetBtn) resetBtn.addEventListener('click', resetAll);

    // Initial run
    filterCards();
}

/**
 * 2. Animations
 */
function initAnimations() {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.01
    };

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-in-view');
                obs.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.bl-anim').forEach(el => observer.observe(el));
}

/**
 * 3. Share Button Logic
 */
document.addEventListener('click', (e) => {
    const btn = e.target.closest('.spot-hero__share, .blx-share');
    if (!btn) return;

    const url = btn.getAttribute('data-share-url') || window.location.href;
    const title = btn.getAttribute('data-share-title') || document.title;

    if (navigator.share) {
        navigator.share({ title, url }).catch(console.error);
    } else {
        navigator.clipboard.writeText(url).then(() => {
            alert('Link copied to clipboard!');
        }).catch(() => {});
    }
});