document.addEventListener('DOMContentLoaded', () => {
  
  // 1. Reveal Animation
  const reveals = document.querySelectorAll('.pf-reveal');
  setTimeout(() => {
    reveals.forEach((el, i) => {
      setTimeout(() => el.classList.add('is-visible'), i * 150);
    });
  }, 100);

  // 3. Modal Logic
  const modal = document.getElementById('pf-modal');
  const closeBtn = document.querySelector('.pf-modal__close');
  const backdrop = document.querySelector('.pf-modal__backdrop');
  const mediaContainer = document.getElementById('modal-media');
  const descContainer = document.getElementById('modal-desc');
  
  window.openCertModal = (title, url, type) => {
    document.getElementById('modal-title').innerText = title;
    
    // Hide description for certs, show media
    if(descContainer) descContainer.style.display = 'none';
    
    if(mediaContainer) {
      mediaContainer.innerHTML = '';
      if(type === 'pdf') {
        mediaContainer.innerHTML = `<iframe src="${url}" style="width:100%; height:60vh; min-height:300px; border:none; border-radius:8px; background:#fff;"></iframe>`;
      } else {
        mediaContainer.innerHTML = `<img src="${url}" style="width:100%; height:auto; border-radius:8px; display:block;">`;
      }
    }

    // Make modal wider for certs
    const panel = modal.querySelector('.pf-modal__panel');
    if(panel) panel.style.maxWidth = '900px';

    modal.classList.add('is-open');
  };

  const closeModal = () => {
    modal.classList.remove('is-open');
    // Reset modal width
    const panel = modal.querySelector('.pf-modal__panel');
    if(panel) panel.style.maxWidth = '';
    // Stop iframes (PDFs)
    if(mediaContainer) mediaContainer.innerHTML = '';
  };

  closeBtn.addEventListener('click', closeModal);
  backdrop.addEventListener('click', closeModal);
});