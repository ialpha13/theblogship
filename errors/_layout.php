<?php require_once __DIR__ . '/../config.php'; ?>
<?php
$code = $code ?? 500;
$title = $title ?? "Something went wrong";
$message = $message ?? "An unexpected error occurred.";
$meta = [
 'title' => $code . " | The Blog Ship",
 'description' => $title,
 'type' => "website",
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <?php include __DIR__ . '/../includes/meta.php'; ?>
 <?php include __DIR__ . '/../includes/header.php'; ?>
 <style>
 .err-wrap{ max-width: 980px; margin: 18px auto 28px; padding: 22px 18px; }
 .err-code{ font-size: clamp(42px, 6vw, 78px); font-weight: 900; letter-spacing: -0.04em; margin: 0; }
 .err-title{ font-size: 22px; font-weight: 800; margin: 8px 0 10px; }
 .err-msg{ opacity: .86; line-height: 1.75; margin: 0 0 14px; }
 .err-actions{ display:flex; gap:10px; flex-wrap: wrap; margin-top: 12px; }
 .err-btn{ display:inline-flex; align-items:center; gap:8px; padding: 10px 14px; border-radius: 14px;
 background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.12); text-decoration: none; }
 .err-btn:hover{ opacity: .92; }
 </style>
</head>
<body class="bl-page">
 <div class="ms-bg"></div>
 <div class="ms-noise"></div>

 <?php include __DIR__ . '/../includes/navbar.php'; ?>

 <main class="ms-page-pad" role="main">
 <section class="ms-card err-wrap">
 <p class="err-code"><?php echo htmlspecialchars((string)$code); ?></p>
 <h1 class="err-title"><?php echo htmlspecialchars($title); ?></h1>
 <p class="err-msg"><?php echo htmlspecialchars($message); ?></p>
 <div class="err-actions">
 <a class="err-btn" href="<?php echo $base_url; ?>index.php"><i class="ri-home-4-line" aria-hidden="true"></i><span>Home</span></a>
 <a class="err-btn" href="<?php echo $base_url; ?>blogs.php"><i class="ri-file-list-3-line" aria-hidden="true"></i><span>Blogs</span></a>
 <a class="err-btn" href="<?php echo $base_url; ?>contact.php"><i class="ri-mail-line" aria-hidden="true"></i><span>Contact</span></a>
 </div>
 </section>
 </main>

 <?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
