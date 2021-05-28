<?php
require_once '../../vendor/autoload.php';

ob_start();
include 'template_klasifikasi_pendidikan.php';
$content = ob_get_clean();

$encryption = crypt("klasifikasi_pendidikan", "heCTast");
$file = $encryption.'.pdf';

$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'L'
]);
$mpdf->WriteHTML($content);
$mpdf->Output($file, 'I');
exit;

?>