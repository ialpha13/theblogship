<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <?php
 $meta = [
 'title' => "Privacy Policy | The Blog Ship",
 'description' => "Read the privacy policy for The Blog Ship.",
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
 <h1 style="font-size: clamp(28px, 3.2vw, 44px); line-height:1.12; letter-spacing:-0.02em; margin: 6px 0 10px;">Privacy Policy</h1>
 <div style="opacity:.86; line-height:1.75;">
 <p>This website may collect basic analytics and information you submit through forms (such as the contact form or newsletter subscription).</p>
<h2 style="font-size:22px; font-weight:800; margin:26px 0 10px;">Information you provide</h2>
<ul>
 <li>Contact form submissions: name, email, and your message.</li>
 <li>Newsletter subscription: email address.</li>
</ul>
<h2 style="font-size:22px; font-weight:800; margin:26px 0 10px;">How it’s used</h2>
<ul>
 <li>To respond to your messages.</li>
 <li>To send requested updates (if you subscribed).</li>
 <li>To maintain basic site operations and security.</li>
</ul>
<h2 style="font-size:22px; font-weight:800; margin:26px 0 10px;">Data retention</h2>
<p>Messages and subscription records may be retained as needed for operational purposes.</p>
<h2 style="font-size:22px; font-weight:800; margin:26px 0 10px;">Contact</h2>
<p>If you have questions about this policy, use the <a href="<?php echo $base_url; ?>contact.php">contact page</a>.</p>

 </div>
 </section>
 </main>

 <?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
