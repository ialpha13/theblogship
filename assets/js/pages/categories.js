document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('catSearch');
  if(!searchInput) return;

  searchInput.addEventListener('input', function(e) {
    const term = e.target.value.toLowerCase().trim();
    const sections = document.querySelectorAll('.cat-section');
    let totalVisible = 0;
    
    sections.forEach(section => {
      const cards = section.querySelectorAll('.cat-card');
      let sectionVisibleCount = 0;
      
      cards.forEach(card => {
        const text = card.innerText.toLowerCase();
        const isMatch = text.includes(term);
        card.style.display = isMatch ? '' : 'none';
        if(isMatch) sectionVisibleCount++;
      });
      
      totalVisible += sectionVisibleCount;
      section.style.display = sectionVisibleCount > 0 ? '' : 'none';
    });
    
    const noResults = document.getElementById('catNoResults');
    if (noResults) noResults.style.display = totalVisible === 0 ? 'block' : 'none';
  });

  // Calculate Stats
  const totalCats = document.querySelectorAll('.cat-card').length;
  const badges = document.querySelectorAll('.cat-badge');
  let totalArts = 0;
  badges.forEach(b => {
      const val = parseInt(b.innerText);
      if(!isNaN(val)) totalArts += val;
  });
  
  const statCatsEl = document.getElementById('statCats');
  if(statCatsEl) statCatsEl.innerText = totalCats;
  
  const statArtsEl = document.getElementById('statArts');
  if(statArtsEl) statArtsEl.innerText = totalArts;
});