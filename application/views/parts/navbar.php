<!-- Preloader Start -->
<!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= base_url('assets/') ?>img/logo/ktna.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
<!-- Preloader Start -->
<style>
    .logo {
        width: 80px;
    }

    /* Default behavior: sticky logo stays at its original position */
    .sticky-logo {
        top: 0;
        left: 0;
        /* Hidden initially */
        /* opacity: 0; */
        /* Transparent initially */
        /* Smooth appearance */
    }

    /* Only apply for web mode (desktop) */
    @media (min-width: 768px) {
        .sticky-logo {
            /* position: relative; */
            /* visibility: visible; */
            /* Make it visible */
            opacity: 1;
            /* Fully opaque */
            margin-right: 20px;
            /* Add spacing between the logo and list items */
            display: inline-block;
            /* Align with list items */
            vertical-align: middle;
            /* Align with the text in navigation */
            position: absolute;
            /* visibility: hidden; */
            /* transition: opacity 0.3s ease, visibility 0.3s ease; */

        }

        .main-menu nav {
            margin-left: 60px;
            display: flex;
            /* Enable flexbox for alignment */
            align-items: center;
            /* Vertically center align items */
        }

        .main-menu ul {
            /* display: flex; */
            /* Arrange list items horizontally */
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .main-menu ul li {
            margin-left: 15px;
            /* Add spacing between list items */
        }
    }
</style>
<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <!-- <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><img src="<?= base_url('assets/') ?>img/icon/header_icon1.png" alt="">34ºc, Sunny </li>
                                    <li><img src="<?= base_url('assets/') ?>img/icon/header_icon1.png" alt="">Tuesday, 18th June, 2019</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="<?= base_url() ?>"><img class="logo" src="<?= base_url('assets/') ?>img/logo/ktna.png" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="<?= base_url('') ?>">Home</a></li>
                                        <!-- <li><a href="<?= base_url('kategori') ?>">Category</a></li> -->
                                        <!-- <li><a href="<?= base_url('about') ?>">About</a></li> -->
                                        <li><a href="#">About</a>
                                            <ul class="submenu">
                                                <li><a href="<?= base_url('about/sekilas_ktna') ?>">Sekilas KTNA</a></li>
                                                <!-- <li><a href="<?= base_url('about/dukungan_pemerintah') ?>">Dukungan Pemerintah</a></li> -->
                                                <li><a href="<?= base_url('about/organisasi') ?>">Organisasi</a></li>
                                                <li><a href="<?= base_url('about/sejarah') ?>">Sejarah</a></li>
                                                <li><a href="<?= base_url('about/pengurus') ?>">Pengurus</a></li>
                                                <li><a href="<?= base_url('about/program_kerja') ?>">Program Kerja</a></li>
                                                <li><a href="<?= base_url('about/pekan_nasional') ?>">Pekan Nasional</a></li>
                                                <li><a href="<?= base_url('about/daerah') ?>">Daerah</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?= base_url('latest_news') ?>">Latest News</a></li>
                                        <li><a href="<?= base_url('contact') ?>">Contact</a></li>
                                        <!-- <li><a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="<?= base_url('element') ?>">Element</a></li>
                                                <li><a href="<?= base_url('blog') ?>">Blog</a></li>
                                                <li><a href="<?= base_url('blog_detail') ?>">Blog Details</a></li>
                                                <li><a href="<?= base_url('detail') ?>">Categori Details</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <!-- <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Search">

                                    </form>
                                </div> -->
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>