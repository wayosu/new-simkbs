<?php
include 'app/function/function_data_kondisi_rumah.php';

if (isset($_POST['simpan_data'])) {
    $nik = $_POST['nik'];
    $luas_lantai = $_POST['luas_lantai'];
    $jenis_lantai = $_POST['jenis_lantai'];
    $jenis_dinding = $_POST['jenis_dinding'];
    $sumber_air = $_POST['sumber_air'];
    $bahan_bakar = $_POST['bahan_bakar'];
    $fasilitas_mck = $_POST['fasilitas_mck'];
    $sumber_penerangan = $_POST['sumber_penerangan'];

    $sql = $mysqli->query("INSERT INTO tabel_rumah (NIK, LUAS_LANTAI, JENIS_LANTAI, JENIS_DINDING, FASILITAS_BAB, SUMBER_PENERANGAN, SUMBER_AIR_MINUM, BAHAN_BAKAR_MEMASAK) VALUES ('$nik','$luas_lantai','$jenis_lantai','$jenis_dinding','$fasilitas_mck', '$sumber_penerangan', '$sumber_air', '$bahan_bakar')");

    if ($sql) {
?>
        <script>
            alert('Data Berhasil Disimpan.');
            document.location.href = 'data_kondisi_rumah';
        </script>
    <?php
    }
}

if (isset($_POST['hapus_data'])) {
    $nik = $_POST['nik'];
    $sql = $mysqli->query("DELETE FROM tabel_rumah WHERE NIK='$nik'");

    if ($sql) {
    ?>
        <script>
            alert("Data Berhasil Dihapus.");
            document.location.href = "data_kondisi_rumah";
        </script>
<?php
    }
}
