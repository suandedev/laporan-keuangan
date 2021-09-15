<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
		parent::__construct();
		is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');
        $this->load->helper(array('form'));

    }

    public function index()
    {
        $data['title'] = 'Produk';
        $data['laporan'] = $this->m_laporan->getProduk();
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('v_produk', $data);
        $this->load->view('footer');
    }

    // tambah produk
    public function addProduk()
    {
        $this->form_validation->set_rules(
            'harga_jual',
            'Harga jual',
            'trim|required',
            [
                'required' => 'harga tidak boleh kosong',
            ]
        );
        $this->form_validation->set_rules(
            'harga_modal',
            'Harga modal',
            'trim|required',
            [
                'required' => 'harga tidak boleh kosong',
            ]
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'trim|required',
            [
                'required' => 'deskripsi tidak boleh kosong',
            ]
        );

        $this->form_validation->set_error_delimiters('<p class="text-danger" >', '</p>');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Produk';
            $data['tag'] = 'Tambah';
            $data['laporan'] = $this->m_laporan->getProduk();
            $this->load->view('header', $data);
            $this->load->view('sidebar', $data);
            $this->load->view('v_formProduk', $data);
            $this->load->view('footer');
        } else {

            $this->_gambar();

            $data = [
                'nama' => htmlspecialchars($this->input->POST('nama')),
                'harga_jual' => htmlspecialchars($this->input->POST('harga_jual')),
                'harga_modal' => htmlspecialchars($this->input->POST('harga_modal')),
                'deskripsi' => htmlspecialchars($this->input->POST('deskripsi')),
                'gambar' => $this->upload->data('file_name'),
                'date_created' => time(),
                'date_modify' => time()
            ];

            $this->m_laporan->addProduk($data);
            $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
            redirect('produk');
        }
    }

    // private upload gambar
    private function _gambar()
    {
        $config['upload_path']          = './assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
            $data = [
                'error' => $this->upload->display_errors()
            ];
            $this->load->view('v_formProduk', $data);
        } else {
            $data = [
                'upload_data' => $this->upload->data()
            ];
            $this->load->view('v_formProduk', $data);
        }
    }

    // hapus produk
    public function hapus($id)
    {
        $this->_hapus($id);

        $this->m_laporan->hapusProduk($id);
        $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('produk');
    }

    // private hapus
    private function _hapus($id)
    {
        //ambil data gambar di tabel
        $data = $this->m_laporan->getProduk($id);

        //unlink 
        $path = 'assets/upload/' . $data[0]['gambar'];
        unlink($path);
    }

    // detail produk
    public function detail($id)
    {
        $data['title'] = 'Produk';
        $data['produk'] = $this->m_laporan->getProduk($id);
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('v_detailProduk', $data);
        $this->load->view('footer');
    }

    // edit produk
    public function editProduk($id)
    {
        $data['title'] = 'Produk';
        $data['tag'] = 'Edit';
        $data['produk'] = $this->m_laporan->getProduk($id);
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('v_formProduk', $data);
        $this->load->view('footer');
    }

    // aksi edit
    public function aksiEdit($id)
    {
        if ($_FILES['gambar']['name'] == "") {
            $getProduk = $this->m_laporan->getProduk($id);
            $data = [
                'nama' => htmlspecialchars($this->input->POST('nama')),
                'harga_jual' => htmlspecialchars($this->input->POST('harga_jual')),
                'harga_modal' => htmlspecialchars($this->input->POST('harga_modal')),
                'deskripsi' => htmlspecialchars($this->input->POST('deskripsi')),
                'gambar' => $getProduk[0]['gambar'],
                'date_created' => $getProduk[0]['date_created'],
                'date_modify' => time(),
				'id' => $id
            ];

            $this->m_laporan->editProduk($data);
            $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
            redirect('produk');
        } else {
            $this->_gambar();

            $getProduk = $this->m_laporan->getProduk($id);
            $this->_hapus($id);
            $data = [
                'nama' => htmlspecialchars($this->input->POST('nama')),
                'harga' => htmlspecialchars($this->input->POST('harga')),
                'deskripsi' => htmlspecialchars($this->input->POST('deskripsi')),
                'gambar' => $this->upload->data('file_name'),
                'date_created' => $getProduk[0]['date_created'],
                'date_modify' => time()
            ];

            $this->m_laporan->editProduk($id, $data);
            $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
            redirect('produk');

        }
    }
}
