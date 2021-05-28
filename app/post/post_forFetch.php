<?php
if (isset($_POST['get_option'])) {
    include '../koneksi.php';

    $nik = $_POST['get_option'];
    $findInfo = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_kependudukan.NIK='$nik'");
    $rowInfo = $findInfo->fetch_assoc();

    $views = '<div class="form-group">
                <label for="">No.KK</label>
                <input type="text" class="form-control" value="' . $rowInfo['NO_KK'] . '" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" value="' . $rowInfo['NAMA_LGKP'] . '" readonly>
            </div>
            <div class="form-group">
                <label for="">Pekerjaan Utama</label>
                <input type="text" class="form-control" value="' . $rowInfo['PEKERJAAN'] . '" readonly>
            </div>
            <div class="form-group">
                <label for="">Penghasilan Per Bulan</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="text" class="form-control" value="' . number_format($rowInfo['PENGHASILAN_PER_BULAN']) . '" readonly>
                </div>
            </div>';

    echo $views;
}
