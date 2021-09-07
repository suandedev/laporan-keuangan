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
}
