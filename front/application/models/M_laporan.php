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
		if ($id != null) {
			$response = $this->_client->request('GET', 'transaksi', [
				'query' => [
					'id' => $id
				]
			]);
		} else {
			$response = $this->_client->request('GET', 'transaksi');
		}

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['result'];
    }

    // add laporan
    public function addLaporan($data)
    {

		$response = $this->_client->request('POST', 'transaksi', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
    }

    // hapus laporan
    public function hapusLaporan($id)
    {
		$response = $this->_client->request('DELETE','transaksi', [
			'form_params' => [
				'id' => $id,
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
    }

    // edit laporan
    public function editLaporan($data)
    {
		$response = $this->_client->request('PUT', 'transaksi', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
    }

    // get produk
    public function getProduk($id = null)
    {
    	if ($id != null) {
			$response = $this->_client->request('GET', 'produk', [
				'query' => [
					'id' => $id
				]
			]);
		} else {
			$response = $this->_client->request('GET', 'produk');
		}

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['result'];
    }

    // add produk
    public function addProduk($data)
    {
		$response = $this->_client->request('POST', 'produk', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
    }

    // hapus produk
    public function hapusProduk($id)
    {
		$response = $this->_client->request('DELETE','produk', [
			'form_params' => [
				'id' => $id,
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
    }

    // edit produk
    public function editProduk($data)
    {
		$response = $this->_client->request('PUT', 'produk', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
    }

    // cetak laporan 
    public function cetakLaporan($data)
    {
		$response = $this->_client->request('POST', 'cetak', [
			'form_params' => $data
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
    }

    // get cetak
    public function getCetak()
    {
		$response = $this->_client->request('GET', 'cetak');

		$result = json_decode($response->getBody()->getContents(), true);

		return $result['result'];
    }

//    delete ceetak laporan
	public  function deteleAllCetakLaporan($id)
	{
		$response = $this->_client->request('DELETE','cetak', [
			'form_params' => [
				'id' => $id,
			]
		]);

		$result = json_decode($response->getBody()->getContents(), true);
		return $result;
	}

}
