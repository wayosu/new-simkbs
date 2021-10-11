<?php
include 'app/function/function_control_panel.php';
include 'app/upload_img.php';

if (isset($_POST['tambah_dusun'])) {
    $dusun = $_POST['dusun'];

    $sql = $mysqli->query("INSERT INTO tabel_dusun (dusun) VALUES ('$dusun')");

    if ($sql) {
?>
        <script>
            alert('Data berhasil disimpan.');
            document.location.href = 'control_panel';
        </script>
<?php
    }
}

if (isset($_POST['edit_dusun'])) {
    $id = $_POST['id_dusun'];
    $dusun = $_POST['dusun'];

    $sql = $mysqli->query("UPDATE tabel_dusun SET dusun='$dusun' WHERE id='$id'");

    if ($sql) {
?>
        <script>
            alert('Data berhasil diubah.');
            document.location.href = 'control_panel';
        </script>
<?php
    }
}

if (isset($_POST['hapus_dusun'])) {
    $id = $_POST['id_dusun'];

    $sql = $mysqli->query("DELETE FROM tabel_dusun WHERE id='$id'");

    if ($sql) {
?>
        <script>
            alert('Data berhasil dihapus.');
            document.location.href = 'control_panel';
        </script>
<?php
    }
}

if (isset($_POST['edit_profil'])) {
    $id = $_POST['id_profil'];
    $nama_desa = $_POST['nama_desa'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $maps = $_POST['maps'];
    $logoLama = $_POST['logo_sebelumnya'];

    // cek apakah user pilih gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4) {
        $logo = $logoLama;
    }else{
        $logo = upload_img($url);
    }

    $sql = $mysqli->query("UPDATE tabel_control SET nama_desa='$nama_desa',logo_desa='$logo',alamat='$alamat',maps='$maps',email='$email' WHERE id='$id'");

    if ($sql) {
?>
        <script>
            alert('Profil berhasil diubah.');
            document.location.href = 'control_panel';
        </script>
<?php
    }
}