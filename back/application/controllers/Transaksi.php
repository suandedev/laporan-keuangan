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
}