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
}
