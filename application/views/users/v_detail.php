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
    <div class="row mb-5">
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
    <?php if($this->session->userdata('id')): ?>
    <div class="row mb-5">
        <div class="col-md-6">
            <a href="#" class="btn add-to-cart" data-id="<?= $produk->id_produk ?>" style="font-size:20pt;">
                <i class="fa-solid fa-cart-plus"></i>
            </a>
        </div>
    </div>
    <?php endif; ?>
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
                    location.reload();
                    alert('Product added to cart!');
                }, 
                error: function (xhr, status, error) {
                    console.error("Error: " + status, error);
                }
            });
        });
    });
</script>