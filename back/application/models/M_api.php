<?php

class M_api extends CI_Model
{

    protected $laporan = 'laporan';
    protected $produk = 'produk';
    protected $cetak_laporan = 'cetak_laporan';

    // join 
    protected $Jproduk;
    protected $Jcetak;

    //select 
    protected $Sproduk;

    // order by
    protected $Blaporan;
    protected $Bproduk;
    protected $Bcetak;

    // construct
    public function __construct()
    {
        parent::__construct();

        // select
        $this->Sproduk = "$this->laporan.id, $this->laporan.id_produk, $this->produk.nama, $this->produk.harga_jual, $this->produk.harga_modal, $this->produk.gambar, $this->laporan.jumlah, $this->laporan.total_jual, $this->laporan.total_modal, $this->laporan.laba, $this->laporan.date_created, $this->laporan.date_modify,";

        //join
        $this->Jproduk = "$this->produk.id = $this->laporan.id_produk";
        $this->Jcetak = "$this->produk.id = $this->cetak_laporan.id_produk";

        // ordey by
        $this->Blaporan = "$this->laporan.id";
        $this->Bproduk = "$this->produk.id";
        $this->Bcetak = "$this->cetak_laporan.id";
    }

    // get produk
    public function getProduk($id = null)
    {
        if ($id != null) {
            $this->db->where(['id' => $id]);
        }

        $this->db->order_by($this->Bproduk, 'desc');

        return $this->db->get($this->produk)->result_array();
    }

    // delete produk
    public function deteleProduk($id)
    {
        $this->db->delete($this->produk, ['id' => $id]);
        return $this->db->affected_rows();
    }

    // create produk
    public function createProduk($data)
    {
        $this->db->insert($this->produk, $data);
        return $this->db->affected_rows();
    }

    // update
    public function updateProduk($data, $id)
    {
        $this->db->update($this->produk, $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    // get transaksi
    public function getTransaksi($id = null)
    {
        if ($id != null) {
            $this->db->where("$this->laporan.id", $id);
        }
        $this->db->select($this->Sproduk);
        $this->db->join($this->produk, $this->Jproduk);
        $this->db->order_by($this->Blaporan, 'DESC');
        return $this->db->get($this->laporan)->result_array();
    }

    // delete transaksi
    public function deteleTransaksi($id)
    {
        
        $this->db->delete($this->laporan, ['id' => $id]);
        
        return $this->db->affected_rows();
        
        
    }

    // insert transaksi
    public function createTransaksi($data)
    {
        
        $this->db->insert($this->laporan, $data);
        return $this->db->affected_rows();
        
    }

    // update transaksi
    public function updateTransaksi($data, $id)
    {
        
        $this->db->update($this->laporan, $data, ['id' => $id]);
        
        
        return $this->db->affected_rows();
        
    }

    // get cetak transaksi
    public function getCetak($id = null)
    {
        $this->db->order_by($this->Bcetak, 'desc');
        
        $this->db->join($this->produk, $this->Jcetak);
        return $this->db->get($this->cetak_laporan)->result_array();
    }

    // insert cetak laporan
    public function createCetak($data)
    {
        $this->db->insert($this->cetak_laporan, $data);
        return $this->db->affected_rows();
    }
}
