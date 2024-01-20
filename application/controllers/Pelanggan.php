<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function index()
    {
        $data = array(  
            'judul' => 'Pelanggan',
            'isi'   =>  'admin/pelanggan/v_home',
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

}

/* End of file Admin.php */

