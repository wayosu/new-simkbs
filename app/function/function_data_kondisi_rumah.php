<?php
function tampil_data($mysqli)
{
    $sql = $mysqli->query("SELECT * FROM tabel_rumah JOIN tabel_kependudukan ON tabel_rumah.NIK = tabel_kependudukan.NIK");
    while ($row = $sql->fetch_assoc()) {
?>
        <tr>
            <td><?= $row['NO_KK']; ?></td>
            <td><?= $row['NIK']; ?></td>
            <td><?= $row['NAMA_LGKP']; ?></td>
            <td>
                <?php if ($row['LUAS_LANTAI'] == 1) : ?>
                    <= 8m Persegi <?php else : ?>> 8m Persegi <?php endif; ?>
            </td>
            <td><?= $row['JENIS_LANTAI']; ?></td>
            <td><?= $row['JENIS_DINDING']; ?></td>
            <td>
                <?php if ($row['FASILITAS_BAB'] == 0) : ?>
                    Milik Umum
                <?php else : ?>
                    Milik Sendiri
                <?php endif; ?>
            </td>
            <td>
                <?php if ($row['SUMBER_PENERANGAN'] == 0) : ?>
                    Tidak Menggunakan Listrik
                <?php else : ?>
                    Menggunakan Listrik
                <?php endif; ?>
            </td>
            <td><?= $row['SUMBER_AIR_MINUM']; ?></td>
            <td><?= $row['BAHAN_BAKAR_MEMASAK']; ?></td>
            <td>
                <button type="button" class="btn btn-default" data-toggle="dropdown">
                    <i class="fas fa-cog"></i>
                </button>
                <div class="dropdown-menu">
                    <form action="data_kondisi_rumah" method="POST">
                        <input type="hidden" name="nik" value="<?= $row['NIK']; ?>">
                        <button class="dropdown-item" type="submit" name="hapus_data" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="edit_data_kondisi/<?= $row['NIK']; ?>" class="dropdown-item">Edit</a>
                </div>
            </td>
        </tr>
<?php
    }
}
