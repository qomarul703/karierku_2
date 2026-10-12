<?php
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
include 'config.php';

$kategori_keys = ['R', 'I', 'A', 'S', 'E', 'C'];
$is_guest = isset($_SESSION['is_guest']) && $_SESSION['is_guest'] === true;
$id_pengguna = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inisialisasi session jawaban jika belum ada
    if (!isset($_SESSION['jawaban_kuis'])) {
        $_SESSION['jawaban_kuis'] = [];
    }

    // Simpan jawaban dari halaman saat ini ke session
    if (isset($_POST['jawaban']) && is_array($_POST['jawaban'])) {
        foreach ($_POST['jawaban'] as $id_pertanyaan => $nilai) {
            // Simpan hanya jika memilih "Ya" (nilai = 1)
            if ($nilai == '1') {
                $_SESSION['jawaban_kuis'][$id_pertanyaan] = 1;
            } else {
                // Hapus dari session jika memilih "Tidak" atau berubah pikiran
                unset($_SESSION['jawaban_kuis'][$id_pertanyaan]);
            }
        }
    }

    $current_kategori_index = (int)$_POST['kategori_index'];

    // Jika menekan tombol "Selanjutnya"
    if (isset($_POST['action']) && $_POST['action'] === 'next') {
        $next_page = $current_kategori_index + 1;
        header("Location: kuis.php?page=$next_page");
        exit();
    }

    // Jika menekan tombol "Selesai"
    if (isset($_POST['action']) && $_POST['action'] === 'finish') {
        $jawaban_final_ids = array_keys($_SESSION['jawaban_kuis']);
        $skor = ['R'=>0, 'I'=>0, 'A'=>0, 'S'=>0, 'E'=>0, 'C'=>0];

        if (!empty($jawaban_final_ids)) {
            $placeholders = implode(',', array_fill(0, count($jawaban_final_ids), '?'));
            $types = str_repeat('i', count($jawaban_final_ids));
            
            $sql_kategori = "SELECT kategori FROM tabel_pertanyaan WHERE id IN ($placeholders)";
            $stmt_kategori = mysqli_prepare($conn, $sql_kategori);
            mysqli_stmt_bind_param($stmt_kategori, $types, ...$jawaban_final_ids);
            mysqli_stmt_execute($stmt_kategori);
            $result_kategori = mysqli_stmt_get_result($stmt_kategori);

            while($row = mysqli_fetch_assoc($result_kategori)){
                if(array_key_exists($row['kategori'], $skor)){
                    $skor[$row['kategori']]++;
                }
            }
        }

        // Jika bukan tamu, simpan jawaban ke database
        if (!$is_guest && !empty($jawaban_final_ids)) {
            $sql_delete = "DELETE FROM tabel_jawaban_pengguna WHERE id_pengguna = ?";
            $stmt_delete = mysqli_prepare($conn, $sql_delete);
            mysqli_stmt_bind_param($stmt_delete, "i", $id_pengguna);
            mysqli_stmt_execute($stmt_delete);

            $sql_insert = "INSERT INTO tabel_jawaban_pengguna (id_pengguna, id_pertanyaan) VALUES (?, ?)";
            $stmt_insert = mysqli_prepare($conn, $sql_insert);
            foreach ($jawaban_final_ids as $id_pertanyaan) {
                mysqli_stmt_bind_param($stmt_insert, "ii", $id_pengguna, $id_pertanyaan);
                mysqli_stmt_execute($stmt_insert);
            }
        }
        
        // Simpan skor ke session, hapus jawaban sementara, dan arahkan ke hasil
        $_SESSION['skor_hasil'] = $skor;
        unset($_SESSION['jawaban_kuis']);
        header("Location: hasil_kuis.php");
        exit();
    }
}

// Jika akses langsung, kembalikan ke awal kuis
header("Location: kuis.php");
exit();