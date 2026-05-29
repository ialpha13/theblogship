<?php
require_once __DIR__ . '/config.php';
header('Content-Type: text/plain');
?>
User-agent: *
Allow: /

Sitemap: <?php echo $base_url; ?>sitemap.xml