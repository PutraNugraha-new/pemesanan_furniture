<div class="container" style="height:73vh;">
    <div class="row my-3">
        <?php foreach($riwayat as $data): ?>
        <div class="col-md-4">
            <div class="card card-light">
                <div class="row">
                    <div class="col-md-5">
                        <img src="<?= base_url() ?>foto_produk/<?= $data->foto_brg ?>" class="img-fluid" alt="Bangku">
                        <p class="mt-4 ms-4">
                        <?php
                        // Tentukan kelas warna badge berdasarkan status pesanan
                        $badge_class = ($data->status_pemesanan == 'proses') ? 'badge-danger' : 'badge-primary';
                        ?>
                            Status : <span class="badge <?= $badge_class ?>"><?= $data->status_pemesanan ?></span>
                        </p>
                        <p class="ms-4">
                            Alamat : <br>  <?= $data->alamat ?>
                        </p>
                    </div>
                    <div class="col-md-7">
                        <h5 class="mt-2"><?= $data->nama_brg ?></h5>
                        <p class="text-end me-4">x<?= $data->kuantitas ?></p>
                        <p class="text-end me-4 text-primary">
                            Rp. <?= $data->harga_satuan ?>
                        </p>
                        <p class="text-end me-4 text-primary">
                            Total Pesanan : Rp. <?= $data->total_bayar ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>