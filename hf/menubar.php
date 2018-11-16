<?php 
  include("function.php");
?>

<?php  
  if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1) {
    if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
?>
      <nav class="navbar navbar-expand-lg navbar-light" id="navbar_menu" style="background-color: yellow ">      
      <a class="navbar-brand" href="index.php" style="background-color: yellow"><img src="assets/img/beranda/logo.jpg" style="height: 35px;width: 100px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <span><a class="nav-link" href="index.php"><b style="color: black">Beranda</b><span class="sr-only"></span></a></span>
        </li>                      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <b style="color: black">Kelola</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
            <a class="dropdown-item" href="produk.php?crudProduk">Kelola Produk</a>          
            <a class="dropdown-item" href="meja.php?semuaMeja">Kelola Meja</a>
            <a class="dropdown-item" href="galeri.php?crudGaleri">Kelola Galeri</a>
            <a class="dropdown-item" href="kelola_user.php">Kelola User</a>
            <a class="dropdown-item" href="kelola_karyawan.php">Kelola Karyawan</a>
          </div>
        </li>      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <b style="color: black">Lihat</b>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
            <a class="dropdown-item" href="komentar.php?allKomentar">Komentar</a>                   
            <a class="dropdown-item" href="transaksi.php?semuaTransaksi">Pesanan Produk</a>
            <a class="dropdown-item" href="transaksi.php?bokingMeja">Pesanan Tempat</a>     
            <a class="dropdown-item" href="Pemasukan.php">Daftar Pemasukan</a>     
            <a class="dropdown-item" href="daftar_penjualan.php">Daftar Penjualan</a>
          </div>                          
        </li>            
      </ul>
      
      <ul class="nav nav-right ml-auto">
        <li class="dropdown">                        
        <a href="#" class="nav-linkdropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><i class="fa fa-user-circle" aria-hidden="true" style="color : black"></i> <b style="color : black">Admin</b>  <i class="fa fa-angle-down" aria-hidden="true" style="color : black"> </i></a>                         
       <ul class="dropdown-menu">
            <li>
                <a href="profile.php?lihatUser=<?php echo $_SESSION['id']; ?>">profile</a>
            </li>
        </ul>
       </li>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a href="index.php?do_logout"> <i class=" fa fa-sign-out" style="color : black"> Keluar </i></a>        
      </li>         
      </ul>
    </div>
  </nav>
<?php  
   }
   else {
?>
    <nav class="navbar navbar-expand-lg navbar-light " id="navbar_menu" style="background-color: yellow ">
    <a class="navbar-brand" href="index.php" style="background-color: yellow"><img src="assets/img/beranda/logo.jpg" style="height: 35px;width: 100px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <span><a class="nav-link" href="index.php"><b style="color : black">Beranda</b><span class="sr-only">(current)</span></a></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="galeri.php?crudGaleri"><b style="color: black">Galeri</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="beli.php?lihatProduk"><b style="color: black">Pesan Produk</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="meja.php?semuaMeja"><b style="color: black">Pesan Meja</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="boking.php?daftarRequest=<?php echo $_SESSION['id']; ?>"><b style="color: black">Daftar transaksi Booking</b></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <b style="color: black">Keranjang</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">          
          <a class="dropdown-item" href="keranjang.php?keranjangSaya=<?php echo $_SESSION['id'];?>">Keranjang Saya</a>          
          <a class="dropdown-item" href="keranjang.php?riwayatTransaksi=<?php echo $_SESSION['id']; ?>">History Order</a>
        </div>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <b style="color: black">Komentar</b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="komentar.php?buatKomentari">Buat Komentar</a>
          <a class="dropdown-item" href="komentar.php?getAllComentar">Semua komentar</a>
        </div>
      </li>
      <li class="nav-item active">
        <span><a class="nav-link" href="lokasi.php"><b style="color: black">Tentang</b><span class="sr-only"></span></a></span>
      </li>                            
      <!-- <li class="nav-item active">
        <span><a class="nav-link" href="kelola_karyawan.php"><b>Karyawan</b><span class="sr-only"></span></a></span>
      </li>                             -->
    </ul>

    <!-- righ-side -->
    <ul class="nav navbar-nav float-md-right">
      <li class="dropdown">                        
      <a href="#" class="nav-linkdropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" style="color : black"><i class="fa fa-user-circle" aria-hidden="true" style="color : black"></i> <b><?php echo $_SESSION['nama'] ?> </b> <i class="fa fa-angle-down" aria-hidden="true" style="color : black  "></i>
      </a>
        <ul class="dropdown-menu">
            <li>
              <a href="profile.php?lihatUser=<?php echo $_SESSION['id']; ?>"><b style="color : black">profile</b></a>
            </li>
        </ul>
      </li>

    &nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a href="index.php?do_logout"> <i class=" fa fa-sign-out" style="color : black"><b> Keluar </i></b></a>                 
      </li>
    </ul>
  </div>
</nav>
<?php 
   }
  }
  else {
 ?>    
  <nav class="navbar navbar-expand-lg navbar-light " id="navbar_menu" style="background-color: yellow">
    <a class="navbar-brand" href="index.php" style="background-color: yellow"><img src="assets/img/beranda/logo.jpg" style="height: 35px;width: 100px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <span><a class="nav-link" href="index.php"><b style="color: black">Beranda</b><span class="sr-only">(current)</span></a></span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="galeri.php?crudGaleri"><b style="color: black">Galeri</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="carabeli.php"><b style="color: black">Cara beli</b></a>
      </li> 
    </ul>
    <!-- right-side -->
    <ul class="nav navbar-right">
      <!-- <li class="nav-item">
        <a href="login.php" style="color : white">Login</a>
      </li> -->
      <li class="nav-item">
        <a href="login.php"> <i class=" fa fa-sign-in" style="color : black"><b> Login</b></i></a>                 
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;  
      <li class="nav-item">
        <a href="register.php" style="color : black"><i class="fa fa-user-plus"><b> Register</b></i></a>
      </li>
    </ul>    
  </div>
</nav>
<?php } ?>