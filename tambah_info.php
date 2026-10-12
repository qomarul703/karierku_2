<?php
session_start();
// Halaman ini HANYA bisa diakses oleh role 'bk'
if (!isset($_SESSION['is_logged_in']) || $_SESSION['role'] !== 'bk') {
    header("Location: dashboard.php"); // Arahkan ke dasbor jika bukan BK
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Informasi Baru - Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <nav class="navbar">
            <a href="dashboard.php" class="navbar-brand"><img src="img/logo-karierku.png" alt="Logo Karier.ku" class="logo-brand"></a>
            <div class="navbar-links">
                <span class="user-greeting">Admin: <?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?></span>
                <button id="theme-toggle" class="btn-nav"><i class="fas fa-moon"></i></button>
                <a href="logout.php" class="btn-nav btn-logout-nav">Logout</a>
            </div>
        </nav>
        <h1><i class="fas fa-plus-circle"></i> Tambah Informasi Baru</h1>
        <form action="proses_tambah_info.php" method="POST" class="journal-form">
            <div class="form-group">
                <label for="judul">Judul Informasi</label>
                <input type="text" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="isi">Isi Informasi</label>
                <textarea id="isi" name="isi" rows="10" required></textarea>
            </div>
            <div class="action-buttons">
                <button type="submit" class="btn-action btn-save"><i class="fas fa-paper-plane"></i> Publikasikan</button>
                <a href="dashboard.php" class="btn-action btn-cancel">Kembali</a>
            </div>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>