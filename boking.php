<!DOCTYPE html>
<html>
<head>
	<title>Pesan Meja</title>
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
	<?php  
		if(isset($_GET['bookingMeja'])) {		
		$id_meja = $_GET['bookingMeja'];
	?>
			<?php 
				$queri = "SELECT * FROM  t_meja WHERE id_meja = '$id_meja'"; 
				$hasil = $conn->query($queri);
				$meja = $hasil->fetch_assoc();
			?>			
			<div class="row">
			<div class="col-md-6">							
				<br>
					<div class="card" style="background-color: #57595a">
						<div class="card-header">
							<center><b><p class="card-title">Meja <?php echo  $meja['id_meja'] ?></p></b></center>						
						</div>
						<a href="#"><img src="assets/img/meja/<?=$meja['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 400px;width: 660px;background-color: #ffc107"></a>
						<div class="card-body">												
							<b><p class="card-title">Kursi tersedia : <b><?php echo  $meja['jumlah_kursi'] ?></b></p></b>	
						</div>					
					</div>	
					<br>							
			</div>
			<div class="col-md-6">
			<br>			
			<div class="well" style="width: 600px;">
			<center>
    		<form class="form-horizontal" action="function.php?bokingSekarang=<?php echo $meja['id_meja']?>" method="post" style="background-color: #e8ecf1">      
		      <br>
		      <h3>Detail Pembookingan</h3>        
		      <br>
		        <div class="input-group mb-3" style="width : 400px;">
		          <div class="input-group-prepend">
		            <!-- <span class="input-group-text" id="basic-addon1">@</span> -->
		          </div>
		          <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah Kursi" aria-label="Username" aria-describedby="basic-addon1" required>
		        </div>
		        <b>Jam Datang</b>
		        <div class="input-group mb-3" style="width : 400px;">
		          <div class="input-group-prepend">
		            <!-- <span class="input-group-text" id="basic-addon1"></span> -->
		            <span></span>
		          </div>
		          <input type="datetime-local" name="tgl_booked" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
		        </div> 
		        <b>Jam Keluar</b>       
		        <div class="input-group mb-3" style="width : 400px;">
		          <div class="input-group-prepend">
		            <!-- <span class="input-group-text" id="basic-addon1"></span> -->
		            <span></span>
		          </div>
		          <input type="datetime-local" name="tgl_booked1" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
		        </div> 
		        <b>Keterangan</b>      
		        <div class="input-group mb-3" style="width: 400px;">
					<div class="input-group-prepend" >    				
					</div>			
					<textarea class="form-control" aria-label="With textarea" name="keterangan" rows="4" required>Masukkan Keterangan</textarea>
				</div>				      				       
		        <div class="form-group">
		          <div class="col-sm-offset-2 col-sm-8">
		              <button type="submit" class="btn btn-primary">request</button>
		              <br>
		          </div>
		        </div>
		        <br>
		    </form>
		    </center>         
		  </div>
		</div>
	</div>			
	<?php  
		}
	?>
	<?php  
		if(isset($_GET['daftarRequest'])) {
			$id_user = $_GET['daftarRequest'];			
	?><br>	
		<?php  
			$id_user = $_SESSION['id'];			
			$kueri = "SELECT id_book FROM t_bookmeja WHERE id_user = '$id_user'";
			$hasil = mysqli_query($conn,$kueri);
			$hasill = mysqli_num_rows($hasil);
			if($hasill == 0) {
		?>		<center>
				<div class="row">
					<div class="col-md-12" style="margin-top: 0px;">
						<div class="alert alert-danger">
							<h1>Anda Tidak Memiliki Daftar Pembookingan</h1>
						</div>
					</div>
				</div>
				</center>
			<?php  } else { ?>
							
		<center>
			<h3>Daftar transaksi anda!</h3>
			<br>
		<div class="col-md-11">
		
		<table class="table table-light table-bordered table-hover">
			<tr>
				<th>Tanggal</th>
				<th>Waktu berakhir</th>
				<th>Meja</th>
				<th>Jumlah kursi</th>				
				<th>Keterangan</th>
				<th>status</th>
			</tr>
			<?php 
				$queri = "SELECT * FROM t_bookmeja WHERE id_user = '$id_user'";
				$hasil = mysqli_query($conn,$queri);			 
				while($data = mysqli_fetch_array($hasil)) {
					date_default_timezone_set('Asia/Jakarta');  
					$waktu = $data['tanggal'];					
					$waktu1 = $data['waktu_berakhir'];

					// $tanggal = date('d-m-Y H:i',strtotime("$waktu")).' WIB';
					$tanggal = date('H:i',strtotime("$waktu")).' WIB';
					$tangga2 = date(' H : i  ',strtotime("$waktu1")). 'WIB';


					// $tanggal = date('d-m-Y h:i');					
					
					echo '<tr>';
					echo '<td>';
					echo $tanggal;
					echo '</td>';
					echo '<td>';
					echo $tangga2;
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
	<?php }} ?>
	</div>
</body>
</html>