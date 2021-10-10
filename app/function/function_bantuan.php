<?php

function tampil_rekom_bpnt($mysqli)
{
    $nomor = 1;
    $query = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND (KEPEMILIKAN_TABUNGAN = '0' OR (KEPEMILIKAN_TABUNGAN = '1' AND (JENIS_TABUNGAN = '1' OR JENIS_TABUNGAN = '2' OR JENIS_TABUNGAN = '3' OR JENIS_TABUNGAN = '4' OR JENIS_TABUNGAN = '5') AND HARGA < 500000))");
    while ($row = $query->fetch_assoc()) {

        $sql_dusun = $mysqli->query("SELECT * FROM tabel_dusun WHERE id='$row[DSN]'");
        $row_dusun = $sql_dusun->fetch_assoc();
?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row['NO_KK'] ?></td>
            <td><?= $row['NIK'] ?></td>
            <td><?= $row['NAMA_LGKP'] ?></td>
            <td><?= tgl_indo($row['TGL_LHR']) ?></td>
            <td><?= $row['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
            <td>Rp. <?= number_format($row['PENGHASILAN_PER_BULAN']); ?></td>
            <td><?= $row_dusun['dusun'] ?></td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="nik" value="<?= $row['NIK'] ?>">
                    <button type="submit" name="update_bpnt" class="btn btn-primary btn-xs" onclick="return confirm('Yakin menambahkan data ini ke Bantuan Sembako BPNT ?')"><i class="fas fa-plus"></i> Tambah Bantuan</button>
                </form>
            </td>
        </tr>
    <?php
    }
}

function tampil_rekom_pkh($mysqli)
{
    $nomor = 1;
    $query = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE (tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND (KEPEMILIKAN_TABUNGAN = '0' OR (KEPEMILIKAN_TABUNGAN = '1' AND (JENIS_TABUNGAN = '1' OR JENIS_TABUNGAN = '2' OR JENIS_TABUNGAN = '3' OR JENIS_TABUNGAN = '4' OR JENIS_TABUNGAN = '5') AND HARGA < 500000))) AND ((HBKEL = '3' AND TAHUN > 45 OR disabilitas = 1) OR (HBKEL = '9' AND (PENDIDIKAN_TERAKHIR ='SD dan Sederajat' OR PENDIDIKAN_TERAKHIR='SMP dan Sederajat' OR PENDIDIKAN_TERAKHIR='SMA dan Sederajat') AND TAHUN BETWEEN 1 AND 6 OR disabilitas = 0))");
    while ($row = $query->fetch_assoc()) {
        $query2 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE NO_KK = '{$row['NO_KK']}' AND HBKEL = 1");
        $row2 = $query2->fetch_assoc();

        $sql_dusun = $mysqli->query("SELECT * FROM tabel_dusun WHERE id='$row2[DSN]'");
        $row_dusun = $sql_dusun->fetch_assoc();
    ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row2['NO_KK'] ?></td>
            <td><?= $row2['NIK'] ?></td>
            <td><?= $row2['NAMA_LGKP'] ?></td>
            <td><?= tgl_indo($row2['TGL_LHR']) ?></td>
            <td><?= $row2['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
            <td>Rp. <?= number_format($row2['PENGHASILAN_PER_BULAN']); ?></td>
            <td><?= $row_dusun['dusun'] ?></td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="nik" value="<?= $row2['NIK'] ?>">
                    <button type="submit" name="update_pkh" class="btn btn-primary btn-xs" onclick="return confirm('Yakin menambahkan data ini ke Bantuan PKH ?')"><i class="fas fa-plus"></i> Tambah Bantuan</button>
                </form>
            </td>
        </tr>
    <?php
    }
}

function tampil_rekom_bst($mysqli)
{
    $nomor = 1;
    $query = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND (KEPEMILIKAN_TABUNGAN = '0' OR (KEPEMILIKAN_TABUNGAN = '1' AND (JENIS_TABUNGAN = '1' OR JENIS_TABUNGAN = '2' OR JENIS_TABUNGAN = '3' OR JENIS_TABUNGAN = '4' OR JENIS_TABUNGAN = '5') AND HARGA < 500000))");
    while ($row = $query->fetch_assoc()) {

        $sql_dusun = $mysqli->query("SELECT * FROM tabel_dusun WHERE id='$row[DSN]'");
        $row_dusun = $sql_dusun->fetch_assoc();
    ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row['NO_KK'] ?></td>
            <td><?= $row['NIK'] ?></td>
            <td><?= $row['NAMA_LGKP'] ?></td>
            <td><?= tgl_indo($row['TGL_LHR']) ?></td>
            <td><?= $row['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
            <td>Rp. <?= number_format($row['PENGHASILAN_PER_BULAN']); ?></td>
            <td><?= $row_dusun['dusun'] ?></td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="nik" value="<?= $row['NIK'] ?>">
                    <button type="submit" name="update_bst" class="btn btn-primary btn-xs" onclick="return confirm('Yakin menambahkan data ini ke Bantuan Sosial Tunai (BST) ?')"><i class="fas fa-plus"></i> Tambah Bantuan</button>
                </form>
            </td>
        </tr>
        <?php
    }
}

function tampil_rekom_blt($mysqli)
{
    $nomor = 1;
    $query = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND (KEPEMILIKAN_TABUNGAN = '0' OR (KEPEMILIKAN_TABUNGAN = '1' AND (JENIS_TABUNGAN = '1' OR JENIS_TABUNGAN = '2' OR JENIS_TABUNGAN = '3' OR JENIS_TABUNGAN = '4' OR JENIS_TABUNGAN = '5') AND HARGA < 500000))");
    while ($row = $query->fetch_assoc()) {
        $sql_dusun = $mysqli->query("SELECT * FROM tabel_dusun WHERE id='$row[DSN]'");
        $row_dusun = $sql_dusun->fetch_assoc();

        $d1 = $row['bantuan'];
        $d2 = $row['LUAS_LANTAI'];
        $d3 = $row['JENIS_LANTAI'];
        $d4 = $row['JENIS_DINDING'];
        $d5 = $row['FASILITAS_BAB'];
        $d6 = $row['SUMBER_PENERANGAN'];
        $d7 = $row['SUMBER_AIR_MINUM'];
        $d8 = $row['BAHAN_BAKAR_MEMASAK'];
        $d9 = $row['FREKUENSI_PER_MINGGU'];
        $d10 = $row['PAKAIAN_PER_TAHUN'];
        $d11 = $row['MAKAN_PER_HARI'];
        $d12 = $row['BIAYA_PENGOBATAN'];
        $d13 = $row['PENGHASILAN_PER_BULAN'];
        $d14 = $row['PENDIDIKAN_TERAKHIR'];
        $d15 = $row['KEPEMILIKAN_TABUNGAN'];

        $data_array = [];

        if ($d1 == 1) {
            array_push($data_array, true);
        }

        if ($d2 == 1) {
            array_push($data_array, true);
        }

        if ($d3 == "Bambu" || $d3 == "Kayu/Papan") {
            array_push($data_array, true);
        }

        if ($d4 == "Bambu" || $d4 == "Rumbia" || $d4 == "Tembok Tanpa Di Plester") {
            array_push($data_array, true);
        }

        if ($d5 == 0) {
            array_push($data_array, true);
        }

        if ($d6 == 0) {
            array_push($data_array, true);
        }

        if ($d7 == "Sungai" || $d7 == "Mata Air Tidak Terlindung" || $d8 == "Air Hujan") {
            array_push($data_array, true);
        }

        if ($d8 == "Kayu Bakar" || $d8 == "Minyak Tanah") {
            array_push($data_array, true);
        }

        if ($d9 <= 1) {
            array_push($data_array, true);
        }

        if ($d10 <= 1) {
            array_push($data_array, true);
        }

        if ($d11 <= 2) {
            array_push($data_array, true);
        }

        if ($d12 == 0) {
            array_push($data_array, true);
        }

        if ($d13 < 600000) {
            array_push($data_array, true);
        }

        if ($d14 == "Tidak Tamat SD" || $d14 == "Tidak Sekolah" || $d14 == "SD dan Sederajat") {
            array_push($data_array, true);
        }

        if ($d15 == 0) {
            array_push($data_array, true);
        }

        $count_data = count($data_array);

        if ($count_data >= 9) {
        ?>
            <tr>
                <td><?= $nomor++ ?></td>
                <td><?= $row['NO_KK'] ?></td>
                <td><?= $row['NIK'] ?></td>
                <td><?= $row['NAMA_LGKP'] ?></td>
                <td><?= tgl_indo($row['TGL_LHR']) ?></td>
                <td><?= $row['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
                <td>Rp. <?= number_format($row['PENGHASILAN_PER_BULAN']); ?></td>
                <td><?= $row_dusun['dusun'] ?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="nik" value="<?= $row['NIK'] ?>">
                        <button type="submit" name="update_blt" class="btn btn-primary btn-xs" onclick="return confirm('Yakin menambahkan data ini ke BLT-Dana Desa ?')"><i class="fas fa-plus"></i> Tambah Bantuan</button>
                    </form>
                </td>
            </tr>
        <?php
        }
    }
}

function tampil_penerima($mysqli)
{
    $nomor = 1;
    $query_penerima = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan='1'");
    while ($row_peneriama = $query_penerima->fetch_assoc()) {

        $sql_dusun = $mysqli->query("SELECT * FROM tabel_dusun WHERE id='$row_peneriama[DSN]'");
        $row_dusun = $sql_dusun->fetch_assoc();
        ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row_peneriama['NO_KK'] ?></td>
            <td><?= $row_peneriama['NIK'] ?></td>
            <td><?= $row_peneriama['NAMA_LGKP'] ?></td>
            <td><?= $row_peneriama['jenis_bantuan'] ?></td>
            <td><?= tgl_indo($row_peneriama['TGL_LHR']) ?></td>
            <td><?= $row_peneriama['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
            <td><?= $row_dusun['dusun'] ?></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="nik" value="<?= $row_peneriama['NIK'] ?>">
                    <button name="hapus_daftar" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Hapus Dari Daftar</button>
                </form>
            </td>
        </tr>
<?php
    }
}
?>