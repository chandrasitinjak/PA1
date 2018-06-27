<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
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
  <br>
  <center>
	<div class="well" style="width: 600px;">         
    <form class="form-horizontal" action="function.php?registerMember" method="post" style="background-color: #e8ecf1">
      <img src="assets/img/beranda/logo.jpg" style="height: 130px;width : 130px;padding-top : 18px;">
      <br>
      <br>        
        <div class="input-group mb-3" style="width : 400px;">
          <div class="input-group-prepend">
            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
          </div>
          <input type="text" name="nama" class="form-control" placeholder="Masukkan nama anda" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group mb-3" style="width : 400px;">
          <div class="input-group-prepend">
            <!-- <span class="input-group-text" id="basic-addon1"></span> -->
            <span></span>
          </div>
          <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat anda" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>        
        <div class="input-group mb-3" style="width : 400px;">
          <div class="input-group-prepend">
            <!-- <span class="input-group-text" id="basic-addon1"></span> -->
            <span></span>
          </div>
          <input type="email" name="email" class="form-control" placeholder="Masukkan email anda" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group mb-3" style="width : 400px;">
          <div class="input-group-prepend">
            <!-- <span class="input-group-text" id="basic-addon1"></span> -->
            <span></span>
          </div>
          <input type="password" name="password" class="form-control" placeholder="Masukkan password anda" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group mb-3" style="width : 400px;">
          <div class="input-group-prepend">
            <!-- <span class="input-group-text" id="basic-addon1"></span> -->
            <span></span>
          </div>
          <input type="password" name="password_konf" class="form-control" placeholder="Konfirmasi password anda" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-8">
              <button type="submit" class="btn btn-primary">Daftar</button>
              <br>
          </div>
        </div>
        <br>
    </form>
  </div>
  </center>
  </div>
</body>
</html>