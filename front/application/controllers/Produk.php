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
        

        if($this->m_laporan->addProduk()) {
            redirect('produk');
        } else {
            redirect('produk');
        }
    }
}
