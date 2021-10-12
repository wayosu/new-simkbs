<?php
require_once '../koneksi.php';
$url = "http://$_SERVER[HTTP_HOST]/simkbs/";
$sql_profil = "SELECT * FROM tabel_control WHERE id=1";
$result_profil = $mysqli->query($sql_profil);
$row_profil = $result_profil->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Klasifikasi Berdasarkan Umur</title>
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

    <h4>Klasifikasi Data Kependudukan Berdasarkan Umur</h4>

    <table width="100%" class="display-data">
        <thead>
            <tr align="center">
                <th rowspan="3" style="vertical-align: middle;">No</th>
                <th rowspan="3" style="vertical-align: middle;">Dusun</th>
                <th colspan="26" style="text-align: center;">Umur</th>
                <th rowspan="3" style="vertical-align: middle;">Jumlah</th>
            </tr>
            <tr align="center">
                <th colspan="2">0-5</th>
                <th colspan="2">6-10</th>
                <th colspan="2">11-15</th>
                <th colspan="2">16-20</th>
                <th colspan="2">21-25</th>
                <th colspan="2">26-30</th>
                <th colspan="2">31-35</th>
                <th colspan="2">36-40</th>
                <th colspan="2">41-45</th>
                <th colspan="2">46-50</th>
                <th colspan="2">51-55</th>
                <th colspan="2">56-60</th>
                <th colspan="2">61+</th>
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
            $query = $mysqli->query("SELECT * FROM tabel_dusun GROUP BY dusun");
            while ($row = $query->fetch_assoc()) {
            ?>
                <tr align="center">
                    <td><?= $nomor++; ?></td>
                    <td><?= $row['dusun']; ?></td>
                    <!-- umur 0-5 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 0 and 5");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 0 and 5");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki05 = $row_laki['ttl'] : $laki05 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan05 = $row_perempuan['ttl'] : $perempuan05 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 6-10 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 6 and 10");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 6 and 10");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki610 = $row_laki['ttl'] : $laki610 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan610 = $row_perempuan['ttl'] : $perempuan610 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 11-15 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 11 and 15");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 11 and 15");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki1115 = $row_laki['ttl'] : $laki1115 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan1115 = $row_perempuan['ttl'] : $perempuan1115 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 16-20 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 16 and 20");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 16 and 20");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki1620 = $row_laki['ttl'] : $laki1620 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan1620 = $row_perempuan['ttl'] : $perempuan1620 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 21-25 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 21 and 25");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 21 and 25");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki2125 = $row_laki['ttl'] : $laki2125 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan2125 =  $row_perempuan['ttl'] : $perempuan2125 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 26-30 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 26 and 30");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 26 and 30");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki2630 =  $row_laki['ttl'] : $laki2630 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan2630 = $row_perempuan['ttl'] : $perempuan2630 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 31-35 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 31 and 35");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 31 and 35");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki3135 = $row_laki['ttl'] : $laki3135 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan3135 = $row_perempuan['ttl'] : $perempuan3135 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 36-40 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 36 and 40");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 36 and 40");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki3640 = $row_laki['ttl'] : $laki3640 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan3640 = $row_perempuan['ttl'] : $perempuan3640 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 41-45 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 41 and 45");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 41 and 45");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki4145 = $row_laki['ttl'] : $laki4145 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan4145 = $row_perempuan['ttl'] : $perempuan4145 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 46-50 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 46 and 50");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 46 and 50");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki4650 = $row_laki['ttl'] : $laki4650 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan4650 = $row_perempuan['ttl'] : $perempuan4650 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 51-55 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 51 and 55");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 51 and 55");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki5155 = $row_laki['ttl'] : $laki5155 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan5155 = $row_perempuan['ttl'] : $perempuan5155 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 56-60 -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN BETWEEN 56 and 60");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN BETWEEN 56 and 60");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki5660 = $row_laki['ttl'] : $laki5660 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan5660 = $row_perempuan['ttl'] : $perempuan5660 = '0'; ?></td>
                    <!-- // -->

                    <!-- umur 61++ -->
                    <?php
                    $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='1' AND TAHUN >= 61");
                    $row_laki = $querylaki->fetch_assoc();
                    $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[id]' AND JK='2' AND TAHUN >= 61");
                    $row_perempuan = $queryperempuan->fetch_assoc();
                    ?>
                    <td><?= isset($row_laki['ttl']) ? $laki61 = $row_laki['ttl'] : $laki61 = '0'; ?></td>
                    <td><?= isset($row_perempuan['ttl']) ? $perempuan61 = $row_perempuan['ttl'] : $perempuan61 = '0'; ?></td>
                    <!-- // -->

                    <th>
                        <?php
                        // echo $laki05 + $perempuan05 + $laki610 + $perempuan610 + $laki1115 + $perempuan1115 + $laki1620 + $perempuan1620 + $laki2125 + $perempuan2125 + $laki2630 + $perempuan2630 + $laki3135 + $perempuan3135 + $laki3640 + $perempuan3640 + $laki4145 + $perempuan4145 + $laki4650 + $perempuan4650 + $laki5155 + $perempuan5155 + $laki5660 + $perempuan5660 + $laki61 + $perempuan61;  
                        $query_jumlahkanan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN = '$row[id]'");
                        $row_jumlahkanan = $query_jumlahkanan->fetch_assoc();
                        echo $n[] = $row_jumlahkanan['ttl'];
                        ?>
                    </th>



                </tr>
            <?php
            }

            ?>
        </tbody>
        <tfoot>
            <tr align="center">
                <th colspan="2">Jumlah</th>
                <!-- umur05 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 0 and 5");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 0 and 5");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur610 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 6 and 10");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 6 and 10");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur1115 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 11 and 15");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 11 and 15");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur1620 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 16 and 20");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 16 and 20");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur2125 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 21 and 25");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 21 and 25");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur2630 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 26 and 30");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 26 and 30");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur3135 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 31 and 35");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 31 and 35");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur3640 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 36 and 40");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 36 and 40");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur4145 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 41 and 45");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 41 and 45");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur4650 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 46 and 50");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 46 and 50");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur5155 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 51 and 55");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 51 and 55");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur5650 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN BETWEEN 56 and 60");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN BETWEEN 56 and 60");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->

                <!-- umur60 -->
                <?php
                $querylakij = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='1' AND TAHUN >= 61");
                $row_lakij = $querylakij->fetch_assoc();
                $queryperempuanj = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE JK='2' AND TAHUN >= 61");
                $row_perempuanj = $queryperempuanj->fetch_assoc();
                ?>
                <th><?= $row_lakij['ttl'] ?></th>
                <th><?= $row_perempuanj['ttl'] ?></th>
                <!-- // -->
                <th><?php echo array_sum($n); ?></th>


            </tr>
        </tfoot>
    </table>
</body>

</html>