<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    $meta = [
      'title' => 'Categories | The Blog Ship',
      'description' => 'Browse our articles by category: Networking, Servers, Cybersecurity, and Technology.',
      'keywords' => 'Categories, Topics, Networking, Servers, Security, Tech',
      'active_page' => 'categories.php'
    ];
    require_once __DIR__ . '/includes/meta.php';
  ?>
  <?php require_once __DIR__ . '/includes/header.php'; ?>
  <link rel="manifest" href="<?php echo $base_url; ?>manifest.json">
  <meta name="theme-color" content="#0c0b09">
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/blogs.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/categories.css">
  <script src="<?php echo $base_url; ?>assets/js/pages/blogs.js" defer></script>
  <script src="<?php echo $base_url; ?>assets/js/pages/categories.js" defer></script>
</head>
<body class="bg-[#0c0b09] text-white antialiased selection:bg-yellow-500/30">
  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="bl-page">
    <div class="bl-wrap">
      <div class="bl-shell">
        
        <header class="bl-head bl-anim">
          <div class="bl-badge bl-anim-item">
            <div class="bl-dot"></div>
            <span class="bl-badge__text">Explore</span>
          </div>
          <h1 class="bl-title bl-anim-item">Categories</h1>
          <p class="bl-subtitle bl-anim-item">Dive into our curated collections of articles, guides, and tutorials.</p>
        </header>

        <div class="bl-container bl-anim bl-delay-1">
           <div class="cat-dashboard">
           
           <!-- Quick Stats -->
           <div class="cat-stats">
             <div class="cat-stat-card" style="--accent: #38BDF8">
               <div class="cat-stat-icon"><i class="ri-folder-3-line"></i></div>
               <div class="cat-stat-info">
                 <span class="cat-stat-val" id="statCats">0</span>
                 <span class="cat-stat-label">Categories</span>
               </div>
             </div>
             <div class="cat-stat-card" style="--accent: #34D399">
               <div class="cat-stat-icon"><i class="ri-file-list-3-line"></i></div>
               <div class="cat-stat-info">
                 <span class="cat-stat-val" id="statArts">0</span>
                 <span class="cat-stat-label">Articles</span>
               </div>
             </div>
             <div class="cat-stat-card" style="--accent: #FBBF24">
               <div class="cat-stat-icon"><i class="ri-time-line"></i></div>
               <div class="cat-stat-info">
                 <span class="cat-stat-val">Weekly</span>
                 <span class="cat-stat-label">Updates</span>
               </div>
             </div>
           </div>

           <!-- Search -->
           <div class="cat-controls">
             <div class="cat-search-wrap">
               <i class="ri-search-line"></i>
               <input type="text" id="catSearch" placeholder="Filter categories..." autocomplete="off">
             </div>
           </div>
           
           <div id="catNoResults" class="cat-no-results">
             No categories found matching your search.
           </div>

           <!-- Infrastructure Section -->
           <div class="cat-section" style="--accent: #38BDF8">
             <div class="cat-section-header">
               <div class="cat-section-icon"><i class="ri-server-line"></i></div>
               <h2 class="cat-section-title">Infrastructure & Networking</h2>
             </div>
             <div class="cat-grid">

                <!-- Networking -->
                <a href="<?php echo $base_url; ?>categories/networking.php" class="cat-card cat-net">
                  <div class="cat-icon-box">
                    <i class="ri-router-line"></i>
                    <span class="cat-badge">7</span>
                  </div>
                  <span class="cat-title">Networking</span>
                </a>

                <!-- Server Administration -->
                <a href="<?php echo $base_url; ?>categories/servers.php" class="cat-card cat-srv">
                  <div class="cat-icon-box">
                    <i class="ri-server-line"></i>
                    <span class="cat-badge">4</span>
                  </div>
                  <span class="cat-title">Server Admin</span>
                </a>

                <!-- Cloud Networking -->
                <a href="<?php echo $base_url; ?>categories/cloudnetworking.php" class="cat-card cat-cloud">
                  <div class="cat-icon-box">
                    <i class="ri-cloud-line"></i>
                    <span class="cat-badge">1</span>
                  </div>
                  <span class="cat-title">Cloud Net</span>
                </a>

                <!-- Network Devices -->
                <a href="<?php echo $base_url; ?>categories/devicesconfig.php" class="cat-card cat-net">
                  <div class="cat-icon-box">
                    <i class="ri-switch-line"></i>
                    <span class="cat-badge">5</span>
                  </div>
                  <span class="cat-title">Devices</span>
                </a>

                <!-- Networking Basics -->
                <a href="<?php echo $base_url; ?>categories/networkingbasics.php" class="cat-card cat-net">
                  <div class="cat-icon-box">
                    <i class="ri-base-station-line"></i>
                    <span class="cat-badge">1</span>
                  </div>
                  <span class="cat-title">Net Basics</span>
                </a>
             </div>
           </div>

           <!-- Security Section -->
           <div class="cat-section" style="--accent: #F87171">
             <div class="cat-section-header">
               <div class="cat-section-icon"><i class="ri-shield-check-line"></i></div>
               <h2 class="cat-section-title">Security</h2>
             </div>
             <div class="cat-grid">
                <!-- Cybersecurity -->
                <a href="<?php echo $base_url; ?>categories/cybersecurity.php" class="cat-card cat-sec">
                  <div class="cat-icon-box">
                    <i class="ri-shield-check-line"></i>
                    <span class="cat-badge">1</span>
                  </div>
                  <span class="cat-title">Cybersecurity</span>
                </a>

                <!-- Network Security -->
                <a href="<?php echo $base_url; ?>categories/networksecurity.php" class="cat-card cat-sec">
                  <div class="cat-icon-box">
                    <i class="ri-lock-password-line"></i>
                    <span class="cat-badge">1</span>
                  </div>
                  <span class="cat-title">Net Security</span>
                </a>
             </div>
           </div>

           <!-- Resources & Trends Section -->
           <div class="cat-section" style="--accent: #A78BFA">
             <div class="cat-section-header">
               <div class="cat-section-icon"><i class="ri-book-open-line"></i></div>
               <h2 class="cat-section-title">Resources & Trends</h2>
             </div>
             <div class="cat-grid">
              <!-- Technology -->
              <a href="<?php echo $base_url; ?>categories/technology.php" class="cat-card cat-tech">
                <div class="cat-icon-box">
                  <i class="ri-cpu-line"></i>
                  <span class="cat-badge">2</span>
                </div>
                <span class="cat-title">Technology</span>
              </a>

              <!-- Tools & Labs -->
              <a href="<?php echo $base_url; ?>categories/tools&labs.php" class="cat-card cat-tech">
                <div class="cat-icon-box">
                  <i class="ri-terminal-box-line"></i>
                  <span class="cat-badge">18</span>
                </div>
                <span class="cat-title">Tools & Labs</span>
              </a>

              <!-- Tutorials -->
              <a href="<?php echo $base_url; ?>categories/tutorials.php" class="cat-card cat-tut">
                <div class="cat-icon-box">
                  <i class="ri-book-open-line"></i>
                  <span class="cat-badge">5</span>
                </div>
                <span class="cat-title">Tutorials</span>
              </a>

              <!-- News and Trends -->
              <a href="<?php echo $base_url; ?>categories/newsandtrends.php" class="cat-card cat-news">
                <div class="cat-icon-box">
                  <i class="ri-newspaper-line"></i>
                  <span class="cat-badge">1</span>
                </div>
                <span class="cat-title">News & Trends</span>
              </a>
             </div>
           </div>
           </div> <!-- end dashboard -->
        </div>

      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>