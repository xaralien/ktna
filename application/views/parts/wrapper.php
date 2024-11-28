<?php defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('parts/header');
$this->load->view('parts/navbar');
$this->load->view($content);
$this->load->view('parts/footer');
$this->load->view('parts/js');
if (isset($content_js)) $this->load->view($content_js);
