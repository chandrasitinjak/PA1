<!DOCTYPE html>
<html>
<head>
	<title>Pemasukan</title>
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
		<?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) { 
			$k = "SELECT * FROM t_items WHERE status = 'Accepted'";
			$a = mysqli_query($conn,$k);

			$hasil = mysqli_num_rows($a);			

			if($hasil == 0) { ?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-primary">
							<center><h1><i class="fa fa-money"> Pemasukan Kosong</i></h1></center>
						</div>
					</div>
				</div>
			<?php } else {				
		?>

		<?php  
			// $ka = "SELECT SUM(total_harga) AS total FROM t_items WHERE status = 'Accepted' GROUP BY id_produk";
			// $jj = mysqli_query($conn,$ka) or die(mysqli_error($conn));
			// $l = mysqli_fetch_array($jj);
			// $k = $l['total'];
			// var_dump($k);
		?>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary">
					<center><h1><i class="fa fa-money"> Laporan Pemasukan</i></h1></center>
				</div>
			</div>
		</div>				
		<table class="table table-stripped table-bordered table-hover ">
			<tr>
				<th>Tanggal Transaksi</th>
				<th>Pemasukan</th>
				<th><center>Aksi</center></th>
			</tr>
		
		<?php  
			$kueri = "SELECT *
					 FROM t_items,t_transaksi WHERE t_items.id_transaksi = t_transaksi.id_transaksi AND t_items.status = 'Accepted' && t_transaksi.status = 'Accepted' 
						";
			$exeQ = mysqli_query($conn,$kueri)or die(mysqli_error($conn));			
				$sum = 0;
			while($hasil = mysqli_fetch_array($exeQ)) {												

				$id_transaksi = $hasil['id_transaksi'];						
				echo "<tr>";
				echo "<td>";
				echo $hasil['tanggal_transaksi'];
				echo "</td>";
				echo "<td>";
				echo '<p>Rp. '.$hasil['total_harga'];
				echo "</td>";
				echo "<td>";
				echo '<center><a href="function.php?deletePemasukan='.$id_transaksi.'" class="btn btn-danger">Hapus</a></center>';
				echo "</td>";			
				echo "</tr>";	
				$sum += $hasil['total_harga'];
			}
			echo "<td>";
			echo '<b>Total</b>';
			echo "</td>";
			echo "<td>";
			echo '<b>Rp. '.$sum.'</b>';
			echo "</td>";
		?>
		</table>
		<!-- <center>
			<a href="function.php?hapusAllPemasukan" class="btn btn-danger">Hapus Semua Data</a>
		</center> -->
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger">
					<center><h3><i class="fa fa-hand-o-right"> <a href="function.php?hapusAllPemasukan" class="btn btn-danger">Hapus Semua Data</a></i></h3></center>					
					<center><h3><i class="fa fa-print"> <a href="cetak2.php" class="btn btn-primary">Print Data</a></i></h3></center>
				</div>
			</div>
		</div>
		<?php }} ?>
	</div>
</body>
</html>