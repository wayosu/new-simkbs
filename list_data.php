<?php
if (isset($_GET['terapkan'])) {
    $base_url = 'http://localhost/simkbs/';
    include 'app/koneksi.php';
    include 'views/layout/user/header.php';
    include 'views/layout/user/navbar.php';

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
    if (!empty($_GET['pencarian']) && $_GET['pencarian'] == "rekomendasi" && !empty($_GET['dusun'])) {

?>

        <main id="main">
            <div class="pt-3" style="min-height: 629px;">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="text-center">
                            <img src="<?= $base_url; ?>asset_user/img/logo-campur.png" alt="logo" width="5%">
                            <h4>Informasi Rekomendasi Penerima Bantuan</h4>
                            <small>Dusun <?= $_GET['dusun']; ?></small>
                            <!-- pencarian -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                <a href="beranda" class="btn text-light" style="background-color: #042165;">
                                    <span class="fas fa-arrow-alt-circle-left"></span> Kembali</a>
                            </h3>
                            <div class="card">
                                <div class="card-header">
                                    <small class="card-title">Daftar Data Kependudukan</small>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="example1" style="font-size: 14px;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>No. KK</th>
                                                    <th>NIK</th>
                                                    <th>Nama Kepala Keluarga</th>
                                                    <th>Tgl Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Penghasilan</th>
                                                    <th>Dusun</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nomor = 1;
                                                $query = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN='{$_GET['dusun']}'");
                                                while ($row = $query->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?= $nomor++ ?></td>
                                                        <td><?= $row['NO_KK'] ?></td>
                                                        <td><?= $row['NIK'] ?></td>
                                                        <td><?= $row['NAMA_LGKP'] ?></td>
                                                        <td><?= tgl_indo($row['TGL_LHR']) ?></td>
                                                        <td><?= $row['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
                                                        <td>Rp. <?= number_format($row['PENGHASILAN_PER_BULAN']); ?></td>
                                                        <td><?= $row['DSN'] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
        
    <?php
        include 'views/layout/user/footer.php';
    } else if (!empty($_GET['pencarian']) && $_GET['pencarian'] == "penerima" && !empty($_GET['dusun']) && !empty($_GET['jenis_bantuan'])) {
    ?>

        <main id="main" style="min-height: 629px;">
            <div class="pt-3">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="text-center">
                            <img src="<?= $base_url; ?>asset_user/img/logo-campur.png" alt="logo" width="5%">
                            <h4>Informasi Rekomendasi Penerima Bantuan</h4>
                            <small style="font-size: 16px;">Jenis Bantuan : <?= $_GET['jenis_bantuan']; ?></small><br>
                            <small style="font-size: 16px;">Dusun <?= $_GET['dusun']; ?></small>
                            <!-- pencarian -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                <a href="beranda" class="btn text-light" style="background-color: #042165;">
                                    <span class="fas fa-arrow-alt-circle-left"></span> Kembali</a>
                            </h3>
                            <div class="card">
                                <div class="card-header">
                                    <small class="card-title">Daftar Data Kependudukan</small>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="example1" style="font-size: 14px;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>No. KK</th>
                                                    <th>NIK</th>
                                                    <th>Nama Kepala Keluarga</th>
                                                    <th>Tgl Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Penghasilan</th>
                                                    <th>Jenis Bantuan</th>
                                                    <th>Dusun</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $nomor = 1;
                                                $query = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='1' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0' AND DSN='{$_GET['dusun']}' AND jenis_bantuan='{$_GET['jenis_bantuan']}'");
                                                while ($row = $query->fetch_assoc()) {
                                                ?>
                                                    <tr>
                                                        <td><?= $nomor++ ?></td>
                                                        <td><?= $row['NO_KK'] ?></td>
                                                        <td><?= $row['NIK'] ?></td>
                                                        <td><?= $row['NAMA_LGKP'] ?></td>
                                                        <td><?= tgl_indo($row['TGL_LHR']) ?></td>
                                                        <td><?= $row['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
                                                        <td>Rp. <?= number_format($row['PENGHASILAN_PER_BULAN']); ?></td>
                                                        <td><?= $row['jenis_bantuan']; ?></td>
                                                        <td><?= $row['DSN'] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
        
    <?php
        include 'views/layout/user/footer.php';
    } else {
    ?>
        <script>
            alert("Masukkan data secara lengkap !'");
            document.location.href = 'beranda';
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert("Pilih data terlebih dahulu pada form 'Lihat Daftar Penerima Bantuan'");
        document.location.href = 'beranda';
    </script>
<?php
}

?>