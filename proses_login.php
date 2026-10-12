<?php
session_start();
include 'config.php';

$email_nis = $_POST['email_nis'];
$password = $_POST['password'];

// Tambahkan 'role' ke dalam query SELECT
$sql = "SELECT id, nama_lengkap, email, nis, password, role FROM tabel_pengguna WHERE email = ? OR nis = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email_nis, $email_nis);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['role'] = $user['role']; // Simpan role ke session
        $_SESSION['is_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }
} else {
    header("Location: login.php?error=1");
    exit();
}
?>