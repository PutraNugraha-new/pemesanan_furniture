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
        return $this->db->get()->row();
    }
}
