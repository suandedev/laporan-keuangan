<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Produk extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        
        $this->load->model('M_api', 'api');
        
    }

    // get
    public function index_get()
    {
        $id = $this->get('id');
        if($id != null) {
            $produk = $this->api->getProduk($id);
        } else {
            $produk = $this->api->getProduk();
        }

        if ($produk) {
			$this->response( [
				'status' => true,
				'result' => $produk,
				'message' => 'success'
			], 200 );
		} else {
			$this->response( [
				'status' => false,
				'message' => 'id not found'
			], 404 );
		}
    }

    // delete
    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
			$this->response( [
				'status' => false,
				'result' => "error",
				'message' => 'provide an id'
			], 404 );
		} else {
			if ($this->api->deteleProduk($id) > 0) {
				//ok
				$this->response( [
					'status' => true,
					'message' => 'deletes'
				], 200 );
			} else {
				//id not found
				$this->response( [
					'status' => false,
					'message' => 'id not found'
				], 404 );
			}
		}
    }

    // add
    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'harga_jual' => $this->post('harga_jual'),
            'harga_modal' => $this->post('harga_modal'),
            'deskripsi' => $this->post('deskripsi'),
            'gambar' => $this->post('gambar'),
            'date_created' => time(),
            'date_modify' => time(),
        ];

        if ($this->api->createProduk($data) > 0) {
			//ok
			$this->response( [
				'status' => true,
				'result' => $data,
				'message' => 'new produk has been created'
			], 200 );
		} else {
			//id not found
			$this->response( [
				'status' => false,
				'message' => 'faild to create new data'
			], 404 );
		}
    }

    // update
    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'nama' => $this->put('nama'),
            'harga_jual' => $this->put('harga_jual'),
            'harga_modal' => $this->put('harga_modal'),
            'deskripsi' => $this->put('deskripsi'),
            'gambar' => $this->put('gambar'),
            'date_created' => $this->put('date_created'),
            'date_modify' => time(),
        ];

        if ($this->api->updateProduk($data, $id) > 0) {
			//ok
			$this->response( [
				'status' => true,
				'result' => $data,
				'message' => 'data Produk has been updated'
			], 200 );
		} else {
			//id not found
			$this->response( [
				'status' => false,
				'message' => 'faild to update data'
			], 404 );
		}
    }
}
