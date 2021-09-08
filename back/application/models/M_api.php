<?php

class M_api extends CI_Model
{

    protected $produk = 'produk';
    protected $laporan = 'laporan';

    // get produk
    public function getProduk($id = null)
    {
        if ($id != null) {
            $this->db->where("$this->produk.id", $id);
        }
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
}
