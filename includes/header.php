<?php
// includes/header.php
// Assumes $base_url is available via config.php in calling page.
// If not, fall back:
if (!isset($base_url)) { $base_url = "./"; }
?>
<?php include __DIR__ . '/favicons.php'; ?>
<!-- Icons / Fonts -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<!-- Tailwind (you already use it) -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>

<!-- Glass System (NEW base) -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/base/glass-tokens.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/base/glass-utilities.css">

<!-- Global Base -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/styles.css">

<!-- Components -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/components/navbar.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/components/footer.css">

<script>window.GS_BASE_URL = "<?php echo $base_url; ?>";</script>

<script src="<?php echo $base_url; ?>assets/js/components/navbar.js" defer></script>
<script src="<?php echo $base_url; ?>assets/js/components/footer.js" defer></script>
