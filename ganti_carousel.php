<!DOCTYPE html>
<html>
<head>
	<title>Ganti Carousel</title>
	<title>Halaman utama</title>
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
	<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {  ?>
		<center>
			<br><br>
			<h3>Ganti Foto Carousel</h3>
			<br>
		<form class="form-horizontal" action="ganti_carousel.php?newImage" method="post" enctype="multipart/form-data">
					 <div class="form-group">				       
				          <div class="col-sm-4">
				              <input type="text" class="form-control" name="gambar" placeholder="Masukkan nama gambar" required>
				          </div>
				      </div>
				      <div class="form-group">
				        <label class="control-label col-sm-4">Gambar :</label>
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
	<?php } else { ?>
		<center><h1>Anda Tidak Memiliki Akses Disini</h1></center>
	<?php } ?>	
	</div>
	<?php  
		if(isset($_GET['newImage'])) {
			$nama = $_POST['gambar'];
			$filename = $_FILES['picture']['name'];

			if(isset($filename)) {
				$x = move_uploaded_file($_FILES['picture']['tmp_name'],'assets/img/index_img/'.$nama.'.jpg');
				if($x == TRUE) {
					
				} else {
					echo'Gagal';
				}
			}
		}
	?>
</body>
</html>