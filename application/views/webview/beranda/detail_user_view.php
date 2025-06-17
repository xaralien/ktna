<style>
    .trend-bottom-img {
        width: 237px;
        height: 158px;
        overflow: hidden;
        /* Hide anything outside the box */
    }

    .trending-top :hover {
        cursor: pointer;
    }

    .trend-bottom-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Ensures the image is cropped to fit the box */
    }

    /* Media Query for mobile screens */
    @media (max-width: 768px) {
        .trend-bottom-img {
            width: 330px;
            height: 220px;
        }
    }

    .trand-right-img {
        width: 120px;
        height: 100px;
        overflow: hidden;
        /* Hide anything outside the box */
    }

    .trand-right-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Ensures the image is cropped to fit the box */
    }

    /* Adjust the size and cropping of the image to 370x440 */
    .weekly-img {
        width: 370px;
        height: 440px;
        overflow: hidden;
        /* Hide any part of the image outside this box */
    }

    .weekly-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Ensures the image is cropped and fits the container */
    }

    @media (max-width: 768px) {
        .weekly-img {
            width: 330px;
            height: 385px;
        }
    }

    .what-img {
        width: 370px;
        height: 350px;
        overflow: hidden;
        /* Hide any part of the image outside this box */
    }

    .what-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Ensures the image is cropped and fits the container */
    }

    @media (max-width: 768px) {
        .what-img {
            width: 330px;
            height: 307px;
        }
    }
