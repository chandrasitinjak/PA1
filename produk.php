<!DOCTYPE html>
<html>
<head>
	<title>Produk</title>
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
		<?php 
			if(isset($_GET['crudProduk'])) {
			if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
				
		?>	
		<br>	
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-secondary">
					<center><h1><i class="fa fa-coffee">&nbsp;<i class="fa fa-cutlery">&nbsp;&nbsp;&nbsp;Makanan Dan Minuman</i></i></h1>
						<h5>&nbsp;&nbsp;Silahkan Lakukan Penambahan,Pengubahan,dan Penghapusan Terhadap Makanan Dan Minuman</h5></center>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 0px;">
			<div class="col-md-12">				
					<a href="produk.php?buatProduk"><button class="btn btn-info" style="background-color: #6d7735"><i class="fa fa-plus-circle"> Tambah Produk</i></button>	</a>							
			</div>
		</div>		
		<br>
		<?php } ?>
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron text-center" style="padding-top: 10px;padding-bottom: 15px;">
				  <div class="container">
				    <h1 class="display-4"><b>Makanan</b></h1>				    
				  </div>
				</div>
			</div>
		</div>		
		<div class="row">
			<?php 
				$queri = "SELECT * FROM t_produk WHERE kategori = 1";
				$produks = mysqli_query($conn,$queri);
				while($produk = mysqli_fetch_array($produks)) {
			?>	
			<div class="col-md-4">
				<div class="card" style="background-color: orange">
					<div class="card-header">
						<center><b><h3 class="card-title" style="color : white"><?php echo  $produk['nama_prod'] ?></h3></b></center>										
					</div>
					<a href="#"><img src="assets/img/produk/<?=$produk['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $produk['deskripsi_prod']; ?>"></a>
					<div class="card-body">							
						<p class="card-title" style="color: white">harga : <?php echo  $produk['harga'] ?></p>
						<!-- <p class="card-title">Jumlah stok : <?php //echo  $produk['stok'] ?></p> -->
						<?php if($produk['stok'] == 0 )  { ?>
							<b style="">Status : Tidak Tersedia</b><br>
						<?php } else {?>
							<b style="">Status : Tersedia</b>
						<?php } ?>
						<center>
							<?php 
								if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
							?>
							<a href="produk.php?updateProduk=<?php echo $produk['id_produk']; ?>"><button class="btn btn-primary" style="background-color: blue">Edit</button></a>
							<a href="function.php?deleteProduk=<?php echo $produk['id_produk'];?>"><button class="btn btn-danger" style="background-color: #f7031b">Hapus</button></a>
							<?php } ?>
						</center>
					</div>					
				</div>	
				<br>			
			</div>								
			<?php } ?>
		</div>						
			<div class="row">
				<div class="col-md-12">
					<div class="jumbotron text-center" style="padding-top: 10px;padding-bottom: 15px;">
				  <div class="container">
				    <h1 class="display-4"><b>Minuman</b></h1>				    
				  </div>
				</div>
				</div>
			</div>			
			<div class="row">			
			<?php 
				$queri = "SELECT * FROM t_produk WHERE kategori = 2";
				$produks = mysqli_query($conn,$queri);
				while($produk = mysqli_fetch_array($produks)) {
			?>	
			<div class="col-md-4">
				<div class="card" style="background-color: orange">
					<div class="card-header">
						<center><b><p class="card-title"><?php echo  $produk['nama_prod'] ?></p></b></center>					
					</div>
					<a href="#"><img src="assets/img/produk/<?=$produk['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px;" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $produk['deskripsi_prod']; ?>"></a>
					<div class="card-body">							
						<p class="card-title">harga : <?php echo  $produk['harga'] ?></p>
						<!-- <p class="card-title">Jumlah stok : <?php //echo  $produk['stok'] ?></p> -->
						<?php if($produk['stok'] == 0) { ?>
							<b style="">Status : Tidak Tersedia</b>
						<?php } else { ?>
							<b style="">Status : Tersedia</b>
						<?php } ?>
						<center>
							<?php 
								if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
							?>
							<a href="produk.php?updateProduk=<?php echo $produk['id_produk']; ?>"><button class="btn btn-primary" style="background-color: blue">Edit</button></a>
							<a href="function.php?deleteProduk=<?php echo $produk['id_produk'];?>"><button class="btn btn-danger" style="background-color: #f7031b">Hapus</button></a>
							<?php } ?>
						</center>
					</div>					
				</div>	
				<br>			
			</div>
			<?php } ?>
		</div>
		<?php } ?>				

			<?php if(isset($_GET['updateProduk']))  {
				$id = $_GET['updateProduk'];
				$queri = "SELECT * FROM t_produk WHERE id_produk = '$id'";
				$hasil = mysqli_query($conn,$queri);
				while($produks = mysqli_fetch_array($hasil)) {
				
			?>	
			<center>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-primary">
						<center><h1><i class="fa fa-coffee"> <i class="fa fa-cutlery">&nbsp;&nbsp;Halaman Untuk Mengubah Informasi Produk</i></i></h1></center>
					</div>
				</div>
			</div>				
			<div class="row">						
				<div class="col-md-6">
				<div class="card" style="background-color: #304252">
							<a href="#"><img src="assets/img/produk/<?=$produks['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 520px;width : 700px"></a>						
				</div>								
				</div>
				<div class="col-md-6">
				<form class="form-horizontal" action="function.php?updateProduks=<?php echo $produks['id_produk']; ?>" method="post" enctype="multipart/form-data" style="background-color: #e8ecf1">					
					  <center><b>Nama Produk</b></center>					
				      <div class="input-group mb-3" style="width : 400px;">
				          <div class="input-group-prepend">
				            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
				          </div>
				          <input type="text" name="nama_prod" class="form-control" aria-describedby="basic-addon1" value=" <?php echo $produks['nama_prod']; ?>">
				      </div>
				      <center><b>Harga Produk</b></center>				      
				      <div class="input-group mb-3" style="width : 400px;">
				          <div class="input-group-prepend">
				            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
				          </div>
				          <input type="text" name="harga_prod" class="form-control" aria-describedby="basic-addon1" value=" <?php echo $produks['harga']; ?>">
				      </div>
				      <center><b>Deskripsi Produk</b></center>
				      <div class="input-group" style="width: 400px;">
						  <div class="input-group-prepend">    
						  </div>
						  <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4"><?php echo $produks['deskripsi_prod']; ?></textarea>
					  </div>				      
				      <!-- <center><b>Status</b></center>
				   	  <div class="input-group mb-3" style="width : 400px;">
				          <div class="input-group-prepend">
				            <span class="input-group-text" id="basic-addon1">@</span>
				          </div>
				          <input type="text" name="stok_prod" class="form-control" aria-describedby="basic-addon1" value=" <?php //echo $produks['stok']; ?>">
				      </div> -->				      
				      <center><b>Status</b></center>
				      <div class="form-group" style="width: 400px;">					    
					    <select class="form-control" id="exampleFormControlSelect1" name="stok_prod">
					      <option>Pilih Status</option>
					      <option value="0">Tidak Tersedia</option>
					      <option value="1">Tersedia</option>					      
					    </select>
					  </div>
				      <center><b>Ganti Gambar</b></center>				      
				      <div class="input-group mb-3" style="width : 400px;">
			          <div class="input-group-prepend">
			            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
			          </div>
			          <input type="file" name="picture" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" >
			          </div>
				      <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-8">
				            <button type="submit" class="btn btn-success">save</button>
				        </div>
				      </div>
				      <br>
				    </form>
				</div>			
			</div>
			</center>			
			<?php }}?>


			<?php 
				if(isset($_GET['buatProduk'])) {			
			?>			
				<center>
				<br>								
				<div class="well" style="width: 800px;padding-right: 10px;padding-left: 10px;margin-left: 10px;margin-right: 10px;">
				<form class="form-horizontal" action="function.php?buatProduks" method="post" enctype="multipart/form-data" style="background-color: #e8ecf1">		
					<br>
					<h2>Buat produk baru</h2>				
					<br>
					  <div class="form-group">				       
				          <div class="col-sm-4">
				              <input type="text" class="form-control" name="nama_prod" placeholder="Masukkan nama produk" required>
				          </div>
				      </div>
				      <div class="form-group">				       
				          <div class="col-sm-4">	
				              <input type="number" class="form-control" name="harga_prod" placeholder="Masukkan harga produk" required>
				          </div>
				      </div>
				      <!-- <div class="form-group">				       
				          <div class="col-sm-4">
				              <input type="number" class="form-control" name="stok_prod" placeholder="Masukkan stok produk" required>
				          </div>
				      </div>			      				      -->
				      <div class="form-group" style="width: 231px;">					    
					    <select class="form-control" id="exampleFormControlSelect1" name="stok_prod">
					      <option>Pilih Status</option>
					      <option value="0">Tidak Tersedia</option>
					      <option value="1">Tersedia</option>					      
					    </select>
					  </div>
				      <div class="form-group">				    		
				    		<div class="col-sm-4">
				      			<textarea class="form-control" name="deskripsi" rows="2" id="comment" placeholder="Masukkan Deskripsi"></textarea>
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
				            <button type="submit" class="btn btn-success">Save</button>
				        </div>
				      </div>
				      <br>
				    </form>
				</div>
			</center>
			<?php } ?>
		</div>
	</div>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
</body>
</html>