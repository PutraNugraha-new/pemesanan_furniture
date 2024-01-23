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

    public function get_filtered_dataTgl($tgl_awal, $tgl_akhir) {
        // Fetch filtered data based on start and end date
        $this->db->where('tgl_selesai >=', $tgl_awal);
        $this->db->where('tgl_selesai <=', $tgl_akhir);
        $query = $this->db->get('tb_produk');
        return $query->result();
    }
    public function get_filtered_data($tgl_awal, $tgl_akhir, $perusahaan) {
        // Fetch filtered data based on start and end date
        $this->db->where('tgl_selesai >=', $tgl_awal);
        $this->db->where('tgl_selesai <=', $tgl_akhir);
        $this->db->like('nama_perusahaan', $perusahaan);
        $query = $this->db->get('tb_produk');
        return $query->result();
    }
    public function get_filtered_dataPerusahaan($perusahaan) {
        // Fetch filtered data based on start and end date
        $this->db->like('nama_perusahaan', $perusahaan);
        $query = $this->db->get('tb_produk');
        return $query->result();
    }

    public function ambilPerusahaan(){
        $this->db->select('nama_perusahaan');
        $this->db->from('tb_produk');
        return $this->db->get()->result();
    }

    public function getSampelData($no_sampel)
    {
        $this->db->select('nama_perusahaan, tgl_selesai');
        $this->db->from('tb_sampel');
        $this->db->where('no_sampel', $no_sampel);
        $query = $this->db->get();

        // Mengembalikan data sebagai array
        return $query->row_array();
    }
}
