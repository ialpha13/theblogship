<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    $meta = [
      'title' => 'Server Administration | The Blog Ship',
      'description' => 'Guides, tutorials, and best practices for Windows Server, RAID configuration, and hardware setup.',
      'keywords' => 'Windows Server, RAID, HP ProLiant, Server Config, SysAdmin',
      'active_page' => 'categories/servers.php'
    ];
    require_once __DIR__ . '/../includes/meta.php';
  ?>
  <?php require_once __DIR__ . '/../includes/header.php'; ?>
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/blogs.css">
</head>
<body class="bg-[#0c0b09] text-white antialiased selection:bg-yellow-500/30">
  <?php require_once __DIR__ . '/../includes/navbar.php'; ?>

  <main class="bl-page">
    <div class="bl-wrap">
      <div class="bl-shell">
        
        <header class="bl-head">
          <div class="bl-badge">
            <div class="bl-dot"></div>
            <span class="bl-badge__text">Category</span>
          </div>
          <h1 class="bl-title">Server Administration</h1>
          <p class="bl-subtitle">Comprehensive guides for setting up, configuring, and managing enterprise servers.</p>
        </header>

        <div class="bl-container">
           <div class="maxbloging">
             <div class="grid">

                <?php include __DIR__ . '/../cards/serverinstallationcard.php'; ?>
                <?php include __DIR__ . '/../cards/basicserverconfigcard.php'; ?>
                <?php include __DIR__ . '/../cards/raidconfig.php'; ?>
                <?php include __DIR__ . '/../cards/raidcard.php'; ?>

             </div>
           </div>
        </div>

      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>