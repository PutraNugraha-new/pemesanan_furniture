<div class="container">
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pemesanan as $data): ?>
                            <tr>
                                <th>
                                    <img src="<?= base_url() ?>foto_produk/<?= $data->foto_brg ?>" style="width:100px;height:100px;" class="img-fluid rounded-3" alt="Bangku">
                                </th>
                                <td><?= $data->nama_brg ?></td>
                                <td>
                                    <p id="harga" data-harga="<?= $data->harga ?>">
                                        <?php 
                                            $harga_formatted = number_format($data->harga, 2, ',', '.');
                                            echo "Rp." . $harga_formatted;
                                        ?>
                                    </p>
                                </td>
                                <td>
                                    <input type="number" value="<?= $data->kuantitas ?>" data-id="<?= $data->id_keranjang ?>" name="jumlah" value="<?= $data->kuantitas ?>" style="width:80px;" class="form-control" id="jumlah">
                                    <input type="hidden" value="<?= $data->id_produk ?>" data-id="<?= $data->id_keranjang ?>" name="idProduk" value="<?= $data->id_produk ?>" style="width:80px;" id="idProduk">
                                </td>
                                <td>
                                    <p id="total"></p>
                                </td>
                                <td>
                                    <button class="btn btn-primary hapusProduk" data-id="<?= $data->id_keranjang ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p>Subtotal : <span id="subtotal"></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <table class="table table-striped">
                <tr>
                    <td>Ongkos Kirim</td>
                    <td>
                        <p id="ongkir" data-ongkir="300000">Rp. 300.000</p> 
                    </td>
                </tr>
                <tr>
                    <td>Total Akhir</td>
                    <td>
                        <p id="totalAkhir"></p>
                    </td>
                </tr>
            </table>
            <button class="btn btn-danger">Batalkan</button>
            <button class="btn btn-primary" id="pesanButton">Pesan</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        function hitungTotalAwal() {
            var subtotal = 0;
            $('input[name="jumlah"]').each(function () {
                var jumlah = $(this).val();
                var harga = $(this).closest('tr').find('#harga').data('harga');
                var total = jumlah * harga;
                subtotal += total;
                $(this).closest('tr').find('#total').text('Rp.' + total.toLocaleString('id-ID'));
            });
            $('#subtotal').text('Rp.' + subtotal.toLocaleString('id-ID'));
            var ongkir = $('#ongkir').data('ongkir');
            var totalAkhir = subtotal + ongkir;
            $('#totalAkhir').text('Rp.' + totalAkhir.toLocaleString('id-ID'));
        }

        // Panggil fungsi hitungTotalAwal saat halaman dimuat
        hitungTotalAwal();
        // Event listener untuk setiap perubahan pada input jumlah
        $('input[name="jumlah"]').on('input', function () {

            var id = $(this).data('id');
            console.log(id);

            // Ambil nilai jumlah dan harga dari atribut data-harga
            var jumlah = $(this).val();
            var harga = $(this).closest('tr').find('#harga').data('harga');

             // Hitung total
            var total = jumlah * harga;
            // Tampilkan total pada elemen dengan id "total"
            $(this).closest('tr').find('#total').text('Rp.' + total.toLocaleString('id-ID'));
            // Panggil kembali fungsi hitungTotalAwal setelah perubahan
            hitungTotalAwal();
            

            $.ajax({
                url: '<?= base_url("welcome/update_cart") ?>',
                data: {
                    id : id,
                    jumlah: jumlah
                },
                method: 'post',
                dataType:'json',
                success:function(response){
                    console.log(response);
                }, 
                error: function (xhr, status, error) {
                    console.error("Error: " + status, error);
                }
            });
        });

        $('.hapusProduk').on('click', function () {

            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url("welcome/delete") ?>',
                data: {
                    id : id
                },
                method: 'post',
                dataType:'json',
                success:function(response){
                    location.reload();
                }, 
                error: function (xhr, status, error) {
                    console.error("Error: " + status, error);
                }
            });

        });
    });

    $(document).on('click', '#pesanButton', function() {
        var pesanan = [];
        
        // console.log(totalbayar);        
        // Loop melalui setiap baris pesanan
        $('tbody tr').each(function() {
            var id_produk_cek = $(this).find('input[name="idProduk"]');
            var kuantitas_cek = $(this).find('input[name="jumlah"]');
            var harga_satuan_cek = $(this).find('#harga');

            if(id_produk_cek.length > 0 && kuantitas_cek.length > 0 && harga_satuan_cek.length > 0){
                var id_produk =id_produk_cek.val();
                var kuantitas = kuantitas_cek.val();
                var harga_satuan = harga_satuan_cek.data('harga');
                var subtotal = kuantitas * harga_satuan; // Hilangkan Rp dan koma, dan hapus spasi
                var totalbayar = $('#totalAkhir').text().replace('Rp.', '').replace('.', '').trim();

            // Tambahkan data pesanan ke array
                pesanan.push({
                    id_produk: id_produk,
                    kuantitas: kuantitas,
                    harga_satuan: harga_satuan,
                    subtotal: subtotal,
                    totalbayar: totalbayar
                });
            }else{
                // console.log("Elemen tidak ditemukan pada baris tabel ini.");
            }
                
        });
        
        $.ajax({
            url: '<?= base_url("welcome/simpan_pesanan") ?>', 
            method: 'POST',
            dataType: 'json',
            data: { pesanan: pesanan },
            success: function(response) {
                alert('Pesanan Telah Dibuat, lihat proses pada menu Riwayat');
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error("Error: " + status, error);
            }
        });
    });
</script>