<div class="container my-3">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Akun Saya</h2>
        </div>
    </div>
    <div class="row my-2 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card bg-light">
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="username" value="<?= $datauser['email'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Pengguna</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="nama" value="<?= $datauser['first_name'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-4 col-form-label">No HP</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="no_hp" value="<?= $datauser['no_hp'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="alamat" value="<?= $datauser['alamat'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                            <!-- <button type="submit" class="btn btn-primary">Update Data</button> -->
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>