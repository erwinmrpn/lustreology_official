<?php
include "admin/proses/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog SIEGA</title> <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,700&display=swap" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100 bg-light">
    <main class="flex-shrink-0">
        <?php
        include "nav.php";
        ?>
        <section class="py-5">
            <div class="container px-5 mb-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">BLOG</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        
                        <?php
                       

                        $query = mysqli_query($conn, "SELECT * FROM blog ORDER BY timestamp DESC");

                        while ($row = mysqli_fetch_assoc($query)) {
                            $id     = $row['id_blog'];
                            $judul  = $row['judul'];
                            $short  = $row['deskripsi_singkat'];
                            $long   = $row['deskripsi_lengkap'];

                            // Jika gambar blob → kosong
                            // Jika sudah varchar → gunakan path sesuai lokasi penyimpanan
                            $gambar = (!empty($row['gambar'])) ? "assets/" . $row['gambar'] : "https://dummyimage.com/300x400/343a40/6c757d";
                        ?>
                            
                        <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                            <div class="card-body p-0">

                                <div class="d-flex align-items-center flex-column flex-md-row">
                                    
                                    <!-- TEKS -->
                                    <div class="p-5 flex-grow-1">
                                        <h2 class="fw-bolder"><?= $judul ?></h2>
                                        
                                        <p style="max-height: 4.5em; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                            <?= nl2br($short) ?>
                                        </p>

                                        <!-- Gambar muncul di HP -->
                                        <div class="text-center d-md-none mb-3">
                                            <img class="img-fluid rounded-3" src="<?= $gambar ?>" alt="gambar" />
                                        </div>

                                        <p class="mt-3 mb-0">
                                            <button class="btn btn-primary btn-sm"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseCard<?= $id ?>"
                                                    aria-expanded="false"
                                                    aria-controls="collapseCard<?= $id ?>">
                                                Baca Lebih Lanjut
                                            </button>
                                        </p>
                                    </div>

                                    <!-- Gambar muncul di desktop -->
                                    <img class="img-fluid rounded-end d-none d-md-block"
                                        src="<?= $gambar ?>"
                                        alt="gambar"
                                        style="width: 300px; height: 100%; object-fit: cover;" />
                                </div>

                                <!-- COLLAPSE -->
                                <div class="collapse" id="collapseCard<?= $id ?>">
                                    <div class="p-5 pt-0 border-top">
                                        <h4 class="fw-bolder">Deskripsi Lengkap:</h4>
                                        <p><?= nl2br($long) ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php } ?>
                        
                        </div>
                </div>
            </div>
        </section>
        <section class="py-5 bg-gradient-primary-to-secondary text-white">
            <div class="container px-5 my-5">
                <div class="text-center">
                    <h2 class="display-5 fw-bolder mb-4">Kami membuka peluang untuk anda yang ingin menjadi reseller!</h2>
                    
                    <h3 class="display-6 fw-bolder mb-4">Mari bergabung bersama reseller produk lustreology</h3>
                    
                    <a class="btn btn-outline-light btn-lg px-5 py-3 fs-6 fw-bolder" href="contact.php">Bergabung Sekarang!</a>
                </div>
            </div>
        </section>
    </main>
    <!-- footer -->
    <footer class="bg-white py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                    <div class="small m-0">Copyright &copy; erwinmrpn</div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>