<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    $meta = [
      'title' => 'Networking Basics | The Blog Ship',
      'description' => 'Explore articles in Networking Basics - tutorials, insights, and practical guides.',
      'keywords' => 'Networking Basics, OSI Model, TCP/IP, IP Addressing',
      'active_page' => 'categories/networkingbasics.php'
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
          <h1 class="bl-title">Networking Basics</h1>
          <p class="bl-subtitle">Explore articles and guides in Networking Basics.</p>
        </header>

        <div class="bl-container">
           <div class="maxbloging">
             <div class="grid">
                <?php include __DIR__ . '/../cards/dynamicroutingcard.php'; ?>
             </div>
           </div>
        </div>

      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
