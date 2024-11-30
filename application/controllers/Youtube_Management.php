<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Youtube_Management extends CI_Controller
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
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        if (!$this->session->userdata('user_logged_in')) {
            redirect('auth'); // Redirect to the 'autentic' page
        }
    }
    function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
        $youtube_id = null;
        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }
    public function ajax_list()
    {
        $list = $this->youtube_management->get_datatables();
        $data = array();
        $crs = "";
        $no = $_POST['start'];
        $no = 1;
        foreach ($list as $cat) {
            $linkembed = $this->getYoutubeEmbedUrl($cat->link);
            $row = array();
            $row[] = $no;
            $row[] = '<iframe width="300" height="160" src="' . $linkembed . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
            $row[] = $cat->title;
            $plainText = strip_tags($cat->text);

            // Truncate to 100 characters and append ellipsis if necessary
            $truncatedText = strlen($plainText) > 100 ? substr($plainText, 0, 100) . '...' : $plainText;

            $row[] = $truncatedText;
            $row[] = $cat->tanggal;
            // $row[] = $cat->halaman_page;

            $row[] = '<center> <div class="list-icons d-inline-flex">
                <a title="Update User" href="' . base_url('Youtube_Management/update/' . $cat->Id) . '" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg></a>
                                                <a title="Delete User" onclick="onDelete(' . $cat->Id . ')" class="btn btn-danger"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></a>
            </div>
    </center>';

            $data[] = $row;
            $no++;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->youtube_management->count_all(),
            "recordsFiltered" => $this->youtube_management->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    public function index()
    {

        $data['content']     = 'webview/admin/youtube_management/youtube_management_view';
        $data['content_js'] = 'webview/admin/youtube_management/youtube_management_js';
        $this->load->view('parts/admin_wrapper', $data);
    }
    public function add()
    {

        $data['category'] = $this->youtube_management->get_category();
        $data['content']     = 'webview/admin/youtube_management/youtube_form_view';
        $data['content_js'] = 'webview/admin/youtube_management/youtube_management_js';
        $this->load->view('parts/admin_wrapper', $data);
    }
    public function update($id)
    {
        $data['youtube'] = $this->youtube_management->get_id_edit($id);
        $data['category'] = $this->youtube_management->get_category();
        $data['content']     = 'webview/admin/youtube_management/youtube_form_view';
        $data['content_js'] = 'webview/admin/youtube_management/youtube_management_js';
        $this->load->view('parts/admin_wrapper', $data);
    }
    public function save()
    {
        $link = $this->input->post('link');
        $title = $this->input->post('title');
        $text = $this->input->post('text');
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');

        $tanggal_full = $tanggal . ' ' . $jam;


        $this->youtube_management->save_file(
            array(

                'link'           => $link,
                'title'             => $title,
                'text'            => $text,
                'tanggal'             => $tanggal_full,
            ),
        );
        echo json_encode(array("status" => TRUE));
    }
    public function proses_update()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $id_edit = $this->input->post('id_edit');
        $link = $this->input->post('link');
        $title = $this->input->post('title');
        $text = $this->input->post('text');
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $tanggal_full = $tanggal . ' ' . $jam;

        $data_update = [
            // 'updated'           => $date->format('Y-m-d H:i:s'),
            'link'             => $link,
            'title'             => $title,
            'text'              => $text,
            'tanggal'              => $tanggal_full,
        ];

        $this->youtube_management->update_file($data_update, array('Id' => $id_edit));
        echo json_encode(array("status" => TRUE, "title" => $title));
    }
    public function delete()
    {
        $id = $this->input->post('id_delete');
        $this->youtube_management->delete(array('Id' => $id));
        echo json_encode(array("status" => TRUE));
    }
}
