<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Lost & Found</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="auth">

    <div class="auth-card">
        <div class="auth-head">
            <h1>Daftar Akun</h1>
            <p>Buat akun untuk mulai melaporkan barang.</p>
        </div>

        <form action="" method="get" class="auth-form">
            <input type="hidden" name="page" value="register">

            <div class="form-field">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Contoh: Budi Santoso" autocomplete="name" required>
            </div>

            <div class="form-field">
                <label for="user">Username</label>
                <input type="text" id="user" name="user" placeholder="Pilih username unik" autocomplete="username" required>
            </div>

            <div class="form-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="nama@email.com" autocomplete="email" required>
            </div>

            <div class="form-field">
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass" placeholder="Minimal 6 karakter" autocomplete="new-password" minlength="6" required>
            </div>

            <div class="form-field">
                <label for="role">Daftar Sebagai</label>
                <select id="role" name="role">
                    <option value="user">User - Melaporkan & mengklaim barang</option>
                    <option value="admin">Admin - Mengelola laporan & klaim</option>
                </select>
                <span class="hint">Pilih role sesuai kebutuhanmu.</span>
            </div>

            <div class="auth-actions">
                <input type="submit" name="dor" value="Daftar" class="btn btn-primary btn-block">
            </div>

            <div class="auth-foot">
                Sudah punya akun? <a href="index.php?page=login">Log in</a><br>
                <a href="index.php">Kembali ke landing page</a>
            </div>
        </form>
    </div>

</div>

</body>
</html>