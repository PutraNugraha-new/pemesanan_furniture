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
                            <?php $index=1; foreach($pemesanan as $data): ?>
                            <tr>
                                <th>
                                    <img src="<?= base_url() ?>foto_produk/<?= $data->foto_brg ?>" style="width:100px;height:100px;" class="img-fluid rounded-3" alt="Bangku">
                                </th>
                                <td><?= $data->nama_brg ?></td>
                                <td>
                                    <p id="harga" data-harga="<?= $data->harga ?>">
                                        Rp. <?= $data->harga ?>
                                    </p>
                                </td>
                                <td>
                                    <input type="number" readonly value="<?= $data->kuantitas ?>" data-id="<?= $data->id_keranjang ?>" name="jumlah" value="<?= $data->kuantitas ?>" style="width:80px;" class="form-control" id="jumlah">
                                    <input type="hidden" value="<?= $data->id_produk ?>" data-id="<?= $data->id_keranjang ?>" name="idProduk" value="<?= $data->id_produk ?>" style="width:80px;" id="idProduk">
                                    <input type="hidden" value="<?= $data->tinggi_dipesan ?>" name="tinggi" id="tinggi">
                                    <input type="hidden" value="<?= $data->lebar_dipesan ?>" name="lebar" id="lebar">
                                    <input type="text" value="<?= $data->rak ?>" name="rak" id="rak">
                                    <input type="text" value="<?= $data->laci ?>" name="laci" id="laci">
                                    <input type="text" value="<?= $data->jml_pintu ?>" name="jml_pintu" id="jml_pintu">
                                    <input type="text" value="<?= $data->jenis_pintu ?>" name="jenis_pintu" id="jenis_pintu">
                                    <input type="text" value="<?= $data->warna ?>" name="warna" id="warna">
                                    <input type="text" value="<?= $data->jml_gantungan ?>" name="jml_gantungan" id="jml_gantungan">
                                    <input type="text" value="<?= $data->deskripsi_dipesan ?>" name="deskripsi_dipesan" id="deskripsi_dipesan">
                                </td>
                                <td>
                                    <p id="keranjang<?= $index ?>" data-total="<?= $data->harga_dipesan ?>">Rp.<?= $data->harga_dipesan ?></p>
                                </td>
                                <td>
                                    <button class="btn btn-primary hapusProduk" data-id="<?= $data->id_keranjang ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php $index++; endforeach; ?>
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
            <button class="btn btn-primary pesanButton" id="pesanButton">Pesan</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        function hitungTotalAwal() {
            var subtotal = 0;
            $('[id^="keranjang"]').each(function() {
                subtotal += parseInt($(this).data('total').replace(/\./g, ''), 10);
            });
            $('#subtotal').text('Rp.' + subtotal.toLocaleString('id-ID'));

            var ongkir = parseInt($('#ongkir').data('ongkir'), 10);
            var totalAkhir = subtotal + ongkir;
            $('#totalAkhir').text('Rp.' + totalAkhir.toLocaleString('id-ID'));
        }


        // Panggil fungsi hitungTotalAwal saat halaman dimuat
        hitungTotalAwal();

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

    $(document).on('click', '.pesanButton', function() {
        var pesanan = [];
        
        // console.log(totalbayar);        
        // Loop melalui setiap baris pesanan
        $('tbody tr').each(function() {
            var id_produk_cek = $(this).find('input[name="idProduk"]');
            var kuantitas_cek = $(this).find('input[name="jumlah"]');
            var harga_satuan_cek = $(this).find('#harga');
            var tinggi = $(this).find('#tinggi');
            var lebar = $(this).find('#lebar');
            var rak = $(this).find('#rak');
            var laci = $(this).find('#laci');
            var jml_pintu = $(this).find('#jml_pintu');
            var jenis_pintu = $(this).find('#jenis_pintu');
            var warna = $(this).find('#warna');
            var jml_gantungan = $(this).find('#jml_gantungan');
            var deskripsi_dipesan = $(this).find('#deskripsi_dipesan');
            

            if(id_produk_cek.length > 0 && kuantitas_cek.length > 0 && harga_satuan_cek.length > 0){
                var id_produk =id_produk_cek.val();
                var kuantitas = kuantitas_cek.val();
                var tinggi = tinggi.val();
                var lebar = lebar.val();
                var rak = rak.val();
                var laci = laci.val();
                var jml_pintu = jml_pintu.val();
                var jenis_pintu = jenis_pintu.val();
                var warna = warna.val();
                var jml_gantungan = jml_gantungan.val();
                var deskripsi_dipesan = deskripsi_dipesan.val();
                var harga_satuan = harga_satuan_cek.data('harga');
                var subtotal = 0;
                $('[id^="keranjang"]').each(function() {
                    subtotal += parseInt($(this).data('total').replace(/\./g, ''), 10);
                });
                var totalbayar = $('#totalAkhir').text().replace('Rp.', '').trim();
                

            // Tambahkan data pesanan ke array
                pesanan.push({
                    id_produk: id_produk,
                    tinggi: tinggi,
                    lebar: lebar,
                    rak: rak,
                    laci: laci,
                    jml_pintu: jml_pintu,
                    jenis_pintu: jenis_pintu,
                    warna: warna,
                    jml_gantungan: jml_gantungan,
                    deskripsi_dipesan: deskripsi_dipesan,
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