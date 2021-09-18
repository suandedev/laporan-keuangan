<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Auth extends RestController
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();

		$this->load->model('M_api', 'api');

	}

	public  function index_get()
	{
		$username = $this->get('username');
		if($username != null) {
			$user = $this->api->getUser($username);
		} else {
			$user = $this->api->getUser();
		}

		if ($user) {
			$this->response( [
				'status' => true,
				'result' => $user,
				'message' => 'success'
			], 200 );
		} else {
			$this->response( [
				'status' => false,
				'message' => 'id not found'
			], 200 );
		}
	}

	public function index_post()
	{
		$data = [
			'nama' => $this->post('nama'),
			'username' => $this->post('username'),
			'email' => $this->post('email'),
			'password' => $this->post('password')
		];

		if ($this->api->createUsers($data) > 0) {
			//ok
			$this->response( [
				'status' => true,
				'result' => $data,
				'message' => 'new user has been created'
			], 200 );
		} else {
			//id not found
			$this->response( [
				'status' => false,
				'message' => 'faild to create new data'
			], 404 );
		}
	}

	public function index_put()
	{
		$id = $this->put('id');

		$data = [
			'nama' => $this->put('nama'),
			'username' => $this->put('username'),
			'email' => $this->put('email'),
			'password' => $this->put('password')
		];

		if ($this->api->updateUsers($data, $id) > 0) {
			//ok
			$this->response( [
				'status' => true,
				'result' => $data,
				'message' => 'data users has been updated'
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
