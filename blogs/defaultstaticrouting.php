<?php require_once __DIR__ . '/../config.php'; ?>
<?php
  $canonical_url = "https://theblogship.com/blogs/defaultstaticrouting.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
  $meta = [
    'title' => "Default Static Routing Guide | The Blog Ship",
    'description' => "Configure default static routes and floating static routes on Cisco routers with step-by-step examples and quick troubleshooting.",
    'keywords' => "default static route, floating static route, cisco, networking, CCNA, routing table, configuration, network admin, static routing, OSPF, troubleshooting, route redistribution",
    'canonical' => $canonical_url,
    'type' => "article",
  ];
  include __DIR__ . '/../includes' . '/meta.php';
  ?>
  <?php include __DIR__ . '/../includes' . '/header.php'; ?>

  <style>
    /* =========================================================
       PREMIUM GLASS UI SYSTEM
    ========================================================= */
    :root {
      --primary: #C084FC;
      --bg-dark: #0c0b09;
      --glass-surface: rgba(255, 255, 255, 0.03);
      --glass-border: rgba(255, 255, 255, 0.08);
      --glass-highlight: rgba(255, 255, 255, 0.15);
      --text-body: rgba(255, 255, 255, 0.85);
      --text-muted: rgba(255, 255, 255, 0.55);
      --font-heading: 'Inter', system-ui, -apple-system, sans-serif;
      --font-body: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .sb-page {
      min-height: calc(100vh - 98px);
      position: relative;
      overflow-x: hidden;
      background-color: var(--bg-dark);
      font-family: var(--font-body);
      color: var(--text-body);
    }

    /* Background System */
    .sb-page::before {
      content: "";
      position: fixed;
      inset: 0;
      z-index: 0;
      pointer-events: none;
      background:
        radial-gradient(circle at 15% 50%, rgba(192, 132, 252, 0.08), transparent 25%),
        radial-gradient(circle at 85% 30%, rgba(96, 165, 250, 0.05), transparent 25%),
        linear-gradient(180deg, rgba(12, 11, 9, 0) 0%, #0c0b09 100%);
      background-attachment: fixed;
    }

    /* Layout Shell */
    .sb-wrap {
      position: relative;
      z-index: 1;
      padding: 140px 24px 80px;
    }

    .sb-shell {
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
    }
    @media (max-width: 768px) {
      .sb-wrap { padding: 100px 20px 60px; }
    }

    /* Hero */
    .sb-hero {
      text-align: center;
      max-width: 900px;
      margin: 0 auto 64px;
    }

    .sb-badge {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 8px 16px;
      border-radius: 999px;
      border: 1px solid var(--glass-border);
      background: var(--glass-surface);
      backdrop-filter: blur(10px);
      margin-bottom: 32px;
      text-decoration: none;
      transition: all 0.2s ease;
    }
    .sb-badge:hover {
      background: rgba(255,255,255,.08);
      border-color: var(--glass-highlight);
      transform: translateY(-2px);
    }

    .sb-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--primary);
      box-shadow: 0 0 12px var(--primary);
    }

    .sb-badge__text {
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      color: var(--text-body);
    }

    .sb-title {
      font-family: var(--font-heading);
      font-size: clamp(36px, 5vw, 64px);
      font-weight: 800;
      letter-spacing: -0.02em;
      line-height: 1.15;
      color: #fff;
      margin-bottom: 24px;
      text-shadow: 0 0 40px rgba(0,0,0,0.5);
    }

    .sb-meta {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 24px;
      flex-wrap: wrap;
      color: var(--text-muted);
      font-size: 15px;
      font-weight: 500;
    }

    .sb-meta__item {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .sb-meta__item i { color: var(--primary); }

    /* Grid */
    .sb-grid {
      display: grid;
      grid-template-columns: 1fr 320px;
      gap: 64px;
      align-items: start;
    }
    @media (max-width: 980px) {
      .sb-grid { grid-template-columns: 1fr; }
    }

    /* Article */
    .sb-article {
      min-width: 0;
    }

    /* Prose */
    .sb-prose {
      color: var(--text-body);
      font-size: 18px;
      line-height: 1.8;
    }
    .sb-prose h2 {
      font-family: var(--font-heading);
      font-size: 32px;
      font-weight: 700;
      color: #fff;
      margin: 64px 0 24px;
      letter-spacing: -0.02em;
      scroll-margin-top: 120px;
      position: relative;
      display: inline-block;
    }
    .sb-prose h2::after {
      content: "";
      display: block;
      width: 40px;
      height: 4px;
      background: var(--primary);
      margin-top: 12px;
      border-radius: 2px;
    }

    .sb-prose h3 {
      font-size: 24px;
      font-weight: 600;
      color: #fff;
      margin: 40px 0 16px;
      scroll-margin-top: 120px;
    }
    .sb-prose p { margin-bottom: 24px; }
    .sb-prose ul, .sb-prose ol {
      margin-bottom: 24px;
      padding-left: 24px;
      color: var(--text-muted);
    }
    .sb-prose li { margin-bottom: 12px; }
    .sb-prose li::marker { color: var(--primary); }
    .sb-prose strong { color: #fff; font-weight: 600; }
    .sb-prose a {
      color: var(--primary);
      text-decoration: none;
      border-bottom: 1px solid rgba(192, 132, 252, 0.4);
      transition: all 0.2s;
    }
    .sb-prose a:hover { border-bottom-color: var(--primary); background: rgba(192, 132, 252, 0.1); }
    .sb-prose img {
      width: 100%;
      height: auto;
      border-radius: 12px;
      border: 1px solid var(--glass-border);
      margin: 40px 0;
      background: rgba(0,0,0,.3);
      box-shadow: 0 20px 40px -10px rgba(0,0,0,0.5);
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

    /* Custom "Step" Cards */
    .step-container {
      display: flex;
      gap: 24px;
      background: var(--glass-surface);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 32px;
      margin-bottom: 40px;
      transition: transform 0.3s ease, border-color 0.3s ease;
    }
    .step-container:hover {
      transform: translateY(-4px);
      border-color: var(--glass-highlight);
      background: rgba(255,255,255,0.04);
    }
    @media (max-width: 640px) {
      .step-container { padding: 24px; gap: 16px; flex-direction: column; }
    }
    .step-number {
      flex-shrink: 0;
      width: 48px;
      height: 48px;
      border-radius: 14px;
      background: rgba(192, 132, 252, 0.1);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 20px;
      border: 1px solid rgba(192, 132, 252, 0.2);
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    .step-content { flex: 1; min-width: 0; }
    .step-content h3 { margin-top: 0; font-size: 20px; color: #fff; margin-bottom: 12px; }
    .step-content p:last-child { margin-bottom: 0; }

    /* Callouts */
    .raid-feature, .best-for {
      background: linear-gradient(90deg, rgba(192, 132, 252, 0.05) 0%, transparent 100%);
      border-left: 3px solid var(--primary);
      padding: 24px;
      border-radius: 4px 12px 12px 4px;
      margin: 40px 0;
      font-size: 16px;
      color: #fff;
    }
    .raid-feature p, .best-for p { margin: 0; }

    /* Terminal */
    .bs-terminal {
      background: #000;
      color: #0f0;
      font-family: monospace;
      padding: 16px;
      border-radius: 8px;
      margin: 16px 0;
      border: 1px solid #333;
      font-size: 14px;
    }

    /* Sidebar (TOC) */
    .sb-sidebar {
      position: sticky;
      top: 140px;
      height: fit-content;
    }
    @media (max-width: 980px) {
      .sb-sidebar { display: none; }
    }
    .sb-toc {
      background: var(--glass-surface);
      border: 1px solid var(--glass-border);
      border-radius: 16px;
      padding: 32px 24px;
      backdrop-filter: blur(12px);
    }
    .sb-toc__title {
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      color: var(--text-muted);
      font-weight: 600;
      margin-bottom: 24px;
    }
    .sb-toc__list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    .sb-toc__link {
      display: block;
      padding: 6px 0;
      color: var(--text-muted);
      text-decoration: none;
      font-size: 14px;
      transition: all 0.2s;
      border-left: 2px solid transparent;
      padding-left: 12px;
      margin-left: -14px;
    }
    .sb-toc__link:hover {
      color: #fff;
      border-left-color: var(--glass-highlight);
    }
    .sb-toc__link.is-active {
      color: var(--primary);
      border-left-color: var(--primary);
      font-weight: 500;
    }

    /* Next Steps */
    .next-steps-card {
      margin-top: 80px;
      padding-top: 60px;
      border-top: 1px solid var(--glass-border);
    }
    .next-step {
      display: flex;
      align-items: center;
      gap: 20px;
      padding: 24px;
      background: var(--glass-surface);
      border: 1px solid var(--glass-border);
      border-radius: 16px;
      margin-bottom: 16px;
      transition: all 0.2s;
      text-decoration: none;
    }
    .next-step:hover {
      transform: translateX(4px);
      background: rgba(255,255,255,.05);
      border-color: var(--glass-highlight);
    }
    .next-step i { color: var(--primary); font-size: 24px; }
    .next-step h3 { margin: 0 0 6px; font-size: 18px; color: #fff; font-weight: 600; }
    .next-step p { margin: 0; font-size: 14px; color: var(--text-muted); }

    /* Topology Diagram Styles */
    .bs-topology {
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.1);
      border-radius: 16px;
      padding: 24px;
      margin-bottom: 24px;
    }
    .bs-topoGrid {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
      padding: 20px 0;
    }
    .bs-router {
      text-align: center;
    }
    .bs-routerIcon {
      width: 60px;
      height: 60px;
      background: #0ea5e9;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      margin: 0 auto 10px;
      box-shadow: 0 0 15px rgba(14, 165, 233, 0.3);
    }
    .bs-routerInfo {
      font-size: 12px;
      color: var(--text-muted);
      background: rgba(0,0,0,0.3);
      padding: 8px;
      border-radius: 6px;
    }
    .bs-conn {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-width: 100px;
    }
    .bs-line {
      height: 2px;
      width: 100%;
      background: #555;
    }
    .bs-connLabel {
      font-size: 12px;
      color: #fbbf24;
      margin: 5px 0;
    }
  </style>
</head>

<body class="sb-page">

  <?php include(__DIR__ . '/../includes/navbar.php'); ?>

  <div class="sb-wrap">
    <div class="sb-shell">
      
      <!-- Hero -->
      <header class="sb-hero">
        <div class="sb-badge">
          <span class="sb-dot"></span>
          <span class="sb-badge__text">Networking</span>
        </div>
        <h1 class="sb-title">Understanding Default Static Routing: A Quick Guide</h1>
        <div class="sb-meta">
          <div class="sb-meta__item">
            <i class="far fa-calendar-alt"></i>
            <span>June 2025</span>
          </div>
          <div class="sb-meta__item">
            <i class="far fa-clock"></i>
            <span data-reading></span>
          </div>
          <div class="sb-meta__item">
            <i class="fas fa-user"></i>
            <span>Network Admin</span>
          </div>
        </div>
      </header>

      <div class="sb-grid">
        <!-- Article -->
        <article class="sb-article">
          <div class="sb-prose">
        <!-- Introduction -->
          <h2>Introduction</h2>
          <p>Ever wondered how routers handle traffic when there's no specific route in the routing table? That's where <strong>default static routing</strong> comes in! It's a lifesaver for directing packets when no other path matches.</p>
          <p>In this guide, we'll break down how default static routes work, how to configure them, and even set up a <strong>floating static route</strong> for backup. Let's dive in!</p>

        <!-- What is Default Static Route -->
          <h2>What is a Default Static Route?</h2>
          <p>A default static route is a special manually configured route that acts as a <strong>catch-all</strong> for traffic when no other route matches. Key points:</p>

          <div class="raid-feature">
            <h3>Key Features</h3>
            <ul>
              <li>Represented as <strong>S*</strong> in the routing table</li>
              <li>Uses <code>0.0.0.0 0.0.0.0</code> to match <strong>all networks and hosts</strong></li>
              <li>Default <strong>Administrative Distance (AD) is 1</strong> (lower = more trusted)</li>
              <li>Acts as a gateway of last resort</li>
            </ul>
          </div>

          <div class="bs-topology">
            <h3 style="margin-top:0; color:#fff;">Network Topology</h3>
            <div class="bs-topoGrid">
              <div class="bs-router">
                <div class="bs-routerIcon">R1</div>
                <div class="bs-routerInfo">
                  <div><strong>Fa0/0:</strong> 192.168.10.1</div>
                  <div><strong>S2/0:</strong> 12.1.1.1</div>
                </div>
              </div>

              <div class="bs-conn">
                <div class="bs-line"></div>
                <div class="bs-connLabel">Serial Link</div>
                <div class="bs-line"></div>
              </div>

              <div class="bs-router">
                <div class="bs-routerIcon">R2</div>
                <div class="bs-routerInfo">
                  <div><strong>S2/0:</strong> 12.1.1.2</div>
                  <div><strong>Fa0/0:</strong> 192.168.20.1</div>
                </div>
              </div>
            </div>
          </div>

        <!-- Configuration -->
          <h2>Configuring Default Static Routes</h2>
          <p>There are <strong>two ways</strong> to set up a default static route:</p>

          <div class="step-container">
            <div class="step-number">1</div>
            <div class="step-content">
              <h3>Option 1: Using Next-Hop IP</h3>
              <div class="code-block">
                <div class="code-header">
                  <span class="code-language">Cisco IOS</span>
                  <button class="copy-btn" type="button" onclick="copyCode(this)">
                    <i class="fas fa-copy"></i>
                  </button>
                </div>
                <pre><code>ip route 0.0.0.0 0.0.0.0 12.1.1.2</code></pre>
              </div>
              <p><strong>12.1.1.2</strong> is the next-hop router. Traffic with no matching route will go here.</p>
            </div>
          </div>

          <div class="step-container">
            <div class="step-number">2</div>
            <div class="step-content">
              <h3>Option 2: Using Exit Interface</h3>
              <div class="code-block">
                <div class="code-header">
                  <span class="code-language">Cisco IOS</span>
                  <button class="copy-btn" type="button" onclick="copyCode(this)">
                    <i class="fas fa-copy"></i>
                  </button>
                </div>
                <pre><code>ip route 0.0.0.0 0.0.0.0 Serial2/0</code></pre>
              </div>
              <p>Directs traffic out <strong>Serial2/0</strong> instead of specifying an IP.</p>
            </div>
          </div>

          <div class="raid-feature">
            <h3>Verification</h3>
            <p>Check your routing table with:</p>
            <div class="code-block">
              <div class="code-header">
                <span class="code-language">Cisco IOS</span>
                <button class="copy-btn" type="button" onclick="copyCode(this)">
                  <i class="fas fa-copy"></i>
                </button>
              </div>
              <pre><code>show ip route</code></pre>
            </div>
            <p>You should see:</p>
            <div class="bs-terminal">
              S* 0.0.0.0/0 [1/0] via 12.1.1.2
            </div>
            <p>The <code>[1/0]</code> shows AD=1 and metric=0.</p>
          </div>

        <!-- Floating Routes -->
          <h2>Floating Default Static Route (Backup Route)</h2>
          <p>What if your primary route fails? A <strong>floating default static route</strong> can act as a backup by using a <strong>higher AD</strong>.</p>

          <div class="raid-feature">
            <h3>How It Works</h3>
            <ul>
              <li><strong>1.</strong> Primary route (e.g., OSPF) has lower AD (e.g., 110)</li>
              <li><strong>2.</strong> Backup default static route has higher AD (e.g., 100) and only activates if primary fails</li>
            </ul>
          </div>

          <h3>Syntax:</h3>
          <div class="code-block">
            <div class="code-header">
              <span class="code-language">Cisco IOS</span>
              <button class="copy-btn" type="button" onclick="copyCode(this)">
                <i class="fas fa-copy"></i>
              </button>
            </div>
            <pre><code>ip route 0.0.0.0 0.0.0.0 12.1.1.2 100</code></pre>
          </div>

          <div class="raid-feature">
            <h3>Verification</h3>
            <img src="<?php echo $base_url; ?>/blogs/images/defaultstaticrouting/flotingdefault.webp" alt="Floating Static Routing Table">
            <div class="bs-terminal">
              S* 0.0.0.0/0 [100/0] via 12.1.1.2
            </div>
            <p>The <code>[100/0]</code> shows this is a backup route (AD=100).</p>
          </div>

          <div class="best-for">
            <h3>Important Warning</h3>
            <ul>
              <li>Avoid using default static routes in <strong>high-security networks</strong> - dynamic routing is safer</li>
              <li>Make sure your backup AD is higher than primary routes</li>
              <li>Test failover scenarios in lab environments first</li>
            </ul>
          </div>

        <!-- Real-World Example -->
          <h2>Real-World Example: Router Configurations</h2>
          <img src="<?php echo $base_url; ?>/blogs/images/defaultstaticrouting/defaultstatictopology.webp" alt="Network Topology">

          <p>Let's look at the provided router outputs:</p>

          <div class="step-container">
            <div class="step-content">
              <h3>R1's Routing Table</h3>
              <img src="<?php echo $base_url; ?>/blogs/images/defaultstaticrouting/defaultip.webp" alt="R1 Routing Table">
              <div class="bs-terminal">
                S* 0.0.0.0/0 [1/0] via 12.1.1.2
              </div>
              <div style="margin-top: 12px;">
                <p><strong>AD = 100</strong> → This is a default floating static route (backup)</p>
                <p><strong>Metric = 0</strong> → No cost associated</p>
              </div>
            </div>
          </div>

          <div class="step-container">
            <div class="step-content">
              <h3>R2's Routing Table</h3>
              <img src="<?php echo $base_url; ?>/blogs/images/defaultstaticrouting/defaultseriel.webp" alt="R2 Routing Table">
              <div class="bs-terminal">
                S* 0.0.0.0/0 [1/0] via Serial2/0
              </div>
              <div style="margin-top: 12px;">
                <p><strong>AD = 1</strong> → Standard default static route (primary)</p>
                <p><strong>Exit Interface</strong> → Directs traffic to Serial2/0</p>
              </div>
            </div>
          </div>

        <!-- Conclusion -->
          <h2>Conclusion</h2>
          <p>Default static routes are <strong>simple yet powerful</strong> for managing unmatched traffic. Whether you're using a next-hop IP or exit interface, or even setting up a backup with a floating route, this guide should help you configure it with confidence.</p>
          
          <div class="raid-feature">
            <p><strong>Pro Tip:</strong> Always test your routes in a lab environment before deploying to production! Use tools like Packet Tracer or GNS3 for safe testing.</p>
          </div>

        <!-- What's Next -->
        <div class="next-steps-card">
          <h2>What's Next?</h2>
          <div class="next-steps-list">
            <a href="<?php echo $base_url; ?>blogs/staticrouting.php" class="next-step">
              <i class="fas fa-book-open"></i>
              <div class="step-content">
                <h3>Static Routing and Floating Routes</h3>
                <p>Learn the differences and when to use each approach</p>
              </div>
              <i class="fas fa-arrow-right"></i>
            </a>

            <a href="<?php echo $base_url; ?>blogs/serverinstallation.php" class="next-step">
              <i class="fas fa-cog"></i>
              <div class="step-content">
                <h3>How to Install Server</h3>
                <p>Step-by-step guide to install Windows Server 2022</p>
              </div>
              <i class="fas fa-arrow-right"></i>
            </a>

            <a href="<?php echo $base_url; ?>blogs/basicserverconfig.php" class="next-step">
              <i class="fas fa-exclamation-circle"></i>
              <div class="step-content">
                <h3>Basic Steps After Deploying a Server</h3>
                <p>Guide to properly configure a new Windows Server</p>
              </div>
              <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>

          </div> <!-- /sb-prose -->
        </article>

        <aside class="sb-sidebar" aria-label="Table of contents">
          <div class="sb-toc">
            <div class="sb-toc__title">On this page</div>
            <nav id="sb-toc" class="sb-toc__list"></nav>
          </div>
        </aside>
      </div>
    </div>
  </div>

  <?php include(__DIR__ . '/../includes/footer.php'); ?>

  <script>
/* ============================
   Blog Page (inline, per-file)
   - Builds TOC from h2/h3
   - Sets reading time
============================ */
(() => {
  const root = document.querySelector('.sb-prose');
  const toc  = document.getElementById('sb-toc');
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
      a.className = 'sb-toc__link';
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

function copyCode(btn) {
  const pre = btn.closest('.code-block').querySelector('pre');
  navigator.clipboard.writeText(pre.textContent).then(() => {
    const original = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-check"></i>';
    setTimeout(() => btn.innerHTML = original, 2000);
  });
}
</script>
</body>
</html>
