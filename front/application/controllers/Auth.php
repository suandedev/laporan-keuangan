<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');

	}


	public function  index()
	{
		if ($this->session->userdata('username')) {
			redirect('transaksi');
		}

		$this->form_validation->set_rules(
			'username',
			'Username',
			'trim|required',
			[
				'required' => 'username tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'trim|required|min_length[6]|max_length[16]',
			[
				'required' => 'password tidak boleh kosong',
				'minlength' => 'minimal 6 karakter',
				'maxlength' => 'maksimal 16 karakter'
			]
		);

		$this->form_validation->set_error_delimiters('<p class="text-danger" >', '</p>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login';
//		$data['laporan'] = $this->m_laporan->authLogin();
			$this->load->view('header', $data);
			$this->load->view('v_login', $data);
			$this->load->view('footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));

//		$hash = password_hash($password, PASSWORD_DEFAULT);
//		var_dump($hash);
//		die();

		$user = $this->m_laporan->getUsers($username);

		if ($user != null) {
			if (password_verify($password, $user[0]['password'])) {
				$data = [
					'username' => $user[0]['username'],
					'email' => $user[0]['email']
				];
				$this->session->set_userdata($data);
				redirect('transaksi');
			} else {
				$this->session->set_flashdata('pesan1', '<div class="alert alert-danger" role="alert">password tidak cocok!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan1', '<div class="alert alert-danger" role="alert">username tidak cocok!</div>');
			redirect('auth');
		}
	}

//	logout
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">berhasil logout!</div>');
		redirect('auth');
	}

	public function changePassword()
	{
		$this->form_validation->set_rules(
			'username',
			'Username',
			'trim|required',
			[
				'required' => 'username tidak boleh kosong',
			]
		);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'trim|required|min_length[6]|max_length[16]|matches[password2]',
			[
				'required' => 'password tidak boleh kosong',
				'minlength' => 'minimal 6 karakter',
				'maxlength' => 'maksimal 16 karakter',
				'matches' => 'pasword tidak sama'
			]
		);

		$this->form_validation->set_rules(
			'password2',
			'Password2',
			'trim|required|min_length[6]|max_length[16]|matches[password]',
			[
				'required' => 'password tidak boleh kosong',
				'minlength' => 'minimal 6 karakter',
				'maxlength' => 'maksimal 16 karakter'
			]
		);

		$this->form_validation->set_error_delimiters('<p class="text-danger" >', '</p>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Ganti Password';
//		$data['laporan'] = $this->m_laporan->authLogin();
			$this->load->view('header', $data);
			$this->load->view('sidebar', $data);
			$this->load->view('v_changePassword', $data);
			$this->load->view('footer');
		} else {
			$username  = htmlspecialchars($this->input->post('username'));
			$password  = htmlspecialchars($this->input->post('password'));
			$hash = password_hash($password, PASSWORD_DEFAULT);

			$getUser = $this->m_laporan->getUsers($username);

			if ($username == $getUser[0]['username']) {

				$data = [
					'nama' => $getUser[0]['nama'],
					'username' => $getUser[0]['username'],
					'email' => $getUser[0]['email'],
					'password' => $hash,
					'id' => $getUser[0]['id']
				];

				$this->m_laporan->changePassword($data);
				$this->session->set_flashdata('pesan1', '<div class="alert alert-success" role="alert">password Berhasil diubah!</div>');
				redirect('auth/changePassword');
			} else {
				echo "false";
			}
		}
	}
}
