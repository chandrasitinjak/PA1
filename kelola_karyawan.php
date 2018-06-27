<!DOCTYPE html>
<html>
<head>
	<title>Karyawan</title>
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
	
	<?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { ?>
		<center>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary">
					<center><h1><i class="fa fa-child"> Daftar Karyawan</i></h1></center>
				</div>
			</div>
		</div>
		</center>
		<div class="row">
			<div class="col-md-12">				
					<a href="edit_infoKaryawan.php?tambah_karyawans" class="btn btn-primary" style="background-color: green"><i class="fa fa-plus"> Tambah Karyawan</i></a>			
			</div>
		</div>
		<br>
		</center>		
		<table class="table table-stripped table-bordered table-hover" style="background-color: white">
			<tr>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No Hp</th>
				<th>Tentang</th>
				<th colspan="3"><center>Gambar</center></th>	
			</tr>
			<?php  
				$kueri = "SELECT * FROM t_karyawan";
				$exeQ = mysqli_query($conn,$kueri);
				while($hasil = mysqli_fetch_array($exeQ)) {
					echo "<tr>";
					echo "<td>";
					echo $hasil['nama'];
					echo "</td>";
					echo "<td>";
					echo $hasil['alamat'];
					echo "</td>";
					echo "<td>";
					echo $hasil['no_telp'];
					echo "</td>";
					echo "<td>";
					echo $hasil['deskripsi'];
					echo "</td>";
					echo "<td>";
					echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong'.$hasil["id_karyawan"].'">
				  			detail
						</button>';
					echo "</td>";
					echo "<td>";
					echo "<a href='edit_infoKaryawan.php?updateKaryawan=".$hasil['id_karyawan']."' class='btn btn-primary' style='background-color : green'>Update</a>";
					echo "</td>";
					echo "<td>";
					echo "<a href='function.php?deleteKaryawan=".$hasil['id_karyawan']."' class='btn btn-danger'>Delete</a>";
					echo "</td>";
					echo "</tr>";
					echo '<div class="modal fade" id="exampleModalLong'.$hasil["id_karyawan"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <b><h6 class="card-title">'.$hasil["nama"].' </h6></b> 
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <a href="#"><img src="assets/img/karyawan/'.$hasil["gambar"].'" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px"></a>
						        <br>
						        <p>'.$hasil['deskripsi'].'</p>
						        <br>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
						      </div>
						    </div>
						  </div>
						</div>';

				}	
			?>			
		</table>
		</center>
		</div>
	<?php } else { ?>	
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary">
				<center><h1><i class="fa fa-child"> Daftar Karyawan</i></h1>		
				</div>
			</div>
		</div>							
		<table class="table table-stripped table-bordered table-hover table-dark" >
			<tr>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No Hp</th>
				<th>Tentang</th>
				<th>Gambar</th>
			</tr> -->
			<?php  
				// $kueri = "SELECT * FROM t_karyawan";
				// $exeQ = mysqli_query($conn,$kueri);
				// while($hasil = mysqli_fetch_array($exeQ)) {
				// 	echo "<tr>";
				// 	echo "<td>";
				// 	echo $hasil['nama'];
				// 	echo "</td>";
				// 	echo "<td>";
				// 	echo $hasil['alamat'];
				// 	echo "</td>";
				// 	echo "<td>";
				// 	echo $hasil['no_telp'];
				// 	echo "</td>";
				// 	echo "<td>";
				// 	echo $hasil['deskripsi'];
				// 	echo "</td>";
				// 	echo "<td>";
				// 	echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong'.$hasil["id_karyawan"].'">
				//   			detail
				// 		</button>';
				// 	echo "</td>";				
				// 	echo "</tr>";
				// 	echo '<div class="modal fade" id="exampleModalLong'.$hasil["id_karyawan"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				// 		  <div class="modal-dialog" role="document">
				// 		    <div class="modal-content">
				// 		      <div class="modal-header">
				// 		        <b><h6 class="card-title">'.$hasil["id_karyawan"].' </h6></b> 
				// 		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				// 		          <span aria-hidden="true">&times;</span>
				// 		        </button>
				// 		      </div>
				// 		      <div class="modal-body">
				// 		        <a href="#"><img src="assets/img/karyawan/'.$hasil["gambar"].'" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px"></a>
				// 		        <br>
						        
				// 		        <br>
				// 		      </div>
				// 		      <div class="modal-footer">
				// 		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				// 		        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
				// 		      </div>
				// 		    </div>
				// 		  </div>
				// 		</div>';

				// }	
			?>			
		</table>
		</center>

	<?php } ?>	
</body>
</html>