<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{	
		// $data = array(  
        //     'isi'   =>  'users/v_home',
		// );
		$this->load->view('users/v_home', FALSE);
	}
}
