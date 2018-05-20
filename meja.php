<!DOCTYPE html>
<html>
<head>
	<title>Galeri</title>
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
		<?php if(isset($_GET['semuaMeja'])) { ?>
		<br>
		<a href="#">
		<?php 
			if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
		?>
		<button class="btn btn-tambah"><i class="fa fa-plus-circle"> Tambah Meja</i></button>	
		<?php } ?>

		<?php  
			if(isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1) {
		?>				
		<center><h2 style="color : black">Pilih meja</h2></center>
		<?php 
			}
		?>

		<br><br>
		<div class="row">
			<?php 
				$queri = "SELECT * FROM t_meja";
				$gambar = mysqli_query($conn,$queri);
				while($gambars = mysqli_fetch_array($gambar)) {
			?>	
			<div class="col-md-4">
				<div class="card">
					<a href="#"><img src="assets/img/meja/<?=$gambars['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px"></a>
					<div class="card-body">
						<h3><center><p class="card-title">Tersedia : <b><?php echo $gambars['jumlah_kursi'] ?></b></p></center></h3>
						<p class="card-text"><?php echo  $gambars['Deskripsi'] ?></p>	
						<center>						
							<?php 
								if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
							?>
							<a href="meja.php?editMeja=<?php echo $gambars['id_meja']; ?>"><button class="btn btn-primary">Ubah</button></a>
							<a href="function.php?deleteMeja=<?php echo $gambars['id_meja']; ?>"><button class="btn btn-danger">Hapus</button></a>
							<?php } else {
								if($gambars['jumlah_kursi'] <= 0) {
							?>
								<a href="#"><button class="btn btn-primary" disabled>Penuh</button></a>							
								
							<?php } else { ?>							
								<a href="boking.php?bookingMeja=<?php echo $gambars['id_meja']; ?>"><button class="btn btn-primary">Pesan Sekarang</button></a>
							<?php }} ?>	
						</center>
					</div>					
				</div>	
				<br>			
			</div>					
			
			<?php }} ?>

			<?php 
				if(isset($_GET['editMeja'])) {
				$id = $_GET['editMeja'];				
				$queri = "SELECT * FROM t_meja WHERE id_meja = '$id'";
				$gambar = mysqli_query($conn,$queri);
				while($gambars = mysqli_fetch_array($gambar)) {
			?>
				<br>
				<center>
			 	<div class="col-md-4">
				<div class="card">
					<a href="#"><img src="assets/img/meja/<?=$gambars['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px"></a>
					<div class="card-body">
						<p class="card-title"><?php echo 'gambar meja'. $gambars['id_meja']; ?></p>									
						</h5>																		
					</div>
				</div>				
				</div>
				<br>							
				
				<form class="form-horizontal" action="function.php?ubahDeskripsiKursi=<?php echo $_GET['editMeja']?>" method="post">
				<center><p>Jumlah kursi</p></center>
				<div class="form-group">
      			<div class="col-sm-4">
        				<input type="number" class="form-control" name="jumlah_kursi" value="<?php echo $gambars['jumlah_kursi'];?>" required>
      			</div>
    			</div>
  				<div class="form-group">
    			<label class="control-label col-sm-4">Ubah deskripsi meja</label>
    			<div class="col-sm-4">
      				<textarea class="form-control" name="deskripsi" rows="2" id="comment" placeholder="Masukkan deskripsi yang baru"><?php echo $gambars['Deskripsi']; ?></textarea>
    			</div>
  		</div>
  		<div class="form-group"> 
    		<div class="col-sm-offset-2 col-sm-8">
      			<button type="submit" class="btn btn-primary">ubah</button>
    		</div>
  		</div>
		</form>
				</center>
			<?php }}?>

		</div>
	</div>
</body>
</html>