<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class M_laporan extends CI_Model
{

    private $_client;

    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://localhost/laporan-keuangan/back/',
//            'auth' => ['admin', '1234']
        ]);
    }

    // get laporan
    public function getLaporan($id = null)
    {
		$response = $this->_client->request('GET', 'transaksi', [
//			'query' => [
////				'X-API-KEY' => 'made123'
//			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['result'];
    }


    // add laporan
    public function addLaporan($data)
    {

//        $this->db->insert($this->laporan, $data);
    }

    // hapus laporan
    public function hapusLaporan($id)
    {

//        $this->db->delete($this->laporan, ['id' => $id]);
    }

    // edit laporan
    public function editLaporan($data, $id)
    {

//        $this->db->update($this->laporan, $data, ['id' => $id]);
    }

    // get produk
    public function getProduk($id = null)
    {
//        if ($id != null) {
//            $this->db->where(['id' => $id]);
//        }
//
////        $this->db->order_by($this->Bproduk, 'desc');
//
//        return $this->db->get($this->produk)->result_array();
    }

    // add produk
    public function addProduk($data)
    {
//        $this->db->insert($this->produk, $data);
    }

    // hapus produk
    public function hapusProduk($id)
    {
//        $this->db->delete($this->produk, ['id' => $id]);
    }

    // edit produk
    public function editProduk($id, $data)
    {
//        $this->db->update($this->produk, $data, ['id' => $id]);
    }

    // cetak laporan 
    public function cetakLaporan($data)
    {

//        $this->db->insert($this->cetak_laporan, $data);
    }

    // get cetak
    public function getCetak()
    {
        
//        $this->db->order_by($this->Bcetak, 'desc');
        
//        $this->db->join($this->produk, $this->Jcetak);
//        return $this->db->get($this->cetak_laporan)->result_array();
    }
}
