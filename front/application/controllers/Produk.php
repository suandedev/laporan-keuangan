<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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

    public function addProduk()
    {

        $this->form_validation->set_rules(
            'produk',
            'Produk',
            'trim|required',
            [
                'required' => 'produk tidak boleh kosong',
            ]
        );
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
            $this->load->view('v_produk', $data);
            $this->load->view('footer');
        } else {
            return true;
            die;
            if ($this->m_laporan->addProduk()) {
                redirect('produk');
            } else {
                redirect('produk');
            }
        }
    }
}
