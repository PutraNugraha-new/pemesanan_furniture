<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard' ? 'active' : '') ?>" href="<?= base_url() ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'produk' ? 'active' : '') ?>" href="<?= base_url() ?>produk">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-basket-shopping"></i></div>
                                Produk
                            </a>
                            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'pemesanan' ? 'active' : '') ?> " href="<?= base_url() ?>pemesanan">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                Pemesanan Custom
                            </a>
                            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'pelanggan' ? 'active' : '') ?>" href="<?= base_url() ?>pelanggan">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>
                                Pelanggan
                            </a>
                            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'laporan' ? 'active' : '') ?>" href="<?= base_url() ?>laporan">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                                Laporan
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4 bg-success text-light text-center p-2 rounded-2">Halaman <?= $judul ?></h1>