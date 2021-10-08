<?php
$sql_pria = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE JK='1'");
$sql_wanita = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE JK='2'");
$sql_total = $mysqli->query("SELECT * FROM tabel_kependudukan");

$sql_belum_sekolah = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Sekolah'");
$sql_tidak_tamat_sd = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Tamat SD'");
$sql_sd = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='SD dan Sederajat'");
$sql_smp = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMP dan Sederajat'");
$sql_sma = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMA dan Sederajat'");
$sql_diploma = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='Diploma 1-3'");
$sql_s1 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='S1 dan Sederajat'");
$sql_s2 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='S2 dan Sederajat'");
$sql_s3 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='S3 dan Sederajat'");
// $total_ds1 = mysqli_num_rows($sql_diploma) + mysqli_num_rows($sql_s1);
?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Kependudukan dan Bantuan Sosial</h1>
                <p style="text-align: justify;">
                    Sistem Kependudukan dan Bantuan Sosial atau bisa disingkat KBS merupakan suatu sistem yang dapat mengolah data kependudukan yang berada di Desa Bumela menjadi Data Klasifikasi kependudukan dan Data Klasifikasi Bantuan.
                </p>
                <div>
                    <!-- tombol Lihat Daftar Penerima bantuan -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn-get-started scrollto">Lihat Daftar Penerima Bantuan</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img">
                <img src="<?= $base_url; ?>asset_user/img/test 1@4x-8.png" class="img-fluid animated" alt="">
            </div>
        </div>

        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pencarian Lebih Lengkap</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="filter" method="GET">
                        <div class="modal-body">
                            <!-- Dusun -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pencarian_cek" class="col-form-label"><b>Pencarian Berdasarkan ?</b></label><br>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="pencarian" class="form-check-input" value="rekomendasi">
                                                Rekomendasi Penerima Bantuan
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="pencarian" class="form-check-input" value="penerima">
                                                Penerima Bantuan
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Tipe bantuan -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dusun" class="col-form-label"><b>Dusun</b></label>
                                        <select id="dusun" name="dusun" class="form-control">
                                            <option value="" hidden>Pilih Dusun</option>
                                            <option value="1">Dusun 1</option>
                                            <option value="2">Dusun 2</option>
                                            <option value="3">Dusun 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_bantuan" class="col-form-label"><b>Jenis Bantuan</b></label>
                                        <select id="jenis_bantuan" name="jenis_bantuan" class="form-control pencek">
                                            <option value="" hidden>--Pilih Jenis Bantuan--</option>
                                            <option value="BPNT">Bantuan Sembako (BPNT)</option>
                                            <option value="PKH">Bantuan PKH</option>
                                            <option value="BST">Bantuan Sosial Tunai (BST)</option>
                                            <option value="BLT">Bantuan Langsung Tunai Dana Desa (BLT-Dana Desa)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="terapkan" value="filter_data" class="btn text-light" style="background-color: #042165;">Terapkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- akhir modal -->

    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">



            <div class="footer-newsletter">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Cari Informasi Penerima Bantuan</h2>
                            <!-- pencarian -->
                            <form class="d-flex custom-search" action="search" method="GET">
                                <input class="form-control me-2" type="number" name="nik" placeholder="Masukan NIK Kepala Keluarga" aria-label="Search" required>
                                <!-- Tombol cari -->
                                <button class="btn text-light me-2" type="submit" style="background-color: #042165;">Cari</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-2 d-flex align-items-center justify-content-center about-img">
                <img src="<?= $base_url; ?>asset_user/img/pencarian.png" class="img-fluid" alt="" data-aos="zoom-in">
            </div>
            <div class="text-center">
                <h6>Cari Informasi Penerima Bantuan</h6>
                <p>Untuk mengecek siapa saja yang menerima bantuan, Anda dapat memulai dengan Memasukkan NIK dari kepala keluarga yang ingin dicari.</p>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-2 d-flex align-items-center justify-content-center about-img pb-3">
                <img src="<?= $base_url; ?>asset_user/img/Artboard.png" style="width: 300px !important;" alt="" data-aos="zoom-in">
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 text-center">
                    <h2 style="font-size: 1.5rem;">Klasifikasi Bantuan</h2>
                    <p>
                        Dalam pengklasifikasian bantuan, sistem ini menggunakan kriteria - kriteria yang berdasarkan keputusan
                        Menteri Sosial Republik Indonesia Nomor : 146 / HUK / 2013 tentang penetapan kriteria dan Pendataan Fakir
                        Miskin dan Orang Tidak Mampu terdiri atas 14 (empat belas) kriteria kemiskinan.

                    </p>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Kependudukan ======= -->

    <!-- demo grafipenduduk -->
    <section id="Demografi" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Infografis Kependudukan</h2>
                <p>Demografi Penduduk </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/laki@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Laki-laki</a></h4>
                        <p class="description">Jumlah laki-laki yang berada di Desa Bumela adalah <b><?= mysqli_num_rows($sql_pria); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/perempuan@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Perempuan</a></h4>
                        <p class="description">Jumlah perempuan yang berada di Desa Bumela adalah <b><?= mysqli_num_rows($sql_wanita); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/total@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Total</a></h4>
                        <p class="description">Jumlah total laki-laki dan perempuan yang berada di Desa Bumela adalah <b><?= mysqli_num_rows($sql_total); ?></b> Jiwa</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- akhir Demografi Penduduk -->

    <!-- Pendidikan -->
    <section id="Pendidikan" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Infografis Kependudukan</h2>
                <p>Pendidikan</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/belumsekolah@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Belum Sekolah</a></h4>
                        <p class="description">Jumlah penduduk yang belum sekolah di Desa Bumela adalah <b><?= mysqli_num_rows($sql_belum_sekolah); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/putussekolah@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Tidak Tamat SD</a></h4>
                        <p class="description">Jumlah penduduk yang tidak tamat SD di Desa Bumela adalah <b><?= mysqli_num_rows($sql_tidak_tamat_sd); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/sd_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Tamat SD/Sederajat</a></h4>
                        <p class="description">Jumlah penduduk yang tamat SD/Sederajat di Desa Bumela adalah <b><?= mysqli_num_rows($sql_sd); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/smp@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">SLTP/Sederajat</a></h4>
                        <p class="description">Jumlah penduduk yang tamat SLTP/Sederajat di Desa Butu adalah <b><?= mysqli_num_rows($sql_smp); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/sma@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">SLTA/Sederajat</a></h4>
                        <p class="description">Jumlah penduduk yang tamat SLTA/Sederajat di Desa Bumela adalah <b><?= mysqli_num_rows($sql_sma); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/study/d3@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Diploma 1-3</a></h4>
                        <p class="description">Jumlah penduduk yang Diploma 1-3 di Desa Bumela adalah <b><?= mysqli_num_rows($sql_diploma); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/study/s1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Strata 1</a></h4>
                        <p class="description">Jumlah penduduk yang Strata 1 di Desa Bumela adalah <b><?= mysqli_num_rows($sql_s1); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/study/s2@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Strata 2</a></h4>
                        <p class="description">Jumlah penduduk yang Strata 2 di Desa Bumela adalah <b><?= mysqli_num_rows($sql_s2); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/study/s3@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Strata 3</a></h4>
                        <p class="description">Jumlah penduduk yang Strata di Desa Bumela adalah <b><?= mysqli_num_rows($sql_s3); ?></b> Jiwa</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- Akhir pendidikan -->



    <!-- Pekerjaan -->

    <section id="Pekerjaan" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Infografis Kependudukan</h2>
                <p>Pekerjaan</p>
            </div>

            <?php
            $sql_blmbekerja = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Tidak Bekerja'");
            $sql_petani = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Petani'");
            $sql_buruh_tani = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Buruh Tani'");
            $sql_buruh_kebun = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Buruh Perkebunan'");
            $sql_buruh_bangunan = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Buruh Bangunan'");
            $sql_nelayan = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Nelayan'");
            $sql_guru = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Guru'");
            $sql_pedagang_kecil = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Pedagang Kecil'");
            $sql_pedagang_besar = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Pedagang Besar'");
            $sql_industri = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Pengolahan/Industri'");
            $sql_pns = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='PNS'");
            $sql_pensiun = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Pensiunan'");
            $sql_perdesa = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='Perangkat Desa'");
            $sql_tki = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pekerjaan ON tabel_kependudukan.NIK = tabel_pekerjaan.NIK WHERE tabel_pekerjaan.PEKERJAAN='TKI'");
            ?>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/belumberkerja@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Belum/Tidak Berkerja</a></h4>
                        <p class="description">Jumlah penduduk yang belum/tidak berkerja di Desa Bumela adalah <b><?= mysqli_num_rows($sql_blmbekerja); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/petani.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Petani/Pekebun</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Petani/Pekebun di Desa Bumela adalah <b><?= mysqli_num_rows($sql_petani); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/buruh_tani.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Buruh Tani</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Buruh Tani di Desa Bumela adalah <b><?= mysqli_num_rows($sql_buruh_tani); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/buruh_kebun.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Buruh Perkebunan</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Buruh Perkebunan di Desa Bumela adalah <b><?= mysqli_num_rows($sql_buruh_kebun); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/buruh_bangunan.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Buruh Bangunan</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Buruh Bangunan di Desa Bumela adalah <b><?= mysqli_num_rows($sql_buruh_bangunan); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/nelayan.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Nelayan</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Nelayan di Desa Bumela adalah <b><?= mysqli_num_rows($sql_nelayan); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/pedagang.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Pedagang Kecil</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Pedagang di Desa Bumela adalah <b><?= mysqli_num_rows($sql_pedagang_kecil); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/pedagang.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Pedagang Besar</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Pedagang di Desa Bumela adalah <b><?= mysqli_num_rows($sql_pedagang_besar); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/industry.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Industri</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Industri di Desa Bumela adalah <b><?= mysqli_num_rows($sql_industri); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/guru.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Guru</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Guru di Desa Bumela adalah <b><?= mysqli_num_rows($sql_guru); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/pns.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">PNS</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai PNS di Desa Bumela adalah <b><?= mysqli_num_rows($sql_pns); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/pensiunan.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Pensiunan</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Pensiunan di Desa Bumela adalah <b><?= mysqli_num_rows($sql_pensiun); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/perangkat_desa.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">Perangkat Desa</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai Perangkat Desa di Desa Bumela adalah <b><?= mysqli_num_rows($sql_perdesa); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/job/TKI.png" alt="" class="mt-3 mb-4" width="50%"></div>
                        <h4 class="title"><a href="">TKI</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai TKI di Desa Bumela adalah <b><?= mysqli_num_rows($sql_tki); ?></b> Jiwa</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Akhir Pekerjaan -->


    <!-- Kelompok umur -->

    <section id="Kelompok" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Infografis Kependudukan</h2>
                <p>Kelompok Umur</p>
            </div>

            <?php
            $sql_umur_bayi = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE TAHUN BETWEEN 0 AND 4");
            $sql_umur_anak = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE TAHUN BETWEEN 5 AND 11");
            $sql_umur_remaja = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE TAHUN BETWEEN 12 AND 25");
            $sql_umur_dewasa = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE TAHUN BETWEEN 26 AND 45");
            $sql_umur_lansia = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE TAHUN > 45");
            ?>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/bayi_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Bayi</a></h4>
                        <p class="description">Jumlah bayi yang berada di Desa Bumela adalah <b><?= mysqli_num_rows($sql_umur_bayi); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/anak@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Anak-anak</a></h4>
                        <p class="description">Jumlah anak-anak yang berada di Desa Bumela adalah <b><?= mysqli_num_rows($sql_umur_anak); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/remaja_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Remaja</a></h4>
                        <p class="description">Jumlah remaja yang berada di Desa Bumela adalah <b><?= mysqli_num_rows($sql_umur_remaja); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/dewasa_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Dewasa</a></h4>
                        <p class="description">Jumlah orang dewasa yang berada adi Desa Bumela adalah <b><?= mysqli_num_rows($sql_umur_dewasa); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/orang tua_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Lansia</a></h4>
                        <p class="description">Jumlah orang tua yang berada di Desa Bumela adalah <b><?= mysqli_num_rows($sql_umur_lansia); ?></b> Jiwa</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- end kelopok umur   -->


    <!-- Agama -->
    <section id="Agama" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Infografis Kependudukan</h2>
                <p>Agama</p>
            </div>

            <?php
            $sql_islam = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE AGAMA='islam'");
            $sql_kristen = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE AGAMA='kristen'");
            $sql_katolik = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE AGAMA='katolik'");
            $sql_budha = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE AGAMA='budha'");
            $sql_hindu = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE AGAMA='hindu'");
            $sql_khonghucu = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE AGAMA='khonghucu'");
            ?>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/religion/islam.png" alt="" class="p-3" width="50%"></div>
                        <h4 class="title"><a href="">Islam</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Islam di Desa Bumela adalah <b><?= mysqli_num_rows($sql_islam); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/religion/christian.png" alt="" class="p-3" width="50%"></div>
                        <h4 class="title"><a href="">Kristen</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Kristen di Desa Bumela adalah <b><?= mysqli_num_rows($sql_kristen); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/religion/christian.png" alt="" class="p-3" width="50%"></div>
                        <h4 class="title"><a href="">Katolik</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Kristen di Desa Bumela adalah <b><?= mysqli_num_rows($sql_katolik); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon">
                            <img src="<?= $base_url; ?>asset_user/img/4x/religion/buddhism.png" alt="" class="p-3" width="50%">
                        </div>
                        <h4 class="title"><a href="">Budha</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Kristen di Desa Bumela adalah <b><?= mysqli_num_rows($sql_budha); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/religion/hinduism.png" alt="" class="p-3" width="50%"></div>
                        <h4 class="title"><a href="">Hindu</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Kristen di Desa Bumela adalah <b><?= mysqli_num_rows($sql_hindu); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/religion/confucianism.png" alt="" class="p-3" width="50%"></div>
                        <h4 class="title"><a href="">Khonghucu</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Kristen di Desa Bumela adalah <b><?= mysqli_num_rows($sql_khonghucu); ?></b> Jiwa</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- end agama -->


    <!-- Dusun -->

    <section id="Dusun" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Infografis Kependudukan</h2>
                <p>Dusun</p>
            </div>

            <?php
            $sql_dusun1 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE DSN = 1");
            $sql_dusun2 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE DSN = 2");
            $sql_dusun3 = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE DSN = 3");
            ?>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/dusun_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Dusun 1</a></h4>
                        <p class="description">Jumlah penduduk yang berada di Dusun 1 di Desa Bumela adalah <b><?= mysqli_num_rows($sql_dusun1); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/dusun_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Dusun 2</a></h4>
                        <p class="description">Jumlah penduduk yang berada di Dusun 2 di Desa Bumela adalah <b><?= mysqli_num_rows($sql_dusun2); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/dusun_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Dusun 3</a></h4>
                        <p class="description">Jumlah penduduk yang berada di Dusun 3 di Desa Bumela adalah <b><?= mysqli_num_rows($sql_dusun3); ?></b> Jiwa</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- end dusun -->

    <!-- End Kependudukan -->


    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Hubungi Kami</h2>
                <p>Hubungi kami untuk memulai</p>
            </div>

            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Lokasi:</h4>
                                    <p>Bumela, Bilato, Kabupaten Gorontalo, Gorontalo 96264</p>
                                </div>

                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>desbumela@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="info">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31916.75211570069!2d122.6379923671223!3d0.6075519716319384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x327919a38ef11033%3A0xc2b671aa1ef3b962!2sBumela%2C%20Bilato%2C%20Kabupaten%20Gorontalo%2C%20Gorontalo!5e0!3m2!1sid!2sid!4v1632378337874!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Contact Us Section -->

</main><!-- End #main -->