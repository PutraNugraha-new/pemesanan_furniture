<h3>Input User</h3>
<div class="card">
    <div class="card-body">
        <?php echo form_open(site_url().'login/adduserPengguna'); ?>
            <div class="row">
                <div class="col-md-4">
                    <label for="username" class="col-sm-4 col-form-label">Username</label>
                    <input type="text" class="form-control" id="email" name="email">
                    <?php echo form_error('email');?>
                </div>
                <div class="col-md-4">
                    <label for="password" class="col-sm-4 col-form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?php echo form_error('password') ?>
                </div>
                <div class="col-md-4">
                    <label for="passconf" class="col-sm-6 col-form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="passconf" name="passconf">
                    <?php echo form_error('passconf') ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="first_name" class="col-sm-6 col-form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="first_name" name="first_name">
                    <?php echo form_error('firstname');?>
                </div>
                <div class="col-md-3">
                    <label for="no_hp" class="col-sm-4 col-form-label">No HP</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp">
                    <?php echo form_error('no_hp');?>
                </div>
                <div class="col-md-8">
                    <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                    <?php echo form_error('alamat');?>
                    <?php echo form_submit(array('value'=>'Tambah Pengguna', 'class'=>'btn btn-success mx-auto my-2')); ?>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
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
                        <a href="#" data-bs-toggle="modal" data-id="<?= $data->id ?>" data-bs-target="#modalproduk" class="btn tampilModalUbah btn-primary p-1" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="<?= base_url() ?>main/delete/<?= $data->id ?>" class="btn btn-danger p-1" onClick="return confirm('ingin menghapus user?')" data-toggle="tooltip" data-placement="bottom" title="Hapus Data">
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
                <form action="main/update" class="form form-horizontal" method="POST">
                    <div class="form-body">
                    <div class="row">
                            <div class="col-md-4">
                                <label for="nama_pelanggan">Nama Pelanggan</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" name="id" id="id">
                                <input type="text" class="form-control" placeholder="Nama Pelanggan" name="first_name" id="first_name" required>
                                <?php echo form_error('first_name', '<div class="alert alert-danger" role="alert">', '</div>') ?>
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
                                <input type="number" id="no_hp" class="form-control" name="no_hp" placeholder="081230.." required>
                                <?php echo form_error('no_hp', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                            </div>
                            <div class="col-md-4">
                                <label for="role">Role</label>
                            </div>
                            <div class="col-md-8 mt-4">
                                <select name="role" id="role" class="form-control">
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                                <?php echo form_error('role', '<div class="alert alert-danger" role="alert">', '</div>') ?>
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
            console.log(id);


            $.ajax({
                url: 'main/edit',
                data: {id : id},
                method: 'post',
                dataType:'json',
                success:function(data){
                    console.log(data)
                    $('#id').val(data.id);
                    $('#first_name').val(data.first_name);
                    $('#alamat').val(data.alamat);
                    $('#no_hp').val(data.no_hp);
                    $('#role').val(data.role);
                }
            });
        });
    });
</script>