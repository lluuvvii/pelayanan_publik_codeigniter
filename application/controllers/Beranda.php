<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Beranda extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
  }
  public function index()
  {
    $data['title'] = 'Home Page';
    $data['active_menu'] = 'home';
    $data['content'] = $this->load->view('beranda/beranda', $data, true);
    $this->load->view('template/template', $data);
  }
}