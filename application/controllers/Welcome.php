<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public $status;
    public $roles;

	function __construct(){
        parent::__construct();
        $this->load->model('M_produk', 'M_produk', TRUE);
        $this->load->model('M_keranjang', 'M_keranjang', TRUE);
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
					'isi'=> 'users/v_pemesanan',
					'pemesanan' => $this->M_keranjang->getData($data['id'])
				);
				$this->load->view('users/layout/v_wrapper', $data, FALSE);
			}else{
				redirect(site_url().'main/login/');
			}
		}
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

	public function add_to_cart(){
        $id_produk = $this->input->post('id');
    
        // Panggil model atau metode yang diperlukan untuk mengambil data produk
        $productData = $this->M_produk->getData($id_produk);

        if($productData){
            $cartData = array(
                'id' => $this->session->userdata['id'],
                'id_produk' => $id_produk,
                'kuantitas' => 1
            );
    
            $this->M_keranjang->add($cartData);
            echo json_encode(['status' => 'success']);
        }else {
            // Produk tidak ditemukan, kirim respons JSON dengan pesan error
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Product not found']);
        }
    }
}
