<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

    protected $laporan = 'laporan';
    protected $produk = 'produk';
    
    // join 
    protected $Jproduk;
    
    //select 
    protected $Sproduk;

    // order by
    protected $Blaporan;
    
    // construct
    public function __construct()
    {
        parent::__construct();
        
        // select
        $this->Sproduk = "$this->laporan.id, $this->produk.nama, $this->produk.harga, $this->laporan.jumlah, $this->laporan.date_created, $this->laporan.date_modify,";

        //join
        $this->Jproduk = "$this->produk.id = $this->laporan.id_produk";

        // ordey by
        $this->Blaporan = "$this->laporan.id";
    }
    
    // get laporan
    public function getLaporan( $id = null)
    {
        if($id != null) {
            $this->db->where(['id' => $id]);
        }
        $this->db->select($this->Sproduk);
        $this->db->join($this->produk, $this->Jproduk);
        $this->db->order_by($this->Blaporan, 'DESC');
        return $this->db->get($this->laporan)->result_array();
    }

    // add laporan
    public function addLaporan($data)
    {
        
        $this->db->insert($this->laporan, $data);
        
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
    public function addProduk($data)
    {
        $this->db->insert($this->produk, $data);
    }

    // hapus produk
    public function hapusProduk($id)
    {
        $this->db->delete($this->produk, ['id' => $id]);   
    }

    // edit produk
    public function editProduk($id, $data)
    {
        $this->db->update($this->produk, $data, ['id' => $id]);
    }

}