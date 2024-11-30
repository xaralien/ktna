<?php defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('parts/admin/header');
$this->load->view('parts/admin/navbar');
$this->load->view($content);
$this->load->view('parts/admin/footer');
$this->load->view('parts/admin/js');
if (isset($content_js)) $this->load->view($content_js);
