<?php require_once __DIR__ . '/../config.php'; ?>
<?php
$page_url = "https://theblogship.com/blogs/eigrp.php";
$page_title = "EIGRP Deep Dive: Configuration, Metrics, and Path Selection";
$page_description = "Complete guide to EIGRP (Enhanced Interior Gateway Routing Protocol). Learn configuration, metric calculation, path selection, and troubleshooting with real-world examples.";
$page_keywords = "EIGRP, Cisco, CCNA, CCNP, routing protocol, hybrid protocol, network configuration, metric calculation, path selection";
$page_image = "https://theblogship.com/blogs/images/eigrp/eigrptopology.webp";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <?php
 $meta = [
 'title' => $page_title,
 'description' => $page_description,
 'keywords' => $page_keywords,
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
      --primary: #FBBF24;
      --secondary: #38BDF8;
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
        radial-gradient(circle at 15% 50%, rgba(251, 191, 36, 0.08), transparent 25%),
        radial-gradient(circle at 85% 30%, rgba(56, 189, 248, 0.05), transparent 25%),
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
    .sb-prose h4 {
      font-size: 20px;
      font-weight: 600;
      color: #fff;
      margin: 32px 0 12px;
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
      border-bottom: 1px solid rgba(251, 191, 36, 0.4);
      transition: all 0.2s;
    }
    .sb-prose a:hover { border-bottom-color: var(--primary); background: rgba(251, 191, 36, 0.1); }
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
      background: linear-gradient(90deg, rgba(251, 191, 36, 0.05) 0%, transparent 100%);
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
    .config-card h3, .config-card h4 { margin-top: 0; font-size: 18px; margin-bottom: 16px; display: flex; align-items: center; gap: 10px; color: #fff; }
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

    /* Image Grid */
    .image-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      margin: 32px 0;
    }
    @media (max-width: 640px) {
      .image-grid { grid-template-columns: 1fr; }
    }
    .image-caption {
      font-size: 13px;
      color: var(--text-muted);
      text-align: center;
      margin-top: 8px;
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
        <h1 class="sb-title">EIGRP Deep Dive: Configuration, Metrics, and Path Selection</h1>
        <div class="sb-meta">
          <div class="sb-meta__item">
            <i class="far fa-calendar-alt"></i>
            <span>June 2025</span>
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
 <h2>Introduction to EIGRP</h2>
 <p>EIGRP (Enhanced Interior Gateway Routing Protocol) is a hybrid routing protocol that combines features of both link-state and distance-vector protocols. Originally designed for personal use, its popularity has made it an open-source protocol. Unlike traditional routing protocols, EIGRP does not rely on periodic updates; instead, it only sends updates when there are changes in the network topology.</p>

 <div class="raid-feature">
 <h3>Key Characteristics:</h3>
 <ul>
 <li><strong>Hybrid Protocol</strong>: Combines advantages of link-state and distance-vector protocols</li>
 <li><strong>No Periodic Updates</strong>: Updates are triggered only by network changes</li>
 <li><strong>KCP Count Limit</strong>: Default is 100, with a maximum limit of 255</li>
 </ul>
 </div>

 <!-- EIGRP Tables Section -->
 <h2>EIGRP Tables</h2>
 <p>EIGRP maintains three primary tables to manage routing information:</p>

 <div class="config-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
 <div class="config-card">
 <h3>1. Neighbor Table</h3>
 <ul>
 <li>Tracks adjacent EIGRP routers</li>
 <li>Maintains state of neighbor relationships</li>
 <li>View with <code>show ip eigrp neighbors</code></li>
 </ul>
 </div>
 <div class="config-card">
 <h3>2. Topology Table</h3>
 <ul>
 <li>Stores all learned routes and their metrics</li>
 <li>Contains feasible successors</li>
 <li>View with <code>show ip eigrp topology</code></li>
 </ul>
 </div>
 <div class="config-card">
 <h3>3. Routing Table</h3>
 <ul>
 <li>Contains the best paths selected from the topology table</li>
 <li>Used for actual packet forwarding</li>
 <li>View with <code>show ip route eigrp</code></li>
 </ul>
 </div>
 </div>

 <!-- Path Selection Section -->
 <h2>Path Selection in EIGRP</h2>
 <p>EIGRP selects the best path based on a composite metric value, calculated using the following formula:</p>

 <div class="raid-feature">
 <p><strong>Metric Value = (Bandwidth + Delay) × 256</strong></p>
 </div>

 <h3>Components of the Metric:</h3>
 <p><strong>Bandwidth</strong>: Derived from the slowest link in the path (in Kbps)</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">formula</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>Bandwidth = 10^7 / Bandwidth_minimum</code></pre>
 </div>

 <p><strong>Delay</strong>: Sum of all delays along the path (in microseconds)</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">formula</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>Delay = (Sum of Delays) / 10</code></pre>
 </div>

 <div class="best-for">
 <p>By default, EIGRP primarily considers <strong>Bandwidth</strong> and <strong>Delay</strong>, though it can also factor in <strong>Reliability</strong> and <strong>Load</strong> if configured.</p>
 </div>

 <!-- Administrative Distance Section -->
 <h2>Administrative Distance in EIGRP</h2>
 <p>Administrative Distance (AD) is a measure of a route's trustworthiness. In EIGRP:</p>

 <div class="config-grid">
 <div class="config-card">
 <h3>Internal Routes</h3>
 <p>AD = 90 (routes originating within the EIGRP domain)</p>
 </div>
 <div class="config-card">
 <h3>External Routes</h3>
 <p>AD = 170 (routes redistributed from other protocols)</p>
 </div>
 </div>

 <!-- Configuration Section -->
 <h2>Configuring EIGRP</h2>
 <p>EIGRP can be configured using two methods:</p>

 <h3>1. Classical Mode (Legacy)</h3>
 <div class="raid-feature">
 <p><strong>Use Case</strong>: Suitable for small networks without advanced features</p>
 <p><strong>Syntax</strong>:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>router eigrp [AS_number]</code></pre>
 </div>
 <p>Example:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>router eigrp 100</code></pre>
 </div>
 </div>

 <h4>Network Addition:</h4>
 <p>For classful networks:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>network [network_ID]</code></pre>
 </div>
 <p>Example:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>network 192.168.10.0</code></pre>
 </div>

 <p>For classless networks (using wildcard mask):</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>network [network_ID] [wildcard_mask]</code></pre>
 </div>
 <p>Example:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>network 200.1.12.0 0.0.0.3</code></pre>
 </div>

 <h3>2. Named Mode (Modern)</h3>
 <div class="raid-feature">
 <p><strong>Use Case</strong>: Ideal for large, complex networks requiring advanced features</p>
 <p><strong>Syntax</strong>:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>router eigrp [name]</code></pre>
 </div>
 <p>Example:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>router eigrp mysigrp</code></pre>
 </div>
 </div>
 
 <!-- Practical Example Section -->
 <h2>Practical Configuration Example</h2>

 <h3>Network Topology</h3>
 <div class="topology-card">
 <img src="<?php echo $base_url; ?>/blogs/images/eigrp/eigrptopology.webp" alt="EIGRP topology diagram">
 <p class="image-caption">EIGRP topology with two routers and connected networks</p>

 <div class="topology-diagram">
 <div class="router r1">
 <div class="router-icon">R1</div>
 <div class="router-info">
 <div>Fa0/0: 192.168.10.1/24</div>
 <div>S5/0: 200.1.12.1/30</div>
 </div>
 </div>

 <div class="connection">
 <div class="connection-line"></div>
 <div class="connection-label">Serial Link</div>
 <div class="connection-line"></div>
 </div>

 <div class="router r2">
 <div class="router-icon">R2</div>
 <div class="router-info">
 <div>S5/0: 200.1.12.2/30</div>
 <div>Fa0/0: 192.168.20.1/24</div>
 </div>
 </div>
 </div>
 </div>

 <h3>R1 Configuration:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>R1(config)# interface FastEthernet0/0
R1(config-if)# ip address 192.168.10.1 255.255.255.0
R1(config-if)# no shutdown
R1(config-if)# exit

R1(config)# interface Serial5/0
R1(config-if)# ip address 200.1.12.1 255.255.255.252
R1(config-if)# no shutdown
R1(config-if)# exit

R1(config)# router eigrp 100
R1(config-router)# network 192.168.10.0
R1(config-router)# network 200.1.12.0 0.0.0.3
R1(config-router)# exit</code></pre>
 </div>

 <h3>R2 Configuration:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>R2(config)# interface FastEthernet0/0
R2(config-if)# ip address 192.168.20.1 255.255.255.0
R2(config-if)# no shutdown
R2(config-if)# exit

R2(config)# interface Serial5/0
R2(config-if)# ip address 200.1.12.2 255.255.255.252
R2(config-if)# no shutdown
R2(config-if)# exit

R2(config)# router eigrp 100
R2(config-router)# network 192.168.20.0
R2(config-router)# network 200.1.12.0 0.0.0.3
R2(config-router)# exit</code></pre>
 </div>
 <h3>Routing Tables:</h3>
 <div class="image-grid">
 <div>
 <img src="<?php echo $base_url; ?>/blogs/images/eigrp/r1routingtable.webp" alt="R1 routing table">
 <p class="image-caption">R1's routing table showing EIGRP-learned routes</p>
 </div>
 <div>
 <img src="<?php echo $base_url; ?>/blogs/images/eigrp/r2routingtable.webp" alt="R2 routing table">
 <p class="image-caption">R2's routing table showing EIGRP-learned routes</p>
 </div>
 </div>
 <h3>Connectivity Verification:</h3>
 <div class="image-grid">
 <div>
 <img src="<?php echo $base_url; ?>/blogs/images/eigrp/pingpc1topc2.webp" alt="Ping from PC1 to PC2">
 <p class="image-caption">Successful ping from PC1 (192.168.10.5) to PC2 (192.168.20.5)</p>
 </div>
 <div>
 <img src="<?php echo $base_url; ?>/blogs/images/eigrp/pingpc2topc1.webp" alt="Ping from PC2 to PC1">
 <p class="image-caption">Successful ping from PC2 (192.168.20.5) to PC1 (192.168.10.5)</p>
 </div>
 </div>


 <h3>Commands: To View Different EIGRP Tables</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">commands</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code># View Routing Table
show ip route

# View EIGRP Routes
show ip route eigrp

# View Topology Table
show ip eigrp topology

# View Neighbor Table
show ip eigrp neighbors</code></pre>
 </div>

 <!-- Path Manipulation Section -->
 <h2>Path Manipulation in EIGRP</h2>
 <p>EIGRP allows administrators to influence path selection by adjusting <strong>Bandwidth</strong> and <strong>Delay</strong> on egress interfaces (interfaces forwarding traffic out of the router).</p>

 <div class="raid-feature">
 <h3>Key Concepts:</h3>
 <ul>
 <li><strong>Best Path</strong>: High bandwidth + low delay</li>
 <li><strong>Backup Path</strong>: Low bandwidth + high delay</li>
 </ul>
 </div>

 <h3>Configuration Example:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>R1(config)# interface Serial5/0
R1(config-if)# bandwidth 1444
R1(config-if)# delay 50
R1(config-if)# exit</code></pre>
 </div>
 <h3>Interface Configuration Verification:</h3> <img src="<?php echo $base_url; ?>/blogs/images/eigrp/bandwithanddelayeigrp.webp" alt="Ping from PC2 to PC1">

 
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>We can see BW 1444 Kbit/sec, DLY 500 usec are now changed by command</code></pre>
 </div>

 
 <p><strong>Note</strong>: The router multiplies the delay value by 10. For example, <code>delay 50</code> equals 500 microseconds.</p>

 <!-- Conclusion Section -->
 <h2>Conclusion</h2>
 <p>EIGRP is a powerful and flexible routing protocol suitable for modern networks. Its hybrid nature, efficient update mechanism, and advanced features like path manipulation make it a preferred choice for many network administrators.</p>
 <p>By understanding its tables, metrics, and configuration methods, you can optimize EIGRP for your specific network requirements.</p>

 <!-- What's Next Section -->
 <div class="next-steps-card">
 <h2>What's Next?</h2>
 <div class="next-steps-list">
 <a href="<?php echo $base_url; ?>blogs/eigrp-auth.php">
 <div class="next-step">
 <i class="fas fa-book-open"></i>
 <div class="step-content">
 <h3>EIGRP Authentication</h3>
 <p>Learn about EIGRP authentication modes</p>
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
</a> <a href="<?php echo $base_url; ?>blogs/rip.php">
 <div class="next-step">
 <i class="fas fa-book-open"></i>
 <div class="step-content">
 <h3>Routing Information Protocol (RIP)</h3>
 <p>RIP's basics, how to configure it, and tips to avoid common pitfalls.</p>
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
