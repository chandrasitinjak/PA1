<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
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

	<div class="well">
  <center>
  	<h1>Daftar</h1>
  <br>
  	<form class="form-horizontal" action="function.php?registerMember" method="post">
    		<div class="form-group">      		
      			<div class="col-sm-4">
        				<input type="text" class="form-control" name="nama" placeholder="Masukkan nama anda" required>
      			</div>
    		</div>    		
        <div class="form-group">          
            <div class="col-sm-4">
                <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat anda" required>
            </div>
        </div>
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
    		<div class="form-group">      		
      			<div class="col-sm-4">
        				<input type="password" class="form-control" name="password_konf" placeholder="Konfirmasi password anda" required>
      			</div>
    		</div>
    		<div class="form-group">      		                                     
        			<button type="submit" class="btn btn-primary">Submit</button>
      		</div>
    		
  	</form>
  </center>
</div>
	</div>
</body>
</html>