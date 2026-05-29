<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
    $meta = [
      'title' => "Portfolio | The Blog Ship",
      'description' => "Projects, labs, and case studies in networking and cybersecurity.",
      'active_page' => 'portfolio.php'
    ];
    require_once __DIR__ . '/includes/meta.php';
  ?>
  <?php require_once __DIR__ . '/includes/header.php'; ?>

  <link rel="manifest" href="<?php echo $base_url; ?>manifest.json">
  <meta name="theme-color" content="#0c0b09">
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/portfolio.css">
  <script src="<?php echo $base_url; ?>assets/js/pages/portfolio.js" defer></script>

  <!-- JSON-LD Structured Data (Person) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfilePage",
    "mainEntity": {
      "@type": "Person",
      "name": "Umair Khan",
      "jobTitle": "Network & Security Engineer",
      "url": "<?php echo $base_url; ?>portfolio.php",
      "sameAs": [
        "https://www.linkedin.com/in/iprouteumair/",
        "https://www.credly.com/users/iprouteumair13"
      ],
      "worksFor": {
        "@type": "Organization",
        "name": "Open to Work"
      }
    }
  }
  </script>
</head>

<body class="bg-[#0c0b09] text-white antialiased selection:bg-yellow-500/30">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="pf-page">
    <div class="pf-wrap">
    <div class="pf-shell">
    
    <!-- Hero Section -->
    <header class="pf-head pf-reveal">
      <div class="pf-hero-badge">
        <div class="pf-dot"></div>
        <span class="pf-badge__text">Portfolio</span>
      </div>
      <h1 class="pf-title">Umair Khan</h1>
      <p class="pf-subtitle">
        Network & Security Engineer specializing in enterprise infrastructure, routing protocols, and perimeter security.
      </p>
      <div class="pf-status-wrap">
        <div class="pf-status"><span class="pf-status__dot"></span> Open to Work</div>
      </div>
      <div class="pf-socials">
        <a href="https://www.linkedin.com/in/iprouteumair/" target="_blank" rel="noopener noreferrer" class="pf-btn-li">
          <i class="ri-linkedin-box-fill"></i> LinkedIn Profile
        </a>
        <a href="<?php echo $base_url; ?>assets/docs/resume.pdf" class="pf-btn-resume" download>
          <i class="ri-file-download-line"></i> Download CV
        </a>
      </div>
    </header>

    <!-- Certificates -->
    <div class="pf-certs pf-reveal">
      <h2 class="pf-section-title">Certificates</h2>
      <div class="pf-cert-grid">
        <?php
        // The only valid path for certificates
        $cert_dir = __DIR__ . '/assets/file/certificates/';
        $cert_url = $base_url . 'assets/file/certificates/';

        if (is_dir($cert_dir)) {
            // Certificates are only in PNG format
            $certs = array_merge(glob($cert_dir . "*.png"), glob($cert_dir . "*.PNG"));
            if ($certs) {
                foreach ($certs as $cert) {
                    $filename = basename($cert);
                    $name = pathinfo($filename, PATHINFO_FILENAME);
                    $display_name = ucwords(str_replace(['-', '_'], ' ', $name));
                    // Use the generic placeholder image for all certificates
                    $url = $cert_url . 'placeholdercertificate.png';
                    $date = date("M Y", filemtime($cert)); // Use file date as description
                    ?>
                    <div class="pf-cert-card" onclick="openCertModal('<?php echo htmlspecialchars($display_name, ENT_QUOTES); ?>', '<?php echo htmlspecialchars($url, ENT_QUOTES); ?>', 'img')">
                        <div class="pf-cert-preview">
                            <img src="<?php echo htmlspecialchars($url); ?>" alt="<?php echo htmlspecialchars($display_name); ?>">
                        </div>
                        <div class="pf-cert-info">
                            <h3><?php echo htmlspecialchars($display_name); ?></h3>
                            <p>Issued: <?php echo $date; ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p style="color:rgba(255,255,255,0.5);">No PNG certificates found in the directory.</p>';
            }
        } else {
            echo '<p style="color:rgba(255,255,255,0.5);">Certificates folder not found at assets/file/certificates/.</p>';
        }
        ?>
      </div>
    </div>

    <!-- Credly Badges -->
    <div class="pf-credly pf-reveal">
      <h2 class="pf-section-title">Verified Credentials</h2>
      <p class="pf-subtitle" style="margin-bottom: 30px;">
        Digital badges verified by Credly. 
        <a href="https://www.credly.com/users/iprouteumair13" target="_blank" style="color: #38BDF8; text-decoration: underline; text-underline-offset: 4px;">View full profile</a>
      </p>
      
      <div class="pf-credly-grid">
        <!-- CCNP Enterprise -->
        <div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="6bec059a-f65c-424a-9bd7-a486e63c9f81" data-share-badge-host="https://www.credly.com"></div>
        <!-- CCNA -->
        <div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="78a2f6b1-2db8-4dcf-9817-a8449328125b" data-share-badge-host="https://www.credly.com"></div>
        <!-- Specialist: Enterprise Advanced Infrastructure Implementation -->
        <div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="88b9df50-802b-4cc2-a1cd-196e635dedad" data-share-badge-host="https://www.credly.com"></div>
        <div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="79a970f8-142f-4639-a9db-c9e25a7f26be" data-share-badge-host="https://www.credly.com"></div>
        <div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="14dd6de9-7b8e-4b29-a0c5-92363bebfa4d" data-share-badge-host="https://www.credly.com"></div>
        <div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="8232cf54-01b1-4f86-b851-cc7bd47c702c" data-share-badge-host="https://www.credly.com"></div>
        <div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="c21d2ed1-4af9-4b28-bb8d-bd9f36afca40" data-share-badge-host="https://www.credly.com"></div>
        <div data-iframe-width="150" data-iframe-height="270" data-share-badge-id="aca169f7-d7e5-448c-b92f-e4197e042a5b" data-share-badge-host="https://www.credly.com"></div>
        <script type="text/javascript" async src="//cdn.credly.com/assets/utilities/embed.js"></script>
      </div>
      
      <div class="pf-credly-action">
        <a href="https://www.credly.com/users/iprouteumair13" target="_blank" class="pf-btn-li">View on Credly <i class="ri-external-link-line"></i></a>
      </div>
    </div>

    <!-- CTA -->
    <div class="pf-cta pf-reveal">
      <div class="pf-cta__glass">
        <h2>Want to see the details?</h2>
        <p>Check out the blog for detailed write-ups on these projects.</p>
        <a href="<?php echo $base_url; ?>blogs.php" class="pf-cta__btn">Read Articles</a>
      </div>
    </div>

    </div>
    </div>

    <!-- Modal -->
    <div id="pf-modal" class="pf-modal">
      <div class="pf-modal__backdrop"></div>
      <div class="pf-modal__panel">
        <button class="pf-modal__close"><i class="ri-close-line"></i></button>
        <h3 id="modal-title" class="pf-modal__title"></h3>
        <div id="modal-media" style="margin-bottom: 20px;"></div>
        <p id="modal-desc" class="pf-modal__desc"></p>
      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>