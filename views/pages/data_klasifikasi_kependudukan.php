<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>KLASIFIKASI PENDUDUK</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kelompok Umur</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-sm btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="3" style="vertical-align : middle;text-align: center;">No</th>
                                        <th rowspan="3" style="vertical-align : middle;text-align: center;">Dusun</th>
                                        <th colspan="26" style="text-align: center;">Menurut Kelompok umur</th>
                                        <th rowspan="3" style="vertical-align : middle;text-align: center;">Jumlah</th>
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
                                    <?php
                                    $nomor = 1;
                                    $query = $mysqli->query("SELECT * FROM tabel_kependudukan GROUP BY DSN");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <tr align="center">
                                            <td><?= $nomor++; ?></td>
                                            <td>Dusun <?= $row['DSN']; ?></td>
                                            <!-- umur 0-5 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 0 and 5");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 0 and 5");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 6-10 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='' AND TAHUN BETWEEN 6 and 10");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 6 and 10");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 11-15 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 11 and 15");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 11 and 15");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 16-20 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='' AND TAHUN BETWEEN 16 and 20");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 16 and 20");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 21-25 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 21 and 25");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 21 and 25");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 26-30 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='' AND TAHUN BETWEEN 26 and 30");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 26 and 30");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 31-35 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 31 and 35");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 31 and 35");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 36-40 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='' AND TAHUN BETWEEN 36 and 40");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 36 and 40");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 41-45 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 41 and 45");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 41 and 45");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 46-50 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='' AND TAHUN BETWEEN 46 and 50");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 46 and 50");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 51-55 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 51 and 55");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 51 and 55");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 56-60 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='' AND TAHUN BETWEEN 56 and 60");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 56 and 60");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 61++ -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN > 61");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN > 61");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $row_laki['ttl'] : '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $row_perempuan['ttl'] : '0'; ?></td>
                                            <!-- // -->


                                            <th>asdad</th>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- <td>1</td> -->
                                        <!-- <td>1</td> -->

                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2" style="vertical-align : middle;text-align: center;">Jumlah</th>
                                        <th>test</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PENDIDIKAN -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pendidikan Terakhir</h3>
                        <div class="card-tools">
                            <a href="<?= $base_url; ?>app/print/cetak_klasifikasi_pendidikan.php" target="_BLANK" class="btn btn-sm btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
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
                                    $query_pend = $mysqli->query("SELECT * FROM tabel_kependudukan GROUP BY DSN");
                                    while ($row_pend = $query_pend->fetch_assoc()) {
                                    ?>
                                        <tr align="center">
                                            <td><?= $nomor++; ?></td>
                                            <td>Dusun <?= $row_pend['DSN']; ?></td>

                                            <!-- Tidak Sekolah -->
                                            <?php
                                            $querylaki_ts = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Sekolah'");
                                            $row_laki_ts = $querylaki_ts->fetch_assoc();
                                            $queryperempuan_ts = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Sekolah'");
                                            $row_perempuan_ts = $queryperempuan_ts->fetch_assoc();
                                            ?>
                                            <td><?= $row_laki_ts['ttl']; ?></td>
                                            <td><?= $row_perempuan_ts['ttl']; ?></td>
                                            <!-- End Tidak Sekolah -->

                                            <!-- Tidak Tamat SD -->
                                            <?php
                                            $querylaki_td = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Tamat SD'");
                                            $row_laki_td = $querylaki_td->fetch_assoc();
                                            $queryperempuan_td = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Tamat SD'");
                                            $row_perempuan_td = $queryperempuan_td->fetch_assoc();
                                            ?>
                                            <td><?= $row_laki_td['ttl']; ?></td>
                                            <td><?= $row_perempuan_td['ttl']; ?></td>
                                            <!-- End Tidak SD -->

                                            <!-- SD -->
                                            <?php
                                            $querylaki_sd = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SD dan Sederajat'");
                                            $row_laki_sd = $querylaki_sd->fetch_assoc();
                                            $queryperempuan_sd = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SD dan Sederajat'");
                                            $row_perempuan_sd = $queryperempuan_sd->fetch_assoc();
                                            ?>
                                            <td><?= $row_laki_sd['ttl']; ?></td>
                                            <td><?= $row_perempuan_sd['ttl']; ?></td>
                                            <!-- End SD -->

                                            <!-- SMP -->
                                            <?php
                                            $querylaki_smp = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMP dan Sederajat'");
                                            $row_laki_smp = $querylaki_smp->fetch_assoc();
                                            $queryperempuan_smp = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMP dan Sederajat'");
                                            $row_perempuan_smp = $queryperempuan_smp->fetch_assoc();
                                            ?>
                                            <td><?= $row_laki_smp['ttl']; ?></td>
                                            <td><?= $row_perempuan_smp['ttl']; ?></td>
                                            <!-- End SMP -->

                                            <!-- SMA -->
                                            <?php
                                            $querylaki_sma = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMA dan Sederajat'");
                                            $row_laki_sma = $querylaki_sma->fetch_assoc();
                                            $queryperempuan_sma = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMA dan Sederajat'");
                                            $row_perempuan_sma = $queryperempuan_sma->fetch_assoc();
                                            ?>
                                            <td><?= $row_laki_sma['ttl']; ?></td>
                                            <td><?= $row_perempuan_sma['ttl']; ?></td>
                                            <!-- End SMA -->

                                            <!-- Diploma -->
                                            <?php
                                            $querylaki_dip = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Diploma 1-3'");
                                            $row_laki_dip = $querylaki_dip->fetch_assoc();
                                            $queryperempuan_dip = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='Diploma 1-3'");
                                            $row_perempuan_dip = $queryperempuan_dip->fetch_assoc();
                                            ?>
                                            <td><?= $row_laki_dip['ttl']; ?></td>
                                            <td><?= $row_perempuan_dip['ttl']; ?></td>
                                            <!-- End Diploma -->

                                            <!-- S1 -->
                                            <?php
                                            $querylaki_s1 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S1 dan Sederajat'");
                                            $row_laki_s1 = $querylaki_s1->fetch_assoc();
                                            $queryperempuan_s1 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S1 dan Sederajat'");
                                            $row_perempuan_s1 = $queryperempuan_s1->fetch_assoc();
                                            ?>
                                            <td><?= $row_laki_s1['ttl']; ?></td>
                                            <td><?= $row_perempuan_s1['ttl']; ?></td>
                                            <!-- End S1 -->

                                            <!-- S2 -->
                                            <?php
                                            $querylaki_s2 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S2 dan Sederajat'");
                                            $row_laki_s2 = $querylaki_s2->fetch_assoc();
                                            $queryperempuan_s2 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S2 dan Sederajat'");
                                            $row_perempuan_s2 = $queryperempuan_s2->fetch_assoc();
                                            ?>
                                            <td><?= $row_laki_s2['ttl']; ?></td>
                                            <td><?= $row_perempuan_s2['ttl']; ?></td>
                                            <!-- End S2 -->

                                            <!-- S3 -->
                                            <?php
                                            $querylaki_s3 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='1' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S3 dan Sederajat'");
                                            $row_laki_s3 = $querylaki_s3->fetch_assoc();
                                            $queryperempuan_s3 = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]' AND tabel_kependudukan.JK='2' AND tabel_pendidikan.PENDIDIKAN_TERAKHIR='S3 dan Sederajat'");
                                            $row_perempuan_s3 = $queryperempuan_s3->fetch_assoc();
                                            ?>
                                            <td><?= $row_laki_s3['ttl']; ?></td>
                                            <td><?= $row_perempuan_s3['ttl']; ?></td>
                                            <!-- End S3 -->

                                            <!-- Total L-P -->
                                            <?php
                                            $querytotal_lp = $mysqli->query("SELECT count(NO_KK) AS ttl FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.DSN='$row_pend[DSN]'");
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- AKHIR PENDIDIKAN -->

