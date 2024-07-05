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
    $this->load->library('session');
    $this->load->library('form_validation');
  }
  public function index()
  {
    $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa(); // Mendapatkan data mahasiswa dari model
    $keyword = $this->input->get('keyword');
    $criteria = $this->input->get('criteria'); // Tambahkan ini untuk mendapatkan kriteria pencarian dari form

    if ($keyword != '') {
      $data['mahasiswa'] = $this->Mahasiswa_model->search_mahasiswa($keyword, $criteria);
    }

    $this->load->view('mahasiswa_view', $data); // Menampilkan data mahasiswa ke view
  }

  public function input_data()
  {
    $this->load->view('input_data');
  }
  public function tampilkan_data()
  {
    $this->form_validation->set_rules(
      'nama',
      'Nama',
      'required'
    );
    $this->form_validation->set_rules(
      'npm',
      'NPM',
      'required|numeric', // Validasi agar hanya angka yang diterima
      array(
        'numeric' => 'Kolom {field} hanya boleh berisi angka.'
      )
    );
    $this->form_validation->set_rules(
      'angkatan',
      'Angkatan',
      'required|regex_match[/^\d{4}$/]', // Validasi agar format tahun (4 digit)
      array(
        'regex_match' => 'Format {field} harus berupa 4 digit tahun.'
      )
    );
    $this->form_validation->set_rules(
      'kelas',
      'Kelas',
      'required|regex_match[/^[A-Z]{1}$/]', // Validasi format 1 huruf dan huruf besar
      array(
        'regex_match' => 'Kolom {field} hanya boleh berisi 1 huruf besar.'
      )
    );
    $this->form_validation->set_rules(
      'alamat',
      'Alamat',
      'required|min_length[20]', // Validasi minimal 20 karakter
      array(
        'min_length' => 'Kolom {field} minimal harus mengandung 20 karakter.'
      )
    );
    $this->form_validation->set_rules('mata_kuliah', 'Mata
Kuliah Favorit', 'required');
    $this->form_validation->set_message('required', 'Kolom {field} harus diisi.');
    // Jalankan validasi
    if ($this->form_validation->run() == false) {
      // Jika validasi gagal, tampilkan kembali form input data
      $this->load->view('input_data');
    } else {

      // Ambil data dari form jika validasi berhasil
      $data['nama'] = $this->input->post('nama');
      $data['npm'] = $this->input->post('npm');
      $data['angkatan'] = $this->input->post('angkatan');
      $data['kelas'] = $this->input->post('kelas');
      $data['alamat'] = $this->input->post('alamat');
      $data['mata_kuliah'] = $this->input->post('mata_kuliah');
      // Tampilkan data di halaman lain
      $this->load->view('hasil_data', $data);
    }
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

  public function data_mahasiswa()
  {
    $data['title'] = 'Data Mahasiwa';
    $data['active_menu'] = 'data_mahasiswa';
    $data['mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa();
    $data['content'] = $this->load->view('mahasiswa/list_mahasiswa', $data, true);
    // $data['message'] = $this->session->flashdata('message');
    $this->load->view('template/template', $data);
  }
  public function search_mahasiswa()
  {
    $keyword = $this->input->post('keyword');
    $data['title'] = 'Data Mahasiwa';
    $data['active_menu'] = 'data_mahasiswa';
    $data['mahasiswa'] = $this->Mahasiswa_model->search_data_mahasiswa($keyword);
    $data['keyword'] = $keyword;
    $data['content'] = $this->load->view('mahasiswa/list_mahasiswa', $data, true);
    $this->load->view('template/template', $data);
  }

  public function tentang()
  {
    $data['title'] = 'About Page';
    $data['active_menu'] = 'tentang';
    $data['content'] = $this->load->view('tentang/tentang', '', true);
    $this->load->view('template/template', $data);
  }

  public function create_mahasiswa()
  {
    $this->form_validation->set_rules(
      'nama',
      'Nama',
      'required',
      ['required' => 'Kolom %s wajib diisi.']
    );
    $this->form_validation->set_rules('npm', 'NPM', 'required|numeric', [
      'required' => 'Kolom %s harus diisi.',
      'numeric' => 'Kolom %s hanya boleh berisi angka.',
    ]);
    $this->form_validation->set_rules(
      'angkatan',
      'Angkatan',
      'required|regex_match[/^\d{4}$/]',
      [
        'required' => 'Kolom %s harus diisi.',
        'regex_match' => 'Format %s harus berupa tahun (empat digit
    angka).',
      ]
    );
    $this->form_validation->set_rules(
      'kelas',
      'Kelas',
      'required|regex_match[/^[A-Z]$/]',
      [
        'required' => 'Kolom %s harus diisi.',
        'regex_match' => 'Format %s harus berupa satu huruf besar.',
      ]
    );
    $this->form_validation->set_rules(
      'alamat',
      'Alamat',
      'required|min_length[20]',
      [
        'required' => 'Kolom %s harus diisi.',
        'min_length' => 'Kolom %s minimal harus memiliki 20 karakter.',
      ]
    );
    $this->form_validation->set_rules('mata_kuliah_favorit', 'Mata Kuliah
    Favorit', 'required', ['required' => 'Kolom %s wajib diisi.']);
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|valid_email',
      [
        'required' => 'Kolom %s wajib diisi.',
        'valid_email'
        => 'Kolom %s harus berisi alamat email yang valid.'
      ]
    );
    $this->form_validation->set_rules(
      'jenis_kelamin',
      'Jenis Kelamin',
      'required',
      ['required' => 'Kolom %s wajib diisi.']
    );
    $this->form_validation->set_rules(
      'tanggal_lahir',
      'Tanggal Lahir',
      'required',
      ['required' => 'Kolom %s wajib diisi.']
    );
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Tambah Mahasiswa';
      $data['active_menu'] = 'data_mahasiswa';
      $data['content'] = $this->load->view(
        'mahasiswa/form_mahasiswa',
        '',
        true
      );
      $this->load->view('template/template', $data);
    } else {
      $data = [
        'nama' => $this->input->post('nama'),
        'npm' => $this->input->post('npm'),
        'angkatan' => $this->input->post('angkatan'),
        'kelas' => $this->input->post('kelas'),
        'alamat' => $this->input->post('alamat'),
        'mata_kuliah_favorit' => $this->input->post('mata_kuliah_favorit'),
        'email' => $this->input->post('email'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      ];

      $insert = $this->Mahasiswa_model->insert_mahasiswa($data);
      if ($insert) {
        $this->session->set_flashdata('success', 'Data mahasiswa
    berhasil ditambahkan.');
      } else {
        $this->session->set_flashdata('error', 'Data mahasiswa gagal
    ditambahkan.');
      }
      redirect('mahasiswa/data_mahasiswa');
    }
  }

  public function edit_mahasiswa($id)
  {
    $this->form_validation->set_rules(
      'nama',
      'Nama',
      'required',
      ['required' => 'Kolom %s wajib diisi.']
    );
    $this->form_validation->set_rules('npm', 'NPM', 'required|numeric', [
      'required' => 'Kolom %s harus diisi.',
      'numeric' => 'Kolom %s hanya boleh berisi angka.',
    ]);
    $this->form_validation->set_rules(
      'angkatan',
      'Angkatan',
      'required|regex_match[/^\d{4}$/]',
      [
        'required' => 'Kolom %s harus diisi.',
        'regex_match' => 'Format %s harus berupa tahun (empat digit angka).',
      ]
    );
    $this->form_validation->set_rules(
      'kelas',
      'Kelas',
      'required|regex_match[/^[A-Z]$/]',
      [
        'required' => 'Kolom %s harus diisi.',
        'regex_match' => 'Format %s harus berupa satu huruf besar.',
      ]
    );
    $this->form_validation->set_rules(
      'alamat',
      'Alamat',
      'required|min_length[20]',
      [
        'required' => 'Kolom %s harus diisi.',
        'min_length' => 'Kolom %s minimal harus memiliki 20 karakter.',
      ]
    );
    $this->form_validation->set_rules('mata_kuliah_favorit', 'Mata Kuliah Favorit', 'required', ['required' => 'Kolom %s wajib diisi.']);
    $this->form_validation->set_rules(
      'email',
      'Email',
      'required|valid_email',
      [
        'required' => 'Kolom %s wajib diisi.',
        'valid_email'
        => 'Kolom %s harus berisi alamat email yang valid.'
      ]
    );
    $this->form_validation->set_rules(
      'jenis_kelamin',
      'Jenis Kelamin',
      'required',
      ['required' => 'Kolom %s wajib diisi.']
    );
    $this->form_validation->set_rules(
      'tanggal_lahir',
      'Tanggal Lahir',
      'required',
      ['required' => 'Kolom %s wajib diisi.']
    );
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Edit Mahasiswa';
      $data['active_menu'] = 'data_mahasiswa';
      $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_by_id($id);
      $data['content'] = $this->load->view(
        'mahasiswa/form_mahasiswa',
        $data,
        true
      );
      $this->load->view('template/template', $data);
    } else {
      $data = [
        'nama' => $this->input->post('nama'),
        'npm' => $this->input->post('npm'),
        'angkatan' => $this->input->post('angkatan'),
        'kelas' => $this->input->post('kelas'),
        'alamat' => $this->input->post('alamat'),
        'mata_kuliah_favorit' => $this->input->post('mata_kuliah_favorit'),
        'email' => $this->input->post('email'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      ];
      $update = $this->Mahasiswa_model->update_mahasiswa($id, $data);
      if ($update) {
        $this->session->set_flashdata('success', 'Data mahasiswa berhasil diupdate.');
      } else {
        $this->session->set_flashdata('error', 'Data mahasiswa gagal diupdate.');
      }
      redirect('mahasiswa/data_mahasiswa');
    }
  }

  public function delete_mahasiswa($id)
  {
    $delete = $this->Mahasiswa_model->delete_mahasiswa($id);
    if ($delete) {
      $this->session->set_flashdata('success', 'Data mahasiswa berhasil dihapus.');
    } else {
      $this->session->set_flashdata('error', 'Data mahasiswa gagal dihapus.');
    }
    redirect('mahasiswa/data_mahasiswa');
  }
}