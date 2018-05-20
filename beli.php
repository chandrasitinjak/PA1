<!DOCTYPE html>
<html>
<head>
	<title>Beli produk</title>
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
		<?php 
			if(isset($_GET['lihatProduk'])) {
			if (isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1) {
				
		?>
		<br><br>
		<center><h2>Lihat-lihat dulu</h2></center>
		<br>
		<div class="row">
			<?php 
				$queri = "SELECT * FROM t_produk";
				$produks = mysqli_query($conn,$queri);
				while($produk = mysqli_fetch_array($produks)) {
			?>	

			<div class="col-md-4">
				<div class="card">
					<div class="card-header">
						<center><b><p class="card-title"><?php echo  $produk['nama_prod'] ?></p></b></center>										
					</div>
					<a href="#"><img src="assets/img/produk/<?=$produk['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px"></a>
					<div class="card-body">							
						<p class="card-title"><h5>harga : <?php echo  $produk['harga'] ?></h5></p>
						<p class="card-title"><h5>Jumlah stok : <?php echo  $produk['stok'] ?></h5></p>
						<p class="card-title">Deskripsi : <?php echo  $produk['deskripsi_prod'] ?></p>
						<center>
							<?php 
								if (isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1) { 
							?>
							<br>
							<?php if($produk['stok'] != 0) {?>
								<a href="beli.php?beliProduct=<?php echo $produk['id_produk']?>"><button class="btn btn-primary">Tambah Kekeranjang</button></a>							
							<?php } else if($produk['stok'] == 0) { ?>							
								<a href="#"><button class="btn btn-danger disabled">Tambah Kekeranjang</button></a>						
							<?php }} ?>
						</center>
					</div>					
				</div>	
				<br>			
			</div>					
		<?php }}} ?>

		<?php if(isset($_GET['beliProduct'])) {
			$id = $_GET['beliProduct'];
			if(isset($_SESSION['is_logged_in']) == TRUE && $_SESSION['user_biasa'] == 1) {

		?>
			<?php 
				$queri = "SELECT * FROM  t_produk WHERE id_produk = '$id'"; 
				$hasil = $conn->query($queri);
				$produk = $hasil->fetch_assoc();
			?>

			<br>
			<center>
			<h2>Produk yang anda pilih</h2>
			<br>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<center><b><p class="card-title"><?php echo  $produk['nama_prod'] ?></p></b></center>						
					</div>
					<a href="#"><img src="assets/img/produk/<?=$produk['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px"></a>
					<div class="card-body">												
						<p class="card-title">Sisa stok : <b><?php echo  $produk['stok'] ?></b></p>
						<p class="card-title">Deskripsi : <?php echo  $produk['deskripsi_prod'] ?></p>																
					</div>					
				</div>	
				<br>			
			</div>
			<form class="form-horizontal" action="function.php?masukKeranjang=<?php echo $produk['id_produk']?>" method="post">			
				<div class="form-group">				       
				    <div class="col-sm-4">
				        <label>Jumlah Pesan</label>				          		
				        <input type="number" class="form-control" name="jumlah" placeholder="Masukkan jumlah produk" required>
				    </div>
				</div>
				<div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-8">
				        <button type="submit" class="btn btn-success">Tambah sekarang</button>
				    </div>
				</div>
			</form>
			</center>	
		<?php }} ?>	
	</div>
	</div>
</body>
</html>