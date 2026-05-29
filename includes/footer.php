<?php require_once __DIR__ . '/../config.php'; ?>

<footer class="gs-footer" role="contentinfo">
    <div class="gs-footer__inner">
        
        <div class="gs-footer__top">
            <!-- Brand -->
            <a class="gs-footer__brand" href="<?php echo $base_url; ?>index.php" aria-label="The Blog Ship Home">
                <img src="<?php echo $base_url; ?>assets/images/theblogship2.png" alt="The Blog Ship">
            </a>

            <!-- Links -->
            <nav class="gs-footer__nav" aria-label="Footer links">
                <a href="<?php echo $base_url; ?>privacy.php">Privacy</a>
                <a href="<?php echo $base_url; ?>terms.php">Terms</a>
                <a href="<?php echo $base_url; ?>glossary.php">Glossary</a>
                <a href="<?php echo $base_url; ?>contact.php">Contact</a>
            </nav>
        </div>

        <div class="gs-footer__mid">
             <!-- Subscribe -->
             <div class="gs-subscribe-wrap">
                <p class="gs-subscribe__label">Subscribe to our newsletter</p>
                <form class="gs-subscribe" id="gs-subscribe-form" method="post" action="<?php echo $base_url; ?>includes/subscribe.php" novalidate>
                    <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                    <div class="gs-subscribe__field">
                        <input class="gs-subscribe__input" type="email" id="gs-subscribe-email" name="email" placeholder="email@example.com" autocomplete="email" required>
                        <button class="gs-subscribe__btn" type="submit" aria-label="Subscribe">
                            <i class="ri-arrow-right-line"></i>
                        </button>
                    </div>
                    <div class="gs-subscribe__msg" id="gs-subscribe-msg"></div>
                </form>
             </div>
        </div>

        <div class="gs-footer__bottom">
            <p class="gs-footer__copy">© <?php echo date('Y'); ?> The Blog Ship. All rights reserved.</p>
            <div class="gs-footer__socials">
                <a href="#" aria-label="Twitter"><i class="ri-twitter-x-line"></i></a>
                <a href="#" aria-label="GitHub"><i class="ri-github-line"></i></a>
            </div>
            <button class="gs-to-top" type="button" id="gs-to-top" aria-label="Back to top">
                <i class="ri-arrow-up-line"></i>
            </button>
        </div>
    </div>
</footer>
