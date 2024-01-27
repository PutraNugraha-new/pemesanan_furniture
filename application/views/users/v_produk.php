<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-md-4 col-5">
            <select name="kategori" id="kategori" class="form-control">
                <option value="">Jenis Produk</option>
                <option value="Kitchen Set">Kitchen Set</option>
                <option value="Backdrop Tv">Backdrop Tv</option>
                <option value="Backdrop Dinding">Backdrop Dinding</option>
                <option value="Lemari Pakaian">Lemari Pakaian</option>
                <option value="Lemari Pembatas">Lemari Pembatas</option>
                <option value="Meja Bar">Meja Bar</option>
                <option value="Kursi Sofa">Kursi Sofa</option>
            </select>
        </div>
    </div>
    <div class="row my-3" id="filteredResults">
        <?php foreach($produk as $data):?>
            <div class="col-md-3 col-12 my-2">
                    <div class="card shadow rounded-1">
                        <div class="card-body">
                            <a href="<?= base_url() ?>welcome/detailProduk/<?= $data->id_produk ?>">
                                <img src="<?= base_url() ?>foto_produk/<?= $data->foto_brg ?>" style="width:200px;height:200px;" class="img-fluid rounded-3" alt="Bangku">                
                            </a>
                        </div>
                        <div class="card-footer">
                            <p class="mt-2 d-flex justify-content-between">
                                <span class="text-primary font-weight-bold"><?= $data->nama_brg ?></span>
                                <span class="text-dark">Rp.<?= $data->harga ?></span>
                                <span class="text-dark">Stok: <?= $data->stok ?></span>
                            </p>
                            <?php if($this->session->userdata('id')):  ?>
                            <a href="#" class="btn add-to-cart" data-id="<?= $data->id_produk ?>">
                                <i class="fa-solid fa-cart-plus"></i>
                            </a>
                            <?php endif; ?>
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

        $('#kategori').change(function() {
            var kategori = $(this).val();

            // Ajax request untuk mendapatkan produk berdasarkan kategori
            $.ajax({
                url: "<?= base_url('welcome/get_produk_by_kategori'); ?>",
                method: "POST",
                data: { kategori: kategori },
                dataType: "json", 
                success: function(response) {
                     // Bersihkan div hasil sebelum menambahkan data baru
                    $('#filteredResults').empty();

                    $.each(response, function(index, data) {
                        var productHtml = '<div class="col-md-3 col-12 my-2">';
                            productHtml += '<div class="card shadow rounded-1">';
                            productHtml += '<div class="card-body">';
                            productHtml += '<a href="' + '<?= base_url() ?>' + 'welcome/detailProduk/' + data.id_produk + '">';
                            productHtml += '<img src="' + '<?= base_url() ?>' + 'foto_produk/' + data.foto_brg + '" style="width:200px;height:200px;" class="img-fluid rounded-3" alt="Bangku">';
                            productHtml += '</a>';
                            productHtml += '</div>';
                            productHtml += '<div class="card-footer">';
                            productHtml += '<p class="mt-2 d-flex justify-content-between">';
                            productHtml += '<span class="text-primary font-weight-bold">' + data.nama_brg + '</span>';
                            productHtml += '<span class="text-dark">Rp.' + data.harga + '</span>';
                            productHtml += '<span class="text-dark">Stok: ' + data.stok + '</span>';
                            productHtml += '</p>';
                            <?php if($this->session->userdata('id')):  ?>
                            productHtml += '<a href="#" class="btn add-to-cart" data-id="' + data.id_produk + '">';
                            productHtml += '<i class="fa-solid fa-cart-plus"></i>';
                            productHtml += '</a>';
                            <?php endif; ?>
                            productHtml += '</div>';
                            productHtml += '</div>';
                            productHtml += '</div>';

                            // Tambahkan produk ke div hasil
                            $('#filteredResults').append(productHtml);
                    });
                }
            });
        });
    });
</script>