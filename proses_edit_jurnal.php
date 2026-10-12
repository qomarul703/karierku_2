<?php
session_start();

// Periksa apakah pengguna login DAN BUKAN tamu
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true || (isset($_SESSION['is_guest']) && $_SESSION['is_guest'] === true)) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Pastikan data yang dibutuhkan dikirim via POST
if (isset($_POST['id_jurnal'], $_POST['judul'], $_POST['isi_jurnal'])) {
    
    $id_jurnal = $_POST['id_jurnal'];
    $judul_baru = $_POST['judul'];
    $isi_jurnal_baru = $_POST['isi_jurnal'];
    $id_pengguna = $_SESSION['user_id'];

    // Siapkan perintah SQL UPDATE
    // Sekali lagi, pastikan hanya catatan milik pengguna yang sedang login yang bisa diubah
    $sql = "UPDATE tabel_jurnal SET judul = ?, isi_jurnal = ? WHERE id = ? AND id_pengguna = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Ikat parameter
    mysqli_stmt_bind_param($stmt, "ssii", $judul_baru, $isi_jurnal_baru, $id_jurnal, $id_pengguna);
    
    // Eksekusi
    if (mysqli_stmt_execute($stmt)) {
        // Jika berhasil, kembali ke halaman jurnal
        header("Location: jurnal.php");
        exit();
    } else {
        echo "Error: Gagal memperbarui catatan.";
    }

} else {
    // Jika data tidak lengkap, kembalikan ke halaman jurnal
    header("Location: jurnal.php");
    exit();
}
?>