<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <?php
 $meta = [
 'title' => "Complete Guide to EIGRP and RIP Redistribution | The Blog Ship",
 'description' => "Step-by-step guide to configuring redistribution between EIGRP and RIP routing protocols. Learn metric conversion, K values, and troubleshooting techniques.",
 'keywords' => "EIGRP, RIP, redistribution, Cisco, CCNA, routing protocols, network configuration, metric weights",
 'robots' => "index, follow",
 'type' => "article",
 ];
 include __DIR__ . '/../includes' . '/meta.php';
 ?>
 <?php include __DIR__ . '/../includes' . '/header.php'; ?>
  <style>
    /* =========================================================
       PREMIUM GLASS UI SYSTEM
    ========================================================= */
    html { scroll-behavior: smooth; }

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
      font-size: clamp(28px, 5vw, 56px);
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
      max-width: 100%;
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

    /* Callouts & Cards */
    .raid-feature, .best-for, .info-card {
      background: linear-gradient(90deg, rgba(251, 191, 36, 0.05) 0%, transparent 100%);
      border-left: 3px solid var(--primary);
      padding: 24px;
      border-radius: 4px 12px 12px 4px;
      margin: 40px 0;
      font-size: 16px;
      color: #fff;
    }
    .raid-feature p, .best-for p, .info-card p { margin: 0; }

    .warning-card {
      background: rgba(239, 68, 68, 0.1);
      border: 1px solid rgba(239, 68, 68, 0.2);
      border-radius: 12px; padding: 24px; margin: 24px 0;
    }
    .warning-header { display: flex; align-items: center; gap: 10px; color: #f87171; margin-bottom: 12px; font-weight: 700; font-size: 18px; }
    .warning-header i { font-size: 20px; }

    /* Config Grid */
    .config-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      width: 100%;
      margin-bottom: 32px;
    }
    @media (max-width: 640px) {
      .config-grid { grid-template-columns: 1fr; }
    }
    .config-card {
      background: var(--glass-surface);
      border: 1px solid var(--glass-border);
      border-radius: 16px;
      padding: 24px;
      min-width: 0;
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
      -webkit-overflow-scrolling: touch;
    }

    /* Steps */
    .steps-list { list-style: none; padding: 0; margin: 24px 0; }
    .step { display: flex; gap: 16px; margin-bottom: 16px; }
    .step-number {
      flex-shrink: 0; width: 32px; height: 32px; border-radius: 50%;
      background: rgba(251, 191, 36, 0.15); color: var(--primary);
      display: flex; align-items: center; justify-content: center;
      font-weight: 700; font-size: 14px; border: 1px solid rgba(251, 191, 36, 0.2);
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
      font-weight: 700;
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

    /* Routing Tables */
    .routing-tables {
      display: grid;
      grid-template-columns: 1fr;
      gap: 20px;
      width: 100%;
      margin-bottom: 24px;
    }
    @media (min-width: 768px) {
      .routing-tables { grid-template-columns: 1fr 1fr; }
    }
    .routing-table {
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.1);
      border-radius: 16px;
      padding: 16px;
      min-width: 0;
    }
    .terminal {
      background: #000;
      color: #0f0;
      font-family: monospace;
      padding: 12px;
      border-radius: 8px;
      margin: 10px 0;
      border: 1px solid #333;
      overflow-x: auto;
    }

    /* Conclusion */
    .conclusion-card {
      background: var(--glass-surface); border: 1px solid var(--glass-border);
      border-radius: 16px; padding: 24px; margin-top: 24px;
    }
  </style>
</head>
<body class="sb-page">

