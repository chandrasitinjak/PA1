<!DOCTYPE html>
<html>
<head>
	<title>Kelola user</title>
	<link rel="icon" type="image/jpg" href="assets/img/beranda/logo.jpg">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php  
		include("hf/reference.php");
	?>	
</head>
<body style="background-color: white">
	<div class="container-fluid">
	<?php include("hf/menubar.php"); ?>	
	<?php 
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
			$user = getAllUser();
			if($user == NULL) {
				echo "User kosong!!";
			}
			else {						
	?> 
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-primary">
				<center><h1><i class="fa fa-user"> Kelola User</i></h1></center>
			</div>
		</div>
	</div>
	<table class="table table-stripped table-bordered table-hover display" style="width:100%;background-color: white;border-color: #abb8c5">
	<center>
		<tr>			
			<th>Role</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>email</th>
			<th>Aksi</th>
		</tr>
		<?php foreach ($user as $data) {
		echo '<tr>';
		// echo '<td>'; 
		// echo   $data['id'];
		// echo '</td>';
		 echo    '<td>';
        if($data['role']==1){
          echo '<font color="red"><b>ADMIN</b></font>';
        } else {
          echo 'MEMBER';
        }
        echo    '</td>';
		echo '<td>';
		echo $data['nama']; 
		echo '</td>';
		echo '<td>';
        echo $data['alamat']; 
        echo '</td>';
		echo '<td>';
		echo $data['email']; 
		echo '</td>';
		echo '<td>';
			if($data['role'] == 1)
				echo 'Admin tidak bisa dihapus';
			else 
				echo '<center><a class="btn btn-sm btn-danger" href="function.php?deleteUser='.$data["id"].'">hapus</a></center>';
		echo '</td>';		
		echo '</tr>';
	}	
		?>
	</center>
	</table>
	
	<?php }} ?>
	</div>
</body>
</html>
