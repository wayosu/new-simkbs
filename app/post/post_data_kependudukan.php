<?php
include 'app/function/function_data_kependudukan.php';
include 'app/function/function_bantuan.php';

if (isset($_POST['simpan_data'])) {
    // data individu
    $no_kk = $_POST['no_kk'];
    $nik = $_POST['nik'];
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
    // var_dump($no_kk, $nik, $nm, $jk, $tmp_lahir, $tgl_lahir, $tahun, $bulan, $hari, $hubkel, $nm_ayah, $nm_ibu, $pend_terakhir, $pekerjaan, $penghasilan, $dusun);

    // data konsumsi
    $bhn_makanan = $_POST['bhn_makanan'];
    $pakaian_pertahun = $_POST['pakaian_pertahun'];
    $biaya_pengobatan = isset($_POST['biaya_pengobatan']) ? $_POST['biaya_pengobatan'] : "1";
    $frekuensi_perminggu = $_POST['frekuensi_perminggu'];
    $makan_perhari = $_POST['makan_perhari'];
    // var_dump($bhn_makanan, $pakaian_pertahun, $biaya_pengobatan, $frekuensi_perminggu, $makan_perhari);

    // data tabungan
    $kepem_tabungan = isset($_POST['kepem_tabungan']) ? $_POST['kepem_tabungan'] : "1";
    $jenis_tabungan = isset($_POST['jenis_tabungan']) ? $_POST['kepem_tabungan'] : "0";
    $harga = isset($_POST['harga']) ? $_POST['harga'] : "0";
    // var_dump($kepem_tabungan, $jenis_tabungan, $harga);

    //data bantuan
    $bantuan = $_POST['penerima_bantuan'];
    $jenis_bantuan = $_POST['jenis_bantuan'];

    $sql_kependudukan = $mysqli->query("INSERT INTO tabel_kependudukan (NO_KK, NIK, NAMA_LGKP, HBKEL, JK, TMPT_LHR, TGL_LHR, TAHUN, BULAN, HARI, NAMA_LGKP_AYAH, NAMA_LGKP_IBU, KECAMATAN, KELURAHAN, DSN, AGAMA, bantuan, jenis_bantuan) 
    VALUES ('$no_kk', '$nik', '$nm', '$hubkel', '$jk', '$tmp_lahir', '$tgl_lahir', '$tahun', '$bulan', '$hari', '$nm_ayah', '$nm_ibu', 'TILONGKABILA', 'BUTU', '$dusun', '$agama','$bantuan','$jenis_bantuan')");

    $sql_tabungan = $mysqli->query("INSERT INTO tabel_tabungan (NIK, NAMA, KEPEMILIKAN_TABUNGAN, JENIS_TABUNGAN, HARGA) 
    VALUES ('$nik', '$nm', '$kepem_tabungan', '$jenis_tabungan', '$harga')");

    $sql_konsumsi = $mysqli->query("INSERT INTO tabel_konsumsi (NIK, NAMA, BAHAN_MAKANAN, FREKUENSI_PER_MINGGU, PAKAIAN_PER_TAHUN, MAKAN_PER_HARI, BIAYA_PENGOBATAN) 
    VALUES ('$nik', '$nm', '$bhn_makanan', '$frekuensi_perminggu', '$pakaian_pertahun', '$makan_perhari', '$biaya_pengobatan')");

    $sql_pekerjaan = $mysqli->query("INSERT INTO tabel_pekerjaan (NIK, NAMA, PEKERJAAN, PENGHASILAN_PER_BULAN) VALUES('$nik', '$nm', '$pekerjaan', '$penghasilan')");

    $sql_pendidikan = $mysqli->query("INSERT INTO tabel_pendidikan (NIK, NAMA, PENDIDIKAN_TERAKHIR) VALUES ('$nik', '$nm', '$pend_terakhir')");



    if ($sql_kependudukan && $sql_tabungan && $sql_konsumsi && $sql_pekerjaan && $sql_pendidikan) {
?>
        <script>
            alert("Data Berhasil Disimpan.");
            document.location.href = "data_kependudukan";
        </script>
    <?php
    }
}

if (isset($_POST['hapus_data'])) {
    $nik = $_POST['nik'];
    $sql_kependudukan = $mysqli->query("DELETE FROM tabel_kependudukan WHERE NIK='$nik'");
    $sql_konsumsi = $mysqli->query("DELETE FROM tabel_konsumsi WHERE NIK='$nik'");
    $sql_pekerjaan = $mysqli->query("DELETE FROM tabel_pekerjaan WHERE NIK='$nik'");
    $sql_pendidikan = $mysqli->query("DELETE FROM tabel_pendidikan WHERE NIK='$nik'");
    $sql_tabungan = $mysqli->query("DELETE FROM tabel_tabungan WHERE NIK='$nik'");

    if ($sql_kependudukan && $sql_konsumsi && $sql_pekerjaan && $sql_pendidikan && $sql_tabungan) {
    ?>
        <script>
            alert("Data Berhasil Dihapus.");
            document.location.href = "data_kependudukan";
        </script>
<?php
    }
}

if(isset($_POST['update_bntn'])){
    $nik = $_POST['nik'];
    $jb = $_POST['jenis_bantuan'];
    $sql_update_bantuan = $mysqli->query("UPDATE tabel_kependudukan SET bantuan='1', jenis_bantuan = '$jb' WHERE NIK = '$nik'");
    echo '
    <script>
    alert("Berhasil Menambah Jenis Bantuan");
    document.location.href="data_klasifikasi_bantuan";
    </script>
    ';
}
if(isset($_POST['hapus_daftar'])){
    $nik = $_POST['nik'];
    $update = $mysqli->query("UPDATE tabel_Kependudukan SET bantuan = '0', jenis_bantuan = '' WHERE NIK = '$nik'");
    echo '
    <script>
    alert("Berhasil Menghapus Penduduk Dari Daftar");
    document.location.href="data_klasifikasi_bantuan";
    </script>
    ';

}