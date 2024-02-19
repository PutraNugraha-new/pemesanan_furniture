<div class="card mt-3">
    <div class="card-header">
        <h4>Data Pesanan</h4>
        <a href="<?= base_url() ?>pemesanan/cetakLaporan" class="btn btn-success my-2">Cetak</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Pelanggan / username</th>
                    <th>No WA</th>
                    <th>Alamat</th>
                    <th>Tgl Pemesanan</th>
                    <th>Kuantitas</th>
                    <th>Spesifikasi</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Pelanggan / username</th>
                    <th>No WA</th>
                    <th>Alamat</th>
                    <th>Tgl Pemesanan</th>
                    <th>Kuantitas</th>
                    <th>Spesifikasi</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $no=1; foreach($riwayat as $data): ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td>
                            <img src="<?= base_url() ?>foto_produk/<?= $data->foto_brg ?>" style="width:100px;height:100px;" class="img-fluid rounded-3" alt="Bangku">
                        </td>
                        <td><?= $data->nama_brg ?></td>
                        <td><?= $data->first_name ?> / <?= $data->email ?></td>
                        <td><?= $data->no_hp ?></td>
                        <td><?= $data->alamat ?></td>
                        <td><?= $data->tgl_pemesanan ?></td>
                        <td><?= $data->kuantitas ?></td>
                        <td>
                            Tinggi:<?= $data->tinggi_dipesan ?>/ <br> Lebar:<?= $data->lebar_dipesan ?>m<sup>2</sup><br>
                            Rak : <?= $data->rak ?><br>Laci : <?= $data->laci ?><br>Jumlah Pintu : <?= $data->jml_pintu ?><br>
                            Jenis Pintu: <?= $data->jenis_pintu ?><br>Warna : <?= $data->warna ?><br>Jumlah Gantungan : <?= $data->jml_gantungan ?>
                        </td>
                        <td>
                            Rp.<?= $data->harga_satuan ?>
                        </td>
                        <td>
                            <select class="form-select status" data-id="<?= $data->id_detail ?>">
                                <option value="proses" <?= ($data->status_pemesanan == 'proses') ? 'selected' : '' ?>>Proses</option>
                                <option value="Survei Lokasi" <?= ($data->status_pemesanan == 'Survei Lokasi') ? 'selected' : '' ?>>Survei Lokasi</option>
                                <option value="Pembayaran Uang Muka" <?= ($data->status_pemesanan == 'Pembayaran Uang Muka') ? 'selected' : '' ?>>Pembayaran Uang Muka</option>
                                <option value="Proses Pengerjaan" <?= ($data->status_pemesanan == 'Proses Pengerjaan') ? 'selected' : '' ?>>Proses Pengerjaan</option>
                                <option value="Selesai Pengerjaan" <?= ($data->status_pemesanan == 'Selesai Pengerjaan') ? 'selected' : '' ?>>Selesai Pengerjaan</option>
                                <option value="Pengiriman" <?= ($data->status_pemesanan == 'Pengiriman') ? 'selected' : '' ?>>Pengiriman</option>
                                <option value="Pelunasan Barang" <?= ($data->status_pemesanan == 'Pelunasan Barang') ? 'selected' : '' ?>>Pelunasan Barang</option>
                                <option value="Selesai" <?= ($data->status_pemesanan == 'Selesai') ? 'selected' : '' ?>>Selesai</option>
                            </select>
                        </td>
                    </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.status').on('change', function() {
            var id = $(this).data('id');
            var newStatus = $(this).val();

            $.ajax({
                url: '<?= base_url("pemesanan/updateProses") ?>',
                data: {
                    id : id,
                    status: newStatus
                },
                method: 'post',
                dataType:'json',
                success:function(response){
                    console.log(response);
                    location.reload();
                }, 
                error: function (xhr, status, error) {
                    console.error("Error: " + status, error);
                }
            });
        });
    });
</script>