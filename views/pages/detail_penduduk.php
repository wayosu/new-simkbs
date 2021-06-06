<?php $nik = $_GET['id'];
error_reporting(0);
include 'app/post/post_data_kependudukan.php';  ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3><i class="nav-icon fas fa-user"></i> Detail Data Kependudukan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Kependudukan</li>
                    <li class="breadcrumb-item">Detail Data Penduduk</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<?php
$query = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK JOIN tabel_tabungan ON tabel_kependudukan.NIK = tabel_tabungan.NIK WHERE tabel_kependudukan.NIK = '$nik'");
$row = $query->fetch_assoc();
?>
<section class="content">
    <div class="container-fluid">
        <a href="../data_kependudukan" class="btn text-light" style="background-color: #042165;"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header" style="background-color: #042165;">
                        <h3 class="card-title text-white">Data Individu</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No KK :</label>
                                    <div class="text-primary"><?= $row['NO_KK'] ?></div>

                                </div>
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <div class="text-primary"><?= $row['NIK'] ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <div class="text-primary"><?= $row['NAMA_LGKP'] ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="text-primary"><?= $row['JK'] == '1' ? 'Laki Laki' : 'Perempuan' ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <div class="text-primary"><?= $row['TMPT_LHR'] ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <div class="text-primary"><?= tgl_indo($row['TGL_LHR']) ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <div class="text-primary"><?= $row['AGAMA'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hubungan Keluarga</label>
                                    <div class="text-primary">
                                        <?php
                                        if ($row['HBKEL'] == '1') {
                                            echo 'Kepala Keluarga';
                                        } else if ($row['HBKEL'] == '3') {
                                            echo "Istri";
                                        } else {
                                            echo "Anak";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Ayah</label>
                                    <div class="text-primary"><?= $row['NAMA_LGKP_AYAH'] ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Ibu</label>
                                    <div class="text-primary"><?= $row['NAMA_LGKP_IBU'] ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <div class="text-primary"><?= $row['PENDIDIKAN_TERAKHIR'] ?></div>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan Utama</label>
                                    <div class="text-primary"><?= $row['PEKERJAAN'] ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Penghasilan Per Bulan</label>
                                    <div class="text-primary">Rp. <?= number_format($row['PENGHASILAN_PER_BULAN']) ?></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Dusun</label>
                                    <div class="text-primary"><?= $row['DSN'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$query2 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK JOIN tabel_tabungan ON tabel_kependudukan.NIK = tabel_tabungan.NIK WHERE tabel_kependudukan.NO_KK = '$row[NO_KK]' AND tabel_kependudukan.HBKEL = 1");
$row2 = $query2->fetch_assoc();
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color: #042165;">
                        <h3 class="card-title text-white">Data Konsumsi</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bahan Makanan</label>
                                    <div class="text-primary">
                                        <?php
                                        if ($row2['BAHAN_MAKANAN'] == '1') {
                                            echo 'Daging';
                                        } else if ($row2['BAHAN_MAKANAN'] == '2') {
                                            echo "Susu";
                                        } else if ($row2['BAHAN_MAKANAN'] == '3') {
                                            echo "Ayam";
                                        } else {
                                            echo "Lainnya";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pakaian Per Tahun</label>
                                    <div class="text-primary">
                                        <?php
                                        if ($row2['PAKAIAN_PER_TAHUN'] == '0') {
                                            echo 'Tidak Pernah';
                                        } else if ($row2['PAKAIAN_PER_TAHUN'] == '1') {
                                            echo "1 Stel";
                                        } else if ($row2['PAKAIAN_PER_TAHUN'] == '2') {
                                            echo "2 Stel";
                                        } else if ($row2['PAKAIAN_PER_TAHUN'] == '3') {
                                            echo "3 Stel";
                                        } else {
                                            echo "Lainnya";
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Biaya Pengobatan PUSKESMAS</label><br>
                                    <div class="text-primary">
                                        <?php
                                        if ($row2['BIAYA_PENGOBATAN'] == '0') {
                                            echo 'Tidak Sanggup Membayar';
                                        } else {
                                            echo "Sanggup Membayar";
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Frekuensi Per Minggu</label>
                                    <div class="text-primary">
                                        <?php
                                        if ($row2['FREKUENSI_PER_MINGGU'] == '0') {
                                            echo 'Tidak Pernah';
                                        } else if ($row2['FREKUENSI_PER_MINGGU'] == '1') {
                                            echo "1 Kali Seminggu";
                                        } else if ($row2['FREKUENSI_PER_MINGGU'] == '2') {
                                            echo "2 Kali Seminggu";
                                        } else if ($row2['FREKUENSI_PER_MINGGU'] == '3') {
                                            echo "3 Kali Seminggu";
                                        } else {
                                            echo "Hampir Tiap Hari";
                                        }
                                        ?>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Makan Per Hari</label>
                                    <div class="text-primary">
                                        <?php
                                        if ($row2['MAKAN_PER_HARI'] == '0') {
                                            echo 'Tidak Pernah';
                                        } else if ($row2['MAKAN_PER_HARI'] == '1') {
                                            echo "1 Kali Sehari";
                                        } else if ($row2['MAKAN_PER_HARI'] == '2') {
                                            echo "2 Kali Sehari";
                                        } else if ($row2['MAKAN_PER_HARI'] == '3') {
                                            echo "3 Kali Sehari";
                                        } else {
                                            echo "Lainnya";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: #042165;">
                        <h3 class="card-title text-white">Data Tabungan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>Kepemilikan Tabungan</label><br>
                                    <div class="text-primary">
                                        <?php
                                        if ($row2['KEPEMILIKAN_TABUNGAN'] == '0') {
                                            echo 'Tidak';
                                        } else {
                                            echo "Ya";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Jenis Tabungan</label>
                                    <div class="text-primary">
                                        <?php
                                        if ($row2['JENIS_TABUNGAN'] == '1') {
                                            echo 'Sepeda Motor Kredit';
                                        } else if ($row2['JENIS_TABUNGAN'] == '2') {
                                            echo 'Emas';
                                        } else if ($row2['JENIS_TABUNGAN'] == '3') {
                                            echo 'Hewan Ternak';
                                        } else if ($row2['JENIS_TABUNGAN'] == '4') {
                                            echo 'Kapal Motors';
                                        } else if ($row2['JENIS_TABUNGAN'] == '0') {
                                            echo "Tidak Memiliki Tabungan";
                                        } else {
                                            echo "Barang Modal Lainnya";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Harga</label>
                                <div class="text-primary">
                                    <?php
                                    if ($row2['HARGA'] == '1') {
                                        echo 'Tidak Memiliki Bantuan';
                                    } else {
                                        echo 'Rp. ' . $row['HARGA'];
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: #042165;">
                        <h3 class="card-title text-white">Data Bantuan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label>Penerima Bantuan?</label><br>
                                    <div class="text-primary">
                                        <?php
                                        if ($row2['bantuan'] == '0') {
                                            echo 'Tidak';
                                        } else if ($row2['bantuan'] == '1') {
                                            echo "Ya";
                                        } else {
                                            echo "Tidak";
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Jenis Bantuan</label>
                                    <div class="text-primary">
                                        <?php
                                        if ($row2['jenis_bantuan'] == '' || $row2['jenis_bantuan'] == '--Pilih Jenis Bantuan--') {
                                            echo 'Tidak Memiliki Bantuan';
                                        } else {
                                            echo $row2['jenis_bantuan'];
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>