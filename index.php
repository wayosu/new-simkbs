<?php
$base_url = 'http://localhost/simkbs/';
include 'app/koneksi.php';
include 'views/layout/user/header.php';
include 'views/layout/user/navbar.php';
?>

<?php
if (isset($_GET['views_user']) && $_GET['views_user'] == "beranda") {
    include 'views/pages/user/beranda.php';
} else {
    include 'views/pages/user/beranda.php';
}
?>

<?php include 'views/layout/user/footer.php'; ?>