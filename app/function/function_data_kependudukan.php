<?php
function tampil_data($mysqli)
{
    $sql = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK=tabel_pendidikan.NIK JOIN tabel_pekerjaan ON tabel_kependudukan.NIK=tabel_pekerjaan.NIK ORDER BY tabel_kependudukan.NO_KK DESC");
    while ($row = $sql->fetch_assoc()) {
        $sql_dusun = $mysqli->query("SELECT * FROM tabel_dusun WHERE id='$row[DSN]'");
        $row_dusun = $sql_dusun->fetch_assoc();
?>
        <tr>
            <td><?= $row['NO_KK']; ?></td>
            <td><?= $row['NIK']; ?></td>
            <td><?= $row['NAMA_LGKP']; ?></td>
            <td>
                <?php if ($row['JK'] == 1) : ?>
                    Laki-laki
                <?php else : ?>
                    Perempuan
                <?php endif; ?>
            </td>
            <td>
                <?php if ($row['HBKEL'] == 1) : ?>
                    Kepala Keluarga
                <?php elseif ($row['HBKEL'] == 3) : ?>
                    Istri
                <?php elseif ($row['HBKEL'] == 9) : ?>
                    Anak
                <?php elseif ($row['HBKEL'] == 7) : ?>
                    Kakek
                <?php elseif ($row['HBKEL'] == 6) : ?>
                    Nenek
                <?php elseif ($row['HBKEL'] == 4) : ?>
                    Family Lain
                <?php else : ?>
                    -
                <?php endif; ?>
            </td>
            <td><?= $row['TMPT_LHR']; ?>, <?= tgl_indo($row['TGL_LHR']); ?></td>
            <td><?= $row['PEKERJAAN']; ?></td>
            <td>Rp. <?= number_format($row['PENGHASILAN_PER_BULAN']); ?></td>
            <td><?= $row_dusun['dusun']; ?></td>
            <td>
                <button type="button" class="btn btn-default" data-toggle="dropdown">
                    <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu">
                    <form action="data_kependudukan" method="POST">
                        <input type="hidden" name="nik" value="<?= $row['NIK']; ?>">
                        <button class="dropdown-item" type="submit" name="hapus_data" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="edit_data_kependudukan/<?= $row['NIK']; ?>" class="dropdown-item">Edit</a>
                    <a href="detail_penduduk/<?= $row['NIK']; ?>" class="dropdown-item">Detail</a>
                </div>
            </td>
        </tr>
<?php
    }
}
?>