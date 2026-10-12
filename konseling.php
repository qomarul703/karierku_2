<?php
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true || (isset($_SESSION['is_guest']) && $_SESSION['is_guest'] === true)) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Ambil semua data guru bk, termasuk kolom no_wa yang baru
$sql = "SELECT nama_guru, foto_profil, no_wa, ttl, jabatan, riwayat_pendidikan, tentang_diri FROM tabel_guru_bk";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1.0">
    <title>Profil Konselor - Karier.ku</title>
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
        
        <div class="page-header">
            <i class="fas fa-users"></i>
            <h1>Profil Tim Bimbingan Konseling</h1>
            <p>Kenali lebih dekat para Guru BK yang siap membantu dan mendampingi Anda dalam perjalanan menemukan karier impian.</p>
        </div>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while($guru = mysqli_fetch_assoc($result)): ?>
                <?php
                // Menyiapkan link WhatsApp dengan pesan otomatis
                $nama_siswa = htmlspecialchars($_SESSION['nama_lengkap']);
                $nama_guru_url = urlencode($guru['nama_guru']);
                $pesan_wa = urlencode("Halo Bapak/Ibu {$guru['nama_guru']}, perkenalkan saya {$nama_siswa} dari aplikasi Karier.ku. Saya ingin berkonsultasi.");
                $link_wa = "https://wa.me/{$guru['no_wa']}?text={$pesan_wa}";
                ?>
                <div class="counselor-card-detail">
                    <div class="counselor-photo-section">
                        <img src="img/guru/<?php echo htmlspecialchars($guru['foto_profil']); ?>" alt="Foto <?php echo htmlspecialchars($guru['nama_guru']); ?>">
                    </div>
                    <div class="counselor-info-section">
                        <h3><?php echo htmlspecialchars($guru['nama_guru']); ?></h3>
                        <p class="jabatan"><?php echo htmlspecialchars($guru['jabatan']); ?></p>
                        
                        <div class="info-grid">
                            <div class="info-item">
                                <i class="fas fa-birthday-cake"></i> <?php echo htmlspecialchars($guru['ttl']); ?>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-graduation-cap"></i> <?php echo nl2br(htmlspecialchars($guru['riwayat_pendidikan'])); ?>
                            </div>
                        </div>

                        <div class="tentang-diri">
                            <h4>Tentang Saya</h4>
                            <p><?php echo htmlspecialchars($guru['tentang_diri']); ?></p>
                        </div>
                        
                        <div style="margin-top: 20px; text-align: right;">
                             <a href="<?php echo $link_wa; ?>" class="btn-whatsapp" target="_blank">
                                <i class="fab fa-whatsapp"></i> Konsultasi via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="empty-state">Data Guru BK belum tersedia.</p>
        <?php endif; ?>
    </div>
    <script src="js/script.js"></script>
</body>
</html>