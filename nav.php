<nav class="navbar navbar-expand-lg navbar-light bg-cb py-3">
    <div class="container px-5">

        <!-- Brand + Logo -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="assets/new_logo.png" alt="lustreology Logo"
                 style="height: 80px; width: auto; margin-right: 10px;">
            <span class="fw-bolder text-primary">Lustreology Official</span>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler nav-anim-btn" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Items -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                <li class="nav-item"><a class="nav-link nav-anim-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link nav-anim-link" href="about_us.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link nav-anim-link" href="blog.php">Blog</a></li>
                <li class="nav-item"><a class="nav-link nav-anim-link" href="contact.php">Contact</a></li>
            </ul>
        </div>

    </div>
</nav>

<!-- CSS Custom -->
<style>
/* Warna background navbar */
.bg-cb {
    background-color: #F9F8F6 !important;
}

/* Hover efek smooth */
.nav-anim-link {
    position: relative;
    overflow: hidden;
    transition: color 0.25s ease;
}

.nav-anim-link:hover {
    color: #0d6efd !important;
}

/* Ripple Effect */
.nav-anim-link::after,
.nav-anim-btn::after {
    content: "";
    position: absolute;
    background: rgba(0, 123, 255, 0.25);
    width: 10px;
    height: 10px;
    border-radius: 50%;
    transform: scale(0);
    opacity: 0;
    pointer-events: none;
}

.nav-anim-btn {
    position: relative;
    overflow: hidden;
}

/* Ripple animation */
@keyframes ripple {
    to {
        transform: scale(20);
        opacity: 0;
    }
}
</style>

<!-- JavaScript Animasi -->
<script>
// Untuk link navbar
document.querySelectorAll('.nav-anim-link').forEach(link => {
    link.addEventListener('click', function(e) {
        let ripple = document.createElement("span");
        ripple.style.position = "absolute";
        ripple.style.left = (e.clientX - this.getBoundingClientRect().left) + "px";
        ripple.style.top = (e.clientY - this.getBoundingClientRect().top) + "px";
        ripple.style.width = "10px";
        ripple.style.height = "10px";
        ripple.style.background = "rgba(0, 123, 255, 0.3)";
        ripple.style.borderRadius = "50%";
        ripple.style.transform = "scale(0)";
        ripple.style.animation = "ripple 0.6s linear";
        ripple.style.pointerEvents = "none";
        this.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    });
});

// Untuk tombol mobile collapsible
document.querySelectorAll('.nav-anim-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        let ripple = document.createElement("span");
        ripple.style.position = "absolute";
        ripple.style.left = (e.clientX - this.getBoundingClientRect().left) + "px";
        ripple.style.top = (e.clientY - this.getBoundingClientRect().top) + "px";
        ripple.style.width = "10px";
        ripple.style.height = "10px";
        ripple.style.background = "rgba(0, 123, 255, 0.3)";
        ripple.style.borderRadius = "50%";
        ripple.style.transform = "scale(0)";
        ripple.style.animation = "ripple 0.6s linear";
        ripple.style.pointerEvents = "none";
        this.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    });
});
</script>
