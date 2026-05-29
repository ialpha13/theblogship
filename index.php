<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <?php
    $meta = [
      'title' => "The Blog Ship | Practical Tech, Networking & Cybersecurity",
      'description' => "The Blog Ship is a modern publication for practical tech, networking, cybersecurity, and digital trends - built for learners who want clarity, structure, and real-world skills.",
      'type' => "website",
    ];
    include __DIR__ . '/includes/meta.php';
  ?>

  <?php include __DIR__ . '/includes/header.php'; ?>

  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/index.css">
  <link rel="manifest" href="<?php echo $base_url; ?>manifest.json">
  <meta name="theme-color" content="#0c0b09">
  <script src="<?php echo $base_url; ?>assets/js/pages/index.js" defer></script>

  <!-- JSON-LD Structured Data (Organization & Website) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Organization",
        "@id": "<?php echo $base_url; ?>#organization",
        "name": "The Blog Ship",
        "url": "<?php echo $base_url; ?>",
        "logo": {
          "@type": "ImageObject",
          "url": "<?php echo $base_url; ?>assets/images/logo.png"
        },
        "sameAs": ["https://www.linkedin.com/in/iprouteumair/"]
      },
      {
        "@type": "WebSite",
        "@id": "<?php echo $base_url; ?>#website",
        "url": "<?php echo $base_url; ?>",
        "name": "The Blog Ship",
        "description": "Practical Tech, Networking & Cybersecurity",
        "inLanguage": "en-US"
      }
    ]
  }
  </script>
</head>

