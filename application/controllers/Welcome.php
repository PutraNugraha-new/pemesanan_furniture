<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->library('email');
    }

	public function index()
	{	
		$data = array(  
            'isi'   =>  'users/v_home',
			'produk' => $this->M_produk->allData(),
		);
		$this->load->view('users/layout/v_wrapper', $data, FALSE);
	}

	public function produk(){
		$data = array(
			'isi' => 'users/v_produk',
			'produk' => $this->M_produk->allData(),
		);
		$this->load->view('users/layout/v_wrapper', $data, FALSE);
	}

	public function pemesanan(){
		$data = $this->session->userdata;
	    if(empty($data)){
	        redirect(site_url().'main/login/');
	    }

	    //check user level
	    if(empty($data['role'])){
	        redirect(site_url().'main/login/');
	    }
	    $dataLevel = $this->userlevel->checkLevel($data['role']);
	    //check user level
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'main/login/');
        }else{
			if($dataLevel == 'is_user'){
				$data = array(
					'isi'=> 'users/v_pemesanan',
					'pemesanan' => $this->M_keranjang->getData($data['id'])
				);
				$this->load->view('users/layout/v_wrapper', $data, FALSE);
			}else{
				redirect(site_url().'main/login/');
			}
		}
	}

	public function riwayat(){
		$data = $this->session->userdata;
	    if(empty($data)){
	        redirect(site_url().'main/login/');
	    }

	    //check user level
	    if(empty($data['role'])){
	        redirect(site_url().'main/login/');
	    }
	    $dataLevel = $this->userlevel->checkLevel($data['role']);
	    //check user level
        
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'main/login/');
        }else{
			if($dataLevel == 'is_user'){
				$data = array(
					'isi' => 'users/v_riwayat',
					'riwayat' => $this->M_riwayat->get_pesanan_produk_user($data['id'])
				);
				$this->load->view('users/layout/v_wrapper', $data, FalSE);
			}else{
				redirect(site_url().'main/login/');
			}
		}
	}

	public function profile(){
		//user data from session
	    $data = $this->session->userdata;
	    if(empty($data)){
	        redirect(site_url().'main/login/');
	    }

	    //check user level
	    if(empty($data['role'])){
	        redirect(site_url().'main/login/');
	    }
	    $dataLevel = $this->userlevel->checkLevel($data['role']);
	    //check user level
        if(empty($this->session->userdata['email'])){
            redirect(site_url().'main/login/');
        }else{
			if($dataLevel == 'is_user'){
				$data =array(
					'isi' => 'users/v_profile',
					'datauser' => $this->session->userdata
				);
				$this->load->view('users/layout/v_wrapper', $data, FALSE);
			}else{
				redirect(site_url().'main/login/');
			}
		}
	}

	public function add_to_cart(){
        $id_produk = $this->input->post('id_produk');
		$id = $this->session->userdata['id'];
		$quantity = $this->input->post('jumlah');

		// Cek apakah produk sudah ada di keranjang
		$existingItem = $this->M_keranjang->get_item_by_product_id($id_produk, $id);
    
        // Panggil model atau metode yang diperlukan untuk mengambil data produk
        // $productData = $this->M_produk->getData($id_produk);
		if ($existingItem) {
			// Produk sudah ada di keranjang, perbarui jumlahnya
			$newQuantity = $existingItem->kuantitas + $quantity;
			$this->M_keranjang->update_jumlah_produk($existingItem->id_keranjang, $newQuantity);
		} else {
			// Produk belum ada di keranjang, tambahkan sebagai item baru
			$data = array(
				'id' => $this->session->userdata['id'],
				'id_produk' => $id_produk,
				'tinggi_dipesan' => $this->input->post('tinggi'),
				'lebar_dipesan' => $this->input->post('lebar'),
				'harga_dipesan' => $this->input->post('harga'),
				'kuantitas' => $quantity,
			);

			$this->M_keranjang->add($data);
			$this->session->set_flashdata('success_message', 'Produk Ditambahkan Pemesanan');
            redirect(site_url().'welcome/produk');
		}
    }

	public function update_cart(){
		if ($this->input->is_ajax_request()) {
            $id_keranjang = $this->input->post('id');
            $jumlah = $this->input->post('jumlah');

            // Panggil model untuk mengupdate jumlah di database
            $this->M_keranjang->update_jumlah_produk($id_keranjang, $jumlah);

            // Kirim tanggapan ke klien (jika diperlukan)
            echo json_encode(['status' => 'success']);
        } else {
            // Tanggapan jika bukan permintaan Ajax
            show_404();
        }
	}

	public function delete(){
		if ($this->input->is_ajax_request()) {
            $id_produk = $this->input->post('id');

            // Panggil model untuk menghapus data dari database
            $this->M_keranjang->delete($id_produk);

            // Kirim tanggapan ke klien
            echo json_encode(['status' => 'success']);
        } else {
            // Tanggapan jika bukan permintaan Ajax
            show_404();
        }
	}

	public function countKuantitas(){
            $id = $this->session->userdata['id'];

			$totalQuantity = $this->M_keranjang->get_total_quantity($id);

			// Kirim respons sebagai JSON
			echo json_encode(['total_quantity' => $totalQuantity]);
	}

	public function detailProduk($id_produk){
		$data = array(
			'isi' => 'users/v_detail',
			'produk' => $this->M_produk->getData($id_produk),
			'galeri' => $this->M_galeri->getData($id_produk)
		);
		$this->load->view('users/layout/v_wrapper', $data, FALSE);
	}

	public function get_produk_by_kategori() {
		$kategori = $this->input->post('kategori');
		if(empty($kategori)){
			$produk = $this->M_produk->allData();	
		}else{
			$produk =  $this->M_produk->get_produk_by_kategori($kategori);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($produk));
    }


	public function simpan_pesanan() {
        // Ambil data pesanan dari POST request
		$user = $this->session->userdata;
        $pesanan = $this->input->post('pesanan');
		$id = $this->session->userdata['id'];

		$nama_pelanggan = $user['first_name'];
        $tanggal_pesanan = date('Y-m-d');
        $total_pembayaran = 0;

		foreach ($pesanan as $item) {
			$total_pembayaran += (int) str_replace(['Rp.', '.'], ['', ''], $item['totalbayar']);
		}
		$total_bayar = number_format($total_pembayaran, 0, ',', '.');
        $id_pesanan = $this->M_pemesanan->simpan_pesanan($pesanan, $id);

		$subject = 'Pemberitahuan: Pesanan Baru Diterima';
        $message = "Dear Admin,<br><br>
		Anda menerima pemberitahuan ini karena telah ada pesanan baru yang dibuat di sistem. Berikut adalah detailnya:<br><br>
		ID Pesanan: $id_pesanan<br>
		Nama Pelanggan: $nama_pelanggan<br>
		Tanggal Pesanan: $tanggal_pesanan<br>
		Total Pembayaran: Rp. $total_bayar <br><br>
		Silakan segera cek sistem untuk detail lebih lanjut dan tindak lanjuti pesanan tersebut.<br><br>
		Terima kasih.<br><br>
		Salam,<br>
		[Blesing Home Art]";

        // Simpan data pesanan ke dalam tabel pesanan (order)

		 // Pengaturan email
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.gmail.com';
		$config['smtp_port'] = 587;
		$config['smtp_user'] = 'simpandrive803@gmail.com'; // Ganti dengan alamat email Anda
		$config['smtp_pass'] = 'tleydnzevvrvmbda'; // Ganti dengan kata sandi email Anda
		$config['smtp_crypto'] = 'tls';
		$config['charset'] = 'utf-8';
		$config['mailtype'] = 'html';
		$config['newline'] = "\r\n";
	
		// Load konfigurasi email
		$this->email->initialize($config);
		 // Pengaturan email
		 $this->email->from('simpandrive803@gmail.com', 'Admin'); // Ganti dengan alamat email dan nama Anda
		 $this->email->to('putranugraha803@gmail.com'); // Ganti dengan alamat email penerima
		
		$this->email->subject($subject);
		$this->email->message($message);

        if(($id_pesanan) && ($this->email->send())){
			$this->M_pemesanan->simpan_detail_pesanan($id_pesanan, $pesanan);
			$this->M_keranjang->deleteById($id);

			$response['success'] = true;
            $response['message'] = 'Pesanan berhasil disimpan.';
		}else{
			$response['success'] = false;
            $response['message'] = 'Gagal menyimpan pesanan.';
		}
        // Mengembalikan response dalam format JSON
        echo json_encode($response);
    }
}
