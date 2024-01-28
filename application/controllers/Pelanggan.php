<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public $status;
    public $roles;

    function __construct(){
        parent::__construct();
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
                    'judul' => 'Pelanggan',
                    'isi'   =>  'admin/pelanggan/v_home',
                    'pelanggan' => $this->user_model->allData()
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                redirect(site_url().'main/login/');
            }
        }
    }
}

/* End of file Admin.php */

