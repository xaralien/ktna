<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
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
        // if (!$this->session->userdata('user_logged_in')) {
        // 	redirect('auth'); // Redirect to the 'autentic' page
        // }
    }
    public function artikel($id = null)
    {

        if ($id) {

            $this->artikel_management->update_count($id);
            $data['artikel'] = $this->artikel_management->get_id_edit($id);
        } else {
            $data['artikel'] = null;
        }
        $data['recent'] = $this->artikel_management->artikel_recent();

        $data['content']     = 'webview/detail/detail_view';
        $data['content_js'] = 'webview/detail/detail_js';
        $this->load->view('parts/wrapper', $data);
    }
}
