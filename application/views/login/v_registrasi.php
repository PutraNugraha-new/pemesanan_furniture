<div class="container my-3">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Registrasi</h2>
        </div>
    </div>
    <?php if ($this->session->flashdata('flash_message')): ?>
    <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
        <?= $this->session->flashdata('flash_message'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
    <div class="row my-2 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-body">
                    <form action="<?= base_url() ?>main/adduserPengguna" method="post">
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="email" name="email">
                                <?php echo form_error('email');?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password" name="password">
                                <?php echo form_error('password') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="passconf" class="col-sm-4 col-form-label">Konfirmasi Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="passconf" name="passconf">
                                <?php echo form_error('passconf') ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-4 col-form-label">Nama Pengguna</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="first_name" name="first_name">
                                <?php echo form_error('firstname');?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-4 col-form-label">No HP</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                                <?php echo form_error('no_hp');?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="alamat" name="alamat">
                                <?php echo form_error('alamat');?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Registrasi</button>
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>