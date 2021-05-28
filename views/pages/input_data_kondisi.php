<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-plus-square"></i> Input Data Kondisi Rumah</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="data_kondisi_rumah">Data Kondisi Rumah</a></li>
                    <li class="breadcrumb-item active">Input Data Kondisi Rumah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <form action="data_kondisi_rumah" method="POST">
        <a href="data_kondisi_rumah" class="btn text-light" style="background-color: #042165;"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>

        <!-- Default box -->
        <div class="card mt-3">
            <div class="card-header" style="background-color: #042165;">
                <h3 class="card-title text-white">Data Kepala Keluarga</h3>
            </div>

            <!-- form start -->
            <div class="card-body">
                <div class="form-group">
                    <label for="">NIK</label>
                    <select class="form-control select2bs4" name="nik" onchange="fetch_select(this.value);" style="width: 100%;">
                        <option value="" hidden>--Pilih Data Kepala Keluarga--</option>
                        <?php
                        $sql_kepkel = $mysqli->query("SELECT * FROM tabel_kependudukan WHERE HBKEL='1'");
                        while ($row_kepkel = $sql_kepkel->fetch_assoc()) {
                            $sql_kondisi = $mysqli->query("SELECT * FROM tabel_rumah WHERE NIK='{$row_kepkel['NIK']}'");
                            if (mysqli_num_rows($sql_kondisi) == 0) {
                        ?>
                                <option value="<?= $row_kepkel['NIK']; ?>"><?= $row_kepkel['NIK']; ?> - <?= $row_kepkel['NAMA_LGKP']; ?></option>
                        <?php
                            }
                        }

                        ?>
                    </select>
                </div>
                <div id="infoDataKepkel">

                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header" style="background-color: #042165;">
                <h3 class="card-title text-white">Data Kondisi Rumah</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Luas Lantai</label>
                            <select class="form-control select2" name="luas_lantai" style="width: 100%;">
                                <option hidden>--Pilih Luas Lantai--</option>
                                <option value="1">
                                    <= 8m Persegi </option>
                                <option value="2">> 8m Persegi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Lantai</label>
                            <select class="form-control select2" name="jenis_lantai" style="width: 100%;">
                                <option hidden>--Pilih Jenis Lantai--</option>
                                <option value="Marmer">Marmer</option>
                                <option value="Keramik">Keramik</option>
                                <option value="Kayu/Papan">Kayu/Papan</option>
                                <option value="Semen">Semen</option>
                                <option value="Bambu">Bambu</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Dinding</label>
                            <select class="form-control select2" name="jenis_dinding" style="width: 100%;">
                                <option hidden>--Pilih Jenis Dinding--</option>
                                <option value="Bambu">Bambu</option>
                                <option value="Rumbia">Rumbia</option>
                                <option value="Tembok Tanpa Di Plester">Tembok Tanpa Di Plester</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sumber Air Minum</label>
                            <select class="form-control select2" name="sumber_air" style="width: 100%;">
                                <option hidden>--Pilih Sumber Air Minum--</option>
                                <option value="Mata Air tidak Terlindung">Mata Air tidak Terlindung</option>
                                <option value="Sungai">Sungai</option>
                                <option value="Air Hujan">Air Hujan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bahan Bakar Memasak</label>
                            <select class="form-control select2" name="bahan_bakar" style="width: 100%;">
                                <option hidden>--Pilih Bahan Bakar Memasak--</option>
                                <option value="Kayu Bakar">Kayu Bakar</option>
                                <option value="Minyak Tanah">Minyak Tanah</option>
                                <option value="Gas">Gas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fasilitas MCK</label><br>
                            <div class="form-check-inline mt-2">
                                <label class="form-check-label">
                                    <input type="radio" name="fasilitas_mck" class="form-check-input" value="0">Milik Umum
                                </label>
                            </div>
                            <div class="form-check-inline mt-2">
                                <label class="form-check-label">
                                    <input type="radio" name="fasilitas_mck" class="form-check-input" value="1">Milik Sendiri
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sumber Penerangan</label><br>
                            <div class="form-check-inline mt-2">
                                <label class="form-check-label">
                                    <input type="radio" name="sumber_penerangan" class="form-check-input" value="0">Tidak Menggunakan Listrik
                                </label>
                            </div>
                            <div class="form-check-inline mt-2">
                                <label class="form-check-label">
                                    <input type="radio" name="sumber_penerangan" class="form-check-input" value="1">Menggunakan Listrik
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <button type="submit" name="simpan_data" class="btn btn-block btn-success float-right"><i class="fas fa-save"></i> Simpan Data</button>
            </div>
        </div>
    </form>
</section>