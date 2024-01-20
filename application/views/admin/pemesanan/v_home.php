<div class="card mt-3">
    <div class="card-header">
        <h4>Data Pesanan</h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Produk</th>
                    <th>Jenis Prduk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Produk</th>
                    <th>Jenis Prduk</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sukuna</td>
                    <td>Kitchen Set Example 7</td>
                    <td>kitchen set Set</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-id="2" data-bs-target="#modalproduk" class="btn tampilModalUbah btn-primary p-1" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="" class="btn btn-danger p-1" data-toggle="tooltip" data-placement="bottom" title="Hapus Data">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="#" class="btn btn-secondary p-1" data-toggle="tooltip" data-placement="bottom" title="Detail Data">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modalproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="kecamatan/add" class="form form-horizontal" method="POST">
                    <div class="form-body">
                    <div class="row">
                            <div class="col-md-4">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama_pelanggan" id="nama_pelanggan" required>
                                <?php echo form_error('nama_pelanggan', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                            </div>
                            <div class="col-md-4">
                                <label for="nama_produk">Produk</label>
                            </div>
                            <div class="col-md-8 my-2">
                                <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk.." required>    
                            </div>
                            <div class="col-md-4">
                                <label for="jenis_produk">Jenis Produk</label>
                            </div>
                            <div class="col-md-8">
                                <select name="jenis_produk" id="jenis_produk" class="form-control" required>
                                    <option value="">Jenis Produk</option>
                                    <option value="Kitchen Set">Kitchen Set</option>
                                    <option value="Backdrop Tv">Backdrop Tv</option>
                                    <option value="Backdrop Dinding">Backdrop Dinding</option>
                                    <option value="Lemari Pakaian">Lemari Pakaian</option>
                                    <option value="Lemari Pembatas">Lemari Pembatas</option>
                                    <option value="Meja Bar">Meja Bar</option>
                                    <option value="Kursi Sofa">Kursi Sofa</option>
                                </select>
                                <?php echo form_error('jenis_produk', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-success me-1 mb-1">Reset</button>
                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.tampilModalUbah').on('click', function() {
            const id = $(this).data('id');
            // $('#exampleModalLabel').html('Ubah Data');
            $('.modal-body form').attr('action', 'produk/update/'+id);
            $('#nama_produk').val(id);
            // console.log(id);


            // $.ajax({
            //     url: 'produk/edit',
            //     data: {id : id},
            //     method: 'post',
            //     dataType:'json',
            //     success:function(data){
            //         $('#nama_kec').empty();
            //         $('#kode_kec').empty();
            //         $('#kabupaten').val(data.kode_kab);
            //         $('#kode_kec').val(data.kode_kec);
            //         $('#nama_kec').val(data.nama_kec);
            //         $('#kode_kec').prop('readonly', true)
            //         $('#kabupaten').prop('readonly', true)
            //     }
            // });
        });
    });
</script>