<?php require_once __DIR__ . '/../config.php'; ?>
<?php
  $canonical_url = "https://theblogship.com/blogs/raidconfiguration.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
    $meta = [
      'title' => "How to Configure RAID on HP ProLiant Servers: Step-by-Step Guide",
      'canonical' => $canonical_url,
      'description' => "Learn how to configure RAID on HP ProLiant servers with this hands-on, step-by-step guide. Improve server performance and data redundancy.",
      'keywords' => "RAID configuration, HP ProLiant, RAID 10, server setup, HP Smart Array, data redundancy, server performance, RAID guide",
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
      --primary: #ffb800;
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
        radial-gradient(circle at 15% 50%, rgba(255, 184, 0, 0.08), transparent 25%),
        radial-gradient(circle at 85% 30%, rgba(100, 100, 255, 0.05), transparent 25%),
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
      border-bottom: 1px solid rgba(255, 184, 0, 0.4);
      transition: all 0.2s;
    }
    .sb-prose a:hover { border-bottom-color: var(--primary); background: rgba(255, 184, 0, 0.1); }
    .sb-prose img {
      width: 100%;
      height: auto;
      border-radius: 12px;
      border: 1px solid var(--glass-border);
      margin: 40px 0;
      background: rgba(0,0,0,.3);
      box-shadow: 0 20px 40px -10px rgba(0,0,0,0.5);
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
      background: rgba(255, 184, 0, 0.1);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 20px;
      border: 1px solid rgba(255, 184, 0, 0.2);
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    .step-content { flex: 1; min-width: 0; }
    .step-content h2 { margin-top: 0; font-size: 22px; }
    .step-content h2::after { display: none; }
    .step-content p:last-child { margin-bottom: 0; }
    .step-content img { margin: 24px 0 0; }

    /* Callouts */
    .raid-feature, .best-for {
      background: linear-gradient(90deg, rgba(255, 184, 0, 0.05) 0%, transparent 100%);
      border-left: 3px solid var(--primary);
      padding: 24px;
      border-radius: 4px 12px 12px 4px;
      margin: 40px 0;
      font-size: 16px;
      color: #fff;
    }
    .raid-feature p, .best-for p { margin: 0; }

    /* Pros/Cons */
    .pros-cons {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      margin-bottom: 40px;
    }
    @media (max-width: 640px) {
      .pros-cons { grid-template-columns: 1fr; }
    }
    .pros, .cons {
      background: var(--glass-surface);
      border: 1px solid var(--glass-border);
      border-radius: 16px;
      padding: 24px;
    }
    .pros h3, .cons h3 { margin-top: 0; font-size: 18px; margin-bottom: 16px; display: flex; align-items: center; gap: 10px; }
    .pros h3 { color: #34d399; }
    .cons h3 { color: #f87171; }
    .pros ul, .cons ul { padding-left: 20px; margin-bottom: 0; }
    .pros li::marker { color: #34d399; }
    .cons li::marker { color: #f87171; }

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
      border-left: 2px solid transparent; /* Placeholder for active state logic if needed, though we use color mostly */
      padding-left: 12px;
      margin-left: -14px; /* Align visually */
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

    /* SVG Responsive Fixes */
    .step-image {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 32px 0;
      border-radius: 12px;
      border: 1px solid var(--glass-border);
      background: #fff; /* SVGs have white bg inside rects, but outer needs to be clean */
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
          <span class="sb-badge__text">Server Configuration</span>
        </div>
        <h1 class="sb-title">A Hands-On Guide to Configuring RAID on an HP ProLiant Server</h1>
        <div class="sb-meta">
          <div class="sb-meta__item">
            <i class="far fa-calendar-alt"></i>
            <span>June 19, 2025</span>
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
                <p>If you've ever stood in front of an HP ProLiant server, staring at the BIOS screen and wondering how to set up RAID properly, you're not alone. RAID configuration can feel intimidating, especially when you're dealing with critical hardware and the fear of accidental data loss. But fear not - today, I'll walk you through the process step by step, just like I did when I recently reconfigured an old HP ProLiant with a <strong>P410i RAID controller</strong>.</p>

                <div class="raid-feature">
                  <p>Pro Tip: Always back up your data before making RAID changes. These operations are destructive and cannot be undone!</p>
                </div>

                <img src="<?php echo $base_url; ?>/assets/articleimages/raidconfig.webp" alt="Blog Image">

                <!-- Step 1 -->
                <div class="step-container">
                  <div class="step-number">1</div>
                  <div class="step-content">
                    <h2>Accessing the RAID Configuration Utility</h2>
                    <p>When you power on the server, you'll see the <strong>HP ProLiant System BIOS</strong> screen. Here's what caught my attention:</p>
                    <ul>
                      <li><strong>Processor</strong>: Intel Xeon X5650 (6 cores, Hyperthreading enabled)</li>
                      <li><strong>Power Supply Warning</strong>: A concerning message - "1615 - Power Supply Failure or Power Supply Unplugged in Bay 2" - but since the server was running fine, I ignored it (for now).</li>
                    </ul>
                    <p>To enter the RAID configuration:</p>
                    <ol>
                      <li><strong>Press F9</strong> to enter System BIOS Setup.</li>
                      <li>Navigate to <strong>Array Configuration Utility</strong> (or press the relevant key during boot to enter the RAID controller directly).</li>
                    </ol>
                    <p>In my case, the server booted straight into the <strong>Option ROM Configuration for Arrays</strong>, which is where the real fun begins.</p>

                    <svg class="step-image" width="600" height="300" viewBox="0 0 600 300" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0" y="0" width="600" height="300" fill="#f0f4f8" rx="8"/>
                      <rect x="20" y="20" width="560" height="260" fill="#ffffff" rx="4"/>
                      <text x="300" y="50" font-family="monospace" font-size="16" text-anchor="middle" fill="#1e40af">HP ProLiant System BIOS - P62 (08/16/2015)</text>
                      <text x="300" y="80" font-family="monospace" font-size="14" text-anchor="middle" fill="#334155">Copyright 1982,2015 Hewlett-Packard Development Company,L.P.</text>
                      <text x="50" y="120" font-family="monospace" font-size="12" fill="#475569">1 Processor(s) detected, 6 total cores enabled</text>
                      <text x="50" y="140" font-family="monospace" font-size="12" fill="#475569">Proc 1: Intel Xeon CPU X5650 @2.67GHz</text>
                      <text x="50" y="180" font-family="monospace" font-size="12" fill="#ef4444">1615-Power Supply Failure in Bay 2</text>
                      <text x="50" y="220" font-family="monospace" font-size="12" fill="#1e40af">F9 = Setup | F11 = Boot Menu | F12 = Network Boot</text>
                    </svg>
                  </div>
                </div>

                <!-- Step 2 -->
                <div class="step-container">
                  <div class="step-number">2</div>
                  <div class="step-content">
                    <h2>Checking Existing RAID Setup</h2>
                    <p>Before making changes, I wanted to see what was already configured. Selecting <strong>"View Logical Drive"</strong> showed:</p>
                    <ul>
                      <li><strong>Logical Drive #1</strong>: RAID 0, 240.02 GB</li>
                      <li><strong>Logical Drive #2</strong>: RAID 0, 500.05 GB</li>
                    </ul>
                    <p><em>RAID 0?</em> That's risky - no redundancy. If a single drive fails, all data is gone. Since this was a lab server, I decided to <strong>delete these and set up a more resilient RAID 10 (1+0) configuration</strong>.</p>

                    <svg class="step-image" width="600" height="300" viewBox="0 0 600 300" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0" y="0" width="600" height="300" fill="#f0f4f8" rx="8"/>
                      <rect x="20" y="20" width="560" height="260" fill="#ffffff" rx="4"/>
                      <text x="300" y="40" font-family="monospace" font-size="14" text-anchor="middle" fill="#1e40af">Option ROM Configuration for Arrays, version 8.40.41.00</text>
                      <text x="300" y="60" font-family="monospace" font-size="12" text-anchor="middle" fill="#334155">Controller: HP Smart Array P410i, slot 0</text>
                      <rect x="50" y="100" width="500" height="30" fill="#f1f5f9" rx="2"/>
                      <text x="60" y="120" font-family="monospace" font-size="12" fill="#1e40af">Logical Drive # 1, RAID 0, 240.02 GB, OK</text>
                      <rect x="50" y="140" width="500" height="30" fill="#f1f5f9" rx="2"/>
                      <text x="60" y="160" font-family="monospace" font-size="12" fill="#1e40af">Logical Drive # 2, RAID 0, 500.05 GB, OK</text>
                      <text x="50" y="200" font-family="monospace" font-size="12" fill="#64748b">Press F8 to delete logical drive; Tab to toggle size units</text>
                      <text x="50" y="220" font-family="monospace" font-size="12" fill="#64748b">UP/DOWN ARROW to scroll; ESC to return</text>
                    </svg>
                  </div>
                </div>

                <!-- Step 3 -->
                <div class="step-container">
                  <div class="step-number">3</div>
                  <div class="step-content">
                    <h2>Deleting Old RAID Arrays</h2>
                    <ol>
                      <li>From the <strong>Main Menu</strong>, I selected <strong>"Delete Logical Drive."</strong></li>
                      <li>I chose <strong>Logical Drive #1</strong>.</li>
                      <li>A <strong>warning</strong> appeared: <em>"This will result in complete data loss for this logical drive."</em> (No worries - this was intentional.)</li>
                      <li><strong>Pressed F3</strong> to confirm deletion.</li>
                      <li>Repeated the process for <strong>Logical Drive #2</strong>.</li>
                      <li>After deletion, the system confirmed: <strong>"Configuration saved"</strong>.</li>
                    </ol>

                    <div class="pros-cons">
                      <div class="cons">
                        <h3>⚠️ Warning</h3>
                        <ul>
                          <li>RAID operations are destructive</li>
                          <li>All data will be permanently lost</li>
                          <li>No undo function available</li>
                        </ul>
                      </div>
                    </div>

                    <svg class="step-image" width="600" height="300" viewBox="0 0 600 300" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0" y="0" width="600" height="300" fill="#f0f4f8" rx="8"/>
                      <rect x="20" y="20" width="560" height="260" fill="#ffffff" rx="4"/>
                      <text x="300" y="40" font-family="monospace" font-size="14" text-anchor="middle" fill="#1e40af">Option ROM Configuration for Arrays, version 8.40.41.00</text>
                      <text x="300" y="60" font-family="monospace" font-size="12" text-anchor="middle" fill="#334155">Controller: HP Smart Array P418i, slot 8</text>
                      <text x="300" y="100" font-family="monospace" font-size="14" text-anchor="middle" fill="#b91c1c">WARNING</text>
                      <text x="50" y="130" font-family="monospace" font-size="12" fill="#475569">This will result in complete data loss for this logical drive.</text>
                      <text x="50" y="160" font-family="monospace" font-size="12" fill="#475569">You have selected to delete logical drive #1, RAID 0, 240.02 GB</text>
                      <rect x="150" y="200" width="120" height="30" fill="#fee2e2" rx="2" stroke="#ef4444"/>
                      <text x="210" y="220" font-family="monospace" font-size="12" text-anchor="middle" fill="#b91c1c">F3 to Delete</text>
                      <rect x="330" y="200" width="120" height="30" fill="#f1f5f9" rx="2" stroke="#64748b"/>
                      <text x="390" y="220" font-family="monospace" font-size="12" text-anchor="middle" fill="#475569">ESC to Cancel</text>
                    </svg>
                  </div>
                </div>

                <!-- Step 4 -->
                <div class="step-container">
                  <div class="step-number">4</div>
                  <div class="step-content">
                    <h2>Creating a New RAID 10 Array</h2>
                    <p>Now, the real work begins.</p>
                    <ol>
                      <li>Back in the <strong>Main Menu</strong>, I selected <strong>"Create Logical Drive"</strong>.</li>
                      <li>The system displayed <strong>available physical drives</strong>:
                        <ul>
                          <li><strong>Port 11, Box 1, Bay 1</strong>: 248.1GB SATA SSD</li>
                          <li><strong>Port 11, Box 1, Bay 2-4</strong>: 258.1GB SATA HDDs</li>
                        </ul>
                      </li>
                      <li>I selected <strong>two drives</strong> (Bay 2 &amp; 3) for RAID 10.</li>
                      <li>Under <strong>RAID Configurations</strong>, I chose <strong>RAID 1+0</strong> (mirrored + striped for both performance and redundancy).</li>
                      <li>Left <strong>Parity Group Count</strong> at default (since RAID 10 doesn't use parity).</li>
                      <li><strong>Pressed Enter</strong> to create the array.</li>
                    </ol>

                    <p>After a few seconds, the system confirmed the new <strong>RAID 1+0 Logical Drive</strong> (250.02 GB, Status: OK).</p>

                    <div class="pros-cons">
                      <div class="pros">
                        <h3>✅ Why RAID 10?</h3>
                        <ul>
                          <li>Combines mirroring (RAID 1) and striping (RAID 0)</li>
                          <li>Excellent performance for read/write operations</li>
                          <li>Can survive multiple drive failures (from different mirrors)</li>
                        </ul>
                      </div>
                      <div class="cons">
                        <h3>❌ RAID 10 Drawbacks</h3>
                        <ul>
                          <li>Requires even number of drives (minimum 4 for full benefit)</li>
                          <li>Only 50% of total capacity is usable</li>
                          <li>More expensive due to drive requirements</li>
                        </ul>
                      </div>
                    </div>

                    <svg class="step-image" width="600" height="400" viewBox="0 0 600 400" xmlns="http://www.w3.org/2000/svg">
                      <rect x="0" y="0" width="600" height="400" fill="#f0f4f8" rx="8"/>
                      <rect x="20" y="20" width="560" height="360" fill="#ffffff" rx="4"/>
                      <text x="300" y="40" font-family="monospace" font-size="14" text-anchor="middle" fill="#1e40af">Option ROM Configuration for Arrays, version 8.40.41.00</text>
                      <text x="300" y="60" font-family="monospace" font-size="12" text-anchor="middle" fill="#334155">Controller: HP Smart Array P418i, slot 8</text>
                      <text x="50" y="100" font-family="monospace" font-size="12" fill="#1e40af">Available Physical Drives [2 Selected]</text>
                      <rect x="50" y="110" width="500" height="20" fill="#f1f5f9" rx="2"/>
                      <text x="60" y="125" font-family="monospace" font-size="12" fill="#475569">[ ] Port 11, Box 1, Bay 1, 248.1GB SATA SSD</text>
                      <rect x="50" y="130" width="500" height="20" fill="#f1f5f9" rx="2"/>
                      <text x="60" y="145" font-family="monospace" font-size="12" fill="#1e40af">[X] Port 11, Box 1, Bay 2, 258.1GB SATA HDD</text>
                      <rect x="50" y="150" width="500" height="20" fill="#f1f5f9" rx="2"/>
                      <text x="60" y="165" font-family="monospace" font-size="12" fill="#1e40af">[X] Port 11, Box 1, Bay 3, 258.1GB SATA HDD</text>
                      <text x="50" y="200" font-family="monospace" font-size="12" fill="#1e40af">RAID Configurations</text>
                      <rect x="50" y="210" width="500" height="20" fill="#f1f5f9" rx="2"/>
                      <text x="60" y="225" font-family="monospace" font-size="12" fill="#475569">[ ] RAID 50</text>
                      <rect x="50" y="230" width="500" height="20" fill="#f1f5f9" rx="2"/>
                      <text x="60" y="245" font-family="monospace" font-size="12" fill="#1e40af">[X] RAID 1+0</text>
                      <text x="50" y="280" font-family="monospace" font-size="12" fill="#64748b">ENTER to create logical drive; TAB to navigate</text>
                      <text x="50" y="300" font-family="monospace" font-size="12" fill="#64748b">UP/DOWN ARROW to scroll; ESC to return</text>
                    </svg>
                  </div>
                </div>

                <!-- Final Thoughts -->
                <div class="conclusion">
                  <h2>Final Thoughts</h2>
                  <p>RAID configuration isn't just about clicking buttons - it's about understanding trade-offs:</p>
                  <ul>
                    <li><strong>RAID 0</strong> = Speed, but no redundancy.</li>
                    <li><strong>RAID 1+0 (10)</strong> = Best of both worlds (redundancy + performance), but requires more drives.</li>
                  </ul>
                  <p>If you're setting up a production server, always:</p>
                  <ul>
                    <li><strong>✅ Back up data before making changes</strong></li>
                    <li><strong>✅ Verify drive health</strong> (check for warnings like the PSU error we saw earlier)</li>
                    <li><strong>✅ Test the array</strong> before relying on it</li>
                  </ul>
                  <p>Now, go forth and configure RAID like a pro! 🚀</p>

                  <p><em>Some of the screenshots showing RAID Configuration</em></p>
                  <div class="image-grid">
                    <img src="<?php echo $base_url; ?>/blogs/images/raidconfiguration/1.webp" alt="Raid step 1 Image">
                    <img src="<?php echo $base_url; ?>/blogs/images/raidconfiguration/2.webp" alt="Raid step 2 Image">
                    <img src="<?php echo $base_url; ?>/blogs/images/raidconfiguration/3.webp" alt="Raid step 3 Image">
                    <img src="<?php echo $base_url; ?>/blogs/images/raidconfiguration/4.webp" alt="Raid step 4 Image">
                    <img src="<?php echo $base_url; ?>/blogs/images/raidconfiguration/5.webp" alt="Raid step 5 Image">
                    <img src="<?php echo $base_url; ?>/blogs/images/raidconfiguration/6.webp" alt="Raid step 6 Image">
                    <img src="<?php echo $base_url; ?>/blogs/images/raidconfiguration/7.webp" alt="Raid step 7 Image">
                    <img src="<?php echo $base_url; ?>/blogs/images/raidconfiguration/8.webp" alt="Raid step 8 Image">
                    <img src="<?php echo $base_url; ?>/blogs/images/raidconfiguration/9.webp" alt="Raid step 9 Image">
                  </div>
                </div>

                <!-- What's Next Section -->
                <section id="whats-next" class="content-section">
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
                </section>
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
</script>
</body>
</html>
