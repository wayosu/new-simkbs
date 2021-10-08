<?php require_once '../koneksi.php'; ?>
<?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus', 
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Klasifikasi Berdasarkan Pendidikan Terakhir</title>
    <style>
        .display-data {
            font-size: 12px;
            border: 1px solid black;
            width: 100%;
            border-collapse: collapse;
        }

        .display-data th {
            padding: 8px;
        }

        .display-data th,
        .display-data td {
            border: 1px solid black;
            text-align: center;
            width: auto;
        }

        .display-header {
            margin-bottom: 1rem;
        }

        .display-header td {
            text-align: center;
        }

        h4 {
            text-align: center;
        }
    </style>
</head>

<body>
    <table width="100%" class="display-header">
        <tr>
            <td>
                <img src="../../kabgor.png" alt="logo-kab" width="50">
            </td>
        </tr>
        <tr>
            <td><h3>Kantor Desa Bumela</h3></td>
        </tr>
        <tr>
            <td>
                <small>Bumela, Bilato, Kabupaten Gorontalo, Gorontalo</small> 
            </td>
        </tr>
    </table>

    <h4>Daftar Penerima Bantuan</h4>
    <table width="100%" class="display-data">
    <thead>
        <tr>
            <td>No</td>
            <td>No KK</td>
            <td>NIK</td>
            <td>Kepala Keluarga</td>
            <td>Jenis Bantuan</td>
            <td>Tanggal Lahir</td>
            <td>Jenis Kelamin</td>
            <td>Dusun</td>
        </tr>
    </thead>
    <tbody>
    <?php
     $nomor = 1;
     $query_penerima = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan='1'");
     while($row_peneriama = $query_penerima->fetch_assoc()){
    ?>
     <tr>
        <td><?= $nomor++ ?></td>
        <td><?= $row_peneriama['NO_KK'] ?></td>
        <td><?= $row_peneriama['NIK'] ?></td>
        <td><?= $row_peneriama['NAMA_LGKP'] ?></td>
        <td><?= $row_peneriama['jenis_bantuan'] ?></td>
        <td><?= tgl_indo($row_peneriama['TGL_LHR']) ?></td>
        <td><?= $row_peneriama['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
        <td><?= $row_peneriama['DSN'] ?></td>
    </tr>
    <?php
    }
    ?>
    </tbody>
    </table>
</body></html>
