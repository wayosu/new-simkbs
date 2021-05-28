<html>

<head>
    <title>Data Kependudukan</title>
    <style type="text/css" media="print">
        @page {
            size: landscape;
        }

        body {
            font-family: 'Times New Roman', sans-serif;
        }

        table {
            font-size: 10px;
            border: 1px solid black;
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            padding: 8px;
        }

        table th,
        table td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table width="100%">
        <thead>
            <tr>
                <th width="10%">No KK</th>
                <th width="10%">NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
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
            $sql = $mysqli->query("SELECT * FROM tabel_kependudukan JOIN tabel_pendidikan ON tabel_kependudukan.NIK=tabel_pendidikan.NIK JOIN tabel_pekerjaan ON tabel_kependudukan.NIK=tabel_pekerjaan.NIK");
            while ($row = $sql->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $row['NO_KK']; ?></td>
                    <td><?= $row['NIK']; ?></td>
                    <td><?= $row['NAMA_LGKP']; ?></td>
                    <td>
                        <?php if ($row['JK'] == 1) : ?>
                            Laki-laki
                        <?php else : ?>
                            Perempuan
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