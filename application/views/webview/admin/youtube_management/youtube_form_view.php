<div id="main">

    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Layout</h3>
                    <!-- <p class="text-subtitle text-muted">Multiple form layouts, you can use.</p> -->
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Youtube</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">

                        <?php
                        if ($this->uri->segment(3) == null) {
                        ?>
                            <div class="card-header">
                                <h4 class="card-title">Tambah Youtube</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" id="add_youtube">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Link</label>
                                                    <input type="link" class="form-control" id="link_add" name="link" placeholder="Link">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Title</label>
                                                    <input type="text" class="form-control" id="title_add" name="title" placeholder="Title">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="text">Text</label>
                                                    <textarea class="form-control" name="text" id="text_add"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password-vertical">Tanggal</label>
                                                    <input type="date" id="tanggal_add" class="form-control" name="tanggal" placeholder="Tanggal">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password-vertical">Jam</label>
                                                    <input type="time" id="jam_add" class="form-control" name="jam" placeholder="Jam">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" onclick="save_youtube()" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" onclick="reset_youtube()" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        <a href="<?= base_url('Youtube_Management') ?>" class="btn btn-warning me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card-header">
                                <h4 class="card-title">Update Youtube</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form" id="update_youtube">
                                        <div class="row">
                                            <input type="hidden" name="id_edit" value="<?= $youtube->Id ?>">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Link</label>
                                                    <input type="link" class="form-control" id="link_edit" name="link" placeholder="Link" value="<?= $youtube->link ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">Title</label>
                                                    <input type="text" class="form-control" id="title_edit" name="title" placeholder="Title" value="<?= $youtube->title ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="text">Text</label>
                                                    <textarea class="form-control" name="text" id="text_edit"><?= $youtube->text ?></textarea>
                                                </div>
                                            </div>
                                            <?php
                                            $tanggal = $youtube->tanggal;

                                            // Split into date and time using explode
                                            list($date, $time) = explode(' ', $tanggal);

                                            ?>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password-vertical">Tanggal</label>
                                                    <input type="date" id="tanggal_edit" class="form-control" name="tanggal" placeholder="Tanggal" value="<?= $date ?>">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password-vertical">Jam</label>
                                                    <input type="time" id="jam_edit" class="form-control" name="jam" placeholder="Jam" value="<?= $time ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" onclick="update_youtube()" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <a href="<?= base_url('Youtube_Management') ?>" class="btn btn-warning me-1 mb-1">Back</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>