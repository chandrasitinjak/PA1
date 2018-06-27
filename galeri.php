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
	<div>
		<?php include("hf/menubar.php"); ?>
		<?php if(isset($_GET['crudGaleri'])) { ?>						
			<br>
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron jumbotron-fluid" style="height: 140px;margin-bottom: 0px;padding-top: 25px;">
			 	 <div class="container">
			    <center><h1 class="display-5"><i class="fa fa-camera-retro"> Galeri</i></h1>
			    <p class="lead">Pada Halaman Ini Akan Menampilkan Semua Foto-Foto Yang Terkait Dengan <b>Dallas Fried Chicken</b></p></center>	    
			  </div>
			</div>
			</div>
		</div>
		<br>
		<?php 
			if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
		?>				
		<div class="row">
			<div class="col-md-12">	
					<a href="galeri.php?createNewImage">
					<button class="btn btn-tambah" style="background-color: green;color: white"><i class="fa fa-plus-circle"> Tambah Gambar</i></button>	</a>											
			</div>
		</div>
		<br>
		<?php } ?>	
		<div class="row">
			<?php 
				$queri = "SELECT * FROM t_galeri";
				$gambar = mysqli_query($conn,$queri);
				while($gambars = mysqli_fetch_array($gambar)) {
					$gambaar = $gambars['id_gambar'];
			?>	
			<div class="col-md-4">
				<div class="card" style="width: 200;height:200;background-color: orange">
					<a href="#"><img src="assets/img/galeri/<?=$gambars['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $gambars['deskripsi']; ?>"></a>
					<div class="card-body">													
						<center>
							<?php 
								if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
							?>
							<a href="galeri.php?editInfoGambar=<?=$gambars['id_gambar']?>"><button class="btn btn-primary" style="background-color: blue">Edit</button></a>
							<a href="function.php?deleteGambar=<?= $gambars['id_gambar']?>"><button class="btn btn-danger">Hapus</button></a>
							<?php } else { ?>						
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong<?php echo $gambars['id_gambar']; ?>">
				  			detail
						</button>		
					<?php } ?>						
						</center>
					</div>					
				</div>						
				<br>			
			</div>
			<div class="modal fade" id="exampleModalLong<?php echo $gambars['id_gambar']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <b><?php echo $gambars['gambar'] ?></b>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <a href="#"><img src="assets/img/galeri/<?=$gambars['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px"></a>
						        <br><br>
						        <b><h6 class="card-title"><?php echo  $gambars['deskripsi'] ?></h6></b>
						        <br>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>								
			<?php }} ?>
		</div>
	

			<?php 
				if(isset($_GET['editInfoGambar'])) {
				$id = $_GET['editInfoGambar'];				
				$queri = "SELECT * FROM t_galeri WHERE id_gambar = '$id'";
				$gambar = mysqli_query($conn,$queri);
				while($gambars = mysqli_fetch_array($gambar)) {
			?>	
				<div class="container-fluid" style="background-color: yellow">
				<div class="row">
					<div class="col-md-12">
						<div class="jumbotron jumbotron-fluid" style="margin-bottom: 2px;padding-top: 10px;background-color: #75827b7a;padding-bottom: 20px;">
						  <div class="container">
						    <center><h1 class="display-4">Halaman Untuk Edit Info Gambar</h1></center>						    
						  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="card" style="background-color: #304252">
							<a href="#"><img src="assets/img/galeri/<?=$gambars['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 420px;max-width: 100%;"></a>
						<div class="card-body">
						<center><h6 class="card-title" style="color : #c9d4c9"><?php echo $gambars['deskripsi'] ?></h6></center>
						</div>
						</div>								
					</div>					
					<div class="col-md-6">			
					<center>
						<form class="form-horizontal" action="function.php?ubahDeskripsi=<?php echo $_GET['editInfoGambar']?>" method="post" style="background-color: #e8ecf1">
							<br>
							<h3>Ubah deskripsi gambar</h3>		
							<br>				  			
				  		<div class="input-group" style="width: 600px;">
						  <div class="input-group-prepend">    
						  </div>
						  <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="6"><?php echo $gambars['deskripsi']; ?></textarea>
						</div>
						<br>
					  		<div class="form-group"> 
					    		<div class="col-sm-offset-2 col-sm-8">
					      			<button type="submit" class="btn btn-primary">Simpan</button>
					    		</div>
					  		</div>
					  		<br><br><br><br><br><br><br>
				  		</form>
					</center>			
					</div>
				</div>	
				</div>						
			<?php }}?> 			

			<?php if(isset($_GET['createNewImage'])) { ?>
					<div class="container-fluid" style="background-color: yellow">									
					<center>
						<br>
				  <div class="well" style="width: 600px;">
				  <form class="form-horizontal" action="function.php?buatGambarBaru" method="post" enctype="multipart/form-data" style="background-color: #e8ecf1">
				  	<br>
				  	<h1>Buat Gambar Baru</h1>
				  	<br>
				      <!-- <div class="form-group">
				        <label class="control-label col-sm-4">Gambar :</label>
				          <div class="col-sm-4">
				              <input type="file" class="form-control" name="picture">
				          </div>
				      </div> -->
				      <b><p>Pilih Gambar</p></b>
				      <div class="input-group mb-3" style="width : 500px;">
			          <div class="input-group-prepend">
			            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
			          </div>
			          <input type="file" name="picture" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" >
			          </div>
				      <!-- <div class="form-group">
				        <label class="control-label col-sm-4">Deskripsi :</label>
				          <div class="col-sm-4">
				              <textarea class="form-control" name="description" rows="5" id="comment" required></textarea>
				          </div>
				      </div>
				      				       -->
				      	<br>
				      	<b><p>Masukkan Deskripsi Dari Gambar</p></b>
						<div class="input-group" style="width: 500px;">
						  <div class="input-group-prepend">    
						  </div>
						  <textarea class="form-control" aria-label="With textarea" name="description" rows="6" placeholder="Masukkan Deskripsi Tentang Gambar"></textarea>
						</div>				      				       
						<br>
				      <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-8">
				            <button type="submit" class="btn btn-success">simpan</button>				           
				        </div>
				      </div>
				      <br><br><br>
				  </form>
				  
				  </div>				
				  </center>
				  <br>
				</div>
			<?php } ?>	
		</div>		
<script type="text/javascript">
  $(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
</body>
</html>