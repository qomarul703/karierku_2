<?php
// 1. Sertakan file koneksi database
include 'config.php';

// 2. Ambil data yang dikirim dari formulir (register.php)
$nama_lengkap = $_POST['nama_lengkap'];
$nis = $_POST['nis'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$password = $_POST['password'];

// 3. Keamanan: Enkripsi password sebelum disimpan
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 4. Siapkan perintah SQL untuk memasukkan data
$sql = "INSERT INTO tabel_pengguna (nama_lengkap, nis, no_hp, email, password) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

// 5. "Ikat" variabel ke dalam statement sebagai parameter
mysqli_stmt_bind_param($stmt, "sssss", $nama_lengkap, $nis, $no_hp, $email, $hashed_password);

// 6. Eksekusi statement
if (mysqli_stmt_execute($stmt)) {
    // PERBAIKAN DI SINI:
    // Jika registrasi berhasil, langsung arahkan ke halaman login.
    // Kita juga bisa menambahkan pesan sukses di URL untuk ditampilkan di halaman login.
    header("Location: login.php?register=success");
    exit();
} else {
    // Jika gagal, tampilkan pesan error
    // (Di aplikasi produksi, ini sebaiknya dicatat di log, bukan ditampilkan ke pengguna)
    echo "Error: " . mysqli_error($conn);
}

// 7. Tutup statement dan koneksi
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>