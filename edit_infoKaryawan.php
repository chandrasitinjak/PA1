<!DOCTYPE html>
<html>
<head>
	<title>Edit Info Karyawan</title>
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
			if(isset($_GET['updateKaryawan'])) {
				$id_karyawan = $_GET['updateKaryawan'];
				$query = "SELECT * FROM t_karyawan WHERE id_karyawan = '$id_karyawan'";
				$exe = mysqli_query($conn,$query)or die(mysqli_error($conn));
				$hasil = mysqli_fetch_array($exe);
		?>	
		<center>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-primary">
						<center><h1><i class="fa fa-user"> Edit Informasi Karyawan</i></h1></center>
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-md-6" style="height: 500px;">
					<img src="assets/img/karyawan/<?=$hasil['gambar']?>" class="thumbnai" alt="Cinque Terre" style="height: 500px;width: 700px;">
			</div>
			<div class="col-md-6">
				<form class="form-horizontal" action="function.php?updateKaryawan1=<?php echo $id_karyawan ?>" method="post" enctype="multipart/form-data">									  
			<center><b>Nama</b></center>
			<div class="input-group mb-3" style="width : 400px;">
	          <div class="input-group-prepend">
	            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
	          </div>
	          <input type="text" name="nama" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value=" <?php echo $hasil['nama']; ?>">
	        </div>
				      
			<center><b>Alamat</b></center>
			<div class="input-group mb-3" style="width : 400px;">
	          <div class="input-group-prepend">
	            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
	          </div>
	          <input type="text" name="alamat" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value=" <?php echo $hasil['alamat']; ?>">
	        </div>				      
			<center><b>Nomor Telepon</b></center>
			<div class="input-group mb-3" style="width : 400px;">
	          <div class="input-group-prepend">
	            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
	          </div>
	          <input type="text" name="no_telp" class="form-control" aria-label="Username" aria-describedby="basic-addon1" value=" <?php echo $hasil['no_telp']; ?>">
	        </div>
	        <center><b>Deskripsi Pegawai</b></center>				      		     				
			 <div class="input-group" style="width: 400px;">
						  <div class="input-group-prepend">    
						  </div>
						  <textarea class="form-control" aria-label="With textarea" name="deskripsi" rows="4" placeholder=""><?php echo $hasil['deskripsi']; ?></textarea>
						</div>				      				       	 				      
						<center><b>Upload Gambar</b></center>
				      <div class="input-group mb-3" style="width : 400px;">
			          <div class="input-group-prepend">
			            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
			          </div>
			          <input type="file" name="picture" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
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
		<?php
			}
		?>
		<?php 
			if(isset($_GET['tambah_karyawans'])) {
		?>
			<center>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-primary">
							<center><h1><i class="fa fa-child"> Masukkan Karyawan Baru</i></h1></center>
						</div>
					</div>
				</div>				
			<div class="row">			
			<div class="col-md-12">

				<form class="form-horizontal" action="function.php?tambahKaryawan1" method="post" enctype="multipart/form-data" style="background-color: gray">
				<br>					
					  <div class="form-group">				       
				          <div class="col-sm-4">
				              <input type="text" class="form-control" name="nama1" placeholder="Masukkan Nama">
				          </div>
				      </div>
				      <div class="form-group">				       
				          <div class="col-sm-4">	
				              <input type="text" class="form-control" name="alamat1" placeholder="Masukkan Alamat">
				          </div>
				      </div>
				      <div class="form-group">				       
				          <div class="col-sm-4">	
				              <input type="text" class="form-control" name="no_telp1" placeholder="Masukkan Nomor Telepon">
				          </div>
				      </div>
				      <div class="form-group">				    		
				    			<div class="col-sm-4">
				      				<textarea class="form-control" name="deskripsi1" rows="2" id="comment" placeholder="Masukkan Deskripsi Karyawan"></textarea>
				    		</div>
				  		</div>			      				     				     
				      <div class="form-group">
				        <label class="control-label col-sm-4">Upload Gambar</label>
				          <div class="col-sm-4">
				              <input type="file" class="form-control" name="picture">
				          </div>
				      </div>
				      <div class="form-group"> 
				        <div class="col-sm-offset-2 col-sm-8">
				            <button type="submit" class="btn btn-success">simpan</button>
				        </div>
				      </div>
				      <br>
				   </form>
				</div>			
			</div>
			</center>
		<?php 		
			}
		?>
	</div>
	
</body>
</html>