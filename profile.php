<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php  
		include("hf/reference.php");
	?>
</head>
<body>
	<div class="container">
		<?php include("hf/menubar.php");?>
		<?php 
			if(isset($_GET['lihatUser'])) {
			$id = $_GET['lihatUser'];					
			$query = "SELECT * FROM t_akun WHERE id='$id'";
			$hasil = $conn->query($query);
			$data = $hasil->fetch_assoc();
		?>
		<center>
			<br><br>
			<h3>Profil Saya</h3>
		<table border="1">
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo $data['nama'] ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $data['alamat']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $data['email']; ?></td>
			</tr>
			<tr>
				<td colspan="3">
					<?php if(isset($_SESSION['is_logged_in']) && $_SESSION['admin'] != 1) { ?>
					<a class="btn btn-danger" href="function.php?hapusAkun=<?php echo $id ?>">hapus Akun</a>
					<?php } ?>
					<a class="btn btn-success" href="profile.php?editAkun=<?php echo $id ?>">Edit Akun</a>
					<a class="btn btn-success" href="profile.php?editPass1=<?php echo $id ?>">Edit Password</a>
				</td>
			</tr>

			
		</table>
		</center>

		<?php } ?>

		<?php 
			if(isset($_GET['editAkun'])) {
				$id = $_GET['editAkun'];
				$query = "SELECT * FROM t_akun WHERE id='$id'";
				$hasil = $conn->query($query);
				$data = $hasil->fetch_assoc();			
		?>
		<center>
			<h3>Edit profil</h3>
		</center>
		<center>
			<br><br>
			<form class="form-horizontal" action="profile.php?editCurAccount=<?php echo $id?>" method="post">
      <div class="form-group">        
          <div class="col-sm-4">
              <input type="text" class="form-control" name="nama" placeholder="Masukkan nama anda" value="<?php echo $data['nama']; ?>" required>
          </div>
      </div>
      <div class="form-group">        
          <div class="col-sm-4"> 
              <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat anda" value="<?php echo $data['alamat']; ?>" required>
          </div>
      </div>
      <div class="form-group">
          <div class="col-sm-4">
              <input type="email" class="form-control" name="email" placeholder="Masukkan eMail anda" value="<?php echo $data['email']; ?>" disabled>
          </div>
      </div>
      <br>
      <h6>Masukkan password untuk keamanan!</h6>
      <br>
      <div class="form-group">        
          <div class="col-sm-4">
              <input type="password" class="form-control" name="password" placeholder="Masukkan password anda" required>
          </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
  </form>
		</center>
		<?php } 
			if(isset($_GET['editPass1'])) {
				$id = $_GET['editPass1'];		
		?>
		<center>
  <h1>Ganti Password</h1>
  </center>
  <center>
  <br><br>
  <form class="form-horizontal" action="profile.php?editPass=<?php echo $id?>" method="post">
      <div class="form-group">        
          <div class="col-sm-4">
              <input type="password" class="form-control" name="password" placeholder="Masukkan password lama anda" required>
          </div>
      </div>
      <div class="form-group">        
          <div class="col-sm-4">
              <input type="password" class="form-control" name="npassword" placeholder="Masukkan password baru anda" required>
          </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-4" for="pwd">Konfirmasi password baru :</label>
          <div class="col-sm-4">
              <input type="password" class="form-control" name="cnpassword" placeholder="Konfirmasi password baru anda" required>
          </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-8">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
  </form>
  </center>





		<?php } ?>
	</div>

</body>
</html>