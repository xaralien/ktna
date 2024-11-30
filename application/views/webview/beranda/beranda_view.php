<style>
    .trend-bottom-img {
        width: 237px;
        height: 158px;
        overflow: hidden;
        /* Hide anything outside the box */
    }

    .trend-bottom-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Ensures the image is cropped to fit the box */
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
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="<?= base_url('uploads/artikel/' . $artikel_trending_now_1->thumbnail) ?>" alt="">
                                    <div class="trend-top-cap">
                                        <span><?= $artikel_trending_now_1->category ?></span>
                                        <h2><a href="<?= base_url('detail/artikel/' . $artikel_trending_now_1->Id) ?>"><?= $artikel_trending_now_1->title ?></a></h2>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="<?= base_url('uploads/artikel/' . $artikel_trending_now_2->thumbnail) ?>" alt="">
                                    <div class="trend-top-cap">
                                        <span><?= $artikel_trending_now_2->category ?></span>
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
                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <img class="cropped-img" src="<?= base_url('uploads/artikel/' . $a->thumbnail) ?>" alt="">
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <span class="color1"><?= $a->category ?></span>
                                                    <h4><a href="<?= base_url('detail/artikel/' . $a->Id) ?>"><?= $a->title ?></a></h4>
                                                </div>
                                            </div>
                                        </div>
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
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <img class="cropped-img" src="<?= base_url('uploads/artikel/' . $b->thumbnail) ?>" alt="">
                                    </div>
                                    <div class="trand-right-cap">
                                        <span class="color1"><?= $b->category ?></span>
                                        <h4><a href="<?= base_url('detail/artikel/' . $b->Id) ?>"><?= $b->title ?></a></h4>
                                    </div>
                                </div>
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
                                    <div class="weekly-single">
                                        <div class="weekly-img">
                                            <img class="cropped-weekly-img" src="<?= base_url('uploads/artikel/' . $c->thumbnail) ?>" alt="">
                                        </div>
                                        <div class="weekly-caption">
                                            <span class="color1"><?= $c->category ?></span>
                                            <h4><a href="<?= base_url('detail/artikel/' . $c->Id) ?>"><?= $c->title ?></a></h4>
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
    <?php
    }
    ?>
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3><a href="<?= base_url('latest_news') ?>">Whats New</a></h3>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->
                                <!-- <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Lifestyle</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Travel</a>
                                        <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Fashion</a>
                                        <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Sports</a>
                                        <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Technology</a>
                                    </div>
                                </nav> -->
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            <?php
                                            if ($artikel_latest) {
                                                foreach ($artikel_latest as $al) {
                                            ?>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="single-what-news mb-100">
                                                            <div class="what-img">
                                                                <img class="cropped-what-img" src="<?= base_url('uploads/artikel/') . '' . $al->thumbnail ?>" alt="">
                                                            </div>
                                                            <div class="what-cap">
                                                                <span class="color1"><?= $al->category ?></span>
                                                                <h4><a href="<?= base_url('detail/artikel/' . $al->Id) ?>"><?= $al->title ?></a></h4>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <h4><a href="#">Tidak Ada Yang Baru</a></h4>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!-- Start Youtube -->
    <div class="youtube-area video-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-items-active">
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/Bj3JNN-y7E4?si=OBsi_1GHh_GPovN8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        </div>
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-info">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="video-caption">
                            <div class="top-caption">
                                <span class="color1">Politics</span>
                            </div>
                            <div class="bottom-caption">
                                <h2>Welcome To The Best Model Winner Contest At Look of the year</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit lorem ipsum dolor sit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testmonial-nav text-center">
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/Bj3JNN-y7E4?si=OBsi_1GHh_GPovN8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                            <div class="single-video">
                                <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <div class="video-intro">
                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Start youtube -->

</main>