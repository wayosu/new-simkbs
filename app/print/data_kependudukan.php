<html>

<head>
    <title>Data Kependudukan</title>
    <style>
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
                <img src="../../kab.png" alt="logo-kab" width="50">
            </td>
        </tr>
        <tr>
            <td>
                <span class="title-header">Kantor Desa Butu</span><br>
                <small>Butu, Tilongkabila, Kabupaten Bone Bolango, Gorontalo</small>
            </td>
        </tr>
    </table>

    <h4>Data Kependudukan</h4>

    <table width="100%" class="display-body">
        <thead>
            <tr>
                <th width="10%">No KK</th>
                <th width="10%">NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Hubungan Keluarga</th>
                <th>Tempat Lahir</th>
                <th>Tgl Lahir</th>
                <th>Agama</th>
                <th>Pendidikan Terakhir</th>
                <th>Pekerjaan Utama</th>
                <th>Penghasilan Per Bulan</th>
                <th>Dusun</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../koneksi.php';
            $sql = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK=tabel_pendidikan.NIK JOIN tabel_pekerjaan ON tabel_kependudukan.NIK=tabel_pekerjaan.NIK ORDER BY NO_KK DESC");
            while ($row = $sql->fetch_assoc()) {
            ?>
                <?php if ($row['HBKEL'] == 1) : ?>
                <tr align="center" class="background-tr">
                <?php else : ?>
                <tr align="center">
                <?php endif; ?>
                    <td><?= $row['NO_KK']; ?></td>
                    <td><?= $row['NIK']; ?></td>
                    <td><?= $row['NAMA_LGKP']; ?></td>
                    <td>
                        <?php if ($row['JK'] == 1) : ?>
                            Laki-laki
                        <?php elseif ($row['JK'] == 2) : ?>
                            Perempuan
                        <?php else : ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($row['HBKEL'] == 1) : ?>
                            Kepala Keluarga
                        <?php elseif ($row['HBKEL'] == 3) : ?>
                            Istri
                        <?php elseif ($row['HBKEL'] == 9) : ?>
                            Anak
                        <?php else : ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td><?= $row['TMPT_LHR']; ?></td>
                    <td><?= date("d-m-Y", strtotime($row['TGL_LHR'])); ?></td>
                    <td><?= $row['AGAMA']; ?></td>
                    <td><?= $row['PENDIDIKAN_TERAKHIR']; ?></td>
                    <td><?= $row['PEKERJAAN']; ?></td>
                    <td><?= $row['PENGHASILAN_PER_BULAN']; ?></td>
                    <td><?= $row['DSN']; ?></td>
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