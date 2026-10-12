<?php
session_start();

// Periksa apakah pengguna login DAN BUKAN tamu
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true || (isset($_SESSION['is_guest']) && $_SESSION['is_guest'] === true)) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Ambil ID jurnal dari URL
if (!isset($_GET['id'])) {
    header("Location: jurnal.php");
    exit();
}
$id_jurnal = $_GET['id'];
$id_pengguna = $_SESSION['user_id'];

// Ambil data jurnal yang spesifik dari database
$sql = "SELECT judul, isi_jurnal FROM tabel_jurnal WHERE id = ? AND id_pengguna = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $id_jurnal, $id_pengguna);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$jurnal = mysqli_fetch_assoc($result);

// Jika jurnal tidak ditemukan, kembalikan ke halaman jurnal
if (!$jurnal) {
    header("Location: jurnal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jurnal - Karier.ku</title>
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
        
        <h1><i class="fas fa-edit"></i> Edit Catatan</h1>

        <form action="proses_edit_jurnal.php" method="POST" class="journal-form">
            <input type="hidden" name="id_jurnal" value="<?php echo htmlspecialchars($id_jurnal); ?>">
            
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($jurnal['judul']); ?>" required>
            </div>
            <div class="form-group">
                <label for="isi_jurnal">Isi Catatan</label>
                <textarea id="isi_jurnal" name="isi_jurnal" rows="8" required><?php echo htmlspecialchars($jurnal['isi_jurnal']); ?></textarea>
            </div>

            <div class="action-buttons">
                <button type="submit" class="btn-action btn-save">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="jurnal.php" class="btn-action btn-cancel">Batal</a>
            </div>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html>