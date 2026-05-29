<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <?php
 $meta = [
 'title' => "Static Routing Explained: Configuration, Floating Routes, and Real-World Examples | The Blog Ship",
 'description' => "Complete guide to static routing in Cisco networks. Learn configuration, floating static routes, and real-world examples with step-by-step instructions.",
 'keywords' => "static routing, cisco, ccna, network configuration, floating routes, routing table, network topology",
 'robots' => "index, follow",
 'type' => "article",
 ];
 include __DIR__ . '/../includes' . '/meta.php';
 ?>
 <?php include __DIR__ . '/../includes' . '/header.php'; ?>

<style>
    /* =========================================================
       SINGLE BLOG POST — GLASS UI SYSTEM
    ========================================================= */

    .sb-page {
      min-height: calc(100vh - 98px);
      position: relative;
      overflow-x: hidden;
    }

    /* Background System */
    .sb-page::before {
      content: "";
      position: fixed;
      inset: 0;
      z-index: 0;
      pointer-events: none;
      background:
        radial-gradient(900px 520px at 50% 18%, rgba(255,200,90,.08), transparent 60%),
        radial-gradient(700px 520px at 25% 55%, rgba(140,120,70,.06), transparent 60%),
        radial-gradient(900px 700px at 75% 70%, rgba(90,80,55,.06), transparent 62%),
        radial-gradient(1400px 900px at 50% 50%, rgba(0,0,0,.45), rgba(0,0,0,.75) 68%),
        linear-gradient(180deg, #15140f, #0d0c09);
    }

    /* Layout Shell */
    .sb-wrap {
      position: relative;
      z-index: 1;
      padding: 120px 16px 64px;
    }

    .sb-shell {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
    }
    @media (max-width: 768px) {
      .sb-wrap { padding: 100px 16px 40px; }
    }

    /* Hero */
    .sb-hero {
      text-align: center;
      max-width: 840px;
      margin: 0 auto 48px;
    }

    .sb-badge {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 8px 12px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,.12);
      background: rgba(255,255,255,.06);
      backdrop-filter: blur(10px);
      margin-bottom: 20px;
      text-decoration: none;
      transition: all 0.2s ease;
    }
    .sb-badge:hover {
      background: rgba(255,255,255,.1);
      border-color: rgba(255,255,255,.25);
    }

    .sb-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #ffb800;
      box-shadow: 0 0 0 4px rgba(255, 184, 0, .15);
    }

    .sb-badge__text {
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      color: rgba(255,255,255,.8);
    }

    .sb-title {
      font-size: clamp(32px, 5vw, 52px);
      font-weight: 900;
      letter-spacing: -0.03em;
      line-height: 1.1;
      color: rgba(255,255,255,.95);
      margin-bottom: 24px;
      text-shadow: 0 10px 30px rgba(0,0,0,.3);
    }

    .sb-meta {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 24px;
      flex-wrap: wrap;
      color: rgba(255,255,255,.6);
      font-size: 14px;
      font-weight: 500;
    }

    .sb-meta__item {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .sb-meta__item i { color: #ffb800; opacity: 0.8; }

    /* Grid */
    .sb-grid {
      display: grid;
      grid-template-columns: 1fr 300px;
      gap: 40px;
      align-items: start;
    }
    @media (max-width: 980px) {
      .sb-grid { grid-template-columns: 1fr; }
    }

    /* Article */
    .sb-article {
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 24px;
      padding: 40px;
      backdrop-filter: blur(12px);
      min-width: 0;
    }
    @media (max-width: 640px) {
      .sb-article { padding: 24px 20px; }
    }

    /* Prose */
    .sb-prose {
      color: rgba(255,255,255,.8);
      font-size: 17px;
      line-height: 1.75;
    }
    .sb-prose h2 {
      font-size: 26px;
      font-weight: 800;
      color: #fff;
      margin: 48px 0 20px;
      letter-spacing: -0.02em;
      scroll-margin-top: 120px;
    }
    .sb-prose h3 {
      font-size: 20px;
      font-weight: 700;
      color: #fff;
      margin: 32px 0 16px;
      scroll-margin-top: 120px;
    }
    .sb-prose p { margin-bottom: 24px; }
    .sb-prose ul, .sb-prose ol {
      margin-bottom: 24px;
      padding-left: 24px;
    }
    .sb-prose li { margin-bottom: 8px; }
    .sb-prose li::marker { color: #ffb800; }
    .sb-prose strong { color: #fff; font-weight: 700; }
    .sb-prose a {
      color: #ffb800;
      text-decoration: none;
      border-bottom: 1px solid rgba(255, 184, 0, 0.3);
      transition: all 0.2s;
    }
    .sb-prose a:hover { border-bottom-color: #ffb800; }
    .sb-prose img {
      width: 100%;
      height: auto;
      border-radius: 16px;
      border: 1px solid rgba(255,255,255,.1);
      margin: 32px 0;
      background: rgba(0,0,0,.2);
    }

    /* Sidebar (TOC) */
    .sb-sidebar {
      position: sticky;
      top: 120px;
    }
    @media (max-width: 980px) {
      .sb-sidebar { display: none; }
    }
    .sb-toc {
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 20px;
      padding: 24px;
      backdrop-filter: blur(12px);
    }
    .sb-toc__title {
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: rgba(255,255,255,.5);
      font-weight: 700;
      margin-bottom: 16px;
    }
    .sb-toc__list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 4px;
    }
    .sb-toc__link {
      display: block;
      padding: 8px 12px;
      border-radius: 8px;
      color: rgba(255,255,255,.6);
      text-decoration: none;
      font-size: 14px;
      transition: all 0.2s;
      border-left: 2px solid transparent;
    }
    .sb-toc__link:hover {
      color: #fff;
      background: rgba(255,255,255,.05);
    }
    .sb-toc__link.is-active {
      color: #ffb800;
      background: rgba(255, 184, 0, .08);
      border-left-color: #ffb800;
    }

    /* Next Steps */
    .next-steps-card {
      margin-top: 60px;
      padding-top: 40px;
      border-top: 1px solid rgba(255,255,255,.1);
    }
    .next-step {
      display: flex;
      align-items: center;
      gap: 16px;
      padding: 16px;
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 12px;
      margin-bottom: 12px;
      transition: all 0.2s;
    }
    .next-step:hover {
      transform: translateX(4px);
      background: rgba(255,255,255,.06);
      border-color: rgba(255,255,255,.2);
    }
    .next-step i { color: #ffb800; }
    .next-step h3 { margin: 0 0 4px; font-size: 16px; color: #fff; }
    .next-step p { margin: 0; font-size: 13px; color: rgba(255,255,255,.6); }

    /* --- SPECIFIC CONTENT STYLES --- */
    .info-card, .floating-routes-card, .conclusion-card {
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.1);
      border-radius: 16px;
      padding: 24px;
      margin-bottom: 24px;
    }
    .feature-list, .steps-list {
      padding-left: 20px;
      margin-top: 16px;
    }
    .step {
      display: flex;
      gap: 12px;
      margin-bottom: 12px;
    }
    .step-number {
      background: rgba(255,184,0,.15);
      color: #ffb800;
      width: 24px;
      height: 24px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      font-weight: bold;
      flex-shrink: 0;
    }

    /* Code Blocks */
    .code-block {
      background: #0d0c09;
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 24px;
      border: 1px solid rgba(255,255,255,.1);
    }
    .code-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px 16px;
      background: rgba(255,255,255,.05);
      border-bottom: 1px solid rgba(255,255,255,.05);
    }
    .code-language {
      font-size: 12px;
      text-transform: uppercase;
      color: rgba(255,255,255,.5);
      font-weight: 700;
    }
    .copy-btn {
      background: transparent;
      border: none;
      color: rgba(255,255,255,.5);
      cursor: pointer;
      transition: color 0.2s;
    }
    .copy-btn:hover { color: #fff; }
    .code-block pre {
      padding: 16px;
      margin: 0;
      overflow-x: auto;
      color: #e5e5e5;
      font-family: 'Courier New', Courier, monospace;
      font-size: 14px;
    }
    .code-explanation {
      font-size: 14px;
      color: rgba(255,255,255,.6);
      margin-top: 8px;
      font-style: italic;
    }

    /* Topology Diagram (Simplified CSS representation) */
    .topology-card {
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.1);
      border-radius: 16px;
      padding: 24px;
      margin-bottom: 24px;
      overflow-x: auto;
    }
    .topology-diagram {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 40px;
      padding: 40px 20px 100px;
      background: rgba(0,0,0,.2);
      border-radius: 12px;
      margin: 20px 0;
      position: relative;
      min-width: 500px;
    }
    .router {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: #0ea5e9;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      position: relative;
      z-index: 2;
      box-shadow: 0 0 20px rgba(14, 165, 233, 0.3);
      border: 2px solid rgba(255,255,255,.2);
    }
    .router-icon { font-size: 16px; }
    .router-info {
      position: absolute;
      top: 90px;
      width: 140px;
      text-align: center;
      font-size: 11px;
      color: rgba(255,255,255,.7);
      background: rgba(0,0,0,.6);
      padding: 4px;
      border-radius: 4px;
    }
    .connection {
      flex: 1;
      height: 2px;
      background: #555;
      position: relative;
      min-width: 60px;
    }
    .connection-label {
      position: absolute;
      top: -20px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 11px;
      color: #aaa;
      white-space: nowrap;
    }
    .network-label {
      position: absolute;
      bottom: -40px;
      font-size: 12px;
      color: #fbbf24;
    }

    /* Config Grid */
    .config-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 24px;
    }
    @media (max-width: 768px) { .config-grid { grid-template-columns: 1fr; } }
    .config-card {
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.1);
      border-radius: 16px;
      padding: 16px;
    }
    .router-indicator {
      display: inline-block;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin-right: 8px;
    }
    .router-indicator.r1 { background: #0ea5e9; }
    .router-indicator.r2 { background: #0ea5e9; }

    /* Routing Tables */
    .routing-tables {
      display: grid;
      gap: 20px;
      grid-template-columns: 1fr;
    }
    @media (min-width: 768px) {
      .routing-tables { grid-template-columns: 1fr 1fr; }
    }
    .routing-table {
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.1);
      border-radius: 16px;
      padding: 16px;
    }
    .terminal {
      background: #000;
      color: #0f0;
      font-family: monospace;
      padding: 12px;
      border-radius: 8px;
      margin: 10px 0;
      border: 1px solid #333;
    }

    /* Tips & Warnings */
    .tips-warnings-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 24px;
    }
    @media (max-width: 640px) { .tips-warnings-grid { grid-template-columns: 1fr; } }
    .tip-card {
      background: rgba(16, 185, 129, 0.1);
      border: 1px solid rgba(16, 185, 129, 0.2);
      border-radius: 16px;
      padding: 20px;
    }
    .warning-card {
      background: rgba(239, 68, 68, 0.1);
      border: 1px solid rgba(239, 68, 68, 0.2);
      border-radius: 16px;
      padding: 20px;
    }
    .card-header {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 12px;
      font-size: 18px;
      font-weight: bold;
    }
    .tip-header { color: #34d399; }
    .warning-header { color: #f87171; }
    .tip-list, .warning-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .tip-list li, .warning-list li {
      margin-bottom: 8px;
      display: flex;
      gap: 10px;
      font-size: 14px;
    }

    /* Share */
    .share-section {
      margin-top: 40px;
      padding-top: 20px;
      border-top: 1px solid rgba(255,255,255,.1);
    }
    .share-card {
      background: rgba(255,255,255,.03);
      border-radius: 16px;
      padding: 20px;
      text-align: center;
    }
    .share-header {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      margin-bottom: 16px;
      color: #fff;
    }
    .share-buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
      flex-wrap: wrap;
    }
    .share-btn {
      border: none;
      padding: 8px 16px;
      border-radius: 8px;
      cursor: pointer;
      color: white;
      font-size: 13px;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: opacity 0.2s;
    }
    .share-btn:hover { opacity: 0.9; }
    .share-btn.twitter { background: #1da1f2; }
    .share-btn.linkedin { background: #0077b5; }
    .share-btn.facebook { background: #1877f2; }
    .share-btn.copy { background: #4b5563; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        initTOC();
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

        headings.forEach((heading, index) => {
            if (!heading.id) heading.id = 'section-' + (index + 1);
            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#' + heading.id;
            a.className = 'sb-toc__link';
            a.textContent = heading.textContent;
            li.appendChild(a);
            tocContainer.appendChild(li);
        });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.id;
                    document.querySelectorAll('.sb-toc__link').forEach(link => {
                        link.classList.toggle('is-active', link.getAttribute('href') === '#' + id);
                    });
                }
            });
        }, { rootMargin: '-100px 0px -60% 0px' });

        headings.forEach(h => observer.observe(h));
    }

    function copyCode(btn) {
        const pre = btn.closest('.code-block').querySelector('pre');
        navigator.clipboard.writeText(pre.textContent).then(() => {
            const original = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-check"></i>';
            setTimeout(() => btn.innerHTML = original, 2000);
        });
    }
</script>
</head>

<body class="bg-[#0c0b09] text-white antialiased selection:bg-yellow-500/30">

<?php include(__DIR__ . '/../includes/navbar.php'); ?>

  <main class="sb-page">
    <div class="sb-wrap">
      <div class="sb-shell">

        <!-- HERO -->
        <header class="sb-hero">
          <a href="<?php echo $base_url; ?>categories/networking.php" class="sb-badge">
            <div class="sb-dot"></div>
            <span class="sb-badge__text">Networking</span>
          </a>
          <h1 class="sb-title">Static Routing Explained: Configuration, Floating Routes, and Real-World Examples</h1>
          
          <div class="sb-meta">
            <div class="sb-meta__item">
              <i class="ri-calendar-line"></i>
              <span>June 2025</span>
            </div>
            <div class="sb-meta__item">
              <i class="ri-time-line"></i>
              <span>8 min read</span>
            </div>
            <div class="sb-meta__item">
              <i class="ri-user-3-line"></i>
              <span>The Blog Ship</span>
            </div>
          </div>
        </header>

        <!-- GRID -->
        <div class="sb-grid">
          
          <!-- ARTICLE -->
          <article class="sb-article">
            <div class="sb-prose">

 <h2>Introduction</h2>
 <p>Ever wondered how routers know where to send your data when there's no dynamic routing protocol in place? That's where static routing comes in! Unlike dynamic routing, static routes are manually configured, making them simple yet powerful for small networks or backup paths.</p>
 <p>In this guide, we'll break down static routing, how to configure it, and even explore floating static routes - a clever way to set up backup paths. Let's dive in!</p>

 <h2>What is Static Routing?</h2>
 <p>Static routing involves manually adding routes to a router's routing table. Since these routes don't adapt to network changes, they're called "non-adaptive routing."</p>

 <div class="info-card">
 <h3>Key Features:</h3>
 <ul class="feature-list">
 <li><strong>AD (Administrative Distance):</strong> Default is 1 (highly trusted)</li>
 <li><strong>Metric:</strong> Often 0 (since no cost calculation is needed)</li>
 </ul>
 </div>

 <h3>Basic Static Route Syntax:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>ip route [Network ID] [Subnet Mask] [Next-Hop IP]</code></pre>
 </div>
 <p>Example:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>ip route 192.168.10.0 255.255.255.0 12.1.1.2</code></pre>
 </div>
 <p class="code-explanation">This tells the router: "To reach 192.168.10.0/24, send traffic to 12.1.1.2."</p>


 <h2>Network Topology Configuration</h2>

 <!-- Network Topology Diagram -->
 <div class="topology-card">
 <h3>Network Topology</h3>
 <div class="topology-diagram">
 <div class="router r1">
 <div class="router-icon">R1</div>
 <div class="router-info">
 <div>Fa0/0: 192.168.10.1</div>
 <div>S2/0: 12.1.1.1</div>
 </div>
 <div class="network-label">Network: 192.168.10.0/24</div>
 </div>

 <div class="connection">
 <div class="connection-line"></div>
 <div class="connection-label">Serial Link</div>
 <div class="connection-line"></div>
 </div>

 <div class="router r2">
 <div class="router-icon">R2</div>
 <div class="router-info">
 <div>S2/0: 12.1.1.2</div>
 <div>Fa0/0: 192.168.20.1</div>
 </div>
 <div class="network-label">Network: 192.168.20.0/24</div>
 </div>
 </div>
 <div class="serial-info">
 <strong>Serial Connection:</strong> 12.1.1.0/8
 </div>
 </div>

 <!-- Router Configurations -->
 <div class="config-grid">
 <div class="config-card r1-config">
 <h3><span class="router-indicator r1"></span>Router R1 Configuration:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>interface Serial2/0
 ip address 12.1.1.1 255.0.0.0
 no shutdown

interface FastEthernet0/0
 ip address 192.168.10.1 255.255.255.0
 no shutdown

ip route 192.168.20.0 255.255.255.0 12.1.1.2 100</code></pre>
 </div>
 </div>

 <div class="config-card r2-config">
 <h3><span class="router-indicator r2"></span>Router R2 Configuration:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>interface Serial2/0
 ip address 12.1.1.2 255.0.0.0
 no shutdown

interface FastEthernet0/0
 ip address 192.168.20.1 255.255.255.0
 no shutdown

ip route 192.168.10.0 255.255.255.0 12.1.1.1</code></pre>
 </div>
 </div>
 </div>

 <h2>Floating Static Routes: The Backup Plan</h2>
 <p>What if your primary route fails? A floating static route acts as a backup by using a higher AD (less preferred).</p>

 <div class="floating-routes-card">
 <h3>How It Works:</h3>
 <div class="steps-list">
 <div class="step">
 <span class="step-number">1</span>
 <span>Primary route (e.g., learned via OSPF) has a lower AD (e.g., 110)</span>
 </div>
 <div class="step">
 <span class="step-number">2</span>
 <span>Backup static route has a higher AD (e.g., 100+) and only activates if the primary fails</span>
 </div>
 </div>
 </div>

 <h3>Syntax:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>ip route [Network ID] [Subnet Mask] [Next-Hop IP] [AD]</code></pre>
 </div>
 <p>Example:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>ip route 192.168.10.0 255.255.255.0 12.1.1.2 100</code></pre>
 </div>
 <p class="code-explanation">This route stays inactive unless the primary route goes down.</p>


 <h2>Real-World Example: Router Configurations</h2>
 <img src="<?php echo $base_url; ?>/blogs/images/staticrouting/staticroutingtopology.webp" alt="Floating Static Routing Table">

 <p>Let's look at the provided router outputs:</p>

 <div class="routing-tables">
 <div class="routing-table r1-table">
 <img src="<?php echo $base_url; ?>/blogs/images/staticrouting/showflotingstatic.webp" alt="Floating Static Routing Table">

 <h3>R1's Routing Table:</h3>
 <div class="terminal">
 <div class="terminal-content">S 192.168.20.0/24 [100/0] via 12.1.1.2</div>
 </div>
 <div class="table-explanation">
 <p><strong>AD = 100</strong> → This is a floating static route (backup)</p>
 <p><strong>Metric = 0</strong> → No cost associated</p>
 </div>
 </div>

 <div class="routing-table r2-table">
 <img src="<?php echo $base_url; ?>/blogs/images/staticrouting/showstatic.webp" alt="Floating Static Routing Table">

 <h3>R2's Routing Table:</h3>
 <div class="terminal">
 <div class="terminal-content">S 192.168.10.0/24 [1/0] via 12.1.1.1</div>
 </div>
 <div class="table-explanation">
 <p><strong>AD = 1</strong> → Standard static route (primary)</p>
 </div>
 </div>
 </div>


 <h2>Tips & Warnings</h2>

 <div class="tips-warnings-grid">
 <div class="tip-card">
 <div class="card-header tip-header">
 <i class="fas fa-lightbulb"></i>
 <h3>Best Practices</h3>
 </div>
 <ul class="tip-list">
 <li><i class="fas fa-check"></i>Use static routes in small networks - they're simple but don't scale well</li>
 <li><i class="fas fa-check"></i>Floating routes need a higher AD than dynamic routes (e.g., OSPF=110, so set AD=120)</li>
 </ul>
 </div>

 <div class="warning-card">
 <div class="card-header warning-header">
 <i class="fas fa-exclamation-triangle"></i>
 <h3>Common Pitfalls</h3>
 </div>
 <ul class="warning-list">
 <li><i class="fas fa-exclamation"></i>Avoid typos in IPs/subnets! A wrong entry can break connectivity</li>
 <li><i class="fas fa-exclamation"></i>Remember that static routes don't adapt to network changes automatically</li>
 </ul>
 </div>
 </div>
 </section>

 <!-- Conclusion Section -->
 <section id="conclusion" class="content-section">
 <h2>Conclusion</h2>
 <div class="conclusion-card">
 <p>Static routing is a fundamental skill for network admins. Whether you're setting up a basic network or adding backup routes with floating static configurations, mastering this ensures reliability in your infrastructure.</p>
 <p class="conclusion-emphasis">Try it in a lab (like Packet Tracer) and see how it works!</p>
 </div>
 </section>

 <!-- What's Next Section -->
 <section id="whats-next" class="content-section">
 <div class="next-steps-card">
 <h2>What's Next?</h2>
 <div class="next-steps-list">
 <a href="<?php echo $base_url; ?>blogs/defaultstaticrouting.php">
 <div class="next-step">
 <i class="fas fa-book-open"></i>
 <div class="step-content">
 <h3>Default Routing and Default Floating Routes</h3>
 <p>Learn the differences and when to use each approach</p>
 </div>
 <i class="fas fa-arrow-right"></i>
 </div>
</a>
 <a href="<?php echo $base_url; ?>blogs/serverinstallation.php">
 <div class="next-step">
 <i class="fas fa-cog"></i>
 <div class="step-content">
 <h3>How to Install Server</h3>
 <p>Step-by-step guide to install Windows Server 2022</p>
 </div>
 <i class="fas fa-arrow-right"></i>
 </div>
 </a>
 <a href="<?php echo $base_url; ?>blogs/basicserverconfig.php">
 <div class="next-step">
 <i class="fas fa-exclamation-circle"></i>
 <div class="step-content">
 <h3>Basic Steps After Deploying a Server</h3>
 <p>Guide to properly configure a new Windows Server</p>
 </div>
 <i class="fas fa-arrow-right"></i>
 </div>
 </a>
 </div>
 </div>

 <div class="share-section">
 <div class="share-card">
 <div class="share-header">
 <i class="fas fa-share-alt"></i>
 <h3>Share This Article</h3>
 </div>
 <div class="share-buttons">
 <button class="share-btn twitter" onclick="shareOnTwitter()">
 <i class="fab fa-twitter"></i>
 Twitter
 </button>
 <button class="share-btn linkedin" onclick="shareOnLinkedIn()">
 <i class="fab fa-linkedin"></i>
 LinkedIn
 </button>
 <button class="share-btn facebook" onclick="shareOnFacebook()">
 <i class="fab fa-facebook"></i>
 Facebook
 </button>
 <button class="share-btn copy" onclick="copyToClipboard()">
 <i class="fas fa-link"></i>
 Copy Link
 </button>
 </div>
 </div>
 </div>
            </div>
          </article>

          <!-- SIDEBAR -->
          <aside class="sb-sidebar">
            <div class="sb-toc">
              <div class="sb-toc__title">On this page</div>
              <ul class="sb-toc__list" id="sbTocList">
                <!-- JS populates this -->
              </ul>
            </div>
          </aside>

        </div>
      </div>
    </div>
  </main>

  <?php include(__DIR__ . '/../includes/footer.php'); ?>
</body>
</html>
