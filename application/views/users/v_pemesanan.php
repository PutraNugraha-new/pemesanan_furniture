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
                            <tr>
                                <th>
                                    <img src="<?= base_url() ?>foto_produk/<?= $pemesanan->foto_brg ?>" style="width:100px;height:100px;" class="img-fluid rounded-3" alt="Bangku">
                                </th>
                                <td><?= $pemesanan->nama_brg ?></td>
                                <td>
                                    <p id="harga" data-harga="<?= $pemesanan->harga ?>">Rp.<?= $pemesanan->harga ?></p>
                                </td>
                                <td>
                                    <input type="number" name="jumlah" value="<?= $pemesanan->kuantitas ?>" style="width:80px;" class="form-control" id="jumlah">
                                </td>
                                <td>
                                    <p id="total"></p>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                    <td>Total</td>
                    <td>
                        <p id="totalAkhir"></p>
                    </td>
                </tr>
            </table>
            <button class="btn btn-danger">Batalkan</button>
            <button class="btn btn-primary">Pesan</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        function hitungTotalAwal() {
            $('input[name="jumlah"]').each(function () {
                var jumlah = $(this).val();
                var harga = $(this).closest('tr').find('#harga').data('harga');
                var ongkir = $('#ongkir').data('ongkir');
                var total = jumlah * harga;
                var totalAkhir = total + ongkir;
                $(this).closest('tr').find('#total').text('Rp.' + total);
                $('#totalAkhir').text('Rp.' + totalAkhir);
            });
        }

        // Panggil fungsi hitungTotalAwal saat halaman dimuat
        hitungTotalAwal();
        // Event listener untuk setiap perubahan pada input jumlah
        $('input[name="jumlah"]').on('input', function () {
            // Ambil nilai jumlah dan harga dari atribut data-harga
            var jumlah = $(this).val();
            var harga = $(this).closest('tr').find('#harga').data('harga');
            var ongkir = $('#ongkir').data('ongkir');
            // Hitung total
            var total = jumlah * harga;
            var totalAkhir = total + ongkir;
            // Tampilkan total pada elemen dengan id "total"
            $(this).closest('tr').find('#total').text('Rp.' + total);
            $('#totalAkhir').text('Rp.' + totalAkhir);
        });
    });
</script>