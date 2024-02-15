<div class="card mt-3">
    <div class="card-header">
        <h4>Data Pesanan</h4>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                <th>No</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Pelanggan / username</th>
                    <th>No WA</th>
                    <th>Alamat</th>
                    <th>Tgl Pemesanan</th>
                    <th>Kuantitas</th>
                    <th>Ukuran</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Produk</th>
                    <th>Pelanggan / username</th>
                    <th>No WA</th>
                    <th>Alamat</th>
                    <th>Tgl Pemesanan</th>
                    <th>Kuantitas</th>
                    <th>Ukuran</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </tfoot>
            <tbody>
                <?php $no=1; foreach($riwayat as $data): ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td>
                            <img src="<?= base_url() ?>foto_produk/<?= $data->foto_brg ?>" style="width:100px;height:100px;" class="img-fluid rounded-3" alt="Bangku">
                        </td>
                        <td><?= $data->nama_brg ?></td>
                        <td><?= $data->first_name ?> / <?= $data->email ?></td>
                        <td><?= $data->no_hp ?></td>
                        <td><?= $data->alamat ?></td>
                        <td><?= $data->tgl_pemesanan ?></td>
                        <td><?= $data->kuantitas ?></td>
                        <td>
                            Tinggi:<?= $data->tinggi_dipesan ?>/ <br> Lebar:<?= $data->lebar_dipesan ?>m<sup>2</sup>
                        </td>
                        <td>
                            Rp.<?= $data->harga_satuan ?>
                        </td>
                        <td>
                            <button class="btn p-1 status" data-status="<?= $data->status_pemesanan ?>" data-id="<?= $data->id_detail ?>"><?= $data->status_pemesanan ?></button>
                        </td>
                    </tr>
                <?php $no++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.status').each(function() {
            var currentStatus = $(this).data('status'); // Mendapatkan status saat ini dari data atribut
            if (currentStatus === 'proses') {
                $(this).removeClass('btn-primary').addClass('btn-danger');
            } else if (currentStatus === 'selesai') {
                $(this).removeClass('btn-danger').addClass('btn-primary');
            }
        });
        $('.status').on('click', function() {
            var id = $(this).data('id');
            var currentStatus = $(this).data('status'); // Mendapatkan status saat ini dari data atribut
            var newStatus = (currentStatus === 'proses') ? 'selesai' : 'proses'; // Mengubah status sesuai dengan kondisi saat ini
            console.log(newStatus);

            $.ajax({
                url: '<?= base_url("pemesanan/updateProses") ?>',
                data: {
                    id : id,
                    status: newStatus
                },
                method: 'post',
                dataType:'json',
                success:function(response){
                    console.log(response);
                    if (newStatus === 'proses') {
                        $(this).removeClass('btn-primary').addClass('btn-danger').text('proses');
                    } else if (newStatus === 'selesai') {
                        $(this).removeClass('btn-danger').addClass('btn-primary').text('selesai');
                    }
                    location.reload();
                }, 
                error: function (xhr, status, error) {
                    console.error("Error: " + status, error);
                }
            });
        });
    });
</script>