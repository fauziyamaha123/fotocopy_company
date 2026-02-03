// 1. Sticky Navbar & Back to Top Appearance
const header = document.querySelector('.header'); // Pastikan class header sesuai di partials/header.php
window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
        header?.classList.add('active');
    } else {
        header?.classList.remove('active');
    }
});

// 2. Scroll Reveal Animation (Efek Muncul Saat Di-scroll)
const observerOptions = {
    threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }
    });
}, observerOptions);

// Berikan animasi pada kartu produk dan layanan
document.querySelectorAll('.produk-card, .layanan-card, .tenaga-card').forEach(el => {
    el.style.opacity = "0";
    el.style.transform = "translateY(30px)";
    el.style.transition = "all 0.6s ease-out";
    observer.observe(el);
});

// 3. Smooth Scroll untuk Navigasi
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});