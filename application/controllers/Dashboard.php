<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $data = array(  
            'judul' => 'Dashboard',
            'isi'   =>  'admin/dashboard/v_home',
    );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

}

/* End of file Admin.php */

