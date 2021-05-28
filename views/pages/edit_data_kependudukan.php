<?php
include 'app/koneksi.php';
$nik = $_GET['id'];
$sql = $mysqli->query("SELECT * FROM tabel_kependudukan 
                        JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK 
                        JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK 
                        JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK 
                        JOIN tabel_tabungan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_kependudukan.NIK = '$nik'");
$row = $sql->fetch_assoc();

if (isset($_POST['edit_data'])) {
    $nik = $_POST['nik'];

    // data individu
    $nm = $_POST['nm'];
    $jk = $_POST['jk'];
    $tmp_lahir = $_POST['tmp_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];

    $birthDate = new DateTime($tgl_lahir);
    $today = new DateTime("today");

    $tahun = $today->diff($birthDate)->y;
    $bulan = $today->diff($birthDate)->m;
    $hari = $today->diff($birthDate)->d;

    $agama = $_POST['agama'];
    $hubkel = $_POST['hubkel'];
    $nm_ayah = $_POST['nm_ayah'];
    $nm_ibu = $_POST['nm_ibu'];
    $pend_terakhir = $_POST['pend_terakhir'];
    $pekerjaan = $_POST['pekerjaan'];
    $penghasilan = $_POST['penghasilan'];
    $dusun = $_POST['dusun'];

    // data konsumsi
    $bhn_makanan = $_POST['bhn_makanan'];
    $pakaian_pertahun = $_POST['pakaian_pertahun'];
    $biaya_pengobatan = isset($_POST['biaya_pengobatan']) ? $_POST['biaya_pengobatan'] : "1";
    $frekuensi_perminggu = $_POST['frekuensi_perminggu'];
    $makan_perhari = $_POST['makan_perhari'];

    // data tabungan
    $kepem_tabungan = isset($_POST['kepem_tabungan']) ? $_POST['kepem_tabungan'] : "1";
    $jenis_tabungan = isset($_POST['jenis_tabungan']) ? $_POST['kepem_tabungan'] : "0";
    $harga = isset($_POST['harga']) ? $_POST['harga'] : "0";

    $sql_kependudukan = $mysqli->query("UPDATE tabel_kependudukan 
                                        SET NAMA_LGKP='$nm', HBKEL='$hubkel', JK='$jk', TMPT_LHR='$tmp_lahir', 
                                        TGL_LHR='$tgl_lahir', TAHUN='$tahun', BULAN='$bulan', HARI='$hari', 
                                        NAMA_LGKP_AYAH='$nm_ayah', NAMA_LGKP_IBU='$nm_ibu', DSN='$dusun', AGAMA='$agama' WHERE NIK = '$nik'");
    $sql_tabungan = $mysqli->query("UPDATE tabel_tabungan 
                                    SET NAMA='$nm', KEPEMILIKAN_TABUNGAN='$kepem_tabungan', JENIS_TABUNGAN='$jenis_tabungan', 
                                    HARGA='$harga' WHERE NIK = '$nik'");
    $sql_konsumsi = $mysqli->query("UPDATE tabel_konsumsi 
                                    SET NAMA='$nm', BAHAN_MAKANAN='$bhn_makanan', FREKUENSI_PER_MINGGU='$frekuensi_perminggu', 
                                    PAKAIAN_PER_TAHUN='$pakaian_pertahun', MAKAN_PER_HARI='$makan_perhari', 
                                    BIAYA_PENGOBATAN='$biaya_pengobatan' WHERE NIK = '$nik'");
    $sql_pekerjaan = $mysqli->query("UPDATE tabel_pekerjaan SET NAMA='$nm', PEKERJAAN='$pekerjaan', PENGHASILAN_PER_BULAN='$penghasilan' WHERE NIK = '$nik'");
    $sql_pendidikan = $mysqli->query("UPDATE tabel_pendidikan SET NAMA='$nm', PENDIDIKAN_TERAKHIR='$pend_terakhir' WHERE NIK = '$nik'");

    if ($sql_kependudukan && $sql_tabungan && $sql_konsumsi && $sql_pekerjaan && $sql_pendidikan) {
?>
        <script>
            alert("Data Berhasil Diedit.");
            document.location.href = "../data_kependudukan";
        </script>
<?php
    }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-edit"></i> Edit Data Kependudukan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../data_kependudukan">Data Kependudukan</a></li>
                    <li class="breadcrumb-item active">Edit Data Kependudukan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <form action="" method="POST">
        <a href="../data_kependudukan" class="btn text-light" style="background-color: #042165;"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        <div class="card mt-3">
            <div class="card-header" style="background-color: #042165;">
                <h3 class="card-title text-white">Data Individu</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">No KK</label>
                            <input type="text" name="no_kk" class="form-control" id="" value="<?= $row['NO_KK']; ?>" placeholder="Masukkan No.KK" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" name="nik" class="form-control" id="" value="<?= $nik; ?>" placeholder="Masukkan NIK" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nm" class="form-control" id="" value="<?= $row['NAMA_LGKP']; ?>" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control select2" name="jk" style="width: 100%;">
                                <option hidden>--Pilih Jenis Kelamin--</option>
                                <?php if ($row['JK'] == 1) : ?>
                                    <option value="1" selected>Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                <?php else : ?>
                                    <option value="1">Laki-laki</option>
                                    <option value="2" selected>Perempuan</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input type="text" name="tmp_lahir" class="form-control" id="" value="<?= $row['TMPT_LHR']; ?>" placeholder="Masukkan Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="<?= $row['TGL_LHR']; ?>" id="">
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control select2" name="agama" style="width: 100%;">
                                <option hidden>--Pilih Agama--</option>
                                <?php if ($row['AGAMA'] == "islam") : ?>
                                    <option value="islam" selected>Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="budha">Budha</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="khonghucu">Khonghucu</option>
                                <?php elseif ($row['AGAMA'] == "kristen") : ?>
                                    <option value="islam">Islam</option>
                                    <option value="kristen" selected>Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="budha">Budha</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="khonghucu">Khonghucu</option>
                                <?php elseif ($row['AGAMA'] == "katolik") : ?>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik" selected>Katolik</option>
                                    <option value="budha">Budha</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="khonghucu">Khonghucu</option>
                                <?php elseif ($row['AGAMA'] == "budha") : ?>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="budha" selected>Budha</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="khonghucu">Khonghucu</option>
                                <?php elseif ($row['AGAMA'] == "hindu") : ?>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="budha">Budha</option>
                                    <option value="hindu" selected>Hindu</option>
                                    <option value="khonghucu">Khonghucu</option>
                                <?php else : ?>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="budha">Budha</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="khonghucu" selected>Khonghucu</option>
                                <?php endif; ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hubungan Keluarga</label>
                            <select class="form-control select2" name="hubkel" style="width: 100%;">
                                <option hidden>--Pilih Hubungan Keluarga--</option>
                                <?php if ($row['HBKEL'] == 1) : ?>
                                    <option value="1" selected>Kepala Keluarga</option>
                                    <option value="3">Istri</option>
                                    <option value="9">Anak</option>
                                <?php elseif ($row['HBKEL'] == 2) : ?>
                                    <option value="1">Kepala Keluarga</option>
                                    <option value="3" selected>Istri</option>
                                    <option value="9">Anak</option>
                                <?php else : ?>
                                    <option value="1">Kepala Keluarga</option>
                                    <option value="3">Istri</option>
                                    <option value="9" selected>Anak</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ayah</label>
                            <input type="text" name="nm_ayah" class="form-control" id="" value="<?= $row['NAMA_LGKP_AYAH']; ?>" placeholder="Masukkan Nama Ayah">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ibu</label>
                            <input type="text" name="nm_ibu" class="form-control" id="" value="<?= $row['NAMA_LGKP_IBU']; ?>" placeholder="Masukkan Nama Ayah">
                        </div>
                        <div class="form-group">
                            <label>Pendidikan Terakhir</label>
                            <select class="form-control select2" name="pend_terakhir" style="width: 100%;">
                                <option hidden>--Pilih Pendidikan--</option>
                                <?php if ($row['PENDIDIKAN_TERAKHIR'] == 'Tidak Sekolah') : ?>
                                    <option value="Tidak Sekolah" selected>Tidak Sekolah</option>
                                    <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                    <option value="SD dan Sederajat">SD dan Sederajat</option>
                                    <option value="SMP dan Sederajat">SMP dan Sederajat</option>
                                    <option value="SMA dan Sederajat">SMA dan Sederajat</option>
                                    <option value="Diploma 1-3">Diploma 1-3</option>
                                    <option value="S1 dan Sederajat">S1 dan Sederajat</option>
                                    <option value="S2 dan Sederajat">S2 dan Sederajat</option>
                                    <option value="S3 dan Sederajat">S3 dan Sederajat</option>
                                <?php elseif ($row['PENDIDIKAN_TERAKHIR'] == 'Tidak Tamat SD') : ?>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Tidak Tamat SD" selected>Tidak Tamat SD</option>
                                    <option value="SD dan Sederajat">SD dan Sederajat</option>
                                    <option value="SMP dan Sederajat">SMP dan Sederajat</option>
                                    <option value="SMA dan Sederajat">SMA dan Sederajat</option>
                                    <option value="Diploma 1-3">Diploma 1-3</option>
                                    <option value="S1 dan Sederajat">S1 dan Sederajat</option>
                                    <option value="S2 dan Sederajat">S2 dan Sederajat</option>
                                    <option value="S3 dan Sederajat">S3 dan Sederajat</option>
                                <?php elseif ($row['PENDIDIKAN_TERAKHIR'] == 'SD dan Sederajat') : ?>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                    <option value="SD dan Sederajat" selected>SD dan Sederajat</option>
                                    <option value="SMP dan Sederajat">SMP dan Sederajat</option>
                                    <option value="SMA dan Sederajat">SMA dan Sederajat</option>
                                    <option value="Diploma 1-3">Diploma 1-3</option>
                                    <option value="S1 dan Sederajat">S1 dan Sederajat</option>
                                    <option value="S2 dan Sederajat">S2 dan Sederajat</option>
                                    <option value="S3 dan Sederajat">S3 dan Sederajat</option>
                                <?php elseif ($row['PENDIDIKAN_TERAKHIR'] == 'SMP dan Sederajat') : ?>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                    <option value="SD dan Sederajat">SD dan Sederajat</option>
                                    <option value="SMP dan Sederajat" selected>SMP dan Sederajat</option>
                                    <option value="SMA dan Sederajat">SMA dan Sederajat</option>
                                    <option value="Diploma 1-3">Diploma 1-3</option>
                                    <option value="S1 dan Sederajat">S1 dan Sederajat</option>
                                    <option value="S2 dan Sederajat">S2 dan Sederajat</option>
                                    <option value="S3 dan Sederajat">S3 dan Sederajat</option>
                                <?php elseif ($row['PENDIDIKAN_TERAKHIR'] == 'SMA dan Sederajat') : ?>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                    <option value="SD dan Sederajat">SD dan Sederajat</option>
                                    <option value="SMP dan Sederajat">SMP dan Sederajat</option>
                                    <option value="SMA dan Sederajat" selected>SMA dan Sederajat</option>
                                    <option value="Diploma 1-3">Diploma 1-3</option>
                                    <option value="S1 dan Sederajat">S1 dan Sederajat</option>
                                    <option value="S2 dan Sederajat">S2 dan Sederajat</option>
                                    <option value="S3 dan Sederajat">S3 dan Sederajat</option>
                                <?php elseif ($row['PENDIDIKAN_TERAKHIR'] == 'Diploma 1-3') : ?>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                    <option value="SD dan Sederajat">SD dan Sederajat</option>
                                    <option value="SMP dan Sederajat">SMP dan Sederajat</option>
                                    <option value="SMA dan Sederajat">SMA dan Sederajat</option>
                                    <option value="Diploma 1-3" selected>Diploma 1-3</option>
                                    <option value="S1 dan Sederajat">S1 dan Sederajat</option>
                                    <option value="S2 dan Sederajat">S2 dan Sederajat</option>
                                    <option value="S3 dan Sederajat">S3 dan Sederajat</option>
                                <?php elseif ($row['PENDIDIKAN_TERAKHIR'] == 'S1 dan Sederajat') : ?>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                    <option value="SD dan Sederajat">SD dan Sederajat</option>
                                    <option value="SMP dan Sederajat">SMP dan Sederajat</option>
                                    <option value="SMA dan Sederajat">SMA dan Sederajat</option>
                                    <option value="Diploma 1-3">Diploma 1-3</option>
                                    <option value="S1 dan Sederajat" selected>S1 dan Sederajat</option>
                                    <option value="S2 dan Sederajat">S2 dan Sederajat</option>
                                    <option value="S3 dan Sederajat">S3 dan Sederajat</option>
                                <?php elseif ($row['PENDIDIKAN_TERAKHIR'] == 'S2 dan Sederajat') : ?>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                    <option value="SD dan Sederajat">SD dan Sederajat</option>
                                    <option value="SMP dan Sederajat">SMP dan Sederajat</option>
                                    <option value="SMA dan Sederajat">SMA dan Sederajat</option>
                                    <option value="Diploma 1-3">Diploma 1-3</option>
                                    <option value="S1 dan Sederajat">S1 dan Sederajat</option>
                                    <option value="S2 dan Sederajat" selected>S2 dan Sederajat</option>
                                    <option value="S3 dan Sederajat">S3 dan Sederajat</option>
                                <?php else : ?>
                                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                                    <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                    <option value="SD dan Sederajat">SD dan Sederajat</option>
                                    <option value="SMP dan Sederajat">SMP dan Sederajat</option>
                                    <option value="SMA dan Sederajat">SMA dan Sederajat</option>
                                    <option value="Diploma 1-3">Diploma 1-3</option>
                                    <option value="S1 dan Sederajat">S1 dan Sederajat</option>
                                    <option value="S2 dan Sederajat">S2 dan Sederajat</option>
                                    <option value="S3 dan Sederajat" selected>S3 dan Sederajat</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan Utama</label>
                            <select class="form-control select2" name="pekerjaan" style="width: 100%;">
                                <option hidden>--Pilih Pekerjaan--</option>
                                <?php if ($row['PEKERJAAN'] == 'Petani') : ?>
                                    <option value="Petani" selected>Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'Buruh Tani') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani" selected>Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'Buruh Bangunan') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan" selected>Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'Buruh Perkebunan') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan" selected>Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'Nelayan') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan" selected>Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'Guru') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru" selected>Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'Pedagang') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang" selected>Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'Pengolahan/Industri') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri" selected>Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'PNS') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS" selected>PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'Pensiunan') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan" selected>Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'Perangkat Desa') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa" selected>Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['PEKERJAAN'] == 'TKI') : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI" selected>TKI</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php else : ?>
                                    <option value="Petani">Petani</option>
                                    <option value="Buruh Tani">Buruh Tani</option>
                                    <option value="Buruh Bangunan">Buruh Bangunan</option>
                                    <option value="Buruh Perkebunan">Buruh Perkebunan</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Guru">Guru</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Pengolahan/Industri">Pengolahan/Industri</option>
                                    <option value="PNS">PNS</option>
                                    <option value="Pensiunan">Pensiunan</option>
                                    <option value="Perangkat Desa">Perangkat Desa</option>
                                    <option value="TKI">TKI</option>
                                    <option value="Lainnya" selected>Lainnya</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Penghasilan Per Bulan</label>
                            <input type="number" name="penghasilan" class="form-control" id="" value="<?= $row['PENGHASILAN_PER_BULAN']; ?>" placeholder="Penghasilan Per Bulan  ">
                        </div>
                        <div class="form-group">
                            <label for="">Dusun</label>
                            <select class="form-control select2" name="dusun" style="width: 100%;">
                                <option hidden>--Pilih Dusun--</option>
                                <?php if ($row['DSN'] == 1) : ?>
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                <?php elseif ($row['DSN'] == 2) : ?>
                                    <option value="1">1</option>
                                    <option value="2" selected>2</option>
                                    <option value="3">3</option>
                                <?php else : ?>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3" selected>3</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="background-color: #042165;">
                <h3 class="card-title text-white">Data Konsumsi</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bahan Makanan</label>
                            <select class="form-control select2" name="bhn_makanan" style="width: 100%;">
                                <option hidden>--Pilih Bahan Makanan--</option>
                                <?php if ($row['BAHAN_MAKANAN'] == 1) : ?>
                                    <option value="1" selected>Daging</option>
                                    <option value="2">Susu</option>
                                    <option value="3">Ayam</option>
                                    <option value="4">Lainnya</option>
                                <?php elseif ($row['BAHAN_MAKANAN'] == 2) : ?>
                                    <option value="1">Daging</option>
                                    <option value="2" selected>Susu</option>
                                    <option value="3">Ayam</option>
                                    <option value="4">Lainnya</option>
                                <?php elseif ($row['BAHAN_MAKANAN'] == 3) : ?>
                                    <option value="1">Daging</option>
                                    <option value="2">Susu</option>
                                    <option value="3" selected>Ayam</option>
                                    <option value="4">Lainnya</option>
                                <?php else : ?>
                                    <option value="1">Daging</option>
                                    <option value="2">Susu</option>
                                    <option value="3">Ayam</option>
                                    <option value="4" selected>Lainnya</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pakaian Per Tahun</label>
                            <select class="form-control select2" name="pakaian_pertahun" style="width: 100%;">
                                <option hidden>--Pilih Pakaian Baru Per Tahun--</option>
                                <?php if ($row['PAKAIAN_PER_TAHUN'] == 0) : ?>
                                    <option value="0" selected>Tidak Pernah</option>
                                    <option value="1">1 Stel</option>
                                    <option value="2">2 Stel</option>
                                    <option value="3">3 Stel</option>
                                    <option value="4">Lainnya</option>
                                <?php elseif ($row['PAKAIAN_PER_TAHUN'] == 1) : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1" selected>1 Stel</option>
                                    <option value="2">2 Stel</option>
                                    <option value="3">3 Stel</option>
                                    <option value="4">Lainnya</option>
                                <?php elseif ($row['PAKAIAN_PER_TAHUN'] == 2) : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1">1 Stel</option>
                                    <option value="2" selected>2 Stel</option>
                                    <option value="3">3 Stel</option>
                                    <option value="4">Lainnya</option>
                                <?php elseif ($row['PAKAIAN_PER_TAHUN'] == 3) : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1">1 Stel</option>
                                    <option value="2">2 Stel</option>
                                    <option value="3" selected>3 Stel</option>
                                    <option value="4">Lainnya</option>
                                <?php else : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1">1 Stel</option>
                                    <option value="2">2 Stel</option>
                                    <option value="3" selected>3 Stel</option>
                                    <option value="4">Lainnya</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Biaya Pengobatan PUSKESMAS</label><br>
                            <?php if ($row['BIAYA_PENGOBATAN'] == 0) : ?>
                                <div class="form-check-inline mt-0">
                                    <label class="form-check-label">
                                        <input type="radio" name="biaya_pengobatan" id="" class="form-check-input" value="0" checked>Tidak Sanggup Membayar
                                    </label>
                                </div>
                                <div class="form-check-inline mt-0">
                                    <label class="form-check-label">
                                        <input type="radio" name="biaya_pengobatan" id="" class="form-check-input" value="1">Sanggup Membayar
                                    </label>
                                </div>
                            <?php else : ?>
                                <div class="form-check-inline mt-0">
                                    <label class="form-check-label">
                                        <input type="radio" name="biaya_pengobatan" id="" class="form-check-input" value="0">Tidak Sanggup Membayar
                                    </label>
                                </div>
                                <div class="form-check-inline mt-0">
                                    <label class="form-check-label">
                                        <input type="radio" name="biaya_pengobatan" id="" class="form-check-input" value="1" checked>Sanggup Membayar
                                    </label>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Frekuensi Per Minggu</label>
                            <select class="form-control select2" name="frekuensi_perminggu" style="width: 100%;">
                                <option hidden>--Pilih Frekuensi--</option>
                                <?php if ($row['FREKUENSI_PER_MINGGU'] == 0) : ?>
                                    <option value="0" selected>Tidak Pernah</option>
                                    <option value="1">1 Kali Seminggu</option>
                                    <option value="2">2 Kali Seminggu</option>
                                    <option value="3">3 Kali Seminggu</option>
                                    <option value="4">Hampir Tiap Hari</option>
                                <?php elseif ($row['FREKUENSI_PER_MINGGU'] == 1) : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1" selected>1 Kali Seminggu</option>
                                    <option value="2">2 Kali Seminggu</option>
                                    <option value="3">3 Kali Seminggu</option>
                                    <option value="4">Hampir Tiap Hari</option>
                                <?php elseif ($row['FREKUENSI_PER_MINGGU'] == 2) : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1">1 Kali Seminggu</option>
                                    <option value="2" selected>2 Kali Seminggu</option>
                                    <option value="3">3 Kali Seminggu</option>
                                    <option value="4">Hampir Tiap Hari</option>
                                <?php elseif ($row['FREKUENSI_PER_MINGGU'] == 3) : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1">1 Kali Seminggu</option>
                                    <option value="2">2 Kali Seminggu</option>
                                    <option value="3" selected>3 Kali Seminggu</option>
                                    <option value="4">Hampir Tiap Hari</option>
                                <?php else : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1">1 Kali Seminggu</option>
                                    <option value="2">2 Kali Seminggu</option>
                                    <option value="3">3 Kali Seminggu</option>
                                    <option value="4" selected>Hampir Tiap Hari</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Makan Per Hari</label>
                            <select class="form-control select2" name="makan_perhari" style="width: 100%;">
                                <option hidden>--Pilih Banyak Makan Dalam Sehari--</option>
                                <?php if ($row['MAKAN_PER_HARI'] == 0) : ?>
                                    <option value="0" selected>Tidak Pernah</option>
                                    <option value="1">1 Kali Sehari</option>
                                    <option value="2">2 Kali Sehari</option>
                                    <option value="3">3 Kali Sehari</option>
                                    <option value="4">Lainnya</option>
                                <?php elseif ($row['MAKAN_PER_HARI'] == 1) : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1" selected>1 Kali Sehari</option>
                                    <option value="2">2 Kali Sehari</option>
                                    <option value="3">3 Kali Sehari</option>
                                    <option value="4">Lainnya</option>
                                <?php elseif ($row['MAKAN_PER_HARI'] == 2) : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1">1 Kali Sehari</option>
                                    <option value="2" selected>2 Kali Sehari</option>
                                    <option value="3">3 Kali Sehari</option>
                                    <option value="4">Lainnya</option>
                                <?php elseif ($row['MAKAN_PER_HARI'] == 3) : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1">1 Kali Sehari</option>
                                    <option value="2">2 Kali Sehari</option>
                                    <option value="3" selected>3 Kali Sehari</option>
                                    <option value="4">Lainnya</option>
                                <?php else : ?>
                                    <option value="0">Tidak Pernah</option>
                                    <option value="1">1 Kali Sehari</option>
                                    <option value="2">2 Kali Sehari</option>
                                    <option value="3">3 Kali Sehari</option>
                                    <option value="4" selected>Lainnya</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="background-color: #042165;">
                <h3 class="card-title text-white">Data Tabungan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Kepemilikan Tabungan</label><br>
                            <?php if ($row['KEPEMILIKAN_TABUNGAN'] == 0) : ?>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="kepem_tabungan" id="" class="form-check-input" value="0" checked>Tidak
                                    </label>
                                </div>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="kepem_tabungan" id="" class="form-check-input" value="1">Ya
                                    </label>
                                </div>
                            <?php elseif ($row['KEPEMILIKAN_TABUNGAN'] == 1) : ?>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="kepem_tabungan" id="" class="form-check-input" value="0">Tidak
                                    </label>
                                </div>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="kepem_tabungan" id="" class="form-check-input" value="1" checked>Ya
                                    </label>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Jenis Tabungan</label>
                            <select class="form-control select2 cekKepem" name="jenis_tabungan" style="width: 100%;">
                                <option hidden>--Pilih Jenis Tabungan--</option>
                                <?php if ($row['JENIS_TABUNGAN'] == 1) : ?>
                                    <option value="1" selected>Sepeda Motor Kredit</option>
                                    <option value="2">Emas</option>
                                    <option value="3">Hewan Ternak</option>
                                    <option value="4">Kapal Motor</option>
                                    <option value="5">Barang Modal Lainnya</option>
                                <?php elseif ($row['JENIS_TABUNGAN'] == 2) : ?>
                                    <option value="1">Sepeda Motor Kredit</option>
                                    <option value="2" selected>Emas</option>
                                    <option value="3">Hewan Ternak</option>
                                    <option value="4">Kapal Motor</option>
                                    <option value="5">Barang Modal Lainnya</option>
                                <?php elseif ($row['JENIS_TABUNGAN'] == 3) : ?>
                                    <option value="1">Sepeda Motor Kredit</option>
                                    <option value="2">Emas</option>
                                    <option value="3" selected>Hewan Ternak</option>
                                    <option value="4">Kapal Motor</option>
                                    <option value="5">Barang Modal Lainnya</option>
                                <?php elseif ($row['JENIS_TABUNGAN'] == 4) : ?>
                                    <option value="1">Sepeda Motor Kredit</option>
                                    <option value="2">Emas</option>
                                    <option value="3">Hewan Ternak</option>
                                    <option value="4" selected>Kapal Motor</option>
                                    <option value="5">Barang Modal Lainnya</option>
                                <?php elseif ($row['JENIS_TABUNGAN'] == 5) : ?>
                                    <option value="1">Sepeda Motor Kredit</option>
                                    <option value="2">Emas</option>
                                    <option value="3">Hewan Ternak</option>
                                    <option value="4">Kapal Motor</option>
                                    <option value="5" selected>Barang Modal Lainnya</option>
                                <?php else : ?>
                                    <option value="0" selected>-</option>
                                    <option value="1">Sepeda Motor Kredit</option>
                                    <option value="2">Emas</option>
                                    <option value="3">Hewan Ternak</option>
                                    <option value="4">Kapal Motor</option>
                                    <option value="5">Barang Modal Lainnya</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" name="harga" class="form-control cekKepem" id="" value="<?= $row['HARGA']; ?>" placeholder="Harga Tabungan">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <button type="submit" name="edit_data" class="btn btn-block btn-success float-right"><i class="fas fa-save"></i> Simpan Perubahan Data</button>
            </div>
        </div>
    </form>
</section>