<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php
    $meta = [
      'title' => "Tech Glossary | The Blog Ship",
      'description' => "A comprehensive glossary of common networking, cybersecurity, and IT terms.",
      'active_page' => 'glossary.php'
    ];
    require_once __DIR__ . '/includes/meta.php';
  ?>
  <?php require_once __DIR__ . '/includes/header.php'; ?>
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/blogs.css">
  <style>
    /* Glossary specific styles */
    .gl-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px;
      margin-top: 40px;
    }
    .gl-card {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      padding: 24px;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
    }
    .gl-card:hover {
      background: rgba(255, 255, 255, 0.05);
      border-color: rgba(255, 255, 255, 0.15);
      transform: translateY(-2px);
    }
    .gl-term {
      font-size: 18px;
      font-weight: 700;
      color: #fff;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .gl-def {
      font-size: 14px;
      color: rgba(255, 255, 255, 0.7);
      line-height: 1.6;
    }
    .gl-cat {
        align-self: flex-start;
        font-size: 11px;
        padding: 4px 8px;
        border-radius: 4px;
        background: rgba(255,255,255,0.1);
        color: rgba(255,255,255,0.6);
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
  </style>
</head>
<body class="bg-[#0c0b09] text-white antialiased selection:bg-yellow-500/30">

  <?php require_once __DIR__ . '/includes/navbar.php'; ?>

  <main class="bl-page">
    <div class="bl-wrap">
      <div class="bl-shell">

        <header class="bl-head bl-anim">
            <div class="bl-badge bl-anim-item">
                <div class="bl-dot"></div>
                <span class="bl-badge__text">Reference</span>
            </div>
            <h1 class="bl-title bl-anim-item">Tech Glossary</h1>
            <p class="bl-subtitle bl-anim-item">
                Definitions for common terms in networking, cybersecurity, and infrastructure.
            </p>
        </header>

        <div class="bl-container bl-anim bl-delay-1">
            <div class="gl-grid">
                <!-- A -->
                <div class="gl-card">
                    <span class="gl-cat">Networking</span>
                    <div class="gl-term">API</div>
                    <div class="gl-def">Application Programming Interface. A set of rules that allows different software applications to communicate with each other.</div>
                </div>

                <!-- B -->
                <div class="gl-card">
                    <span class="gl-cat">Networking</span>
                    <div class="gl-term">Bandwidth</div>
                    <div class="gl-def">The maximum amount of data that can be transmitted over an internet connection in a given amount of time.</div>
                </div>

                <!-- C -->
                <div class="gl-card">
                    <span class="gl-cat">Infrastructure</span>
                    <div class="gl-term">Cloud Computing</div>
                    <div class="gl-def">The delivery of computing services—including servers, storage, databases, networking, software, analytics, and intelligence—over the Internet.</div>
                </div>

                <!-- D -->
                <div class="gl-card">
                    <span class="gl-cat">Networking</span>
                    <div class="gl-term">DNS</div>
                    <div class="gl-def">Domain Name System. The phonebook of the Internet, translating domain names (like google.com) to IP addresses.</div>
                </div>
                
                <div class="gl-card">
                    <span class="gl-cat">Networking</span>
                    <div class="gl-term">DHCP</div>
                    <div class="gl-def">Dynamic Host Configuration Protocol. A network management protocol used to dynamically assign an IP address and other network configuration parameters to each device on a network.</div>
                </div>

                <!-- E -->
                <div class="gl-card">
                    <span class="gl-cat">Security</span>
                    <div class="gl-term">Encryption</div>
                    <div class="gl-def">The process of converting information or data into a code, especially to prevent unauthorized access.</div>
                </div>

                <!-- F -->
                <div class="gl-card">
                    <span class="gl-cat">Security</span>
                    <div class="gl-term">Firewall</div>
                    <div class="gl-def">A network security device that monitors and filters incoming and outgoing network traffic based on an organization's previously established security policies.</div>
                </div>

                <!-- I -->
                <div class="gl-card">
                    <span class="gl-cat">Networking</span>
                    <div class="gl-term">IP Address</div>
                    <div class="gl-def">Internet Protocol Address. A numerical label assigned to each device connected to a computer network that uses the Internet Protocol for communication.</div>
                </div>

                <!-- L -->
                <div class="gl-card">
                    <span class="gl-cat">Networking</span>
                    <div class="gl-term">Latency</div>
                    <div class="gl-def">The delay before a transfer of data begins following an instruction for its transfer.</div>
                </div>

                <!-- R -->
                <div class="gl-card">
                    <span class="gl-cat">Storage</span>
                    <div class="gl-term">RAID</div>
                    <div class="gl-def">Redundant Array of Independent Disks. A data storage virtualization technology that combines multiple physical disk drive components into one or more logical units for data redundancy or performance improvement.</div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/includes/footer.php'; ?>
  <script src="<?php echo $base_url; ?>assets/js/pages/blogs.js"></script>
</body>
</html>