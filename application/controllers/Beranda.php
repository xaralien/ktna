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
        $data['artikel_sub_trending_1'] = $this->artikel_management->artikel_sub_trending_1();
        $data['artikel_sub_trending_2'] = $this->artikel_management->artikel_sub_trending_2();
        $data['artikel_weekly_topnews'] = $this->artikel_management->artikel_weekly_topnews();
        $data['artikel_latest'] = $this->artikel_management->artikel_latest();
        $data['content'] = 'webview/beranda/beranda_view';
        $data['content_js'] = 'webview/beranda/beranda_js';
        $this->load->view('parts/wrapper', $data);
    }
}
