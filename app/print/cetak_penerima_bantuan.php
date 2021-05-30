<?php
require_once '../../vendor/autoload.php';

ob_start();
include 'template_penerima_bantuan.php';
$content = ob_get_clean();

$encryption = crypt("rekomendasi_bantuan", "heCTast");
$file = $encryption.'.pdf';

$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'L'
]);
$mpdf->WriteHTML($content);
$mpdf->Output($file, 'I');
exit;

?>