<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
    $meta = [
      'title' => "About | The Blog Ship",
      'description' => "Learn about The Blog Ship, a modern publication for practical tech, networking, and cybersecurity learning.",
      'active_page' => 'about.php'
    ];
    require_once __DIR__ . '/includes/meta.php';
  ?>
  <?php require_once __DIR__ . '/includes/header.php'; ?>

  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/about.css">
  <script src="<?php echo $base_url; ?>assets/js/pages/about.js" defer></script>
</head>

<body class="bg-[#0c0b09] text-white antialiased selection:bg-yellow-500/30">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="ab-page">
    <div class="ab-wrap">
      <div class="ab-shell">

        <!-- Header -->
        <header class="ab-head ab-anim">
            <div class="ab-badge ab-anim-item">
                <div class="ab-dot"></div>
                <span class="ab-badge__text">Our Story</span>
            </div>
            <h1 class="ab-title ab-anim-item">About The Blog Ship</h1>
            <p class="ab-subtitle ab-anim-item">
                Built to make learning technology feel structured, practical, and enjoyable.
                We focus on clarity and real-world application.
            </p>
            
            <div class="ab-info ab-anim-item">
                <div class="ab-info__item"><i class="ri-shield-check-line"></i> Cybersecurity</div>
                <div class="ab-info__item"><i class="ri-router-line"></i> Networking</div>
                <div class="ab-info__item"><i class="ri-book-open-line"></i> Clear Guides</div>
            </div>
        </header>

        <!-- Content Grid -->
        <div class="ab-grid">
            
            <!-- Mission -->
            <div class="ab-section ab-anim ab-delay-1">
                <div class="ab-card ab-card--mission">
                    <div class="ab-card__head">
                        <div class="ab-icon"><i class="ri-focus-2-line"></i></div>
                        <h2 class="ab-card__title">Our Mission</h2>
                    </div>
                    <p class="ab-card__desc">
                        Deliver practical content in networking, cybersecurity, cloud, and IT fundamentals, written in a way that is easy to follow and quick to apply.
                    </p>
                    <div class="ab-tags">
                        <span class="ab-tag">Practical</span>
                        <span class="ab-tag">Structured</span>
                        <span class="ab-tag">Modern</span>
                        <span class="ab-tag">Beginner-friendly</span>
                    </div>
                </div>
            </div>

            <!-- Principles -->
            <div class="ab-section ab-anim ab-delay-2">
                <div class="ab-card ab-card--principles">
                    <div class="ab-card__head">
                        <div class="ab-icon"><i class="ri-compass-3-line"></i></div>
                        <h2 class="ab-card__title">How we write</h2>
                    </div>
                    <div class="ab-steps">
                        <div class="ab-step">
                            <div class="ab-step__num">01</div>
                            <div class="ab-step__content">
                                <div class="ab-step__title">Clarity first</div>
                                <div class="ab-step__text">Simple language, clean structure, and no unnecessary complexity.</div>
                            </div>
                        </div>
                        <div class="ab-step">
                            <div class="ab-step__num">02</div>
                            <div class="ab-step__content">
                                <div class="ab-step__title">Real-world learning</div>
                                <div class="ab-step__text">We prefer labs, examples, and practical workflows over theory.</div>
                            </div>
                        </div>
                        <div class="ab-step">
                            <div class="ab-step__num">03</div>
                            <div class="ab-step__content">
                                <div class="ab-step__title">Quality over noise</div>
                                <div class="ab-step__text">Every page should save you time and help you build confidence.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Portfolio / Author -->
            <div class="ab-section ab-anim ab-delay-3">
                <div class="ab-card ab-card--author">
                    <div class="ab-author">
                        <div class="ab-author__img">
                            <img src="<?php echo $base_url; ?>assets/images/profilepic.jpeg" alt="Umair Khan">
                        </div>
                        <div class="ab-author__body">
                            <h2 class="ab-author__title">About the Author</h2>
                            <p class="ab-author__name">Umair Khan</p>
                            <p class="ab-author__desc">
                                I share what I learn across IT, cybersecurity, networking, and modern tools. This site is my learning log, built to record progress, experiments, and notes as I grow my skills.
                            </p>
                            <div class="ab-actions">
                                <a href="<?php echo $base_url; ?>portfolio.php" class="ab-btn">
                                    <i class="ri-briefcase-line"></i> View Portfolio
                                </a>
                                <a href="mailto:info@theblogship.com" class="ab-btn ab-btn--ghost">
                                    Email Me
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="ab-section ab-anim ab-delay-3">
                <div class="ab-cta">
                    <h2 class="ab-cta__title">Ready to explore?</h2>
                    <p class="ab-cta__desc">Browse categories and start learning with clean, consistent layouts.</p>
                    <div class="ab-actions ab-actions--center">
                        <a href="<?php echo $base_url; ?>categories.php" class="ab-btn">View Categories</a>
                        <a href="<?php echo $base_url; ?>blogs.php" class="ab-btn ab-btn--ghost">Browse Articles</a>
                    </div>
                </div>
            </div>

        </div>
      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
