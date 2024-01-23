<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('M_produk', 'M_produk', TRUE);
    }

    public function index()
    {   
        $data = array(  
            'judul' => 'Produk',
            'isi'   =>  'admin/produk/v_home',
            'produk' => $this->M_produk->allData(),
        );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenis_brg', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(  
                'judul' => 'Produk',
                'isi'   =>  'admin/produk/v_home',
                'produk' => $this->M_produk->allData(),
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            // die();
        }else{
            $tambah = [
                'nama_brg' => $this->input->post('nama_brg'),
                'jenis_brg' => $this->input->post('jenis_brg'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok')
            ];

            //insert to database
            $this->M_produk->add($tambah);
            $this->session->set_flashdata('success_message', 'Berhasil Menambahkan Data Produk');
            redirect(site_url().'produk');
        }
    }





}

/* End of file Admin.php */

