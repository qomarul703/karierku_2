<?php
/*
 * File: config.php
 * Deskripsi: File untuk menyimpan konfigurasi dan membuat koneksi ke database.
 */

// 1. Definisikan variabel untuk detail koneksi
$db_host = "localhost"; // Server database, biasanya "localhost"
$db_user = "root";      // Username default database di XAMPP
$db_pass = "";          // Password default database di XAMPP adalah kosong
$db_name = "karierku_db"; // Nama database yang sudah kita buat

// 2. Buat koneksi ke database menggunakan fungsi mysqli_connect()
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// 3. Cek apakah koneksi berhasil atau gagal
// Jika $conn bernilai false, artinya koneksi gagal
if (!$conn) {
    // Hentikan eksekusi skrip dan tampilkan pesan error
    die("KONEKSI KE DATABASE GAGAL: " . mysqli_connect_error());
}

// Jika skrip berjalan sampai sini tanpa menampilkan apa-apa, artinya koneksi berhasil.
?>