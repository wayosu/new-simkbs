<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-indigo elevation-1"><i class="fas fa-male"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pria</span>
                        <span class="info-box-number">
                            <?php
                            $sql_pria = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE JK=1");
                            echo mysqli_num_rows($sql_pria);
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-indigo elevation-1"><i class="fas fa-female"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Wanita</span>
                        <span class="info-box-number">
                            <?php
                            $sql_wanita = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE JK='2'");
                            echo mysqli_num_rows($sql_wanita);
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-indigo elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Penduduk</span>
                        <span class="info-box-number">
                            <?php
                            $sql_total = $mysqli->query("SELECT * FROM tabel_kependudukan");
                            echo mysqli_num_rows($sql_total);
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <!-- End Info boxes -->

        <!-- start info boxes -->
        <div class="row">
            <?php
                $query_dusun = $mysqli->query("SELECT * FROM tabel_dusun");
                while($rows_dusun = $query_dusun->fetch_assoc()) {
                    ?>
                        <div class="col-12 col-sm-6 col-md-4">
                            <!-- small box -->
                            <div class="small-box bg-light">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $tot_dusun = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE DSN='$rows_dusun[id]'");
                                        echo mysqli_num_rows($tot_dusun);
                                        ?>
                                    </h3>
                                    <p><?= $rows_dusun['dusun'] ?></p>
                                </div>
                                <div class="icon text-indigo">
                                    <i class="ion ion-home"></i>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        </div>
        <!-- end info boxes -->

        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Bantuan Sembako (BPNT)</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="Bpnt" width="400" height="400"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Bantuan PKH</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="Pkh" width="400" height="400"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Bantuan Sosial Tunai (BST)</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="Bst" width="400" height="400"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">BLT Dana Desa</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="Blt" width="400" height="400"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Penerima Bantuan</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="rekomPB" width="400" height="400"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </div>
</section>

<script src="<?= $base_url; ?>plugins/newChart.js"></script>

<?php
// Bantuan Sembako (BPNT)
// $rekom_bpnt1 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=1");
// $rows_rekom_bpnt1 = mysqli_num_rows($rekom_bpnt1);
// $rekom_bpnt2 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=2");
// $rows_rekom_bpnt2 = mysqli_num_rows($rekom_bpnt2);
// $rekom_bpnt3 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=3");
// $rows_rekom_bpnt3 = mysqli_num_rows($rekom_bpnt3);

$penerima_bpnt1 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BPNT' AND DSN=1");
$rows_penerima_bpnt1 = mysqli_num_rows($penerima_bpnt1);
$penerima_bpnt2 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BPNT' AND DSN=2");
$rows_penerima_bpnt2 = mysqli_num_rows($penerima_bpnt2);
$penerima_bpnt3 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BPNT' AND DSN=3");
$rows_penerima_bpnt3 = mysqli_num_rows($penerima_bpnt3);
?>
<script>
    var bpnt = document.getElementById('Bpnt');
    var Bpnt = new Chart(bpnt, {
        type: 'bar',
        data: {
            labels: ['Dusun 1', 'Dusun 2', 'Dusun 3'],
            datasets: [{
                label: 'Penerima Bantuan',
                data: [<?= $rows_penerima_bpnt1; ?>, <?= $rows_penerima_bpnt2; ?>, <?= $rows_penerima_bpnt3; ?>],
                backgroundColor: [
                    '#6610f2',
                    '#6610f2',
                    '#6610f2'
                ]
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>

<?php
// Bantuan PKH
// $rekom_pkh1 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=1");
// $rows_rekom_pkh1 = mysqli_num_rows($rekom_pkh1);
// $rekom_pkh2 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=2");
// $rows_rekom_pkh2 = mysqli_num_rows($rekom_pkh2);
// $rekom_pkh3 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=3");
// $rows_rekom_pkh3 = mysqli_num_rows($rekom_pkh3);

$penerima_pkh1 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='PKH' AND DSN=1");
$rows_penerima_pkh1 = mysqli_num_rows($penerima_pkh1);
$penerima_pkh2 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='PKH' AND DSN=2");
$rows_penerima_pkh2 = mysqli_num_rows($penerima_pkh2);
$penerima_pkh3 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='PKH' AND DSN=3");
$rows_penerima_pkh3 = mysqli_num_rows($penerima_pkh3);
?>
<script>
    var pkh = document.getElementById('Pkh');
    var Pkh = new Chart(pkh, {
        type: 'bar',
        data: {
            labels: ['Dusun 1', 'Dusun 2', 'Dusun 3'],
            datasets: [{
                label: 'Penerima Bantuan',
                data: [<?= $rows_penerima_pkh1; ?>, <?= $rows_penerima_pkh2; ?>, <?= $rows_penerima_pkh3; ?>],
                backgroundColor: [
                    '#6610f2',
                    '#6610f2',
                    '#6610f2'
                ]
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>

<?php
// Bantuan BST
// $rekom_bst1 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=1");
// $rows_rekom_bst1 = mysqli_num_rows($rekom_bst1);
// $rekom_bst2 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=2");
// $rows_rekom_bst2 = mysqli_num_rows($rekom_bst2);
// $rekom_bst3 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=3");
// $rows_rekom_bst3 = mysqli_num_rows($rekom_bst3);

$penerima_bst1 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BST' AND DSN=1");
$rows_penerima_bst1 = mysqli_num_rows($penerima_bst1);
$penerima_bst2 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BST' AND DSN=2");
$rows_penerima_bst2 = mysqli_num_rows($penerima_bst2);
$penerima_bst3 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BST' AND DSN=3");
$rows_penerima_bst3 = mysqli_num_rows($penerima_bst3);
?>
<script>
    var bst = document.getElementById('Bst');
    var Bst = new Chart(bst, {
        type: 'bar',
        data: {
            labels: ['Dusun 1', 'Dusun 2', 'Dusun 3'],
            datasets: [{
                label: 'Penerima Bantuan',
                data: [<?= $rows_penerima_bst1; ?>, <?= $rows_penerima_bst2; ?>, <?= $rows_penerima_bst3; ?>],
                backgroundColor: [
                    '#6610f2',
                    '#6610f2',
                    '#6610f2'
                ]
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>

<?php
// Bantuan BLT
// $rekom_blt1 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=1");
// $rows_rekom_blt1 = mysqli_num_rows($rekom_blt1);
// $rekom_blt2 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=2");
// $rows_rekom_blt2 = mysqli_num_rows($rekom_blt2);
// $rekom_blt3 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=3");
// $rows_rekom_blt3 = mysqli_num_rows($rekom_blt3);

$penerima_blt1 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BLT' AND DSN=1");
$rows_penerima_blt1 = mysqli_num_rows($penerima_blt1);
$penerima_blt2 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BLT' AND DSN=2");
$rows_penerima_blt2 = mysqli_num_rows($penerima_blt2);
$penerima_blt3 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BLT' AND DSN=3");
$rows_penerima_blt3 = mysqli_num_rows($penerima_blt3);
?>
<script>
    var blt = document.getElementById('Blt');
    var Blt = new Chart(blt, {
        type: 'bar',
        data: {
            labels: ['Dusun 1', 'Dusun 2', 'Dusun 3'],
            datasets: [{
                label: 'Penerima Bantuan',
                data: [<?= $rows_penerima_blt1; ?>, <?= $rows_penerima_blt2; ?>, <?= $rows_penerima_blt3; ?>],
                backgroundColor: [
                    '#6610f2',
                    '#6610f2',
                    '#6610f2'
                ]
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>

<?php
// Bantuan Rekomendasi Penerima Bantuan
// $rekom_rekomPB = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0'");
// $rows_rekomPB = mysqli_num_rows($rekom_rekomPB);
// $rekom_blt2 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=2");
// $rows_rekom_blt2 = mysqli_num_rows($rekom_blt2);
// $rekom_blt3 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN=3");
// $rows_rekom_blt3 = mysqli_num_rows($rekom_blt3);

$penerima_bpnt = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BPNT'");
$rows_penerima_bpnt = mysqli_num_rows($penerima_bpnt);
$penerima_pkh = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='PKH'");
$rows_penerima_pkh = mysqli_num_rows($penerima_pkh);
$penerima_bst = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BST'");
$rows_penerima_bst = mysqli_num_rows($penerima_bst);
$penerima_blt = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan=1 AND jenis_bantuan='BLT'");
$rows_penerima_blt = mysqli_num_rows($penerima_blt);
?>
<script>
    var rekompb = document.getElementById('rekomPB');
    var rekomPB = new Chart(rekompb, {
        type: 'doughnut',
        data: {
            labels: [
                'Bantuan Sembako (BPNT)',
                'Bantuan PKH',
                'Bantuan Sosial Tunai (BST)',
                'BLT Dana Desa'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [<?= $rows_penerima_bpnt; ?>, <?= $rows_penerima_pkh; ?>, <?= $rows_penerima_bst; ?>, <?= $rows_penerima_blt; ?>],
                backgroundColor: [
                    '#e83e8c',
                    '#20c997',
                    '#ffc107',
                    '#6f42c1'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>