<?php
/**
 * Meta template system
 * Usage:
 * $meta = [
 * 'title' => 'About | The Blog Ship',
 * 'description' => '...',
 * 'keywords' => '...',
 * 'robots' => 'index, follow',
 * 'type' => 'website',
 * 'image' => $base_url . 'assets/images/og-image.jpg',
 * 'twitter_card' => 'summary_large_image',
 * ];
 * require_once __DIR__ . '/meta.php';
 */

if (!isset($base_url)) {
 // Prefer BASE_URL from config.php if it exists
 if (defined('BASE_URL')) $base_url = BASE_URL;
 else $base_url = '/';
}

if (!function_exists('blogship_canonical_url')) {
 function blogship_canonical_url(string $base_url): string {
 $uri = $_SERVER['REQUEST_URI'] ?? '/';
 $uriPath = parse_url($uri, PHP_URL_PATH) ?: '/';
 $uriPath = preg_replace('#/+#', '/', $uriPath);

 $base_url = rtrim($base_url, '/') . '/';
 $uriPath = ltrim($uriPath, '/');

 return $base_url . $uriPath;
 }
}

$meta = $meta ?? [];
$title = $meta['title'] ?? 'The Blog Ship';
$description = $meta['description'] ?? 'The Blog Ship - insights in technology, cybersecurity, networking, and social media.';
$keywords = $meta['keywords'] ?? 'Technology, Cybersecurity, Networking, Social Media, The Blog Ship';
$robots = $meta['robots'] ?? 'index, follow';
$type = $meta['type'] ?? 'website';

$image = $meta['image'] ?? (rtrim($base_url, '/') . '/assets/images/og-image.jpg');
$twitter_card = $meta['twitter_card'] ?? 'summary_large_image';

$canonical = $meta['canonical'] ?? blogship_canonical_url($base_url);
?>
<title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
<link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>" />

<meta name="description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>" />
<meta name="keywords" content="<?php echo htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8'); ?>" />
<meta name="robots" content="<?php echo htmlspecialchars($robots, ENT_QUOTES, 'UTF-8'); ?>" />

<meta property="og:title" content="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" />
<meta property="og:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>" />
<meta property="og:image" content="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" />
<meta property="og:url" content="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>" />
<meta property="og:type" content="<?php echo htmlspecialchars($type, ENT_QUOTES, 'UTF-8'); ?>" />

<meta name="twitter:card" content="<?php echo htmlspecialchars($twitter_card, ENT_QUOTES, 'UTF-8'); ?>" />
<meta name="twitter:title" content="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" />
<meta name="twitter:description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>" />
<meta name="twitter:image" content="<?php echo htmlspecialchars($image, ENT_QUOTES, 'UTF-8'); ?>" />
