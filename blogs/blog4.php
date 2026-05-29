<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <?php
 $meta = [
 'title' => "Blog Post | The Blog Ship",
 'description' => "Blog post coming soon.",
 'type' => "article",
 ];
 include __DIR__ . '/../includes/meta.php';
 ?>
 <?php include __DIR__ . '/../includes/header.php'; ?>
</head>
<body class="bl-page">
 <div class="ms-bg"></div>
 <div class="ms-noise"></div>

<?php include __DIR__ . '/../includes/navbar.php'; ?>

 


  <main class="ms-page-pad bl-shell">
    <div class="bl-container">
      <header class="bl-hero">
        <h1 class="bl-title">Coming Soon</h1>
        <div class="bl-meta">
          <span data-reading></span>
        </div>
      </header>

      <div class="bl-grid">
        <article class="bl-card">
          <div class="bl-prose">
<main class="ms-page-pad bs-postMain">
 <section class="ms-card bs-postCard" role="main">


<main class="bs-article">
 <header class="bs-hero">
 <h1 class="bs-title">Coming Soon</h1>
 <div class="bs-meta">This blog post hasn’t been published yet.</div>
 </header>

 <article class="bs-content">
 <p>Please check back later.</p>
 <p><a href="<?php echo $base_url; ?>blogs.php">← Back to Blogs</a></p>
 </article>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

<!-- Blog Inline CSS -->
  <style>
/* ============================
   Blog Page (inline, per-file)
   Responsive article + TOC
============================ */
:root{
  --bl-text: rgba(244,246,250,.90);
  --bl-muted: rgba(244,246,250,.70);
  --bl-border: rgba(255,255,255,.12);
  --bl-glass: rgba(255,255,255,.05);
  --bl-glass2: rgba(255,255,255,.08);
  --bl-shadow: 0 26px 80px rgba(0,0,0,.40);
  --bl-radius: 18px;
  --bl-accent: #FBBF24;
  --bl-accent2: #22C55E;
}

.bl-page{ min-height: 100%; }
.ms-page-pad{ padding-top: 84px; } /* if site uses fixed nav */

.bl-shell{ position: relative; z-index: 1; padding: 22px 0 44px; }
.bl-container{ width: min(1120px, calc(100% - 32px)); margin: 0 auto; }

.bl-hero{
  border: 1px solid var(--bl-border);
  background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
  box-shadow: var(--bl-shadow);
  border-radius: calc(var(--bl-radius) + 6px);
  padding: 18px 18px 16px;
  overflow: hidden;
  position: relative;
}
.bl-hero:before{
  content:"";
  position:absolute; inset:-2px;
  background:
    radial-gradient(700px 260px at 16% 0%, color-mix(in srgb, var(--bl-accent) 26%, transparent), transparent 62%),
    radial-gradient(700px 260px at 84% 0%, color-mix(in srgb, var(--bl-accent2) 22%, transparent), transparent 60%);
  filter: blur(0px);
  pointer-events:none;
  opacity:.9;
}
.bl-hero > *{ position: relative; z-index: 1; }

.bl-title{
  margin: 6px 0 10px;
  font-size: clamp(1.55rem, 2.6vw, 2.25rem);
  line-height: 1.18;
  letter-spacing: -.02em;
  color: var(--bl-text);
}
.bl-meta{
  display:flex; flex-wrap:wrap; gap: 10px 14px;
  color: var(--bl-muted);
  font-size: .95rem;
}
.bl-meta .dot{ opacity:.65; }

.bl-grid{
  display:grid;
  grid-template-columns: 1fr;
  gap: 16px;
  margin-top: 14px;
}
@media (min-width: 980px){
  .bl-grid{ grid-template-columns: 1fr 320px; align-items:start; }
}

.bl-card{
  border: 1px solid var(--bl-border);
  background: linear-gradient(180deg, rgba(255,255,255,.05), rgba(255,255,255,.03));
  box-shadow: var(--bl-shadow);
  border-radius: calc(var(--bl-radius) + 6px);
  overflow: hidden;
}
.bl-prose{
  padding: 18px 18px 6px;
  color: var(--bl-text);
  line-height: 1.72;
  font-size: 1rem;
}
.bl-prose :is(p, ul, ol, blockquote, pre, figure, table){ margin: 0 0 14px; }
.bl-prose :is(h2,h3){
  margin: 18px 0 10px;
  line-height: 1.25;
  letter-spacing: -.01em;
}
.bl-prose h2{
  font-size: clamp(1.18rem, 1.55vw, 1.42rem);
  padding-top: 10px;
  border-top: 1px solid rgba(255,255,255,.10);
}
.bl-prose h3{ font-size: 1.08rem; opacity:.98; }

.bl-prose a{ color: color-mix(in srgb, var(--bl-accent) 70%, white); text-decoration: none; border-bottom: 1px solid rgba(255,255,255,.18); }
.bl-prose a:hover{ border-bottom-color: color-mix(in srgb, var(--bl-accent) 65%, white); }

