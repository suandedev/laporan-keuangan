<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
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
            'harga',
            'Harga',
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
            $data['laporan'] = $this->m_laporan->getProduk();
            $this->load->view('header', $data);
            $this->load->view('sidebar', $data);
            $this->load->view('v_formProduk', $data);
            $this->load->view('footer');
        } else {
            $this->m_laporan->addProduk();
            $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
            redirect('produk');
        }
    }

    // hapus produk
    public function hapus($id)
    {
        $this->m_laporan->hapusProduk($id);
        $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('produk');
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
}
