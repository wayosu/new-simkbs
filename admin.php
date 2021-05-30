<?php
$base_url = 'http://localhost/simkbs/';
include 'app/koneksi.php';
include 'views/layout/header.php';
include 'views/layout/navbar.php';
include 'views/layout/sidebar.php';
?>
<div class="content-wrapper">
    <?php
    if (isset($_GET['views']) && $_GET['views'] == "dashboard") {
        include 'views/pages/dashboard.php';
    } else if (isset($_GET['views']) && $_GET['views'] == "data_kependudukan") {
        include 'views/pages/data_kependudukan.php';
    } else if (isset($_GET['views']) && $_GET['views'] == "input_data_kependudukan") {
        include 'views/pages/input_data_kependudukan.php';
    } else if (isset($_GET['views']) && $_GET['views'] == "edit_data_kependudukan") {
        include 'views/pages/edit_data_kependudukan.php';
    } else if (isset($_GET['views']) && $_GET['views'] == "data_kondisi_rumah") {
        include 'views/pages/data_kondisi_rumah.php';
    } else if (isset($_GET['views']) && $_GET['views'] == "input_data_kondisi") {
        include 'views/pages/input_data_kondisi.php';
    } else if (isset($_GET['views']) && $_GET['views'] == "edit_data_kondisi") {
        include 'views/pages/edit_data_kondisi.php';
    } else if (isset($_GET['views']) && $_GET['views'] == "data_klasifikasi_kependudukan") {
        include 'views/pages/data_klasifikasi_kependudukan.php';
    } else if (isset($_GET['views']) && $_GET['views'] == "data_klasifikasi_bantuan") {
        include 'views/pages/data_klasifikasi_bantuan.php';
    } else {
        include 'views/pages/dashboard.php';
    }
    ?>
</div>
<?php include 'views/layout/footer.php'; ?>