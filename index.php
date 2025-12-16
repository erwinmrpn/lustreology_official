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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:opsz,wght@6..96,700&display=swap" rel="stylesheet">
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

        <!-- Collection Section-->
<section class="py-5 bg-light">
            <div class="container px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Kami Tersedia Di</h2>
                    <p class="text-muted">Kunjungi toko resmi kami di platform kesayangan Anda</p>
                </div>

                <div class="row gx-4 gy-4 justify-content-center">
                    
                    <!-- Shopee-->
                    <div class="col-md-6 col-lg-3">
                        <div class="marketplace-card">
                            <img src="assets/shopee_logo.png" alt="Shopee">
                            <div class="marketplace-overlay">
                                <a href="https://shopee.co.id/lustreology?page=0" target="_blank" class="btn btn-light fw-bold px-4 py-2 marketplace-btn rounded-pill">View More</a>
                            </div>
                        </div>
                    </div>
                    
                     <!-- Lazada-->
                    <div class="col-md-6 col-lg-3">
                        <div class="marketplace-card">
                            <img src="assets/lazada_logo.png" alt="Lazada">
                            <div class="marketplace-overlay">
                                <a href="https://www.lazada.co.id/shop/lustreology/?spm=a2o4j.pdp_revamp.seller.1.44414fb3eMXgrE&itemId=8694362503&channelSource=pdp" target="_blank" class="btn btn-light fw-bold px-4 py-2 marketplace-btn rounded-pill">View More</a>
                            </div>
                        </div>
                    </div>

                     <!-- Tiktok Shop-->
                    <div class="col-md-6 col-lg-3">
                        <div class="marketplace-card">
                            <img src="assets/tiktok_tokopedia_logo.png" alt="TikTok Shop">
                            <div class="marketplace-overlay">
                                <a href="https://www.tiktok.com/@lustreologyofficial?_r=1&_t=ZS-92GzstYm50z" target="_blank" class="btn btn-light fw-bold px-4 py-2 marketplace-btn rounded-pill">View More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Toco-->
                    <div class="col-md-6 col-lg-3">
                        <div class="marketplace-card">
                            <img src="assets/toco_logo.png" alt="Lazada">
                            <div class="marketplace-overlay">
                                <a href="https://toco.id/store/lustreologyy" target="_blank" class="btn btn-light fw-bold px-4 py-2 marketplace-btn rounded-pill">View More</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Collection Section-->
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

        // Pengaturan
        const scrollAmount = 300; // Jarak geser tombol
        const autoScrollSpeed = 1; // Kecepatan gerak otomatis (pixel per frame)
        let isAutoScrolling = true;
        let animationFrameId;

        if (scrollContainer) {
            
            // 1. DUPLIKASI KONTEN (CLONING)
            // Menggandakan isi agar saat scroll mentok, bisa reset ke awal tanpa terlihat
            scrollContainer.innerHTML += scrollContainer.innerHTML;

            // 2. ANIMASI FLOWING (MENGALIR TERUS)
            function autoScrollAnimation() {
                if (isAutoScrolling) {
                    // Geser sedikit demi sedikit setiap frame
                    scrollContainer.scrollLeft += autoScrollSpeed;
                    
                    // Cek Posisi untuk Reset (Infinity Loop)
                    // Jika posisi scroll sudah melewati setengah (panjang konten asli)
                    if (scrollContainer.scrollLeft >= scrollContainer.scrollWidth / 2) {
                        // Reset instan ke 0 (karena isinya kembar, user tidak sadar)
                        scrollContainer.scrollLeft = 0;
                    }
                }
                // Ulangi animasi di frame berikutnya
                animationFrameId = requestAnimationFrame(autoScrollAnimation);
            }

            // Mulai animasi
            autoScrollAnimation();

            // 3. FUNGSI TOMBOL MANUAL
            if (scrollLeftBtn && scrollRightBtn) {
                
                scrollLeftBtn.addEventListener('click', function() {
                    // Geser manual
                    scrollContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                });

                scrollRightBtn.addEventListener('click', function() {
                    scrollContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                });
            }

            // 4. INTERAKSI MOUSE (PAUSE SAAT HOVER)
            // Agar user bisa klik item tanpa slider lari-lari
            const elementsToPause = [scrollContainer, scrollLeftBtn, scrollRightBtn];
            
            elementsToPause.forEach(el => {
                el.addEventListener('mouseenter', () => { isAutoScrolling = false; });
                el.addEventListener('mouseleave', () => { isAutoScrolling = true; });
                // Support Touchscreen
                el.addEventListener('touchstart', () => { isAutoScrolling = false; });
                el.addEventListener('touchend', () => { isAutoScrolling = true; });
            });
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
                            <img src="assets/lustreology_welcome_banner.jpg" class="d-block w-100" alt="Promo Banner 1" onerror="this.src='https://dummyimage.com/2000x1000/3572EF/fff&text=Banner+1+(2:1)'">
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="ratio-2x1">
                            <img src="assets/lustreology_reseller_banner.jpg" class="d-block w-100" alt="Promo Banner 2" onerror="this.src='https://dummyimage.com/2000x1000/e21e80/fff&text=Banner+2+(2:1)'">
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
                    <div class="small m-0">Copyright &copy; erwinmrpn</div>
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