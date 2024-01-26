<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keranjang extends CI_Model {
    
    public function add($data){
        $this->db->insert('tb_keranjang',$data);
    }

    public function getData($id){
        $this->db->select('tb_keranjang.*, tb_produk.*');
        $this->db->from('tb_keranjang');
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_keranjang.id_produk', 'left');
        $this->db->where('tb_keranjang.id', $id);
        return $this->db->get()->result();
    
    }
    public function getDetailData($id){
        $this->db->select('tb_keranjang.*, tb_produk.*');
        $this->db->from('tb_keranjang');
        $this->db->join('tb_produk', 'tb_produk.id_produk = tb_keranjang.id_produk', 'left');
        $this->db->where('tb_keranjang.id', $id);
        return $this->db->get()->result();
    }

    public function update_jumlah_produk($id_keranjang, $jumlah) {
        // Sesuaikan dengan struktur tabel dan query Anda
        $data = array(
            'kuantitas' => $jumlah
        );

        $this->db->where('id_keranjang', $id_keranjang);
        $this->db->update('tb_keranjang', $data);
    }

    public function delete($data)
	{
		$this->db->where('id_keranjang', $data);
		$this->db->delete('tb_keranjang');
	}
}
