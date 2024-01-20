<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function index()
    {
        $data = array(  
            'judul' => 'Laporan',
            'isi'   =>  'admin/laporan/v_home',
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

}

/* End of file Admin.php */

