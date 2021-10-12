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

    <h4>Klasifikasi Data Kependudukan Berdasarkan Pendidikan Terakhir</h4>

    <table width="100%" class="display-data">
        <thead>
            <tr>
                <th rowspan="3" style="vertical-align : middle;text-align: center;">NO</th>
                <th rowspan="3" style="vertical-align : middle;text-align: center;">DUSUN</th>
                <th colspan="18" style="text-align: center;">Pendidikan Terakhir</th>
                <th rowspan="3" style="vertical-align : middle;text-align: center;">JUMLAH</th>
            </tr>
            <tr align="center">
                <th colspan="2">Tidak Sekolah</th>
                <th colspan="2">Tidak Tamat SD</th>
                <th colspan="2">SD</th>
                <th colspan="2">SMP</th>
                <th colspan="2">SMA</th>
                <th colspan="2">D3</th>
                <th colspan="2">S1</th>
                <th colspan="2">S2</th>
                <th colspan="2">S3</th>
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
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $query_pend = $mysqli->query("SELECT * FROM tabel_dusun GROUP BY dusun");
            while ($row_pend = $query_pend->fetch_assoc()) {
            ?>
                <tr align="center">
                    <td><?= $nomor++; ?></td>
                    <td><?= $row_pend['dusun']; ?></td>

                    <!-- Tidak Sekolah -->
                    <?php
                    $querylaki_ts = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Sekolah'");
                    $row_laki_ts = $querylaki_ts->fetch_assoc();
                    $queryperempuan_ts = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Sekolah'");
                    $row_perempuan_ts = $queryperempuan_ts->fetch_assoc();
                    ?>
                    <td><?= $row_laki_ts['ttl']; ?></td>
                    <td><?= $row_perempuan_ts['ttl']; ?></td>
                    <!-- End Tidak Sekolah -->

                    <!-- Tidak Tamat SD -->
                    <?php
                    $querylaki_td = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Tamat SD'");
                    $row_laki_td = $querylaki_td->fetch_assoc();
                    $queryperempuan_td = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Tamat SD'");
                    $row_perempuan_td = $queryperempuan_td->fetch_assoc();
                    ?>
                    <td><?= $row_laki_td['ttl']; ?></td>
                    <td><?= $row_perempuan_td['ttl']; ?></td>
                    <!-- End Tidak SD -->

                    <!-- SD -->
                    <?php
                    $querylaki_sd = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SD dan Sederajat'");
                    $row_laki_sd = $querylaki_sd->fetch_assoc();
                    $queryperempuan_sd = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SD dan Sederajat'");
                    $row_perempuan_sd = $queryperempuan_sd->fetch_assoc();
                    ?>
                    <td><?= $row_laki_sd['ttl']; ?></td>
                    <td><?= $row_perempuan_sd['ttl']; ?></td>
                    <!-- End SD -->

                    <!-- SMP -->
                    <?php
                    $querylaki_smp = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMP dan Sederajat'");
                    $row_laki_smp = $querylaki_smp->fetch_assoc();
                    $queryperempuan_smp = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMP dan Sederajat'");
                    $row_perempuan_smp = $queryperempuan_smp->fetch_assoc();
                    ?>
                    <td><?= $row_laki_smp['ttl']; ?></td>
                    <td><?= $row_perempuan_smp['ttl']; ?></td>
                    <!-- End SMP -->

                    <!-- SMA -->
                    <?php
                    $querylaki_sma = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMA dan Sederajat'");
                    $row_laki_sma = $querylaki_sma->fetch_assoc();
                    $queryperempuan_sma = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMA dan Sederajat'");
                    $row_perempuan_sma = $queryperempuan_sma->fetch_assoc();
                    ?>
                    <td><?= $row_laki_sma['ttl']; ?></td>
                    <td><?= $row_perempuan_sma['ttl']; ?></td>
                    <!-- End SMA -->

                    <!-- Diploma -->
                    <?php
                    $querylaki_dip = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Diploma 1-3'");
                    $row_laki_dip = $querylaki_dip->fetch_assoc();
                    $queryperempuan_dip = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Diploma 1-3'");
                    $row_perempuan_dip = $queryperempuan_dip->fetch_assoc();
                    ?>
                    <td><?= $row_laki_dip['ttl']; ?></td>
                    <td><?= $row_perempuan_dip['ttl']; ?></td>
                    <!-- End Diploma -->

                    <!-- S1 -->
                    <?php
                    $querylaki_s1 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S1 dan Sederajat'");
                    $row_laki_s1 = $querylaki_s1->fetch_assoc();
                    $queryperempuan_s1 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S1 dan Sederajat'");
                    $row_perempuan_s1 = $queryperempuan_s1->fetch_assoc();
                    ?>
                    <td><?= $row_laki_s1['ttl']; ?></td>
                    <td><?= $row_perempuan_s1['ttl']; ?></td>
                    <!-- End S1 -->

                    <!-- S2 -->
                    <?php
                    $querylaki_s2 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S2 dan Sederajat'");
                    $row_laki_s2 = $querylaki_s2->fetch_assoc();
                    $queryperempuan_s2 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S2 dan Sederajat'");
                    $row_perempuan_s2 = $queryperempuan_s2->fetch_assoc();
                    ?>
                    <td><?= $row_laki_s2['ttl']; ?></td>
                    <td><?= $row_perempuan_s2['ttl']; ?></td>
                    <!-- End S2 -->

                    <!-- S3 -->
                    <?php
                    $querylaki_s3 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S3 dan Sederajat'");
                    $row_laki_s3 = $querylaki_s3->fetch_assoc();
                    $queryperempuan_s3 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S3 dan Sederajat'");
                    $row_perempuan_s3 = $queryperempuan_s3->fetch_assoc();
                    ?>
                    <td><?= $row_laki_s3['ttl']; ?></td>
                    <td><?= $row_perempuan_s3['ttl']; ?></td>
                    <!-- End S3 -->

                    <!-- Total L-P -->
                    <?php
                    $querytotal_lp = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[id]'");
                    $row_total_lp = $querytotal_lp->fetch_assoc();
                    ?>
                    <th><?= $row_total_lp['ttl']; ?></th>

                    <!-- End Total L-P -->
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr align="center">
                <th colspan="2" style="vertical-align : middle;text-align: center;">JUMLAH</th>
                <!-- total L,P > TS -->
                <?php
                $querytotal_l = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Sekolah'");
                $row_total_l = $querytotal_l->fetch_assoc();
                $querytotal_p = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Sekolah'");
                $row_total_p = $querytotal_p->fetch_assoc();
                ?>
                <th><?= $row_total_l['ttl']; ?></th>
                <th><?= $row_total_p['ttl']; ?></th>
                <!-- end total L,P > TS -->

                <!-- total L,P > TD -->
                <?php
                $querytotal_td_l = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Tamat SD'");
                $row_total_td_l = $querytotal_td_l->fetch_assoc();
                $querytotal_td_p = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Tamat SD'");
                $row_total_td_p = $querytotal_td_p->fetch_assoc();
                ?>
                <th><?= $row_total_td_l['ttl']; ?></th>
                <th><?= $row_total_td_p['ttl']; ?></th>
                <!-- end total L,P > TD -->

                <!-- total L,P > SD -->
                <?php
                $querytotal_sd_l = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SD dan Sederajat'");
                $row_total_sd_l = $querytotal_sd_l->fetch_assoc();
                $querytotal_sd_p = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SD dan Sederajat'");
                $row_total_sd_p = $querytotal_sd_p->fetch_assoc();
                ?>
                <th><?= $row_total_sd_l['ttl']; ?></th>
                <th><?= $row_total_sd_p['ttl']; ?></th>
                <!-- end total L,P > SD -->

                <!-- total L,P > SMP -->
                <?php
                $querytotal_smp_l = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMP dan Sederajat'");
                $row_total_smp_l = $querytotal_smp_l->fetch_assoc();
                $querytotal_smp_p = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMP dan Sederajat'");
                $row_total_smp_p = $querytotal_smp_p->fetch_assoc();
                ?>
                <th><?= $row_total_smp_l['ttl']; ?></th>
                <th><?= $row_total_smp_p['ttl']; ?></th>
                <!-- end total L,P > SMP -->

                <!-- total L,P > SMA -->
                <?php
                $querytotal_sma_l = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMA dan Sederajat'");
                $row_total_sma_l = $querytotal_sma_l->fetch_assoc();
                $querytotal_sma_p = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMA dan Sederajat'");
                $row_total_sma_p = $querytotal_sma_p->fetch_assoc();
                ?>
                <th><?= $row_total_sma_l['ttl']; ?></th>
                <th><?= $row_total_sma_p['ttl']; ?></th>
                <!-- end total L,P > SMA -->

                <!-- total L,P > Diploma -->
                <?php
                $querytotal_dip_l = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Diploma 1-3'");
                $row_total_dip_l = $querytotal_dip_l->fetch_assoc();
                $querytotal_dip_p = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Diploma 1-3'");
                $row_total_dip_p = $querytotal_dip_p->fetch_assoc();
                ?>
                <th><?= $row_total_dip_l['ttl']; ?></th>
                <th><?= $row_total_dip_p['ttl']; ?></th>
                <!-- end total L,P > Diploma -->

                <!-- total L,P > S1 -->
                <?php
                $querytotal_s1_l = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S1 dan Sederajat'");
                $row_total_s1_l = $querytotal_s1_l->fetch_assoc();
                $querytotal_s1_p = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S1 dan Sederajat'");
                $row_total_s1_p = $querytotal_s1_p->fetch_assoc();
                ?>
                <th><?= $row_total_s1_l['ttl']; ?></th>
                <th><?= $row_total_s1_p['ttl']; ?></th>
                <!-- end total L,P > S1 -->

                <!-- total L,P > S2 -->
                <?php
                $querytotal_s2_l = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S2 dan Sederajat'");
                $row_total_s2_l = $querytotal_s2_l->fetch_assoc();
                $querytotal_s2_p = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S2 dan Sederajat'");
                $row_total_s2_p = $querytotal_s2_p->fetch_assoc();
                ?>
                <th><?= $row_total_s2_l['ttl']; ?></th>
                <th><?= $row_total_s2_p['ttl']; ?></th>
                <!-- end total L,P > S2 -->

                <!-- total L,P > S3 -->
                <?php
                $querytotal_s3_l = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S3 dan Sederajat'");
                $row_total_s3_l = $querytotal_s3_l->fetch_assoc();
                $querytotal_s3_p = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S3 dan Sederajat'");
                $row_total_s3_p = $querytotal_s3_p->fetch_assoc();
                ?>
                <th><?= $row_total_s3_l['ttl']; ?></th>
                <th><?= $row_total_s3_p['ttl']; ?></th>
                <!-- end total L,P > S3 -->

                <!-- total L,P > Total -->
                <?php
                $querytotal_from_total = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK");
                $row_total_from_total = $querytotal_from_total->fetch_assoc();
                ?>
                <th><?= $row_total_from_total['ttl']; ?></th>
                <!-- end total L,P > Total -->
            </tr>
        </tfoot>
    </table>
</body>

</html>