<div class="card mt-3">
    <div class="card-header">
        <h4>Data Pelanggan</h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $no=1; foreach($pelanggan as $data): ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data->first_name ?></td>
                    <td><?= $data->alamat ?></td>
                    <td><?= $data->no_hp ?></td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-id="2" data-bs-target="#modalproduk" class="btn tampilModalUbah btn-primary p-1" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="" class="btn btn-danger p-1" data-toggle="tooltip" data-placement="bottom" title="Hapus Data">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modalproduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pelanggan</h5>
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
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="col-md-8 my-2">
                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>    
                            </div>
                            <div class="col-md-4">
                                <label for="no_hp">No HP</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="no_hp" placeholder="081230.." required>
                                <?php echo form_error('no_hp', '<div class="alert alert-danger" role="alert">', '</div>') ?>
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