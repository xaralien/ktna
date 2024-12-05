<style>
    .center-content {
        display: flex;
        /* Enables flexbox */
        justify-content: center;
        /* Centers content horizontally */
        align-items: center;
        /* Centers content vertically */
        height: 200px;
        /* Ensure enough vertical space */
        text-align: center;
        /* Align text inside the element */
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

    /* Media Query for mobile screens */
    @media (max-width: 768px) {
        .trend-bottom-img {
            width: 330px;
            height: 220px;
        }

        .search-box {
            margin-left: 15%;
            margin-bottom: 20px;
        }
    }

    /* Flex container for form */
    .search-form {
        display: flex;
        align-items: stretch;
        /* Ensure items are aligned properly */
    }

    /* Input field */
    .search-form .form-control {
        flex: 1;
        /* Take up available space */
        border: 1px solid #ccc;
        /* Optional border */
        border-right: none;
        /* Remove border overlap with button */
        border-radius: 4px 0 0 4px;
        /* Rounded corners on the left */
        height: 40px;
        /* Uniform height */
    }

    /* Search button */
    .search-form .btn-search {
        background-color: gray;
        /* Gray background */
        color: white;
        /* White text */
        border: 1px solid #ccc;
        /* Match input border */
        border-radius: 0 4px 4px 0;
        /* Rounded corners on the right */
        padding: 0 15px;
        /* Horizontal padding */
        display: flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        /* Same height as input */
        transition: background-color 0.3s ease;
        /* Smooth color change on hover */
    }

    /* Button hover effect */
    .search-form .btn-search:hover {
        background-color: darkgray;
        /* Dark gray on hover */
        cursor: pointer;
    }

    /* Ensure icon is centered */
    .search-form .btn-search .fas {
        margin: 0;
        /* Reset icon margins */
    }
</style>
<main>
    <div class="youtube-area">
        <div class="container">
            <!-- Hot Aimated News Tittle-->
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $this->load->view('parts/trending_title');
                    ?>
                </div>
            </div>
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
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>Whats New</h3>
                            </div>
                        </div>
                        <div class="search-box">
                            <form action="<?= site_url('latest_news') ?>" method="get" class="search-form">
                                <input class="form-control" type="text" name="search" placeholder="Search" value="<?= htmlspecialchars($this->input->get('search') ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                <button class="btn-search" type="submit"><i class="fas fa-search special-tag"></i></button>
                            </form>
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
                                            <?php if ($users_data) { ?>
                                                <?php foreach ($users_data as $i) { ?>
                                                    <a href="<?= base_url('detail/artikel/' . $i->Id) ?>">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="single-what-news mb-100">
                                                                <div class="what-img">
                                                                    <img src="<?= base_url('uploads/artikel/') . $i->thumbnail ?>" alt="">
                                                                </div>
                                                                <div class="what-cap">
                                                                    <span class="color1"><?= $i->category ?></span>
                                                                    <h4><a href="<?= base_url('detail/artikel/') . $i->Id ?>"><?= $i->title ?></a></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <div class="col-12 center-content">
                                                    <h4>Artikel Tidak Ditemukan</h4>
                                                </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-40">
                        <!-- <h3>Follow Us</h3> -->
                    </div>
                    <!-- Flow Socail -->
                    <!-- New Poster -->
                    <div class="news-poster d-none d-lg-block">
                        <a href="https://kodesis.id" target="_blank">
                            <img class="ads" src="<?= base_url('assets/img/ads/ads_01.jpg') ?>" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->


    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                                <!-- <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                                 <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                 <li class="page-item"><a class="page-link" href="#">02</a></li>
                                 <li class="page-item"><a class="page-link" href="#">03</a></li>
                                 <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li> -->
                                <?=
                                $pagination
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
    <!-- About US End -->
</main>