<?php 
    require_once '../koneksi.php';
    $url= "http://$_SERVER[HTTP_HOST]/simkbs/";
    $sql_profil = "SELECT * FROM tabel_control WHERE id=1";
    $result_profil = $mysqli->query($sql_profil);
    $row_profil = $result_profil->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Klasifikasi Berdasarkan Pekerjaan Utama</title>
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

    <h4>Klasifikasi Data Kependudukan Berdasarkan Pekerjaan Utama</h4>

    <table width="100%" class="display-data">
        <thead>
            <tr align="center">
                <th rowspan="3" style="vertical-align: middle; text-align: center;">NO</th>
                <th rowspan="3" style="vertical-align: middle; text-align: center;">DUSUN</th>
                <th colspan="26" style="vertical-align: middle; text-align: center;">Pekerjaan Utama</th>
                <th rowspan="3" style="vertical-align: middle; text-align: center;">JUMLAH</th>
            </tr>
            <tr align="center">
                <th colspan="2" style="vertical-align: middle; text-align: center;">Petani</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">Buruh Tani</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">Nelayan</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">Buruh Bangunan</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">Buruh Perkebunan</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">Pedagang</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">Industri</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">Guru</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">PNS</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">Pensiunan</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">Perangkat Desa</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">TKI</th>
                <th colspan="2" style="vertical-align: middle; text-align: center;">Lainnya</th>
            </tr>
            <tr align="center">
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $querypu = $mysqli->query("SELECT * FROM tabel_dusun GROUP BY dusun");
            while ($rowpu = $querypu->fetch_assoc()) {
            ?>
                <tr align="center">
                    <td style="vertical-align: middle; text-align: center;"><?= $nomor++ ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $rowpu['dusun'] ?></td>

                    <!-- petani -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Petani' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Petani' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- Buruh Tani -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Tani' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Tani' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- Nelayan -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Nelayan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Nelayan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- Buruh Bangunan -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Bangunan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Bangunan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- Buruh Perkebunan -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Perkebunan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Perkebunan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- Pedagang -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pedagang' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pedagang' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- Pengolahan/Industri -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pengolahan/Industri' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pengolahan/Industri' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- Guru -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Guru' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Guru' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- PNS -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'PNS' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'PNS' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- Pensiunan -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pensiunan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pensiunan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- Perangkat Desa -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Perangkat Desa' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Perangkat Desa' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- TKI -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'TKI' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'TKI' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->

                    <!-- Lainnya -->
                    <?php
                    $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Lainnya' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                    $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Lainnya' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                    ?>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                    <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                    <!-- // -->
                    <?php
                    $query_total = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_kependudukan.DSN = '$rowpu[id]'");
                    $row_total = $query_total->fetch_assoc();
                    ?>
                    <th style="vertical-align: middle; text-align: center;"><?= $x[] = $row_total['ttl'] ?></th>
                </tr>
            <?php
            }
            ?>

        </tbody>
        <tfoot>
            <tr align="center">
                <th colspan="2" style="vertical-align: middle; text-align: center;" style="vertical-align: middle; text-align: center;">JUMLAH</th>
                <!-- petani -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Petani' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Petani' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- Buruh Tani -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Tani' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Tani' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- Nelayan -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Nelayan' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Nelayan' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- Buruh Bangunan -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Bangunan' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Bangunan' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- Buruh Perkebunan -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Perkebunan' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Perkebunan' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- Pedagang -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pedagang' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pedagang' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- Pengolahan/Industri -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pengolahan/Industri' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pengolahan/Industri' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- Guru -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Guru' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Guru' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- PNS -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'PNS' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'PNS' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- Pensiunan -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pensiunan' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pensiunan' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- Perangkat Desa -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Perangkat Desa' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Perangkat Desa' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- TKI -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'TKI' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'TKI' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->

                <!-- Lainnya -->
                <?php
                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Lainnya' AND tabel_kependudukan.JK = '1'");
                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Lainnya' AND tabel_kependudukan.JK = '2'");
                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                ?>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></th>
                <th style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></th>
                <!-- // -->
                <th style="vertical-align: middle; text-align: center;"><?= array_sum($x) ?></th>

            </tr>
        </tfoot>
    </table>
</body>

</html>