<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
  	<form class="form-horizontal" action="function.php?loginAcc" method="post" style="background-color: #e8ecf1">
      <img src="assets/img/beranda/logo.jpg" style="height: 130px;width : 130px;padding-top : 18px;">
      <br>
      <br>    		
        <div class="input-group mb-3" style="width : 400px;">
          <div class="input-group-prepend">
            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
          </div>
          <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" >
        </div>
        <div class="input-group mb-3" style="width : 400px;">
          <div class="input-group-prepend">
            <!-- <span class="input-group-text" id="basic-addon1"></span> -->
            <span></span>
          </div>
          <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
        </div>    		
        Tidak mempunyai akun? Mendaftar <a href=register.php target="_self" style="color : #0019cc">di sini</a><br><br>
    		<div class="form-group">
      		<div class="col-sm-offset-2 col-sm-8">
        			<button type="submit" class="btn btn-primary">Login</button>
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