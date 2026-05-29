<?php
require_once __DIR__ . '/config.php';

header('Content-Type: application/xml; charset=UTF-8');

// Base pages
$pages = [
    '' => 1.0,
    'portfolio.php' => 0.8,
    'blogs.php' => 0.9,
    'categories.php' => 0.7,
    'contact.php' => 0.6,
    'resume.php' => 0.5
];

// Blog posts (Mirroring data from rss.php for consistency)
$blog_json = '[{"title": "Basic Steps After Deploying a Server", "link": "blogs/basicserverconfig.php"}, {"title": "The Importance of Cybersecurity in 2024", "link": "blogs/blog1.php"}, {"title": "5 Emerging IT Trends Shaping the Future", "link": "blogs/blog2.php"}, {"title": "The Rise of Cloud Computing in IT Infrastructure", "link": "blogs/blog3.php"}, {"title": "Default Static Routing & Floating Default Routes", "link": "blogs/defaultstaticrouting.php"}, {"title": "Dynamic Routing: Types, Protocols, and Working", "link": "blogs/dynamicrouting.php"}, {"title": "EIGRP Authentication", "link": "blogs/eigrp-auth.php"}, {"title": "EIGRP: Configuration, Metrics, and Path Selection", "link": "blogs/eigrp.php"}, {"title": "RAID and Understanding its Levels", "link": "blogs/raidblog.php"}, {"title": "A Hands-On Guide to Configuring RAID", "link": "blogs/raidconfiguration.php"}, {"title": "Guide to EIGRP and RIP Redistribution", "link": "blogs/redistribution-rip-eigrp.php"}, {"title": "RIP - Configuration, Compatibility, & Best Practices", "link": "blogs/rip.php"}, {"title": "Guide to Installing Windows Server", "link": "blogs/serverinstallation.php"}, {"title": "Static Routing & Floating Static Routes", "link": "blogs/staticrouting.php"}]';

$blogs = json_decode($blog_json, true);

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach ($pages as $path => $priority): ?>
    <url>
        <loc><?php echo $base_url . $path; ?></loc>
        <lastmod><?php 
            $file = __DIR__ . '/' . $path;
            // If file is root (empty path), check index.php
            if ($path === '') $file = __DIR__ . '/index.php';
            
            echo file_exists($file) ? date('c', filemtime($file)) : date('c'); 
        ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority><?php echo $priority; ?></priority>
    </url>
    <?php endforeach; ?>

    <?php if ($blogs): foreach ($blogs as $blog): ?>
    <?php 
        $link = ltrim($blog['link'], '/');
        $file = __DIR__ . '/' . $link;
        $date = file_exists($file) ? date('c', filemtime($file)) : date('c');
    ?>
    <url>
        <loc><?php echo $base_url . $link; ?></loc>
        <lastmod><?php echo $date; ?></lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php endforeach; endif; ?>
</urlset>