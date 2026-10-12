<?php
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) { header("Location: login.php"); exit(); }
$is_guest = isset($_SESSION['is_guest']) && $_SESSION['is_guest'] === true;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Karier.ku</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <nav class="navbar">
            <a href="dashboard.php" class="navbar-brand">
                <img src="img/logo-karierku.png" alt="Logo Karier.ku" class="logo-brand">
            </a>
            <div class="navbar-links">
                <span class="user-greeting">Halo, <?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?>!</span>
                <button id="theme-toggle" class="btn-nav"><i class="fas fa-moon"></i></button>
                <a href="logout.php" class="btn-nav btn-logout-nav">Logout</a>
            </div>
        </nav>

        <main>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'bk'): ?>
            <div class="menu-container">
                <a href="tambah_info.php" class="menu-card-main" style="background: linear-gradient(45deg, #28a745, #218838); box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);">
                    <i class="fas fa-plus-circle"></i>
                    <h3>Panel Admin: Tambah Informasi</h3>
                    <p>Klik di sini untuk mempublikasikan berita/informasi baru.</p>
                </a>
            </div>
            <hr style="margin: 30px 0;">
            <?php endif; ?>
            
            <section class="hero-section">
                <img src="img/logo-karierku.png" alt="Logo Utama Karier.ku" class="hero-logo-typography">
                <h2 class="slogan">“Bersama Karier.ku temukan jalan menuju masa depanmu”</h2>
            </section>
                       
            <div class="quote-container">
                <p id="motivational-quote"></p>
            </div>

            <div class="menu-container">
                <a href="kuis.php" class="menu-card-main">
                    <i class="fas fa-tasks"></i>
                    <h3>Tes Minat Bakat</h3>
                    <p>Temukan tipe kepribadian dan potensi karier Anda. Klik di sini untuk memulai!</p>
                </a>

                <div class="menu-grid-secondary">
                    <?php if ($is_guest): ?>
                        <div class="menu-card">
                            <i class="fas fa-user-plus"></i>
                            <h3>Simpan Progres</h3>
                            <p>Daftar akun untuk menyimpan hasil tes & membuat jurnal.</p>
                            <a href="register.php">Daftar Akun</a>
                        </div>
                    <?php else: ?>
                        <div class="menu-card">
                            <i class="fas fa-book-open"></i>
                            <h3>Jurnal Pribadi</h3>
                            <p>Catat ide, refleksi, dan rencana karier Anda di sini.</p>
                            <a href="jurnal.php">Buka Jurnal</a>
                        </div>
                    <?php endif; ?>

                    <div class="menu-card">
                        <i class="fas fa-comments"></i>
                        <h3>Konseling BK</h3>
                        <p>Hubungi Guru BK untuk bimbingan lebih lanjut.</p>
                        <a href="konseling.php">Lihat Daftar</a>
                    </div>

                    <div class="menu-card">
                        <i class="fas fa-info-circle"></i>
                        <h3>Pusat Informasi</h3>
                        <p>Baca artikel seputar dunia kuliah dan karier.</p>
                        <a href="informasi.php">Baca Sekarang</a>
                    </div>
                </div>
            </div>
        </main>

        <footer class="dashboard-footer">
            <a href="logout.php" class="btn-logout">
                <?php echo $is_guest ? 'Selesai Sesi Tamu' : 'Logout dari Akun Anda'; ?>
            </a>
        </footer>
    </div>
    <script src="js/script.js"></script>
</body>
</html>