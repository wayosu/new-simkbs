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

        table {
            font-size: 10px;
            border: 1px solid black;
            width: 100%;
            border-collapse: collapse;
        }
        .display-header{
            margin-bottom : 1rem;
        }

        .display-header td {
            text-align : center;
            border : none;
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
<table border="0" style="border : none" width="100%" class="display-header">
        <tr>
            <td>
                <img src="../../kabgor.png" alt="logo-kab" width="50">
            </td>
        </tr>
        <tr>
            <td>
                <span class="title-header">Kantor Desa Bumela</span><br>
                <small>Bumela, Bilato, Kabupaten Gorontalo, Gorontalo</small>
            </td>
        </tr>
    </table>

    <table width="100%">
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