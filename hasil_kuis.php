<?php
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) { header("Location: login.php"); exit(); }
include 'config.php';
if (!isset($_SESSION['skor_hasil'])) { header("Location: dashboard.php"); exit(); }
$skor = $_SESSION['skor_hasil'];
$urutan_riasec = ['R', 'I', 'A', 'S', 'E', 'C'];
$skor_terurut = [];
foreach ($urutan_riasec as $tipe) { $skor_terurut[$tipe] = isset($skor[$tipe]) ? $skor[$tipe] : 0; }
arsort($skor_terurut);
$top_three_codes = array_slice(array_keys($skor_terurut), 0, 3);
$sql_tipe = "SELECT kode_tipe, nama_tipe, deskripsi FROM tabel_tipe_hasil";
$all_tipe_info = mysqli_fetch_all(mysqli_query($conn, $sql_tipe), MYSQLI_ASSOC);
$tipe_info_map = array_column($all_tipe_info, null, 'kode_tipe');
$sql_jurusan = "SELECT nama_jurusan, tipe_relevan FROM tabel_jurusan";
$all_jurusan = mysqli_fetch_all(mysqli_query($conn, $sql_jurusan), MYSQLI_ASSOC);
$sql_karier = "SELECT nama_karier, tipe_relevan FROM tabel_karier";
$all_karier = mysqli_fetch_all(mysqli_query($conn, $sql_karier), MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tes Anda - Karier.ku</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="wrapper">
        <nav class="navbar">
            <a href="dashboard.php" class="navbar-brand">
                <img src="img/logo-karierku.png" alt="Logo Karier.ku" class="logo-brand">
            </a>
            <div class="navbar-links">
                <span class="user-greeting">Halo, <?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?>!</span>
                <button id="theme-toggle" class="btn-nav"><i class="fas fa-moon"></i></button>
                <a href="logout.php" class="btn-nav btn-logout-nav">Logout</a>
            </div>
        </nav>
        <h1>Hasil Tes Minat Bakat Anda</h1>
        <div class="chart-container" style="max-width: 500px; margin: 20px auto;">
            <canvas id="myChart"></canvas>
        </div>
        <div class="result-summary">
            <h2>3 Tipe Kepribadian Teratas Anda: <?php echo implode(', ', $top_three_codes); ?></h2>
        </div>
        <hr style="border-color: var(--border-color);">
        <?php foreach($top_three_codes as $kode): ?>
            <div class="recommendation-box">
                <h3><?php echo htmlspecialchars($tipe_info_map[$kode]['nama_tipe']); ?></h3>
                <p><?php echo htmlspecialchars($tipe_info_map[$kode]['deskripsi']); ?></p>
                <div class="recommendation-grid">
                    <div>
                        <h4>Rekomendasi Jurusan</h4>
                        <ul class="recommendation-list">
                            <?php foreach($all_jurusan as $jurusan){ if(in_array($kode, explode(',', $jurusan['tipe_relevan']))){ echo "<li>" . htmlspecialchars($jurusan['nama_jurusan']) . "</li>"; } } ?>
                        </ul>
                    </div>
                    <div>
                        <h4>Rekomendasi Karier</h4>
                        <ul class="recommendation-list">
                            <?php foreach($all_karier as $karier){ if(in_array($kode, explode(',', $karier['tipe_relevan']))){ echo "<li>" . htmlspecialchars($karier['nama_karier']) . "</li>"; } } ?>
                        </ul>
                    </div>
                </div>
            </div><br>
        <?php endforeach; ?>
    </div>
    <script src="js/script.js"></script>
    <script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, { type: 'radar', data: { labels: ['Realistic (R)', 'Investigative (I)', 'Artistic (A)', 'Social (S)', 'Enterprising (E)', 'Conventional (C)'], datasets: [{ label: 'Skor Minat Anda', data: [<?php echo implode(', ', $skor_terurut); ?>], fill: true, backgroundColor: 'rgba(54, 162, 235, 0.2)', borderColor: 'rgb(54, 162, 235)', pointBackgroundColor: 'rgb(54, 162, 235)', pointBorderColor: '#fff', pointHoverBackgroundColor: '#fff', pointHoverBorderColor: 'rgb(54, 162, 235)' }] }, options: { elements: { line: { borderWidth: 3 } }, scales: { r: { angleLines: { display: false }, suggestedMin: 0 } } } });
    </script>
</body>
</html>