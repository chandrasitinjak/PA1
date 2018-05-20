<?php 
  include("function.php");
?>

<?php  
  if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1) {
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
?>
    <nav class="navbar navbar-expand-lg navbar-light " id="navbar_menu" style="background-color: red ">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <span><a class="nav-link" href="index.php">Beranda<span class="sr-only"></span></a></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="galeri.php?crudGaleri">Galeri</a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="produk.php?crudProduk">Kelola Produk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="meja.php?semuaMeja">Kelola Meja</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="kelola_user.php">Kelola User</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="komentar.php?allKomentar">Kelola Komentar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="transaksi.php?semuaTransaksi">Kelola Transaksi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="transaksi.php?bokingMeja">Kelola Boking Meja</a>
      </li>
      

  
    </ul>
    <ul class="nav navbar-nav float-md-right">
      <li class="dropdown">
                          
      <a href="#" class="nav-linkdropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><i class="fa fa-user-circle" aria-hidden="true" style=""></i> <?php echo 'Admin'//$_SESSION['nama'] ?>  <i class="fa fa-angle-down" aria-hidden="true"> </a></i>
                          <ul class="dropdown-menu">
                            <li><a href="profile.php?lihatUser=<?php echo $_SESSION['id']; ?>">profile</a></li>

                          </ul>
                        </li>
    <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
    <li class="nav-item"><a href="index.php?do_logout"> <i class=" fa fa-sign-out"> Keluar </i></a>                 
    </ul>
  </div>
</nav>

<?php  
   }
   else {
?>
    <nav class="navbar navbar-expand-lg navbar-light " id="navbar_menu" style="background-color: red ">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <span><a class="nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="galeri.php?crudGaleri">Galeri</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="beli.php?lihatProduk">Pesan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="meja.php?semuaMeja">Pesan Meja</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Keranjang
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
          <a class="dropdown-item" href="keranjang.php?keranjangSaya=<?php echo $_SESSION['id'];?>">Keranjang Saya</a>          
          <a class="dropdown-item" href="keranjang.php?riwayatTransaksi=<?php echo $_SESSION['id']; ?>">History Order</a>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Komentar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="komentar.php?buatKomentari">Buat Komentar</a>
          <a class="dropdown-item" href="komentar.php?getAllComentar">Semua komentar</a>
      </li>      
  
    </ul>
    <ul class="nav navbar-nav float-md-right">
      <li class="dropdown">
                          
      <a href="#" class="nav-linkdropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><i class="fa fa-user-circle" aria-hidden="true" style=""></i> <?php echo $_SESSION['nama'] ?>  <i class="fa fa-angle-down" aria-hidden="true"> </a></i>
                          <ul class="dropdown-menu">
                            <li><a href="profile.php?lihatUser=<?php echo $_SESSION['id']; ?>">profile</a></li>

                          </ul>
                        </li>
    <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
    <li class="nav-item"><a href="index.php?do_logout"> <i class=" fa fa-sign-out"> Keluar </i></a>                 
    </ul>
  </div>
</nav>
<?php 
   }
  }
  else {
 ?>    
  <nav class="navbar navbar-expand-lg navbar-light " id="navbar_menu" style="background-color: red ">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <span><a class="nav-link" href="index.php">Beranda<span class="sr-only">(current)</span></a></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="galeri.php?crudGaleri">Galeri</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Cara beli</a>
      </li>
      
    </ul>

    <ul class="nav navbar-right">
      <li class="nav-item">
        <a href="login.php">Login</a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;  
      <li class="nav-item">
        <a href="register.php">Register</a>
      </li>
    </ul>
    
  </div>
</nav>
  
<?php  
  }
?>