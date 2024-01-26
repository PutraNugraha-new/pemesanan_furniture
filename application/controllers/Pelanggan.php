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
        $data = array(  
            'judul' => 'Pelanggan',
            'isi'   =>  'admin/pelanggan/v_home',
            'pelanggan' => $this->user_model->allData()
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
}

/* End of file Admin.php */

