<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;
require_once FCPATH . 'vendor/autoload.php';

class Pemesanan extends CI_Controller {
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

        $options = new Options();
        $options->set('defaultFont', 'Times New Roman');
        $dompdf = new Dompdf($options);
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
                    'judul' => 'Pemesanan',
                    'isi'   =>  'admin/pemesanan/v_home',
                    'riwayat' => $this->M_riwayat->get_pesanan_produk_userAll()
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                redirect(site_url().'main/login/');
            }
        }
        
    }

    public function updateProses(){
        if ($this->input->is_ajax_request()) {
            $id_detail = $this->input->post('id');
            $status = $this->input->post('status');

            // Panggil model untuk mengupdate jumlah di database
            $this->M_pemesanan->updateStatus($id_detail, $status);

            // Kirim tanggapan ke klien (jika diperlukan)
            echo json_encode(['status' => 'success']);
        } else {
            // Tanggapan jika bukan permintaan Ajax
            show_404();
        }
    }


    public function cetakLaporan(){
        $data = $this->session->userdata;
        if(empty($data)){
            redirect(site_url().'main/login/');
        }
    
        //check user level
        if(empty($data['role'])){
            redirect(site_url().'main/login/');
        }
        $dataLevel = $this->userlevel->checkLevel($data['role']);
        // var_dump($dataLevel);
        // die();
        //check user level
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'main/login/');
        }else{
            if($dataLevel == "is_admin"){
                // Kondisi default jika tidak ada form yang terisi
                $data = array(
                    'pemesanan' => $this->M_riwayat->get_pesanan_produk_userAll(),
                );
                // Load library Dompdf
                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isPhpEnabled', true);
                $options->set('isRemoteEnabled', true);
        
                $dompdf = new Dompdf($options);
        
                $html = $this->load->view('admin/pemesanan/cetakLaporan', $data, true);
                $dompdf->loadHtml($html);
        
                $dompdf->setPaper('A4', 'landscape');
        
                // Render PDF (stream to browser atau save ke file)
                $dompdf->render();
                $dompdf->stream('laporan.pdf', array('Attachment' => 0));
            }else{
                redirect('dashboard','refresh');
            }
        }
    }

}

/* End of file Admin.php */

