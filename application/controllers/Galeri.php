<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
    public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('M_produk', 'M_produk', TRUE);
        $this->load->model('M_keranjang', 'M_keranjang', TRUE);
        $this->load->model('M_galeri', 'M_galeri', TRUE);
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
            'judul' => 'Galeri',
            'isi'   =>  'admin/galeri/v_home',
            'produk' => $this->M_produk->allData(),
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function tambah($id_produk){

        $data = array(  
            'judul' => 'Galeri',
            'isi'   =>  'admin/galeri/v_tambah',
            'id' => $id_produk,
            'galeri' => $this->M_galeri->getData($id_produk)
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {   
        $id_produk = $this->input->post('id_produk');
        $foto = $_FILES['nama_foto']['name'];

            $upload_data = array();

            // Periksa apakah file diunggah
            if (!empty($_FILES['nama_foto']['name'])) {
                $config['upload_path'] = './foto_produk/';
                $config['allowed_types'] = 'jpg|png|jpeg'; // Sesuaikan jenis file yang diizinkan
                $config['max_size']  = 10000; 

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('nama_foto')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_message', $error['error']);
                    redirect('galeri/tambah/'.$id_produk, 'refresh');
                } else {
                    $upload_data = $this->upload->data();
                }
            }
            $tambah = [
                'id_produk' => $this->input->post('id_produk'),
                'nama_foto' => (!empty($upload_data)) ? $upload_data['file_name'] : null,
            ];

            //insert to database
            $this->M_galeri->add($tambah);
            $this->session->set_flashdata('success_message', 'Berhasil Menambahkan Data Produk');
            redirect(site_url().'galeri/tambah/'.$id_produk);

    }

}

/* End of file Admin.php */

