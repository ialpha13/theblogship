<?php
/**
 * Global config (project-root safe)
 * Fixes nested folder pages (e.g., /blogs/*) so assets load correctly.
 *
 * Provides:
 * - $base_url (string) : absolute base URL ending with /
 * - BASE_URL (constant): same as $base_url
 */

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
// Sanitize host to prevent Host Header Injection
$host = preg_replace('/[^a-zA-Z0-9.:-]/', '', $host);

$scriptName = $_SERVER['SCRIPT_NAME'] ?? '/';
$scriptName = str_replace('\\', '/', $scriptName);

// Start from the directory of the current script
$basePath = rtrim(dirname($scriptName), '/');
if ($basePath === '') $basePath = '/';

// If we're inside known subfolders, climb back to project root
$knownSubdirs = ['blogs','categories','includes','cards','assets'];
$parts = array_values(array_filter(explode('/', trim($basePath, '/')), 'strlen'));

while (!empty($parts) && in_array(end($parts), $knownSubdirs, true)) {
 array_pop($parts);
}

$rootPath = '/' . implode('/', $parts);
if ($rootPath === '/') {
 // installed at web root
 $rootPath = '';
}

$base_url = $scheme . '://' . $host . $rootPath . '/';

if (!defined('BASE_URL')) {
 define('BASE_URL', $base_url);
}

// Database Configuration
// Secure handling: allow environment variables or a local override file.
// Create `config.local.php` (gitignored) or set DB_HOST/DB_NAME/DB_USER/DB_PASS env vars.
// config.local.php.example is provided as a template.

// Load local overrides if present (not committed to repo)
$local_config = __DIR__ . '/config.local.php';
if (file_exists($local_config)) {
    require_once $local_config;
}

// Environment fallback
if (!defined('DB_HOST')) define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
if (!defined('DB_NAME')) define('DB_NAME', getenv('DB_NAME') ?: 'theblogship_db');
if (!defined('DB_USER')) define('DB_USER', getenv('DB_USER') ?: 'dbuser');
if (!defined('DB_PASS')) define('DB_PASS', getenv('DB_PASS') ?: '');

// Optional: mail sender (for contact form)
if (!defined('SITE_MAIL_FROM')) define('SITE_MAIL_FROM', 'no-reply@' . $host);
if (!defined('SITE_MAIL_TO')) define('SITE_MAIL_TO', 'info@theblogship.com');

// Session for CSRF protection
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!function_exists('generate_csrf_token')) {
    function generate_csrf_token() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}

if (!function_exists('verify_csrf_token')) {
    function verify_csrf_token($token) {
        if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
            return false;
        }
        return true;
    }
}

if (!function_exists('check_rate_limit')) {
    function check_rate_limit($key, $seconds = 60) {
        if (isset($_SESSION[$key]) && (time() - $_SESSION[$key] < $seconds)) {
            return false;
        }
        $_SESSION[$key] = time();
        return true;
    }
}
?>