<!DOCTYPE html>
<html>
<head>
	<title>Galeri</title>
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
		<?php if(isset($_GET['semuaMeja'])) { ?>					
		<?php 
			if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
		?>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div>
					<div class="alert alert-primary">
						<center><h1><i class="fa fa-table"> Meja</i></h1></center>
						<center><h4>Silahkan Lakukan Penambahan,Pengubahan,dan Penghapusan Meja</h4></center>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div>
						<a href="meja.php?buatMejaBaru" class="btn btn-primary" style="background-color: green"><i class="fa fa-plus"> Tambah Meja</i></a>		
				</div>
			</div>
		</div>		
		<?php } ?>
		<br>
		<?php  
			if(isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1) {
		?>	
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-primary" style="margin-left: 0px;margin-right: 0px;">
					<h4>Aturan Yang Berlaku : </h4>
					1) Boking Tidak Bisa Dilakukan Sehari Sebelum Atau Sesudah Hari Pembookingan <br>
					2) Batas Waktu Untuk Memesan Adalah 1 jam Dari Waktu Pembookingan <br>
					3) Batas Maksimal Waktu Pembookingan Adalah 3 Jam <br>
					4) Jika Dipesan,tetapi Tidak Datang Maka Tetap  Membayar Seperti Pembookingan <br>
				</div>
			</div>
			<div class="col-md-6">
				<div class="alert alert-primary" style="margin-left: 0px;margin-right: 0px;">
					<h4>Jam Operasional:</h4>	
					<h6>Setiap Hari : 10:00 AM – 10:00 PM</h6> <br>
					<center><h3>Silahkan Pilih Meja Yang Anda Inginkan</h3></center>
				</div>
			</div>
		</div>					
		<?php 
			}
		?>
		<div class="row">
			<?php 
				$queri = "SELECT * FROM t_meja";
				$gambar = mysqli_query($conn,$queri);
				while($gambars = mysqli_fetch_array($gambar)) {
			?>	
			<div class="col-md-4">
				<div class="card" style="background-color: orange">
					<a href="#"><img src="assets/img/meja/<?=$gambars['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px;background-color: #182c31" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $gambars['Deskripsi']; ?>"></a>
					<div class="card-body">
						<h3><center><p class="card-title" style="color : white">Tersedia : <b><?php echo $gambars['jumlah_kursi'] ?></b></p></center></h3>
						<!-- <p class="card-text"><?php //echo  $gambars['Deskripsi'] ?></p>	 -->
						<center>						
							<?php 
								if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
							?>
							<a href="meja.php?editMeja=<?php echo $gambars['id_meja']; ?>"><button class="btn btn-primary">Ubah</button></a>&nbsp;&nbsp;
							<a href="function.php?deleteMeja=<?php echo $gambars['id_meja']; ?>"><button class="btn btn-danger">Hapus</button></a>
							<?php } else {
								if($gambars['jumlah_kursi'] <= 0) {
							?>
								<a href="#"><button class="btn btn-primary" disabled>Penuh</button></a>							
								
							<?php } else { ?>							
								<a href="boking.php?bookingMeja=<?php echo $gambars['id_meja']; ?>"><button class="btn btn-primary">Request</button></a>
							<?php }} ?>	
						</center>
					</div>					
				</div>	
				<br>			
			</div>					
			<?php }} ?>
			</div>
			</div>	
	

			<?php 
				if(isset($_GET['editMeja'])) {
				$id = $_GET['editMeja'];				
				$queri = "SELECT * FROM t_meja WHERE id_meja = '$id'";
				$gambar = mysqli_query($conn,$queri);
				while($gambars = mysqli_fetch_array($gambar)) {
			?>				
				<center>
				<div class="container-fluid" style="background-color: yellow">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-primary">
								<center><h1><i class="fa fa-table"> Halaman Untuk Edit Meja</i></h1></center>
						</div>
					</div>
				</div>
			 	<div class="row">
			 		<div class="col-md-6">
			 			<div class="card" style="background-color: gray">
					<a href="#"><img src="assets/img/meja/<?=$gambars['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 350px;width: 700px"></a>
					<div class="card-body">
						<!-- <p class="card-title"><?php //echo 'gambar meja'. $gambars['deskripsi']; ?></p>	 -->
					</div>
					</div>						
			 		</div>

			 		<div class="col-md-6">
			<form class="form-horizontal" action="function.php?ubahDeskripsiKursi=<?php echo $_GET['editMeja']?>" method="post" style="background-color: #e8ecf1">
				<br>
				<b><h4>Jumlah Kursi</h4></b>				
    			<div class="input-group mb-3" style="width : 400px;">
				          <div class="input-group-prepend">
				            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
				          </div>
				          <input type="text" name="jumlah_kursi" class="form-control" aria-describedby="basic-addon1" value=" <?php echo $gambars['jumlah_kursi']; ?>">
				</div>  				
				<b><h4>Masukkan Deskripsi Baru</h4></b>
  				<div class="input-group" style="width: 400px;">
						  <div class="input-group-prepend">    
						  </div>
						  <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="5"><?php echo $gambars['Deskripsi']; ?></textarea>
				</div>				      
				<br>
  		<div class="form-group"> 
    		<div class="col-sm-offset-2 col-sm-8">
      			<button type="submit" class="btn btn-primary">Ubah</button>
    		</div>
  		</div>
  		<br>
		</form>	
		</div>
		</div>
		<br><br><br><br><br>										
		</div>						
			<?php }}?>
		</div>
	

		<?php  
			if(isset($_GET['buatMejaBaru'])) {							
		?>		
			<center>
				<div class="container-fluid" style="background-color: yellow">
				  <div class="row">
				  	<div class="col-md-12">
				  		<div class="alert alert-primary">
				  			<center><h1><i class="fa fa-table"> Buat Meja Baru</i></h1></center>
				  		</div>
				  	</div>
				  </div>				  				 
				  <form class="form-horizontal" action="function.php?buatMejaBarus" method="post" enctype="multipart/form-data" style="background-color: #2d1d0f87;width: 700px;">				
				      <br>
				      <center><b>Upload Gambar</b></center>				      
				      <div class="input-group mb-3" style="width : 400px;">
			          <div class="input-group-prepend">
			            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
			          </div>
			          <input type="file" name="picture" class="form-control" aria-describedby="basic-addon1" required>
			          </div>				      
				      <center><b>Masukkan Jumlah Kursi</b></center>				      
				      <div class="input-group mb-3" style="width : 400px;">
				          <div class="input-group-prepend">
				            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
				          </div>
				          <input type="number" name="jumlah_kursi" class="form-control" aria-describedby="basic-addon1" placeholder="Masukkan Jumlah Kursi">
				      </div>				  
				      <center><b>Masukkan Deskripsi Meja</b></center>
				      <div class="input-group" style="width: 400px;">
						  <div class="input-group-prepend">    
						  </div>
						  <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" placeholder="Masukkan Deskripsi"></textarea>
					  </div>
					  <br>				      
				      <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-8">
				            <button type="submit" class="btn btn-success">Simpan</button>
				        </div>
				      </div>
				      <br><br>
				  </form>
				  <br><br><br>
				</div>
				  </center>
		<?php } ?>
	</div>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
</body>
</html>