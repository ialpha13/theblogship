<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <?php
 $meta = [
 'title' => "Search | The Blog Ship",
 'description' => "Search articles by title, category, or tags on The Blog Ship.",
 'type' => "website",
 ];
 include __DIR__ . '/includes' . '/meta.php';
 ?>
 <?php include __DIR__ . '/includes/header.php'; ?>
 <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/blogs.css">
 <style>
 .srch-top{ max-width: 1040px; margin: 10px auto 18px; }
 .srch-box{ display:flex; gap:10px; align-items:center; padding:14px 14px; border-radius:16px;
 background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.12); }
 .srch-input{ flex:1; background: transparent; border: none; outline: none; color: inherit; font-size:16px; padding:10px 10px; }
 .srch-pill{ font-size:13px; opacity:.85; padding:8px 10px; border-radius:999px; background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.10); }
 .srch-empty{ max-width:1040px; margin: 14px auto 0; opacity:.85; }
 </style>
</head>
<body class="bl-page">
 <div class="ms-bg"></div>
 <div class="ms-noise"></div>

 <?php include __DIR__ . '/includes/navbar.php'; ?>

 <main class="ms-page-pad bl-main">
 <section class="srch-top">
 <h1 class="bl-title">Search</h1>
 <p class="bl-sub">Type to filter by title, category, tags, or excerpt.</p>

 <div class="srch-box" role="search">
 <i class="ri-search-line" aria-hidden="true"></i>
 <input id="srchInput" class="srch-input" type="search" placeholder="Search articles..." autocomplete="off" />
 <span id="srchCount" class="srch-pill">0 results</span>
 </div>
 <div id="srchEmpty" class="srch-empty" style="display:none;">No results match your search.</div>
 </section>

 <section class="bl-grid" id="srchGrid">
 <?php
 $cards = [
 'cards/serverinstallationcard.php',
 'cards/basicserverconfigcard.php',
 'cards/raidcard.php',
 'cards/raidconfig.php',
 'cards/staticroutingcard.php',
 'cards/defaultroutingcard.php',
 'cards/dynamicroutingcard.php',
 'cards/ripcard.php',
 'cards/eigrpcard.php',
 'cards/eigrp-auth-card.php',
 'cards/redistributionripeigrpcard.php',
 'cards/card1.php',
 'cards/card2.php',
 'cards/card3.php',
 ];

 foreach ($cards as $c) {
 include __DIR__ . '/' . $c;
 }
 ?>
 </section>
 </main>

 <?php include __DIR__ . '/includes/footer.php'; ?>

 <script>
 (function(){
 const input = document.getElementById('srchInput');
 const grid = document.getElementById('srchGrid');
 const cards = Array.from(grid.querySelectorAll('[data-title]'));
 const count = document.getElementById('srchCount');
 const empty = document.getElementById('srchEmpty');

 function norm(s){ return (s||'').toLowerCase().trim(); }
 function update(){
 const q = norm(input.value);
 let shown = 0;
 cards.forEach(card => {
 const hay = norm(card.getAttribute('data-title')) + ' ' +
 norm(card.getAttribute('data-category')) + ' ' +
 norm(card.getAttribute('data-tags')) + ' ' +
 norm(card.getAttribute('data-excerpt'));
 const ok = !q || hay.includes(q);
 card.style.display = ok ? '' : 'none';
 if (ok) shown++;
 });
 count.textContent = shown + (shown === 1 ? ' result' : ' results');
 empty.style.display = shown ? 'none' : '';
 }
 input.addEventListener('input', update);
 update();
 })();
 </script>
</body>
</html>
