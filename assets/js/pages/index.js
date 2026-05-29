document.addEventListener('DOMContentLoaded', () => {
  
  // 1. Reveal Animation (Standard)
  const reveals = document.querySelectorAll('.hm-reveal, .hm-hero');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  reveals.forEach(el => observer.observe(el));

  // 2. Typing Effect (Hero)
  const typingEl = document.getElementById('hmTyping');
  if (typingEl) {
    const phrases = (typingEl.getAttribute('data-phrases') || '').split('|');
    let phraseIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    let typeSpeed = 100;

    function type() {
      const currentPhrase = phrases[phraseIndex];
      
      if (isDeleting) {
        typingEl.textContent = currentPhrase.substring(0, charIndex - 1);
        charIndex--;
        typeSpeed = 40; // Faster delete
      } else {
        typingEl.textContent = currentPhrase.substring(0, charIndex + 1);
        charIndex++;
        typeSpeed = 80; // Mechanical typing speed
      }

      if (!isDeleting && charIndex === currentPhrase.length) {
        isDeleting = true;
        typeSpeed = 3000; // Longer pause to read
      } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        phraseIndex = (phraseIndex + 1) % phrases.length;
        typeSpeed = 500; // Pause before new word
      }

      setTimeout(type, typeSpeed);
    }
    
    // Start typing loop
    setTimeout(type, 1000);
  }

  // 3. 3D Tilt Effect (Hero Cards & Features)
  const tiltCards = document.querySelectorAll('.hm-card, .hm-spotlight');

  tiltCards.forEach(card => {
    card.addEventListener('mousemove', handleTilt);
    card.addEventListener('mouseleave', resetTilt);
    card.addEventListener('mouseenter', enterTilt);
  });

  function enterTilt(e) {
    // Remove transition during movement to prevent lag
    this.style.transition = 'none';
    
    // Pop out inner elements (3D depth)
    const inner = this.querySelector('.hm-card__icon, .hm-spotlight__badge');
    if(inner) {
      inner.style.transition = 'none';
      inner.style.transform = 'translateZ(30px)';
    }
  }

  function handleTilt(e) {
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    // Calculate center
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    
    // Calculate rotation (Max 10deg)
    // RotateX is based on Y position (inverted)
    // RotateY is based on X position
    const rotateX = ((y - centerY) / centerY) * -10; 
    const rotateY = ((x - centerX) / centerX) * 10;

    // Apply transform
    this.style.transform = `
      perspective(1000px) 
      rotateX(${rotateX}deg) 
      rotateY(${rotateY}deg) 
      scale3d(1.02, 1.02, 1.02)
    `;
  }

  function resetTilt(e) {
    // Add transition back for smooth reset
    this.style.transition = 'transform 0.5s ease, background 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease';
    this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
    
    // Reset inner elements
    const inner = this.querySelector('.hm-card__icon, .hm-spotlight__badge');
    if(inner) {
      inner.style.transition = 'transform 0.5s ease';
      inner.style.transform = 'translateZ(0)';
    }
  }

  // 4. Matrix Rain Effect
  const canvas = document.getElementById('hmMatrix');
  if (canvas) {
    const ctx = canvas.getContext('2d');
    const parent = canvas.parentElement;
    
    let width = canvas.width = parent.offsetWidth;
    let height = canvas.height = parent.offsetHeight;
    
    // Resize listener
    window.addEventListener('resize', () => {
      width = canvas.width = parent.offsetWidth;
      height = canvas.height = parent.offsetHeight;
    });

    const cols = Math.floor(width / 20) + 1;
    const ypos = Array(cols).fill(0);

    // Mouse interaction
    let mouseX = -1000;
    let mouseY = -1000;
    
    // Attach to parent since canvas has pointer-events: none
    parent.addEventListener('mousemove', (e) => {
      const rect = parent.getBoundingClientRect();
      mouseX = e.clientX - rect.left;
      mouseY = e.clientY - rect.top;
    });
    
    parent.addEventListener('mouseleave', () => {
      mouseX = -1000;
      mouseY = -1000;
    });

    ctx.fillStyle = '#000';
    ctx.fillRect(0, 0, width, height);

    function matrix() {
      // Trail effect (low opacity black)
      ctx.shadowBlur = 0;
      ctx.fillStyle = 'rgba(0, 0, 0, 0.05)';
      ctx.fillRect(0, 0, width, height);

      ctx.font = '14pt monospace';

      ypos.forEach((y, ind) => {
        const text = String.fromCharCode(Math.random() * 128);
        const x = ind * 20;

        // Change color on hover
        const dx = x - mouseX;
        const dy = y - mouseY;
        const isGlitch = Math.random() < 0.01; // 1% chance to flicker
        
        if (dx * dx + dy * dy < 15000 || isGlitch) { // ~120px radius or glitch
          ctx.fillStyle = '#ffffff';
          ctx.shadowColor = '#ffffff';
          ctx.shadowBlur = 8;
        } else {
          ctx.fillStyle = '#38BDF8'; // Terminal Blue
          ctx.shadowBlur = 0;
        }

        // Slight offset for glitch
        if (isGlitch) ctx.fillText(text, x + (Math.random() * 6 - 3), y);
        else ctx.fillText(text, x, y);

        if (y > 100 + Math.random() * 10000) ypos[ind] = 0;
        else ypos[ind] = y + 20;
      });
    }
    setInterval(matrix, 50);
  }

  // 5. Newsletter Form Handling
  const subForm = document.getElementById('hmSubscribeForm');
  const subSuccess = document.getElementById('hmSubscribeSuccess');

  if (subForm && subSuccess) {
    subForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      
      const btn = subForm.querySelector('button');
      const originalText = btn.innerText;
      
      // Loading state
      btn.disabled = true;
      btn.innerHTML = '<i class="ri-loader-4-line ri-spin"></i>';
      
      try {
        const formData = new FormData(subForm);
        const response = await fetch(subForm.action, { method: 'POST', body: formData });
        const data = await response.json();

        if (!data.ok) {
            throw new Error(data.message || 'Subscription failed');
        }
        
        // Show success
        subForm.style.display = 'none';
        subSuccess.style.display = 'block';
        
      } catch (err) {
        btn.disabled = false;
        btn.innerText = originalText;
        alert(err.message || 'Something went wrong. Please try again.');
      }
    });
  }
});