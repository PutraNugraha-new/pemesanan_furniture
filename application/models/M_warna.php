<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_warna extends CI_Model {
    
    public function add($data){
        $this->db->insert('tb_warna',$data);
    }
    public function edit($data)
    {
        $this->db->where('id_warna',$data['id_warna']);
        $this->db->update('tb_warna',$data);
    }

    public function allData(){
        $this->db->select('*');
        $this->db->from('tb_warna');
        return $this->db->get()->result();
    }

    public function getData($id_warna){
        $this->db->select('*');
        $this->db->from('tb_warna');
        $this->db->where('id_warna', $id_warna);
        return $this->db->get()->row();
    }

    public function get_produk_by_kategori($kategori) {
        // Ambil data produk berdasarkan kategori dari database
        $this->db->where('jenis_brg', $kategori);
        return $this->db->get('tb_warna')->result();
    }

    public function delete($id_warna) {
        return $this->db->delete('tb_warna', array('id_warna' => $id_warna));
    }
    
    public function getCountData(){
        return $this->db->count_all("tb_warna");
    }

    public function getDetail($id){
        $this->db->select('tb_warna.*, tb_foto.*');
        $this->db->from('tb_warna');
        $this->db->join('tb_foto', 'tb_foto.id_warna = tb_warna.id_warna', 'left');
        $this->db->where('tb_warna.id_warna', $id);
        return $this->db->get()->row();
    
    }

}
