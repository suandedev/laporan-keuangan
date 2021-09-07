<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        
        $this->load->library('form_validation');
        
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['produk'] = $this->m_laporan->getProduk();
        $data['laporan'] = $this->m_laporan->getLaporan();
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('v_transaksi', $data);
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

    // hapus 
    public function hapus($id)
    {
        $this->m_laporan->hapusLaporan($id);

        $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
        redirect('transaksi');
    }

    // detail
    public function detail($id)
    {
        $data['title'] = 'Detail';
        $data['transaksi'] = $this->m_laporan->getLaporan($id);
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('v_detailTransaksi', $data);
        $this->load->view('footer');
    }

    // edit
    public function edit($id)
    {
        $data['title'] = 'Edit';
        $getData = $this->m_laporan->getLaporan($id);
        $data['produk'] = $this->m_laporan->getProduk();
        $data['id_produk'] = $getData[0]['id_produk'];
        $data['id'] = $getData[0]['id'];
        $data['jumlah'] = $getData[0]['jumlah'];
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('v_editTransaksi', $data);
        $this->load->view('footer');
    }

    // aksi edit
    public function aksiEdit($id)
    {
        $getLaporan = $this->m_laporan->getLaporan($id);
        $data = [
            'id_produk' => htmlspecialchars($this->input->post('id_produk')),
            'jumlah' => htmlspecialchars($this->input->post('jumlah')),
            'date_created' => $getLaporan[0]['date_created'],
            'date_modify' => time()
        ];

        $this->m_laporan->editLaporan($data, $id);
        $this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
        redirect('transaksi');
    }

}
