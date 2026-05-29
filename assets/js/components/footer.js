document.addEventListener('DOMContentLoaded', () => {
    // Back to Top
    const toTopBtn = document.getElementById('gs-to-top');
    if (toTopBtn) {
        toTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Subscribe Form
    const subForm = document.getElementById('gs-subscribe-form');
    const subMsg = document.getElementById('gs-subscribe-msg');

    if (subForm) {
        subForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = subForm.querySelector('button');
            const input = subForm.querySelector('input');
            const originalBtnContent = btn.innerHTML;

            // Loading state
            btn.disabled = true;
            input.disabled = true;
            btn.innerHTML = '<i class="ri-loader-4-line ri-spin"></i>';
            subMsg.textContent = '';
            subMsg.className = 'gs-subscribe__msg';

            try {
                const formData = new FormData(subForm);
                const response = await fetch(subForm.action, { method: 'POST', body: formData });
                const data = await response.json();

                if (data.ok) {
                    subMsg.textContent = data.message; // "Successfully subscribed!" or "Already subscribed"
                    subMsg.classList.add('is-success');
                    subForm.reset();
                } else {
                    throw new Error(data.message || 'Subscription failed');
                }

            } catch (err) {
                subMsg.textContent = err.message || 'Something went wrong. Please try again.';
                subMsg.classList.add('is-error');
            } finally {
                btn.disabled = false;
                input.disabled = false;
                btn.innerHTML = originalBtnContent;
            }
        });
    }
});