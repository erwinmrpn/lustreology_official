<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Lustreology Official</title>
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

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <?php
        include "nav.php";
        ?>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-5 pb-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-xxl-5">
                        <!-- Header text content-->
                        <div class="text-center text-xxl-start">
                            <div class="badge bg-gradient-primary-to-secondary text-white mb-4">
                                <div class="text-uppercase">Parfum &middot; Deodorant &middot; Perawatan Muka &middot; Dan Lain-Lain </div>
                            </div>
                            <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Distributor Resmi Perawatan Diri</span></h1>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="about_us.php">About Us</a>
                                <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="blog.php">Catalog</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7">
                        <!-- Header profile picture-->
                        <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                             <img class="img-fluid" src="assets/new_logo.png" alt="Lustreology Logo" style="max-width: 100%; height: auto;" />
                       </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="py-5 bg-white border-bottom">
    <div class="container px-5">
        
        <div class="text-center mb-4">
            <h2 class="fw-bolder text-secondary">CATEGORIES</h2>
        </div>

        <div class="position-relative px-4">
            <button class="slider-btn slider-prev" id="scrollLeftBtn">
                <i class="bi bi-chevron-left"></i>
            </button>

            <div class="category-scroll-container" id="categoryWrapper">
                
                <div class="category-item">
                    <div class="category-circle">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <div class="category-name">🏆 Produk Best Seller 🏆</div>
                </div>

                <div class="category-item">
                    <div class="category-circle">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="category-name">🎉 Paket Bundle Hemat 🎉</div>
                </div>

                <div class="category-item">
                    <div class="category-circle">
                        <i class="bi bi-stars"></i>
                    </div>
                    <div class="category-name">Perawatan Muka</div>
                </div>

                <div class="category-item">
                    <div class="category-circle">
                        <i class="bi bi-emoji-smile"></i>
                    </div>
                    <div class="category-name">Sikat Gigi</div>
                </div>

                <div class="category-item">
                    <div class="category-circle">
                        <i class="bi bi-droplet"></i>
                    </div>
                    <div class="category-name">Hair Spray</div>
                </div>

                <div class="category-item">
                    <div class="category-circle">
                        <i class="bi bi-tag"></i>
                    </div>
                    <div class="category-name">Morris</div>
                </div>

                <div class="category-item">
                    <div class="category-circle">
                        <i class="bi bi-wind"></i>
                    </div>
                    <div class="category-name">🌿 Deodorant Spray 🌿</div>
                </div>

                <div class="category-item">
                    <div class="category-circle">
                        <i class="bi bi-gender-male"></i>
                    </div>
                    <div class="category-name">✨ Parfum Pria ✨</div>
                </div>

                <div class="category-item">
                    <div class="category-circle">
                        <i class="bi bi-gender-female"></i>
                    </div>
                    <div class="category-name">💖 Parfum Wanita 💖</div>
                </div>

            </div>

            <button class="slider-btn slider-next" id="scrollRightBtn">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
    </div>

    <script>
            document.addEventListener("DOMContentLoaded", function() {
                const scrollContainer = document.getElementById('categoryWrapper');
                const scrollLeftBtn = document.getElementById('scrollLeftBtn');
                const scrollRightBtn = document.getElementById('scrollRightBtn');

                const scrollAmount = 300; 
                const autoScrollSpeed = 2500; // Kecepatan otomatis
                let autoScrollInterval;

                // 1. DUPLIKASI KONTEN (CLONING)
                // Kita gandakan isi container agar saat scroll mentok kanan, 
                // bisa kita 'teleportasi' balik ke awal tanpa user sadar.
                if (scrollContainer) {
                    scrollContainer.innerHTML += scrollContainer.innerHTML;
                }

                // --- Fungsi Geser ---
                function scrollNext() {
                    if (!scrollContainer) return;
                    scrollContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                }

                function scrollPrev() {
                    if (!scrollContainer) return;
                    scrollContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                }

                // --- Fungsi Auto Play ---
                function startAutoScroll() {
                    clearInterval(autoScrollInterval); 
                    autoScrollInterval = setInterval(scrollNext, autoScrollSpeed);
                }

                function stopAutoScroll() {
                    clearInterval(autoScrollInterval);
                }

                // --- Eksekusi ---
                if (scrollContainer && scrollLeftBtn && scrollRightBtn) {
                    
                    // Event Listener Scroll untuk efek "Infinite"
                    scrollContainer.addEventListener('scroll', function() {
                        // Jika posisi scroll sudah mencapai setengah (akhir dari set original)
                        // Kita reset posisinya ke 0 (awal) secara instan (tanpa smooth behavior)
                        // Ini menciptakan ilusi looping.
                        const maxScrollLimit = scrollContainer.scrollWidth / 2;
                        
                        if (scrollContainer.scrollLeft >= maxScrollLimit) {
                            scrollContainer.scrollLeft -= maxScrollLimit;
                        } 
                        // (Opsional) Jika mundur terlalu jauh ke kiri, lempar ke tengah
                        else if (scrollContainer.scrollLeft <= 0) {
                            // Deteksi ini agak tricky dengan behavior smooth, 
                            // tapi ini menjaga agar tidak mentok kiri
                        }
                    });

                    // Tombol Navigasi
                    scrollLeftBtn.addEventListener('click', scrollPrev);
                    scrollRightBtn.addEventListener('click', scrollNext);

                    // Mulai Otomatis
                    startAutoScroll();

                    // Pause saat mouse di atas area (agar user mudah klik)
                    scrollContainer.addEventListener('mouseenter', stopAutoScroll);
                    scrollLeftBtn.addEventListener('mouseenter', stopAutoScroll);
                    scrollRightBtn.addEventListener('mouseenter', stopAutoScroll);

                    // Lanjut jalan saat mouse pergi
                    scrollContainer.addEventListener('mouseleave', startAutoScroll);
                    scrollLeftBtn.addEventListener('mouseleave', startAutoScroll);
                    scrollRightBtn.addEventListener('mouseleave', startAutoScroll);
                    
                    // Support Touch (HP)
                    scrollContainer.addEventListener('touchstart', stopAutoScroll);
                    scrollContainer.addEventListener('touchend', startAutoScroll);
                }
            });
            </script>
