<?php
class Barang_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_barang()
    {
        $query = $this->db->get('barang');
        return $query->result();
    }

    public function insert_barang($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function get_barang_by_id($id)
    {
        return $this->db->get_where('barang', ['id_barang' => $id])->row_array();
    }

    public function update_barang($id, $data)
    {
        $this->db->where('id_barang', $id);
        return $this->db->update('barang', $data);
    }

    public function delete_barang($id)
    {
        $this->db->where('id_barang', $id);
        return $this->db->delete('barang');
    }
}
