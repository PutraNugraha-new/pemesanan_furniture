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
                                <span class="text-dark mx-1">
                                    Rp.<?= $data->harga ?> <br>
                                    Stok: <?= $data->stok ?>
                                </span>
                            </p>
                            <?php if($this->session->userdata('id')):  ?>
                            <!-- <a href="#" class="btn pra-pesan" data-id="<?= $data->id_produk ?>">
                                <i class="fa-solid fa-cart-plus"></i>
                            </a> -->
                            <button type="button" class="btn pra-pesan" data-id="<?= $data->id_produk ?>" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukan Ke Keranjang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <img id="previewImage" alt="Foto Produk" style="max-width: 100%; height: auto;">
            </div>
            <div class="col-6">
                <p id="ukuran"></p>
                <p id="harga_permeter"></p>
                <p id="harga"></p>
            </div>
        </div>
        <?php echo form_open_multipart(site_url().'welcome/add_to_cart'); ?>
        <div class="row mx-3">
            <hr>
            <div class="col-6">
                <label for="tinggi">Tinggi m<sup>2</sup></label>
                <input type="hidden" id="harga_tot" name="harga">
                <input type="hidden" id="id_produk" name="id_produk">
                <input type="text" class="form-control mx-1" id="tinggi" name="tinggi" placeholder="2.2 , 2.00,...">
            </div>
            <div class="col-6">
                <label for="lebar">Lebar m<sup>2</sup></label>
                <input type="text" class="form-control" id="lebar" name="lebar" placeholder="2.2 , 2.00,...">
            </div>
            <div class="col-6 my-2">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" class="form-control ms-2" id="jumlah">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {

        $('#tinggi, #lebar, #jumlah').on('input', function() {
            // Ambil nilai dari input tinggi, lebar, dan jumlah
            var tinggi = parseFloat($('#tinggi').val());
            var lebar = parseFloat($('#lebar').val());
            var jumlah = parseInt($('#jumlah').val());

            // Ambil harga per meter dari modal
            var harga_permeter = parseFloat($('#harga_permeter').data('harga_permeter'));

            // Hitung harga total
            var harga_total = tinggi * lebar * harga_permeter * jumlah;

            // Format harga total menjadi format uang
            var harga_total_terformat = formatUang(harga_total);

            // Update tampilan harga total
            $('#harga').html('<span class="font-weight-bold">Harga Total :</span> Rp.' + harga_total_terformat);
            $('#harga_tot').val(harga_total_terformat);
        });

        function formatUang(angka) {
        // Menggunakan fungsi toLocaleString untuk memformat angka menjadi format uang dengan separator ribuan
            return angka.toLocaleString('id-ID');
        }

        $('.pra-pesan').on('click', function () {
            var id = $(this).data('id');

            $.ajax({
                url: '<?= base_url("produk/edit") ?>',
                data: {id : id},
                method: 'post',
                dataType:'json',
                success:function(data){
                    var harga_permeter = data.harga_permeter;
                    var harga_permeter_terformat = formatUang(parseFloat(harga_permeter));

                    $('#previewImage').attr('src', '<?= base_url('./foto_produk/') ?>' + data.foto_brg);
                    $('#harga_permeter').data('harga_permeter', harga_permeter);
                    $('#harga_permeter').html('<span data-harga_permeter class="font-weight-bold">Harga Permeter : </span> Rp.' + harga_permeter_terformat);
                    $('#harga').html('<span class="font-weight-bold"> Harga Total :</span> Rp.' + data.harga);
                    $('#jumlah').val('1');
                    $('#tinggi').val(data.tinggi);
                    $('#id_produk').val(id);
                    $('#harga_tot').val(data.harga);
                    $('#lebar').val(data.lebar);
                    $('#ukuran').html('<span class="font-weight-bold">Tinggi : </span>' + data.tinggi + 'm<sup>2</sup> <br> ' + '<span class="font-weight-bold">Lebar : </span>'+ data.lebar + 'm<sup>2</sup>');
                }
            });
        });

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