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
    public function deleteById($data)
	{
		$this->db->where('id', $data);
		$this->db->delete('tb_keranjang');
	}

    public function get_item_by_product_id($productId, $id) {
        $this->db->where('id', $id);
        $this->db->where('id_produk', $productId);
        return $this->db->get('tb_keranjang')->row();
    }
    public function getProduk($productId) {
        $this->db->select('*');
        $this->db->where('id_produk', $productId);
        return $this->db->get('tb_keranjang')->row();
    }

    public function get_total_quantity($id) {
        $this->db->select_sum('kuantitas');
        $this->db->where('id', $id);
        $result = $this->db->get('tb_keranjang')->row();

        return ($result) ? $result->kuantitas : 0;
    }
}
