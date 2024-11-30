<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Latest_news extends CI_Controller
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
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Latest_News_m', 'latest_news');
        $this->load->model('Artikel_Management_m', 'artikel_management');
        $this->load->library('pagination');
    }
    public function index()
    {
        $search = htmlspecialchars($this->input->get('search') ?? '', ENT_QUOTES, 'UTF-8');

        //pagination settings
        $config['base_url'] = site_url('latest_news');
        $config['total_rows'] = $this->latest_news->item_count($search);
        $config['per_page'] = "10";
        $config["uri_segment"] = 3;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;

        $choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);
        $config["num_links"] = 10;
        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination justify-content-start">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<span class="flaticon-arrow roted"></span>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '<span class="flaticon-arrow right-arrow"></span>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item"><a class="page-link">';  // Add page-link class here
        $config['num_tag_close'] = '</a></li>';
        // Initialize pagination
        $this->pagination->initialize($config);

        // Get the current page number from the query string (page=X)
        $data['page'] = $this->input->get('page') ? $this->input->get('page') : 1;  // Default to 1 if no page param is set
        $offset = ($data['page'] - 1) * $config['per_page'];  // Calculate the offset for the query

        // Fetch data for the current page
        $data['users_data'] = $this->latest_news->item_get($config["per_page"], $offset, $search);

        // Generate the pagination links
        $data['pagination'] = $this->pagination->create_links();

        // Load the view
        $data['content'] = 'webview/latest_news/latest_news_view';
        $data['content_js'] = 'webview/latest_news/latest_news_js';
        $this->load->view('parts/wrapper', $data);
    }
}
