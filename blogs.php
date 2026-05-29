<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />

 <?php
 $meta = [
 'title' => "Blogs | The Blog Ship",
 'description' => "Insights, tutorials, and practical guides on networking, servers, routing, security, and modern IT.",
 'type' => "website",
 ];
 include __DIR__ . '/includes/meta.php';
 ?>

 <?php include __DIR__ . '/includes/header.php'; ?>

 <link rel="manifest" href="<?php echo $base_url; ?>manifest.json">
 <meta name="theme-color" content="#0c0b09">
 <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/blogs.css">
 <script src="<?php echo $base_url; ?>assets/js/pages/blogs.js" defer></script>
</head>

<body class="bg-[#0c0b09] text-white antialiased selection:bg-yellow-500/30">
 <?php include __DIR__ . '/includes/navbar.php'; ?>

 <main class="bl-page">
 <div class="bl-wrap">
 <div class="bl-shell">
 <!-- HERO / TOP (consistent with Contact) -->
 <header class="bl-head bl-anim">
 <div class="bl-badge bl-anim-item">
 <div class="bl-dot"></div>
 <span class="bl-badge__text">Our latest thinking</span>
 </div>
 <h1 class="bl-title bl-anim-item">Blog</h1>
 <p class="bl-subtitle bl-anim-item">
 Company insights, technical tutorials, and practical guides - written for learners and practitioners.
 </p>
 </header>

 <!-- FEATURED / SPOTLIGHT -->
 <section class="bl-spotlight bl-anim bl-delay-1" aria-label="Featured posts">
 <div class="bl-spotlight__wrap">
 <div class="bl-spotlight__top">
 <div class="bl-spotlight__kicker">
 <span class="bl-spotlight__pill"><i class="ri-fire-line" aria-hidden="true"></i> Featured</span>
 <span class="bl-spotlight__pill bl-spotlight__pill--muted">Editor’s picks</span>
 </div>

 <div class="bl-spotlight__titleRow">
 <h2 class="bl-spotlight__title">Featured Reads</h2>
 <a class="bl-spotlight__all" href="#blGrid" aria-label="Browse all posts">
 Browse all <i class="ri-arrow-right-line" aria-hidden="true"></i>
 </a>
 </div>

 <p class="bl-spotlight__sub">
 Hand‑picked articles with clear explanations, practical steps, and real‑world context.
 </p>
 </div>

 <div class="bl-spotlight__layout">
 <!-- Hero Article -->
 <article class="spot-hero">
 <a href="<?php echo $base_url; ?>blogs/serverinstallation.php" class="spot-hero__media">
 <img src="<?php echo $base_url; ?>blogs/images/serverinstallation/serverinstall1.webp" alt="Windows Server Installation Guide" loading="lazy">
 </a>
 <div class="spot-hero__content">
 <div class="spot-hero__meta">
 <a href="<?php echo $base_url; ?>categories/servers.php" class="spot-hero__cat">Servers</a>
 <span class="spot-hero__dot">•</span>
 <span class="spot-hero__date">11 min read</span>
 </div>
 <h3 class="spot-hero__title">
 <a href="<?php echo $base_url; ?>blogs/serverinstallation.php">Guide to Installing Windows Server</a>
 </h3>
 <p class="spot-hero__desc">
 A clean, practical walkthrough to install Windows Server confidently - from ISO to first boot, partitioning, and baseline configuration checks.
 </p>
 <div class="spot-hero__actions">
 <a href="<?php echo $base_url; ?>blogs/serverinstallation.php" class="spot-hero__read">Read Article</a>
 <button class="spot-hero__share" type="button" aria-label="Share this post" data-share-url="<?php echo $base_url; ?>blogs/serverinstallation.php" data-share-title="Guide to Installing Windows Server">
 <i class="ri-share-line"></i>
 </button>
 </div>
 </div>
 </article>

 <aside class="bl-spotlight__aside" aria-label="More featured posts">
 <div class="bl-spotlight__asideHead">
 <h3 class="bl-spotlight__asideTitle">More picks</h3>
 <p class="bl-spotlight__asideSub">High‑signal technical reads.</p>
 </div>

 <div class="bl-spotlight__list">
 <!-- Pick 1 -->
 <article class="spot-pick">
 <a href="<?php echo $base_url; ?>blogs/raidblog.php" class="spot-pick__media">
 <img src="<?php echo $base_url; ?>assets/articleimages/raidblog.webp" alt="RAID Levels" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
 </a>
 <div class="spot-pick__body">
 <h4 class="spot-pick__title"><a href="<?php echo $base_url; ?>blogs/raidblog.php">RAID and Understanding its Levels</a></h4>
 <div class="spot-pick__meta"><span class="spot-pick__cat">Storage</span> <span class="spot-pick__num">8 min</span></div>
 </div>
 </article>
 <!-- Pick 2 -->
 <article class="spot-pick">
 <a href="<?php echo $base_url; ?>blogs/eigrp.php" class="spot-pick__media">
 <img src="<?php echo $base_url; ?>blogs/images/eigrp/eigrpcard.webp" alt="EIGRP Protocol" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
 </a>
 <div class="spot-pick__body">
 <h4 class="spot-pick__title"><a href="<?php echo $base_url; ?>blogs/eigrp.php">EIGRP: Configuration & Metrics</a></h4>
 <div class="spot-pick__meta"><span class="spot-pick__cat">Networking</span> <span class="spot-pick__num">15 min</span></div>
 </div>
 </article>
 </div>
 </aside>
 </div>
 </div>