</section>

        <!-- Banner Section-->
<section class="py-5 bg-white">
    <div class="container px-5">
        <div class="banner-wrapper">
            <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner rounded-4 shadow-sm">
                    
                    <div class="carousel-item active">
                        <div class="ratio-2x1">
                            <img src="assets/banner1.jpg" class="d-block w-100" alt="Promo Banner 1" onerror="this.src='https://dummyimage.com/2000x1000/3572EF/fff&text=Banner+1+(2:1)'">
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="ratio-2x1">
                            <img src="assets/banner2.jpg" class="d-block w-100" alt="Promo Banner 2" onerror="this.src='https://dummyimage.com/2000x1000/e21e80/fff&text=Banner+2+(2:1)'">
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="ratio-2x1">
                            <img src="assets/banner3.jpg" class="d-block w-100" alt="Promo Banner 3" onerror="this.src='https://dummyimage.com/2000x1000/333/fff&text=Banner+3+(2:1)'">
                        </div>
                    </div>

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</section>
        <!-- About Section-->
        <section class="bg-light py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xxl-8">
                        <div class="text-center my-5">
                            <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About SIEGA</span></h2>
                            <p class="lead fw-light mb-4">Tempat dimana inovasi masa depan tumbuh dan berkembang.</p>
                            <p class="text-muted">Mulai perjalananmu di dunia digital bersama SIEGA dan jadilah bagian dari generasi inovator berikutnya. Tumbuh jadi pribadi yang berpikir kreatif, berani mencoba, dan terus berkembang untuk menciptakan inovasi. SIEGA siap mendampingi setiap langkahmu menuju kesuksesan.</p>
                            <div class="d-flex justify-content-center fs-2 gap-4">
                                  <a class="btn btn-link fs-2 text-gradient" href="https://www.instagram.com/siega_unika/" target="_blank">
                                        <i class="bi bi-instagram"></i>
                                  </a>

                                  <a class="btn btn-link fs-2 text-gradient" href="https://web.facebook.com/siega.unika/?_rdc=1&_rdr#" target="_blank">
                                        <i class="bi bi-facebook"></i>
                                  </a>

                                  <a class="btn btn-link fs-2 text-gradient" href="https://www.tiktok.com/@siega_unika?_t=8VGDxzLfXzG&_r=1" target="_blank">
                                        <i class="bi bi-tiktok"></i>
                                  </a>

                                  <a class="btn btn-link fs-2 text-gradient" href="https://www.youtube.com/channel/UCziKWu1OJMar7oEqaeINdzw" target="_blank">
                                        <i class="bi bi-youtube"></i>
                                  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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