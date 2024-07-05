<?php
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['barang'] = $this->Barang_model->get_all_barang();
        // $this->load->view('barang_view', $data);
        $data['title'] = 'Product Page';
        $data['active_menu'] = 'barang';
        $data['content'] = $this->load->view('barang_view', $data, true);
        $this->load->view('template/template', $data);
    }

    public function create_barang()
    {
        $this->form_validation->set_rules(
            'kode_barang',
            'Kode Barang',
            'required',
            ['required' => 'Kolom %s wajib diisi.']
        );
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            ['required' => 'Kolom %s wajib diisi.']
        );
        $this->form_validation->set_rules(
            'kategori_barang',
            'Kategori Barang',
            'required',
            ['required' => 'Kolom %s wajib diisi.']
        );
        $this->form_validation->set_rules(
            'harga_beli',
            'Harga Beli',
            'required|numeric',
            [
                'required' => 'Kolom %s harus diisi.',
                'numeric' => 'Kolom %s hanya boleh berisi angka.'
            ]
        );
        $this->form_validation->set_rules(
            'harga_jual',
            'Harga Jual',
            'required|numeric',
            [
                'required' => 'Kolom %s harus diisi.',
                'numeric' => 'Kolom %s hanya boleh berisi angka.'
            ]
        );
        $this->form_validation->set_rules(
            'stok_barang',
            'Stok Barang',
            'required|integer',
            [
                'required' => 'Kolom %s harus diisi.',
                'integer' => 'Kolom %s hanya boleh berisi angka.'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Barang';
            $data['active_menu'] = 'data_barang';
            $data['content'] = $this->load->view('barang/form_barang', '', true);
            $this->load->view('template/template', $data);
        } else {
            $data = [
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'kategori_barang' => $this->input->post('kategori_barang'),
                'deskripsi_barang' => $this->input->post('deskripsi_barang'),
                'harga_beli' => $this->input->post('harga_beli'),
                'harga_jual' => $this->input->post('harga_jual'),
                'stok_barang' => $this->input->post('stok_barang'),
                'supplier_barang' => $this->input->post('supplier_barang'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk')
            ];

            $insert = $this->Barang_model->insert_barang($data);
            if ($insert) {
                $this->session->set_flashdata('success', 'Data barang berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Data barang gagal ditambahkan.');
            }
            redirect('barang');
        }
    }
    public function edit_barang($id)
    {
        $this->form_validation->set_rules(
            'kode_barang',
            'Kode Barang',
            'required',
            ['required' => 'Kolom %s wajib diisi.']
        );
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            ['required' => 'Kolom %s wajib diisi.']
        );
        $this->form_validation->set_rules(
            'kategori_barang',
            'Kategori Barang',
            'required',
            ['required' => 'Kolom %s wajib diisi.']
        );
        $this->form_validation->set_rules(
            'harga_beli',
            'Harga Beli',
            'required|numeric',
            [
                'required' => 'Kolom %s harus diisi.',
                'numeric' => 'Kolom %s hanya boleh berisi angka.'
            ]
        );
        $this->form_validation->set_rules(
            'harga_jual',
            'Harga Jual',
            'required|numeric',
            [
                'required' => 'Kolom %s harus diisi.',
                'numeric' => 'Kolom %s hanya boleh berisi angka.'
            ]
        );
        $this->form_validation->set_rules(
            'stok_barang',
            'Stok Barang',
            'required|integer',
            [
                'required' => 'Kolom %s harus diisi.',
                'integer' => 'Kolom %s hanya boleh berisi angka.'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Barang';
            $data['active_menu'] = 'data_barang';
            $data['barang'] = $this->Barang_model->get_barang_by_id($id);
            $data['content'] = $this->load->view('barang/form_barang', $data, true);
            $this->load->view('template/template', $data);
        } else {
            $data = [
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'kategori_barang' => $this->input->post('kategori_barang'),
                'deskripsi_barang' => $this->input->post('deskripsi_barang'),
                'harga_beli' => $this->input->post('harga_beli'),
                'harga_jual' => $this->input->post('harga_jual'),
                'stok_barang' => $this->input->post('stok_barang'),
                'supplier_barang' => $this->input->post('supplier_barang'),
                'tanggal_masuk' => $this->input->post('tanggal_masuk')
            ];
            $update = $this->Barang_model->update_barang($id, $data);
            if ($update) {
                $this->session->set_flashdata('success', 'Data barang berhasil diupdate.');
            } else {
                $this->session->set_flashdata('error', 'Data barang gagal diupdate.');
            }
            redirect('barang');
        }
    }

    public function delete_barang($id)
    {
        $delete = $this->Barang_model->delete_barang($id);
        if ($delete) {
            $this->session->set_flashdata('success', 'Data barang berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data barang gagal dihapus.');
        }
        redirect('barang');
    }
}
