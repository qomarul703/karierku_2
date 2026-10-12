<?php
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Ambil data dari form
$id_pengguna = $_SESSION['user_id'];
$jenis = $_POST['jenis'];
$judul = $_POST['judul'];
$isi_jurnal = ($jenis == 'catatan') ? $_POST['isi_jurnal'] : '';
$waktu_pengingat_val = null;

// Logika khusus untuk To-Do List
if ($jenis == 'todolist') {
    $status_todolist = 'belum_selesai';
    
    // Jika tanggal dan waktu diisi, proses untuk pengingat
    if (!empty($_POST['tanggal_pengingat']) && !empty($_POST['waktu_pengingat'])) {
        $waktu_pengingat_str = $_POST['tanggal_pengingat'] . ' ' . $_POST['waktu_pengingat'];
        $waktu_pengingat_obj = new DateTime($waktu_pengingat_str);
        $waktu_pengingat_val = $waktu_pengingat_obj->format('Y-m-d H:i:s');

        // *** INI ADALAH BAGIAN UNTUK MEMBUAT PENGINGAT SISTEM ***
        // Kita akan membuat pengingat menggunakan tool yang tersedia
        // Contoh: Membuat pengingat untuk "Belajar Matematika" pada 2025-10-03 jam 15:30
        // print(generic_reminders.create_reminder(title: 'Belajar Matematika', start_date: '2025-10-03', time_of_day: '15:30:00'));
        // Di aplikasi nyata, nilai-nilai ini akan diganti dengan variabel dari form.
    }

    $sql = "INSERT INTO tabel_jurnal (id_pengguna, judul, jenis, status_todolist, waktu_pengingat) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issss", $id_pengguna, $judul, $jenis, $status_todolist, $waktu_pengingat_val);

} else { // Logika untuk Catatan Harian (tidak berubah)
    $sql = "INSERT INTO tabel_jurnal (id_pengguna, judul, isi_jurnal, jenis) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "isss", $id_pengguna, $judul, $isi_jurnal, $jenis);
}

// Eksekusi dan kembali ke halaman jurnal
if (mysqli_stmt_execute($stmt)) {
    header("Location: jurnal.php");
    exit();
} else {
    echo "Error: Gagal menyimpan. " . mysqli_error($conn);
}
?>