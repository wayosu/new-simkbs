<?php

function tampil_rekom_bpnt($mysqli)
{
    $nomor = 1;
    $query = $mysqli->query("SELECT * FROM tabel_kependudukan 
                                JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK 
                                JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK 
                                JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK 
                                WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0'
                                    AND (PEKERJAAN ='Tidak Bekerja' OR PEKERJAAN ='Petani' OR PEKERJAAN ='Buruh Tani' OR PEKERJAAN ='Buruh Bangunan' OR PEKERJAAN ='Buruh Perkebunan' OR PEKERJAAN ='Nelayan' OR PEKERJAAN ='Pedagang Kecil')
                                    AND (JENIS_LANTAI ='Tanah' OR JENIS_LANTAI ='Kayu/Papan berkualitas rendah' OR JENIS_LANTAI = 'Bambu' OR JENIS_LANTAI = 'Cor' OR JENIS_LANTAI = 'Semen/Bata merah') 
                                    AND (JENIS_DINDING ='Kayu berkualitas rendah/Bambu' OR JENIS_DINDING ='Tembok tanpa diplester')
                                    AND (SUMBER_AIR_MINUM = 'Sumur' OR SUMBER_AIR_MINUM = 'Mata air tidak terlindung' OR SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Air Hujan') 
                                    AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah' OR BAHAN_BAKAR_MEMASAK = 'Gas Subsidi') 
                                    AND FREKUENSI_PER_MINGGU <= 1 AND MAKAN_PER_HARI <= 2 
                                    AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN <= 750000");
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
    $query = $mysqli->query("SELECT * FROM tabel_kependudukan 
                                JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK 
                                JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK 
                                JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK 
                                JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK
                                WHERE (tabel_kependudukan.HBKEL = '1' AND bantuan='0' 
                                    AND (PEKERJAAN ='Tidak Bekerja' OR PEKERJAAN ='Petani' OR PEKERJAAN ='Buruh Tani' OR PEKERJAAN ='Buruh Bangunan' OR PEKERJAAN ='Buruh Perkebunan' OR PEKERJAAN ='Nelayan' OR PEKERJAAN ='Pedagang Kecil')
                                    AND (JENIS_LANTAI ='Tanah' OR JENIS_LANTAI ='Kayu/Papan berkualitas rendah' OR JENIS_LANTAI = 'Bambu' OR JENIS_LANTAI = 'Cor' OR JENIS_LANTAI = 'Semen/Bata merah') 
                                    AND (JENIS_DINDING ='Kayu berkualitas rendah/Bambu' OR JENIS_DINDING ='Tembok tanpa diplester') 
                                    AND (SUMBER_AIR_MINUM = 'Sumur' OR SUMBER_AIR_MINUM = 'Mata air tidak terlindung' OR SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Air Hujan') 
                                    AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah' OR BAHAN_BAKAR_MEMASAK = 'Gas Subsidi') 
                                    AND FREKUENSI_PER_MINGGU <= 1 AND MAKAN_PER_HARI <= 2 
                                    AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 750000 OR disabilitas = 1
                                    AND ((HBKEL = '3' AND TAHUN > 45 OR disabilitas = 1) 
                                    OR (HBKEL = '9' AND ((PENDIDIKAN_TERAKHIR ='SD dan Sederajat' OR PENDIDIKAN_TERAKHIR='SMP dan Sederajat' OR PENDIDIKAN_TERAKHIR='SMA dan Sederajat') AND TAHUN BETWEEN 6 AND 18) 
                                    OR (PENDIDIKAN_TERAKHIR='Tidak Sekolah' AND TAHUN BETWEEN 0 AND 5)) 
                                    OR disabilitas = 1))");
    while ($row = $query->fetch_assoc()) {
        $query2 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE NO_KK = '{$row['NO_KK']}' AND HBKEL = 1");
        $row2 = $query2->fetch_assoc();
    ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row2['NO_KK'] ?></td>
            <td><?= $row2['NIK'] ?></td>
            <td><?= $row2['NAMA_LGKP'] ?></td>
            <td><?= tgl_indo($row2['TGL_LHR']) ?></td>
            <td><?= $row2['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
            <td>Rp. <?= number_format($row2['PENGHASILAN_PER_BULAN']); ?></td>
            <td><?= $row2['DSN'] ?></td>
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
    $query = $mysqli->query("SELECT * FROM tabel_kependudukan 
                                JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK 
                                JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK 
                                JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK 
                                WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' 
                                    AND (PEKERJAAN ='Tidak Bekerja' OR PEKERJAAN ='Petani' OR PEKERJAAN ='Buruh Tani' OR PEKERJAAN ='Buruh Bangunan' OR PEKERJAAN ='Buruh Perkebunan' OR PEKERJAAN ='Nelayan' OR PEKERJAAN ='Pedagang Kecil')
                                    AND (JENIS_LANTAI ='Tanah' OR JENIS_LANTAI ='Kayu/Papan berkualitas rendah' OR JENIS_LANTAI = 'Bambu' OR JENIS_LANTAI = 'Cor' OR JENIS_LANTAI = 'Semen/Bata merah') 
                                    AND (JENIS_DINDING ='Kayu berkualitas rendah/Bambu' OR JENIS_DINDING ='Tembok tanpa diplester')
                                    AND (SUMBER_AIR_MINUM = 'Sumur' OR SUMBER_AIR_MINUM = 'Mata air tidak terlindung' OR SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Air Hujan') 
                                    AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah' OR BAHAN_BAKAR_MEMASAK = 'Gas Subsidi') 
                                    AND FREKUENSI_PER_MINGGU <= 1 AND MAKAN_PER_HARI <= 2 
                                    AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN <= 750000");
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
    $query = $mysqli->query("SELECT * FROM tabel_kependudukan 
                                JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK 
                                JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK 
                                JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK 
                                WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' 
                                    AND (PEKERJAAN ='Tidak Bekerja' OR PEKERJAAN ='Petani' OR PEKERJAAN ='Buruh Tani' OR PEKERJAAN ='Buruh Bangunan' OR PEKERJAAN ='Buruh Perkebunan' OR PEKERJAAN ='Nelayan' OR PEKERJAAN ='Pedagang Kecil')
                                    AND (JENIS_LANTAI ='Tanah' OR JENIS_LANTAI ='Kayu/Papan berkualitas rendah' OR JENIS_LANTAI = 'Bambu' OR JENIS_LANTAI = 'Cor' OR JENIS_LANTAI = 'Semen/Bata merah') 
                                    AND (JENIS_DINDING ='Kayu berkualitas rendah/Bambu' OR JENIS_DINDING ='Tembok tanpa diplester')
                                    AND (SUMBER_AIR_MINUM = 'Sumur' OR SUMBER_AIR_MINUM = 'Mata air tidak terlindung' OR SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Air Hujan') 
                                    AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah' OR BAHAN_BAKAR_MEMASAK = 'Gas Subsidi') 
                                    AND FREKUENSI_PER_MINGGU <= 1 AND MAKAN_PER_HARI <= 2 
                                    AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN <= 750000");
    while ($row = $query->fetch_assoc()) {
        $d1 = $row['bantuan'];
        $d2 = $row['PEKERJAAN'];
        $d3 = $row['JENIS_LANTAI'];
        $d4 = $row['JENIS_DINDING'];
        $d7 = $row['SUMBER_AIR_MINUM'];
        $d8 = $row['BAHAN_BAKAR_MEMASAK'];
        $d9 = $row['FREKUENSI_PER_MINGGU'];
        $d11 = $row['MAKAN_PER_HARI'];
        $d12 = $row['BIAYA_PENGOBATAN'];
        $d13 = $row['PENGHASILAN_PER_BULAN'];

        $data_array = [];

        if ($d1 == 1) {
            array_push($data_array, true);
        }

        if ($d2 == "Tidak Bekerja" || $d2 == "Buruh Bangunan" || $d2 == "Buruh Perkebunan" || $d2 == "Nelayan" || $d2 == "Pedagang Kecil") {
            array_push($data_array, true);
        }

        if ($d3 == "Tanah" || $d3 == "Kayu/Papan berkualitas rendah" || $d3 == "Bambu" || $d3 == "Cor" || $d3 == "Semen/Bata merah") {
            array_push($data_array, true);
        }

        if ($d4 == "Kayu berkualitas rendah/Bambu" || $d4 == "Tembok tanpa diplester") {
            array_push($data_array, true);
        }

        if ($d7 == "Sumur" || $d7 == "Mata air tidak terlindung" || $d7 == "Sungai" || $d7 == "Air Hujan") {
            array_push($data_array, true);
        }

        if ($d8 == "Kayu Bakar" || $d8 == "Minyak Tanah" || $d8 == "Gas Subsidi") {
            array_push($data_array, true);
        }

        if ($d9 <= 1) {
            array_push($data_array, true);
        }

        if ($d11 <= 2) {
            array_push($data_array, true);
        }

        if ($d12 == 0) {
            array_push($data_array, true);
        }

        if ($d13 < 750000) {
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
                <td><?= $row['DSN'] ?></td>
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
        ?>
        <tr>
            <td><?= $nomor++ ?></td>
            <td><?= $row_peneriama['NO_KK'] ?></td>
            <td><?= $row_peneriama['NIK'] ?></td>
            <td><?= $row_peneriama['NAMA_LGKP'] ?></td>
            <td><?= $row_peneriama['jenis_bantuan'] ?></td>
            <td><?= tgl_indo($row_peneriama['TGL_LHR']) ?></td>
            <td><?= $row_peneriama['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
            <td><?= $row_peneriama['DSN'] ?></td>
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