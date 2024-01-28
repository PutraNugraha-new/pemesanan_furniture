<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
    }

    public function index()
    {
        $data = array(  
            'judul' => 'Pemesanan',
            'isi'   =>  'admin/pemesanan/v_home',
            'riwayat' => $this->M_riwayat->get_pesanan_produk_userAll()
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
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

}

/* End of file Admin.php */

