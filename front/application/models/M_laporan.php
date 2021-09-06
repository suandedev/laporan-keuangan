<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

    protected $laporan = 'laporan';
    protected $produk = 'produk';
    
    // join 
    protected $Jproduk;
    
    //select 
    protected $Sproduk;
    
    public function __construct()
    {
        parent::__construct();
        // select
        $this->Sproduk = "$this->laporan.id, $this->produk.nama, $this->produk.harga, $this->laporan.jumlah, $this->laporan.date_created, $this->laporan.date_modify,";

        //join
        $this->Jproduk = "$this->produk.id = $this->laporan.id_produk";
    }
    
    // get laporan
    public function getLaporan( $id = null)
    {
        if($id != null) {
            $this->db->where(['id' => $id]);
        }
        $this->db->select($this->Sproduk);
        $this->db->join($this->produk, $this->Jproduk);
        return $this->db->get($this->laporan)->result_array();
    }

    // get produk
    public function getProduk($id = null) 
    {
        if($id != null) {
            $this->db->where(['id' => $id]);
        }
        return $this->db->get($this->produk)->result_array();
    }

    // add produk
    public function addProduk()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->POST('nama')),
            'harga' => htmlspecialchars($this->input->POST('harga')),
            'deskripsi' => htmlspecialchars($this->input->POST('deskripsi')),
            'date_created' => time(),
            'date_modify' => time()
        ];

        $this->db->insert($this->produk, $data);
    }

}