<!-- Navigation -->
 <?php include(__DIR__ . '/../includes/navbar.php'); ?>


  <main class="sb-wrap">
    <div class="sb-shell">
      <header class="sb-hero">
        <div class="sb-badge">
          <span class="sb-dot"></span>
          <span class="sb-badge__text">Networking</span>
        </div>
        <h1 class="sb-title">Complete Guide to EIGRP and RIP Redistribution</h1>
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
        <article class="sb-article">
          <div class="sb-prose">

 <!-- Introduction Section -->
 <section id="introduction" class="content-section">
 <h2>Introduction to Route Redistribution</h2>
 <p>Redistribution is the process of importing routes learned by one routing protocol into another protocol. Different protocols like RIP and EIGRP don't communicate by default because they use different metrics for path selection.</p>

 <div class="info-card">
 <h3>Why Redistribution Matters</h3>
 <ul>
 <li><strong>RIP</strong> uses hop-count for path selection</li>
 <li><strong>EIGRP</strong> uses bandwidth and delay for path selection</li>
 <li>Without proper metric conversion, routes won't be shared between protocols</li>
 </ul>
 </div>
 </section>

 <!-- Network Topology Section -->
 <section id="topology" class="content-section">
 <h2>Network Topology</h2>
 <div class="topology-card">
 
 <img src="<?php echo $base_url; ?>/blogs/images/redistribution/redistributiontopology.webp" alt="Network topology showing EIGRP and RIP redistribution" class="article-image">
 <p class="image-caption">Network topology showing EIGRP and RIP redistribution</p>
 </div>

 <h3>Network Details:</h3>
 <div class="config-grid">
 <div class="config-card">
 <h3>PC's</h3>
 <ul>
 <li>PC1: 192.168.10.1/24</li>
 <li>PC2: 192.168.20.1/24</li>
 <li>PC3: 192.168.30.1/24</li>
 </ul>
 </div>
 <div class="config-card">
 <h3>R1 (EIGRP Only)</h3>
 <ul>
 <li>Fa0/0: 192.168.10.1/24</li>
 <li>S5/0: 200.1.12.1/30</li>
 <li>EIGRP AS 10</li>
 </ul>
 </div>
 <div class="config-card">
 <h3>R2 (ASBR - EIGRP & RIP)</h3>
 <ul>
 <li>Fa0/0: 192.168.20.1/24</li>
 <li>S5/0: 200.1.12.2/30</li>
 <li>S5/1: 14.1.1.2/8</li>
 <li>EIGRP AS 10 & RIP</li>
 </ul>
 </div>
 <div class="config-card">
 <h3>R3 (RIP Only)</h3>
 <ul>
 <li>Fa0/0: 192.168.30.1/24</li>
 <li>S5/1: 14.1.1.1/8</li>
 <li>RIP</li>
 </ul>
 </div>
 </div>

 <h3>PC Configurations:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">IP Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>PC1> ip 192.168.10.5 255.255.255.0 192.168.10.1
PC2> ip 192.168.20.5 255.255.255.0 192.168.20.1
PC3> ip 192.168.30.5 255.255.255.0 192.168.30.1</code></pre>
 </div>
 </section>

 <!-- Router Configurations Section -->
 <section id="configuration" class="content-section">
 <h2>Router Configurations</h2>

 <h3>R1 Configuration (EIGRP):</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>R1(config)# int f0/0
R1(config-if)# ip address 192.168.10.1 255.255.255.0
R1(config-if)# no shut
R1(config-if)# exit

R1(config)# int s5/0
R1(config-if)# ip address 200.1.12.1 255.255.255.252
R1(config-if)# no shut
R1(config-if)# exit

R1(config)# router eigrp 10
R1(config-router)# network 192.168.10.0
R1(config-router)# network 200.1.12.0 0.0.0.3
R1(config-router)# exit</code></pre>
 </div>

 <h3>R2 Configuration (ASBR):</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>R2(config)# int f0/0
R2(config-if)# ip address 192.168.20.1 255.255.255.0
R2(config-if)# no shut
R2(config-if)# exit

R2(config)# int s5/0
R2(config-if)# ip address 200.1.12.2 255.255.255.252
R2(config-if)# no shut
R2(config-if)# exit

R2(config)# int s5/1
R2(config-if)# ip address 14.1.1.2 255.0.0.0
R2(config-if)# no shut
R2(config-if)# exit

R2(config)# router eigrp 10
R2(config-router)# network 192.168.20.0
R2(config-router)# network 200.1.12.0 0.0.0.3
R2(config-router)# exit

R2(config)# router rip
R2(config-router)# network 14.0.0.0
R2(config-router)# exit</code></pre>
 </div>

 <h3>R3 Configuration (RIP):</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>R3(config)# int f0/0
R3(config-if)# ip address 192.168.30.1 255.255.255.0
R3(config-if)# no shut
R3(config-if)# exit

R3(config)# int s5/1
R3(config-if)# ip address 14.1.1.1 255.0.0.0
R3(config-if)# no shut
R3(config-if)# exit

R3(config)# router rip
R3(config-router)# network 192.168.30.0
R3(config-router)# network 14.0.0.0
R3(config-router)# exit</code></pre>
 </div>
 </section>

 <!-- Redistribution Section -->
 <section id="redistribution" class="content-section">
 <h2>Configuring Redistribution</h2>
 <p>Redistribution is always configured on the ASBR (R2 in our topology) where both protocols meet.</p>

 <h3>EIGRP into RIP Redistribution:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>R2(config)# router rip