<!-- PEKERJAAN -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pekerjaan Utama</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-sm btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="3">NO</th>
                                        <th rowspan="3">DUSUN</th>
                                        <th colspan="20" style="text-align: center;">Pekerjaan Utama</th>
                                        <th rowspan="3">JUMLAH</th>
                                    </tr>
                                    <th colspan="2">Petani</th>
                                    <th colspan="2">Nelayan</th>
                                    <th colspan="2">Pedagang</th>
                                    <th colspan="2">Industri</th>
                                    <th colspan="2">Guru</th>
                                    <th colspan="2">Guru Ngaji</th>
                                    <th colspan="2">PNS</th>
                                    <th colspan="2">Pensiunan</th>
                                    <th colspan="2">Perangkat Desa</th>
                                    <th colspan="2">TKI</th>
                                    </tr>
                                    <tr>
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
                                    <tr>
                                        <!-- <td>1</td> -->
                                        <!-- <td>1</td> -->

                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">JUMLAH</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
</section>

<!-- AKHIR PEKERJAAN -->

<!-- STATUS PERNIKAHAN -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Status Pernikahan</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-sm btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3">Dusun</th>
                                        <th colspan="8" style="text-align: center;">Status Pernikahan</th>
                                        <th rowspan="3">Jumlah</th>
                                    </tr>
                                    <th colspan="2">Belum Kawin</th>
                                    <th colspan="2">Kawin</th>
                                    <th colspan="2">Cerai Hidup</th>
                                    <th colspan="2">Cerai Mati</th>

                                    </tr>
                                    <tr>
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
                                    <tr>
                                        <!-- <td>1</td> -->
                                        <!-- <td>1</td> -->

                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">JUMLAH</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
</section>
<!-- AKHIR STATUS PERNKAHAN -->