<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('header',$data);
        $this->load->view('sidebar',$data);
        $this->load->view('v_transaksi',$data);
        $this->load->view('footer');
    }
}
