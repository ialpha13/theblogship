<?php
require_once __DIR__ . '/config.php';

header('Content-Type: application/rss+xml; charset=UTF-8');

$items = json_decode('[{"title": "Basic Steps After Deploying a Server", "excerpt": "A post-deployment checklist for server basics: updates, users, firewalls, monitoring, backups, and validation.", "link": "blogs/basicserverconfig.php"}, {"title": "The Importance of Cybersecurity in 2024", "excerpt": "Why cyber hygiene matters more than ever - common threats, practical controls, and a priority checklist.", "link": "blogs/blog1.php"}, {"title": "5 Emerging IT Trends Shaping the Future", "excerpt": "A quick scan of the IT trends teams are investing in - what they mean and how to prepare.", "link": "blogs/blog2.php"}, {"title": "The Rise of Cloud Computing in IT Infrastructure", "excerpt": "How cloud reshapes infrastructure - key concepts, benefits, and hybrid trade-offs.", "link": "blogs/blog3.php"}, {"title": "Default Static Routing & Floating Default Routes", "excerpt": "Configure default routes the right way - plus floating defaults for simple multi-path failover.", "link": "blogs/defaultstaticrouting.php"}, {"title": "Dynamic Routing: Types, Protocols, and Working", "excerpt": "A clear overview of dynamic routing - protocol families, metrics, convergence, and when to use each approach.", "link": "blogs/dynamicrouting.php"}, {"title": "EIGRP Authentication", "excerpt": "Secure EIGRP adjacencies using authentication: key chains, rotation, common pitfalls, and verification.", "link": "blogs/eigrp-auth.php"}, {"title": "EIGRP: Configuration, Metrics, and Path Selection", "excerpt": "Configure EIGRP correctly, understand its metric calculation, and see how DUAL chooses loop-free paths.", "link": "blogs/eigrp.php"}, {"title": "RAID and Understanding its Levels", "excerpt": "Understand RAID 0/1/5/6/10 trade-offs - capacity, performance, fault tolerance, and practical selection.", "link": "blogs/raidblog.php"}, {"title": "A Hands-On Guide to Configuring RAID", "excerpt": "Practical steps to configure RAID (BIOS/UEFI or controller), validate arrays, and confirm OS visibility.", "link": "blogs/raidconfiguration.php"}, {"title": "Guide to EIGRP and RIP Redistribution", "excerpt": "Redistribute routes between RIP and EIGRP safely: seed metrics, filtering, and avoiding loops.", "link": "blogs/redistribution-rip-eigrp.php"}, {"title": "RIP - Configuration, Compatibility, & Best Practices", "excerpt": "Configure RIP (v2), validate updates, and apply best practices to avoid loops and noisy routes.", "link": "blogs/rip.php"}, {"title": "Guide to Installing Windows Server", "excerpt": "A step-by-step Windows Server installation walkthrough - media, boot options, partitioning, and post-install checks.", "link": "blogs/serverinstallation.php"}, {"title": "Static Routing & Floating Static Routes", "excerpt": "Learn how static routes work and how floating statics provide simple failover using administrative distance.", "link": "blogs/staticrouting.php"}]', true);

function xml_escape($s) {
 return htmlspecialchars($s ?? '', ENT_XML1 | ENT_COMPAT, 'UTF-8');
}

$siteTitle = "The Blog Ship";
$siteLink = rtrim($base_url, '/').'/';
$siteDesc = "Latest articles from The Blog Ship.";

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<rss version="2.0">
 <channel>
 <title><?php echo xml_escape($siteTitle); ?></title>
 <link><?php echo xml_escape($siteLink); ?></link>
 <description><?php echo xml_escape($siteDesc); ?></description>
 <language>en</language>

 <?php foreach ($items as $it): ?>
 <?php
 $link = rtrim($base_url, '/') . '/' . ltrim($it['link'], '/');
 $localPath = __DIR__ . '/' . ltrim($it['link'], '/');
 $pub = file_exists($localPath) ? gmdate(DATE_RSS, filemtime($localPath)) : gmdate(DATE_RSS);
 ?>
 <item>
 <title><?php echo xml_escape($it['title']); ?></title>
 <link><?php echo xml_escape($link); ?></link>
 <guid><?php echo xml_escape($link); ?></guid>
 <pubDate><?php echo xml_escape($pub); ?></pubDate>
 <description><?php echo xml_escape($it['excerpt']); ?></description>
 </item>
 <?php endforeach; ?>
 </channel>
</rss>
