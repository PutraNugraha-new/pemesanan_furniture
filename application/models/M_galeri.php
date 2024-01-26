<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_galeri extends CI_Model {
    

    public function getData($id){
        $this->db->select('*');
        $this->db->from('tb_foto');
        $this->db->where('id_produk', $id);
        return $this->db->get()->result();
    }
    public function getDataFoto($id){
        $this->db->select('*');
        $this->db->from('tb_foto');
        $this->db->where('id_foto', $id);
        return $this->db->get()->row();
    }

    public function add($data){
        $this->db->insert('tb_foto',$data);
    }

    public function delete($data)
	{
		$this->db->where('id_foto', $data);
		$this->db->delete('tb_foto');
	}
}
