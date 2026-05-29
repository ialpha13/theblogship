<?php
// includes/favicons.php
// Assumes $base_url is available (from config.php). Fallback to BASE_URL or relative root.
if (!isset($base_url)) {
  if (defined('BASE_URL')) {
    $base_url = BASE_URL;
  } else {
    $base_url = '/';
  }
}

$base_url = rtrim($base_url, '/') . '/';
$fav = $base_url . 'assets/images/favicons/';
?>

<!-- Standard favicon -->
<link rel="icon" href="<?php echo $fav; ?>favicon.ico" sizes="any">

<!-- PNG favicons -->
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $fav; ?>favicon-16x16.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $fav; ?>favicon-32x32.png">
<link rel="icon" type="image/png" sizes="48x48" href="<?php echo $fav; ?>favicon-48x48.png">
<link rel="icon" type="image/png" sizes="64x64" href="<?php echo $fav; ?>favicon-64x64.png">

<!-- Apple -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $fav; ?>apple-touch-icon.png">

<!-- Android / PWA -->
<link rel="icon" type="image/png" sizes="192x192" href="<?php echo $fav; ?>android-chrome-192x192.png">
<link rel="icon" type="image/png" sizes="512x512" href="<?php echo $fav; ?>android-chrome-512x512.png">
