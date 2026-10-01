<?php
$pesan = "";
$jenis_pesan = "";
if ($status == "salah"){
    $pesan = "Username atau password salah.";
    $jenis_pesan = "error";
}elseif ($status == "no_user"){
    $pesan = "Akun tidak ditemukan. Silakan daftar dulu.";
    $jenis_pesan = "error";
}elseif ($status == "keluar"){
    $pesan = "Kamu sudah keluar. Sampai jumpa lagi.";
    $jenis_pesan = "";
}elseif ($status == "daftar"){
    $pesan = "Akun berhasil dibuat. Silakan login.";
    $jenis_pesan = "";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Lost & Found</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="auth">

    <div class="auth-card">
        <div class="auth-head">
            <h1>Log In</h1>
            <p>Masuk untuk melaporkan dan mengklaim barang.</p>
        </div>

        <?php if ($pesan != ""): ?>
        <div class="auth-alert <?= $jenis_pesan ?>" role="status"><?= $pesan ?></div>
        <?php endif; ?>

        <form action="" method="get" class="auth-form">
            <input type="hidden" name="page" value="login">

            <div class="form-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" autocomplete="username" required>
            </div>

            <div class="form-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" autocomplete="current-password" required>
            </div>

            <div class="auth-actions">
                <input type="submit" name="dor" value="Log In" class="btn btn-primary btn-block">
            </div>

            <div class="auth-foot">
                Belum punya akun? <a href="index.php?page=register">Daftar di sini</a><br>
                <a href="index.php">Kembali ke landing page</a>
            </div>
        </form>
    </div>

</div>

</body>
</html>