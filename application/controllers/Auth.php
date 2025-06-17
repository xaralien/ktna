<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{



    public function index()
    {
        if ($this->session->userdata('user_logged_in') == True) {
            redirect('dashboard');
        }

        $data['content']  = 'webview/login/login_view';
        $data['content_js'] = 'webview/login/login_js';
        $this->load->view('parts/Wrapper_auth', $data);
    }
    public function login_process()
    {

        $this->load->model('Auth_m', 'login');

        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $user = $this->login->user_login($username, $password);

        if (!empty($user)) {


            $this->session->set_userdata([
                'user_user_id'   => $user->Id,
                'username'  => $user->email,
                'name'  => $user->nama,
                'user_logged_in' => true
            ]);
            echo json_encode(array("status" => True));
        } else {
            echo json_encode(array("status" => 'Gagal Cari'));
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('user_user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_logged_in');
        // $this->session->unset_userdata('user_email');
        $this->session->sess_destroy();

        $url = base_url();
        redirect('auth');
    }

    public function register_ktna()
    {
        if ($this->session->userdata('user_logged_in') == True) {
            redirect('dashboard');
        }

        $data['content']  = 'webview/login/register_ktna_view';
        $data['content_js'] = 'webview/login/register_ktna_js';
        $this->load->view('parts/Wrapper_auth', $data);
    }
    public function register_ktna_process()
    {

        $this->load->model('Auth_m', 'login');

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
            $data['title'] = 'Register KTNA';
            $data['content']  = 'webview/login/register_ktna_view';
            $data['content_js'] = 'webview/login/register_ktna_js';
            $this->load->view('parts/Wrapper_auth', $data);
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
            $nomor = $this->login->get_nomor();
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
                // $this->send_verification_email($email);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
              Validasi Berhasil & Data berhasil Tersimpan!! silahkan login
            </div>');
                redirect('beranda/buat_kartu/' . $nik);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
              Apakah Kamu Robot ??
            </div>');
                redirect('auth/regisktna');
            }
        }
    }
}
