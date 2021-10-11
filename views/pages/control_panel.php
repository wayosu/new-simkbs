<?php
$url = "http://$_SERVER[HTTP_HOST]/simkbs/";
include 'app/post/post_control_panel.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3><i class="nav-icon fas fa-cog"></i> Control Panel</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Control Panel</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img border-0 img-fluid" src="<?= $base_url; ?>dist/img/<?= $row_profil->logo_desa; ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $row_profil->nama_desa; ?></h3>
                        <p class="text-muted text-center"><?= $row_profil->alamat; ?></p>


                        <button type="button" class="btn btn-sm btn-default btn-block" data-toggle="modal" data-target="#modal-edit-profil">
                            <i class="fas fa-edit"></i> Edit Profil
                        </button>

                        <ul class="list-group list-group-unbordered mt-3">
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right"><?= $row_profil->email; ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Maps</b>
                                <iframe src="<?= $row_profil->maps; ?>" class="mt-3" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </li>
                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-1">Data Dusun</h3>
                        <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modal-tambah">
                            <i class="fas fa-plus-circle"></i> Tambah Dusun
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped example3" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th>Dusun</th>
                                        <th width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php tampil_dusun($mysqli); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah Dusun</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <label for="dusun">Dusun</label>
                    <input type="text" name="dusun" id="dusun" class="form-control">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="tambah_dusun" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-edit-profil">
    <div class="modal-dialog modal-large modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Edit Profil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_profil" value="<?= $row_profil->id; ?>">
                <input type="hidden" name="logo_sebelumnya" value="<?= $row_profil->logo_desa; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_desa">Nama Desa</label>
                        <input type="text" name="nama_desa" id="nama_desa" class="form-control" value="<?= $row_profil->nama_desa; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= $row_profil->email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="2" class="form-control"><?= $row_profil->alamat; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="maps">Maps</label>
                        <textarea name="maps" id="maps" rows="3" class="form-control"><?= $row_profil->maps; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo Desa</label>
                        <input type="file" name="gambar" id="logo" class="form-control-file" onchange="loadFile(event)">
                        <small>*maksimal 4MB</small>
                    </div>
                    <div class="form-group">
                        <img id="img-preview" class="img-fluid" width="150">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="edit_profil" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('img-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>