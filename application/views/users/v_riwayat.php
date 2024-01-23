<div class="container">
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Pesanan</th>
                                <th>Waktu Pemesanan</th>
                                <th>Alamat Pengiriman</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Produk</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Pesanan</th>
                                <th>Waktu Pemesanan</th>
                                <th>Alamat Pengiriman</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php for ($i=1; $i <= 3 ; $i++) :?>
                            <tr>
                                <td>
                                    <img src="https://source.unsplash.com/random" style="width:100px;height:100px;" class="img-fluid rounded-3" alt="Bangku">
                                </td>
                                <td>Kitchen Set Example 6</td>
                                <td>3</td>
                                <td>Rp250.000</td>
                                <td>Rp550.000</td>
                                <td>23-12-2023</td>
                                <td>
                                    <p>Nanami</p>
                                    <p>(+62)81351678870</p>
                                    <p>Jl.Yos Sodarso6, Jl. Rizky, No.10, Kota Palangkaraya, Jekan raya, Kalimantan Tengah, 73112</p>
                                </td>
                                <td>
                                    <div class="badge <?php echo ( 'proses' == 'proses' ? 'badge-danger' : 'badge-primary') ?>">
                                        Proses
                                    </div>
                                </td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>