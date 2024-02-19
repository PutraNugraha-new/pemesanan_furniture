
    <!-- jumbotron -->
    <div class="jumbotron m-0">
        <div class="row">
            <div class="col-md-10">
                <h1 class="display-4">Blessing Home Art</h1>
                <p class="lead text-light">Ruang Anda, Karya Kami: Penuhi Keindahan Rumah Anda dengan Furniture Berkualitas Tinggi.</p>
            </div>
            <div class="col-md-2">
                <a href="#konten" class="btn">
                    <i class="fa-solid fa-arrow-down panah"></i>
                </a>
            </div>
        </div>
    </div>


    <!-- konten -->
    <div class="container-fluid konten m-0  bg-danger" id="konten">
        <div class="row d-flex">
            <div class="col-md-5 col-sm-12 kiri order-md-0 order-1">
                <div class="img-container-kiri">
                    <img src="<?= base_url() ?>assets/images/samples/bangku-border.png" class="img-fluid bangku" alt="Bangku jpg">
                </div>
            </div>
            <div class="col-md-6 kanan order-md-1 order-0 ">
                <div class="row">
                    <div class="col-md-12 justify-content-md-end d-flex">
                        <img src="<?= base_url() ?>assets/images/samples/bangku2.png" class="img-fluid" alt="Bangku">
                    </div>
                    <div class="col-md-10 ">
                        <h3>About Blesing Home Art</h3>
                        <p class="text-justify">Selamat datang di <span class="text-primary font-weight-bold">Blessing Home Art Meubel</span> , tempat di mana Anda menemukan keindahan dan kualitas dalam perabot rumah Anda. Kami menyediakan koleksi unik dari furnitur rumah, dekorasi, dan seni yang akan memberikan sentuhan istimewa pada ruang Anda. <br>

                        Dari gaya klasik hingga <span class="text-primary font-weight-bold">kontemporer</span>, kami memiliki berbagai pilihan untuk memenuhi selera dan kebutuhan Anda. Setiap produk kami dipilih dengan teliti untuk memastikan kualitas, keindahan, dan keandalannya. <br>

                        Apakah Anda mencari <span class="text-warning font-weight-bold">sofa yang nyaman, meja makan yang elegan, atau dekorasi dinding yang menarik perhatian</span> , Blessing Home Art Meubel adalah destinasi Anda. <br>

                        Hubungi Kami Melalui WhatsApp: <span class="text-success font-weight-bold">0852-4936-4701</span>  <br>

                        Jangan ragu untuk menghubungi kami melalui WhatsApp untuk pertanyaan, konsultasi desain, atau untuk memesan produk kami. Kami siap membantu Anda menciptakan rumah impian Anda. <br>

                        Untuk lokasinya bisa datang langsung di <span class="text-primary font-weight-bold">Jln. Tampung Penyang VIII Blok.A PALANGKA, KEC. JEKAN RAYA, KOTA PALANGKARAYA, KALIMANTAN TENGAH.</span> </p>
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
                    <div class="col-md-12 garis mx-auto"></div>
                    <div class="col-md-12 mt-5 p-0 mb-5 d-flex justify-content-center">
                        <img src="<?= base_url() ?>assets/images/samples/sofa-2.jpg" class="img-fluid bangku m-0" alt="Bangku jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid konten-produk">
        <div class="row">
            <h1>All Collection</h1>
            <div class="col-md-12">
                <?php 
                $limit = 3; // Jumlah maksimal produk yang ingin ditampilkan
                $count = 0;
                foreach($produk as $data): 
                    if ($count < $limit):
                ?>
                <div class="row my-3">
                    <div class="col-md-10">
                        <div class="garis"></div>
                    </div>
                    <div class="col-md-2 img-produk">
                        <img src="<?= base_url() ?>foto_produk/<?= $data->foto_brg ?>" class="img-fluid m-0" alt="Bangku jpg">
                    </div>
                    <!-- <div class="col-md-4">
                    </div> -->
                    <div class="col-md-6 ms-0 isi-produk">
                        <p><?= $data->nama_brg ?></p>
                        <h4>Rp. <?= $data->harga ?></h4>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                        <a href="<?= base_url() ?>welcome/detailProduk/<?= $data->id_produk ?>" class="btn">
                            <i class="fa-solid fa-arrow-right panah"></i>
                        </a>
                    </div>
                </div>
                <?php 
                    $count++;
                    else:
                        break;
                    endif;
                    endforeach; 
                ?>
                <?php if (count($produk) > $limit): ?>
                <div class="row my-3">
                    <div class="col-md-12 text-center">
                        <a href="<?= base_url() ?>welcome/produk" class="btn btn-primary text-dark rounded-0">Lihat lebih Banyak</a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
