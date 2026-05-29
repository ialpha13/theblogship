<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
    $meta = [
      'title' => "Basic Steps After Deploying a Server | The Blog Ship",
      'description' => "A post-deployment checklist for Windows Server: updates, static IP, hostname, user management, firewall rules, and remote access.",
      'keywords' => "windows server, post-installation, server config, static ip, rdp, firewall, sysadmin",
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

    /* Steps */
    .step-container {
      display: flex;
      gap: 20px;
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 16px;
      padding: 24px;
      margin-bottom: 32px;
    }
    @media (max-width: 640px) {
      .step-container { padding: 16px; gap: 12px; }
    }
    .step-number {
      flex-shrink: 0;
      width: 40px;
      height: 40px;
      border-radius: 12px;
      background: rgba(255, 184, 0, .15);
      color: #ffb800;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 18px;
      border: 1px solid rgba(255, 184, 0, .2);
    }
    .step-content { flex: 1; min-width: 0; }
    .step-content p:last-child { margin-bottom: 0; }

    /* Sidebar */
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
  </script>
</head>

<body class="bg-[#0c0b09] text-white antialiased selection:bg-yellow-500/30">

  <?php include(__DIR__ . '/../includes/navbar.php'); ?>

  <main class="sb-page">
    <div class="sb-wrap">
      <div class="sb-shell">

        <!-- HERO -->
        <header class="sb-hero">
          <a href="<?php echo $base_url; ?>categories/servers.php" class="sb-badge">
            <div class="sb-dot"></div>
            <span class="sb-badge__text">Servers</span>
          </a>
          <h1 class="sb-title">Basic Steps After Deploying a Server</h1>
          
          <div class="sb-meta">
            <div class="sb-meta__item">
              <i class="ri-calendar-line"></i>
              <span>June 2025</span>
            </div>
            <div class="sb-meta__item">
              <i class="ri-time-line"></i>
              <span>6 min read</span>
            </div>
            <div class="sb-meta__item">
              <i class="ri-user-3-line"></i>
              <span>SysAdmin</span>
            </div>
          </div>
        </header>

        <!-- GRID -->
        <div class="sb-grid">
          
          <!-- ARTICLE -->
          <article class="sb-article">
            <div class="sb-prose">
                <p>Congratulations! You've installed Windows Server. But a fresh installation is just the beginning. Before you deploy roles or put the server into production, there are critical configuration steps you must take to ensure security, stability, and manageability.</p>
                
                <img src="<?php echo $base_url; ?>assets/articleimages/basicserverconfig2.webp" alt="Server Configuration Dashboard" loading="lazy">

                <h2>1. Run Windows Updates</h2>
                <div class="step-container">
                  <div class="step-number">1</div>
                  <div class="step-content">
                    <p>The very first step is to patch the OS. Even a "fresh" ISO might be months old.</p>
                    <ul>
                      <li>Open <strong>Settings > Update & Security</strong>.</li>
                      <li>Click <strong>Check for updates</strong>.</li>
                      <li>Install all available patches and restart as needed.</li>
                    </ul>
                    <p><strong>Why?</strong> Unpatched servers are vulnerable to exploits from day one.</p>
                  </div>
                </div>

                <h2>2. Configure a Static IP Address</h2>
                <div class="step-container">
                  <div class="step-number">2</div>
                  <div class="step-content">
                    <p>Servers should never rely on DHCP for their primary IP address. They need a fixed address so clients and other servers can reliably find them.</p>
                    <ul>
                      <li>Go to <strong>Network Connections</strong> (ncpa.cpl).</li>
                      <li>Right-click your adapter > <strong>Properties</strong>.</li>
                      <li>Select <strong>IPv4</strong> and enter your static IP, Subnet Mask, Gateway, and DNS servers.</li>
                    </ul>
                  </div>
                </div>

                <h2>3. Rename the Server</h2>
                <div class="step-container">
                  <div class="step-number">3</div>
                  <div class="step-content">
                    <p>Default names like <code>WIN-837492...</code> are impossible to manage. Give your server a descriptive name that follows your organization's naming convention (e.g., <code>NYC-WEB-01</code>).</p>
                    <p>Change this in <strong>Server Manager > Local Server > Computer Name</strong>. A reboot is required.</p>
                  </div>
                </div>

                <h2>4. Configure Time Zone</h2>
                <div class="step-container">
                  <div class="step-number">4</div>
                  <div class="step-content">
                    <p>Accurate time is crucial for logs, authentication (Kerberos), and backups. Ensure the time zone is correct, or configure the server to sync with an NTP server.</p>
                  </div>
                </div>

                <h2>5. Enable Remote Desktop (RDP)</h2>
                <div class="step-container">
                  <div class="step-number">5</div>
                  <div class="step-content">
                    <p>To manage the server without standing in front of it, enable RDP.</p>
                    <ul>
                      <li>Go to <strong>Server Manager > Local Server</strong>.</li>
                      <li>Click on <strong>Remote Desktop</strong> and select "Allow remote connections to this computer".</li>
                      <li><strong>Security Tip:</strong> Only allow connections from computers running Remote Desktop with Network Level Authentication (NLA).</li>
                    </ul>
                  </div>
                </div>

                <h2>6. Configure Windows Firewall</h2>
                <div class="step-container">
                  <div class="step-number">6</div>
                  <div class="step-content">
                    <p>Never turn off the firewall! Instead, allow only the ports you need. For a web server, allow port 80/443. For a file server, allow SMB.</p>
                    <p>Use <strong>Windows Defender Firewall with Advanced Security</strong> to create granular inbound/outbound rules.</p>
                  </div>
                </div>

                <h2>Conclusion</h2>
                <p>These basic steps create a solid baseline for any Windows Server deployment. Once these are complete, you can proceed to install roles like Active Directory, IIS, or Hyper-V with confidence that the underlying OS is secure and ready.</p>

                <!-- What's Next Section -->
                <section id="whats-next" class="content-section">
                  <div class="next-steps-card">
                    <h2>What's Next?</h2>
                    <div class="next-steps-list">
                      <a href="<?php echo $base_url; ?>blogs/serverinstallation.php">
                        <div class="next-step">
                          <i class="ri-install-line"></i>
                          <div class="step-content">
                            <h3>How to Install Server</h3>
                            <p>Missed the installation? Check the guide here.</p>
                          </div>
                          <i class="ri-arrow-right-line"></i>
                        </div>
                      </a>
                      <a href="<?php echo $base_url; ?>blogs/staticrouting.php">
                        <div class="next-step">
                          <i class="ri-route-line"></i>
                          <div class="step-content">
                            <h3>Static Routing Basics</h3>
                            <p>Learn how to connect your server to different networks.</p>
                          </div>
                          <i class="ri-arrow-right-line"></i>
                        </div>
                      </a>
                    </div>
                  </div>
                </section>
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