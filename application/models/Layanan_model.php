<?php
class Layanan_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_layanan() {
        $query = $this->db->get('layanan_publik');
        return $query->result_array();
    }

    public function search_layanan($keyword) {
      $this->db->like('nama', $keyword);
      $this->db->or_like('layanan', $keyword);
      $query = $this->db->get('layanan_publik');
      return $query->result_array();
  }
  
    public function create_layanan() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'layanan' => $this->input->post('layanan'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        return $this->db->insert('layanan_publik', $data);
    }

    public function get_layanan_by_id($id) {
        $query = $this->db->get_where('layanan_publik', array('id' => $id));
        return $query->row_array();
    }

    public function update_layanan($id) {
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'layanan' => $this->input->post('layanan'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        $this->db->where('id', $id);
        return $this->db->update('layanan_publik', $data);
    }

    public function delete_layanan($id) {
        $this->db->where('id', $id);
        return $this->db->delete('layanan_publik');
    }
}
