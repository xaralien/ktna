<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script language="JavaScript">
    Webcam.set({
        width: 390, // This sets the target width for the captured image data AND the preview
        height: 450, // This sets the target height for the captured image data AND the preview
        crop_width: 390, // This tells Webcam.js to crop the captured image to this width
        crop_height: 450, // This tells Webcam.js to crop the captured image to this height
        image_format: 'jpeg',
        jpeg_quality: 100
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            // For displaying the captured image, setting width/height directly on <img> is fine,
            // but ensure it also has object-fit: cover for visual consistency if needed
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '" width="390" height="450" class="captured-image"/>';
        });
    }
</script>
<script src="https://www.google.com/recaptcha/api.js"></script>

<script>
    function login(event) {
        event.preventDefault(); // Prevent the default form submission


        var base_url = "<?php echo base_url(); ?>";
        var url;
        var formData;
        url = "<?php echo base_url('auth/register_ktna_process') ?>";

        // window.location = url_base;
        var formData = new FormData($("#login_form")[0]);
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
                if (!data.status) {
                    swal.fire('Gagal menyimpan data', 'error');
                }
                if (data.status == 'Gagal Cari') {
                    swal.fire({
                        customClass: 'slow-animation',
                        icon: 'error',
                        showConfirmButton: false,
                        title: 'Email Dan Password Salah',
                        timer: 1500
                    });
                } else {
                    // document.getElementById('rumahadat').reset();
                    // $('#add_modal').modal('hide');
                    (JSON.stringify(data));
                    // alert(data)
                    swal.fire({
                        customClass: 'slow-animation',
                        icon: 'success',
                        showConfirmButton: false,
                        title: 'Berhasil Login',
                        timer: 1500
                    });


                    // if (data.status == 'admin') {
                    //     window.location.href = base_url + 'dashboard'; // Assuming 'dashboard' is the path for admin dashboard
                    // } else if (data.status == 'user') {
                    //     window.location.href = base_url + 'SaldoUser'; // Assuming 'SaldoUser' is the path for the user page
                    // }
                    // window.location.href = base_url + 'dashboard'; // Assuming 'dashboard' is the path for admin dashboard

                    // location.reload();

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
</script>