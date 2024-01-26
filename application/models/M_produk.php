<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {
    
    public function add($data){
        $this->db->insert('tb_produk',$data);
    }
    public function edit($data)
    {
        $this->db->where('id_produk',$data['id_produk']);
        $this->db->update('tb_produk',$data);
    }

    public function allData(){
        $this->db->select('*');
        $this->db->from('tb_produk');
        return $this->db->get()->result();
    }

    public function getData($id_produk){
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->row();
    }

    public function delete($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('tb_produk',$data);
	}
    
    public function getCountData(){
        return $this->db->count_all("tb_produk");
    }

    public function getDetail($id){
        $this->db->select('tb_produk.*, tb_foto.*');
        $this->db->from('tb_produk');
        $this->db->join('tb_foto', 'tb_foto.id_produk = tb_produk.id_produk', 'left');
        $this->db->where('tb_produk.id_produk', $id);
        return $this->db->get()->row();
    
    }

}
