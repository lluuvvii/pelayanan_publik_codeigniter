<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
  public function __construct()
  {
    // parent::__construct();
    // $this->load->model('Mahasiswa_model'); // Memuat model Mahasiswa_model
    parent::__construct();
    $this->load->helper('url'); // Memuat URL Helper
    $this->load->model('Mahasiswa_model'); // Memuat model Mahasiswa_model
  }
  public function index()
  {
    $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa(); // Mendapatkan data mahasiswa dari model
    $keyword = $this->input->get('keyword');
    $criteria = $this->input->get('criteria'); // Tambahkan ini untuk mendapatkan kriteria pencarian dari form

    if ($keyword != '')
    {
      $data['mahasiswa'] = $this->Mahasiswa_model->search_mahasiswa($keyword, $criteria);
    }

    $this->load->view('mahasiswa_view', $data); // Menampilkan data mahasiswa ke view
  }
  public function search()
  {
    // $keyword = $this->input->post('keyword'); // Ambil kata kunci pencarian dari form
    // $data['mahasiswa'] = $this->Mahasiswa_model->search_mahasiswa($keyword); // Cari mahasiswa berdasarkan nama
    // $this->load->view('mahasiswa_view', $data); // Menampilkan hasil pencarian ke view
    //<select name="criteria">
    //<option value="nama">Nama</option>
    //<option value="npm">NPM</option>
    //<option value="angkatan">Angkatan</option>
    //    <option value="kelas">Kelas</option>
    //    <option value="alamat">Alamat</option>
    //    <option value="mata_kuliah_favorit">Mata Kuliah Favorit</option>
    //</select>
    //
  }
}