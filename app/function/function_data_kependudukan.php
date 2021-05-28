<?php
function tampil_data($mysqli)
{
    $sql = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK=tabel_pendidikan.NIK JOIN tabel_pekerjaan ON tabel_kependudukan.NIK=tabel_pekerjaan.NIK");
    while ($row = $sql->fetch_assoc()) {
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
            <td><?= $row['TMPT_LHR']; ?></td>
            <td><?= $row['TGL_LHR']; ?></td>
            <td><?= $row['AGAMA']; ?></td>
            <td><?= $row['PENDIDIKAN_TERAKHIR']; ?></td>
            <td><?= $row['PEKERJAAN']; ?></td>
            <td><?= $row['PENGHASILAN_PER_BULAN']; ?></td>
            <td><?= $row['DSN']; ?></td>
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
                </div>
            </td>
        </tr>
<?php
    }
}
?>