<?php require_once __DIR__ . '/../config.php'; ?>

<?php
// Active state helper
$path = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
$currentPage = basename($path ?: ($_SERVER['PHP_SELF'] ?? 'index.php'));
if ($currentPage === '' || $currentPage === '/') $currentPage = 'index.php';

if (!function_exists('ms_active')) {
 function ms_active(string $file, string $currentPage): string {
 return ($currentPage === $file) ? ' is-active' : '';
 }
}
if (!function_exists('ms_aria_current')) {
 function ms_aria_current(string $file, string $currentPage): string {
 return ($currentPage === $file) ? ' aria-current="page"' : '';
 }
}
?>

<div class="ms-navbar-wrap">
 <div class="ms-navbar" id="ms-navbar">
 <div class="ms-nav-inner">
 <div class="ms-brand">
 <a href="<?php echo $base_url; ?>index.php" class="ms-brand__link">
 <img
 src="<?php echo $base_url; ?>assets/images/theblogship2.png"
 alt="The Blog Ship Logo"
 class="ms-logo"
 />
 </a>
</div>


 <nav class="ms-links">
 <a href="<?php echo $base_url; ?>index.php" class="ms-link<?php echo ms_active('index.php', $currentPage); ?>"<?php echo ms_aria_current('index.php', $currentPage); ?>>Home</a>
 <a href="<?php echo $base_url; ?>blogs.php" class="ms-link<?php echo ms_active('blogs.php', $currentPage); ?>"<?php echo ms_aria_current('blogs.php', $currentPage); ?>>Blogs</a>
 <a href="<?php echo $base_url; ?>categories.php" class="ms-link<?php echo ms_active('categories.php', $currentPage); ?>"<?php echo ms_aria_current('categories.php', $currentPage); ?>>Categories</a>
 <a href="<?php echo $base_url; ?>portfolio.php" class="ms-link<?php echo ms_active('portfolio.php', $currentPage); ?>"<?php echo ms_aria_current('portfolio.php', $currentPage); ?>>Portfolio</a>
 <a href="<?php echo $base_url; ?>about.php" class="ms-link<?php echo ms_active('about.php', $currentPage); ?>"<?php echo ms_aria_current('about.php', $currentPage); ?>>About</a>
 <a href="<?php echo $base_url; ?>contact.php" class="ms-link ms-link--cta<?php echo ms_active('contact.php', $currentPage); ?>"<?php echo ms_aria_current('contact.php', $currentPage); ?>>Contact</a>
 </nav>



 <button class="ms-menu-btn" id="ms-menu-toggle" aria-label="Open menu" aria-expanded="false">
 <i class="ri-menu-3-line"></i>
 </button>
 </div>

 <!-- Mobile panel -->
 <div class="ms-mobile-menu" id="ms-mobile-menu" aria-hidden="true">
 <nav class="ms-mobile-links">
 <a href="<?php echo $base_url; ?>index.php" class="ms-m-link<?php echo ms_active('index.php', $currentPage); ?>"<?php echo ms_aria_current('index.php', $currentPage); ?>>Home</a>
 <a href="<?php echo $base_url; ?>blogs.php" class="ms-m-link<?php echo ms_active('blogs.php', $currentPage); ?>"<?php echo ms_aria_current('blogs.php', $currentPage); ?>>Blogs</a>
 <a href="<?php echo $base_url; ?>categories.php" class="ms-m-link<?php echo ms_active('categories.php', $currentPage); ?>"<?php echo ms_aria_current('categories.php', $currentPage); ?>>Categories</a>
 <a href="<?php echo $base_url; ?>portfolio.php" class="ms-m-link<?php echo ms_active('portfolio.php', $currentPage); ?>"<?php echo ms_aria_current('portfolio.php', $currentPage); ?>>Portfolio</a>
 <a href="<?php echo $base_url; ?>about.php" class="ms-m-link<?php echo ms_active('about.php', $currentPage); ?>"<?php echo ms_aria_current('about.php', $currentPage); ?>>About</a>
 <a href="<?php echo $base_url; ?>contact.php" class="ms-m-link ms-m-link--cta<?php echo ms_active('contact.php', $currentPage); ?>"<?php echo ms_aria_current('contact.php', $currentPage); ?>>Contact</a>
 </nav>

  </div>
 </div>

 <!-- Overlay (click to close) -->
 <div class="ms-nav-overlay" id="ms-nav-overlay" aria-hidden="true"></div>
</div>
