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
                    <a class="nav-link text-light" href="<?= base_url() ?>welcome/warna">
                        <i class="fa-solid fa-palette"></i>
                        Warna/Motif
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light" href="<?= base_url() ?>welcome/pemesanan">
                        <i class="fa-solid fa-list-alt"></i>
                        Pemesanan <span class="badge badge-danger" id="notifJumlah"></span>
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light" href="<?= base_url() ?>welcome/riwayat">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        Riwayat
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url() ?>welcome/profile">Profile</a>
                        <a class="dropdown-item text-danger" href="<?= base_url() ?>main/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

<script>
    $(document).ready(function () {
        $.ajax({
            url: '<?= base_url("welcome/countKuantitas") ?>',
            method: 'post',
            dataType:'json',
            success:function(data){
                $('#notifJumlah').text(data.total_quantity);
            }, 
            error: function (xhr, status, error) {
                console.error("Error: " + status, error);
            }
        });
    });
</script>