</style>
<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        $this->load->view('parts/trending_title');
                        ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <?php
                        if ($artikel_trending_now_1) {
                        ?>
                            <div class="trending-top mb-30" onclick="detail(<?= $artikel_trending_now_1->Id ?>)">
                                <div class="trend-top-img">
                                    <img src="<?= base_url('uploads/artikel/' . $artikel_trending_now_1->thumbnail) ?>" alt="">
                                    <div class="trend-top-cap">
                                        <span>Trending - <?= $artikel_trending_now_1->category ?></span>
                                        <h2><a href="<?= base_url('detail/artikel/' . $artikel_trending_now_1->Id) ?>"><?= $artikel_trending_now_1->title ?></a></h2>
                                    </div>
                                </div>
                            </div>

                        <?php
                        } else {
                        ?>
                            <div class="trending-top mb-30" onclick="detail(<?= $artikel_trending_now_2->Id ?>)">
                                <div class="trend-top-img">
                                    <img src="<?= base_url('uploads/artikel/' . $artikel_trending_now_2->thumbnail) ?>" alt="">
                                    <div class="trend-top-cap">
                                        <span>Trending - <?= $artikel_trending_now_2->category ?></span>
                                        <h2><a href="<?= base_url('detail/artikel/' . $artikel_trending_now_2->Id) ?>"><?= $artikel_trending_now_2->title ?></a></h2>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                <?php
                                if ($artikel_sub_trending_1) {
                                    foreach ($artikel_sub_trending_1 as $a) {
                                ?>
                                        <a href="<?= base_url('detail/artikel/' . $a->Id) ?>">
                                            <div class="col-lg-4">
                                                <div class="single-bottom mb-35">
                                                    <div class="trend-bottom-img mb-30">
                                                        <img class="cropped-img" src="<?= base_url('uploads/artikel/' . $a->thumbnail) ?>" alt="">
                                                    </div>
                                                    <div class="trend-bottom-cap">
                                                        <span class="color1">Trending - <?= $a->category ?></span>
                                                        <h4><a href="<?= base_url('detail/artikel/' . $a->Id) ?>"><?= $a->title ?></a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php
                                    }
                                } else if ($artikel_sub_trending_1_alternative) {
                                    foreach ($artikel_sub_trending_1 as $a) {
                                    ?>
                                        <a href="<?= base_url('detail/artikel/' . $a->Id) ?>">
                                            <div class="col-lg-4">
                                                <div class="single-bottom mb-35">
                                                    <div class="trend-bottom-img mb-30">
                                                        <img class="cropped-img" src="<?= base_url('uploads/artikel/' . $a->thumbnail) ?>" alt="">
                                                    </div>
                                                    <div class="trend-bottom-cap">
                                                        <span class="color1">Trending - <?= $a->category ?></span>
                                                        <h4><a href="<?= base_url('detail/artikel/' . $a->Id) ?>"><?= $a->title ?></a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                                        <div class="single-bottom mb-35 text-center">
                                            <div class="trend-bottom-cap">
                                                <h4>Artikel Tidak ada</h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    <div class="col-lg-4">
                        <?php
                        if ($artikel_sub_trending_2) {

                            foreach ($artikel_sub_trending_2 as $b) {
                        ?>
                                <a href="<?= base_url('detail/artikel/' . $b->Id) ?>">
                                    <div class="trand-right-single d-flex">
                                        <div class="trand-right-img">
                                            <img class="cropped-img" src="<?= base_url('uploads/artikel/' . $b->thumbnail) ?>" alt="">
                                        </div>
                                        <div class="trand-right-cap">
                                            <span class="color1"><?= $b->category ?></span>
                                            <h4><a href="<?= base_url('detail/artikel/' . $b->Id) ?>"><?= $b->title ?></a></h4>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="trand-right-single d-flex justify-content-center align-items-center" style="height: 100%; min-height: 200px;">
                                <div class="trand-right-cap text-center">
                                    <h4>Artikel Tidak ada</h4>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly-News start -->
    <?php
    if ($artikel_weekly_topnews) {
        if (count($artikel_weekly_topnews) === 4) {
    ?>
            <!--   Weekly-News start -->
            <div class="weekly-news-area pt-50">
                <div class="container">
                    <div class="weekly-wrapper">
                        <!-- section Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle mb-30">
                                    <h3>Weekly Top News</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="weekly-news-active dot-style d-flex dot-style">
                                    <?php
                                    foreach ($artikel_weekly_topnews as $c) {
                                    ?>
                                        <a href="<?= base_url('detail/artikel/' . $c->Id) ?>">
                                            <div class="weekly-single">
                                                <div class="weekly-img">
                                                    <img class="cropped-weekly-img" src="<?= base_url('uploads/artikel/' . $c->thumbnail) ?>" alt="">
                                                </div>
                                                <div class="weekly-caption">
                                                    <span class="color1"><?= $c->category ?></span>
                                                    <h4><a href="<?= base_url('detail/artikel/' . $c->Id) ?>"><?= $c->title ?></a></h4>
                                                </div>
                                            </div>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="">
                <a href="https://kodesis.id" target="_blank">
                    <img class="ads-vertical" src="<?= base_url('assets/img/ads/ads_02.jpg') ?>" alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- Whats New End -->

    <section class="py-5" id="partners">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-lg-8 col-md-10 col-sm-12">
                    <div class="card shadow-lg p-4 mb-5 bg-white rounded">
                        <div class="card-body text-center">
                            <h2 class="card-title mb-2">Detail Pengguna</h2>
                            <h4 class="card-title mb-4"><?= $this->uri->segment(3) ?></h4>

                            <?php if (isset($user) && $user): ?>
                                <div class="row mb-3">
                                    <div class="col-md-4 text-md-left font-weight-bold">Nama:</div>
                                    <div class="col-md-8 text-md-left"><?= htmlspecialchars($user->username ?? 'N/A') ?></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 text-md-left font-weight-bold">Jabatan:</div>
                                    <div class="col-md-8 text-md-left">
                                        <?php
                                        // Define your jabatan mapping here (as discussed before)
                                        $jabatan_map = [
                                            1 => 'Ketua Umum',
                                            2 => 'Sekertariat Jendral',
                                            3 => 'Bendahara Umum',
                                            4 => 'Ketua Provinsi',
                                            5 => 'Dep. Kelautan dan Perikanan',
                                            6 => 'Dep. Kemitraan Strategis dan Advokasi',
                                            7 => 'Dep.LITBANG',
                                            8 => 'Dep. Media Informasi dan Komunikasi',
                                            9 => 'Dep. Hukum & HAM',
                                            10 => 'Anggota',
                                        ];
                                        $user_jabatan_text = $jabatan_map[$user->jabatan ?? 0] ?? 'Jabatan Tidak Dikenal';
                                        echo htmlspecialchars($user_jabatan_text);
                                        ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 text-md-left font-weight-bold">NIK:</div>
                                    <div class="col-md-8 text-md-left"><?= htmlspecialchars($user->nik ?? 'N/A') ?></div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4 text-md-left font-weight-bold">Email:</div>
                                    <div class="col-md-8 text-md-left"><?= htmlspecialchars($user->email ?? 'N/A') ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 text-md-left font-weight-bold">Nomor Telpon:</div>
                                    <div class="col-md-8 text-md-left"><?= htmlspecialchars($user->nomor_hp ?? 'N/A') ?></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4 text-md-left font-weight-bold">Alamat:</div>
                                    <div class="col-md-8 text-md-left"><?= htmlspecialchars($user->alamat ?? 'N/A') ?></div>
                                </div>

                                <?php if (isset($user->profile_picture) && $user->profile_picture): ?>
                                    <div class="mt-4">
                                        <h4>Foto Profil:</h4>
                                        <img src="<?= base_url('uploads/profile_pictures/' . htmlspecialchars($user->profile_picture)) ?>"
                                            alt="Foto Profil Pengguna" class="img-fluid rounded-circle" style="max-width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                <?php endif; ?>

                                <hr class="my-4">

                                <!-- <a href="<?= base_url('users/edit/' . ($user->id ?? '')) ?>" class="btn btn-primary mt-3">Edit Profil</a> -->

                            <?php else: ?>
                                <div class="alert alert-warning" role="alert">
                                    Data pengguna tidak ditemukan.
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Start Youtube -->
    <div class="youtube-area video-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-items-active">
                        <?php
                        if ($youtube_latest) {
                            foreach ($youtube_latest as $yl) {
                                $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
                                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
                                $youtube_id = null;

                                if (preg_match($longUrlRegex, $yl->link, $matches)) {
                                    $youtube_id = $matches[count($matches) - 1];
                                }

                                if (preg_match($shortUrlRegex, $yl->link, $matches)) {
                                    $youtube_id = $matches[count($matches) - 1];
                                }
                                $link = 'https://www.youtube.com/embed/' . $youtube_id;
                        ?>
                                <div class="video-items text-center">
                                    <iframe class="video-youtube" src="<?= $link ?>" frameborder="0" data-title="<?= $yl->title ?>" data-description="<?= $yl->text ?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="video-items text-center">
                                <iframe src="https://www.youtube.com/embed/Bj3JNN-y7E4?si=OBsi_1GHh_GPovN8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="video-caption">
                            <div class="top-caption">
                                <!-- <span class="color1">Politics</span> -->
                            </div>
                            <div class="bottom-caption">
                                <h2 id="video-title-youtube"></h2>
                                <p id="video-description"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testmonial-nav text-center">
                            <?php
                            if ($youtube_latest) {
                                foreach ($youtube_latest as $yl) {
                                    $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
                                    $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
                                    $youtube_id = null;

                                    if (preg_match($longUrlRegex, $yl->link, $matches)) {
                                        $youtube_id = $matches[count($matches) - 1];
                                    }

                                    if (preg_match($shortUrlRegex, $yl->link, $matches)) {
                                        $youtube_id = $matches[count($matches) - 1];
                                    }
                                    $link = 'https://www.youtube.com/embed/' . $youtube_id;
                            ?>
                                    <div class="single-video">
                                        <iframe src="<?= $link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <div class="video-intro">
                                            <h4><?= $yl->title ?></h4>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="single-video">
                                    <iframe src="https://www.youtube.com/embed/Bj3JNN-y7E4?si=OBsi_1GHh_GPovN8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div class="video-intro">
                                        <h4>Welcotme To The Best Model Winner Contest</h4>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Start youtube -->

</main>