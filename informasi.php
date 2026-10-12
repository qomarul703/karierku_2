<?php
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Ambil data informasi terbaru dari database, batasi 5 berita teratas
$sql_info = "SELECT judul, isi, waktu_dibuat FROM tabel_informasi ORDER BY waktu_dibuat DESC LIMIT 5";
$result_info = mysqli_query($conn, $sql_info);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Informasi - Karier.ku</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <nav class="navbar">
            <a href="dashboard.php" class="navbar-brand"><img src="img/logo-karierku.png" alt="Logo Karier.ku" class="logo-brand"></a>
            <div class="navbar-links">
                <span class="user-greeting">Halo, <?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?>!</span>
                <button id="theme-toggle" class="btn-nav"><i class="fas fa-moon"></i></button>
                <a href="logout.php" class="btn-nav btn-logout-nav">Logout</a>
            </div>
        </nav>
        <div class="page-header">
            <i class="fas fa-info-circle"></i>
            <h1>Pusat Informasi</h1>
            <p>Temukan sumber daya penting untuk merencanakan langkah Anda selanjutnya.</p>
        </div>

        <section class="info-section">
            <h2><i class="fas fa-fire"></i> Informasi Terbaru</h2>
            <?php if (mysqli_num_rows($result_info) > 0): ?>
                <?php while($info = mysqli_fetch_assoc($result_info)): ?>
                    <div class="entry">
                        <div class="entry-header">
                            <h3><?php echo htmlspecialchars($info['judul']); ?></h3>
                        </div>
                        <p class="meta">Dipublikasikan pada: <?php echo date('d M Y, H:i', strtotime($info['waktu_dibuat'])); ?></p>
                        <p><?php echo nl2br(htmlspecialchars($info['isi'])); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="empty-state">Belum ada informasi terbaru saat ini.</p>
            <?php endif; ?>
        </section>

        <hr style="border-color: var(--border-color); margin: 40px 0;">

        <section class="info-section">
            <h2><i class="fas fa-graduation-cap"></i> Info Lanjut Kuliah</h2>
            
            <a href="https://portal-snpmb.bppp.kemdikbud.go.id/" class="main-info-button" target="_blank">
                <i class="fas fa-globe"></i> Kunjungi Portal Resmi Pendaftaran PTN (SNPMB)
            </a>

            <h4>Situs Resmi 10 Kampus Populer di Indonesia</h4>
            <div class="link-grid">
                <?php
                $kampus = [
                    'UI' => 'https://www.ui.ac.id/', 'UGM' => 'https://ugm.ac.id/id/', 'ITB' => 'https://itb.ac.id/',
                    'UNAIR' => 'https://unair.ac.id/', 'UM' => 'https://um.ac.id/', 'ITS' => 'https://www.its.ac.id/',
                    'IPB' => 'https://www.ipb.ac.id/', 'UNDIP' => 'https://undip.ac.id/', 'UNPAD' => 'https://www.unpad.ac.id/',
                    'UNESA' => 'https://www.unesa.ac.id/'
                ];
                foreach ($kampus as $nama => $link):
                ?>
                <div class="link-card">
                    <h4><?php echo $nama; ?></h4>
                    <a href="<?php echo $link; ?>" class="btn-link" target="_blank">Kunjungi Situs</a>
                </div>
                <?php endforeach; ?>
            </div>

            <h4 style="margin-top: 30px;">Rekomendasi Situs Bimbingan Belajar</h4>
            <div class="link-grid">
                <?php
                $bimbel = [
                    'Ruangguru' => 'https://www.ruangguru.com/', 'Ganesha Operation' => 'https://ganeshaoperation.com/',
                    'Primagama' => 'https://primagamaburlian.com/', 'Nurul Fikri' => 'https://www.bimbelnurulfikri.id/',
                    'Zenius' => 'https://www.zenius.net/', 'Prosus Inten' => 'https://prosusinten.org/'
                ];
                foreach ($bimbel as $nama => $link):
                ?>
                <div class="link-card">
                    <h4><?php echo $nama; ?></h4>
                    <a href="<?php echo $link; ?>" class="btn-link" target="_blank">Kunjungi Situs</a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <hr style="border-color: var(--border-color); margin: 40px 0;">

        <section class="info-section">
            <h2><i class="fas fa-briefcase"></i> Info Lanjut Kerja</h2>
            <h4>Situs Populer untuk Informasi Lowongan Kerja</h4>
            <div class="link-grid">
                <?php
                $loker = [
                    'Loker.id' => 'https://www.loker.id/', 'Loker BUMN' => 'https://lokerbumn.com/',
                    'Karirhub Kemnaker' => 'https://karirhub.kemnaker.go.id/', 'JobStreet' => 'https://id.jobstreet.com/',
                    'Fastwork (Freelance)' => 'https://fastwork.id/', 'Projects.co.id (Freelance)' => 'https://projects.co.id/',
                    'Karir BCA' => 'https://karir.bca.co.id/', 'Karir Indofood' => 'https://career.indofood.com/',
                    'Karir Indomaret' => 'https://career.indomaretgroup.com/'
                ];
                foreach ($loker as $nama => $link):
                ?>
                <div class="link-card">
                    <h4><?php echo $nama; ?></h4>
                    <a href="<?php echo $link; ?>" class="btn-link" target="_blank">Kunjungi Situs</a>
                </div>
                <?php endforeach; ?>
            </div>

            <h4 style="margin-top: 30px;">Rekomendasi Situs Pelatihan Kerja (Skill Up)</h4>
            <div class="link-grid">
                <?php
                $pelatihan = [
                    'Coursera' => 'http://www.coursera.org/',
                    'LinkedIn Learning' => 'http://www.linkedin.com/learning',
                    'Udemy' => 'http://www.udemy.com/',
                    'Skillshare' => 'http://www.skillshare.com/',
                    'Khan Academy' => 'http://www.khanacademy.org/',
                    'Skillhub Kemnaker' => 'https://skillhub.kemnaker.go.id/'
                ];
                foreach ($pelatihan as $nama => $link):
                ?>
                <div class="link-card">
                    <h4><?php echo $nama; ?></h4>
                    <a href="<?php echo $link; ?>" class="btn-link" target="_blank">Kunjungi Situs</a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>
    <script src="js/script.js"></script>
</body>
</html>