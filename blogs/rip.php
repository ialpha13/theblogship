<?php require_once __DIR__ . '/../config.php'; ?>
<?php
$page_url = "https://theblogship.com/blogs/rip.php";
$page_title = "Understanding RIP - Configuration, Compatibility, and Best Practices";
$page_description = "A complete guide to Routing Information Protocol (RIP): configuration, RIPv1 vs RIPv2, compatibility, administrative distance, and real-world examples for CCNA and networking beginners.";
$page_keywords = "RIP, Routing Information Protocol, RIPv1, RIPv2, CCNA, networking, routing protocols, administrative distance, Cisco, dynamic routing, network configuration";
$page_image = "https://theblogship.com/blogs/images/rip/riptopology.webp";
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <?php
 $meta = [
 'title' => "<?php echo htmlspecialchars($page_title); ?>",
 'description' => "<?php echo htmlspecialchars($page_description); ?>",
 'keywords' => "<?php echo htmlspecialchars($page_keywords); ?>",
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
      --primary: #A78BFA;
      --secondary: #FBBF24;
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
        radial-gradient(circle at 15% 50%, rgba(167, 139, 250, 0.08), transparent 25%),
        radial-gradient(circle at 85% 30%, rgba(251, 191, 36, 0.05), transparent 25%),
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
      border-bottom: 1px solid rgba(167, 139, 250, 0.4);
      transition: all 0.2s;
    }
    .sb-prose a:hover { border-bottom-color: var(--primary); background: rgba(167, 139, 250, 0.1); }
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

    /* Callouts */
    .raid-feature, .best-for {
      background: linear-gradient(90deg, rgba(167, 139, 250, 0.05) 0%, transparent 100%);
      border-left: 3px solid var(--primary);
      padding: 24px;
      border-radius: 4px 12px 12px 4px;
      margin: 40px 0;
      font-size: 16px;
      color: #fff;
    }
    .raid-feature p, .best-for p { margin: 0; }

    /* Config Grid */
    .config-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      margin-bottom: 40px;
    }
    @media (max-width: 640px) {
      .config-grid { grid-template-columns: 1fr; }
    }
    .config-card {
      background: var(--glass-surface);
      border: 1px solid var(--glass-border);
      border-radius: 16px;
      padding: 24px;
    }
    .config-card h3 { margin-top: 0; font-size: 18px; margin-bottom: 16px; display: flex; align-items: center; gap: 10px; color: #fff; }
    .config-card ul { padding-left: 20px; margin-bottom: 0; }

    /* Topology Diagram Styles */
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

    /* Steps List */
    .steps-list {
      list-style: none;
      padding: 0;
      margin: 24px 0;
    }
    .step {
      display: flex;
      gap: 16px;
      margin-bottom: 16px;
    }
    .step-number {
      flex-shrink: 0;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: rgba(167, 139, 250, 0.15);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 14px;
      border: 1px solid rgba(167, 139, 250, 0.2);
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
        <h1 class="sb-title">Understanding RIP - Configuration, Compatibility, and Best Practices</h1>
        <div class="sb-meta">
          <div class="sb-meta__item">
            <i class="far fa-calendar-alt"></i>
            <span>June 25, 2024</span>
          </div>
          <div class="sb-meta__item">
            <i class="far fa-clock"></i>
            <span data-reading></span>
          </div>
        </div>
      </header>

      <div class="sb-grid">
        <!-- Article -->
        <article class="sb-article">
          <div class="sb-prose">
 <!-- Introduction -->
 <p>Ever wondered how routers decide the best path for your data? Routing Information Protocol (RIP) is one of the oldest yet simplest ways routers share information about network paths. Whether you're studying for certifications or setting up a small network, understanding RIP - its versions, configurations, and quirks - is essential. In this guide, we'll break down RIP's basics, how to configure it, and tips to avoid common pitfalls.</p>

 <!-- What is RIP? -->
 <h2>What is RIP?</h2>
 <p>RIP (Routing Information Protocol) is a <strong>distance-vector routing protocol</strong> that helps routers find the shortest path based on <strong>hop count</strong> (the number of devices between source and destination).</p>
 <div class="raid-feature">
 <h3>Key Features:</h3>
 <ul>
 <li>Uses <strong>hop count</strong> as its metric (max 15 hops)</li>
 <li>Default <strong>Administrative Distance (AD) is 120</strong></li>
 <li>Sends <strong>updates every 30 seconds</strong>, which can be resource-intensive</li>
 <li>Works only for <strong>15 hops</strong> maximum</li>
 </ul>
 </div>

 <div class="best-for">
 <h3>Did You Know?</h3>
 <p>RIP's 15-hop limit prevents routing loops but also restricts its use in large networks!</p>
 </div>

 <!-- RIPv1 vs RIPv2 -->
 <h2>RIPv1 vs. RIPv2 - Key Differences</h2>
 <p>RIP has two versions, and they're not fully compatible:</p>
 <div class="config-grid">
 <div class="config-card">
 <h3>RIPv1</h3>
 <ul>
 <li>Broadcast updates</li>
 <li>No subnet masks in updates</li>
 <li>No authentication</li>
 </ul>
 </div>
 <div class="config-card">
 <h3>RIPv2</h3>
 <ul>
 <li>Multicast updates</li>
 <li>Includes subnet masks</li>
 <li>Supports authentication</li>
 </ul>
 </div>
 </div>

 <h3>Syntax for Configuration:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">RIPv1 Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)"><i class="fas fa-copy"></i></button>
 </div>
 <pre><code>router rip
network 192.168.10.0</code></pre>
 </div>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">RIPv2 Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)"><i class="fas fa-copy"></i></button>
 </div>
 <pre><code>router rip
version 2
network 192.168.10.0</code></pre>
 </div>

 <div class="raid-feature">
 <h3>Why This Matters:</h3>
 <p>RIPv2 is more efficient and secure, but if you're working with older devices, you might need to make RIPv1 and RIPv2 work together.</p>
 </div>





 <!-- Network Topology Section -->
 <h2>Network Topology Configuration</h2>

 <!-- Network Topology Diagram -->
 <div class="topology-card">
 <h3>Network Topology</h3>
 <div class="topology-diagram">
 <div class="router r1">
 <div class="router-icon">R1</div>
 <div class="router-info">
 <div>Fa0/0: 192.168.10.1</div>
 <div>S5/0: 12.1.1.1</div>
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
 <div>S5/0: 12.1.1.2</div>
 <div>Fa0/0: 192.168.20.1</div>
 </div>
 <div class="network-label">Network: 192.168.20.0/24</div>
 </div>
 </div>
 </div>

 <!-- Router Configurations -->
 <div class="config-grid">
 <div class="config-card">
 <h3>Router R1 Configuration:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>interface Serial5/0
 ip address 12.1.1.1 255.0.0.0
 no shutdown

interface FastEthernet0/0
 ip address 192.168.10.1 255.255.255.0
 no shutdown

router rip
network 192.168.10.0
network 12.0.0.0

</code></pre>
 </div>
 </div>

 <div class="config-card">
 <h3>Router R2 Configuration:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>interface Serial5/0
 ip address 12.1.1.2 255.0.0.0
 no shutdown

interface FastEthernet0/0
 ip address 192.168.20.1 255.255.255.0
 no shutdown

router rip
version 2
network 192.168.20.0 network 12.0.0.0</code></pre>
 </div>
 </div>
 </div>

 <!-- Making Versions Compatible -->
 <h2>Making RIPv1 and RIPv2 Compatible</h2>
 <p>Since RIPv1 and RIPv2 don't play nice by default, you can tweak interfaces to bridge the gap:</p>
 <div class="raid-feature">
 <ul class="steps-list">
 <li class="step">
 <span class="step-number">1</span>
 <div>
 <strong>Receive v2 updates on an interface:</strong>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Interface Config</span>
 <button class="copy-btn" onclick="copyCode(this)"><i class="fas fa-copy"></i></button>
 </div>
 <pre><code>ip rip receive version 2</code></pre>
 </div>
 </div>
 </li>
 <li class="step">
 <span class="step-number">2</span>
 <div>
 <strong>Send v2 updates from an interface:</strong>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Interface Config</span>
 <button class="copy-btn" onclick="copyCode(this)"><i class="fas fa-copy"></i></button>
 </div>
 <pre><code>ip rip send version 2</code></pre>
 </div>
 </div>
 </li>
 </ul>
 </div>

 <div class="best-for">
 <h3>Warning</h3>
 <p>Mixing versions can lead to incomplete routing tables if not configured carefully!</p>
 </div>

 <!-- Changing AD Value -->
 <h2>Changing RIP's Administrative Distance (AD)</h2>
 <p>By default, RIP's AD is <strong>120</strong>, but you can increase or decrease it (e.g., to <strong>50</strong>) to deprioritize RIP routes over other protocols:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">RIP Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)"><i class="fas fa-copy"></i></button>
 </div>
 <pre><code>router rip
distance 50</code></pre>
 </div>

 <div class="raid-feature">
 <h3>When to Use This:</h3>
 <p>If you're running multiple routing protocols (like OSPF or EIGRP), adjusting AD ensures RIP doesn't override better paths.</p>
 </div>
 <!-- Added distance.webp image -->
 <div class="topology-card">
 <h3>AD Value Modification Example</h3>
 <img src="<?php echo $base_url; ?>/blogs/images/rip/distance.webp" alt="RIP AD value modification">
 <p>Example of changing RIP's Administrative Distance to 50 for specific routes.</p>
 </div>

 <!-- Real-World Example -->
 <h2>Real-World Example: RIP in Action</h2>
 <img src="<?php echo $base_url; ?>/blogs/images/rip/riptopology.webp" alt="RIP Network Topology">
 
 <div class="config-grid">
 <div class="config-card">
 <h3>R1's Routing Table</h3>
 <img src="<?php echo $base_url; ?>/blogs/images/rip/r1route.webp" alt="R1 Routing Table">
 <p>R1 knows about <strong>192.168.20.0/24</strong> via RIP (<code>[120/1]</code> = AD 120, 1 hop away).</p>
 </div>
 <div class="config-card">
 <h3>R2's Routing Table</h3>
 <img src="<?php echo $base_url; ?>/blogs/images/rip/r2route.webp" alt="R2 Routing Table">
 <p>R2 learns <strong>192.168.10.0/24</strong> via RIP the same way.</p>
 </div>
 </div>

 <!-- Added ping test results -->
 <div class="config-grid">
 <div class="config-card">
 <h3>PC1 to PC2 Ping Test</h3>
 <img src="<?php echo $base_url; ?>/blogs/images/rip/pingpc1topc2.webp" alt="PC1 to PC2 ping results">
 <p>Successful ping from PC1 (192.168.10.5) to PC2 (192.168.20.5) showing RIP is working.</p>
 </div>
 <div class="config-card">
 <h3>PC2 to PC1 Ping Test</h3>
 <img src="<?php echo $base_url; ?>/blogs/images/rip/pingpc2topc1.webp" alt="PC2 to PC1 ping results">
 <p>Successful ping from PC2 (192.168.20.5) to PC1 (192.168.10.5) confirming bidirectional communication.</p>
 </div>
 </div>

 <p>This shows RIP dynamically sharing routes between routers - no manual static routes needed!</p>

 <!-- Conclusion -->
 <h2>Conclusion</h2>
 <p>RIP is a great starting point for learning routing protocols, even if it's outdated for large networks. Try configuring it in a lab, experiment with versions, and see how routes propagate.</p>
 <p>Got questions? Drop a comment below!</p>

 <!-- What's Next Section -->
 <div class="next-steps-card">
 <h2>What's Next?</h2>
 <div class="next-steps-list">
 <a href="<?php echo $base_url; ?>blogs/staticrouting.php">
 <div class="next-step">
 <i class="fas fa-book-open"></i>
 <div class="step-content">
 <h3>Static Routing and Floating Routes</h3>
 <p>Learn the differences and when to use each approach</p>
 </div>
 <i class="fas fa-arrow-right"></i>
 </div>
</a>
 <a href="<?php echo $base_url; ?>blogs/redistribution-rip-eigrp.php">
 <div class="next-step">
 <i class="fas fa-book-open"></i>
 <div class="step-content">
 <h3>EIGRP and RIP Redistribution</h3>
 <p>Learn how routes exchange hapeen between RIP and Eigrp</p>
 </div>
 <i class="fas fa-arrow-right"></i>
 </div>
</a>
 <a href="<?php echo $base_url; ?>blogs/dynamicrouting.php">
 <div class="next-step">
 <i class="fas fa-book-open"></i>
 <div class="step-content">
 <h3>Dynamic Routing and it's types</h3>
 <p>Learn the differences and when to use each approach</p>
 </div>
 <i class="fas fa-arrow-right"></i>
 </div>
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

<!-- Blog Inline JS (Updated for sb- classes) -->
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
