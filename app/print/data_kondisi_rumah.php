<?php
    include '../koneksi.php';
    $url= "http://$_SERVER[HTTP_HOST]/simkbs/";
    $sql_profil = "SELECT * FROM tabel_control WHERE id=1";
    $result_profil = $mysqli->query($sql_profil);
    $row_profil = $result_profil->fetch_object();
?>
<html>

<head>
    <title>Data Kondisi Rumah</title>
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }

        body {
            font-family: 'Times New Roman', sans-serif;
        }

        .display-body {
            font-size: 10px;
            border: 1px solid black;
            width: 100%;
            border-collapse: collapse;
        }

        .display-body th {
            padding: 8px;
        }

        .display-body th,
        .display-body td {
            border: 1px solid black;
        }

        .display-header {
            margin-bottom: 1rem;
        }

        .display-header td {
            text-align: center;
        }

        .title-header {
            font-size: 1.2rem;
            font-weight: bold;
        }

        h4 {
            text-align: center;
        }

        .background-tr {
            background-color: silver;
        }
    </style>
</head>

<body>
    <table width="100%" class="display-header">
        <tr>
            <td>
                <img src="<?= $url; ?>dist/img/<?= $row_profil->logo_desa; ?>" alt="logo-kab" width="50">
            </td>
        </tr>
        <tr>
            <td>
                <span class="title-header">Kantor <?= $row_profil->nama_desa; ?></span><br>
                <small><?= $row_profil->alamat; ?></small>
            </td>
        </tr>
    </table>

    <table width="100%" class="display-body">
        <thead>
            <tr>
                <th width="10%">No.KK</th>
                <th width="10%">NIK</th>
                <th>Nama</th>
                <th>Luas Lantai</th>
                <th>Jenis Lantai</th>
                <th>Jenis Dinding</th>
                <th>Fasilitas MCK</th>
                <th>Sumber Penerangan</th>
                <th>Sumber Air Minum</th>
                <th>Bahan Bakar Memasak</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../koneksi.php';
            $sql = $mysqli->query("SELECT * FROM tabel_rumah JOIN tabel_kependudukan ON tabel_rumah.NIK=tabel_kependudukan.NIK");
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
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>