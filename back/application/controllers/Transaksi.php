<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Transaksi extends RestController {

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
			$transaksi = $this->api->getTransaksi($id);
		} else {
			$transaksi = $this->api->getTransaksi();
		}

		if ($transaksi) {
			$this->response( [
				'status' => true,
				'result' => $transaksi,
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
			if ($this->api->deteleTransaksi($id) > 0) {
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

    //add
    public function index_post()
    {
        $data = [
            'id_produk' => $this->post('id_produk'),
            'jumlah' => $this->post('jumlah'),
            'date_created' => time(),
            'date_modify' => time(),
        ];

        if ($this->api->createTransaksi($data) > 0) {
			//ok
			$this->response( [
				'status' => true,
				'result' => $data,
				'message' => 'new Transaksi has been created'
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
            'total_jual' => $this->put('total_jual'),
            'total_modal' => $this->put('total_modal'),
            'laba' => $this->put('laba')
        ];

        if ($this->api->updateTransaksi($data, $id) > 0) {
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
