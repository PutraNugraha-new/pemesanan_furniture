<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('M_produk', 'M_produk', TRUE);
        $this->load->model('M_keranjang', 'M_keranjang', TRUE);
        $this->load->model('M_galeri', 'M_galeri', TRUE);
        $this->load->model('M_riwayat', 'M_riwayat', TRUE);
        $this->load->model('M_pemesanan', 'M_pemesanan', TRUE);
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
                $pemesanan = $this->M_pemesanan->getChartData();

                // Siapkan data untuk ditampilkan di view
                $chart_data = [];
                foreach ($pemesanan as $row) {
                    $bulan_tahun = $row['bulan'] . '/' . $row['tahun'];
                    $chart_data[$bulan_tahun] = $row['total'];
                    // var_dump($row);
                }
                // die();
                $data['labels'] = json_encode(array_keys($chart_data));
                $data['values'] = json_encode(array_values($chart_data));
    
                // Load view untuk menampilkan chart
                $data['judul'] = 'Laporan';
                $data['isi'] = 'admin/laporan/v_home';
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                redirect(site_url().'main/login/');
            }
        }
    }

}

/* End of file Admin.php */

