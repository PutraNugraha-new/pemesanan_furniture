<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public $status;
    public $roles;

	function __construct(){
        parent::__construct();
        $this->load->model('M_produk', 'M_produk', TRUE);
		$this->load->model('User_model', 'user_model', TRUE);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
        $this->load->library('userlevel');
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
		$data = $this->session->userdata;
	    if(empty($data)){
	        redirect(site_url().'main/login/');
	    }

	    //check user level
	    if(empty($data['role'])){
	        redirect(site_url().'main/login/');
	    }
	    $dataLevel = $this->userlevel->checkLevel($data['role']);
	    //check user level
        
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'main/login/');
        }else{
			if($dataLevel == 'is_user'){
				$data = array(
					'isi' => 'users/v_riwayat'
				);
				$this->load->view('users/layout/v_wrapper', $data, FalSE);
			}else{
				redirect(site_url().'main/login/');
			}
		}
	}

	public function profile(){
		//user data from session
	    $data = $this->session->userdata;
	    if(empty($data)){
	        redirect(site_url().'main/login/');
	    }

	    //check user level
	    if(empty($data['role'])){
	        redirect(site_url().'main/login/');
	    }
	    $dataLevel = $this->userlevel->checkLevel($data['role']);
	    //check user level
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'main/login/');
        }else{
			if($dataLevel == 'is_user'){
				$data =array(
					'isi' => 'users/v_profile',
					'datauser' => $this->session->userdata
				);
				$this->load->view('users/layout/v_wrapper', $data, FALSE);
			}else{
				redirect(site_url().'main/login/');
			}
		}
	}
}
