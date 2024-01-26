<div class="container">
    <div class="row">
        <h3 class="my-5">
            <?= $produk->nama_brg ?>
        </h3>
        <div class="col-md-3">
            <img src="<?= base_url() ?>foto_produk/<?= $produk->foto_brg ?>" class="img-fluid m-0" alt="Bangku jpg">
        </div>
        <?php foreach($galeri as $data): ?>
        <div class="col-md-3 m-0 p-1">
            <img src="<?= base_url() ?>foto_produk/<?= $data->nama_foto ?>" class="img-fluid m-0 rounded" alt="Bangku jpg">
        </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <h3>
            Deskripsi
        </h3>
        <div class="col-md-3">
            <p>
                <?= $produk->deskripsi ?>
            </p>
        </div>
        <div class="col-md-3">
            <p>
                <span class="font-weight-bold">Harga Sementara</span> Rp.<?= $produk->harga ?>
            </p>
        </div>
    </div>
</div>