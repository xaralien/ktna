<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    function __construct()
    {
        // require_once APPPATH . 'third_party/PhpSpreadsheet/src/Bootstrap.php';
        parent::__construct();
        $this->load->model('Youtube_Management_m', 'youtube_management');
        $this->load->model('Artikel_Management_m', 'artikel_management');
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        // if (!$this->session->userdata('user_logged_in')) {
        // 	redirect('auth'); // Redirect to the 'autentic' page
        // }
    }

    public function index()
    {
        $data['artikel_trending_now_1'] = $this->artikel_management->artikel_trending_now_1();
        $data['artikel_trending_now_2'] = $this->artikel_management->artikel_trending_now_2();
        $data['artikel_sub_trending_1_alternative'] = $this->artikel_management->artikel_sub_trending_1_alternative();
        $data['artikel_sub_trending_1'] = $this->artikel_management->artikel_sub_trending_1();
        $data['artikel_sub_trending_2'] = $this->artikel_management->artikel_sub_trending_2();
        $data['artikel_weekly_topnews'] = $this->artikel_management->artikel_weekly_topnews();
        $data['artikel_latest'] = $this->artikel_management->artikel_latest();
        $data['youtube_latest'] = $this->youtube_management->youtube_latest();
        $data['content'] = 'webview/beranda/beranda_view';
        $data['content_js'] = 'webview/beranda/beranda_js';
        $this->load->view('parts/wrapper', $data);
    }

    public function insertktna()
    {
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|is_unique[user_ktna.nik]');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user_ktna.email]');
        $this->form_validation->set_rules('tem_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tahun_lahir', 'Tahun_Lahir', 'required|trim');
        $this->form_validation->set_rules('bulan_lahir', 'Bulan_Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('nomor_hp', 'Nomor Hp', 'required|trim');

        if ($this->form_validation->run() == false) {
            redirect('auth/register_ktna');
        } else {
            $nik = $this->input->post('nik');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $tem_lahir = $this->input->post('tem_lahir');
            $tahun_lahir = $this->input->post('tahun_lahir');
            $bulan_lahir = $this->input->post('bulan_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jabatan = $this->input->post('jabatan');
            $alamat = $this->input->post('alamat');
            $provinsi = $this->input->post('provinsi');
            $nomor_hp = $this->input->post('nomor_hp');
            $full_date_lahir = $tahun_lahir . '-' . str_pad($bulan_lahir, 2, '0', STR_PAD_LEFT) . '-' . str_pad($tanggal_lahir, 2, '0', STR_PAD_LEFT);

            // Mengambil data foto dari input dan decoding dari base64
            $foto = $this->input->post('image');
            $foto = str_replace('data:image/jpeg;base64,', '', $foto);
            $foto = base64_decode($foto, true);

            // var_dump($foto);
            // exit;

            // Mengambil username untuk penamaan file foto
            $username = $this->input->post('username');
            $nama_foto = 'masuk-' . date('Y-m-d-H-i-s') . '-' . $username . '.png';
            $file_path = FCPATH . 'assets/images/profile/' . $nama_foto;

            // Memastikan direktori tujuan ada dan memiliki izin yang tepat
            if (!is_dir(FCPATH . 'assets/images/profile/')) {
                mkdir(FCPATH . 'assets/images/profile/', 0777, true);
            }

            // Menyimpan file foto dan mengatur pesan flashdata
            if (file_put_contents($file_path, $foto)) {
                $this->session->set_flashdata('message_name', 'Presensi masuk berhasil disimpan');
            } else {
                $this->session->set_flashdata('message_error', 'Gagal menyimpan foto presensi masuk');
                redirect($_SERVER['HTTP_REFERER']);
                return;
            }

            // query mengambil urutan terbesar 
            $nomor = $this->Home_model->get_nomor();
            $number = $nomor['max'] + 1;
            $no_urut = sprintf("%06d", $number);
            $nomor_user = "$provinsi-00-$no_urut";

            $data_insert = array(
                'nik' => $nik,
                'username' => $username,
                'email' => $email,
                'nomor_urut' => $nomor_user,
                'nomor' => $no_urut,
                'jabatan' => $jabatan,
                'tem_lahir' => $tem_lahir,
                'tanggal_lahir' => $full_date_lahir,
                'alamat' => $alamat,
                'provinsi' => $provinsi,
                'nomor_hp' => $nomor_hp,
                'image' => $nama_foto
            );

            // var_dump($data_insert);
            // exit;

            if ($this->db->insert('user_ktna', $data_insert)) {
                // kirim email
                $this->send_verification_email($email);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Validasi Berhasil & Data berhasil Tersimpan!! silahkan login
        </div>');
                redirect('beranda/buat_kartu/' . $nik);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Apakah Kamu Robot ??
        </div>');
                redirect('beranda/regisktna');
            }
        }
    }
    public function send_verification_email($email)
    {
        $subject = "Verify your email address";
        $message = "<p>Hi " . $email . ",</p>
    <p>Terima kasih telah mendaftar. Silakan klik tautan di bawah ini untuk memverifikasi email kamu:</p>
    <p>Jika kamu tidak merasa mendaftar, abaikan email ini.</p>
    <p>Salam,</p>
    <p>Tim LSP Tanindo KTNA</p>";


        $this->email->from('adminlsp@lsptanindo.com', 'LSP Tanindo KTNA');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        $this->email->send();
    }
    public function cek_kartu()
    {
        $data['title'] = 'Cek Kartu KTNA';
        // $this->load->view('statis_template/auth_header', $data);
        $this->load->view('beranda/kartu_ktna');
        // $this->load->view('statis_template/auth_footer');
    }
    public function buat_kartu($nik)
    {
        $this->db->where('nik', $nik); // Add the WHERE clause
        $query = $this->db->get('user_ktna'); // Execute the query on the 'user_ktna' table

        $data['user'] = $query->row(); // Get a single row result as an object
        $this->load->library('pdfgenerator');

        $data['title'] = "Kartu KTNA";

        $html = $this->load->view('webview/beranda/kartu_ktna', $data, true);


        // PDF settings
        $file_pdf = 'kartu_ktna_';
        $paper = 'A4';
        $orientation = "landscape";

        // Generate PDF
        // $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation, TRUE);

        redirect('beranda');
    }

    public function detail_user($nomor_urut)
    {
        $data['artikel_trending_now_1'] = $this->artikel_management->artikel_trending_now_1();
        $data['artikel_trending_now_2'] = $this->artikel_management->artikel_trending_now_2();
        $data['artikel_sub_trending_1_alternative'] = $this->artikel_management->artikel_sub_trending_1_alternative();
        $data['artikel_sub_trending_1'] = $this->artikel_management->artikel_sub_trending_1();
        $data['artikel_sub_trending_2'] = $this->artikel_management->artikel_sub_trending_2();
        $data['artikel_weekly_topnews'] = $this->artikel_management->artikel_weekly_topnews();
        $data['artikel_latest'] = $this->artikel_management->artikel_latest();
        $data['youtube_latest'] = $this->youtube_management->youtube_latest();
        $data['title'] = 'Detail User';

        $this->db->where('nomor_urut', $nomor_urut); // Add the WHERE clause
        $query = $this->db->get('user_ktna'); // Execute the query on the 'user_ktna' table

        $data['user'] = $query->row(); // Get a single row result as an object
        $data['content'] = 'webview/beranda/detail_user_view';
        $data['content_js'] = 'webview/beranda/detail_user_js';
        $this->load->view('parts/wrapper', $data);
    }
}
