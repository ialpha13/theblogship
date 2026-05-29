document.addEventListener('DOMContentLoaded', () => {

 // Newsletter subscribe (no jQuery)
 const form = document.getElementById('subscribeForm');
 const emailInput = document.getElementById('email');
 const msgBox = document.getElementById('formMessage');

 if (form && emailInput && msgBox) {
 form.addEventListener('submit', async (e) => {
 e.preventDefault();
 const email = (emailInput.value || '').trim();
 msgBox.textContent = '';
 msgBox.classList.remove('success', 'error');

 if (!email) {
 msgBox.textContent = 'Email address is required.';
 msgBox.classList.add('error');
 return;
 }

 try {
 const res = await fetch(((window.GS_BASE_URL || '') + 'includes/subscribe.php'), {
 method: 'POST',
 headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
 body: new URLSearchParams({ email })
 });

 const data = await res.json().catch(() => null);
 const message = data && typeof data.message === 'string'
 ? data.message
 : 'There was an error processing your request. Please try again.';

 msgBox.textContent = message;
 msgBox.classList.add((data && data.ok) ? 'success' : 'error');

 if (data && data.ok) emailInput.value = '';
 } catch (err) {
 msgBox.textContent = 'There was an error processing your request. Please try again.';
 msgBox.classList.add('error');
 console.error(err);
 }
 });
 }
});