</section>

 <!-- SEARCH / FILTERS (moved under Featured) -->
 <section class="bl-controls bl-anim bl-delay-2" aria-label="Search and filters">
 <div class="bl-controls__wrap">
 <div class="bl-tools">
 <div class="bl-search" role="search">
 <i class="fas fa-search" aria-hidden="true"></i>
 <input
 id="searchInput"
 type="text"
 placeholder="Search by title, category, or topic…"
 aria-label="Search blog posts"
 autocomplete="off"
 />
 </div>

 <div class="bl-meta">
 <span class="bl-count" id="blCount">0 posts</span>
 <button class="bl-clear" id="blClear" type="button">Clear</button>
 </div>
 </div>

 <div class="bl-chips" id="blChips" aria-label="Category filters">
 <!-- JS injects chips -->
 </div>
 </div>
 </section>

 <!-- Toast -->
 <div class="bl-toast" id="blToast" role="status" aria-live="polite" aria-atomic="true"></div>

 <!-- GRID -->
 <section class="bl-container maxbloging bl-anim bl-delay-3">
 <div class="grid maxbloging" id="blGrid">

 <?php include __DIR__ . '/cards/serverinstallationcard.php'; ?>
 <?php include __DIR__ . '/cards/basicserverconfigcard.php'; ?>
 <?php include __DIR__ . '/cards/raidcard.php'; ?>
 <?php include __DIR__ . '/cards/raidconfig.php'; ?>

 <?php include __DIR__ . '/cards/staticroutingcard.php'; ?>
 <?php include __DIR__ . '/cards/defaultroutingcard.php'; ?>
 <?php include __DIR__ . '/cards/dynamicroutingcard.php'; ?>
 <?php include __DIR__ . '/cards/ripcard.php'; ?>

 <?php include __DIR__ . '/cards/eigrpcard.php'; ?>
 <?php include __DIR__ . '/cards/eigrp-auth-card.php'; ?>
 <?php include __DIR__ . '/cards/redistributionripeigrpcard.php'; ?>

 <?php include __DIR__ . '/cards/card1.php'; ?>
 <?php include __DIR__ . '/cards/card2.php'; ?>
 <?php include __DIR__ . '/cards/card3.php'; ?>

 </div>

 <!-- Empty state -->
 <div class="bl-empty" id="blEmpty" aria-live="polite">
 <div class="bl-empty__glass">
 <h2>No posts found</h2>
 <p>Try a different keyword or choose a category filter.</p>
 <button class="bl-reset" id="blReset" type="button">Reset</button>
 </div>
 </div>
 </section>
 </div>
 </div>
 </main>

 <?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
