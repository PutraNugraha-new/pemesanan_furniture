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
                    </div>
                    <div class="col-md-7">
                        <h5 class="mt-2"><?= $data->nama_brg ?></h5>
                        <p class="text-end me-4">Jumlah x<?= $data->kuantitas ?></p>
                        <p class="text-end me-4 text-primary">
                            Harga Satuan : Rp. <?= $data->harga_satuan ?>
                        </p>
                        <p class="ms-4">
                            Alamat : <br>  <?= $data->alamat ?>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Detail
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse position-relative" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <p>Tinggi : <?= $data->tinggi_dipesan ?>m<sup>2</sup></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Lebar : <?= $data->lebar_dipesan ?>m<sup>2</sup></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Jumlah Rak : <?= $data->rak ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Jumlah Laci : <?= $data->laci ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Jumlah Pintu : <?= $data->jml_pintu ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Jenis Pintu : <?= $data->jenis_pintu ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Warna : <?= $data->warna ?></p>
                                    </div>
                                    <div class="col-6">
                                        <p>Jumlah Gantungan : <?= $data->jml_gantungan ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>