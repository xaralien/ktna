<?php
$this->db->select('title');
$this->db->from('artikel');

// Filter for articles within the last 7 days
// $this->db->where('tanggal >=', date('Y-m-d', strtotime('-30 days')));
// $this->db->where('tanggal <=', date('Y-m-d')); // Optional: up to today's date

$this->db->order_by('view_count', 'DESC');
$this->db->limit(3);
$query = $this->db->get();
$trend_title_1 = $query->result();

$this->db->select('title');
$this->db->from('artikel');
$this->db->order_by('view_count', 'DESC');
$this->db->limit(3);
$query = $this->db->get();
$trend_title_2 = $query->result();



?>

<div class="trending-tittle">
    <strong>Trending now</strong>
    <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
    <div class="trending-animated">
        <ul id="js-news" class="js-hidden">
            <?php
            if ($trend_title_1) {
                foreach ($trend_title_1 as $tt) {
            ?>
                    <li class="news-item"><?= $tt->title ?></li>
                <?php
                }
            } else {
                foreach ($trend_title_2 as $tt) {

                ?>
                    <li class="news-item"><?= $tt->title ?></li>

            <?php
                }
            }
            ?>
        </ul>
    </div>

</div>