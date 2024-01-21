<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>assets/user/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Blesing Home Art</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand text-light" href="#">
            Blessing Home Art <br>
            <span>Furniture</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto"> <!-- Menambahkan class ml-auto di sini -->
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Riwayat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- jumbotron -->
    <div class="jumbotron m-0">
        <div class="row">
            <div class="col-md-10">
                <h1 class="display-4">Blessing Home Art</h1>
                <p class="lead text-light">Ruang Anda, Karya Kami: Penuhi Keindahan Rumah Anda dengan Furniture Berkualitas Tinggi.</p>
            </div>
            <div class="col-md-2">
                <button class="btn">
                    <i class="fa-solid fa-arrow-down"></i>
                </button>
            </div>
        </div>
    </div>


    <!-- konten -->
    <div class="container-fluid konten m-0">
        <div class="row">
            <div class="col-md-5 kiri">
                <div class="img-container-kiri">
                    <img src="<?= base_url() ?>assets/images/samples/bangku-border.png" class="img-fluid bangku" alt="Bangku jpg">
                </div>
            </div>
            <div class="col-md-6 kanan">
                <div class="row d-flex justify-content-end">
                    <div class="img-container-kanan">
                        <div class="col-md-12 justify-content-end d-flex">
                            <img src="<?= base_url() ?>assets/images/samples/bangku2.png" class="img-fluid" alt="Bangku">
                        </div>
                        <div class="col-md-10">
                            <h3>About Blesing Home Art</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit ab ex dolores qui fugiat velit enim, amet, eos sunt accusamus maiores unde perspiciatis itaque iste suscipit inventore sit exercitationem reprehenderit beatae adipisci reiciendis nobis nesciunt quod illo! Assumenda, nihil qui, itaque quis quam tempore maxime numquam vel consequuntur explicabo optio.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid konten-2">
        <div class="row">
            <div class="col-md-3 kiri d-flex align-content-center flex-column">
                <h3>Drawing Room</h3>
                <h4>Modern Lightwight furniture  </h4>
            </div>
            <div class="col-md-7 kanan">
                <div class="row">
                    <div class="col-md-12 ">
                        <h2>Elegent Quality & <br>
                            top notch at everycorner
                        </h2>
                    </div>
                    <div class="col-md-12 garis"></div>
                    <div class="col-md-12 mt-5 p-0">
                        <img src="<?= base_url() ?>assets/images/samples/sofa-2.jpg" class="img-fluid bangku m-0" alt="Bangku jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>