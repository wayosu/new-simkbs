<?php
function upload_img($url) {
    $namaFile = $_FILES['gambar']['name'];
   $ukuranFile = $_FILES['gambar']['size'];
   $error = $_FILES['gambar']['error'];
   $tmpName = $_FILES['gambar']['tmp_name'];

   // cek apakah tidak ada gambar yang di upload
   if($error === 4) {
       echo "
           <script>
               alert('pilih gambar terlebih dahulu.');

           </script>
       ";
       return false;
   }

   // cek apakah yang di upload gambar
   $extensifotoValid = ['jpg', 'jpeg', 'png'];
   $extensifoto = explode('.', $namaFile);
   $extensifoto = strtolower(end($extensifoto));
   if(!in_array($extensifoto, $extensifotoValid)) {
       echo "
           <script>
               alert('yang anda upload bukan gambar ber-extensi jpg/jpeg/png.');
           </script>
       ";
       return false;
   }

   // cek ukuran file gambar
   if($ukuranFile > 40943040) {
       echo "
           <script>
               alert('ukuran gambar terlalu besar!');
           </script>
       ";
       return false;
   }
   // generate nama gambar baru
   $cakacakacak = uniqid(microtime(true));
   $namaFileBaru = $cakacakacak;
   $namaFileBaru .= '.';
   $namaFileBaru .= $extensifoto;

   // jika lolos pengecekan
   move_uploaded_file($tmpName, 'dist/img/' . $namaFileBaru);
   return $namaFileBaru;
}
?>