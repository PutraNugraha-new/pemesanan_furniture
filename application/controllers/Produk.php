<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
                    'judul' => 'Produk',
                    'isi'   =>  'admin/produk/v_home',
                    'produk' => $this->M_produk->allData(),
                );
                $this->load->view('admin/layout/v_wrapper', $data, FALSE);
            }else{
                redirect(site_url().'main/login/');
            }
        }
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenis_brg', 'Jenis Barang', 'required');
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
            $upload_data = array();

            // Periksa apakah file diunggah
            if (!empty($_FILES['foto_brg']['name'])) {
                $config['upload_path'] = './foto_produk/';
                $config['allowed_types'] = 'jpg|png|jpeg'; // Sesuaikan jenis file yang diizinkan
                $config['max_size']  = 10000; 

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto_brg')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error_message', $error['error']);
                    redirect('produk', 'refresh');
                } else {
                    $upload_data = $this->upload->data();
                     // Menghasilkan nama file acak
                    $nama_file_acak = random_string('alnum', 16); // Menghasilkan string acak dengan panjang 16 karakter
                    $ext = pathinfo($_FILES['foto_brg']['name'], PATHINFO_EXTENSION); // Mendapatkan ekstensi file yang diunggah
                    $nama_file_akhir = $nama_file_acak . '.' . $ext; // Menyatukan nama file acak dengan ekstensi

                    // Pindahkan file yang diunggah ke lokasi tujuan dengan nama yang diacak
                    rename($upload_data['full_path'], $config['upload_path'] . $nama_file_akhir);

                    // Simpan nama file acak ke dalam variabel untuk disimpan ke dalam database
                    $nama_file_disimpan = $nama_file_akhir;
                }
            }
            $tinggi_input = $this->input->post('tinggi');
            $lebar_input = $this->input->post('lebar');
            $harga_permeter = floatval($this->input->post('harga_permeter'));

            $tinggi = floatval(str_replace(',', '.', $tinggi_input));
            $lebar = floatval(str_replace(',', '.', $lebar_input));

            // Validasi bahwa input adalah nilai numerik
            if (!is_numeric($tinggi) || !is_numeric($lebar) || !is_numeric($harga_permeter)) {
                echo "Input harus berupa nilai numerik.";
                return;
            }

            $total_ukuran = $tinggi * $lebar;
            $harga = $total_ukuran * $harga_permeter;
            $formatted_total_harga = number_format($harga, 0, ',', '.');

            $tambah = [
                'nama_brg' => $this->input->post('nama_brg'),
                'jenis_brg' => $this->input->post('jenis_brg'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $formatted_total_harga,
                'harga_permeter' => $harga_permeter,
                'tinggi' => $tinggi,
                'lebar' => $lebar,
                'stok' => $this->input->post('stok'),
                'foto_brg' => (!empty($nama_file_disimpan)) ? $nama_file_disimpan : null,
            ];

            //insert to database
            $this->M_produk->add($tambah);
            $this->session->set_flashdata('success_message', 'Berhasil Menambahkan Data Produk');
            redirect(site_url().'produk');
        }

    }

    public function edit() {
        // header('Content-Type: application/json');
        echo json_encode($this->M_produk->getData($_POST['id']));
    }

    public function update()
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
        } else {
            $id_produk = $this->input->post('id_produk');
            $ambil = $this->M_produk->getData($id_produk);

            $name = './foto_produk/' . $ambil->foto_brg;
            $nama = '';
            $cek_file = $_FILES['foto_brg']['name'];
            // Jika ada file baru diunggah
            if (!empty($_FILES['foto_brg']['name'])) {
                 // Validasi tipe file
                $allowed_types = array('jpg', 'png', 'jpeg');
                $file_ext = pathinfo($_FILES['foto_brg']['name'], PATHINFO_EXTENSION);

                if (!in_array(strtolower($file_ext), $allowed_types)) {
                    $this->session->set_flashdata('error_message', 'Jenis file tidak diizinkan.');
                    redirect('produk', 'refresh');
                }

                // Validasi ukuran file
                $max_size = 10000; // dalam kilobyte
                $file_size = $_FILES['foto_brg']['size'];

                if ($file_size > $max_size * 1024) {
                    $this->session->set_flashdata('error_message', 'Ukuran file terlalu besar. Maksimum: ' . $max_size . ' KB.');
                    redirect('produk', 'refresh');
                }

                if (is_readable($name) && is_file($name) && unlink($name)) {
                    $config['upload_path'] = './foto_produk/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size']  = 10000;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    // var_dump($config);
                    // die();

                    if (!$this->upload->do_upload('foto_brg')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_message', $error['error']);
                        redirect('produk', 'refresh');
                    } else {
                        $upload_data = $this->upload->data();
                        $nama_file_acak = random_string('alnum', 16); // Menghasilkan string acak dengan panjang 16 karakter
                        $ext = pathinfo($_FILES['foto_brg']['name'], PATHINFO_EXTENSION); // Mendapatkan ekstensi file yang diunggah
                        $nama_file_akhir = $nama_file_acak . '.' . $ext; // Menyatukan nama file acak dengan ekstensi
    
                        // Pindahkan file yang diunggah ke lokasi tujuan dengan nama yang diacak
                        rename($upload_data['full_path'], $config['upload_path'] . $nama_file_akhir);
    
                        // Simpan nama file acak ke dalam variabel untuk disimpan ke dalam database
                        $nama = $nama_file_akhir;
                        // var_dump($nama);
                    }
                }else{
                    $config['upload_path'] = './foto_produk/';
                    $config['allowed_types'] = 'jpg|png|jpeg'; // Sesuaikan jenis file yang diizinkan
                    $config['max_size']  = 10000;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    // var_dump($config);
                    // die();

                    if (!$this->upload->do_upload('foto_brg')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_message', $error['error']);
                        var_dump($error['error']);
                        die();
                        redirect('produk', 'refresh');
                    } else {
                        $upload_data = $this->upload->data();
                        $nama_file_acak = random_string('alnum', 16); // Menghasilkan string acak dengan panjang 16 karakter
                        $ext = pathinfo($_FILES['foto_brg']['name'], PATHINFO_EXTENSION); // Mendapatkan ekstensi file yang diunggah
                        $nama_file_akhir = $nama_file_acak . '.' . $ext; // Menyatukan nama file acak dengan ekstensi
    
                        // Pindahkan file yang diunggah ke lokasi tujuan dengan nama yang diacak
                        rename($upload_data['full_path'], $config['upload_path'] . $nama_file_akhir);
    
                        // Simpan nama file acak ke dalam variabel untuk disimpan ke dalam database
                        $nama = $nama_file_akhir;
                    }
                }
            } else {
                // Jika tidak ada file baru diunggah, gunakan nama file yang ada
                $nama = $ambil->foto_brg;
            }

            $tambah = [
                'id_produk' => $id_produk,
                'nama_brg' => $this->input->post('nama_brg'),
                'jenis_brg' => $this->input->post('jenis_brg'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'foto_brg' => $nama
            ];

            $this->M_produk->edit($tambah);
            $this->session->set_flashdata('success_message', 'Berhasil Mengubah Data');
            redirect('produk', 'refresh');
        }
    }

    public function delete($id_produk)
    {
        $ambil = $this->M_produk->getData($id_produk);
        $cekKeranjang = $this->M_keranjang->getProduk($id_produk);
        $cekGaleri = $this->M_galeri->getByProduk($id_produk);

        if($cekKeranjang){
            $this->session->set_flashdata('error_message', 'Terdapat Produk pada Keranjang');
            redirect('produk ', 'refresh');
        } else {
            $name = './foto_produk/'.$ambil->foto_brg;
            
            // Periksa apakah galeri kosong
            if(!empty($cekGaleri)){
                $galeri = './foto_produk/'.$cekGaleri->nama_foto;
            } else {
                $galeri = null;
            }

            // Hapus produk
            if(is_readable($name) && unlink($name)){
                $this->M_produk->delete($id_produk);

                // Hapus galeri jika ada
                if(!empty($galeri) && is_readable($galeri) && unlink($galeri)){
                    $this->M_galeri->deleteByProduk($id_produk);
                }

                $this->session->set_flashdata('success_message', 'Data Berhasil Dihapus');
                redirect('produk ', 'refresh');
            } else {
                echo "Hapus Gagal";
            }
        }
    }




}

/* End of file Admin.php */

