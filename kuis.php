<?php
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Urutan kategori dan nama lengkapnya
$kategori_map = [
    'R' => 'Realistic', 'I' => 'Investigative', 'A' => 'Artistic',
    'S' => 'Social', 'E' => 'Enterprising', 'C' => 'Conventional'
];
$kategori_keys = array_keys($kategori_map);

// Tentukan kategori saat ini
$current_kategori_index = isset($_GET['page']) ? (int)$_GET['page'] : 0;
if ($current_kategori_index < 0 || $current_kategori_index >= count($kategori_keys)) {
    $current_kategori_index = 0; // Halaman default
}
$current_kategori_kode = $kategori_keys[$current_kategori_index];

// Ambil pertanyaan untuk kategori saat ini
$sql = "SELECT id, teks_pertanyaan FROM tabel_pertanyaan WHERE kategori = ? ORDER BY id ASC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $current_kategori_kode);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Kalkulasi progress
$progress = ($current_kategori_index + 1) / count($kategori_keys) * 100;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Minat Bakat (<?php echo $current_kategori_index + 1; ?>/6) - Karier.ku</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        <div class="quiz-container">
            <div class="progress-container">
                <div class="progress-bar" style="width: <?php echo $progress; ?>%;"><?php echo round($progress); ?>%</div>
            </div>

            <div class="category-header">
                <h2>Kategori <?php echo $kategori_map[$current_kategori_kode]; ?> (<?php echo $current_kategori_kode; ?>)</h2>
                <p>Pilih "Ya" jika pernyataan sesuai dengan diri Anda, atau "Tidak" jika tidak sesuai.</p>
            </div>
            
            <form action="proses_kuis.php" method="POST">
                <input type="hidden" name="kategori_index" value="<?php echo $current_kategori_index; ?>">
                
                <?php foreach ($questions as $question): ?>
                    <div class="quiz-question-card">
                        <p class="question-text"><?php echo htmlspecialchars($question['teks_pertanyaan']); ?></p>
                        <div class="quiz-options">
                            <input type="radio" id="q<?php echo $question['id']; ?>_yes" name="jawaban[<?php echo $question['id']; ?>]" value="1" required>
                            <label for="q<?php echo $question['id']; ?>_yes" class="btn-yes">Ya</label>
                            
                            <input type="radio" id="q<?php echo $question['id']; ?>_no" name="jawaban[<?php echo $question['id']; ?>]" value="0" required>
                            <label for="q<?php echo $question['id']; ?>_no" class="btn-no">Tidak</label>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="quiz-navigation">
                    <?php if ($current_kategori_index > 0): ?>
                        <a href="kuis.php?page=<?php echo $current_kategori_index - 1; ?>" class="btn-prev">Sebelumnya</a>
                    <?php else: ?>
                        <span></span> <?php endif; ?>

                    <?php if ($current_kategori_index < count($kategori_keys) - 1): ?>
                        <button type="submit" name="action" value="next" class="btn-next">Selanjutnya</button>
                    <?php else: ?>
                        <button type="submit" name="action" value="finish" class="btn-finish">Selesai & Lihat Hasil</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>