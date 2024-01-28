<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public $status;
    public $roles;

	function __construct(){
        parent::__construct();
        $this->load->model('M_produk', 'M_produk', TRUE);
        $this->load->model('M_keranjang', 'M_keranjang', TRUE);
        $this->load->model('M_galeri', 'M_galeri', TRUE);
        $this->load->model('M_pemesanan', 'M_pemesanan', TRUE);
        $this->load->model('M_riwayat', 'M_riwayat', TRUE);
		$this->load->model('User_model', 'user_model', TRUE);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status');
        $this->roles = $this->config->item('roles');
        $this->load->library('userlevel');
    }

    public function index()
    {
        $data = $this->session->userdata;
	    if(empty($data)){
	        redirect(site_url().'login/login/');
	    }

	    //check user level
	    if(empty($data['role'])){
	        redirect(site_url().'login/login/');
	    }
	    $dataLevel = $this->userlevel->checkLevel($data['role']);
	    //check user level
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'login/login/');
        }else{
			if($dataLevel == 'is_admin'){
                $data = array(  
                    'judul' => 'Dashboard',
                    'isi'   =>  'admin/dashboard/v_home',
                    'produk' => $this->M_produk->getCountData(),
                    'pengguna' => $this->user_model->getCountData(),
                    'pemesanan' => $this->M_pemesanan->getCountData(),
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                redirect(site_url().'main/login/');
            }
        }
    }

}

/* End of file Admin.php */

