<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found - Temukan atau Laporkan Barang</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>
    <nav class="navbar" aria-label="Main navigation">
        <div class="navbar-inner">
            <a href="index.php" class="brand" aria-label="Lost & Found">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M10 20.25c0-1.5-3-1.5-3 0s3 1.5 3 0Z"/>
                    <path d="M8.125 17.25c-1.313-1.313-1.563-3.5 0-5s3.938-1 5.25 0 1.313 3.5 0 5-3.937 1-5.25 0Z"/>
                    <path d="M13.875 6.75c1.313 1.313 1.563 3.5 0 5s-3.938 1-5.25 0-1.313-3.5 0-5 3.937-1 5.25 0Z"/>
                    <path d="M3.75 10.5a3 3 0 0 1 3-3h.75"/>
                    <path d="M16.5 10.5a3 3 0 0 0 3-3h.75"/>
                    <path d="M10.5 3.75a3 3 0 0 0-3 3v.75"/>
                    <path d="M10.5 20.25a3 3 0 0 1-3-3v-.75"/>
                </svg>
                Lost & <span>Found</span>
            </a>
            <div class="navbar-nav">
                <a href="#how">Cara Kerja</a>
                <a href="#listings">Daftar Barang</a>
                <a href="index.php?page=login">Log In</a>
                <a href="index.php?page=register" class="btn btn-outline btn-sm">Daftar</a>
                <a href="index.php?page=login" class="btn btn-primary btn-sm">Laporkan Sekarang</a>
            </div>
        </div>
    </nav>

    <main id="main">
        <section class="hero">
            <div class="hero-inner">
                <div>
                    <span class="badge">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M9 12.75 11.25 15 15 9.75"/>
                            <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"/>
                        </svg>
                        Terbuka, aman & mudah digunakan
                    </span>
                    <h1>Temukan barang <em>hilang</em> atau laporkan yang <em>ditemukan</em></h1>
                    <p>Lost & Found membantu komunitas untuk melaporkan barang hilang dan temuan, diverifikasi oleh admin agar proses pengembalian berjalan lebih tertib dan terpercaya.</p>
                    <div class="hero-actions">
                        <a href="index.php?page=login" class="btn btn-primary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 9v6"/>
                                <path d="M15 12H9"/>
                                <path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Laporkan Barang
                        </a>
                        <a href="#listings" class="btn btn-outline">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M21 21-5.197-5.197M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                            </svg>
                            Lihat Daftar Barang
                        </a>
                    </div>
                    <div class="hero-stats" aria-label="Statistik sistem">
                        <div>
                            <span class="angka"><?= $total ?></span>
                            <span class="label">Total Laporan</span>
                        </div>
                        <div>
                            <span class="angka"><?= $approved ?></span>
                            <span class="label">Sedang Dicari / Ditemukan</span>
                        </div>
                        <div>
                            <span class="angka"><?= $claimed ?></span>
                            <span class="label">Sudah Dikembalikan</span>
                        </div>
                    </div>
                </div>
                <div class="hero-card" role="complementary" aria-label="Preview laporan terbaru">
                    <div class="hero-card-head">
                        <h2>Laporan Terbaru</h2>
                        <span class="status status-approved">Siap Dicek</span>
                    </div>
                    <ul class="hero-card-list">
                        <?php 
                        $preview = $data;
                        $i = 0;
                        foreach($preview as $isi){
                            if ($i++ > 3) break;
                            ?>
                            <li class="hero-card-item">
                                <div class="ikon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M9 12.75 11.25 15 15 9.75"/>
                                        <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"/>
                                    </svg>
                                </div>
                                <div class="isi">
                                    <strong><?= htmlspecialchars($isi["nama_barang"]) ?></strong>
                                    <span><?= htmlspecialchars($isi["jenis"]) ?> • <?= htmlspecialchars($isi["lokasi"]) ?> • <?= htmlspecialchars($isi["status"]) ?></span>
                                </div>
                            </li>
                            <?php
                        }
                        if ($i == 1): ?>
                        <li class="hero-card-item">
                            <div class="ikon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                </svg>
                            </div>
                            <div class="isi">
                                <strong>Belum ada laporan</strong>
                                <span>Jadilah yang pertama melaporkan</span>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </section>

        <section class="section" id="how">
            <div class="section-inner">
                <div class="section-head">
                    <span class="label">Cara Kerja</span>
                    <h2>Alur sederhana untuk melaporkan & mengklaim</h2>
                    <p>Ikuti langkah berikut sesuai alur kerja Lost & Found.</p>
                </div>
                <div class="steps">
                    <article class="step">
                        <div class="ikon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                <path d="M12 3a4 4 0 1 0 0 8 4 4 0 0 0 0-8Z"/>
                            </svg>
                        </div>
                        <h3>Daftar / Login</h3>
                        <p>Buat akun atau login untuk bisa melaporkan barang hilang/ditemukan dan mengajukan klaim.</p>
                    </article>
                    <article class="step">
                        <div class="ikon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 9v6"/>
                                <path d="M15 12H9"/>
                                <path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </div>
                        <h3>Report Lost / Found</h3>
                        <p>Isi detail barang (nama, deskripsi, lokasi). Laporan akan berstatus <strong>PENDING</strong> menunggu review admin.</p>
                    </article>
                    <article class="step">
                        <div class="ikon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M9 12.75 11.25 15 15 9.75"/>
                                <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"/>
                            </svg>
                        </div>
                        <h3>Review Admin</h3>
                        <p>Admin memverifikasi kelayakan laporan. Hasilnya bisa <strong>APPROVED</strong> atau <strong>REJECTED</strong>.</p>
                    </article>
                    <article class="step">
                        <div class="ikon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z"/>
                            </svg>
                        </div>
                        <h3>Klaim & Pengembalian</h3>
                        <p>Jika kamu merasa itu barang milikmu, ajukan klaim. Setelah diverifikasi, status bisa menjadi <strong>CLAIMED</strong>.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section section-alt" id="listings">
            <div class="section-inner">
                <div class="section-head">
                    <span class="label">Daftar Barang</span>
                    <h2>Semua laporan Lost & Found</h2>
                    <p>Semua data ditampilkan secara terbuka untuk mempermudah pencarian.</p>
                </div>
                <?php if (mysqli_num_rows($data) == 0): ?>
                <div class="kosong">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z"/>
                    </svg>
                    <strong>Belum ada laporan saat ini</strong>
                    <p>Jadilah yang pertama dengan menekan tombol “Laporkan Barang”.</p>
                </div>
                <?php else: ?>
                <div class="listing">
                    <?php foreach($data as $isi): ?>
                    <article class="card">
                        <div class="card-top">
                            <div>
                                <h3><?= htmlspecialchars($isi["nama_barang"]) ?></h3>
                                <span class="status status-<?= strtolower($isi["status"]) ?>"><?= htmlspecialchars($isi["status"]) ?></span>
                            </div>
                            <?php if ($isi["jenis"] == "hilang"): ?>
                            <div class="jenis" aria-label="Barang hilang">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M21 21-5.197-5.197M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <?php else: ?>
                            <div class="jenis" aria-label="Barang ditemukan">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M9 12.75 11.25 15 15 9.75"/>
                                    <path d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Z"/>
                                </svg>
                            </div>
                            <?php endif; ?>
                        </div>
                        <p class="deskripsi"><?= htmlspecialchars($isi["deskripsi"]) ?></p>
                        <div class="card-meta">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                <path d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                            </svg>
                            Lokasi: <?= htmlspecialchars($isi["lokasi"]) ?>
                        </div>
                        <div class="card-meta">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 6 3.75h3.879a1.5 1.5 0 0 1 1.06.44l2.122 2.12a1.5 1.5 0 0 0 1.06.44H18A2.25 2.25 0 0 1 20.25 9v.776"/>
                            </svg>
                            Jenis: <?= htmlspecialchars($isi["jenis"]) ?> • Pelapor: <?= htmlspecialchars($isi["pelapor"]) ?>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="section">
            <div class="section-inner">
                <div class="cta">
                    <h2>Siap bantu kembalikan barangnya?</h2>
                    <p>Mulai dengan melaporkan barang hilang atau barang yang kamu temukan. Prosesnya cepat, terarah, dan bisa dipantau.</p>
                    <div class="cta-actions">
                        <a href="index.php?page=login" class="btn btn-accent">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 9v6"/>
                                <path d="M15 12H9"/>
                                <path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Laporkan Sekarang
                        </a>
                        <a href="index.php?page=register" class="btn btn-outline">Buat Akun Gratis</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="section-inner">
            <a href="index.php" class="brand" aria-label="Lost & Found">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M10 20.25c0-1.5-3-1.5-3 0s3 1.5 3 0Z"/>
                    <path d="M8.125 17.25c-1.313-1.313-1.563-3.5 0-5s3.938-1 5.25 0 1.313 3.5 0 5-3.937 1-5.25 0Z"/>
                    <path d="M13.875 6.75c1.313 1.313 1.563 3.5 0 5s-3.938 1-5.25 0-1.313-3.5 0-5 3.937-1 5.25 0Z"/>
                    <path d="M3.75 10.5a3 3 0 0 1 3-3h.75"/>
                    <path d="M16.5 10.5a3 3 0 0 0 3-3h.75"/>
                    <path d="M10.5 3.75a3 3 0 0 0-3 3v.75"/>
                    <path d="M10.5 20.25a3 3 0 0 1-3-3v-.75"/>
                </svg>
                Lost & <span>Found</span>
            </a>
            <p>Dibuat dengan tujuan mempermudah proses pencarian dan pengembalian barang di lingkungan komunitas.</p>
            <p style="margin-top: var(--space-2)">&copy; <?= date("Y") ?> Lost & Found. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>