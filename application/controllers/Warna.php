<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Warna extends CI_Controller {

    public $status;
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('M_warna', 'M_warna', TRUE);
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
                $data = array(  
                    'judul' => 'Warna',
                    'isi'   =>  'admin/warna/v_home',
                    'warna' => $this->M_warna->allData(),
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                redirect(site_url().'main/login/');
            }
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_warna', 'Nama Warna', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(  
                'judul' => 'Warna',
                'isi'   =>  'admin/warna/v_home',
                'warna' => $this->M_warna->allData(),
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            // die();
        }else{
            $upload_data = array();

            // Periksa apakah file diunggah
            if (!empty($_FILES['foto_warna']['name'])) {
                $config['upload_path'] = './foto_warna/';
                $config['allowed_types'] = 'jpg|png|jpeg'; // Sesuaikan jenis file yang diizinkan
                $config['max_size']  = 10000; 

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto_warna')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_message', $error['error']);
                    redirect('warna', 'refresh');
                } else {
                    $upload_data = $this->upload->data();
                     // Menghasilkan nama file acak
                    $nama_file_acak = random_string('alnum', 16); // Menghasilkan string acak dengan panjang 16 karakter
                    $ext = pathinfo($_FILES['foto_warna']['name'], PATHINFO_EXTENSION); // Mendapatkan ekstensi file yang diunggah
                    $nama_file_akhir = $nama_file_acak . '.' . $ext; // Menyatukan nama file acak dengan ekstensi

                    // Pindahkan file yang diunggah ke lokasi tujuan dengan nama yang diacak
                    rename($upload_data['full_path'], $config['upload_path'] . $nama_file_akhir);

                    // Simpan nama file acak ke dalam variabel untuk disimpan ke dalam database
                    $nama_file_disimpan = $nama_file_akhir;
                }
            }

            $tambah = [
                'nama_warna' => $this->input->post('nama_warna'),
                'foto_warna' => (!empty($nama_file_disimpan)) ? $nama_file_disimpan : null,
            ];

            //insert to database
            $this->M_warna->add($tambah);
            $this->session->set_flashdata('success_message', 'Berhasil Menambahkan Data Warna');
            redirect(site_url().'warna');
        }

    }

    public function edit() {
        // header('Content-Type: application/json');
        echo json_encode($this->M_warna->getData($_POST['id']));
    }

    public function update()
    {
        
        $this->form_validation->set_rules('nama_warna', 'Nama warna', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(  
                'judul' => 'Warna',
                'isi'   =>  'admin/warna/v_home',
                'warna' => $this->M_warna->allData(),
            );
            $this->load->view('admin/layout/v_wrapper', $data, FALSE);
        } else {
            $id_warna = $this->input->post('id_warna');
            $ambil = $this->M_warna->getData($id_warna);

            $name = './foto_warna/' . $ambil->foto_warna;
            $nama = '';
            $cek_file = $_FILES['foto_warna']['name'];
            // Jika ada file baru diunggah
            if (!empty($_FILES['foto_warna']['name'])) {
                 // Validasi tipe file
                $allowed_types = array('jpg', 'png', 'jpeg');
                $file_ext = pathinfo($_FILES['foto_warna']['name'], PATHINFO_EXTENSION);

                if (!in_array(strtolower($file_ext), $allowed_types)) {
                    $this->session->set_flashdata('error_message', 'Jenis file tidak diizinkan.');
                    redirect('warna', 'refresh');
                }

                // Validasi ukuran file
                $max_size = 10000; // dalam kilobyte
                $file_size = $_FILES['foto_warna']['size'];

                if ($file_size > $max_size * 1024) {
                    $this->session->set_flashdata('error_message', 'Ukuran file terlalu besar. Maksimum: ' . $max_size . ' KB.');
                    redirect('warna', 'refresh');
                }

                if (is_readable($name) && is_file($name) && unlink($name)) {
                    $config['upload_path'] = './foto_warna/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size']  = 10000;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    // var_dump($config);
                    // die();

                    if (!$this->upload->do_upload('foto_warna')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_message', $error['error']);
                        redirect('warna', 'refresh');
                    } else {
                        $upload_data = $this->upload->data();
                        $nama_file_acak = random_string('alnum', 16); // Menghasilkan string acak dengan panjang 16 karakter
                        $ext = pathinfo($_FILES['foto_warna']['name'], PATHINFO_EXTENSION); // Mendapatkan ekstensi file yang diunggah
                        $nama_file_akhir = $nama_file_acak . '.' . $ext; // Menyatukan nama file acak dengan ekstensi
    
                        // Pindahkan file yang diunggah ke lokasi tujuan dengan nama yang diacak
                        rename($upload_data['full_path'], $config['upload_path'] . $nama_file_akhir);
    
                        // Simpan nama file acak ke dalam variabel untuk disimpan ke dalam database
                        $nama = $nama_file_akhir;
                        // var_dump($nama);
                    }
                }else{
                    $config['upload_path'] = './foto_warna/';
                    $config['allowed_types'] = 'jpg|png|jpeg'; // Sesuaikan jenis file yang diizinkan
                    $config['max_size']  = 10000;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    // var_dump($config);
                    // die();

                    if (!$this->upload->do_upload('foto_warna')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_message', $error['error']);
                        var_dump($error['error']);
                        die();
                        redirect('warna', 'refresh');
                    } else {
                        $upload_data = $this->upload->data();
                        $nama_file_acak = random_string('alnum', 16); // Menghasilkan string acak dengan panjang 16 karakter
                        $ext = pathinfo($_FILES['foto_warna']['name'], PATHINFO_EXTENSION); // Mendapatkan ekstensi file yang diunggah
                        $nama_file_akhir = $nama_file_acak . '.' . $ext; // Menyatukan nama file acak dengan ekstensi
    
                        // Pindahkan file yang diunggah ke lokasi tujuan dengan nama yang diacak
                        rename($upload_data['full_path'], $config['upload_path'] . $nama_file_akhir);
    
                        // Simpan nama file acak ke dalam variabel untuk disimpan ke dalam database
                        $nama = $nama_file_akhir;
                    }
                }
            } else {
                // Jika tidak ada file baru diunggah, gunakan nama file yang ada
                $nama = $ambil->foto_warna;
            }

            $tambah = [
                'id_warna' => $id_warna,
                'nama_warna' => $this->input->post('nama_warna'),
                'foto_warna' => $nama
            ];

            $this->M_warna->edit($tambah);
            $this->session->set_flashdata('success_message', 'Berhasil Mengubah Data');
            redirect('warna', 'refresh');
        }
    }

    public function delete($id_warna)
    {
        $ambil = $this->M_warna->getData($id_warna);
        $cekKeranjang = $this->M_pemesanan->getWarna($id_warna);

        if($cekKeranjang){
            $this->session->set_flashdata('error_message', 'Warna Sedang Digunakan');
            redirect('warna ', 'refresh');
        } else {
            $name = './foto_warna/'.$ambil->foto_warna;
            
            // Hapus produk
            if(is_readable($name) && unlink($name)){
                $this->M_warna->delete($id_warna);

                $this->session->set_flashdata('success_message', 'Data Berhasil Dihapus');
                redirect('warna ', 'refresh');
            } else {
                echo "Hapus Gagal";
            }
        }
    }




}

/* End of file Admin.php */

