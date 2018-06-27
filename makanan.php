<!DOCTYPE html>
<html>
<head>
	<title>Makanan</title>
	<link rel="icon" type="image/jpg" href="assets/img/beranda/logo.jpg">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php  
		include("hf/reference.php");
	?>
</head>
<body>
	<body>
		<div class="container-fluid">
		<?php include("hf/menubar.php"); ?>
		<div class="alert alert-success" style="margin-bottom: 10px;">
		<div class="row">							
					<div class="col-md-4">
					<form class="form-inline my-2 my-lg-0">
      					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword">
      					<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari" id="tombol-cari">Search</button>
    				</form>
					<br>			
				</div>
				<div class="col-md-8">
					<h1><i class="fa fa-cutlery"> Pilih Makanan Kesukaan Anda</i></h1>
				</div>
			</div>
		</div>	
			<?php  
				if (isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1) {
			?>
			
		<center>
		<div id="container1">				
				<div class="row">
			<?php 
				$queri = "SELECT * FROM t_produk WHERE kategori = 1";
				$produks = mysqli_query($conn,$queri);
				while($produk = mysqli_fetch_array($produks)) {
			?>	

			<div class="col-md-4">
				<div class="card" style="background-color: #a5acb3">
					<div class="card-header">
						<center><b><p class="card-title"><?php echo  $produk['nama_prod'] ?></p></b></center>										
					</div>
					<a href="#"><img src="assets/img/produk/<?=$produk['gambar']?>" class="img-thumbnail" alt="avatar" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $produk['deskripsi_prod']; ?>" style="height: 250px; width: 450px;"></a>
					<div class="card-body">							
						<p class="card-title"><h5>harga : <?php echo  $produk['harga'] ?></h5></p>
						<!-- <p class="card-title"><h5>Jumlah stok : <?php //echo  $produk['stok'] ?></h5></p> -->
						<!-- <p class="card-title">Deskripsi : <?php //echo  $produk['deskripsi_prod'] ?></p> -->
						<center>
							<?php 
								if (isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1) { 
							?>
							<br>
							<?php if($produk['stok'] != 0) { ?>
								<a href="beli.php?beliProduct=<?php echo $produk['id_produk']?>"><button class="btn btn-primary">request</button></a>							
							<?php } else if($produk['stok'] == 0) { ?>							
								<a href="#"><button class="btn btn-danger disabled">Tidak Tersedia</button></a>						
							<?php }} ?>
						</center>
					</div>					
				</div>	
				<br>			
			</div>					
		<?php } ?>
		
	</div>

			<?php } ?>
		</div>	
	</center>
</div>
	<script type="text/javascript" src="assets/js/search.js"></script>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
</body>
</html>