<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User KTNA</title>

    <link rel="shortcut icon" href="<?= base_url() ?>/assets/admin/compiled/svg/favicon.svg" type="image/x-icon">

    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/compiled/css/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/compiled/css/app-dark.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/admin/compiled/css/auth.css">
    <!-- SWAL NOTIF -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<style>
    #my_camera {
        width: 390px;
        height: 450px;
        /* Other styles like border */
    }

    /* THIS IS THE CRUCIAL PART FOR THE LIVE VIDEO FEED */
    #my_camera video {
        width: 100%;
        /* Force the video to take 100% width of its parent (#my_camera) */
        height: 100%;
        /* Force the video to take 100% height of its parent (#my_camera) */
        object-fit: cover;
        /* This is what crops the video to fit the aspect ratio */
        display: block;
        /* Ensures no extra space/margins around the video */
    }

    /* Style for the captured image (from previous answer) */
    .captured-image {
        width: 390px;
        height: 450px;
        object-fit: cover;
        display: block;
        border: 1px solid #ccc;
    }
</style>

<body>
    <script src="<?= base_url() ?>assets/cms/static/js/initTheme.js"></script>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="auth-logo">
                                <a href="<?= base_url('index') ?>"><img style="height: 5rem;" src="<?= base_url() ?>/assets/admin/logo/ktna.png" alt="Logo"></a>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="auth-logo d-flex justify-content-end">
                                <a class="font-bold" href="<?= base_url('') ?>" style="font-size:20px"><i class="bi bi-arrow-left"></i>
                                    Back</a>
                            </div>
                        </div> -->
                    </div>

                    <h6 class="auth-title">Log in.</h6>
                    <form id="login_form" action="<?php echo base_url('auth/register_ktna_process') ?>" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <label for="nik" class="form-label visually-hidden">NIK</label> <input type="text" class="form-control form-control-xl" id="nik" name="nik" placeholder="Input NIK" value="<?= set_value('nik'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <label for="username" class="form-label visually-hidden">Nama</label>
                            <input type="text" class="form-control form-control-xl" id="username" name="username" placeholder="Input Nama" value="<?= set_value('username'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <label for="email" class="form-label visually-hidden">Email</label>
                            <input type="text" class="form-control form-control-xl" id="email" name="email" placeholder="Input email" value="<?= set_value('email'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <label for="jabatan" class="form-label visually-hidden">Jabatan</label>
                            <select class="form-control form-control-xl" name="jabatan" id="jabatan">
                                <option value=""> -- Pilih Jabatan -- </option>
                                <option value="1" <?= set_select('jabatan', '1'); ?>>Ketua Umum</option>
                                <option value="2" <?= set_select('jabatan', '2'); ?>>Sekertariat Jendral</option>
                                <option value="3" <?= set_select('jabatan', '3'); ?>>Bendahara Umum</option>
                                <option value="4" <?= set_select('jabatan', '4'); ?>>Ketua Provinsi</option>
                                <option value="5" <?= set_select('jabatan', '5'); ?>>Dep. Kelautan dan Perikanan</option>
                                <option value="6" <?= set_select('jabatan', '6'); ?>>Dep. Kemitraan Strategis dan Advokasi</option>
                                <option value="7" <?= set_select('jabatan', '7'); ?>>Dep.LITBANG</option>
                                <option value="8" <?= set_select('jabatan', '8'); ?>>Dep. Media Informasi dan Komunikasi</option>
                                <option value="9" <?= set_select('jabatan', '9'); ?>>Dep. Hukum & HAM</option>
                                <option value="10" <?= set_select('jabatan', '10'); ?>>Anggota</option>
                            </select>
                            <div class="form-control-icon">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <label for="tem_lahir" class="form-label visually-hidden">Tempat Lahir</label>
                            <input type="text" class="form-control form-control-xl" id="tem_lahir" name="tem_lahir" placeholder="Input Tempat Lahir" value="<?= set_value('tem_lahir'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <?= form_error('tem_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <label for="tanggal_lahir_group" class="form-label">Tanggal Lahir (Format : Tahun - Bulan - Tanggal)</label>
                            <div class="form-control-icon" style="top: 2.2rem;">
                                <i class="bi bi-calendar"></i>
                            </div>
                            <div class="row" id="tanggal_lahir_group">
                                <div class="col-lg-4 mb-2 mb-lg-0"> <input type="number" class="form-control form-control-xl" id="tahun_lahir" name="tahun_lahir" value="<?= set_value('tahun_lahir'); ?>" placeholder="1997" min="1900" max="3000">
                                </div>
                                <div class="col-lg-4 mb-2 mb-lg-0">
                                    <input type="number" class="form-control form-control-xl" id="bulan_lahir" name="bulan_lahir" value="<?= set_value('bulan_lahir'); ?>" placeholder="08" min="1" max="12">
                                </div>
                                <div class="col-lg-4">
                                    <input type="number" class="form-control form-control-xl" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>" placeholder="07" min="1" max="31">
                                </div>
                            </div>
                            <?= form_error('tahun_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('bulan_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <label for="alamat" class="form-label visually-hidden">Alamat</label>
                            <input type="text" class="form-control form-control-xl" id="alamat" name="alamat" placeholder="Input Alamat" value="<?= set_value('alamat'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-house"></i>
                            </div>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <label for="provinsi" class="form-label visually-hidden">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control form-control-xl">
                                <option value="">-- PILIH PROVINSI --</option>
                                <option value="01" <?= set_select('provinsi', '01'); ?>>Aceh</option>
                                <option value="02" <?= set_select('provinsi', '02'); ?>>Sumatera Utara</option>
                                <option value="03" <?= set_select('provinsi', '03'); ?>>Sumatera Barat</option>
                                <option value="04" <?= set_select('provinsi', '04'); ?>>Riau</option>
                                <option value="05" <?= set_select('provinsi', '05'); ?>>Jambi</option>
                                <option value="06" <?= set_select('provinsi', '06'); ?>>Sumatera Selatan</option>
                                <option value="07" <?= set_select('provinsi', '07'); ?>>Bengkulu</option>
                                <option value="08" <?= set_select('provinsi', '08'); ?>>Lampung</option>
                                <option value="09" <?= set_select('provinsi', '09'); ?>>Kep. Bangka Belitung</option>
                                <option value="10" <?= set_select('provinsi', '10'); ?>>Kep. Riau</option>
                                <option value="11" <?= set_select('provinsi', '11'); ?>>Jakarta</option>
                                <option value="12" <?= set_select('provinsi', '12'); ?>>Jawa Barat</option>
                                <option value="13" <?= set_select('provinsi', '13'); ?>>Jawa Tengah</option>
                                <option value="14" <?= set_select('provinsi', '14'); ?>>Banten</option>
                                <option value="15" <?= set_select('provinsi', '15'); ?>>Jawa Timur</option>
                                <option value="16" <?= set_select('provinsi', '16'); ?>>Yogyakarta</option>
                                <option value="17" <?= set_select('provinsi', '17'); ?>>Bali</option>
                                <option value="18" <?= set_select('provinsi', '18'); ?>>Nusa Tenggara Barat</option>
                                <option value="19" <?= set_select('provinsi', '19'); ?>>Nusa Tenggara Timur</option>
                                <option value="20" <?= set_select('provinsi', '20'); ?>>Kalimantan Barat</option>
                                <option value="21" <?= set_select('provinsi', '21'); ?>>Kalimantan Tengah</option>
                                <option value="22" <?= set_select('provinsi', '22'); ?>>Kalimantan Selatan</option>
                                <option value="23" <?= set_select('provinsi', '23'); ?>>Kalimantan Timur</option>
                                <option value="24" <?= set_select('provinsi', '24'); ?>>Kalimantan Utara</option>
                                <option value="25" <?= set_select('provinsi', '25'); ?>>Sulawesi Utara</option>
                                <option value="26" <?= set_select('provinsi', '26'); ?>>Sulawesi Tengah</option>
                                <option value="27" <?= set_select('provinsi', '27'); ?>>Sulawesi Selatan</option>
                                <option value="28" <?= set_select('provinsi', '28'); ?>>Sulawesi Tenggara</option>
                                <option value="29" <?= set_select('provinsi', '29'); ?>>Gorontalo</option>
                                <option value="30" <?= set_select('provinsi', '30'); ?>>Sulawesi Barat</option>
                                <option value="31" <?= set_select('provinsi', '31'); ?>>Maluku</option>
                                <option value="32" <?= set_select('provinsi', '32'); ?>>Maluku Utara</option>
                                <option value="33" <?= set_select('provinsi', '33'); ?>>Papua</option>
                                <option value="34" <?= set_select('provinsi', '34'); ?>>Papua Barat</option>
                            </select>
                            <div class="form-control-icon">
                                <i class="bi bi-map"></i>
                            </div>
                            <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <label for="nomor_hp" class="form-label visually-hidden">Nomor Hp</label>
                            <input type="text" class="form-control form-control-xl" id="nomor_hp" name="nomor_hp" placeholder="Input Nomor HP" value="<?= set_value('nomor_hp'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            <?= form_error('nomor_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group mb-4">
                            <label for="my_camera" class="form-label">Ambil Foto Profil</label>
                            <div id="my_camera" class="mb-3" style="width:390px; height:450px; border:1px solid black;"></div>
                            <input type="button" value="Take Snapshot" onClick="take_snapshot()" class="btn btn-secondary mt-2">
                            <input type="hidden" name="image" class="image-tag">
                            <div id="results" class="mt-3">Your captured image will appear here...</div>
                        </div>

                        <div class="form-group mb-4">
                            <!-- <div class="g-recaptcha" data-sitekey="6LeS8ykqAAAAAMMLxrZQMfdH37sxjgQPiVYhd0Z4"></div> -->
                        </div>
                        <!-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> -->
                        <button type="submit" onclick="login()" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background: #fffeff; height: 100%; display: flex; justify-content: center; align-items: center;">
                    <img src="<?= base_url('assets/cms/Logo/Logo Dapen KB Bukopin PNG1.png') ?>" alt="" width="70%">
                </div>
            </div>
        </div>

    </div>
</body>

</html>