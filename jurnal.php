<?php
session_start();
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true || (isset($_SESSION['is_guest']) && $_SESSION['is_guest'] === true)) {
    header("Location: login.php");
    exit();
}
include 'config.php';
$id_pengguna = $_SESSION['user_id'];

// Ambil data Catatan
$sql_catatan = "SELECT id, judul, isi_jurnal, waktu_dibuat FROM tabel_jurnal WHERE id_pengguna = ? AND jenis = 'catatan' ORDER BY waktu_dibuat DESC";
$stmt_catatan = mysqli_prepare($conn, $sql_catatan);
mysqli_stmt_bind_param($stmt_catatan, "i", $id_pengguna);
mysqli_stmt_execute($stmt_catatan);
$result_catatan = mysqli_stmt_get_result($stmt_catatan);

// Ambil data To-Do List
$sql_todo = "SELECT id, judul, status_todolist, waktu_pengingat FROM tabel_jurnal WHERE id_pengguna = ? AND jenis = 'todolist' ORDER BY status_todolist ASC, waktu_pengingat ASC";
$stmt_todo = mysqli_prepare($conn, $sql_todo);
mysqli_stmt_bind_param($stmt_todo, "i", $id_pengguna);
mysqli_stmt_execute($stmt_todo);
$result_todo = mysqli_stmt_get_result($stmt_todo);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal & Tugas - Karier.ku</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <nav class="navbar">
            <a href="dashboard.php" class="navbar-brand"><img src="img/logo-karierku.png" alt="Logo Karier.ku" class="logo-brand"></a>
            <div class="navbar-links">
                <span class="user-greeting">Halo, <?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?>!</span>
                <button id="theme-toggle" class="btn-nav"><i class="fas fa-moon"></i></button>
                <a href="logout.php" class="btn-nav btn-logout-nav">Logout</a>
            </div>
        </nav>
        
        <h1><i class="fas fa-book"></i> Jurnal & Tugas Saya</h1>

        <div class="tabs-nav">
            <div class="tab-link active" data-tab="catatan">
                <i class="fas fa-sticky-note"></i> Catatan Harian
            </div>
            <div class="tab-link" data-tab="todolist">
                <i class="fas fa-list-check"></i> To-Do List
            </div>
        </div>

        <div id="catatan" class="tab-content active">
            <div class="journal-form">
                <h2>Buat Catatan Baru</h2>
                <form action="proses_jurnal.php" method="POST">
                    <input type="hidden" name="jenis" value="catatan">
                    <div class="form-group"><label for="judul_catatan">Judul</label><input type="text" id="judul_catatan" name="judul" required></div>
                    <div class="form-group"><label for="isi_jurnal">Isi Catatan</label><textarea id="isi_jurnal" name="isi_jurnal" rows="5" required></textarea></div>
                    <button type="submit" class="submit-button" style="width: auto; font-size: 16px;">Simpan Catatan</button>
                </form>
            </div>
            <hr style="border-color: var(--border-color); margin: 30px 0;">
            <div class="journal-list">
                <h2>Daftar Catatan</h2>
                <?php if (mysqli_num_rows($result_catatan) > 0): while($jurnal = mysqli_fetch_assoc($result_catatan)): ?>
                    <div class="entry">
                        <div class="entry-header">
                            <h3><?php echo htmlspecialchars($jurnal['judul']); ?></h3>
                            <div class="entry-actions">
                                <a href="edit_jurnal.php?id=<?php echo $jurnal['id']; ?>" class="edit-button">Edit</a>
                                <form action="hapus_jurnal.php" method="POST" style="display:inline;" onsubmit="return confirm('Hapus catatan ini?');"><input type="hidden" name="id_jurnal" value="<?php echo $jurnal['id']; ?>"><button type="submit" class="delete-button">Hapus</button></form>
                            </div>
                        </div>
                        <p class="meta">Dibuat pada: <?php echo date('d M Y, H:i', strtotime($jurnal['waktu_dibuat'])); ?></p>
                        <p><?php echo nl2br(htmlspecialchars($jurnal['isi_jurnal'])); ?></p>
                    </div>
                <?php endwhile; else: ?>
                    <p class="empty-state">Anda belum memiliki catatan.</p>
                <?php endif; ?>
            </div>
        </div>

        <div id="todolist" class="tab-content">
            <div class="journal-form">
                <h2>Buat Tugas Baru</h2>
                <form action="proses_jurnal.php" method="POST">
                    <input type="hidden" name="jenis" value="todolist">
                    <div class="form-group"><label for="judul_todo">Nama Tugas</label><input type="text" id="judul_todo" name="judul" required></div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group"><label for="tanggal_pengingat">Tanggal Pengingat</label><input type="date" id="tanggal_pengingat" name="tanggal_pengingat"></div>
                        <div class="form-group"><label for="waktu_pengingat">Waktu</label><input type="time" id="waktu_pengingat" name="waktu_pengingat"></div>
                    </div>
                    <p style="font-size: 12px; color: var(--text-muted); margin-top: -10px;">*Kosongkan tanggal & waktu jika tidak ingin setel pengingat.</p>
                    <button type="submit" class="submit-button" style="width: auto; font-size: 16px; margin-top: 15px;">Tambah Tugas</button>
                </form>
            </div>
            <hr style="border-color: var(--border-color); margin: 30px 0;">
            <div class="journal-list">
                <h2>Daftar Tugas</h2>
                <?php if (mysqli_num_rows($result_todo) > 0): while($todo = mysqli_fetch_assoc($result_todo)): ?>
                    <div class="todo-item <?php echo ($todo['status_todolist'] == 'selesai') ? 'completed' : ''; ?>">
                        <form action="update_todo.php" method="POST" style="display: contents;">
                            <input type="hidden" name="id_jurnal" value="<?php echo $todo['id']; ?>">
                            <input type="checkbox" name="status" value="selesai" class="todo-checkbox" onchange="this.form.submit()" <?php echo ($todo['status_todolist'] == 'selesai') ? 'checked' : ''; ?>>
                        </form>
                        <div class="todo-info">
                            <h4 class="todo-title"><?php echo htmlspecialchars($todo['judul']); ?></h4>
                            <?php if ($todo['waktu_pengingat']): ?>
                                <p class="todo-reminder"><i class="fas fa-bell"></i> <?php echo date('d M Y, H:i', strtotime($todo['waktu_pengingat'])); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="todo-actions">
                            <form action="hapus_jurnal.php" method="POST" style="display:inline;" onsubmit="return confirm('Hapus tugas ini?');"><input type="hidden" name="id_jurnal" value="<?php echo $todo['id']; ?>"><button type="submit" class="delete-button"><i class="fas fa-trash"></i></button></form>
                        </div>
                    </div>
                <?php endwhile; else: ?>
                    <p class="empty-state">Anda belum memiliki tugas.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script>
        // JavaScript untuk fungsionalitas Tab
        document.querySelectorAll('.tab-link').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.tab-link').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                tab.classList.add('active');
                document.getElementById(tab.dataset.tab).classList.add('active');
            });
        });
    </script>
</body>
</html>