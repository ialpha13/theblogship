<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <?php
 $meta = [
 'title' => "Terms | The Blog Ship",
 'description' => "Read the terms and conditions for The Blog Ship.",
 'type' => "website",
 ];
 include __DIR__ . '/includes' . '/meta.php';
 ?>
 <?php include __DIR__ . '/includes/header.php'; ?>
</head>
<body class="bl-page">
 <div class="ms-bg"></div>
 <div class="ms-noise"></div>

 <?php include __DIR__ . '/includes/navbar.php'; ?>

 <main class="ms-page-pad" role="main">
 <section class="ms-card" style="max-width: 1040px; margin: 18px auto 28px; padding: 22px 18px;">
 <h1 style="font-size: clamp(28px, 3.2vw, 44px); line-height:1.12; letter-spacing:-0.02em; margin: 6px 0 10px;">Terms & Conditions</h1>
 <div style="opacity:.86; line-height:1.75;">
 <p>By using this website, you agree to the following terms.</p>
<h2 style="font-size:22px; font-weight:800; margin:26px 0 10px;">Content</h2>
<p>Articles are provided for informational purposes. No guarantees are made about completeness or suitability for a specific purpose.</p>
<h2 style="font-size:22px; font-weight:800; margin:26px 0 10px;">External links</h2>
<p>This site may link to third-party websites. We are not responsible for their content or policies.</p>
<h2 style="font-size:22px; font-weight:800; margin:26px 0 10px;">Acceptable use</h2>
<p>Do not misuse the website, attempt unauthorized access, or disrupt services.</p>
<h2 style="font-size:22px; font-weight:800; margin:26px 0 10px;">Contact</h2>
<p>For questions, use the <a href="<?php echo $base_url; ?>contact.php">contact page</a>.</p>

 </div>
 </section>
 </main>

 <?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
