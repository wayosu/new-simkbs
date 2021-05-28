<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="nav-icon fas fa-sort-numeric-up"></i> Klasifikasi Penduduk</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Klasifikasi Penduduk</li>
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
                        <h3 class="card-title">Umur</h3>
                        <div class="card-tools">
                            <a href="<?= $base_url; ?>app/print/cetak_klasifikasi_umur.php" target="_BLANK" class="btn btn-sm btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
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
                                    $query = $mysqli->query("SELECT * FROM tabel_kependudukan GROUP BY DSN");
                                    while ($row = $query->fetch_assoc()) {
                                    ?>
                                        <tr align="center">
                                            <td><?= $nomor++; ?></td>
                                            <td>Dusun <?= $row['DSN']; ?></td>
                                            <!-- umur 0-5 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 0 and 5");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 0 and 5");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki05 = $row_laki['ttl'] : $laki05 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan05 = $row_perempuan['ttl'] : $perempuan05 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 6-10 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 6 and 10");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 6 and 10");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki610 = $row_laki['ttl'] : $laki610 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan610 = $row_perempuan['ttl'] : $perempuan610 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 11-15 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 11 and 15");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 11 and 15");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki1115 = $row_laki['ttl'] : $laki1115 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan1115 = $row_perempuan['ttl'] : $perempuan1115 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 16-20 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 16 and 20");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 16 and 20");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki1620 = $row_laki['ttl'] : $laki1620 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan1620 = $row_perempuan['ttl'] : $perempuan1620 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 21-25 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 21 and 25");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 21 and 25");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki2125 = $row_laki['ttl'] : $laki2125 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan2125 =  $row_perempuan['ttl'] : $perempuan2125 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 26-30 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 26 and 30");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 26 and 30");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki2630 =  $row_laki['ttl'] : $laki2630 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan2630 = $row_perempuan['ttl'] : $perempuan2630 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 31-35 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 31 and 35");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 31 and 35");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki3135 = $row_laki['ttl'] : $laki3135 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan3135 = $row_perempuan['ttl'] : $perempuan3135 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 36-40 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 36 and 40");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 36 and 40");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki3640 = $row_laki['ttl'] : $laki3640 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan3640 = $row_perempuan['ttl'] : $perempuan3640 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 41-45 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 41 and 45");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 41 and 45");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki4145 = $row_laki['ttl'] : $laki4145 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan4145 = $row_perempuan['ttl'] : $perempuan4145 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 46-50 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 46 and 50");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 46 and 50");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki4650 = $row_laki['ttl'] : $laki4650 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan4650 = $row_perempuan['ttl'] : $perempuan4650 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 51-55 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 51 and 55");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 51 and 55");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki5155 = $row_laki['ttl'] : $laki5155 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan5155 = $row_perempuan['ttl'] : $perempuan5155 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 56-60 -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN BETWEEN 56 and 60");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN BETWEEN 56 and 60");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki5660 = $row_laki['ttl'] : $laki5660 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan5660 = $row_perempuan['ttl'] : $perempuan5660 = '0'; ?></td>
                                            <!-- // -->

                                            <!-- umur 61++ -->
                                            <?php
                                            $querylaki = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='1' AND TAHUN >= 61");
                                            $row_laki = $querylaki->fetch_assoc();
                                            $queryperempuan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN='$row[DSN]' AND JK='2' AND TAHUN >= 61");
                                            $row_perempuan = $queryperempuan->fetch_assoc();
                                            ?>
                                            <td><?= isset($row_laki['ttl']) ? $laki61 = $row_laki['ttl'] : $laki61 = '0'; ?></td>
                                            <td><?= isset($row_perempuan['ttl']) ? $perempuan61 = $row_perempuan['ttl'] : $perempuan61 = '0'; ?></td>
                                            <!-- // -->

                                            <th>
                                                <?php
                                                // echo $laki05 + $perempuan05 + $laki610 + $perempuan610 + $laki1115 + $perempuan1115 + $laki1620 + $perempuan1620 + $laki2125 + $perempuan2125 + $laki2630 + $perempuan2630 + $laki3135 + $perempuan3135 + $laki3640 + $perempuan3640 + $laki4145 + $perempuan4145 + $laki4650 + $perempuan4650 + $laki5155 + $perempuan5155 + $laki5660 + $perempuan5660 + $laki61 + $perempuan61;  
                                                $query_jumlahkanan = $mysqli->query("SELECT count(NIK) AS ttl FROM tabel_kependudukan WHERE DSN = '$row[DSN]'");
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
                            <a href="<?= $base_url; ?>app/print/cetak_klasifikasi_pekerjaan.php" target="_BLANK" class="btn btn-sm btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
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
                                    $querypu = $mysqli->query("SELECT * FROM tabel_kependudukan GROUP BY DSN");
                                    while ($rowpu = $querypu->fetch_assoc()) {
                                    ?>
                                        <tr align="center">
                                            <td style="vertical-align: middle; text-align: center;"><?= $nomor++ ?></td>
                                            <td style="vertical-align: middle; text-align: center;">Dusun <?= $rowpu['DSN'] ?></td>

                                            <!-- petani -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Petani' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Petani' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Buruh Tani -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Tani' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Tani' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Nelayan -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Nelayan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Nelayan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Buruh Bangunan -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Bangunan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Bangunan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Buruh Perkebunan -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Perkebunan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Perkebunan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Pedagang -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pedagang' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pedagang' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Pengolahan/Industri -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pengolahan/Industri' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pengolahan/Industri' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Guru -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Guru' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Guru' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- PNS -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'PNS' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'PNS' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Pensiunan -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pensiunan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pensiunan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Perangkat Desa -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Perangkat Desa' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Perangkat Desa' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- TKI -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'TKI' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'TKI' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Lainnya -->
                                            <?php
                                            $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Lainnya' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                            $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Lainnya' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                            $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();
                                            ?>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->
                                            <?php
                                            $query_total = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_kependudukan.DSN = '$rowpu[DSN]'");
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- AKHIR PEKERJAAN -->