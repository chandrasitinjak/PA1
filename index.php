<!DOCTYPE html>
<html>
<head>
	<title>Halaman utama</title>
  <link rel="icon" type="image/jpg" href="assets/img/beranda/logo.jpg">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php  
		include("hf/reference.php");
	?>
</head>
<body> 
	<div class="container-fluid">
		<?php include("hf/menubar.php"); ?>    
    <?php  if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1) { ?>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/index_img/c_1.jpg" alt="First slide" style="height: 590px">
      <div class="carousel-caption d-none d-md-block">      	   
          <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {  ?>
            <a href="ganti_carousel.php" class="btn btn-primary">Ganti Gambar</a>            
          <?php } ?>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/index_img/c2.jpg" alt="Second slide" style="height: 590px">
      <div class="carousel-caption d-none d-md-block">
           <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {  ?>
            <a href="ganti_carousel.php" class="btn btn-primary">Ganti Gambar</a>            
          <?php } ?>    
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/index_img/c3.jpg" alt="Third slide" style="height: 590px">
      <div class="carousel-caption d-none d-md-block">
           <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {  ?>
            <a href="ganti_carousel.php" class="btn btn-primary">Ganti Gambar</a>            
          <?php } ?> 		
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
<?php } else {  ?>
<div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/index_img/c_1.jpg" alt="First slide" style="height: 590px">
      <div class="carousel-caption d-none d-md-block">           
          <a href="login.php" class="btn btn-primary">Beli Sekarang</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/index_img/c2.jpg" alt="Second slide" style="height: 590px">
       <div class="carousel-caption d-none d-md-block">
         <a href="login.php" class="btn btn-primary">Beli Sekarang</a>
       </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/index_img/c3.jpg" alt="Third slide" style="height: 590px">
      <div class="carousel-caption d-none d-md-block">          
          <a href="login.php" class="btn btn-primary">Beli Sekarang</a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div><br>
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-primary">
      <center><h1><i class="fa fa-coffee"> <i class="fa fa-cutlery"> &nbsp;Pilih Makanan Atau Minuman Sekarang</i></i></h1></center>
    </div>
  </div>
</div>
  <div class="row">
<?php 
  $kueri = "SELECT * FROM t_produk";
  $exe = mysqli_query($conn,$kueri) or die(mysqli_error($conn));
  while($hasil = mysqli_fetch_array($exe)) {
?>
  
  <div class="col-md-4">
  <div class="card">
  <div class="card-header">
    <center><?php echo $hasil['nama_prod'] ?></center>
  </div>
  <div class="card-body">    
    <a href="#"><img src="assets/img/produk/<?=$hasil['gambar']?>" class="img-thumbnail" alt="avatar" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $produk['deskripsi_prod']; ?>" style="height: 250px; width: 450px;"></a><br><br>
    <center><a href="login.php" class="btn btn-primary">Pesan Sekarang</a></center>
  </div>
  </div>
<br>
</div>
<?php } ?>
</div>
</div>
</div>
<?php } ?> 
<?php include("hf/footer.php"); ?>
</body>
</html>