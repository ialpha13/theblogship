<?php
require_once __DIR__ . '/config.php';

$meta = [
    'title' => 'Contact Us | The Blog Ship',
    'description' => 'Get in touch for support, feedback, or collaboration opportunities.',
    'keywords' => 'contact, support, feedback, The Blog Ship',
    'active_page' => 'contact.php'
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once __DIR__ . '/includes/meta.php'; ?>
    
    <!-- Header Includes -->
    <?php require_once __DIR__ . '/includes/header.php'; ?>
    <link rel="manifest" href="<?php echo $base_url; ?>manifest.json">
    <meta name="theme-color" content="#0c0b09">
    
    <!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/contact.css">
    <script src="<?php echo $base_url; ?>assets/js/pages/contact.js" defer></script>
</head>
<body class="bg-[#0c0b09] text-white antialiased selection:bg-yellow-500/30">

    <?php require_once __DIR__ . '/includes/navbar.php'; ?>

    <main class="ct-page">
        <div class="ct-wrap">
            <div class="ct-shell">
                
                <!-- Header -->
                <header class="ct-head ct-anim">
                    <div class="ct-badge ct-anim-item">
                        <div class="ct-dot"></div>
                        <span class="ct-badge__text">Let's Connect</span>
                    </div>
                    <h1 class="ct-title ct-anim-item">Let's work together</h1>
                    <p class="ct-subtitle ct-anim-item">
                        I’m currently available for freelance work and open to new opportunities. 
                        If you have a project that needs some creative touch, let’s chat.
                    </p>
                </header>

                <!-- Grid Layout -->
                <div class="ct-grid">
                    
                    <!-- Left Panel: Contact Info -->
                    <div class="ct-panel ct-anim ct-delay-1">
                        <div class="ct-card">
                            <h2 class="ct-card__title">Contact Information</h2>
                            <p class="ct-card__desc">
                                Prefer to reach out directly? Here's where you can find me.
                            </p>

                            <div class="ct-status">
                                <span class="ct-status__dot"></span>
                                <span class="ct-status__text">Available for new projects</span>
                            </div>

                            <div class="ct-methods">
                                <a href="mailto:info@theblogship.com" class="ct-method">
                                    <div class="ct-method__icon"><i class="ri-mail-send-line"></i></div>
                                    <div class="ct-method__body">
                                        <span class="ct-method__label">Email</span>
                                        <span class="ct-method__value">info@theblogship.com</span>
                                    </div>
                                    <div class="ct-method__chev"><i class="ri-arrow-right-s-line"></i></div>
                                </a>

                                <a href="https://linkedin.com/in/iprouteumair/" target="_blank" rel="noopener noreferrer" class="ct-method">
                                    <div class="ct-method__icon"><i class="ri-linkedin-box-line"></i></div>
                                    <div class="ct-method__body">
                                        <span class="ct-method__label">LinkedIn</span>
                                        <span class="ct-method__value">in/iprouteumair</span>
                                    </div>
                                    <div class="ct-method__chev"><i class="ri-arrow-right-s-line"></i></div>
                                </a>
                                
                                <a href="https://wa.me/923169396919" target="_blank" rel="noopener noreferrer" class="ct-method">
                                    <div class="ct-method__icon"><i class="ri-whatsapp-line"></i></div>
                                    <div class="ct-method__body">
                                        <span class="ct-method__label">Phone / WhatsApp</span>
                                        <span class="ct-method__value">+92 316 9396919</span>
                                    </div>
                                    <div class="ct-method__chev"><i class="ri-arrow-right-s-line"></i></div>
                                </a>
                                
                                <a href="https://theblogship.com" target="_blank" rel="noopener noreferrer" class="ct-method">
                                    <div class="ct-method__icon"><i class="ri-global-line"></i></div>
                                    <div class="ct-method__body">
                                        <span class="ct-method__label">Website</span>
                                        <span class="ct-method__value">theblogship.com</span>
                                    </div>
                                    <div class="ct-method__chev"><i class="ri-arrow-right-s-line"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Panel: Contact Form -->
                    <div class="ct-panel ct-anim ct-delay-2">
                        <div class="ct-card">
                            <h2 class="ct-card__title">Send a Message</h2>
                            <p class="ct-card__desc">
                                Got a project in mind? Fill out the form and I'll get back to you as soon as possible.
                            </p>

                            <form action="<?php echo $base_url; ?>includes/contact_form.php" method="POST" class="ct-form" id="contactForm">
                                <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                                <div class="ct-row">
                                    <div class="ct-field">
                                        <label for="name">Name</label>
                                        <div class="ct-control">
                                            <input type="text" id="name" name="name" placeholder="Your name" required>
                                        </div>
                                    </div>
                                    <div class="ct-field">
                                        <label for="email">Email</label>
                                        <div class="ct-control">
                                            <input type="email" id="email" name="email" placeholder="name@example.com" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="ct-field">
                                    <label for="subject">Subject</label>
                                    <div class="ct-control">
                                        <input type="text" id="subject" name="subject" placeholder="What is this regarding?" required>
                                    </div>
                                </div>

                                <div class="ct-field">
                                    <label for="message">Message</label>
                                    <div class="ct-control">
                                        <textarea id="message" name="message" placeholder="How can we help you today?" required></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="ct-submit">
                                    <span class="ct-submit__spinner"></span>
                                    <span class="ct-submit__text">Send Message</span>
                                </button>
                                
                                <p class="ct-meta">
                                    By submitting this form, you agree to our privacy policy.
                                </p>
                            </form>
                        </div>
                    </div>

                </div>

                <!-- FAQ Section -->
                <div class="ct-faq ct-anim ct-delay-3">
                    <div class="ct-card">
                        <h2 class="ct-faq-title">Frequently Asked Questions</h2>
                        <div class="ct-accordion">
                            <div class="ct-acc-item">
                                <button class="ct-acc-btn">
                                    <span>Are you available for freelance work?</span>
                                    <i class="ri-add-line"></i>
                                </button>
                                <div class="ct-acc-content">
                                    <div class="ct-acc-body">Yes, I am currently accepting new freelance projects. Please reach out with your project details.</div>
                                </div>
                            </div>
                            <div class="ct-acc-item">
                                <button class="ct-acc-btn">
                                    <span>Can I use your code snippets?</span>
                                    <i class="ri-add-line"></i>
                                </button>
                                <div class="ct-acc-content">
                                    <div class="ct-acc-body">Absolutely! Our code snippets are open for educational and personal use. A link back is appreciated but not required.</div>
                                </div>
                            </div>
                            <div class="ct-acc-item">
                                <button class="ct-acc-btn">
                                    <span>What services do you offer?</span>
                                    <i class="ri-add-line"></i>
                                </button>
                                <div class="ct-acc-content">
                                    <div class="ct-acc-body">I specialize in network design, server administration, and cybersecurity consulting. Feel free to ask about specific requirements.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Toast Notification Container -->
        <div id="ct-toast" class="ct-toast" role="alert" aria-live="assertive"></div>
    </main>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>

</body>
</html>