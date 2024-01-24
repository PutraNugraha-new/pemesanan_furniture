<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('M_produk', 'M_produk', TRUE);
    }

	public function index()
	{	
		$data = array(  
            'isi'   =>  'users/v_home',
			'produk' => $this->M_produk->allData(),
		);
		$this->load->view('users/layout/v_wrapper', $data, FALSE);
	}

	public function produk(){
		$data = array(
			'isi' => 'users/v_produk',
			'produk' => $this->M_produk->allData(),
		);
		$this->load->view('users/layout/v_wrapper', $data, FALSE);
	}

	public function pemesanan(){
		$data = array(
			'isi'=> 'users/v_pemesanan'
		);
		$this->load->view('users/layout/v_wrapper', $data, FALSE);
	}

	public function riwayat(){
		$data = array(
			'isi' => 'users/v_riwayat'
		);
		$this->load->view('users/layout/v_wrapper', $data, FalSE);
	}

	public function profile(){
		$data =array(
			'isi' => 'users/v_profile'
		);
		$this->load->view('users/layout/v_wrapper', $data, FALSE);
	}
}
