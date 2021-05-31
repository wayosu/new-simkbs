 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-primary navbar-light" style="background-color:#DB241E;">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </li>


   </ul>



   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
     <li class="nav-item">
       <a class="nav-link text-white" href="<?= $base_url; ?>app/logout.php" onclick="return confirm('Yakin ingin keluar dari akun ini?')">
         <i class="fas fa-sign-out-alt"></i> Logout
       </a>
     </li>
   </ul>
 </nav>
 <!-- /.navbar -->