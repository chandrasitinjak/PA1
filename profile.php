<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
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
		<?php include("hf/menubar.php");?>
		<?php 
			if(isset($_GET['lihatUser'])) {
			$id = $_GET['lihatUser'];					
			$query = "SELECT * FROM t_akun WHERE id='$id'";
			$hasil = $conn->query($query);
			$data = $hasil->fetch_assoc();
		?>
		<center>
		<div class="alert alert-primary" role="alert" style="background-color: white;width: 1330px;height: 580px;">
  
			<br>
			<h3>Profil Saya</h3>
			<br>			
		<table class="table table-bordered table-hover alert alert-primary" style="width: 300px;text-align: center">
			<tr>
				<td>Nama</td>				
				<td><?php echo $data['nama'] ?></td>
			</tr>
			<tr>
				<td>Alamat</td>				
				<td><?php echo $data['alamat']; ?></td>
			</tr>
			<tr>
				<td>Email</td>				
				<td><?php echo $data['email']; ?></td>
			</tr>
			<tr>
				<td colspan="3">					
					<a class="btn btn-success" style="background-color: blue" href="profile.php?editAkun=<?php echo $id ?>">Edit Akun</a>
					<a class="btn btn-success" style="background-color: blue" href="profile.php?editPass1=<?php echo $id ?>">Edit Password</a>
				</td>
			</tr>			
		</table>

		<?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1) {
			  if(isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1) {	
		?>
					<a class="btn btn-danger" href="function.php?hapusAkun=<?php echo $id ?>">Hapus Akun</a>
		<?php }} ?>
		</div>
		</div>
		</center>

		<?php } ?>

		<?php 
			if(isset($_GET['editAkun'])) {
				$id = $_GET['editAkun'];
				$query = "SELECT * FROM t_akun WHERE id='$id'";
				$hasil = $conn->query($query);
				$data = $hasil->fetch_assoc();			
		?>
		<div class="container-fluid" style="">		
		<center>			
			<div class="well" style="width: 600px;">
			<br>
			<form class="form-horizontal" action="profile.php?editCurAccount=<?php echo $id?>" method="post" style="background-color: #bdefbf">
			<br>
			<h3><i class="fa fa-user"> Edit profil</i></h3>
      		<br>
      		<div class="input-group mb-3" style="width : 400px;">
	          <div class="input-group-prepend">
	            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
	          </div>
	          <input type="text" name="nama" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" value=" <?php echo $data['nama']; ?>">
	        </div>      
      		<div class="input-group mb-3" style="width : 400px;">
	          <div class="input-group-prepend">
	            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
	          </div>
	          <input type="text" name="alamat" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" value=" <?php echo $data['alamat']; ?>">
	        </div> 
      		<div class="input-group mb-3" style="width : 400px;">
	          <div class="input-group-prepend">
	            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
	          </div>
	          <input type="text" style ="background-color: #a2a5a9de"name="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" value=" <?php echo $data['email']; ?>"disabled >
	        </div>
      <br>
      <h6>Masukkan password untuk keamanan!</h6>
      <br>      
      <div class="input-group mb-3" style="width : 400px;">
	          <div class="input-group-prepend">
	            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
	          </div>
	          <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda" aria-label="Username" aria-describedby="basic-addon1" required>
	        </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
      <br>
  </form>
  <br><br><br><br><br>
	</div>
	</center>
	</div>
		<?php } 
			if(isset($_GET['editPass1'])) {
				$id = $_GET['editPass1'];		
		?>
  <div class="container-fluid" style="background-color: white">
  <center><br>
  <div class="well" style="width: 600px;">	  
  <form class="form-horizontal" action="profile.php?editPass=<?php echo $id?>" method="post" style="background-color: #b9e8dbeb;">
  	<br>
  	  <h1>Ganti Password</h1>
  	  <br>      
 		<div class="input-group mb-3" style="width : 400px;">
	        <div class="input-group-prepend">
	            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
	        </div>
	        <input type="password" name="password" class="form-control" placeholder="Masukkan Password Lama Anda" aria-label="Username" aria-describedby="basic-addon1" required>
	    </div>           
      <div class="input-group mb-3" style="width : 400px;">
	        <div class="input-group-prepend">
	            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
	        </div>
	        <input type="password" name="npassword" class="form-control" placeholder="Masukkan Password Baru Anda" aria-label="Username" aria-describedby="basic-addon1" required>
	    </div>     
	    <br><b><p>Konfirmasi Password Anda</p></b>      
      <div class="input-group mb-3" style="width : 400px;">
	        <div class="input-group-prepend">
	            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
	        </div>
	        <input type="password" name="cnpassword" class="form-control" placeholder="Konfirmasi Password Baru Anda" aria-label="Username" aria-describedby="basic-addon1" required>
	    </div>     
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
      <br><br>
  </form>
  
  <br><br><br><br><br><br>
  <?php } ?>
  </div>
  </center>
	</div>	
</body>
</html>