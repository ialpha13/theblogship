<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    $meta = [
      'title' => 'Tools and Labs | The Blog Ship',
      'description' => 'Explore articles in Tools and Labs - tutorials, insights, and practical guides.',
      'keywords' => 'Tools, Labs, Simulation, GNS3, Packet Tracer, Linux',
      'active_page' => 'categories/tools&labs.php'
    ];
    require_once __DIR__ . '/../includes/meta.php';
  ?>
  <?php require_once __DIR__ . '/../includes/header.php'; ?>
  <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/pages/blogs.css">
</head>
<body class="bg-[#0c0b09] text-white antialiased selection:bg-yellow-500/30">
  <?php require_once __DIR__ . '/../includes/navbar.php'; ?>

  <main class="bl-page">
    <div class="bl-wrap">
      <div class="bl-shell">
        
        <header class="bl-head">
          <div class="bl-badge">
            <div class="bl-dot"></div>
            <span class="bl-badge__text">Category</span>
          </div>
          <h1 class="bl-title">Tools and Labs</h1>
          <p class="bl-subtitle">Explore articles and guides in Tools and Labs.</p>
        </header>

        <div class="bl-container">
           <div class="maxbloging">
             <div class="grid">
                <!-- Tool: Packet Tracer -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Packet+Tracer" alt="Cisco Packet Tracer" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Simulation</span>
                      <span class="blx-mini">Free</span>
                    </div>
                    <a href="https://www.netacad.com/courses/packet-tracer" target="_blank" rel="noopener noreferrer" class="blx-title">Cisco Packet Tracer</a>
                    <p class="blx-desc">Visual simulation tool for networking certification practice and IoT network design.</p>
                    <div class="blx-bottom">
                       <a href="https://www.netacad.com/courses/packet-tracer" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: GNS3 -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=GNS3" alt="GNS3" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Emulation</span>
                      <span class="blx-mini">Open Source</span>
                    </div>
                    <a href="https://www.gns3.com/" target="_blank" rel="noopener noreferrer" class="blx-title">GNS3</a>
                    <p class="blx-desc">Network software emulator to simulate complex networks using real hardware images.</p>
                    <div class="blx-bottom">
                       <a href="https://www.gns3.com/" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Wireshark -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Wireshark" alt="Wireshark" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Analysis</span>
                      <span class="blx-mini">Free</span>
                    </div>
                    <a href="https://www.wireshark.org/" target="_blank" rel="noopener noreferrer" class="blx-title">Wireshark</a>
                    <p class="blx-desc">The world's foremost network protocol analyzer for troubleshooting and analysis.</p>
                    <div class="blx-bottom">
                       <a href="https://www.wireshark.org/" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: PuTTY -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=PuTTY" alt="PuTTY" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Utility</span>
                      <span class="blx-mini">Free</span>
                    </div>
                    <a href="https://www.putty.org/" target="_blank" rel="noopener noreferrer" class="blx-title">PuTTY</a>
                    <p class="blx-desc">A free SSH and telnet client for Windows, essential for remote server management.</p>
                    <div class="blx-bottom">
                       <a href="https://www.putty.org/" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Nmap -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Nmap" alt="Nmap" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Security</span>
                      <span class="blx-mini">Open Source</span>
                    </div>
                    <a href="https://nmap.org/download.html" target="_blank" rel="noopener noreferrer" class="blx-title">Nmap</a>
                    <p class="blx-desc">The standard for network discovery and security auditing. Map networks and find open ports.</p>
                    <div class="blx-bottom">
                       <a href="https://nmap.org/download.html" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: VirtualBox -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=VirtualBox" alt="VirtualBox" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Virtualization</span>
                      <span class="blx-mini">Open Source</span>
                    </div>
                    <a href="https://www.virtualbox.org/wiki/Downloads" target="_blank" rel="noopener noreferrer" class="blx-title">Oracle VirtualBox</a>
                    <p class="blx-desc">Powerful x86 and AMD64/Intel64 virtualization product for enterprise and home use.</p>
                    <div class="blx-bottom">
                       <a href="https://www.virtualbox.org/wiki/Downloads" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: WinSCP -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=WinSCP" alt="WinSCP" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Utility</span>
                      <span class="blx-mini">Open Source</span>
                    </div>
                    <a href="https://winscp.net/eng/download.php" target="_blank" rel="noopener noreferrer" class="blx-title">WinSCP</a>
                    <p class="blx-desc">A popular free SFTP and FTP client for Windows, essential for file transfers to servers.</p>
                    <div class="blx-bottom">
                       <a href="https://winscp.net/eng/download.php" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: EVE-NG -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=EVE-NG" alt="EVE-NG" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Emulation</span>
                      <span class="blx-mini">Free/Pro</span>
                    </div>
                    <a href="https://www.eve-ng.net/index.php/download/" target="_blank" rel="noopener noreferrer" class="blx-title">EVE-NG</a>
                    <p class="blx-desc">The Emulated Virtual Environment for network, security and DevOps professionals.</p>
                    <div class="blx-bottom">
                       <a href="https://www.eve-ng.net/index.php/download/" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Kali Linux -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Kali+Linux" alt="Kali Linux" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Security</span>
                      <span class="blx-mini">OS</span>
                    </div>
                    <a href="https://www.kali.org/get-kali/" target="_blank" rel="noopener noreferrer" class="blx-title">Kali Linux</a>
                    <p class="blx-desc">Advanced Penetration Testing Linux distribution used for Penetration Testing, Ethical Hacking and network security assessments.</p>
                    <div class="blx-bottom">
                       <a href="https://www.kali.org/get-kali/" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Postman -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Postman" alt="Postman" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Development</span>
                      <span class="blx-mini">API</span>
                    </div>
                    <a href="https://www.postman.com/downloads/" target="_blank" rel="noopener noreferrer" class="blx-title">Postman</a>
                    <p class="blx-desc">An API platform for building and using APIs. Simplifies each step of the API lifecycle and streamlines collaboration.</p>
                    <div class="blx-bottom">
                       <a href="https://www.postman.com/downloads/" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Visual Studio Code -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=VS+Code" alt="Visual Studio Code" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Development</span>
                      <span class="blx-mini">Editor</span>
                    </div>
                    <a href="https://code.visualstudio.com/download" target="_blank" rel="noopener noreferrer" class="blx-title">Visual Studio Code</a>
                    <p class="blx-desc">A lightweight but powerful source code editor which runs on your desktop and is available for Windows, macOS and Linux.</p>
                    <div class="blx-bottom">
                       <a href="https://code.visualstudio.com/download" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Git -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Git" alt="Git" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">DevOps</span>
                      <span class="blx-mini">VCS</span>
                    </div>
                    <a href="https://git-scm.com/downloads" target="_blank" rel="noopener noreferrer" class="blx-title">Git</a>
                    <p class="blx-desc">Free and open source distributed version control system designed to handle everything from small to very large projects.</p>
                    <div class="blx-bottom">
                       <a href="https://git-scm.com/downloads" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Docker -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Docker" alt="Docker" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">DevOps</span>
                      <span class="blx-mini">Containers</span>
                    </div>
                    <a href="https://www.docker.com/products/docker-desktop/" target="_blank" rel="noopener noreferrer" class="blx-title">Docker Desktop</a>
                    <p class="blx-desc">The fastest way to containerize applications. Develop, ship, and run applications anywhere.</p>
                    <div class="blx-bottom">
                       <a href="https://www.docker.com/products/docker-desktop/" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Ansible -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Ansible" alt="Ansible" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Automation</span>
                      <span class="blx-mini">IaC</span>
                    </div>
                    <a href="https://docs.ansible.com/ansible/latest/installation_guide/intro_installation.html" target="_blank" rel="noopener noreferrer" class="blx-title">Ansible</a>
                    <p class="blx-desc">An open source community project sponsored by Red Hat, it's the simplest way to automate IT.</p>
                    <div class="blx-bottom">
                       <a href="https://docs.ansible.com/ansible/latest/installation_guide/intro_installation.html" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Terraform -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Terraform" alt="Terraform" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Automation</span>
                      <span class="blx-mini">IaC</span>
                    </div>
                    <a href="https://developer.hashicorp.com/terraform/downloads" target="_blank" rel="noopener noreferrer" class="blx-title">Terraform</a>
                    <p class="blx-desc">Infrastructure as Code software tool that enables you to safely and predictably create, change, and improve infrastructure.</p>
                    <div class="blx-bottom">
                       <a href="https://developer.hashicorp.com/terraform/downloads" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Angry IP Scanner -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Angry+IP" alt="Angry IP Scanner" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Scanning</span>
                      <span class="blx-mini">Utility</span>
                    </div>
                    <a href="https://angryip.org/download/" target="_blank" rel="noopener noreferrer" class="blx-title">Angry IP Scanner</a>
                    <p class="blx-desc">Fast and friendly network scanner. Scans IP addresses and ports as well as has many other features.</p>
                    <div class="blx-bottom">
                       <a href="https://angryip.org/download/" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: MobaXterm -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=MobaXterm" alt="MobaXterm" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Terminal</span>
                      <span class="blx-mini">SSH</span>
                    </div>
                    <a href="https://mobaxterm.mobatek.net/download.html" target="_blank" rel="noopener noreferrer" class="blx-title">MobaXterm</a>
                    <p class="blx-desc">Enhanced terminal for Windows with X11 server, tabbed SSH client, network tools and much more.</p>
                    <div class="blx-bottom">
                       <a href="https://mobaxterm.mobatek.net/download.html" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>

                <!-- Tool: Notepad++ -->
                <div class="blx-card">
                  <div class="blx-media">
                    <img src="https://placehold.co/600x400/1a1a1a/ffffff?text=Notepad%2B%2B" alt="Notepad++" onerror="this.src='<?php echo $base_url; ?>assets/images/placeholder.jpg'">
                  </div>
                  <div class="blx-body">
                    <div class="blx-sub">
                      <span class="blx-cat">Development</span>
                      <span class="blx-mini">Editor</span>
                    </div>
                    <a href="https://notepad-plus-plus.org/downloads/" target="_blank" rel="noopener noreferrer" class="blx-title">Notepad++</a>
                    <p class="blx-desc">A free source code editor and Notepad replacement that supports several languages.</p>
                    <div class="blx-bottom">
                       <a href="https://notepad-plus-plus.org/downloads/" target="_blank" rel="noopener noreferrer" class="blx-read">Download</a>
                    </div>
                  </div>
                </div>
             </div>
           </div>
        </div>

      </div>
    </div>
  </main>

  <?php require_once __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
