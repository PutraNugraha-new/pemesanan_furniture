<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_riwayat extends CI_Model {
    

    public function get_pesanan_produk_user($id) {
        $this->db->select('tb_pemesanan.*, tb_detailpemesanan.*, tb_produk.*, users.*');
        $this->db->from('tb_pemesanan');
        $this->db->join('tb_detailpemesanan', 'tb_pemesanan.id_pemesanan = tb_detailpemesanan.id_pemesanan');
        $this->db->join('tb_produk', 'tb_detailpemesanan.id_produk = tb_produk.id_produk');
        $this->db->join('users', 'tb_pemesanan.id_pelanggan = users.id'); // Sesuaikan dengan nama kolom ID user
        $this->db->where('tb_pemesanan.id_pelanggan', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_pesanan_produk_userAll() {
        $this->db->select('tb_pemesanan.*, tb_detailpemesanan.*, tb_produk.*, users.*');
        $this->db->from('tb_pemesanan');
        $this->db->join('tb_detailpemesanan', 'tb_pemesanan.id_pemesanan = tb_detailpemesanan.id_pemesanan');
        $this->db->join('tb_produk', 'tb_detailpemesanan.id_produk = tb_produk.id_produk');
        $this->db->join('users', 'tb_pemesanan.id_pelanggan = users.id'); // Sesuaikan dengan nama kolom ID user
        $this->db->order_by('tb_pemesanan.tgl_pemesanan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
