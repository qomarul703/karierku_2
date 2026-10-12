<?php
session_start();
// Pastikan hanya role 'bk' yang bisa memproses
if (!isset($_SESSION['is_logged_in']) || $_SESSION['role'] !== 'bk') {
    exit("Akses ditolak.");
}
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    $sql = "INSERT INTO tabel_informasi (judul, isi) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $judul, $isi);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: informasi.php"); // Arahkan ke halaman informasi untuk lihat hasilnya
        exit();
    } else {
        echo "Error: Gagal menyimpan informasi.";
    }
}
?>