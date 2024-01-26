<div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="col-md-5">
                <div class="card-body">
                <?php echo form_open_multipart(site_url().'galeri/add'); ?>
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="foto" name="nama_foto" required>
                    <?php echo form_error('nama_foto', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                    <input type="hidden" name="id_produk" value="<?= $id ?>">
                    <button type="submit" class="btn btn-primary my-3">Add Foto</button>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="card">
            <h2>Galeri</h2>
            <div class="row my-3">
            <?php foreach($galeri as $data): ?>
                <div class="col-md-3 position-relative">
                    <img src="<?= base_url() ?>foto_produk/<?= $data->nama_foto ?>" style="width:200px;height:200px;" class="img-fluid rounded-3" alt="Bangku">
                    <div class="delete-icon hapusGaleri" data-id="<?= $data->id_foto ?>">
                        <!-- Tambahkan ikon sampah di sini -->
                        <i class="fa-solid fa-trash text-danger"></i>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.hapusGaleri').on('click', function () {

            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url("galeri/delete") ?>',
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
</script>