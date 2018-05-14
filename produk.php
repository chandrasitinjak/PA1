<!DOCTYPE html>
<html>
<head>
	<title>Produk</title>
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
		<!-- <?php //if(isset($_GET['crudGaleri'])) { ?> -->
		<br>			
		<?php 
			if(isset($_GET['crudProduk'])) {
			if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
				
		?>
		<a href="produk.php?buatProduk"><button class="btn btn-tambah"><i class="fa fa-plus-circle"> Tambah produk</i></button>	</a>
		<?php } ?>
		<br><br>
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
						<p class="card-title">harga : <?php echo  $produk['harga'] ?></p>
						<p class="card-title">Jumlah stok : <?php echo  $produk['stok'] ?></p>
						<p class="card-title">Deskripsi : <?php echo  $produk['deskripsi_prod'] ?></p>
						<center>
							<?php 
								if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
							?>
							<a href="produk.php?updateProduk=<?php echo $produk['id_produk']; ?>"><button class="btn btn-primary">Edit</button></a>
							<a href="function.php?deleteProduk=<?php echo $produk['id_produk'];?>"><button class="btn btn-danger">Hapus</button></a>
							<?php } ?>
						</center>
					</div>					
				</div>	
				<br>			
			</div>							
			<?php }} ?>				

			<?php if(isset($_GET['updateProduk']))  {
				$id = $_GET['updateProduk'];
				$queri = "SELECT * FROM t_produk WHERE id_produk = '$id'";
				$hasil = mysqli_query($conn,$queri);
				while($produks = mysqli_fetch_array($hasil)) {
				
			?>	
			<center>
				<br><br>
			<div class="row">			
				<div class="col-md-4" style="height: 500px;">
					<img src="assets/img/produk/<?=$produks['gambar']?>" class="rounded-circle" alt="Cinque Terre" style="height: 300px;width: 500px;">
				</div>
				<div class="col-md-8">
				<form class="form-horizontal" action="function.php?updateProduks=<?php echo $produks['id_produk']; ?>" method="post" enctype="multipart/form-data">					
					  <div class="form-group">				       
				          <div class="col-sm-4">
				              <input type="text" class="form-control" name="nama_prod" placeholder="Masukkan stok produk" value="<?php echo $produks['nama_prod'];?>">
				          </div>
				      </div>
				      <div class="form-group">				       
				          <div class="col-sm-4">	
				              <input type="text" class="form-control" name="harga_prod" placeholder="Masukkan stok produk" value="<?php echo $produks['harga'];?>">
				          </div>
				      </div>
				      <div class="form-group">				    		
				    			<div class="col-sm-4">
				      				<textarea class="form-control" name="deskripsi" rows="2" id="comment"><?php echo $produks['deskripsi_prod'];?></textarea>
				    			</div>
				  	</div>			      				     
				      <div class="form-group">				       
				          <div class="col-sm-4">
				              <input type="number" class="form-control" name="stok_prod" placeholder="Masukkan stok produk" value="<?php echo $produks['stok'];?>" required>
				          </div>
				      </div>			      				     
				      <div class="form-group">
				        <label class="control-label col-sm-4">Ganti Gambar</label>
				          <div class="col-sm-4">
				              <input type="file" class="form-control" name="picture">
				          </div>
				      </div>
				      <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-8">
				            <button type="submit" class="btn btn-success">simpan</button>
				        </div>
				      </div>
				    </form>
				</div>			
			</div>
			</center>			
			<?php }}?>


			<?php 
				if(isset($_GET['buatProduk'])) {			
			?>			
				<center>
				<h2>Buat produk baru</h2>
				<br>
				<form class="form-horizontal" action="function.php?buatProduks" method="post" enctype="multipart/form-data">					
					  <div class="form-group">				       
				          <div class="col-sm-4">
				              <input type="text" class="form-control" name="nama_prod" placeholder="Masukkan nama produk" required>
				          </div>
				      </div>
				      <div class="form-group">				       
				          <div class="col-sm-4">	
				              <input type="text" class="form-control" name="harga_prod" placeholder="Masukkan harga produk" required>
				          </div>
				      </div>
				      <div class="form-group">				       
				          <div class="col-sm-4">
				              <input type="number" class="form-control" name="stok_prod" placeholder="Masukkan stok produk" required>
				          </div>
				      </div>			      				     
				      <div class="form-group">				    		
				    		<div class="col-sm-4">
				      			<textarea class="form-control" name="deskripsi" rows="2" id="comment">Masukkan deskripsi </textarea>
				    		</div>
				  	  </div>				      				     
				      <div class="form-group">				        
				          <div class="col-sm-4">
				                <label class="checkbox-inline"><input type="checkbox" name="kategori" value="1"> makanan</label>&nbsp;
				                <label class="checkbox-inline"><input type="checkbox" name="kategori" value="2"> minuman</label>
				          </div>
				      </div>
				      <div class="form-group">
				        <label class="control-label col-sm-4">Upload gambar</label>
				          <div class="col-sm-4">
				              <input type="file" class="form-control" name="picture">
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