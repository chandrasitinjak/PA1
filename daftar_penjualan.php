<!DOCTYPE html>
<html>
<head>
	<title>Daftar Penjualan</title>
	<link rel="icon" type="image/jpg" href="assets/img/beranda/logo.jpg">
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
			$kueri = "SELECT * FROM t_transaksi WHERE status='Accepted'";
			$exe = mysqli_query($conn,$kueri);
			$hasil = mysqli_num_rows($exe);
			if($hasil == 0)  { ?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-danger">
							<center><h1><i class="fa fa-info"> Tidak Ada Produk Terjual</i></h1></center>
						</div>
					</div>
				</div>
		<?php } else {
		?>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success">
					<center><h1><i class="fa fa-book"> &nbsp;Laporan Penjualan</i></h1></center>
				</div>
			</div>
		</div>
		<table class="table table-stripped table-bordered table-hover">
			<thead>
				<th>Tanggal</th>
				<th>Nama Produk</th>
				<th>Jumlah Terjual</th>
			</thead>		
		<?php  
			$kueri = "SELECT * FROM t_transaksi,t_items WHERE t_transaksi.status = 'Accepted' && t_items.status = 'Accepted' AND t_items.id_transaksi = t_transaksi.id_transaksi";
			$exe = mysqli_query($conn,$kueri);
				
			while($hasil = mysqli_fetch_array($exe)) {
			$id_produk = $hasil['id_produk'];
			// $id = $_SESSION['id'];
			// $queri = "SELECT SUM(jumlah) AS total FROM t_items WHERE status = 'Accepted' && id_user = $id AND id_produk = '$id_produk'";
			// $ex = mysqli_query($conn,$queri)or die(mysqli_error($conn));
			// while ($sad = mysqli_fetch_array($ex)) {
			// $a = $sad['total'];
			// }

			$kueri1 = "SELECT * FROM t_produk WHERE id_produk = '$id_produk'";
			$exeq = mysqli_query($conn,$kueri1);
			$hasil1 = mysqli_fetch_array($exeq);

			$nama_prod = $hasil1['nama_prod'];
			echo "<tbody>";
			echo "<tr>";
			echo "<td>";
			echo $hasil['tanggal_transaksi'];
			echo "</td>";
			echo "<td>";
			echo $nama_prod;
			echo "</td>";
			echo "<td>";
			echo $hasil['jumlah'];
			echo "</td>";
			echo "</tr>";
			echo "</tbody>";
			}
		?>
	<?php } ?>
		</table>
		
	</div>
</body>
</html>