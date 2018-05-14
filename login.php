<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php  
		include("hf/reference.php");
	?>
</head>
<body>
	<?php include("hf/menubar.php"); ?>
	<br>
	<div class="container">
		<center>
			<div class="well" style="width: 800px;">
	 <h1>Masuk</h1>
	<br><br>
  	<form class="form-horizontal" action="function.php?loginAcc" method="post">
    		<div class="form-group">
      		
      			<div class="col-sm-4">
        				<input type="email" class="form-control" name="email" placeholder="Masukkan email anda" required>
      			</div>
    		</div>
    		<div class="form-group">
      			<div class="col-sm-4">
        				<input type="password" class="form-control" name="password" placeholder="Masukkan password anda" required>
      			</div>
    		</div>
        Tidak mempunyai akun? Mendaftar <a href=register.php target="_self">di sini</a><br><br>
    		<div class="form-group">
      		<div class="col-sm-offset-2 col-sm-8">
        			<button type="submit" class="btn btn-primary">Masuk</button>
      		</div>
    		</div>
  	</form>
  </div>
		</center>
	</div>
</body>
</html>