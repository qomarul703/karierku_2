<?php
// Mulai sesi
session_start();

// Set session sebagai tamu
$_SESSION['is_logged_in'] = true; // Anggap sebagai login
$_SESSION['is_guest'] = true;     // Tandai sebagai tamu
$_SESSION['user_id'] = 0;       // Beri ID 0 atau 'guest' untuk membedakan
$_SESSION['nama_lengkap'] = 'Tamu';

// Arahkan ke dashboard
header("Location: dashboard.php");
exit();
?>