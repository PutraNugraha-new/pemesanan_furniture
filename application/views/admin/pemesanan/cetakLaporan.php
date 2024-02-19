<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .cetakLaporan tr td{
            font-size:12pt;
        }

        .kop p{
            font-size:12pt;
            font-weight:bold;
            text-align:center;
            margin:0;
        }

        .judul{
            text-align:center;
            font-weight:bold;
        }

        /* Reset some default browser styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        /* Add margin to the table headers */
        th {
            padding: 5px; /* Optional: Add padding for better appearance */
            text-align: left;
            background-color: #f2f2f2; /* Optional: Add background color for the headers */
            border:1px solid #000;
            margin-bottom: 10px; /* Add margin to the bottom of the headers */
        }

        /* Add some styles to the table data cells (optional) */
        td {
            padding: 10px; /* Optional: Add padding for better appearance */
            border: 1px solid #000; /* Optional: Add border to the cells */
        }

        /* Optional: Add some styles to the whole table for better appearance */
        .cetakLaporan {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; /* Add margin to the top of the table */
        }

    </style>
</head>
<body>
<div class="kop">
    <div class="row">
        <div class="col-md-6">
            <p>Blessing Home Art Meubel</p>
            <p>Whatsapp :  0852-4936-4701</p>
            <p>Jln. Tampung Penyang VIII Blok.A PALANGKA, KEC. JEKAN RAYA, KOTA PALANGKARAYA, KALIMANTAN TENGAH.</p>
        </div>
    </div>
</div>
<hr>
<p class="judul">Laporan Pemesanan</p>

<table class="table cetakLaporan" border="1" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Pelanggan / username</th>
            <th>No WA</th>
            <th>Alamat</th>
            <th>Tgl Pemesanan</th>
            <th>Kuantitas</th>
            <th>Spesifikasi</th>
            <th>Harga</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($pemesanan as $data): ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data->nama_brg ?></td>
                <td><?= $data->first_name ?> / <?= $data->email ?></td>
                <td><?= $data->no_hp ?></td>
                <td><?= $data->alamat ?></td>
                <td><?= $data->tgl_pemesanan ?></td>
                <td><?= $data->kuantitas ?></td>
                <td>
                    Tinggi:<?= $data->tinggi_dipesan ?>/ <br> Lebar:<?= $data->lebar_dipesan ?>m<sup>2</sup><br>
                    Rak : <?= $data->rak ?><br>Laci : <?= $data->laci ?><br>Jumlah Pintu : <?= $data->jml_pintu ?><br>
                    Jenis Pintu: <?= $data->jenis_pintu ?><br>Warna : <?= $data->warna ?><br>Jumlah Gantungan : <?= $data->jml_gantungan ?>
                </td>
                <td>
                    Rp.<?= $data->harga_satuan ?>
                </td>
                <td>
                    <?= $data->status_pemesanan ?>
                </td>
                    </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>