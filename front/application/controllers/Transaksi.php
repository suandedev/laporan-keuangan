<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        
    }
    

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['produk'] = $this->m_laporan->getProduk();
        $data['laporan'] = $this->m_laporan->getLaporan();
        $this->load->view('header',$data);
        $this->load->view('sidebar',$data);
        $this->load->view('v_transaksi',$data);
        $this->load->view('footer');
    }

    // add laporan
    public function add()
    {
        $data = [
            'id_produk' => htmlspecialchars($this->input->post('id_produk')),        
            'jumlah' => htmlspecialchars($this->input->post('jumlah')),            
            'date_created' => time(),            
            'date_modify' => time(),            
        ];

        $this->m_laporan->addLaporan($data);
        $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
            redirect('transaksi');
    }
}
