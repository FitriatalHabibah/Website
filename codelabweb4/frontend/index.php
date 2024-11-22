<?php
require 'data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RDB Islamic</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Navbar -->
  <header>
    <nav class="navbar">
      <div class="logo">RDB.Islamic</div>
      <ul class="nav-links">
        <li><a href="#home">Utama</a></li>
        <li><a href="#doa">Doa</a></li>
        <li><a href="#history">Sejarah Islam</a></li>
        <li><a href="tentang.html">Tentang Kami</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <!-- Main Content -->
  <section id="home" class="main-section">
    <div class="search-bar">
      <input type="text" placeholder="Cari sesuatu..." id="main-search">
    </div>
    <div class="main-content">
      <h1 class="fade-in">Assalamu'alaikum, Ahlan Wa Sahlan</h1>
      <p class="fade-in">Doa adalah kekuatan terbesar yang dimiliki oleh seorang hamba. Dalam doa, kita berbicara langsung dengan Sang Pencipta.</p>
      <img class="fade-in" src="gambar1.png" alt="Islamic Study">
    </div>
  </section>

  <!-- Doa Section -->
  <section id="doa" class="doa-section">
    <h2>Doa Sehari-Hari</h2>
    <div class="search-bar">
        <input type="text" placeholder="Cari doa..." id="doa-search">
    </div>
    <div class="doa-list" id="doa-list">
    <?php
        // Memasukkan data doa dari data.php
        require 'data.php';

        // Loop untuk menampilkan doa
        if (!empty($doa)) {
            foreach ($doa as $doas) {
                echo '<div class="doa-item">';
                echo '<h3>' . htmlspecialchars($doas['judul']) . '</h3>';
                echo '<p>' . htmlspecialchars($doas['isi']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Doa tidak ditemukan.</p>';
        }
        ?>
    </div>
  </section>


  <!-- Footer -->
  <footer id="contact">
    <div class="footer-content">
      <h3>Kontak</h3>
      <p>
        WhatsApp: <a href="https://wa.me/6281234567890">+6281234567890</a>
      </p>
    </div>
  </footer>

  <!-- JavaScript -->
  <script src="script.js"></script>
</body>
</html>
