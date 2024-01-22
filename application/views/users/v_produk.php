<div class="container">
    <div class="row my-5">
        <p>Filter :</p>
        <div class="col-2">
            <select name="bahan" id="bahan" class="form-control">
                <option value="">Pilih Bahan</option>
                <option value="Plywood">Plywood</option>
                <option value="Lapisan Plywood">Lapisan Plywood</option>
                <option value="Lem Fox">Lem Fox</option>
            </select>
        </div>
        <div class="col-2">
            <select name="ukuran" id="ukuran" class="form-control">
                <option value="">Ukuran Plywoord</option>
                <option value="plywood 6mm">Plywood 6mm</option>
                <option value="plywood 9mm">Plywood 9mm</option>
                <option value="plywood 12mm">Plywood 12mm</option>
                <option value="plywood 15mm">Plywood 15mm</option>
                <option value="plywood 18mm">Plywood 18mm</option>
            </select>
        </div>
        <div class="col-2">
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
            <div class="col-2 my-2">
                <div class="card">
                    <div class="card-body p-1">
                        <img src="https://source.unsplash.com/random/300x300" class="img-fluid rounded-3" alt="Bangku">
                        <p class="text-center mt-2">Example 1</p>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>