.bl-prose img{
  max-width: 100%;
  height: auto;
  display: block;
  border-radius: 14px;
  border: 1px solid rgba(255,255,255,.10);
  background: rgba(255,255,255,.03);
}

.bl-prose pre{
  overflow:auto;
  padding: 14px;
  border-radius: 14px;
  border: 1px solid rgba(255,255,255,.10);
  background: rgba(0,0,0,.22);
}
.bl-prose code{ font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; font-size: .95em; }

.bl-aside{ display:none; }
@media (min-width: 980px){ .bl-aside{ display:block; } }

.bl-tocCard{
  border: 1px solid var(--bl-border);
  background: linear-gradient(180deg, rgba(255,255,255,.05), rgba(255,255,255,.03));
  box-shadow: var(--bl-shadow);
  border-radius: calc(var(--bl-radius) + 6px);
  padding: 14px 14px 10px;
  position: sticky;
  top: 96px;
}
.bl-tocTitle{
  margin: 0 0 10px;
  font-size: .95rem;
  letter-spacing: .06em;
  text-transform: uppercase;
  color: var(--bl-muted);
}
#bl-toc a{
  display:block;
  padding: 7px 10px;
  border-radius: 12px;
  color: var(--bl-muted);
  text-decoration:none;
  border: 1px solid transparent;
}
#bl-toc a:hover{
  color: var(--bl-text);
  border-color: rgba(255,255,255,.10);
  background: rgba(255,255,255,.04);
}
#bl-toc a.is-active{
  color: var(--bl-text);
  border-color: color-mix(in srgb, var(--bl-accent) 35%, rgba(255,255,255,.10));
  background: color-mix(in srgb, var(--bl-accent) 12%, rgba(255,255,255,.04));
}
#bl-toc a.toc-h3{ padding-left: 20px; font-size: .95rem; }

@media (max-width: 520px){
  .bl-container{ width: calc(100% - 24px); }
  .bl-hero{ padding: 16px 14px 14px; }
  .bl-prose{ padding: 16px 14px 6px; }
}

/* Neutralize legacy blog-specific utility classes so layout stays clean */
.maximumblogs, .maxblogs, .mydiv, .page-container, .content-grid, .main-content, .header, .toc, .sidebar, .content{
  max-width: none !important;
}
  </style>


 </section>
 </main>
          </div>
        </article>

        <aside class="bl-aside" aria-label="Table of contents">
          <div class="bl-tocCard">
            <div class="bl-tocTitle">On this page</div>
            <nav id="bl-toc"></nav>
          </div>
        </aside>
      </div>
    </div>
  </main>

  <?php include(__DIR__ . '/../includes/footer.php'); ?>

<!-- Blog Inline JS -->
<script>
/* ============================
   Blog Page (inline, per-file)
   - Builds TOC from h2/h3
   - Sets reading time
============================ */
(() => {
  const root = document.querySelector('.bl-prose');
  const toc  = document.getElementById('bl-toc');
  if (!root) return;

  // Add ids to headings if missing
  const slug = (s) => (s || '')
    .toLowerCase()
    .replace(/&amp;/g,'and')
    .replace(/[^a-z0-9\s\-]/g,'')
    .trim()
    .replace(/\s+/g,'-')
    .slice(0, 64);

  const headings = Array.from(root.querySelectorAll('h2, h3'));
  const used = new Set();
  headings.forEach(h => {
    if (!h.id) {
      let base = slug(h.textContent);
      if (!base) base = 'section';
      let id = base, i = 2;
      while (used.has(id) || document.getElementById(id)) { id = `${base}-${i++}`; }
      h.id = id;
    }
    used.add(h.id);
  });

  // Build TOC
  if (toc) {
    const frag = document.createDocumentFragment();
    headings.forEach(h => {
      const a = document.createElement('a');
      a.href = `#${h.id}`;
      a.textContent = h.textContent.trim();
      a.className = h.tagName === 'H3' ? 'toc-h3' : 'toc-h2';
      frag.appendChild(a);
    });
    toc.appendChild(frag);

    // Active state
    const links = Array.from(toc.querySelectorAll('a'));
    const map = new Map(links.map(l => [l.getAttribute('href')?.slice(1), l]));
    const obs = new IntersectionObserver((entries) => {
      const vis = entries.filter(e => e.isIntersecting).sort((a,b)=>b.intersectionRatio-a.intersectionRatio);
      if (!vis.length) return;
      const id = vis[0].target.id;
      links.forEach(l => l.classList.toggle('is-active', l === map.get(id)));
    }, { threshold: [0.2, 0.35, 0.5], rootMargin: '-18% 0px -70% 0px' });

    headings.forEach(h => obs.observe(h));
  }

  // Reading time
  const readingEl = document.querySelector('[data-reading]');
  if (readingEl) {
    const text = root.innerText || '';
    const words = text.trim().split(/\s+/).filter(Boolean).length;
    const mins = Math.max(1, Math.round(words / 210));
    readingEl.textContent = `${mins} min read`;
  }
})();
</script>

</body>
</html>
