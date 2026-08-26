

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    body {
        background: #f5fbf7;
    }

    /* =========================
       PAGE
    ========================= */

    .about-wrapper {
        padding-top: 25px;
        padding-bottom: 50px;
    }

    /* =========================
       HERO
    ========================= */

    .about-hero {
        position: relative;
        overflow: hidden;

        min-height: 270px;

        border-radius: 24px;
        border: 1px solid #dfe9df;

        background-image:
            linear-gradient(
                rgba(145, 190, 148, 0.78),
                rgba(80, 130, 85, 0.72)
            ),
            url('<?php echo e(asset('images/tentang-pos.jpg')); ?>');

        background-size: cover;
        background-position: center;

        box-shadow: 0 8px 25px rgba(45, 106, 79, .08);
    }

    .about-hero-content {
        min-height: 270px;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        text-align: center;
        padding: 40px 25px;
    }

    .hero-icon {
        width: 70px;
        height: 70px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #ffffff;
        border-radius: 22px;

        font-size: 30px;

        box-shadow: 0 8px 20px rgba(0, 0, 0, .10);

        margin-bottom: 18px;
    }

    .hero-title {
        color: #ffffff;
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .hero-subtitle {
        color: #ffffff;
        font-size: 15px;
        opacity: .95;
        margin: 0;
    }

    /* =========================
       GENERAL CARD
    ========================= */

    .about-card {
        background: #ffffff;

        border: 1px solid #dfe9df;
        border-radius: 20px;

        box-shadow: 0 7px 22px rgba(45, 106, 79, .06);

        overflow: hidden;
    }

    .about-card-header {
        display: flex;
        align-items: center;
        gap: 14px;

        padding: 20px 24px;

        border-bottom: 1px solid #edf2ed;
    }

    .section-icon {
        width: 45px;
        height: 45px;

        border-radius: 14px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eef5eb;
        color: #6f917b;

        font-size: 20px;
    }

    .section-title {
        color: #2d6a4f;
        font-weight: 700;
        font-size: 19px;
        margin: 0;
    }

    .section-subtitle {
        color: #96a497;
        font-size: 13px;
        margin-top: 2px;
    }

    /* =========================
       DESCRIPTION
    ========================= */

    .description-text {
        color: #5a6e5f;
        font-size: 14px;
        line-height: 1.9;
    }

    .system-note {
        padding: 15px 17px;

        background: #f1f8f2;

        border-left: 4px solid #8FBC92;
        border-radius: 12px;
    }

    .system-note-title {
        color: #6f8173;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 3px;
    }

    .system-note-text {
        color: #5F9163;
        font-size: 13px;
    }

    /* =========================
       SYSTEM INFO
    ========================= */

    .info-box {
        background: #fafcfa;

        border: 1px solid #E4EFE4;
        border-radius: 14px;

        padding: 17px;
    }

    .info-label {
        color: #89968c;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .info-value {
        color: #5F9163;
        font-weight: 700;
        font-size: 14px;
    }

    /* =========================
       PROFILE
    ========================= */

    .profile-wrapper {
        display: flex;
        align-items: center;
        gap: 20px;

        padding: 5px 0 22px;
    }

    .profile-photo {
        width: 95px;
        height: 95px;

        border-radius: 50%;

        object-fit: cover;

        background: #eef5eb;

        border: 5px solid #ffffff;

        box-shadow: 0 6px 18px rgba(45, 106, 79, .12);

        flex-shrink: 0;
    }

    .profile-placeholder {
        width: 95px;
        height: 95px;

        border-radius: 50%;

        background: #eef5eb;
        color: #6f917b;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 38px;

        border: 5px solid #ffffff;

        box-shadow: 0 6px 18px rgba(45, 106, 79, .12);

        flex-shrink: 0;
    }

    .profile-name {
        color: #2d6a4f;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 3px;
    }

    .profile-role {
        color: #8b9a8e;
        font-size: 13px;
    }

    /* =========================
       PROFILE INFORMATION
    ========================= */

    .profile-info {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    .profile-item {
        background: #f8fbf8;

        border: 1px solid #e4efe4;
        border-radius: 14px;

        padding: 15px;

        transition: all .2s ease;
    }

    .profile-item:hover {
        background: #f1f8f2;
        transform: translateY(-2px);
    }

    .profile-item-icon {
        width: 38px;
        height: 38px;

        border-radius: 11px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eaf4eb;
        color: #5F9163;

        margin-bottom: 9px;

        font-size: 17px;
    }

    .profile-item-label {
        color: #8a988d;
        font-size: 12px;
        margin-bottom: 3px;
    }

    .profile-item-value {
        color: #486b51;
        font-size: 14px;
        font-weight: 600;

        word-break: break-word;
    }

    .profile-item-value a {
        color: #5F9163;
        text-decoration: none;
    }

    .profile-item-value a:hover {
        text-decoration: underline;
    }

    /* =========================
       FOOTER
    ========================= */

    .about-footer {
        color: #8FBC92;
        font-size: 12px;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .about-wrapper {
            padding-top: 15px;
        }

        .hero-title {
            font-size: 24px;
        }

        .about-hero,
        .about-hero-content {
            min-height: 240px;
        }

        .profile-wrapper {
            flex-direction: column;
            text-align: center;
        }

        .profile-info {
            grid-template-columns: 1fr;
        }
    }
</style>


<div class="container about-wrapper">

    <div class="row justify-content-center">

        <div class="col-lg-9 col-xl-8">


            
            <div class="about-hero mb-4">

                <div class="about-hero-content">

                    <div class="hero-icon">
                        🥐
                    </div>

                    <h2 class="hero-title">
                        Tentang Midori Bakery
                    </h2>

                    <p class="hero-subtitle">
                        Sistem Manajemen Kasir & Stok Midori Bakery
                    </p>

                </div>

            </div>


            
            <div class="about-card mb-4">

                <div class="about-card-header">

                    <div class="section-icon">
                        <i class="bi bi-info-circle-fill"></i>
                    </div>

                    <div>

                        <h5 class="section-title">
                            Tentang Sistem
                        </h5>

                        <div class="section-subtitle">
                            Informasi mengenai Midori Bakery
                        </div>

                    </div>

                </div>


                <div class="card-body p-4 p-md-4">

                    <p class="description-text mb-4">

                        Midori Bakery merupakan aplikasi manajemen
                        yang dirancang untuk membantu proses operasional
                        toko secara lebih mudah, cepat, dan terorganisir.

                        Sistem ini dapat digunakan untuk mengelola data
                        produk, jenis produk, transaksi penjualan,
                        serta memantau kondisi stok secara lebih efisien.

                    </p>


                    
                    <div class="system-note mb-4">

                        <div class="system-note-title">
                            <i class="bi bi-lightbulb-fill me-1"></i>
                            Catatan Sistem
                        </div>

                        <div class="system-note-text">

                            Semua data dikelola dalam satu sistem untuk
                            membantu meminimalkan kesalahan pencatatan
                            transaksi dan selisih stok.

                        </div>

                    </div>


                    <hr style="border-color: #E0ECE1;">


                    
                    <div class="row g-3 mt-1">

                        <div class="col-sm-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Versi Sistem
                                </div>

                                <div class="info-value">
                                    v1.0.0 (Stable)
                                </div>

                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div class="info-box">

                                <div class="info-label">
                                    Nama Aplikasi
                                </div>

                                <div class="info-value">
                                    Midori Bakery
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            
            <div class="about-card mb-4">

                <div class="about-card-header">

                    <div class="section-icon">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div>

                        <h5 class="section-title">
                            Profil Pengembang
                        </h5>

                        <div class="section-subtitle">
                            Informasi pemilik atau pengembang aplikasi
                        </div>

                    </div>

                </div>


                <div class="card-body p-4 p-md-4">


                    
                    <div class="profile-wrapper">

                        <img src="<?php echo e(asset('images/seni.jpg')); ?>"
                            class="profile-photo"
                            alt="Foto Profil">



                        <div>

                            
                            <div class="profile-name">
                                Seni Aulia
                            </div>

                            <div class="profile-role">
                                Pengembang / Pemilik Midori Bakery
                            </div>

                        </div>

                    </div>


                    
                    <div class="profile-info">


                        
                        <div class="profile-item">

                            <div class="profile-item-icon">
                                <i class="bi bi-person"></i>
                            </div>

                            <div class="profile-item-label">
                                Seni Aulia
                            </div>

                            <div class="profile-item-value">
                                
                            seni
                            </div>

                        </div>


                        
                        <div class="profile-item">

                            <div class="profile-item-icon">
                                <i class="bi bi-calendar-heart"></i>
                            </div>

                            <div class="profile-item-label">
                                Tempat, Tanggal Lahir
                            </div>

                            <div class="profile-item-value">
                                Tasikmalaya, 16 Mei 2008
                            </div>

                        </div>


                        
                        <div class="profile-item">

                            <div class="profile-item-icon">
                                <i class="bi bi-whatsapp"></i>
                            </div>

                            <div class="profile-item-label">
                                WhatsApp
                            </div>

                            <div class="profile-item-value">

                                <a href="https://wa.me/6285643211170"
                                   target="_blank">

                                    085643211170

                                </a>

                            </div>

                        </div>


                        
                        <div class="profile-item">

                            <div class="profile-item-icon">
                                <i class="bi bi-instagram"></i>
                            </div>

                            <div class="profile-item-label">
                                Instagram
                            </div>

                            <div class="profile-item-value">

                                <a href="https://instagram.com/"
                                   target="_blank">

                                    @seniaulia

                                </a>

                            </div>

                        </div>


                        
                        <div class="profile-item">

                            <div class="profile-item-icon">
                                <i class="bi bi-envelope-fill"></i>
                            </div>

                            <div class="profile-item-label">
                                Email
                            </div>

                            <div class="profile-item-value">

                                <?php if(auth()->guard()->check()): ?>

                                    <a href="mailto:<?php echo e(auth()->user()->email); ?>">

                                        <?php echo e(auth()->user()->email); ?>


                                    </a>

                                <?php else: ?>

                                    seniaulis@gmail.com

                                <?php endif; ?>

                            </div>

                        </div>


                        
                        <div class="profile-item">

                            <div class="profile-item-icon">
                                <i class="bi bi-shop"></i>
                            </div>

                            <div class="profile-item-label">
                                Usaha
                            </div>

                            <div class="profile-item-value">
                                Midori Bakery
                            </div>

                        </div>


                    </div>

                </div>

            </div>


            
            <div class="text-center about-footer mt-4">

                <small>
                    &copy; <?php echo e(date('Y')); ?> Midori Bakery.
                    All rights reserved.
                </small>

            </div>


        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\seni_POS\resources\views/tentang.blade.php ENDPATH**/ ?>