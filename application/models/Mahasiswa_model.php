<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
  }
  // Data array data_mahasiswa
  private $data_mahasiswa = array(
    array(
      'id' => 1,
      'nama' => 'Agus Santoso',
      'npm' => '1412130011',
      'angkatan' =>
        '2020',
      'kelas' => 'A',
      'alamat' => 'Jl. Contoh No. 1',
      'mata_kuliah_favorit' =>
        'Pemrograman Web'
    ),
    array(
      'id' => 2,
      'nama' => 'Budi Raharjo',
      'npm' => '1412130022',
      'angkatan' =>
        '2019',
      'kelas' => 'B',
      'alamat' => 'Jl. Contoh No. 2',
      'mata_kuliah_favorit' => 'Basis
Data'
    ),
    array(
      'id' => 3,
      'nama' => 'Citra Dewi',
      'npm' => '1412130033',
      'angkatan' => '2021',
      'kelas' => 'C',
      'alamat' => 'Jl. Contoh No. 3',
      'mata_kuliah_favorit' => 'Pemrograman
Lanjut'
    ),
    array(
      'id' => 4,
      'nama' => 'Dian Nugraha',
      'npm' => '1412130044',
      'angkatan' =>
        '2020',
      'kelas' => 'A',
      'alamat' => 'Jl. Contoh No. 4',
      'mata_kuliah_favorit' => 'Jaringan
Komputer'
    ),
    array(
      'id' => 5,
      'nama' => 'Eka Sari',
      'npm' => '1412130055',
      'angkatan' => '2019',
      'kelas' => 'B',
      'alamat' => 'Jl. Contoh No. 5',
      'mata_kuliah_favorit' => 'Sistem Operasi'
    )
  );
  // Fungsi untuk mendapatkan data mahasiswa
  public function get_mahasiswa()
  {
    return $this->data_mahasiswa;
  }
  public function search_mahasiswa($keyword, $criteria)
  {
    $result = array();
    foreach ($this->data_mahasiswa as $mahasiswa) {
      $keyword = strtolower($keyword);
      $value = strtolower($mahasiswa[$criteria]);
      if (strpos($value, $keyword) !== false) {
        $result[] = $mahasiswa;
      }
    }
    return $result;
    // $result = array();
    // foreach ($this->data_mahasiswa as $mahasiswa) {
    // $keyword = strtolower($keyword);
    // $nama = strtolower($mahasiswa['nama']);
    // if (strpos($nama, $keyword) !== false) {
    // $result[] = $mahasiswa;
    // }
    // }
    // return $result;
  }

  // Method untuk mengambil semua data mahasiswa
  public function get_all_mahasiswa()
  {
    $query = $this->db->get('mahasiswa');
    return $query->result_array();
  }
  // Method untuk mengambil data mahasiswa sesuai pencarian
  public function search_data_mahasiswa($keyword)
  {
    $this->db->like('nama', $keyword);
    $query = $this->db->get('mahasiswa');
    return $query->result_array();
  }

  public function get_mahasiswa_by_id($id)
  {
    $query = $this->db->get_where('mahasiswa', ['id' => $id]);
    return $query->row_array();
  }
  // Method untuk menambah data mahasiswa
  public function insert_mahasiswa($data)
  {
    return $this->db->insert('mahasiswa', $data);
  }
  // Method untuk mengupdate data mahasiswa
  public function update_mahasiswa($id, $data)
  {
    $this->db->where('id', $id);
    return $this->db->update('mahasiswa', $data);
  }
  // Method untuk menghapus data mahasiswa
  public function delete_mahasiswa($id)
  {
    $this->db->where('id', $id);
    return $this->db->delete('mahasiswa');
  }
}
