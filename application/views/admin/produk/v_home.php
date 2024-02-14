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
<h3>Input Produk</h3>
<div class="card">
    <div class="card-body">
        <?php echo form_open_multipart(site_url().'produk/add'); ?>
            <div class="row">
                <div class="col-md-4">
                    <label for="nama_brg">Nama Produk</label>
                    <input type="text" class="form-control" placeholder="Nama Produk" name="nama_brg" required>
                    <?php echo form_error('nama_brg', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                </div>
                <div class="col-md-4">
                    <label for="jenis_brg">Jenis Produk</label>
                    <select name="jenis_brg" id="jenis_brg" class="form-control" required>
                        <option value="">Jenis Produk</option>
                        <option value="Lemari">Lemari</option>
                        <option value="kitchen set">kitchen set</option>
                    </select>
                    <?php echo form_error('jenis_brg', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                </div>
                <div class="col-md-2">
                    <label for="harga">Harga Permeter</label>
                    <input type="number" class="form-control" name="harga_permeter" placeholder="012345.." required>
                    <small class="text-warning">Masukan tanpa koma atau titik</small>
                    <?php echo form_error('harga', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                </div>
                <div class="col-md-2">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="stok" placeholder="012345.." required>
                    <?php echo form_error('jumlah', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-4">
                    <label for="tinggi">Tinggi <span>m<sup>2</sup></span></label>
                    <input type="text" class="form-control" name="tinggi" placeholder="tinggi" required>
                    <?php echo form_error('tinggi', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                </div>
                <div class="col-md-4">
                    <label for="lebar">Lebar <span>m<sup>2</sup></span></label>
                    <input type="text" class="form-control" name="lebar" placeholder="lebar" required>
                    <?php echo form_error('lebar', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                </div>
                <div class="col-md-3">
                    <label for="foto_brg">Foto Produk</label>
                    <input type="file" name="foto_brg" id="foto_brg" class="form-control">
                    <?php echo form_error('deskripsi', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                </div>
                <div class="col-md-8">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" cols="30" rows="5"></textarea>
                    <?php echo form_error('deskripsi', '<div class="alert alert-danger" role="alert">', '</div>') ?>
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
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Jenis Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $no=1; foreach($produk as $data): ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td>
                    <img src="<?= base_url() ?>foto_produk/<?= $data->foto_brg ?>" style="width:100px;height:100px;" class="img-fluid rounded-3" alt="Bangku">
                    </td>
                    <td><?= $data->nama_brg ?></td>
                    <td><?= $data->jenis_brg ?></td>
                    <td><?= $data->stok ?></td>
                    <td><?= $data->harga ?></td>
                    <td><?= $data->deskripsi ?></td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-id="<?= $data->id_produk ?>" data-bs-target="#modalproduk" class="btn tampilModalUbah btn-primary p-1" data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                            <i class="fa-solid fa-pencil"></i>
                        </span>
                        </a>
                        <a href="<?= base_url() ?>produk/delete/<?= $data->id_produk ?>" class="btn btn-danger p-1" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" onClick="return confirm('Ingin Menghapus?')">
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="produk/update" class="form form-horizontal" enctype="multipart/form-data" method="POST">
                    <div class="form-body">
                    <div class="row">
                            <div class="col-md-4">
                                <label for="nama_produk">Nama Produk</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" name="id_produk" id="id_produk">
                                <input type="text" class="form-control" placeholder="Nama Produk" name="nama_brg" id="nama_produk">
                                <?php echo form_error('nama_brg', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                            </div>
                            <div class="col-md-4">
                                <label for="jenis_brg">Jenis Produk</label>
                            </div>
                            <div class="col-md-8  my-2">
                                <select name="jenis_brg" id="jenis_brg" class="form-control">
                                    <option value="Kitchen Set">Kitchen Set</option>
                                    <option value="Backdrop Tv">Backdrop Tv</option>
                                    <option value="Backdrop Dinding">Backdrop Dinding</option>
                                    <option value="Lemari Pakaian">Lemari Pakaian</option>
                                    <option value="Lemari Pembatas">Lemari Pembatas</option>
                                    <option value="Meja Bar">Meja Bar</option>
                                    <option value="Kursi Sofa">Kursi Sofa</option>
                                </select>
                                <?php echo form_error('jenis_brg', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                            </div>
                            <div class="col-md-4">
                                <label for="jumlah">Jumlah</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="stok" id="jumlah" placeholder="012345.." >
                                <?php echo form_error('jumlah', '<div class="alert alert-danger" role="alert">', '</div>') ?>    
                            </div>
                            <div class="col-md-4">
                                <label for="harga">Harga</label>
                            </div>
                            <div class="col-md-8 my-2">
                                <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Satuan/set" >
                                <?php echo form_error('harga', '<div class="alert alert-danger" role="alert">', '</div>') ?>    
                            </div>
                            <div class="col-md-4">
                                <label for="foto_brg">Foto Produk</label>
                            </div>
                            <div class="col-md-8">
                                <img id="previewImage" alt="Foto Produk" style="max-width: 50%; height: auto;">
                                <input type="file" name="foto_brg" id="foto_brg" class="form-control">
                                <span class="text-danger" style="font-size:9pt;">Kosongkan jika tidak ingin mengubah gambar</span>
                                <?php echo form_error('deskripsi', '<div class="alert alert-danger" role="alert">', '</div>') ?>    
                            </div>
                            <div class="col-md-4">
                                <label for="deskripsi">deskripsi</label>
                            </div>
                            <div class="col-md-8 my-2">
                                <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="5"></textarea>
                                <!-- <input type="text" id="deskripsi" class="form-control"> -->
                                <?php echo form_error('deskripsi', '<div class="alert alert-danger" role="alert">', '</div>') ?>    
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
                url: 'produk/edit',
                data: {id : id},
                method: 'post',
                dataType:'json',
                success:function(data){
                    $('#id_produk').val(data.id_produk);
                    $('#nama_produk').val(data.nama_brg);
                    $('#jenis_brg option:contains("'+data.jenis_brg+'")').prop('selected', true);
                    $('#jumlah').val(data.stok);
                    $('#harga').val(data.harga);
                    $('#deskripsi').val(data.deskripsi);
                    $('#previewImage').attr('src', './foto_produk/' + data.foto_brg);
                    console.log(data)
                }
            });
            // console.log(data);
        });
    });
</script>