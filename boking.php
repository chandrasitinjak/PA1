<!DOCTYPE html>
<html>
<head>
	<title>Pesan Meja</title>
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
	<?php  
		if(isset(($_GET['bookingMeja']))) {		
		$id_meja = $_GET['bookingMeja']	;
	?>
		<?php 
				$queri = "SELECT * FROM  t_meja WHERE id_meja = '$id_meja'"; 
				$hasil = $conn->query($queri);
				$meja = $hasil->fetch_assoc();
			?>
			<br>
			<center>
			<h2>Meja yang anda pilih</h2>
			<br>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<center><b><p class="card-title">Meja <?php echo  $meja['id_meja'] ?></p></b></center>						
					</div>
					<a href="#"><img src="assets/img/meja/<?=$meja['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 300px;width: 500px"></a>
					<div class="card-body">												
						<b><p class="card-title">Kursi tersedia : <b><?php echo  $meja['jumlah_kursi'] ?></b></p></b>	
					</div>					
				</div>	
				<br>			
			</div>
			<form class="form-horizontal" action="function.php?bokingSekarang=<?php echo $meja['id_meja']?>" method="post">			
				<div class="form-group">				       
				    <div class="col-sm-4">
				        <label>Jumlah kursi yang mau dipesan</label>				          		
				        <input type="number" class="form-control" name="jumlah" placeholder="Masukkan jumlah kursi" required>
				    </div>
				</div>
				<div class="form-group">
	    			<label class="control-label col-sm-4">Masukkan keterangan</label>
	    			<div class="col-sm-4">
	      				<textarea class="form-control" name="keterangan" rows="4" placeholder="keterangan" required></textarea>
	    			</div>
	  			</div>
				<div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-8">
				        <button type="submit" class="btn btn-success">boking sekarang</button>
				    </div>
				</div>
			</form>
			</center>			
	<?php  
		}
	?>
	<?php  
		if(isset($_GET['daftarRequest'])) {
			$id_user = $_GET['daftarRequest'];			
	?>
	<br><br>		
		<center>
			<h3>Daftar transaksi anda!</h3>
			<br>
		<div class="col-md-9">
		
		<table class="table table-light table-bordered table-hover">
			<tr>
				<th>Tanggal</th>
				<th>Meja</th>
				<th>Jumlah kursi</th>
				<th>Keterangan</th>
				<th>status</th>
			</tr>
			<?php 
				$queri = "SELECT * FROM t_bookmeja WHERE id_user = '$id_user'";
				$hasil = mysqli_query($conn,$queri);			 
				while($data = mysqli_fetch_array($hasil)) {
					echo '<tr>';
					echo '<td>';
					echo $data['tanggal'];
					echo '</td>';
					echo '<td>';
					echo 'meja '.$data['id_meja'];
					echo '</td>';
					echo '<td>';
					echo $data['jumlah'].' Kursi';
					echo '</td>';
					echo '<td>';
					echo $data['keterangan'];
					echo '</td>';
					echo '<td>';
					echo $data['status'];
					echo '</td>';
					echo '</tr>';
				}								
			?>			
		</table>
		<br>
		<a href="meja.php?semuaMeja" class="btn btn-success">Kembali</a>		
		</div>
		</center>
	<?php } ?>
	</div>
</body>
</html>