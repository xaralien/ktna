<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identity Card (Front & Back)</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            padding: 20px;
            /* Add some padding around the card */
        }

        .identity-card-container {
            /* This container now represents BOTH front and back */
            width: 1000px;
            /* Full width of your combined image */
            height: 316px;
            /* Height of your combined image */

            background-image: url('<?= base_url('assets/images/ktna_kosong.png') ?>');
            /* Use your combined image */
            background-size: 100% 100%;
            /* Make the background image stretch to fit the 1000x316px container */
            background-position: center center;
            background-repeat: no-repeat;

            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Styles for overlaying identity details on the FRONT card (left 500px) */
        .card-content-front {
            position: absolute;
            top: 0;
            left: 0;
            /* Starts at the very left of the 1000px container */
            width: 500px;
            /* Confine content to the left half */
            height: 100%;
            /* padding: 10px; if needed for overall padding */
            box-sizing: border-box;
            color: #000;
            /* Text color for front content */
        }

        /* Styles for overlaying identity details on the BACK card (right 500px) */
        .card-content-back {
            position: absolute;
            top: 0;
            left: 500px;
            /* Starts exactly at the 500px mark (the beginning of the right half) */
            width: 500px;
            /* Confine content to the right half */
            height: 100%;
            /* padding: 10px; if needed for overall padding */
            box-sizing: border-box;
            color: #000;
            /* Text color for back content */
        }

        /* --- Specific positioning for FRONT content based on KTNA card example --- */
        .front-logo-text {
            position: absolute;
            /* Keep it absolutely positioned */
            top: 20px;
            /* Adjust as before */
            left: 20px;
            /* Adjust as before */
            width: 250px;
            /* Adjust width as needed for your text to wrap */
            /* line-height: 1.2; */
            font-size: 13px;
            /* font-weight: 900; */
            /* Heavy bold */

            /* REMOVE flexbox properties if they were added: */
            /* display: flex; */
            /* flex-wrap: wrap; */
            /* align-items: center; */
            /* justify-content: space-between; */
        }

        .front-logo-text span {
            display: block;
            /* Ensures each line of text is on its own line */
        }

        /* New CSS for the logo on the right side of the text */
        .top-right-logo {
            position: absolute;
            /* Position relative to .card-content-front */
            top: 30px;
            /* Adjust vertical position */
            right: 30px;
            /* Adjust horizontal position from the right edge of the card */
            width: 80px;
            /* Adjust the size of the logo container */
            height: 80px;
            /* Adjust height to maintain aspect ratio, or use auto for image */
            /* If the logo itself has transparent background, you might not need a background-color */
            /* background-color: rgba(255, 255, 255, 0.7); Remove or adjust as needed */
            display: flex;
            /* Use flex to center the image inside this container if it doesn't fill */
            justify-content: center;
            align-items: center;
        }

        .top-right-logo img {
            max-width: 100%;
            /* Ensure the image fits within its container */
            max-height: 100%;
            object-fit: contain;
            /* Shrinks the image to fit without cropping */
            display: block;
            /* Remove any extra space below the image */
        }

        /* Adjust other elements if the new logo overlaps */
        /* For example, if .member-photo needs to be shifted down or left */
        /*
.member-photo {
    top: 130px; // Example adjustment if logo pushes things down
    // ...
}
*/

        .member-photo {
            position: absolute;
            top: 60px;
            /* Adjust */
            left: 30px;
            /* Adjust */
            width: 130px;
            /* Based on your image */
            height: 150px;
            /* Based on your image */
            border: 2px solid #fff;
            /* White border as in example */
            border-radius: 5px;
            overflow: hidden;
        }

        .member-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .member-details {
            position: absolute;
            bottom: 20px;
            /* Adjust */
            left: 20px;
            /* Adjust */
            font-size: 0.9em;
            font-weight: bold;
            line-height: 0.4;
            width: 250px;
        }

        .member-details .id-number {
            font-size: 1.2em;
            letter-spacing: 1px;
        }

        .qr-code {
            position: absolute;
            bottom: 30px;
            /* Adjust */
            right: 20px;
            /* Relative to .card-content-front, so it's 20px from its right edge */
            width: 100px;
            /* Size of QR code */
            height: 100px;
            background-color: #fff;
            /* QR code often needs a white background */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .qr-code img {
            width: 90%;
            height: 90%;
            object-fit: contain;
        }

        /* --- Specific positioning for BACK content based on KTNA card example --- */
        /* Note: Most of the back content in your example image is static.
           You would only overlay dynamic parts. I'll include placeholders. */
        /* Update .back-rules-title to remove its absolute positioning and left/top */
        .back-rules-title {
            /* position: absolute;  REMOVE THIS */
            /* top: 20px;           REMOVE THIS */
            /* left: 20px;          REMOVE THIS */
            font-weight: bold;
            font-size: 0.8em;
            /* width: calc(100% - 40px); REMOVE THIS, let it size to content */
            text-align: center;
            /* Center the text inside the title div */
            margin-top: 5px;
            /* Space between image and title */
        }

        /* Style for the image itself */
        .back-rules-image img {
            display: block;
            /* Ensures it behaves as a block for margin auto */
            margin: 0 auto;
            /* Center the image horizontally */
            width: 60px;
            /* Adjust image width as needed for the logo */
            height: auto;
            /* Maintain aspect ratio */
        }

        /* New container to hold both image and title, and center them */
        .back-top-section {
            position: absolute;
            /* Position this whole section */
            top: 20px;
            /* Adjust the top position for the entire block */

            /* Centering the block horizontally */
            left: 50%;
            transform: translateX(-50%);

            /* Optional: give it a width if you want content within it to wrap at a certain point */
            width: 200px;
            /* Adjust as needed, make it wide enough for image and text */
            text-align: center;
            /* This will center any inline/inline-block content inside it */
        }

        .back-rules-title {
            position: absolute;
            top: 80px;
            /* Adjust */
            left: 20px;
            /* Adjust */
            font-weight: bolder;
            text-align: left;
            font-size: 13px;
            width: calc(100% - 40px);
            /* Adjust width to fit */
        }

        .back-rules-list {
            position: absolute;
            top: 90px;
            /* Adjust */
            /* left: 20px; */
            /* Adjust */
            font-weight: bold;
            width: calc(100% - 40px);
            /* Adjust width to fit within 500px back section */
            list-style-type: disc;
            /* padding-left: 20px; */
            font-size: 9px;
            /* line-height: 1.4; */
        }

        .back-rules-list li {
            margin-bottom: 5px;
        }

        .back-address-block {
            position: absolute;
            bottom: 65px;
            /* Keep your desired bottom position */
            width: 250px;
            /* Keep your desired width */
            text-align: center;
            /* This centers the text INSIDE the block */
            /* line-height: 1.4; */
            font-size: 9px;
            font-weight: bold;
            /* --- To center the block itself horizontally: --- */
            left: 50%;
            /* Move the left edge to the center of the parent */
            transform: translateX(-50%);
            /* Move the block back by half of its own width */
        }


        /* Styling for the new container holding both e-money number and logo */
        .emoney-block {
            position: absolute;
            bottom: 20px;
            /* Adjust this value to position the entire block from the bottom */
            left: 50%;
            transform: translateX(-50%);
            /* Centers the block horizontally */
            text-align: center;
            /* Centers inline/inline-block content within this block */
            /* Optional: Set a width if you want the content inside to wrap */
            /* width: 200px; */
        }


        .back-emoney-number {
            /* position: absolute; - REMOVE THIS from here */
            /* bottom: 45px; - REMOVE THIS from here */
            /* left: 50%; - REMOVE THIS from here */
            /* transform: translateX(-50%); - REMOVE THIS from here */
            font-size: 13px;
            /* Your desired font size */
            /* font-weight: 400; */
            font-weight: bold;
            /* As requested, 'heavy bold' */
            letter-spacing: 1px;
            margin-bottom: 5px;
            /* Add some space between the number and the logo */
            display: block;
            /* Ensure it takes up its own line */
        }

        .emoney-logo img {
            display: block;
            /* Makes the image a block element */
            margin: 0 auto;
            /* Centers the image horizontally within .emoney-logo */
            width: 100px;
            /* Adjust the width of the logo image as needed */
            height: auto;
            /* Maintain aspect ratio */
        }
    </style>
</head>

<body>
    <div class="identity-card-container">
        <div class="card-content-front">
            <div class="front-logo-text">
                <span><b>KTNA</b> Card</span>
                <span><b>KONTAK TANI NELAYAN ANDALAN</b></span>
            </div>

            <div class="top-right-logo">
                <img src="<?= base_url('assets/images/ktna.png') ?>" alt="KTNA Top Right Logo">
            </div>

            <div class="member-photo">
                <img src="<?= base_url('assets/images/profile/' . $user->image) ?>" alt="Member Photo">
            </div>

            <div class="member-details">
                <p><?= $user->username ?></p>
                <?php
                $user_jabatan_value = $user->jabatan ?? null; // Use null coalescing to prevent error if it's not set

                $jabatan_text = ''; // Initialize variable to store the display text

                switch ($user_jabatan_value) {
                    case 1:
                        $jabatan_text = 'Ketua Umum';
                        break;
                    case 2:
                        $jabatan_text = 'Sekertariat Jendral';
                        break;
                    case 3:
                        $jabatan_text = 'Bendahara Umum';
                        break;
                    case 4:
                        $jabatan_text = 'Ketua Provinsi';
                        break;
                    case 5:
                        $jabatan_text = 'Dep. Kelautan dan Perikanan';
                        break;
                    case 6:
                        $jabatan_text = 'Dep. Kemitraan Strategis dan Advokasi';
                        break;
                    case 7:
                        $jabatan_text = 'Dep.LITBANG';
                        break;
                    case 8:
                        $jabatan_text = 'Dep. Media Informasi dan Komunikasi';
                        break;
                    case 9:
                        $jabatan_text = 'Dep. Hukum & HAM';
                        break;
                    case 10:
                        $jabatan_text = 'Anggota';
                        break;
                    default:
                        $jabatan_text = 'Jabatan Tidak Dikenal'; // Or an empty string, or "N/A"
                        break;
                }
                ?>
                <p><?= $jabatan_text ?></p>
                <p class="id-number"><?= $user->nomor_urut ?></p>
            </div>

            <div class="qr-code">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= base_url() ?>beranda/detail_user/<?= $user->nomor_urut ?>#partners" alt="QR Code">
            </div>

        </div>

        <div class="card-content-back">
            <div class="back-top-section">
                <div class="back-rules-image">
                    <img src="<?= base_url('assets/images/ktna.png') ?>" alt="KTNA Logo">
                </div>
            </div>
            <div class="back-rules-title">Ketentuan</div>
            <ul class="back-rules-list">
                <li>Kartu ini adalah Kartu Tanda Anggota (KTA) Kontak Tani Nelayan Andalan dan berlaku selama pemegang masih berstatus sebagai Anggota Kontak Tani Nelayan Andalan.</li>
                <li>Pengguna KTA ini diatur melalui petunjuk yang diterbitkan oleh Pengurus Kontak Tani Nelayan Andalan.</li>
                <li>Setiap Anggota harus dapat menunjukkan KTA pada setiap kegiatan yang berkaitan dengan Kontak Tani Nelayan Andalan.</li>
                <li>Jika menemukan KTA ini harap dikembalikan ke Sekretariat Kontak Tani Nelayan Andalan di alamat :</li>
            </ul>

            <div class="back-address-block">
                Sekretariat : <br>
                Kontak Tani Nelayan Andalan <br>
                Gedung D Lantai 5 Kementerian Pertanian <br>
                Jalan Harsono R.M. No. 3, Ragunan - Pasar Minggu <br>
                Jakarta Selatan 12551 <br>
                Telp: 021 - 7826084
            </div>

            <div class="emoney-block">
                <div class="back-emoney-number">6032 9828 0000 0000</div>
                <div class="emoney-logo">
                    <img src="<?= base_url('assets/images/e-money.png') ?>" alt="e-Money Logo">
                </div>
            </div>
        </div>
    </div>
</body>

</html>