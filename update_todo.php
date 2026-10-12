<?php
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) { exit(); }
include 'config.php';

if (isset($_POST['id_jurnal'])) {
    $id_jurnal = $_POST['id_jurnal'];
    $id_pengguna = $_SESSION['user_id'];
    
    // Cek dulu status saat ini
    $sql_check = "SELECT status_todolist FROM tabel_jurnal WHERE id = ? AND id_pengguna = ?";
    $stmt_check = mysqli_prepare($conn, $sql_check);
    mysqli_stmt_bind_param($stmt_check, "ii", $id_jurnal, $id_pengguna);
    mysqli_stmt_execute($stmt_check);
    $result = mysqli_stmt_get_result($stmt_check);
    $item = mysqli_fetch_assoc($result);

    if ($item) {
        // Balik statusnya
        $new_status = ($item['status_todolist'] == 'selesai') ? 'belum_selesai' : 'selesai';
        
        $sql_update = "UPDATE tabel_jurnal SET status_todolist = ? WHERE id = ? AND id_pengguna = ?";
        $stmt_update = mysqli_prepare($conn, $sql_update);
        mysqli_stmt_bind_param($stmt_update, "sii", $new_status, $id_jurnal, $id_pengguna);
        mysqli_stmt_execute($stmt_update);
    }
}
header("Location: jurnal.php");
exit();
?>