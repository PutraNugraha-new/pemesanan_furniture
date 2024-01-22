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
                    <a class="nav-link text-light" href="<?= base_url() ?>">
                        <i class="fa-solid fa-house"></i>
                        Beranda
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light" href="<?= base_url() ?>welcome/produk">
                        <i class="fa-solid fa-brush"></i>
                        Produk
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light" href="<?= base_url() ?>welcome/pemesanan">
                        <i class="fa-solid fa-list-alt"></i>
                        Pemesanan
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light" href="<?= base_url() ?>welcome/riwayat">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        Riwayat
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light" href="#">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light" href="#">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>