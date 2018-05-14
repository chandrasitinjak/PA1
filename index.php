<!DOCTYPE html>
<html>
<head>
	<title>Halaman utama</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php  
		include("hf/reference.php");
	?>
</head>
<body>
	<div class="container">
		<?php include("hf/menubar.php"); ?>

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/galeri/6.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
      	   <h5>Makanan</h5>
      	   <p>Nasi + ayam goreng</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/galeri/3.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/galeri/6.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
      		<h5>Makanan</h5>
      		<p>Nasi + ayam goreng</p>
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
	<?php include("hf/footer.php"); ?>
</div>
</body>
</html>