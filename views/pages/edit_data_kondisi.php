<?php
include 'app/koneksi.php';
$nik = $_GET['id'];
$sql = $mysqli->query("SELECT * FROM tabel_rumah WHERE NIK = '$nik'");
$row = $sql->fetch_assoc();

$findInfo = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_kependudukan.NIK='$nik'");
$rowInfo = $findInfo->fetch_assoc();

if (isset($_POST['edit_data'])) {
    $nik = $_POST['nik'];
    $luas_lantai = $_POST['luas_lantai'];
    $jenis_lantai = $_POST['jenis_lantai'];
    $jenis_dinding = $_POST['jenis_dinding'];
    $sumber_air = $_POST['sumber_air'];
    $bahan_bakar = $_POST['bahan_bakar'];
    $fasilitas_mck = $_POST['fasilitas_mck'];
    $sumber_penerangan = $_POST['sumber_penerangan'];

    $sql_update = $mysqli->query("UPDATE tabel_rumah SET LUAS_LANTAI='$luas_lantai', 
                                    JENIS_LANTAI='$jenis_lantai', JENIS_DINDING='$jenis_dinding', 
                                    FASILITAS_BAB='$fasilitas_mck', SUMBER_PENERANGAN='$sumber_penerangan', 
                                    SUMBER_AIR_MINUM='$sumber_air', BAHAN_BAKAR_MEMASAK='$bahan_bakar' WHERE NIK='$nik'");
    if ($sql_update) {
?>
        <script>
            alert("Data Berhasil Diedit.");
            document.location.href = "../data_kondisi_rumah";
        </script>
<?php
    }
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-edit"></i> Edit Data Kondisi Rumah</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="data_kondisi_rumah">Data Kondisi Rumah</a></li>
                    <li class="breadcrumb-item active">Edit Data Kondisi Rumah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="" method="POST">
        <input type="hidden" name="nik" value="<?= $nik; ?>">
        <a href="../data_kondisi_rumah" class="btn text-light" style="background-color: #042165;"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>

        <!-- Default box -->
        <div class="card mt-3">
            <div class="card-header" style="background-color: #042165;">
                <h3 class="card-title text-white">Data Kepala Keluarga</h3>
            </div>

            <!-- form start -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" class="form-control" value="<?= $rowInfo['NIK']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" value="<?= $rowInfo['NAMA_LGKP']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">No.KK</label>
                            <input type="text" class="form-control" value="<?= $rowInfo['NO_KK']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan Utama</label>
                            <input type="text" class="form-control" value="<?= $rowInfo['PEKERJAAN']; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Penghasilan Per Bulan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text" class="form-control" value="<?= number_format($rowInfo['PENGHASILAN_PER_BULAN']); ?>" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header" style="background-color: #042165;">
                <h3 class="card-title text-white">Data Kondisi Rumah</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Luas Lantai</label>
                            <select class="form-control select2" name="luas_lantai" style="width: 100%;">
                                <option hidden>--Pilih Luas Lantai--</option>
                                <?php if ($row['LUAS_LANTAI'] == 1) : ?>
                                    <option value="1" selected>
                                        <= 8m Persegi </option>
                                    <option value="2">> 8m Persegi</option>
                                <?php else : ?>
                                    <option value="1">
                                        <= 8m Persegi </option>
                                    <option value="2" selected>> 8m Persegi</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Lantai</label>
                            <select class="form-control select2" name="jenis_lantai" style="width: 100%;">
                                <option hidden>--Pilih Jenis Lantai--</option>
                                <?php if ($row['JENIS_LANTAI'] == "Marmer/Granit") : ?>
                                    <option value="Marmer/Granit" selected>Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_LANTAI'] == "Keramik") : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik" selected>Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_LANTAI'] == "Parket/Vinil/Permadani") : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani" selected>Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_LANTAI'] == "Ubin/Tegel/Teraso") : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso" selected>Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_LANTAI'] == "Kayu/Papan berkualitas tinggi") : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi" selected>Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_LANTAI'] == "Semen/Bata merah") : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah" selected>Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_LANTAI'] == "Cor") : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor" selected>Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_LANTAI'] == "Bambu") : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu" selected>Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_LANTAI'] == "Kayu/Papan berkualitas rendah") : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah" selected>Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_LANTAI'] == "Tanah") : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah" selected>Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_LANTAI'] == "Lainnya") : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya" selected>Lainnya</option>
                                <?php else : ?>
                                    <option value="Marmer/Granit">Marmer/Granit</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Parket/Vinil/Permadani">Parket/Vinil/Permadani</option>
                                    <option value="Ubin/Tegel/Teraso">Ubin/Tegel/Teraso</option>
                                    <option value="Kayu/Papan berkualitas tinggi">Kayu/Papan berkualitas tinggi</option>
                                    <option value="Semen/Bata merah">Semen/Bata merah</option>
                                    <option value="Cor">Cor</option>
                                    <option value="Bambu">Bambu</option>
                                    <option value="Kayu/Papan berkualitas rendah">Kayu/Papan berkualitas rendah</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Dinding</label>
                            <select class="form-control select2" name="jenis_dinding" style="width: 100%;">
                                <option hidden>--Pilih Jenis Dinding--</option>
                                <?php if ($row['JENIS_DINDING'] == "Semen/Beton/Kayu berkualitas tinggi") : ?>
                                    <option value="Semen/Beton/Kayu berkualitas tinggi" selected>Semen/Beton/Kayu berkualitas tinggi</option>
                                    <option value="Tembok tanpa diplester">Tembok tanpa diplester</option>
                                    <option value="Kayu berkualitas rendah/Bambu">Kayu berkualitas rendah/Bambu</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_DINDING'] == "Tembok tanpa diplester") : ?>
                                    <option value="Semen/Beton/Kayu berkualitas tinggi">Semen/Beton/Kayu berkualitas tinggi</option>
                                    <option value="Tembok tanpa diplester" selected>Tembok tanpa diplester</option>
                                    <option value="Kayu berkualitas rendah/Bambu">Kayu berkualitas rendah/Bambu</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_DINDING'] == "Kayu berkualitas rendah/Bambu") : ?>
                                    <option value="Semen/Beton/Kayu berkualitas tinggi">Semen/Beton/Kayu berkualitas tinggi</option>
                                    <option value="Tembok tanpa diplester">Tembok tanpa diplester</option>
                                    <option value="Kayu berkualitas rendah/Bambu" selected>Kayu berkualitas rendah/Bambu</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['JENIS_DINDING'] == "Lainnya") : ?>
                                    <option value="Semen/Beton/Kayu berkualitas tinggi">Semen/Beton/Kayu berkualitas tinggi</option>
                                    <option value="Tembok tanpa diplester">Tembok tanpa diplester</option>
                                    <option value="Kayu berkualitas rendah/Bambu">Kayu berkualitas rendah/Bambu</option>
                                    <option value="Lainnya" selected>Lainnya</option>
                                <?php else : ?>
                                    <option value="Semen/Beton/Kayu berkualitas tinggi">Semen/Beton/Kayu berkualitas tinggi</option>
                                    <option value="Tembok tanpa diplester">Tembok tanpa diplester</option>
                                    <option value="Kayu berkualitas rendah/Bambu">Kayu berkualitas rendah/Bambu</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sumber Air Minum</label>
                            <select class="form-control select2" name="sumber_air" style="width: 100%;">
                                <option hidden>--Pilih Sumber Air Minum--</option>
                                <?php if ($row['SUMBER_AIR_MINUM'] == "Mata air tidak terlindung") : ?>
                                    <option value="Mata air tidak terlindung" selected>Mata air tidak terlindung</option>
                                    <option value="Sungai">Sungai</option>
                                    <option value="Air Hujan">Air Hujan</option>
                                    <option value="Sumur">Sumur</option>
                                    <option value="Pompa air/DAP">Pompa air/DAP</option>
                                    <option value="Air isi ulang/Kemasan">Air isi ulang/Kemasan</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['SUMBER_AIR_MINUM'] == "Sungai") : ?>
                                    <option value="Mata air tidak terlindung">Mata air tidak terlindung</option>
                                    <option value="Sungai" selected>Sungai</option>
                                    <option value="Air Hujan">Air Hujan</option>
                                    <option value="Sumur">Sumur</option>
                                    <option value="Pompa air/DAP">Pompa air/DAP</option>
                                    <option value="Air isi ulang/Kemasan">Air isi ulang/Kemasan</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['SUMBER_AIR_MINUM'] == "Air Hujan") : ?>
                                    <option value="Mata air tidak terlindung">Mata air tidak terlindung</option>
                                    <option value="Sungai">Sungai</option>
                                    <option value="Air Hujan" selected>Air Hujan</option>
                                    <option value="Sumur">Sumur</option>
                                    <option value="Pompa air/DAP">Pompa air/DAP</option>
                                    <option value="Air isi ulang/Kemasan">Air isi ulang/Kemasan</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['SUMBER_AIR_MINUM'] == "Sumur") : ?>
                                    <option value="Mata air tidak terlindung">Mata air tidak terlindung</option>
                                    <option value="Sungai">Sungai</option>
                                    <option value="Air Hujan">Air Hujan</option>
                                    <option value="Sumur" selected>Sumur</option>
                                    <option value="Pompa air/DAP">Pompa air/DAP</option>
                                    <option value="Air isi ulang/Kemasan">Air isi ulang/Kemasan</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['SUMBER_AIR_MINUM'] == "Pompa air/DAP") : ?>
                                    <option value="Mata air tidak terlindung">Mata air tidak terlindung</option>
                                    <option value="Sungai">Sungai</option>
                                    <option value="Air Hujan">Air Hujan</option>
                                    <option value="Sumur">Sumur</option>
                                    <option value="Pompa air/DAP" selected>Pompa air/DAP</option>
                                    <option value="Air isi ulang/Kemasan">Air isi ulang/Kemasan</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['SUMBER_AIR_MINUM'] == "Air isi ulang/Kemasan") : ?>
                                    <option value="Mata air tidak terlindung">Mata air tidak terlindung</option>
                                    <option value="Sungai">Sungai</option>
                                    <option value="Air Hujan">Air Hujan</option>
                                    <option value="Sumur">Sumur</option>
                                    <option value="Pompa air/DAP">Pompa air/DAP</option>
                                    <option value="Air isi ulang/Kemasan" selected>Air isi ulang/Kemasan</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['SUMBER_AIR_MINUM'] == "Lainnya") : ?>
                                    <option value="Mata air tidak terlindung">Mata air tidak terlindung</option>
                                    <option value="Sungai">Sungai</option>
                                    <option value="Air Hujan">Air Hujan</option>
                                    <option value="Sumur">Sumur</option>
                                    <option value="Pompa air/DAP">Pompa air/DAP</option>
                                    <option value="Air isi ulang/Kemasan">Air isi ulang/Kemasan</option>
                                    <option value="Lainnya" selected>Lainnya</option>
                                <?php else : ?>
                                    <option value="Mata air tidak terlindung">Mata air tidak terlindung</option>
                                    <option value="Sungai">Sungai</option>
                                    <option value="Air Hujan">Air Hujan</option>
                                    <option value="Sumur">Sumur</option>
                                    <option value="Pompa air/DAP">Pompa air/DAP</option>
                                    <option value="Air isi ulang/Kemasan">Air isi ulang/Kemasan</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bahan Bakar Memasak</label>
                            <select class="form-control select2" name="bahan_bakar" style="width: 100%;">
                                <option hidden>--Pilih Bahan Bakar Memasak--</option>
                                <?php if ($row['BAHAN_BAKAR_MEMASAK'] == "Kayu Bakar") : ?>
                                    <option value="Kayu Bakar" selected>Kayu Bakar</option>
                                    <option value="Minyak Tanah">Minyak Tanah</option>
                                    <option value="Gas Subsidi">Gas Subsidi</option>
                                    <option value="Gas Non-Subsidi">Gas Non-Subsidi</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['BAHAN_BAKAR_MEMASAK'] == "Minyak Tanah") : ?>
                                    <option value="Kayu Bakar">Kayu Bakar</option>
                                    <option value="Minyak Tanah" selected>Minyak Tanah</option>
                                    <option value="Gas Subsidi">Gas Subsidi</option>
                                    <option value="Gas Non-Subsidi">Gas Non-Subsidi</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['BAHAN_BAKAR_MEMASAK'] == "Gas Subsidi") : ?>
                                    <option value="Kayu Bakar">Kayu Bakar</option>
                                    <option value="Minyak Tanah">Minyak Tanah</option>
                                    <option value="Gas Subsidi" selected>Gas Subsidi</option>
                                    <option value="Gas Non-Subsidi">Gas Non-Subsidi</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['BAHAN_BAKAR_MEMASAK'] == "Gas Non-Subsidi") : ?>
                                    <option value="Kayu Bakar">Kayu Bakar</option>
                                    <option value="Minyak Tanah">Minyak Tanah</option>
                                    <option value="Gas Subsidi">Gas Subsidi</option>
                                    <option value="Gas Non-Subsidi" selected>Gas Non-Subsidi</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php elseif ($row['BAHAN_BAKAR_MEMASAK'] == "Lainnya") : ?>
                                    <option value="Kayu Bakar">Kayu Bakar</option>
                                    <option value="Minyak Tanah">Minyak Tanah</option>
                                    <option value="Gas Subsidi">Gas Subsidi</option>
                                    <option value="Gas Non-Subsidi">Gas Non-Subsidi</option>
                                    <option value="Lainnya" selected>Lainnya</option>
                                <?php else : ?>
                                    <option value="Kayu Bakar">Kayu Bakar</option>
                                    <option value="Minyak Tanah">Minyak Tanah</option>
                                    <option value="Gas Subsidi">Gas Subsidi</option>
                                    <option value="Gas Non-Subsidi">Gas Non-Subsidi</option>
                                    <option value="Lainnya">Lainnya</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fasilitas MCK</label><br>
                            <?php if ($row['FASILITAS_BAB'] == 0) : ?>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="fasilitas_mck" class="form-check-input" value="0" checked>Milik Umum
                                    </label>
                                </div>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="fasilitas_mck" class="form-check-input" value="1">Milik Sendiri
                                    </label>
                                </div>
                            <?php else : ?>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="fasilitas_mck" class="form-check-input" value="0">Milik Umum
                                    </label>
                                </div>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="fasilitas_mck" class="form-check-input" value="1" checked>Milik Sendiri
                                    </label>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Sumber Penerangan</label><br>
                            <?php if ($row['SUMBER_PENERANGAN'] == 0) : ?>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="sumber_penerangan" class="form-check-input" value="0" checked>Tidak Menggunakan Listrik
                                    </label>
                                </div>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="sumber_penerangan" class="form-check-input" value="1">Menggunakan Listrik
                                    </label>
                                </div>
                            <?php else : ?>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="sumber_penerangan" class="form-check-input" value="0">Tidak Menggunakan Listrik
                                    </label>
                                </div>
                                <div class="form-check-inline mt-2">
                                    <label class="form-check-label">
                                        <input type="radio" name="sumber_penerangan" class="form-check-input" value="1" checked>Menggunakan Listrik
                                    </label>
                                </div>
                            <?php endif; ?>
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