<?php
session_start();

// Periksa apakah pengguna login DAN BUKAN tamu
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true || (isset($_SESSION['is_guest']) && $_SESSION['is_guest'] === true)) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Pastikan ada ID jurnal yang dikirim
if (isset($_POST['id_jurnal'])) {
    $id_jurnal = $_POST['id_jurnal'];
    $id_pengguna = $_SESSION['user_id'];

    // PENTING: Pengecekan keamanan
    // Query ini akan menghapus catatan HANYA JIKA ID catatan dan ID pengguna cocok.
    // Ini mencegah pengguna menghapus catatan milik orang lain.
    $sql = "DELETE FROM tabel_jurnal WHERE id = ? AND id_pengguna = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Ikat parameter
    mysqli_stmt_bind_param($stmt, "ii", $id_jurnal, $id_pengguna);
    
    // Eksekusi
    if (mysqli_stmt_execute($stmt)) {
        // Jika berhasil, kembali ke halaman jurnal
        header("Location: jurnal.php");
        exit();
    } else {
        echo "Error: Gagal menghapus catatan.";
    }
} else {
    // Jika tidak ada ID yang dikirim, kembalikan ke halaman jurnal
    header("Location: jurnal.php");
    exit();
}
?>