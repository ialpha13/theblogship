<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
    $meta = [
      'title' => "A Step-by-Step Guide to Installing Windows Server 2022 | The Blog Ship",
      'description' => "Learn how to install Windows Server 2022 with this detailed, step-by-step guide. Includes screenshots, tips, and best practices for server admins and beginners.",
      'keywords' => "Windows Server 2022, server installation, step-by-step guide, server admin, Windows Server tutorial, install Windows Server, server setup, IT, sysadmin",
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

    /* Background System (Matches Index/Blogs) */
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

    /* ---------------------------------------------------------
       HERO SECTION
    --------------------------------------------------------- */
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

    /* ---------------------------------------------------------
       CONTENT GRID
    --------------------------------------------------------- */
    .sb-grid {
      display: grid;
      grid-template-columns: 1fr 300px;
      gap: 40px;
      align-items: start;
    }

    @media (max-width: 980px) {
      .sb-grid { grid-template-columns: 1fr; }
    }

    /* ---------------------------------------------------------
       ARTICLE CONTENT
    --------------------------------------------------------- */
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

    /* Typography (Prose) */
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

    /* Custom "Step" Cards */
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
    .step-content img { margin: 20px 0 0; }

    /* Tables */
    .table-wrapper {
      overflow-x: auto;
      margin: 24px 0;
    }
    .version-table {
      width: 100%;
      border-collapse: collapse;
      margin: 0;
      min-width: 600px;
      font-size: 15px;
    }
    .version-table th {
      text-align: left;
      padding: 12px 16px;
      background: rgba(255,255,255,.08);
      color: #fff;
      font-weight: 700;
      border-bottom: 1px solid rgba(255,255,255,.1);
    }
    .version-table td {
      padding: 12px 16px;
      border-bottom: 1px solid rgba(255,255,255,.06);
    }
    .version-table tr:last-child td { border-bottom: none; }

    /* Callouts */
    .raid-feature, .best-for {
      background: rgba(255, 184, 0, .08);
      border-left: 4px solid #ffb800;
      padding: 16px 20px;
      border-radius: 0 12px 12px 0;
      margin: 24px 0;
      font-size: 15px;
    }
    .raid-feature p, .best-for p { margin: 0; }

    /* Pros/Cons & Highlights */
    .pros-cons {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      margin-bottom: 24px;
    }
    @media (max-width: 640px) {
      .pros-cons { grid-template-columns: 1fr; }
    }
    .pros, .cons {
      background: rgba(255,255,255,.03);
      border: 1px solid rgba(255,255,255,.1);
      border-radius: 16px;
      padding: 20px;
    }
    .pros h3, .cons h3 { margin-top: 0; font-size: 18px; margin-bottom: 12px; }
    .pros h3 { color: #34d399; }
    .cons h3 { color: #f87171; }
    .highlight { color: #ffb800; font-weight: 700; }

    /* ---------------------------------------------------------
       SIDEBAR (TOC)
    --------------------------------------------------------- */
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
    /**
     * Single Blog Page Logic
     * Handles: Table of Contents, Reading Time, Scroll Spy
     */
    document.addEventListener('DOMContentLoaded', () => {
        initTOC();
        initReadingTime();
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

        // Generate Links
        headings.forEach((heading, index) => {
            // Create ID if missing
            if (!heading.id) {
                heading.id = 'section-' + (index + 1);
            }

            const li = document.createElement('li');
            const a = document.createElement('a');
            a.href = '#' + heading.id;
            a.className = 'sb-toc__link';
            a.textContent = heading.textContent;
            
            li.appendChild(a);
            tocContainer.appendChild(li);
        });

        // Scroll Spy
        const observerOptions = {
            root: null,
            rootMargin: '-100px 0px -60% 0px',
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.id;
                    document.querySelectorAll('.sb-toc__link').forEach(link => {
                        link.classList.toggle('is-active', link.getAttribute('href') === '#' + id);
                    });
                }
            });
        }, observerOptions);

        headings.forEach(h => observer.observe(h));
    }

    function initReadingTime() {
        // Logic handled in PHP or simple static text for now, can be expanded if needed.
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
          <h1 class="sb-title">A Step-by-Step Guide to Installing Windows Server 2022</h1>
          
          <div class="sb-meta">
            <div class="sb-meta__item">
              <i class="ri-calendar-line"></i>
              <span>June 19, 2025</span>
            </div>
            <div class="sb-meta__item">
              <i class="ri-time-line"></i>
              <span>8 min read</span>
            </div>
            <div class="sb-meta__item">
              <i class="ri-user-3-line"></i>
              <span>Server Admin</span>
            </div>
          </div>
        </header>

        <!-- GRID -->
        <div class="sb-grid">
          
          <!-- ARTICLE -->
          <article class="sb-article">
            <div class="sb-prose">

                <p>Installing a server operating system might sound intimidating, but with the right guidance, it's a straightforward process. Whether you're setting up a new server for your business or just experimenting in a lab environment, this walkthrough will help you install Windows Server 2022 with confidence.</p>
                <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/serverinstall2.webp" alt="Server Installation step 10 Image">

                <div class="raid-feature">
                  <p>Pro Tip: Before beginning, ensure you have at least 32GB of free storage space and a stable power connection. Server installations can take time and interruptions may cause issues.</p>
                </div>

                <h2>1. Booting from Installation Media</h2>

                <div class="step-container">
                  <div class="step-number">1</div>
                  <div class="step-content">
                    <p>The first step is getting your server to recognize the installation media. Here's how it's done:</p>
                    <ul>
                      <li><strong>Insert the Bootable USB</strong> - Plug your USB drive (with the Windows Server 2022 ISO) into the server's USB port.</li>
                      <li><strong>Access the Boot Menu</strong> - Restart the server and press the appropriate key (often F12, ESC, or DEL) to enter the boot menu.</li>
                      <li><strong>Select the USB Drive</strong> - From the menu, choose your USB drive and hit <strong>Enter</strong>.</li>
                      <li><strong>Wait for the Prompt</strong> - Once you see <em>"Press any key to boot from CD or DVD..."</em>, press a key to start the installation.</li>
                    </ul>
                    <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/step1.webp" alt="Server Installation step 1 Image">
                  </div>
                </div>

                <h2>2. Configuring Language and Regional Settings</h2>

                <div class="step-container">
                  <div class="step-number">2</div>
                  <div class="step-content">
                    <p>The first official screen asks for your language, time format, and keyboard layout. Since Windows Server is widely used in English-speaking environments, the defaults are usually:</p>
                    <ul>
                      <li><strong>Language:</strong> English (United States)</li>
                      <li><strong>Time and currency format:</strong> English (United States)</li>
                      <li><strong>Keyboard input:</strong> US</li>
                    </ul>
                    <p>Once you confirm these settings, click <strong>Next</strong>, and you'll move to the main installation screen.</p>
                    <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/2.webp" alt="Server Installation step 2 Image">
                  </div>
                </div>

                <h2>3. Selecting the Right Windows Server Version</h2>

                <div class="step-container">
                  <div class="step-number">3</div>
                  <div class="step-content">
                    <p>Windows Server 2022 offers several installation options. Here's what you need to know to choose the right one:</p>
                    <div class="table-wrapper">
                    <table class="version-table">
                      <thead>
                        <tr>
                          <th>Operating System</th>
                          <th>Architecture</th>
                          <th>Best For</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Windows Server 2022 Standard Evaluation</td>
                          <td>x64</td>
                          <td>Basic server needs</td>
                        </tr>
                        <tr>
                          <td>Windows Server 2022 Standard Evaluation (Desktop Experience)</td>
                          <td>x64</td>
                          <td>Users who prefer a GUI</td>
                        </tr>
                        <tr>
                          <td>Windows Server 2022 Datacenter Evaluation</td>
                          <td>x64</td>
                          <td>Virtualization-heavy environments</td>
                        </tr>
                        <tr style="background-color: #dbeafe;">
                          <td><strong>Windows Server 2022 Datacenter Evaluation (Desktop Experience)</strong></td>
                          <td><strong>x64</strong></td>
                          <td><strong>Full GUI + advanced features</strong></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>

                    <p>If you're new to server administration or need a familiar interface, the <span class="highlight">Desktop Experience</span> version is a great choice. It includes a full graphical interface, making it easier to manage if you're used to a traditional Windows environment.</p>
                    <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/4.webp" alt="Server Installation step 3 Image">
                  </div>
                </div>

                <h2>4. Accepting License Terms</h2>

                <div class="step-container">
                  <div class="step-number">4</div>
                  <div class="step-content">
                    <p>Before proceeding, you'll need to accept Microsoft's license terms. One key detail mentioned is <strong>diagnostic and usage data collection</strong>, which is set to <span class="highlight">"Enhanced"</span> by default. This means Microsoft collects performance and security-related data to improve the OS.</p>
                    <p>Check the box to accept the terms and click <strong>Next</strong>.</p>
                    <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/5.webp" alt="Server Installation step 4 Image">
                  </div>
                </div>

                <h2>5. Choosing Installation Type</h2>

                <div class="step-container">
                  <div class="step-number">5</div>
                  <div class="step-content">
                    <p>Since we're installing a fresh copy of Windows Server, the <span class="highlight">Custom</span> option is the way to go:</p>
                    <div class="pros-cons">
                      <div class="pros">
                        <h3>Custom Installation</h3>
                        <ul>
                          <li>Performs a clean install</li>
                          <li>Recommended for new setups</li>
                          <li>Allows disk partitioning</li>
                        </ul>
                      </div>
                      <div class="cons">
                        <h3>Upgrade Installation</h3>
                        <ul>
                          <li>Only available when updating</li>
                          <li>Keeps files and settings</li>
                          <li>Not for fresh installs</li>
                        </ul>
                      </div>
                    </div>
                    <p>Select <strong>Custom</strong>, and you'll move to disk partitioning.</p>
                    <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/6.webp" alt="Server Installation step 5 Image">
                  </div>
                </div>

                <h2>6. Partitioning the Drive</h2>

                <div class="step-container">
                  <div class="step-number">6</div>
                  <div class="step-content">
                    <p>If your server has a fresh drive, you'll see unallocated space. Here's what you can do:</p>
                    <ul>
                      <li><strong>New</strong> - Create a partition</li>
                      <li><strong>Format</strong> - Prepares the drive for installation</li>
                      <li><strong>Delete</strong> - Removes existing partitions (useful if reusing a drive)</li>
                    </ul>
                    <p>For most users, selecting the unallocated space and clicking <strong>Next</strong> will automatically handle partitioning.</p>
                    <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/8.webp" alt="Server Installation step 6 Image">
                  </div>
                </div>

                <h2>7. Completing the Installation</h2>

                <div class="step-container">
                  <div class="step-number">7</div>
                  <div class="step-content">
                    <p>Once you confirm the partition, the installation begins. You'll see progress indicators for:</p>
                    <ul>
                      <li>Copying Windows files</li>
                      <li>Preparing files for installation</li>
                      <li>Installing features and updates</li>
                      <li>Finishing up</li>
                    </ul>
                    <p>This can take a while, so grab a coffee while Windows does its thing.</p>
                    <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/9.webp" alt="Server Installation step 7 Image">
                  </div>
                </div>

                <h2>8. Setting Up the Administrator Account</h2>

                <div class="step-container">
                  <div class="step-number">8</div>
                  <div class="step-content">
                    <p>After installation, you'll need to set a password for the <strong>Administrator</strong> account. Make sure it's strong - something like <code>Azure2021!</code> (but preferably more complex).</p>
                    <div class="best-for">
                      <p>Security Tip: Never leave the default password blank - this is a major security risk!</p>
                    </div>
                    <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/10.webp" alt="Server Installation step 8 Image">
                  </div>
                </div>

                <div class="conclusion">
                  <h2>Final Thoughts</h2>
                  <p>And that's it! You've successfully installed Windows Server 2022. From here, you can:</p>
                  <ul>
                    <li>Configure server roles like Active Directory or DNS</li>
                    <li>Set up remote desktop access for management</li>
                    <li>Install additional features through Server Manager</li>
                    <li>Configure security policies and user accounts</li>
                  </ul>
                  <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/11.webp" alt="Server Installation step 9 Image">
                  <br>
                  <img src="<?php echo $base_url; ?>/blogs/images/serverinstallation/12.webp" alt="Server Installation step 10 Image">
                  <br>
                  <p>Happy server admin-ing! 🚀</p>
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
