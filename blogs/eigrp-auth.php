<?php require_once __DIR__ . '/../config.php'; ?>
<?php
$page_url = "https://theblogship.com/blogs/eigrp-auth.php";
$page_title = "EIGRP Authentication Explained: Configuration and Impact Analysis";
$page_description = "Complete guide to EIGRP authentication in Cisco networks. Learn MD5 authentication configuration, neighbor relationships, and routing table impacts.";
$page_keywords = "EIGRP, authentication, cisco, ccna, network security, md5, routing protocol, network topology";
$page_image = "https://theblogship.com/blogs/images/eigrp-auth/eigrpauthtopology.webp";
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
    .connection.vertical {
      width: 2px; height: 60px; flex: none;
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

    /* Routing Tables */
    .routing-tables {
      display: grid;
      gap: 20px;
      grid-template-columns: 1fr;
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

    /* Conclusion */
    .conclusion-card {
      background: var(--glass-surface); border: 1px solid var(--glass-border);
      border-radius: 16px; padding: 24px; margin-top: 24px;
    }
  </style>
</head>
<body class="sb-page">

<?php include(__DIR__ . '/../includes/navbar.php'); ?>


  <main class="sb-wrap">
    <div class="sb-shell">
      <header class="sb-hero">
        <div class="sb-badge">
          <span class="sb-dot"></span>
          <span class="sb-badge__text">Networking</span>
        </div>
        <h1 class="sb-title">EIGRP Authentication Explained: Configuration and Impact Analysis</h1>
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
 <h2>Introduction</h2>
 <p><strong>"Auth means if the correct user is guessing the device."</strong> This simple yet powerful statement encapsulates the essence of authentication in networking. In Enhanced Interior Gateway Routing Protocol (EIGRP), authentication serves as a critical security mechanism to verify the identity of neighboring routers before establishing adjacencies.</p>
 <p>In classical EIGRP, there's only one authentication mode available - MD5. However, named EIGRP implementations offer multiple authentication options, providing greater flexibility for network administrators.</p>

 <!-- EIGRP Authentication Basics Section -->
 <h2>EIGRP Authentication Basics</h2>
 <div class="raid-feature">
 <h3>Key Points About EIGRP Authentication:</h3>
 <ul>
 <li><strong>Purpose:</strong> Verifies router identity before forming neighbor relationships</li>
 <li><strong>Classical EIGRP:</strong> Only supports MD5 authentication</li>
 <li><strong>Named EIGRP:</strong> Supports multiple authentication modes</li>
 <li><strong>Impact:</strong> Controls which routers can become neighbors and exchange routes</li>
 </ul>
 </div>
 <div class="warning-card">
 <div class="card-header warning-header">
 <i class="fas fa-exclamation-triangle"></i>
 <h3>Important Note</h3>
 </div>
 <p>Authentication must be configured consistently on both sides of any link where it's implemented. Mismatched configurations will prevent neighbor relationships from forming.</p>
 </div>

 <!-- Configuration Section -->
 <h2>EIGRP Authentication Syntax</h2>
 <h3>Syntax for EIGRP Authentication</h3>
 <p>The configuration process for EIGRP authentication involves two main steps:</p>
 <div class="steps-list">
 <div class="step">
 <span class="step-number">1</span>
 <span><strong>Define the key on the router key chain:</strong></span>
 </div>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>key chain [name]
key [number]
key_string [password]</code></pre>
 </div>
 </div>
 <div class="step">
 <span class="step-number">2</span>
 <span><strong>Apply the authentication on the interface:</strong></span>
 </div>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>ip authentication mode eigrp [AS] md5
ip authentication key-chain eigrp [AS] [key-name]</code></pre>
 </div>
 <h3>Practical Configuration Example</h3>
 <p>Here's the exact configuration shown in the images for Router R2:</p>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>R2(config)# key chain blogship
R2(config-keychain)# key 10
R2(config-keychain-key)# key_string cisco123
R2(config)# int se5/1
R2(config-if)# ip authentication mode eigrp 10 md5
R2(config-if)# ip authentication keychain eigrp 10 blogship</code></pre>
 </div>
 <div class="conclusion-card">
 <p>This configuration creates a key chain named "blogship" with key ID 10 and password "cisco123", then applies MD5 authentication using this key chain to interface Serial5/1 for EIGRP AS 10.</p>
 </div>

 <!-- Network Topology Section -->
 <h2>Network Topology</h2>
 <!-- Network Topology Diagram -->
 <div class="topology-card">
 <h3>Network Topology</h3>
 <img src="<?php echo $base_url; ?>/blogs/images/eigrp-auth/eigrpauthtopology.webp" alt="Floating Static Routing Table">

 <div class="topology-diagram">
 <div class="router r1">
 <div class="router-icon">R1</div>
 <div class="router-info">
 <div>Fa0/0: 192.168.10.1</div>
 <div>Se5/0: 200.1.12.1</div>
 </div>
 <div class="network-label">Network: 192.168.10.0/24</div>
 </div>

 <div class="connection">
 <div class="connection-line"></div>
 <div class="connection-label">200.1.12.0/30</div>
 <div class="connection-line"></div>
 </div>

 <div class="router r2">
 <div class="router-icon">R2</div>
 <div class="router-info">
 <div>Se5/0: 200.1.12.2</div>
 <div>Se5/1: 200.1.13.1</div>
 <div>Fa0/0: 192.168.20.1</div>
 </div>
 <div class="network-label">Network: 192.168.20.0/24</div>
 </div>
 <div class="connection vertical">
 <div class="connection-line"></div>
 <div class="connection-label">200.1.13.0/30</div>
 <div class="connection-line"></div>
 </div>
 <div class="router r3">
 <div class="router-icon">R3</div>
 <div class="router-info">
 <div>Se5/1: 200.1.13.2</div>
 <div>Fa0/0: 192.168.30.1</div>
 </div>
 <div class="network-label">Network: 192.168.30.0/24</div>
 </div>
 </div>
 </div>
 <div class="raid-feature">
 <h3>Network Summary:</h3>
 <ul>
 <li><strong>R1:</strong> 192.168.10.0/24 (Fa0/0), 200.1.12.1 (Se5/0)</li>
 <li><strong>R2:</strong> 192.168.20.0/24 (Fa0/0), 200.1.12.2 (Se5/0), 200.1.13.1 (Se5/1)</li>
 <li><strong>R3:</strong> 192.168.30.0/24 (Fa0/0), 200.1.13.2 (Se5/1)</li>
 <li><strong>Links:</strong> 200.1.12.0/30 (R1-R2), 200.1.13.0/30 (R2-R3)</li>
 </ul>
 </div>
 <!-- Configuration Section -->
 <h2>Complete Topology Configurations</h2>
 <h3>PC's</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">commands</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>PC1> ip 192.168.10.5 255.255.255.0 192.168.10.1
PC2> ip 192.168.20.5 255.255.255.0 192.168.20.1
PC3> ip 192.168.30.5 255.255.255.0 192.168.30.1</code></pre>
 </div>
 <h3>Routers</h3>
 <div class="config-card">
 <h3>Router R1 (No Authentication)</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>hostname R1
!
interface FastEthernet0/0
 ip address 192.168.10.1 255.255.255.0
 no shutdown
!
interface Serial5/0
 ip address 200.1.12.1 255.255.255.252
 no shutdown
!
router eigrp 10
 network 192.168.10.0
 network 200.1.12.0 0.0.0.3
 no auto-summary</code></pre>
 </div>
 </div>
 <div class="config-card" style="margin-top: 24px;">
 <h3>Router R2 (Authentication Configured)</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>hostname R2
!
key chain blogship
 key 10
 key-string cisco123
!
interface FastEthernet0/0
 ip address 192.168.20.1 255.255.255.0
 no shutdown
!
interface Serial5/0
 ip address 200.1.12.2 255.255.255.252
 no shutdown
!
interface Serial5/1
 ip address 200.1.13.1 255.255.255.252
 ip authentication mode eigrp 10 md5
 ip authentication key-chain eigrp 10 blogship
 no shutdown
!
router eigrp 10
 network 192.168.20.0
 network 200.1.12.0 0.0.0.3
 network 200.1.13.0 0.0.0.3
 no auto-summary</code></pre>
 </div>
 </div>
 <div class="config-card" style="margin-top: 24px;">
 <h3>Router R3 (Authentication Configured)</h3>
 <div class="code-block">
 <div class="code-header">
 <span class="code-language">cisco</span>
 <button class="copy-btn" onclick="copyCode(this)">
 <i class="fas fa-copy"></i>
 </button>
 </div>
 <pre><code>hostname R3
!
interface FastEthernet0/0
 ip address 192.168.30.1 255.255.255.0
 no shutdown
!
interface Serial5/1
 ip address 200.1.13.2 255.255.255.252
 no shutdown
!
router eigrp 10
 network 192.168.30.0
 network 200.1.13.0 0.0.0.3
 no auto-summary</code></pre>
 </div>
 </div>
 <div class="raid-feature">
 <h3>Configuration Notes</h3>
 <ul>
 <li>R1-R2 link has no authentication (for comparison)</li>
 <li>R2 se5/1 link has MD5 authentication configured</li>
 <li>Now if R3 wants to make neighborship with R2 it needs to apply same auth on its interface</li>
 <li>Key chain name, key number, and password must match on both ends</li>
 <li>Authentication is applied per-interface in EIGRP</li>
 </ul>
 </div>



 <!-- Before & After Analysis Section -->
 <h2>Before & After Authentication Analysis</h2>
 <h3>Before Authentication Implementation</h3>
 <div class="routing-tables">
 <div class="routing-table">
 <h3>R2 Neighbor Table (Before):</h3>
 <img src="<?php echo $base_url; ?>/blogs/images/eigrp-auth/r2neighbortablebefore.webp" alt="Floating Static Routing Table">

 <div class="terminal">
 <div class="terminal-content">1 200.1.13.2 Se5/1 10 00:46:06 30 180 0 3<br>
0 200.1.12.1 Se5/0 12 00:49:25 82 492 0 5</div>
 </div>
 <div class="table-explanation">
 <p>R2 has neighbors with both R1 (200.1.12.1) and R3 (200.1.13.2).</p>
 </div>
 </div>
 </div>
 <h3>After Authentication Implementation</h3>
 <div class="routing-tables">
 <div class="routing-table">
 <h3>R2 Neighbor Table (After):</h3>
 <img src="<?php echo $base_url; ?>/blogs/images/eigrp-auth/r2neighbortableafter.webp" alt="Floating Static Routing Table">

 <div class="terminal">
 <div class="terminal-content">0 200.1.12.1 Se5/0 14 00:14:34 46 276 0 14</div>
 </div>
 <div class="table-explanation">
 <p>After authentication, R2 only shows R1 as a neighbor. The neighbor relationship with R3 was lost.</p>
 </div>
 </div>
 <div class="routing-table">
 <h3>R3 Neighbor Table (After):</h3>
 <img src="<?php echo $base_url; ?>/blogs/images/eigrp-auth/r3neighbortableafter.webp" alt="Floating Static Routing Table">
 <br>

 <div class="terminal">
 <div class="terminal-content">EIGRP-IPv4 Neighbors for AS(10)
[No neighbors listed]</div>
 </div>
 <div class="table-explanation">
 <p>R3 shows no EIGRP neighbors after authentication was implemented.</p>
 </div>
 </div>
 </div>
 <div class="raid-feature">
 <h3>Impact Analysis:</h3>
 <ul>
 <li><i class="fas fa-check-circle"></i>&nbsp R2 maintained its adjacency with R1 (200.1.12.1)</li>
 <li><i class="fas fa-times-circle"></i>&nbsp R2 lost its adjacency with R3 (200.1.13.2)</li>
 <li><i class="fas fa-exclamation-triangle"></i>&nbsp R3 shows no EIGRP neighbors after authentication</li>
 <li><i class="fas fa-route"></i>&nbsp R2 lost the route to 192.168.30.0/24 that was previously via R3</li>
 </ul>
 </div>

 <!-- Troubleshooting Section -->
 <div class="tips-warnings-grid">
 <div class="tip-card">
 <div class="card-header tip-header">
 <i class="fas fa-lightbulb"></i>
 <h3>Troubleshooting Auth</h3>
 </div>
 <ul>
 <li><i class="fas fa-check"></i><span><strong>Verify neighbor relationships:</strong> Use <code>show ip eigrp neighbors</code> to check which adjacencies are active</span>
</li>
 <li><i class="fas fa-check"></i> <span><strong>Check routing tables:</strong> Use <code>show ip route</code> to verify which routes are missing after authentication</span></li>
 <li><i class="fas fa-check"></i> <span><strong>Verify authentication configuration:</strong> Check that both sides of the link have matching configurations</span></li>
 <li><i class="fas fa-check"></i> <span><strong>Check key chains:</strong> Ensure the same key ID and password are configured on both routers</span>
</li>

 </ul>
 </div>
 <div class="warning-card">
 <div class="card-header warning-header">
 <i class="fas fa-exclamation-triangle"></i>
 <h3>Common Auth Issues</h3>
 </div>
 <ul>
 <li><i class="fas fa-exclamation"></i>Mismatched key chains or passwords</li>
 <li><i class="fas fa-exclamation"></i>Authentication not properly configured on both sides</li>
 <li><i class="fas fa-exclamation"></i>Different authentication modes configured on each router</li>
 <li><i class="fas fa-exclamation"></i>Key chain not applied to the correct interface</li>
 </ul>
 </div>
 </div>

 <!-- Conclusion Section -->
 <h2>Conclusion</h2>
 <div class="conclusion-card">
 <p>Proper implementation of EIGRP authentication is essential for securing routing protocol communications while maintaining necessary adjacencies. The configuration must be consistent on both sides of any link where authentication is implemented.</p>
 <p>The before-and-after scenarios clearly demonstrate how authentication affects neighbor relationships and consequently, the routing tables in an EIGRP network. When configured correctly, EIGRP authentication provides an important layer of security without disrupting valid neighbor relationships.</p>
 <p class="conclusion-emphasis">Always test authentication configurations in a lab environment before deploying to production networks!</p>
 </div>

 <!-- What's Next Section -->
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
 <a href="<?php echo $base_url; ?>blogs/rip.php">
 <div class="next-step">
 <i class="fas fa-shield-alt"></i>
 <div class="step-content">
 <h3>Routing Information Protocol (RIP)</h3>
 <p>RIP's basics, how to configure it, and tips to avoid common pitfalls.</p>
 </div>
 <i class="fas fa-arrow-right"></i>
 </div>
 </a>
 </div>
 </div>

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