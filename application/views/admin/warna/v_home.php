<?php if ($this->session->flashdata('success_message')): ?>
    <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
        <?= $this->session->flashdata('success_message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php if ($this->session->flashdata('error_message')): ?>
    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
        <?= $this->session->flashdata('error_message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<h3>Input Warna</h3>
<div class="card">
    <div class="card-body">
        <?php echo form_open_multipart(site_url().'warna/add'); ?>
            <div class="row">
                <div class="col-md-3">
                    <label for="nama_warna">Nama Warna</label>
                    <input type="text" class="form-control" placeholder="Nama Warna" name="nama_warna" required>
                    <?php echo form_error('nama_warna', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                </div>
                <div class="col-md-3">
                    <label for="foto_warna">Foto Warna</label>
                    <input type="file" name="foto_warna" id="foto_warna" class="form-control">
                    <?php echo form_error('foto_warna', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <?php echo form_submit(array('value'=>'Tambah Warna', 'class'=>'btn btn-success mx-auto my-2')); ?>
                </div>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        <h4>Warna</h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Warna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Warna</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $no=1; foreach($warna as $data): ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td>
                    <img src="<?= base_url() ?>foto_warna/<?= $data->foto_warna ?>" style="width:100px;height:100px;" class="img-fluid rounded-3" alt="Warna">
                    </td>
                    <td><?= $data->nama_warna ?></td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-id="<?= $data->id_warna ?>" data-bs-target="#modalproduk" class="btn tampilModalUbah btn-primary p-1" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                            <i class="fa-solid fa-pencil"></i>
                        </span>
                        </a>
                        <a href="<?= base_url() ?>warna/delete/<?= $data->id_warna ?>" class="btn btn-danger p-1" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" onClick="return confirm('Ingin Menghapus?')">
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Warna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="warna/update" class="form form-horizontal" enctype="multipart/form-data" method="POST">
                    <div class="form-body">
                    <div class="row">
                            <div class="col-md-4">
                                <label for="nama_warna">Nama Warna</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" name="id_warna" id="id_warna">
                                <input type="text" class="form-control" placeholder="Nama Warna" name="nama_warna" id="nama_warna">
                                <?php echo form_error('nama_warna', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                            </div>
                            <div class="col-md-4">
                                <label for="foto_warna">Foto Warna</label>
                            </div>
                            <div class="col-md-8 mt-2">
                                <img id="previewImage" alt="Foto Warna" style="max-width: 50%; height: auto;">
                                <input type="file" name="foto_warna" id="foto_warna" class="form-control">
                                <span class="text-danger" style="font-size:9pt;">Kosongkan jika tidak ingin mengubah gambar</span>
                                <?php echo form_error('foto_warna', '<div class="alert alert-danger" role="alert">', '</div>') ?>    
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

            $.ajax({
                url: 'warna/edit',
                data: {id : id},
                method: 'post',
                dataType:'json',
                success:function(data){
                    $('#id_warna').val(data.id_warna);
                    $('#nama_warna').val(data.nama_warna);
                    $('#previewImage').attr('src', './foto_warna/' + data.foto_warna);
                    // console.log(data)
                }
            });
            // console.log(data);
        });
    });
</script>