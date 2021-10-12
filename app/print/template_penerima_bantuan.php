<?php
require_once '../koneksi.php';
$url = "http://$_SERVER[HTTP_HOST]/simkbs/";
$sql_profil = "SELECT * FROM tabel_control WHERE id=1";
$result_profil = $mysqli->query($sql_profil);
$row_profil = $result_profil->fetch_object();
?>
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
                <img src="<?= $url; ?>dist/img/<?= $row_profil->logo_desa; ?>" alt="logo-kab" width="50">
            </td>
        </tr>
        <tr>
            <td>
                <h3>Kantor <?= $row_profil->nama_desa; ?></h3>
            </td>
        </tr>
        <tr>
            <td>
                <small><?= $row_profil->alamat; ?></small>
            </td>
        </tr>
    </table>

    <h4>Daftar Penerima Bantuan</h4>
    <table width="100%" class="display-data">
        <thead>
            <tr>
                <th>No</th>
                <th>No KK</th>
                <th>NIK</th>
                <th>Kepala Keluarga</th>
                <th>Jenis Bantuan</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Dusun</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $query_penerima = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan='1'");
            while ($row_peneriama = $query_penerima->fetch_assoc()) {
                $sql_dusun = $mysqli->query("SELECT * FROM tabel_dusun WHERE id='$row_peneriama[DSN]'");
                $row_dusun = $sql_dusun->fetch_assoc();
            ?>
                <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= $row_peneriama['NO_KK'] ?></td>
                    <td><?= $row_peneriama['NIK'] ?></td>
                    <td><?= $row_peneriama['NAMA_LGKP'] ?></td>
                    <td><?= $row_peneriama['jenis_bantuan'] ?></td>
                    <td><?= tgl_indo($row_peneriama['TGL_LHR']) ?></td>
                    <td><?= $row_peneriama['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
                    <td><?= $row_dusun['dusun'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>