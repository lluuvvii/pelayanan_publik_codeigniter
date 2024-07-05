<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    if (!$this->session->userdata('logged_in')) {
      redirect('users/login');
    }
    $this->load->model('Layanan_model');
  }

  public function index()
  {
    $data['layanan'] = $this->Layanan_model->get_all_layanan();
    $this->load->view('templates/header');
    $this->load->view('layanan/index', $data);
    $this->load->view('templates/footer');
  }

  public function search()
  {
    $keyword = $this->input->post('keyword');
    $data['layanan'] = $this->Layanan_model->search_layanan($keyword);

    $this->load->view('templates/header');
    $this->load->view('layanan/index', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
    $this->form_validation->set_rules('layanan', 'Layanan', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header');
      $this->load->view('layanan/create');
      $this->load->view('templates/footer');
    } else {
      $this->Layanan_model->create_layanan();
      redirect('layanan');
    }
  }

  public function edit($id)
  {
    $data['layanan'] = $this->Layanan_model->get_layanan_by_id($id);

    if (empty($data['layanan'])) {
      show_404();
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');
    $this->form_validation->set_rules('layanan', 'Layanan', 'required');
    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('templates/header');
      $this->load->view('layanan/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Layanan_model->update_layanan($id);
      redirect('layanan');
    }
  }

  public function delete($id)
  {
    $this->Layanan_model->delete_layanan($id);
    redirect('layanan');
  }
}
