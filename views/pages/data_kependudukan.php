<?php error_reporting(0); include 'app/post/post_data_kependudukan.php';  ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3><i class="nav-icon fas fa-users"></i> Data Kependudukan</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Data Kependudukan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="input_data_kependudukan" class="btn btn-primary">
                    <i class="fas fa-plus-square"></i> Data Kependudukan
                </a>
                <a href="app/print/data_kependudukan.php" target="_BLANK" class="btn btn-success">
                    <i class="fas fa-print"></i> Print
                </a>
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Data Kependudukan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped example3" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th>No KK</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Hubungan Keluarga</th>
                                        <th>Tempat Tanggal Lahir</th>
                                        <!-- <th>Agama</th> -->
                                        <!-- <th>Pendidikan Terakhir</th> -->
                                        <th>Pekerjaan Utama</th>
                                        <th>Penghasilan per Bulan</th>
                                        <th>Dusun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php tampil_data($mysqli); ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>