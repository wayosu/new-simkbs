<?php
if (isset($_GET['nik'])) {
    $base_url = 'http://localhost/simkbs/';
    include 'app/koneksi.php';

    $sql_profil = "SELECT * FROM tabel_control WHERE id=1";
    $result_profil = $mysqli->query($sql_profil);
    $row_profil = $result_profil->fetch_object();

    include 'views/layout/user/header.php';
    include 'views/layout/user/navbar.php';

    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    $query = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE NIK='{$_GET['nik']}' AND bantuan=1");

    if (mysqli_num_rows($query) > 0) {
        $row = $query->fetch_assoc();
        $sql_dusun1 = $mysqli->query("SELECT * FROM tabel_dusun WHERE id='{$row['DSN']}'");
        $row_dusun1 = $sql_dusun1->fetch_assoc();
?>
        <main id="main">
            <div class="pt-3" style="min-height: 629px;">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="text-center">
                            <img src="<?= $base_url; ?>asset_user/img/logo-campur.png" alt="logo" width="5%">
                            <h4>Informasi Penerima Bantuan</h4>
                            <!-- pencarian -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                <a href="beranda" class="btn text-light" style="background-color: #042165;">
                                    <span class="fas fa-arrow-alt-circle-left"></span> Kembali</a>
                            </h3>
                            <div class="card">
                                <div class="card-header">
                                    <small class="card-title">Daftar Data Kependudukan</small>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="example1" style="font-size: 14px;">
                                            <thead>
                                                <tr>
                                                    <th>No. KK</th>
                                                    <th>NIK</th>
                                                    <th>Nama Kepala Keluarga</th>
                                                    <th>Tgl Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Jenis Bantuan</th>
                                                    <th>Dusun</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><?= $row['NO_KK'] ?></td>
                                                    <td><?= $row['NIK'] ?></td>
                                                    <td><?= $row['NAMA_LGKP'] ?></td>
                                                    <td><?= tgl_indo($row['TGL_LHR']) ?></td>
                                                    <td><?= $row['JK'] == '1' ? 'Laki Laki' : 'Perempuan'; ?></td>
                                                    <td><?= $row['jenis_bantuan'] ?></td>
                                                    <td><?= $row_dusun1['dusun'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    <?php
    } else {
    ?>
        <main id="main">
            <div class="pt-5" style="min-height: 629px;">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-md-6 align-items-center text-center">
                            <img src="<?= $base_url; ?>asset_user/img/not.png" alt="not-found" class="img-fluid" width="50%">
                            <h4 style="font-size: 1.4rem;">Penerima Bantuan Tidak Ditemukan</h4>
                            <p style="font-size: 0.9rem;">
                                Maaf Kami tidak dapat menemukan NIK yang anda cari. 
                                Data tidak ditemukan dikarenakan tidak terdaftar 
                                di aplikasi KBS atau ada kesalahan di data kependudukan 
                                yang didaftarkan di aplikasi KBS.
                            </p>
                            <a href="beranda" class="btn btn-sm text-light" style="background-color: #042165;">
                                    <span class="fas fa-arrow-alt-circle-left"></span> Kembali</a>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    <?php
    }
    include 'views/layout/user/footer.php';
} else {
    ?>
    <script>
        alert("Masukkan nik terlebih dahulu pada form 'Cari Informasi Penerima Bantuan'");
        document.location.href = 'beranda';
    </script>
<?php
}
?>