<div class="container">
    <div class="row my-3" id="filteredResults">
        <?php foreach($warna as $data):?>
            <div class="col-md-3 col-12 my-2">
                    <div class="card shadow rounded-1">
                        <div class="card-body">
                            <img src="<?= base_url() ?>foto_warna/<?= $data->foto_warna ?>" style="width:200px;height:200px;" class="img-fluid rounded-3" alt="Warna">   
                        </div>
                        <div class="card-footer">
                            <p class="mt-2 d-flex justify-content-between">
                                <span class="text-primary font-weight-bold"><?= $data->nama_warna ?></span>
                            </p>
                        </div>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>