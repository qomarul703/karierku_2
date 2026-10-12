<?php
// Selalu mulai sesi untuk bisa mengaksesnya
session_start();

// Hapus semua variabel yang tersimpan dalam sesi
session_unset();

// Hancurkan sesi itu sendiri
session_destroy();

// Arahkan pengguna kembali ke halaman login
header("Location: login.php");
exit();
?>