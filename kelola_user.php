<!DOCTYPE html>
<html>
<head>
	<title>Kelola user</title>
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
	<br>
	<center><h1>Kelola USER</h1>

	<?php 
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
			$user = getAllUser();
			if($user == NULL) {
				echo "User kosong!!";
			}
			else {						
	?> 
	
	<table class="table table-striped table-bordered table-hover">
	<center>
		<tr>
			<th>ID pengguna</th>
			<th>Role</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>email</th>
			<th>Aksi</th>
		</tr>
		<?php foreach ($user as $data) {
		echo '<tr>';
		echo '<td>'; 
		echo   $data['id'];
		echo '</td>';
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