R2(config-router)# redistribute eigrp 10 metric 5
R2(config-router)# exit</code></pre>
 </div>
 <p><strong>Metric 5</strong>: RIP only understands hop-count, so we assign an arbitrary hop count of 5 to redistributed EIGRP routes.</p>

 <h3>RIP into EIGRP Redistribution:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>R2(config)# router eigrp 10
R2(config-router)# redistribute rip metric 1000 500 255 100 10
R2(config-router)# exit</code></pre>
 </div>
 <p><strong>Metric Components</strong>:
 <br>Bandwidth=1000, Delay=500, Reliability=255, Load=100, MTU=10</p>
 </section>

 <!-- Verification Section -->
 <section id="verification" class="content-section">
 <h2>Verifying Redistribution</h2>

 <h3>Routing Tables:</h3>
 <div class="routing-tables">
 <div class="routing-table r1-table">
 <h4>R1 Routing Table (EIGRP)</h4>
 <div class="terminal">
 <div class="terminal-content">
 <pre>D EX 14.0.0.0/8 [150/3200000] via 200.1.12.2
D EX 192.168.30.0/24 [150/3200000] via 200.1.12.2
D 192.168.20.0/24 [100/2172416] via 200.1.12.2</pre>
 </div>
 </div>
 <div class="table-explanation">
 <p><strong>D EX</strong>: External EIGRP route (redistributed from RIP)</p>
 </div>
 <img src="<?php echo $base_url; ?>/blogs/images/redistribution/routingtabler1.webp" alt="R1 routing table" class="article-image">
 </div>
 <div class="routing-table r2-table">
 <h4>R3 Routing Table (RIP)</h4>
 <div class="terminal">
 <div class="terminal-content">
 <pre>R 192.168.10.0/24 [120/10] via 14.1.1.2
R 192.168.20.0/24 [120/10] via 14.1.1.2
R 200.1.12.0/24 [120/10] via 14.1.1.2</pre>
 </div>
 </div>
 <div class="table-explanation">
 <p><strong>R</strong>: RIP route (redistributed from EIGRP)</p>
 </div>
 <img src="<?php echo $base_url; ?>/blogs/images/redistribution/routingtabler3.webp" alt="R3 routing table" class="article-image">
 </div>
 </div>

 <h3>Connectivity Tests:</h3>
 <div class="config-grid">
 <div class="config-card">
 <h4>PC3 → PC1 (RIP to EIGRP)</h4>
 <div class="terminal">
 <div class="terminal-content">
 <pre>PC3> ping 192.168.10.5
84 bytes from 192.168.10.5 icmp_seq=1 ttl=61 time=93.779 ms</pre>
 </div>
 </div>
 <img src="<?php echo $base_url; ?>/blogs/images/redistribution/pingpc3topc1.webp" alt="Ping from PC3 to PC1" class="article-image">
 </div>
 <div class="config-card">
 <h4>PC2 → PC3 (EIGRP to RIP)</h4>
 <div class="terminal">
 <div class="terminal-content">
 <pre>PC2> ping 192.168.30.5
84 bytes from 192.168.30.5 icmp_seq=1 ttl=62 time=62.338 ms</pre>
 </div>
 </div>
 <img src="<?php echo $base_url; ?>/blogs/images/redistribution/pingpc2topc3.webp" alt="Ping from PC2 to PC3" class="article-image">
 </div>
 </div>
 </section>

 <!-- EIGRP Metrics Section -->
 <section id="eigrp-metrics" class="content-section">
 <h2>EIGRP Metric Calculation</h2>
 <p>EIGRP uses a composite metric based on K values (weights) to calculate the best path:</p>

 <div class="metric-formula">
 <p><strong>Metric = 256 * [K1*B.W + K2*B.W + K3*delay] * [K5/(reliability+K4)]</strong></p>
 </div>

 <h3>Default K Values:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Default Values</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>K1 = 1 (Bandwidth)
K2 = 0 (Load)
K3 = 1 (Delay)
K4 = 0 (Reliability)
K5 = 0 (MTU)</code></pre>
 </div>

 <p>This simplifies to: <strong>256 * (Bandwidth + Delay)</strong></p>

 <h3>Changing K Values:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>router eigrp [AS]
 metric weights [TOS] [K1] [K2] [K3] [K4] [K5]
 exit

