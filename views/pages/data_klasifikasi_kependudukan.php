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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th rowspan="3">No</th>
                                        <th rowspan="3">Dusun</th>
                                        <th colspan="26" style="text-align: center;">Menurut Kelompok umur</th>
                                        <th rowspan="3">Jumlah</th>
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
                                     <?php
                                        $nomor = 1;
                                        $query = $mysqli->query("SELECT * FROM tabel_kependudukan GROUP BY DSN");
                                        while($row = $query->fetch_assoc()){
                                        ?>
                                            <tr>
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
                                        <th colspan="2">Jumlah</th>

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
                            <table id="example1" class="table table-bordered table-striped">
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
                            <table id="example1" class="table table-bordered table-striped">
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
                            <table id="example1" class="table table-bordered table-striped">
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