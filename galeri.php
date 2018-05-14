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
		<?php if(isset($_GET['crudGaleri'])) { ?>
		<br>
		<a href="galeri.php?createNewImage">
		<?php 
			if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
		?>
		<button class="btn btn-tambah"><i class="fa fa-plus-circle"> Tambah Gambar</i></button>	
		<?php } ?>
		<br><br>
		<div class="row">
			<?php 
				$queri = "SELECT * FROM t_galeri";
				$gambar = mysqli_query($conn,$queri);
				while($gambars = mysqli_fetch_array($gambar)) {
			?>	
			<div class="col-md-4">
				<div class="card">
					<a href="#"><img src="assets/img/galeri/<?=$gambars['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px"></a>
					<div class="card-body">
						<center><p class="card-title"><?php echo  $gambars['deskripsi'] ?></p></center>												
						</h5>
						<center>
							<?php 
								if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
							?>
							<a href="galeri.php?editInfoGambar=<?=$gambars['id_gambar']?>"><button class="btn btn-primary">Edit</button></a>
							<a href="function.php?deleteGambar=<?= $gambars['id_gambar']?>"><button class="btn btn-danger">Hapus</button></a>
							<?php } ?>
						</center>
					</div>					
				</div>	
				<br>			
			</div>					
			
			<?php }} ?>

			<?php 
				if(isset($_GET['editInfoGambar'])) {
				$id = $_GET['editInfoGambar'];				
				$queri = "SELECT * FROM t_galeri WHERE id_gambar = '$id'";
				$gambar = mysqli_query($conn,$queri);
				while($gambars = mysqli_fetch_array($gambar)) {
			?>
				<br>
				<center>
			 	<div class="col-md-4">
				<div class="card">
					<a href="#"><img src="assets/img/galeri/<?=$gambars['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px"></a>
					<div class="card-body">
						<p class="card-title"><?php echo 'gambar'. $gambars['gambar'] ?></p>													
						</h5>						
												
					</div>
				</div>				
				</div>
				<br>							
				<h3>Ubah deskripsi gambar</h3>
		<form class="form-horizontal" action="galeri.php?ubahDeskripsi=<?php echo $_GET['editInfoGambar']?>" method="post">
  		<div class="form-group">
    		<label class="control-label col-sm-4"></label>
    			<div class="col-sm-4">
      				<textarea class="form-control" name="deskripsi" rows="2" id="comment"></textarea>
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

			<?php if(isset($_GET['createNewImage'])) { ?>
					<center>
						<br>
				  <h1>Buat gambar baru</h1>
				  <br><br>
				  <form class="form-horizontal" action="function.php?buatGambarBaru" method="post" enctype="multipart/form-data">				      
				      <div class="form-group">
				        <label class="control-label col-sm-4">Gambar :</label>
				          <div class="col-sm-4">
				              <input type="file" class="form-control" name="picture">
				          </div>
				      </div>
				      <div class="form-group">
				        <label class="control-label col-sm-4">Deskripsi :</label>
				          <div class="col-sm-4">
				              <textarea class="form-control" name="description" rows="5" id="comment"></textarea>
				          </div>
				      </div>				      
				      <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-8">
				            <button type="submit" class="btn btn-success">simpan</button>
				        </div>
				      </div>
				  </form>
				  </center>
			<?php } ?>	
		</div>
	</div>
</body>
</html>