<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Lost & Found</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="page">

    <nav class="navbar" aria-label="Navigasi utama">
        <div class="navbar-inner">
            <a href="index.php" class="brand" aria-label="Lost and Found">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M9 12.75 11.25 15 15 9.75"/>
                    <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"/>
                </svg>
                Lost &amp; <span>Found</span>
            </a>
            <div class="navbar-nav">
                <a href="index.php">Landing</a>
                <a href="index.php?page=admin">Dashboard Admin</a>
                <a href="index.php?page=logout" class="btn btn-outline btn-sm">Keluar</a>
            </div>
        </div>
    </nav>

    <main class="page-body">

        <div class="page-head">
            <div>
                <h1>Dashboard User</h1>
                <p>Laporkan barang yang hilang atau kamu temukan, lalu ajukan klaim jika itu milikmu.</p>
            </div>
        </div>

        <section class="panel">
            <div class="panel-head">
                <h2>Report Lost Item / Report Found Item</h2>
            </div>
            <div class="panel-body">
                <form action="" method="get" class="form-row">
                    <input type="hidden" name="page" value="user">

                    <div class="form-field">
                        <label for="tambah_barang">Nama Barang</label>
                        <input type="text" id="tambah_barang" name="tambah_barang" placeholder="Contoh: Dompet kulit coklat" required>
                    </div>

                    <div class="form-field">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" id="deskripsi" name="deskripsi" placeholder="Ciri-ciri barang" required>
                    </div>

                    <div class="form-field">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" id="lokasi" name="lokasi" placeholder="Tempat barang hilang/ditemukan" required>
                    </div>

                    <div class="form-field">
                        <label for="jenis">Jenis Laporan</label>
                        <select id="jenis" name="jenis">
                            <option value="hilang">Report Lost Item</option>
                            <option value="ditemukan">Report Found Item</option>
                        </select>
                    </div>

                    <div class="form-actions">
                        <input type="submit" name="dor" value="Laporkan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </section>

        <section class="panel">
            <div class="panel-head">
                <h2>Daftar Barang</h2>
            </div>
            <div class="table-wrap">
                <table>
                    <caption>Status laporan berubah setelah ditinjau admin.</caption>
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $nomor=1;
                    $ada = false;
                    foreach($data as $isi){
                        $ada = true;
                        ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td>
                                <span class="cell-title"><?= htmlspecialchars($isi["nama_barang"]) ?></span>
                                <span class="cell-sub"><?= htmlspecialchars($isi["deskripsi"]) ?></span>
                            </td>
                            <td><?= htmlspecialchars($isi["lokasi"]) ?></td>
                            <td><?= htmlspecialchars($isi["jenis"]) ?></td>
                            <td><span class="status status-<?= strtolower($isi["status"]) ?>"><?= htmlspecialchars($isi["status"]) ?></span></td>
                            <td>
                                <div class="cell-aksi">
                                    <a href="index.php?page=user&klaim=<?= $isi['id_barang'] ?>&alasan=milik+saya" class="btn btn-accent btn-sm">Klaim</a>
                                    <a href="index.php?page=user&hapus=<?= $isi['id_barang'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $nomor++;
                    }
                    if (!$ada):
                        ?>
                        <tr>
                            <td colspan="6" class="td-kosong">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                </svg>
                                Belum ada barang. Buat laporan pertama kamu.
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="panel">
            <div class="panel-head">
                <h2>Daftar Klaim</h2>
            </div>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ID Barang</th>
                            <th scope="col">Pengklaim</th>
                            <th scope="col">Alasan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $nomor=1;
                    $ada = false;
                    foreach($klaim as $isi){
                        $ada = true;
                        ?>
                        <tr>
                            <td><?= $nomor; ?></td>
                            <td><?= $isi["id_barang"]; ?></td>
                            <td><?= htmlspecialchars($isi["pengklaim"]) ?></td>
                            <td><?= htmlspecialchars($isi["alasan"]) ?></td>
                            <td><span class="status status-<?= strtolower($isi["status"]) ?>"><?= htmlspecialchars($isi["status"]) ?></span></td>
                        </tr>
                        <?php
                        $nomor++;
                    }
                    if (!$ada):
                        ?>
                        <tr>
                            <td colspan="5" class="td-kosong">Belum ada klaim yang diajukan.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <footer class="footer">
        <p>&copy; <?= date("Y") ?> Lost &amp; Found.</p>
    </footer>

</body>
</html>