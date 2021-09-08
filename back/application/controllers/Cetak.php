<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Cetak extends RestController {

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
            $cetak = $this->api->getCetak($id);
        } else {
            $cetak = $this->api->getCetak();
        }

        if ($cetak) {
			$this->response( [
				'status' => true,
				'result' => $cetak,
				'message' => 'success'
			], 200 );
		} else {
			$this->response( [
				'status' => false,
				'message' => 'id not found'
			], 404 );
		}
    }

    // add
    public function index_post()
    {
        $data = [
            'id_produk' => $this->post('id_produk'),
            'jumlah' => $this->post('jumlah'),
            'total_jual' => $this->post('total_jual'),
            'total_modal' => $this->post('total_modal'),
            'laba' => $this->post('laba'),
            'date_created' => time(),
            'date_modify' => time(),
        ];

        if ($this->api->createCetak($data) > 0) {
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
}