<!--================Blog Area =================-->
<style>
    .media.post_item img {
        width: 80px;
        /* Set fixed width */
        height: 80px;
        /* Set fixed height */
        object-fit: cover;
        /* Ensures the image covers the dimensions while cropping */
        border-radius: 8px;
        /* Optional: Add rounded corners */
    }

    /* Default style for larger screens */
    .feature-img {
        width: 750px;
        /* Set container width for larger screens */
        height: auto;
        /* Let height adjust dynamically */
        overflow: hidden;
        /* Crop overflowing parts of the image */
        margin: 0 auto;
        /* Optional: Center the image horizontally */
    }

    .feature-img img {
        width: 100%;
        /* Make the image fill the container width */
        height: 100%;
        /* Stretch height to fit */
        object-fit: cover;
        /* Crop the image while maintaining aspect ratio */
    }

    /* Style for smaller screens (mobile) */
    @media (max-width: 768px) {
        .feature-img {
            width: 330px;
            /* Set container width for mobile screens */
            height: auto;
            /* Adjust height dynamically */
        }
    }

    /* Style for images inside Summernote-rendered content */
    p img {
        max-width: 100%;
        /* Ensure the image does not exceed the container's width */
        height: auto;
        /* Maintain aspect ratio */
        display: block;
        /* Remove inline-block spacing */
        margin: 0 auto;
        /* Center the image horizontally */
        object-fit: cover;
        /* Crop the image if necessary */
    }

    /* Optional: Add a maximum height if needed */
    p img {
        max-height: 500px;
        /* Adjust as needed */
        object-fit: contain;
        /* Ensures the entire image is visible if max height is reached */
    }
</style>
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <?php
                if (!$artikel) {
                ?>
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="<?= base_url('assets/') ?>img/blog/single_blog_1.png" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>
                                Artikel Not Found 404
                            </h2>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="<?= base_url('uploads/artikel/' . $artikel->thumbnail) ?>" alt="">
                        </div>
                        <div class="blog_details">
                            <h2><?= $artikel->title ?>
                            </h2>
                            <?php
                            $tanggal = $artikel->tanggal;

                            // Split into date and time using explode
                            list($date, $time) = explode(' ', $tanggal);
                            $formatted_date = DateTime::createFromFormat('Y-m-d', $date)->format('F j, Y'); // 
                            ?>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="<?= base_url('kategori') ?>"><i class="fa fa-tag"></i> <?= $artikel->category ?> | <?= $formatted_date ?></a></li>
                                <!-- <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li> -->
                            </ul>
                            <p style="text-align: justify;">
                                <?= $artikel->text ?>
                            </p>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                            people like this</p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                            <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p>
                        </div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <!-- <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Search</button>
                        </form>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Resaurant food</p>
                                    <p>(37)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Travel news</p>
                                    <p>(10)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Modern technology</p>
                                    <p>(03)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Product</p>
                                    <p>(11)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Inspiration</p>
                                    <p>(21)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Health Care</p>
                                    <p>(21)</p>
                                </a>
                            </li>
                        </ul>
                    </aside> -->
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        <?php
                        if ($recent) {
                            foreach ($recent as $r) {
                        ?>
                                <div class="media post_item">
                                    <img src="<?= base_url('uploads/artikel/') . '' . $r->thumbnail ?>" alt="post">
                                    <div class="media-body">
                                        <a href="<?= base_url('detail/artikel/' . $r->Id) ?>">
                                            <h3><?= $r->title ?></h3>
                                        </a>
                                        <?php
                                        $tanggal = $r->tanggal;

                                        // Split into date and time using explode
                                        list($date, $time) = explode(' ', $tanggal);
                                        $formatted_date = DateTime::createFromFormat('Y-m-d', $date)->format('F j, Y'); // Format the date
                                        ?>
                                        <p><?= $formatted_date ?></p>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </aside>
                    <div class="single-follow mb-45">
                        <a href="https://kodesis.id" target="_blank">
                            <img class="ads" src="<?= base_url('assets/img/ads/ads_01.jpg') ?>" alt="">
                        </a>
                    </div>
                    <!-- <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">restaurant</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul>
                    </aside> -->
                    <!-- <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="<?= base_url('assets/') ?>img/post/post_5.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="<?= base_url('assets/') ?>img/post/post_6.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="<?= base_url('assets/') ?>img/post/post_7.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="<?= base_url('assets/') ?>img/post/post_8.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="<?= base_url('assets/') ?>img/post/post_9.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="<?= base_url('assets/') ?>img/post/post_10.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </aside> -->
                    <!-- <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Subscribe</button>
                        </form>
                    </aside> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->