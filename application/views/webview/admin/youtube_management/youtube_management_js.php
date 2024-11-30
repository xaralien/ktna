<link rel="stylesheet" href="<?= base_url('assets/admin') ?>/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url('assets/admin') ?>/compiled/css/table-datatable-jquery.css">
<link rel="stylesheet" href="<?= base_url('assets/admin') ?>/compiled/css/app.css">
<link rel="stylesheet" href="<?= base_url('assets/admin') ?>/compiled/css/app-dark.css">

<script src="<?= base_url('assets/admin') ?>/static/js/initTheme.js"></script>
<script src="<?= base_url('assets/admin') ?>/extensions/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script>
    let jquery_datatable = $("#table_youtube").DataTable({
        responsive: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [], //Initial no order.
        iDisplayLength: 10,

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "<?php echo site_url('Youtube_Management/ajax_list') ?> ",
            type: "POST",
            data: function(data) {}
        },
        columnDefs: [{
            targets: 5, // The 8th column (0-indexed)
            orderable: false // Disable sorting
        }]
    })
    document.addEventListener('DOMContentLoaded', function() {
        // Get current date and time
        const now = new Date();

        // Format date as YYYY-MM-DD
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const day = String(now.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;

        // Format time as HH:MM
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const formattedTime = `${hours}:${minutes}`;

        // Set the values of the inputs
        document.getElementById('tanggal_add').value = formattedDate;
        document.getElementById('jam_add').value = formattedTime;
    });

    function reset_youtube() {
        document.getElementById('add_youtube').reset(); // Reset the form
    }

    function save_youtube() {
        const ttlkategoriValue = $('#link_add').val();
        const ttltitleValue = $('#title_add').val();
        const ttltanggalValue = $('#tanggal_add').val();
        const ttljamValue = $('#jam_add').val();


        if (!ttlkategoriValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Link Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltitleValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Title Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltanggalValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Tanggal Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttljamValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Jam Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    InputEvent: 'form-control',
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Ingin Menambahkan Data Youtube?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Youtube_Management/save') ?>";

                    // window.location = url_base;
                    var formData = new FormData($("#add_youtube")[0]);
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: "JSON",
                        beforeSend: function() {
                            swal.fire({
                                icon: 'info',
                                timer: 3000,
                                showConfirmButton: false,
                                title: 'Loading...'

                            });
                        },
                        success: function(data) {
                            /* if(!data.status)alert("ho"); */
                            if (!data.status) swal.fire('Gagal menyimpan data', 'error');
                            else {

                                // document.getElementById('rumahadat').reset();
                                // $('#add_modal').modal('hide');
                                (JSON.stringify(data));
                                // alert(data)
                                swal.fire({
                                    customClass: 'slow-animation',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    title: 'Berhasil Menambahkan Youtube',
                                    timer: 1500
                                });
                                document.getElementById('add_youtube').reset(); // Reset the form
                                $('#table2').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
                                $('#exampleModalScrollable').modal('hide'); // Hide the modal
                                // location.reload();
                                location.href = '<?= base_url('youtube_management') ?>';

                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal.fire('Operation Failed!', errorThrown, 'error');
                        },
                        complete: function() {
                            console.log('Editing job done');
                        }
                    });


                }

            })
        }
    }

    function update_youtube() {
        const ttlkategoriValue = $('#link_edit').val();
        const ttltitleValue = $('#title_edit').val();
        const ttltanggalValue = $('#tanggal_edit').val();
        const ttljamValue = $('#jam_edit').val();


        if (!ttlkategoriValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Link Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltitleValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Title Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltanggalValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Tanggal Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttljamValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Jam Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    InputEvent: 'form-control',
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Ingin Mengubah Data Youtube?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Youtube_Management/proses_update') ?>";

                    // window.location = url_base;
                    var formData = new FormData($("#update_youtube")[0]);
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: "JSON",
                        beforeSend: function() {
                            swal.fire({
                                icon: 'info',
                                timer: 3000,
                                showConfirmButton: false,
                                title: 'Loading...'

                            });
                        },
                        success: function(data) {
                            /* if(!data.status)alert("ho"); */
                            if (!data.status) swal.fire('Gagal menyimpan data', 'error');
                            else {

                                // document.getElementById('rumahadat').reset();
                                // $('#add_modal').modal('hide');
                                (JSON.stringify(data));
                                // alert(data)
                                swal.fire({
                                    customClass: 'slow-animation',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    title: 'Berhasil Mengubah Youtube',
                                    timer: 1500
                                });
                                document.getElementById('update_youtube').reset(); // Reset the form
                                $('#table2').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
                                $('#exampleModalScrollable').modal('hide'); // Hide the modal
                                // location.reload();
                                location.href = '<?= base_url('youtube_management') ?>';

                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal.fire('Operation Failed!', errorThrown, 'error');
                        },
                        complete: function() {
                            console.log('Editing job done');
                        }
                    });


                }

            })
        }
    }

    function onDelete(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin ingin menghapus Data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus Data',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: "<?php echo site_url('Youtube_Management/delete') ?>",
                    type: "POST",
                    data: {
                        id_delete: id
                    },
                    dataType: "JSON",
                    beforeSend: function() {
                        // showLoading("Saving data...", "Mohon tunggu");
                    },
                    success: function(data) {
                        if (!data.status) showAlert('Gagal!', data.message.toString().replace(/<[^>]*>/g, ''), 'error');
                        else {
                            swalWithBootstrapButtons.fire(
                                'Terhapus!',
                                'Data berhasil dihapus.',
                                'success'
                            )
                            $('#table_youtube').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swalWithBootstrapButtons.fire(
                            'Gagal',
                            'Data gagal dihapus',
                            'error'
                        )
                    },
                    complete: function() {
                        console.log('published job done');
                    }
                });


            }

        })



    }
</script>