<body>
  <div class="ms-bg"></div>
  <div class="ms-noise"></div>

  <?php include(__DIR__ . '/includes/navbar.php'); ?>

  <main class="ms-page-pad hm-page">

    <!-- HERO (FULL VIEWPORT) -->
    <section class="hm-hero hm-hero--full hm-reveal">
      <div class="hm-hero__bg" aria-hidden="true"></div>
      <canvas id="hmMatrix" class="hm-hero__matrix"></canvas>

      <div class="hm-hero__inner">
        <div class="hm-hero__content">
          <div class="hm-hero__badge-wrap">
            <div class="hm-badge">
              <div class="hm-dot"></div>
              <span class="hm-badge__text">Company-grade learning hub</span>
            </div>
          </div>

          <h1 class="hm-hero__title">
            Build real-world tech skills
            <span id="hmTyping" class="hm-typing" data-phrases="Networking|Cybersecurity|Cloud|IT Fundamentals"></span>
            <span class="hm-sr-only">Networking, Cybersecurity, Cloud, IT Fundamentals</span>
          </h1>

          <p class="hm-hero__subtitle">
            Clear guides, real examples, and curated resources. Built for learners who want structure and momentum.
          </p>

          <div class="hm-hero__cta">
            <a class="hm-btn hm-btn--primary" href="<?php echo $base_url; ?>blogs.php">
              Explore Articles <i class="ri-arrow-right-line"></i>
            </a>
            <a class="hm-btn hm-btn--ghost" href="<?php echo $base_url; ?>categories.php">
              Browse Categories
            </a>
          </div>

        </div>
      </div>
    </section>

    <!-- EVERYTHING BELOW STARTS AFTER HERO -->
    <div class="hm-after-hero">

      <!-- SKILLS MARQUEE -->
      <div class="hm-marquee hm-reveal">
        <div class="hm-marquee__track">
          <?php for($i=0; $i<2; $i++): ?>
            <div class="hm-marquee__item"><i class="ri-router-line"></i> Cisco IOS</div>
            <div class="hm-marquee__item"><i class="ri-shield-check-line"></i> Network Security</div>
            <div class="hm-marquee__item"><i class="ri-code-s-slash-line"></i> Python Automation</div>
            <div class="hm-marquee__item"><i class="ri-server-line"></i> Linux Administration</div>
            <div class="hm-marquee__item"><i class="ri-cloud-line"></i> AWS Cloud</div>
            <div class="hm-marquee__item"><i class="ri-fire-line"></i> Palo Alto</div>
            <div class="hm-marquee__item"><i class="ri-global-line"></i> BGP & OSPF</div>
            <div class="hm-marquee__item"><i class="ri-terminal-box-line"></i> Bash Scripting</div>
          <?php endfor; ?>
        </div>
      </div>

      <!-- CATEGORIES PREVIEW -->
      <section class="hm-section hm-reveal">
        <div class="hm-section__head hm-section__head--split">
          <div>
            <h2 class="hm-h2">Browse by category</h2>
            <p class="hm-p">Quick entry points that keep the landing page tidy and useful.</p>
          </div>
          <a class="hm-btn hm-btn--ghost" href="<?php echo $base_url; ?>categories.php">
            View all categories <i class="ri-arrow-right-line"></i>
          </a>
        </div>

        <div class="hm-catgrid">
          <a class="hm-cat" href="<?php echo $base_url; ?>categories/networking.php" style="--accent: 56, 189, 248;">
            <div class="hm-cat__top">
              <span class="hm-cat__icon"><i class="ri-wifi-line"></i></span>
              <span class="hm-cat__badge">Popular</span>
            </div>
            <div class="hm-cat__title">Networking</div>
            <div class="hm-cat__text">Subnetting, routing, troubleshooting</div>
          </a>

          <a class="hm-cat" href="<?php echo $base_url; ?>categories/cybersecurity.php" style="--accent: 52, 211, 153;">
            <div class="hm-cat__top">
              <span class="hm-cat__icon"><i class="ri-bug-line"></i></span>
              <span class="hm-cat__badge">New</span>
            </div>
            <div class="hm-cat__title">Cybersecurity</div>
            <div class="hm-cat__text">Defensive basics & threat awareness</div>
          </a>

          <a class="hm-cat" href="<?php echo $base_url; ?>categories/tools&labs.php" style="--accent: 167, 139, 250;">
            <div class="hm-cat__top">
              <span class="hm-cat__icon"><i class="ri-terminal-box-line"></i></span>
              <span class="hm-cat__badge">Guides</span>
            </div>
            <div class="hm-cat__title">Tools & Labs</div>
            <div class="hm-cat__text">Linux, commands, utilities</div>
          </a>

          <a class="hm-cat" href="<?php echo $base_url; ?>categories/newsandtrends.php" style="--accent: 251, 191, 36;">
            <div class="hm-cat__top">
              <span class="hm-cat__icon"><i class="ri-lightbulb-flash-line"></i></span>
              <span class="hm-cat__badge">Skills</span>
            </div>
            <div class="hm-cat__title">Digital Trends</div>
            <div class="hm-cat__text">AI, privacy, modern workflows</div>
          </a>
        </div>
      </section>

      <!-- WHY US (Feature Grid) -->
      <section class="hm-section hm-reveal">
        <div class="hm-section__head">
          <h2 class="hm-h2">Why read The Blog Ship?</h2>
          <p class="hm-p">We focus on the details that matter in production environments.</p>
        </div>
        
        <div class="hm-cards">
          <div class="hm-card">
            <div class="hm-card__icon"><i class="ri-flask-line"></i></div>
            <h3 class="hm-card__title">Lab-First Approach</h3>
            <p class="hm-card__text">Theory is good, but configuration is better. Every article includes verified commands and topologies you can replicate.</p>
          </div>
          
          <div class="hm-card">
            <div class="hm-card__icon"><i class="ri-shield-keyhole-line"></i></div>
            <h3 class="hm-card__title">Security Baked In</h3>
            <p class="hm-card__text">We don't do "default configs." Every guide includes hardening steps, firewall rules, and best practices for security.</p>
          </div>
          
          <div class="hm-card">
            <div class="hm-card__icon"><i class="ri-server-line"></i></div>
            <h3 class="hm-card__title">Vendor Neutral</h3>
            <p class="hm-card__text">Concepts over syntax. While we use Cisco and Linux often, the core networking principles apply to any vendor.</p>
          </div>
        </div>
      </section>

      <!-- FEATURED PROJECT SPOTLIGHT -->
      <section class="hm-section hm-reveal">
        <div class="hm-section__head">
          <h2 class="hm-h2">Featured Case Study</h2>
          <p class="hm-p">A closer look at a recent enterprise network deployment.</p>
        </div>
        
        <div class="hm-spotlight">
          <div class="hm-spotlight__media">
            <img src="<?php echo $base_url; ?>assets/images/portfolio/campus-design.jpg" alt="Campus Network Design" onerror="this.style.display='none'">
          </div>
          <div class="hm-spotlight__content">
            <div class="hm-spotlight__badge">Network Design</div>
            <h3 class="hm-spotlight__title">Enterprise Campus Architecture</h3>
            <p class="hm-spotlight__desc">
              Designed and simulated a scalable 3-tier network architecture for a mid-sized enterprise. 
              Implemented OSPF for core routing, HSRP for gateway redundancy, and strict VLAN segmentation for security.
            </p>
            <a href="<?php echo $base_url; ?>portfolio.php" class="hm-btn hm-btn--primary">
              View Case Study
            </a>
          </div>
        </div>
      </section>

      <!-- START HERE (RESTORED SECTION) -->
      <section class="hm-section hm-reveal">
        <div class="hm-section__head hm-section__head--split">
          <div>
            <h2 class="hm-h2">Start with the essentials</h2>
            <p class="hm-p">Hand-picked entry points to begin learning fast.</p>
          </div>
          <a class="hm-btn hm-btn--primary" href="<?php echo $base_url; ?>blogs.php">
            Open Blog <i class="ri-arrow-right-line"></i>
          </a>
        </div>

        <div class="hm-postgrid">
          <a class="hm-post" href="<?php echo $base_url; ?>blogs/raidconfiguration.php">
            <div class="hm-post__media">
              <img src="<?php echo $base_url; ?>assets/articleimages/raidconfig.webp" alt="Featured post" loading="lazy">
            </div>
            <div class="hm-post__body">
              <div class="hm-post__k">Featured</div>
              <div class="hm-post__t">A Hands-On Guide to Configuring RAID</div>
              <div class="hm-post__s">From selecting the right level to building the array - this is a practical RAID configuration walkthrough you can follow.</div>
              <div class="hm-post__go">Read <i class="ri-arrow-right-line"></i></div>
            </div>
          </a>

          <a class="hm-post" href="<?php echo $base_url; ?>blogs/serverinstallation.php">
            <div class="hm-post__media">
              <img src="<?php echo $base_url; ?>blogs/images/serverinstallation/serverinstall1.webp" alt="Cybersecurity guide" loading="lazy">
            </div>
            <div class="hm-post__body">
              <div class="hm-post__k">Guide</div>
              <div class="hm-post__t">Guide to Installing Windows Server</div>
              <div class="hm-post__s">A clean, practical walkthrough to install Windows Server confidently - from ISO to first boot and baseline checks.</div>
              <div class="hm-post__go">Read <i class="ri-arrow-right-line"></i></div>
            </div>
          </a>

          <a class="hm-post" href="<?php echo $base_url; ?>blogs/basicserverconfig.php">
            <div class="hm-post__media">
              <img src="<?php echo $base_url; ?>assets/articleimages/basicserverconfig2.webp" alt="Tooling and workflow" loading="lazy">
            </div>
            <div class="hm-post__body">
              <div class="hm-post__k">Server</div>
              <div class="hm-post__t">Basic Steps After Deploying a Server</div>
              <div class="hm-post__s">Get a reliable server baseline fast: patching, secure accounts, networking checks, firewall rules, monitoring, and backups.</div>
              <div class="hm-post__go">Read <i class="ri-arrow-right-line"></i></div>
            </div>
          </a>
        </div>
      </section>

      <!-- NEWSLETTER -->
      <section class="hm-newsletter hm-reveal">
        <div class="hm-newsletter__inner">
          <div class="hm-newsletter__content">
            <h2 class="hm-h2">Join the Inner Circle</h2>
            <p class="hm-p">Get the latest tutorials, labs, and security insights delivered straight to your inbox. No spam, just code.</p>
            <form id="hmSubscribeForm" class="hm-newsletter__form" action="<?php echo $base_url; ?>includes/subscribe.php" method="POST">
              <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
              <input type="email" name="email" class="hm-newsletter__input" placeholder="name@example.com" required>
              <button type="submit" class="hm-btn hm-btn--primary">
                Subscribe
              </button>
            </form>
            <div id="hmSubscribeSuccess" class="hm-newsletter__success">
              <i class="ri-checkbox-circle-fill"></i>
              <h3>Welcome aboard!</h3>
              <p class="hm-p">You've successfully joined the list. Keep an eye on your inbox.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- CONTACT (OUT OF CARDS) -->
      <section class="hm-contact hm-reveal" aria-label="Contact">
        <div class="hm-contact__inner">
          <div class="hm-contact__head">
            <h2 class="hm-h2">Contact The Blog Ship</h2>
            <p class="hm-p">Have a question or suggestion? Send a message and we’ll get back to you.</p>
          </div>

          <form class="hm-form hm-form--stack" action="<?php echo $base_url; ?>includes/contact_form.php" method="post" autocomplete="on">
            <div class="hm-field">
              <label for="hmName">Name</label>
              <input id="hmName" name="name" type="text" required>
            </div>

            <div class="hm-field">
              <label for="hmEmail2">Email</label>
              <input id="hmEmail2" name="email" type="email" required>
            </div>

            <div class="hm-field hm-field--msg">
              <label for="hmMessage">Message</label>
              <textarea id="hmMessage" name="message" rows="5" required></textarea>
            </div>

            <div class="hm-form__actions">
              <button type="submit" class="hm-btn hm-btn--primary">
                Send Message <i class="ri-send-plane-2-line"></i>
              </button>
              <a class="hm-btn hm-btn--ghost" href="mailto:info@theblogship.com">Email: info@theblogship.com</a>
            </div>
          </form>
        </div>
      </section>

      <div class="hm-spacer" aria-hidden="true"></div>
    </div>

  </main>

  <?php include(__DIR__ . '/includes/footer.php'); ?>
</body>
</html>
