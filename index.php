<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Karier.ku</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-box">
            <img src="img/logo-karierku.png" alt="Logo SMAN 1 Babat" class="logo">
            <h2>Login Akun</h2>
            
            <?php
    // BLOK BARU UNTUK PESAN SUKSES
    if (isset($_GET['register']) && $_GET['register'] == 'success') {
        // Ganti class 'error-message' dengan 'success-message' agar warnanya berbeda
        echo '<div class="success-message">Registrasi berhasil! Silakan login.</div>';
    }
    // BLOK LAMA UNTUK PESAN ERROR
    if (isset($_GET['error'])) {
        echo '<div class="error-message">Email/NIS atau Password salah!</div>';
    }
    ?>
            
            <form action="proses_login.php" method="POST">
                <div class="form-group">
                    <label for="email_nis">Email atau NIS</label>
                    <input type="text" id="email_nis" name="email_nis" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <div class="auth-link">
                <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
            </div>
            <div class="guest-mode">
                <a href="proses_tamu.php">Masuk sebagai Tamu</a>
            </div>
        </div>
    </div>
</body>
</html>