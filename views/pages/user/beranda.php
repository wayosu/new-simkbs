<?php
$sql_pria = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE JK='1'");
$sql_wanita = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE JK='2'");
$sql_total = $mysqli->query("SELECT * FROM tabel_kependudukan");

$sql_belum_sekolah = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Sekolah'");
$sql_tidak_tamat_sd = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='Tidak Tamat SD'");
$sql_sd = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='SD dan Sederajat'");
$sql_smp = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMP dan Sederajat'");
$sql_sma = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='SMA dan Sederajat'");
// $sql_diploma = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='Diploma 1-3'");
$sql_s1 = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK = tabel_pendidikan.NIK WHERE tabel_pendidikan.PENDIDIKAN_TERAKHIR='S1 dan Sederajat'");
// $total_ds1 = mysqli_num_rows($sql_diploma) + mysqli_num_rows($sql_s1);
?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1>Kependudukan dan Bantuan Sosial</h1>
                <p>Kependudukan dan Bantuan Sosial atau disingkat KBS merupakan sistem yang menampilkan data penduduk dan data penerima bantuan sosial di Desa Butu</p>
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
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pencarian lebih lengkap</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <!-- Dusun -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Dusun</label>
                                        <select id="inputState" class="form-control">
                                            <option value="pilihdusun">Pilih Dusun</option>
                                            <option value="dusun1">Dusun 1</option>
                                            <option value="dusun2">Dusun 2</option>
                                            <option value="dusun3">Dusun 3</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- RT -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">RT</label>
                                        <select id="inputState" class="form-control">
                                            <option value="pilihrt">Pilih RT</option>
                                            <option value="rt1">RT 1</option>
                                            <option value="rt2">RT 2</option>
                                            <option value="rt3">RT 3</option>
                                            <option value="rt4">RT 4</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- RW  -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">RW</label>
                                        <select id="inputState" class="form-control">
                                            <option value="pilihrw">Pilih RW</option>
                                            <option value="rw1">RW 1</option>
                                            <option value="rw2">RW 2</option>
                                            <option value="rw3">RW 3</option>
                                            <option value="rw4">RW 4</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- Tipe bantuan -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Tipe Bantuan</label>
                                        <select id="inputState" class="form-control">
                                            <option value="pilihtb">Pilih Tipe Bantuan</option>
                                            <option value="pkh">PKH</option>
                                            <option value="ks">Kartu Sembako</option>
                                            <option value="ksp">Kartu Sembako Perluasan</option>
                                            <option value="btk">Bansos Tunai Kemensos</option>
                                            <option value="bsp">Bansos Sembako Presiden</option>
                                            <option value="bd">Dana Desa</option>
                                            <option value="bpk">Bansos Kabupaten Kota</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Terapkan</button>
                    </div>
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
                            <form class="d-flex custom-search" method="POST">
                                <input class="form-control me-2" type="search" placeholder="Masukan NIK Kepala Keluarga" aria-label="Search">

                                <!-- Tombol cari -->
                                <button class="btn btn-primary me-2" type="submit">Cari</button>
                                <div>

                                </div>

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
                        <p class="description">Jumlah laki-laki yang berada di Desa Butu adalah <b><?= mysqli_num_rows($sql_pria); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/perempuan@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Perempuan</a></h4>
                        <p class="description">Jumlah perempuan yang berada di Desa Butu adalah <b><?= mysqli_num_rows($sql_wanita); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/total@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Total</a></h4>
                        <p class="description">Jumlah total laki-laki dan perempuan yang berada di Desa Butu adalah <b><?= mysqli_num_rows($sql_total); ?></b> Jiwa</p>
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
                        <p class="description">Jumlah penduduk yang belum sekolah di Desa Butu adalah <b><?= mysqli_num_rows($sql_belum_sekolah); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/putussekolah@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Tidak Tamat SD</a></h4>
                        <p class="description">Jumlah penduduk yang tidak tamat SD di Desa Butu adalah <b><?= mysqli_num_rows($sql_tidak_tamat_sd); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/sd_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Tamat SD/Sederajat</a></h4>
                        <p class="description">Jumlah penduduk yang tamat SD/Sederajat di Desa Butu adalah <b><?= mysqli_num_rows($sql_sd); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/smp@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">SLTP/Sederajat</a></h4>
                        <p class="description">Jumlah penduduk yang tamat SLTP/Sederajat di Desa Butu adalah <b><?= mysqli_num_rows($sql_smp); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/sma@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">SLTA/Sederajat</a></h4>
                        <p class="description">Jumlah penduduk yang tamat SLTA/Sederajat di Desa Butu adalah <b><?= mysqli_num_rows($sql_sma); ?></b> Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/d3s1_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Diploma IV/S1</a></h4>
                        <p class="description">Jumlah penduduk yang Diploma VI/S1 di Desa Butu adalah <b><?= mysqli_num_rows($sql_s1); ?></b> Jiwa</p>
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

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/irt@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Mengurus Rumah Tangga</a></h4>
                        <p class="description">Jumlah orang yang hanya mengurus rumah tangga di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/belumberkerja@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Belum/Tidak Berkerja</a></h4>
                        <p class="description">Jumlah penduduk yang belum/tidak berkerja di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/pelajar_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Pelajar/Mahasiswa</a></h4>
                        <p class="description">Jumlah pelajar/mahasiswa di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/wirausaha@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Wiraswasta</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai wiraswasta di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/pns_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Pegawai Negeri Sipil</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai pegawai negeri sipil di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/petani@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Petani/Pekebun</a></h4>
                        <p class="description">Jumlah penduduk yang berkerja sebagai petani/pekebun di Desa Butu adalah 437 Jiwa</p>
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

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/bayi_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Bayi</a></h4>
                        <p class="description">Jumlah bayi yang berada di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/anak@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Anak-anak</a></h4>
                        <p class="description">Jumlah anak-anak yang berada di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/remaja_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Remaja</a></h4>
                        <p class="description">Jumlah remaja yang berada di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/dewasa_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Dewasa</a></h4>
                        <p class="description">Jumlah orang dewasa yang berada adi Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/orang tua_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Lansia</a></h4>
                        <p class="description">Jumlah orang tua yang berada di Desa Butu adalah 437 Jiwa</p>
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

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/religion/islam.png" alt="" class="p-3" width="50%"></div>
                        <h4 class="title"><a href="">Islam</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Islam di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/religion/christian.png" alt="" class="p-3" width="50%"></div>
                        <h4 class="title"><a href="">Kristen</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Kristen di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/religion/christian.png" alt="" class="p-3" width="50%"></div>
                        <h4 class="title"><a href="">Katolik</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Kristen di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon">
                            <img src="<?= $base_url; ?>asset_user/img/4x/religion/buddhism.png" alt="" class="p-3" width="50%">
                        </div>
                        <h4 class="title"><a href="">Budha</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Kristen di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/religion/hinduism.png" alt="" class="p-3" width="50%"></div>
                        <h4 class="title"><a href="">Hindu</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Kristen di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/religion/confucianism.png" alt="" class="p-3" width="50%"></div>
                        <h4 class="title"><a href="">Khonghucu</a></h4>
                        <p class="description">Jumlah orang yang memeluk agama Kristen di Desa Butu adalah 437 Jiwa</p>
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

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/dusun_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Dusun 1</a></h4>
                        <p class="description">Jumlah penduduk yang berada di Dusun 1 di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/dusun_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Dusun 2</a></h4>
                        <p class="description">Jumlah penduduk yang berada di Dusun 2 di Desa Butu adalah 437 Jiwa</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><img src="<?= $base_url; ?>asset_user/img/4x/dusun_1@4x-8.png" alt=""></div>
                        <h4 class="title"><a href="">Dusun 3</a></h4>
                        <p class="description">Jumlah penduduk yang berada di Dusun 3 di Desa Butu adalah 437 Jiwa</p>
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
                <h2>Contact Us</h2>
                <p>Contact us the get started</p>
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Lokasi:</h4>
                            <p>Butu, Tilongkabila, Kabupaten Bone Bolango, Gorontalo 96121</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p>+1 5589 55488 55s</p>
                        </div>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6254395060873!2d123.13536451450308!3d0.56338769958898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x327ed4772c65513d%3A0xa40497c0110f12d9!2sKantor%20Desa%20Butu%2C%20Kec.%20Tilongkabila!5e0!3m2!1sid!2sid!4v1621784340150!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                <label for="name">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Message</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <!-- Tombol kirim pesan -->
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Us Section -->

</main><!-- End #main -->