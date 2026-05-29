<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    $meta = [
      'title' => 'Networking | The Blog Ship',
      'description' => 'Deep dives into routing protocols, network configuration, Cisco technologies, and topology design.',
      'keywords' => 'Networking, Cisco, CCNA, EIGRP, RIP, Static Routing, Dynamic Routing',
      'active_page' => 'categories/networking.php'
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
          <h1 class="bl-title">Networking</h1>
          <p class="bl-subtitle">Master the art of connecting systems. From basic static routing to advanced dynamic protocols.</p>
        </header>

        <div class="bl-container">
           <div class="maxbloging">
             <div class="grid">

                <?php include __DIR__ . '/../cards/staticroutingcard.php'; ?>
                <?php include __DIR__ . '/../cards/defaultroutingcard.php'; ?>
                <?php include __DIR__ . '/../cards/eigrpcard.php'; ?>
                <?php include __DIR__ . '/../cards/ripcard.php'; ?>
                <?php include __DIR__ . '/../cards/eigrp-auth-card.php'; ?>
                <?php include __DIR__ . '/../cards/dynamicroutingcard.php'; ?>
                <?php include __DIR__ . '/../cards/redistributionripeigrpcard.php'; ?>

             </div>
           </div>
        </div>

      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>