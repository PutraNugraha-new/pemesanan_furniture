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
                            <?php for ($i=1; $i <= 3 ; $i++) :?>
                            <tr>
                                <th>
                                    <img src="https://source.unsplash.com/random" style="width:100px;height:100px;" class="img-fluid rounded-3" alt="Bangku">
                                </th>
                                <td>Kitchen Set Example 6</td>
                                <td>-</td>
                                <td>
                                    <input type="number" name="jumlah" style="width:80px;" class="form-control">
                                </td>
                                <td>-</td>
                                <td>
                                    <a href="#" class="btn btn-primary">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endfor; ?>
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
                    <td>Rp. </td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rp.</td>
                </tr>
            </table>
            <button class="btn btn-danger">Batalkan</button>
            <button class="btn btn-primary">Pesan</button>
        </div>
    </div>
</div>