Example:
router eigrp 10
 metric weights 0 1 0 1 1 0
 exit</code></pre>
 </div>

 <div class="warning-card">
 <div class="card-header">
 <i class="fas fa-exclamation-circle"></i>
 <h3 class="warning-header">Important Note</h3>
 </div>
 <ul>
 <li><i class="fas fa-exclamation-circle"></i> All routers in the same EIGRP AS must have identical K values</li>
 <li><i class="fas fa-exclamation-circle"></i> Mismatched K values will prevent neighbor relationships from forming</li>
 </ul>
 </div>
 </section>

 <!-- K Values Section -->
 <section id="k-values" class="content-section">
 <h2>K Values Verification</h2>
 <p>All EIGRP routers must have matching K values for neighbor relationships to form.</p>

 <h3>Checking K Values:</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Command</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>show ip protocols</code></pre>
 </div>

 <div class="config-grid">
 <div class="config-card">
 <h4>R1 K Values</h4>
 <img src="<?php echo $base_url; ?>/blogs/images/redistribution/r1kvalues.webp" alt="R1 K values" class="article-image">
 </div>
 <div class="config-card">
 <h4>R2 K Values</h4>
 <img src="<?php echo $base_url; ?>/blogs/images/redistribution/r2kvalues.webp" alt="R2 K values" class="article-image">
 </div>
 </div>

 <div class="info-card">
 <h3>Key Points About K Values:</h3>
 <ul>
 <li>K1 and K3 are set to 1 by default (Bandwidth and Delay)</li>
 <li>K2, K4, and K5 are set to 0 by default</li>
 <li>All routers in the same EIGRP AS must have identical K values</li>
 <li>Mismatched K values will prevent neighbor relationships</li>
 </ul>
 </div>
 </section>

 <!-- Administrative Distance Section -->
 <section id="administrative-distance" class="content-section">
 <h2>Adjusting Administrative Distance</h2>
 <p>EIGRP allows changing AD values for both internal and external routes:</p>

 <div class="code-block">
 <div class="code-header">
 <span class="code-language">Configuration</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>router eigrp [AS]
 distance eigrp [internal-AD] [external-AD]
 exit

Example:
router eigrp 10
 distance eigrp 100 150
 exit</code></pre>
 </div>

 <div class="info-card">
 <h3>AD Values in Routing Table:</h3>
 <img src="<?php echo $base_url; ?>/blogs/images/redistribution/advalues.webp" alt="AD values in routing table" class="article-image">
 <ul>
 <li><strong>Internal routes</strong>: AD 100 (default is 90)</li>
 <li><strong>External routes</strong>: AD 150 (default is 170)</li>
 </ul>
 </div>
 </section>

 <!-- Conclusion Section -->
 <section id="conclusion" class="content-section">
 <h2>Conclusion</h2>
 <div class="conclusion-card">
 <p>Redistribution between EIGRP and RIP requires careful attention to metric conversion and K value matching. By following these steps, you can successfully share routes between these protocols:</p>
 <ol class="steps-list">
 <li class="step">
 <div class="step-number">1</div>
 <div>Configure basic EIGRP and RIP on respective routers</div>
 </li>
 <li class="step">
 <div class="step-number">2</div>
 <div>Set up redistribution on the ASBR with proper metrics</div>
 </li>
 <li class="step">
 <div class="step-number">3</div>
 <div>Verify matching K values on all EIGRP routers</div>
 </li>
 <li class="step">
 <div class="step-number">4</div>
 <div>Test connectivity and verify routing tables</div>
 </li>
 </ol>
 <p class="conclusion-emphasis">Remember that redistribution is always configured on the ASBR where both protocols meet.</p>
 </div>
 </section>
 <!-- What's Next Section -->
 <section id="whats-next" class="content-section">
 <div class="next-steps-card">
 <h2>What's Next?</h2>
 <div class="next-steps-list">
 <a href="<?php echo $base_url; ?>blogs/eigrp.php">
 <div class="next-step">
 <i class="fas fa-book-open"></i>
 <div class="step-content">
 <h3>EIGRP: Configuration, Metrics, and Path Selection</h3>
 <p>RIP's basics, how to configure it, and tips to avoid common pitfalls.</p>
 </div>
 <i class="fas fa-arrow-right"></i>
 </div>
</a>
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
 <a href="<?php echo $base_url; ?>blogs/rip.php">
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
 </section>
          </div>
        </article>

        <aside class="sb-sidebar" aria-label="Table of contents">
          <div class="sb-toc">
            <div class="sb-toc__title">On this page</div>
            <nav id="sb-toc" class="sb-toc__list"></nav>
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