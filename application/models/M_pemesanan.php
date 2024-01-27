<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {
    

    public function simpan_pesanan($pesanan, $id) {
        // Lakukan penyimpanan data pesanan ke dalam tabel pesanan (order)
        $data_pesanan = array(
            'id_pelanggan' => $id, // Anda harus sesuaikan dengan cara Anda mendapatkan id_pelanggan
            'tgl_pemesanan' => date('Y-m-d H:i:s'), // Tanggal pemesanan bisa disesuaikan dengan kebutuhan
            'total_bayar' => $pesanan[0]['totalbayar'], // Sesuaikan dengan cara Anda mendapatkan total_bayar
            'status_pemesanan' => 'Proses'
        );

        // Jalankan query untuk menyimpan data ke dalam tabel pesanan (order)
        $this->db->insert('tb_pemesanan', $data_pesanan);

        // Mengembalikan ID pesanan yang baru saja disimpan
        return $this->db->insert_id();
    }

    public function simpan_detail_pesanan($id_pesanan, $pesanan) {
        // Lakukan penyimpanan detail pesanan ke dalam tabel detail pesanan (order_detail)
        foreach ($pesanan as $item) {
            $data_detail_pesanan = array(
                'id_pemesanan' => $id_pesanan,
                'id_produk' => $item['id_produk'],
                'kuantitas' => $item['kuantitas'],
                'harga_satuan' => $item['harga_satuan'],
                'subtotal' => $item['subtotal']
            );

            // Jalankan query untuk menyimpan data ke dalam tabel detail pesanan (order_detail)
            $this->db->insert('tb_detailpemesanan', $data_detail_pesanan);
        }
    }
}
