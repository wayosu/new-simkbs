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
                                        <th rowspan="3" style="vertical-align: middle;">No</th>
                                        <th rowspan="3" style="vertical-align: middle;">Dusun</th>
                                        <th colspan="26" style="text-align: center;">Menurut Kelompok umur</th>
                                        <th rowspan="3" style="vertical-align: middle;">Jumlah</th>
                                    </tr>
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
                                        <tr>
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
                                    <tr>
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
</section>


<!-- PENDIDIKAN -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pendidikan</h3>
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
                                        <th colspan="20" style="text-align: center;">Pendidikan Terakhir</th>
                                        <th rowspan="3">JUMLAH</th>
                                    </tr>
                                    <th colspan="2">Tidak Sekolah</th>
                                    <th colspan="2">SD</th>
                                    <th colspan="2">SMP</th>
                                    <th colspan="2">SMA</th>
                                    <th colspan="2">D3</th>
                                    <th colspan="2">S1</th>
                                    <th colspan="2">S2</th>
                                    <th colspan="2">S3</th>
                                    <th colspan="2">Pesantren</th>
                                    <th colspan="2">Lainnya</th>
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
                                        <th colspan="26" style="text-align: center;">Pekerjaan Utama</th>
                                        <th rowspan="3">JUMLAH</th>
                                    </tr>
                                    <tr>
                                    <th colspan="2">Petani</th>
                                    <th colspan="2">Buruh Tani</th>
                                    <th colspan="2">Nelayan</th>
                                    <th colspan="2">Buruh Bangunan</th>
                                    <th colspan="2">Buruh Perkebunan</th>
                                    <th colspan="2">Pedagang</th>
                                    <th colspan="2">Industri</th>
                                    <th colspan="2">Guru</th>                                    
                                    <th colspan="2">PNS</th>
                                    <th colspan="2">Pensiunan</th>
                                    <th colspan="2">Perangkat Desa</th>
                                    <th colspan="2">TKI</th>
                                    <th colspan="2">Lainnya</th>
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
                                        while($rowpu = $querypu->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><?= $nomor++ ?></td>
                                            <td>Dusun <?= $rowpu['DSN'] ?></td>

                                            <!-- petani -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Petani' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Petani' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Buruh Tani -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Tani' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Tani' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Nelayan -->
                                             <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Nelayan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Nelayan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Buruh Bangunan -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Bangunan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Bangunan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Buruh Perkebunan -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Perkebunan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Perkebunan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                             <!-- Pedagang -->
                                             <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pedagang' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pedagang' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Pengolahan/Industri -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pengolahan/Industri' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pengolahan/Industri' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Guru -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Guru' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Guru' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- PNS -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'PNS' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'PNS' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Pensiunan -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pensiunan' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pensiunan' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- Perangkat Desa -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Perangkat Desa' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Perangkat Desa' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->

                                            <!-- TKI -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'TKI' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'TKI' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->
                                            
                                            <!-- Lainnya -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Lainnya' AND tabel_kependudukan.JK = '1' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Lainnya' AND tabel_kependudukan.JK = '2' AND tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <td><?= $row_pekerjaanlaki['ttl'] ?></td>
                                            <td><?= $row_pekerjaanperempuan['ttl'] ?></td>
                                            <!-- // -->
                                            <?php
                                                $query_total = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_kependudukan.DSN = '$rowpu[DSN]'");
                                                $row_total = $query_total->fetch_assoc();
                                            ?>
                                            <th><?=$x[] = $row_total['ttl'] ?></th>
                                        </tr>
                                        <?php
                                        }
                                    ?>
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">JUMLAH</th>
                                         <!-- petani -->
                                         <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Petani' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Petani' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                            <!-- Buruh Tani -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Tani' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Tani' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                            <!-- Nelayan -->
                                             <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Nelayan' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Nelayan' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                            <!-- Buruh Bangunan -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Bangunan' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Bangunan' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                            <!-- Buruh Perkebunan -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Perkebunan' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Buruh Perkebunan' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                             <!-- Pedagang -->
                                             <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pedagang' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pedagang' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                            <!-- Pengolahan/Industri -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pengolahan/Industri' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pengolahan/Industri' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                            <!-- Guru -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Guru' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Guru' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                            <!-- PNS -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'PNS' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'PNS' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                            <!-- Pensiunan -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pensiunan' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Pensiunan' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                            <!-- Perangkat Desa -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Perangkat Desa' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Perangkat Desa' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->

                                            <!-- TKI -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'TKI' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'TKI' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->
                                            
                                            <!-- Lainnya -->
                                            <?php
                                                $query_pekerjaanlaki = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Lainnya' AND tabel_kependudukan.JK = '1'");
                                                $row_pekerjaanlaki = $query_pekerjaanlaki->fetch_assoc();
                                                $query_pekerjaanperempuan = $mysqli->query("SELECT count(tabel_kependudukan.NIK) AS ttl FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN = 'Lainnya' AND tabel_kependudukan.JK = '2'");
                                                $row_pekerjaanperempuan = $query_pekerjaanperempuan->fetch_assoc();                     
                                            ?>
                                            <th><?= $row_pekerjaanlaki['ttl'] ?></th>
                                            <th><?= $row_pekerjaanperempuan['ttl'] ?></th>
                                            <!-- // -->
                                            <th><?= array_sum($x) ?></th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
</section>

<!-- AKHIR PEKERJAAN -->

