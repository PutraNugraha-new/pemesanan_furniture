<div class="container">
    <div class="row my-5 mx-3">
        <p>Filter :</p>
        <div class="col-md-2 col-5">
            <select name="kategori" id="kategori" class="form-control">
                <option value="">Kategori</option>
                <option value="Kitchen">Kitchen</option>
                <option value="Lemari">Lemari</option>
                <option value="Meja Bar">Meja Bar</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-danger">REKOMENDASI</h1>
        </div>
    </div>
    <div class="row mb-3">
        <?php for ($i=1; $i <= 12  ; $i++):?>
            <div class="col-md-4 col-12 my-2">
                <div class="card">
                    <div class="card-body p-1">
                        <img src="https://source.unsplash.com/random" style="width:500px;height:500px;" class="img-fluid rounded-3" alt="Bangku">
                        <p class="text-center mt-2">Example 1</p>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>