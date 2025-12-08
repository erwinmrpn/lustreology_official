<?php
include "admin/proses/koneksi.php";

// Query join table kategori + about_us
$kategori  = mysqli_query($conn, "
     SELECT DISTINCT k.id_kategori, k.kategori
    FROM tabel_kategori_about_us k
    JOIN about_us a ON a.id_kategori = k.id_kategori
    ORDER BY k.id_kategori ASC
");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>About SIEGA</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100 bg-light">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php
        include "nav.php";
        ?>
        <!-- Page Content-->
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">About SIEGA</span></h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-9 col-xxl-8">
                    <!-- Sejarah SIEGA-->

                    <section>
                        <?php while ($kat = mysqli_fetch_assoc($kategori)): ?>

                            <!-- Judul kategori (muncul 1x per kategori) -->
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h2 class="text-primary fw-bolder mb-0"><?= strtoupper($kat['kategori']) ?></h2>
                            </div>

                            <?php
                            // Ambil semua konten berdasarkan kategori ini
                            $detail = mysqli_query($conn, "
        SELECT * FROM about_us
        WHERE id_kategori = " . $kat['id_kategori'] . "
        ORDER BY id ASC
    ");
                            ?>

                            <?php while ($row = mysqli_fetch_assoc($detail)): ?>

                                <?php if (!empty($row['deskripsi'])): ?>
                                    <!-- Box DESKRIPSI -->
                                    <div class="card shadow border-0 rounded-4 mb-5">
                                        <div class="card-body p-5">
                                            <div class="row align-items-center gx-5">
                                                <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                                    <div class="bg-light p-4 rounded-4">
                                                        <div class="text-primary fw-bolder mb-2"><?= $row['judul'] ?></div>
                                                        <div class="small fw-bolder"><?= $row['judul_panjang'] ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <?= nl2br($row['deskripsi']) ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php elseif (!empty($row['gambar'])): ?>
                                    <!-- Box GAMBAR -->
                                    <div class="card shadow border-0 rounded-4 mb-5">
                                        <div class="card-body p-5">
                                            <div class="row align-items-center gx-5">
                                                <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                                    <div class="bg-light p-4 rounded-4">
                                                        <div class="text-primary fw-bolder mb-2"><?= $row['judul'] ?></div>
                                                        <div class="small fw-bolder"><?= $row['judul_panjang'] ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="image-box-fill rounded-4 shadow-sm">
                                                        <img src="assets/<?= $row['gambar'] ?>"
                                                            alt="<?= $row['judul'] ?>"
                                                            class="img-fluid" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                            <?php endwhile; ?>

                        <?php endwhile; ?>
                    </section>

                </div>
            </div>
        </div>
    </main>
    <!-- Footer-->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; UAS Manajemen Proyek Kelompok Richard, Erwin, dan Evan</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>