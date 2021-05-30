<?php

function tampil_rekom_bantuan($mysqli)
{
    $nomor = 1;
    $query = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_konsumsi ON tabel_kependudukan.NIK = tabel_konsumsi.NIK JOIN tabel_pekerjaan ON tabel_pekerjaan.NIK = tabel_kependudukan.NIK JOIN tabel_pendidikan ON tabel_pendidikan.NIK = tabel_kependudukan.NIK JOIN tabel_rumah ON tabel_rumah.NIK = tabel_kependudukan.NIK JOIN tabel_tabungan ON tabel_tabungan.NIK = tabel_kependudukan.NIK WHERE tabel_kependudukan.HBKEL = '1' AND bantuan='0' AND LUAS_LANTAI = '1' AND (JENIS_LANTAI ='Bambu' OR JENIS_LANTAI ='Kayu/Papan') AND (JENIS_DINDING ='Bambu' OR JENIS_DINDING ='Rumbia' OR JENIS_DINDING ='Tembok Tanpa Di Plester') AND FASILITAS_BAB = '0' AND SUMBER_PENERANGAN ='0' AND (SUMBER_AIR_MINUM = 'Sungai' OR SUMBER_AIR_MINUM = 'Mata Air Tidak Terlindung' OR SUMBER_AIR_MINUM = 'Air Hujan') AND (BAHAN_BAKAR_MEMASAK = 'Kayu Bakar' OR BAHAN_BAKAR_MEMASAK = 'Minyak Tanah') AND FREKUENSI_PER_MINGGU <= 1 AND PAKAIAN_PER_TAHUN <= 1 AND MAKAN_PER_HARI <= 2 AND BIAYA_PENGOBATAN = '0' AND PENGHASILAN_PER_BULAN < 600000 AND (PENDIDIKAN_TERAKHIR ='Tidak Tamat SD' OR PENDIDIKAN_TERAKHIR ='Tidak Sekolah' OR PENDIDIKAN_TERAKHIR ='SD dan Sederajat') AND KEPEMILIKAN_TABUNGAN = '0'");
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
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal<?= $row['NIK'] ?>"><i class="fas fa-plus"></i> Tambah Bantuan</button></td>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $row['NIK'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <form action="" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?= $row['NIK'] ?> - <?= $row['NAMA_LGKP']; ?></h5>
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                            <label for="">Jenis Bantuan</label>
                            <select class="form-control" name="jenis_bantuan" style="width: 100%;">
                                 <option hidden>--Pilih Jenis Tabungan--</option>
                                 <option value="BLT">BLT</option>
                                 <option value="Program Keluarga Harapan">Program Keluarga Harapan</option>
                                 <option value="Bantuan Sosial Tunai">Bantuan Sosial Tunai</option>
                                 <option value="Bantuan Presiden">Bantuan Presiden</option>
                                 <option value="Bantuan UMKM">Bantuan UMKM</option>
                                 <option value="Bantuan Untuk Pekerja">Bantuan Untuk Pekerja</option>
                                 <option value="Bantuan Pendidikan Anak">Bantuan Pendidikan Anak</option>
                             </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="nik" value="<?= $row['NIK'] ?>">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" name="update_bntn" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </tr>
<?php
    }
}
function tampil_penerima($mysqli){
   $nomor = 1;
   $query_penerima = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE bantuan='1'");
   while($row_peneriama = $query_penerima->fetch_assoc()){
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