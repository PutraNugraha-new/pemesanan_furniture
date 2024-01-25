<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-md-4 col-5">
            <select name="kategori" id="kategori" class="form-control">
                <option value="">Kategori</option>
                <option value="Kitchen">Kitchen</option>
                <option value="Lemari">Lemari</option>
                <option value="Meja Bar">Meja Bar</option>
            </select>
        </div>
    </div>
    <div class="row my-3">
        <?php foreach($produk as $data):?>
            <div class="col-md-3 col-12 my-2">
                    <div class="card shadow rounded-1">
                        <div class="card-body">
                            <img src="<?= base_url() ?>foto_produk/<?= $data->foto_brg ?>" style="width:200px;height:200px;" class="img-fluid rounded-3" alt="Bangku">                
                        </div>
                        <div class="card-footer">
                            <p class="mt-2 d-flex justify-content-between">
                                <span class="text-primary font-weight-bold"><?= $data->nama_brg ?></span>
                                <span class="text-dark">Rp.<?= $data->harga ?></span>
                                <span class="text-dark">Stok: <?= $data->stok ?></span>
                            </p>
                            <a href="#" class="btn add-to-cart" data-id="<?= $data->id_produk ?>">
                                <i class="fa-solid fa-cart-plus"></i>
                            </a>
                        </div>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Menggunakan AJAX untuk menambah produk ke keranjang belanja
        $('.add-to-cart').on('click', function () {
            var id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: '<?= base_url("welcome/add_to_cart") ?>',
                data: {id : id},
                method: 'post',
                dataType:'json',
                success:function(data){
                    alert('Product added to cart!');
                }, 
                error: function (xhr, status, error) {
                    console.error("Error: " + status, error);
                }
            });
        });
    });
</script>