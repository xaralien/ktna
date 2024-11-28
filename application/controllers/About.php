<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
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
    public function sekilas_ktna()
    {

        $data['content']     = 'webview/about/sekilas_ktna/about_view';
        $data['content_js'] = 'webview/about/sekilas_ktna/about_js';
        $this->load->view('parts/wrapper', $data);
    }
    public function organisasi()
    {

        $data['content']     = 'webview/about/organisasi/about_view';
        $data['content_js'] = 'webview/about/organisasi/about_js';
        $this->load->view('parts/wrapper', $data);
    }
    public function sejarah()
    {

        $data['content']     = 'webview/about/sejarah/about_view';
        $data['content_js'] = 'webview/about/sejarah/about_js';
        $this->load->view('parts/wrapper', $data);
    }
    public function pengurus()
    {

        $data['content']     = 'webview/about/pengurus/about_view';
        $data['content_js'] = 'webview/about/pengurus/about_js';
        $this->load->view('parts/wrapper', $data);
    }
    public function program_kerja()
    {

        $data['content']     = 'webview/about/program_kerja/about_view';
        $data['content_js'] = 'webview/about/program_kerja/about_js';
        $this->load->view('parts/wrapper', $data);
    }
    public function pekan_nasional()
    {

        $data['content']     = 'webview/about/pekan_nasional/about_view';
        $data['content_js'] = 'webview/about/pekan_nasional/about_js';
        $this->load->view('parts/wrapper', $data);
    }
    public function daerah()
    {

        $data['content']     = 'webview/about/daerah/about_view';
        $data['content_js'] = 'webview/about/daerah/about_js';
        $this->load->view('parts/wrapper', $data);
    }
}
