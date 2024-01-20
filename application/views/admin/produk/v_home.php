<h3>Input Produk</h3>
<div class="card">
    <div class="card-body">
        <?php echo form_open(site_url().'produk'); ?>
            <div class="row">
                <div class="col-md-4">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk" required>
                    <?php echo form_error('nama_produk', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                </div>
                <div class="col-md-4">
                    <label for="nama_produk">Jenis Produk</label>
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
                    <?php echo form_error('nama_produk', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                </div>
                <div class="col-md-2">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="012345.." required>
                    <?php echo form_submit(array('value'=>'Tambah Produk', 'class'=>'btn btn-success mx-auto my-2')); ?>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        <h4>Produk</h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nor</th>
                    <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Sementara</th>
                    <th>Harga final</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nor</th>
                    <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Sementara</th>
                    <th>Harga final</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Kitchen set Example 1</td>
                    <td>Kitchen Set</td>
                    <td>1 Set</td>
                    <td>Rp. 0</td>
                    <td>Rp. 0</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-id="2" data-bs-target="#modalproduk" class="btn tampilModalUbah btn-primary p-1" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                            <i class="fa-solid fa-pencil"></i>
                        </span>
                        </a>
                        <a href="" class="btn btn-danger p-1" data-toggle="tooltip" data-placement="bottom" title="Hapus Data">
                            <i class="fa-solid fa-trash"></i>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="kecamatan/add" class="form form-horizontal" method="POST">
                    <div class="form-body">
                    <div class="row">
                            <div class="col-md-4">
                                <label for="nama_produk">Nama Produk</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk" id="nama_produk" required>
                                <?php echo form_error('nama_produk', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                            </div>
                            <div class="col-md-4">
                                <label for="nama_produk">Jenis Produk</label>
                            </div>
                            <div class="col-md-8  my-2">
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
                                <?php echo form_error('nama_produk', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah">Jumlah</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="jumlah" placeholder="012345.." required>    
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah">Harga Semetara</label>
                            </div>
                            <div class="col-md-8 my-2">
                                <input type="number" class="form-control" name="harga_semetara" placeholder="Rp.." required>    
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah">Harga Final</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="harga_final" placeholder="Rp.." required>    
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