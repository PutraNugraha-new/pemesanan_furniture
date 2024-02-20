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
            <button type="button" class="btn pra-pesan" data-id="<?= $produk->id_produk ?>" data-toggle="modal" data-target="#exampleModal">
                <i class="fa-solid fa-cart-plus"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>
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
            <label for="alamat">Alamat Pengantaran <small class="text-warning">(Pemesanan Khusus Area Palangka Raya)</small></label>
            <select id="alamat" class="form-control col-12 mb-3">
                <option value="Palangkaraya">Palangka Raya</option>
                <option value="Luar">Luar Palangkaraya</option>
            </select>
            <div class="col-4">
                <label for="tinggi">Tinggi m<sup>2</sup></label>
                <input type="hidden" id="harga_tot" name="harga">
                <input type="hidden" id="id_produk" name="id_produk">
                <input type="text" class="form-control mx-1" id="tinggi" name="tinggi" placeholder="2.2 , 2.00,...">
            </div>
            <div class="col-4" >
                <label for="lebar">Lebar m<sup>2</sup></label>
                <input type="text" class="form-control" id="lebar" name="lebar" placeholder="2.2 , 2.00,...">
            </div>
            <div class="col-4" >
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" class="form-control ms-2" id="jumlah">
            </div>
        </div>
        <div class="row mx-3" >
            <hr>
            <div class="col-12 my-1">
                <span class="text-primary">Kostum (Gratis)</span>
            </div>
            <div class="col-4">
                <label for="rak">Jumlah Rak</label>
                <input type="number" class="form-control" id="rak" name="rak">
            </div>
            <div class="col-4">
                <label for="laci">Jumlah Laci</label>
                <input type="number" class="form-control" id="laci" name="laci">
            </div>
            <div class="col-4">
                <label for="jml_pintu">Jumlah Pintu</label>
                <input type="number" class="form-control" id="jml_pintu" name="jml_pintu">
            </div>
        </div>
        <div class="row mx-3 mt-4" >
            <div class="col-4">
                <label for="jenis" class="mb-4">Jenis Pintu</label>
                <select name="jenis_pintu" id="jenis_pintu" class="form-control mt-1">
                    <option value="Pintu Biasa">Pintu Biasa</option>
                    <option value="Pintu Geser">Pintu Geser</option>
                </select>
            </div>
            <div class="col-4">
                <label for="warna" class="mb-4">Warna</label>
                <select name="warna" id="warna" class="form-control mt-1">
                    <?php  foreach ($warna as $color): ?>
                        <option value="<?= $color->id_warna ?>">
                            <?= $color->nama_warna ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-4">
                <label for="jml_gantungan">Jumlah Gantungan</label>
                <input type="number" class="form-control" id="jml_gantungan" name="jml_gantungan">
            </div>
            <div class="col-12 mt-3">
                <label for="deskripsi_dipesan">Deskripsi (Detail Kostum / Detail Alamat)</label>
                <textarea name="deskripsi_dipesan" id="deskripsi_dipesan" class="form-control" cols="20" rows="5"></textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer" >
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-tambah">Tambahkan Ke Keranjang</button>
    </div>
    <?php echo form_close(); ?>
    </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#alamat').on('change', function(){
            var alamat = $(this).val();
            if(alamat == 'Luar') {
                $('.btn-tambah').attr('disabled', true);
                $('#jumlah').attr('disabled', true);
                $('#harga_permeterr').attr('disabled', true);
                $('#tinggi').attr('disabled', true);
                $('#id_produk').attr('disabled', true);
                $('#harga_tot').attr('disabled', true);
                $('#lebar').attr('disabled', true);
                $('#rak').attr('disabled', true);
                $('#laci').attr('disabled', true);
                $('#jml_pintu').attr('disabled', true);
                $('#jenis_pintu').attr('disabled', true);
                $('#warna').attr('disabled', true);
                $('#jml_gantungan').attr('disabled', true);
                $('#deskripsi_dipesan').attr('disabled', true);
            }else{
                $('.btn-tambah').attr('disabled', false);
                $('#jumlah').attr('disabled', false);
                $('#harga_permeterr').attr('disabled', false);
                $('#tinggi').attr('disabled', false);
                $('#id_produk').attr('disabled', false);
                $('#harga_tot').attr('disabled', false);
                $('#lebar').attr('disabled', false);
                $('#rak').attr('disabled', false);
                $('#laci').attr('disabled', false);
                $('#jml_pintu').attr('disabled', false);
                $('#jenis_pintu').attr('disabled', false);
                $('#warna').attr('disabled', false);
                $('#jml_gantungan').attr('disabled', false);
                $('#deskripsi_dipesan').attr('disabled', false);
            }

        });

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
                    $('#harga_permeterr').val(data.harga_permeter);
                    $('#tinggi').val(data.tinggi);
                    $('#id_produk').val(id);
                    $('#harga_tot').val(data.harga);
                    $('#lebar').val(data.lebar);
                    $('#rak').val(data.rak);
                    $('#laci').val(data.laci);
                    $('#jml_pintu').val(data.jml_pintu);
                    $('#jenis_pintu').val(data.jenis_pintu);
                    $('#warna').val(data.warna);
                    $('#jml_gantungan').val(data.jml_gantungan);
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
    });
</script>