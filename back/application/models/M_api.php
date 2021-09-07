<?php 

class M_api extends CI_Model {

    protected $produk = 'produk';

    // get produk
    public function getProduk($id = null)
    {
        if($id != null) {
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
}