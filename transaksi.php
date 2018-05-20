<!DOCTYPE html>
<html>
<head>
	<title>Semua transaksi</title>
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
			if(isset($_GET['semuaTransaksi'])) {
			$id_transaksi = $_GET['semuaTransaksi'];
			$resItem = semuaTransaksi();
		?>
		<center><br><H4>Semua pesanan yang masuk</H4>
		<br>
		<div class="col-md-10">
		<table class="table table-stripped table-bordered table-hover">
			<tr>
				<th>Tanggal transaksi</th>
				<th>Jam</th>
				<th>Status</th>
				<th>Lihat Detail</th>										
			</tr>
			<?php  
				while($item = mysqli_fetch_array($resItem)) {
					$id_transaksi = $item['id_transaksi'];
					$tanggal_transaksi = $item['tanggal_transaksi'];
					$jam = $item['jam'];
					$status = $item['status'];

					echo "<tr>";
					echo "<td>";
					echo $tanggal_transaksi;
					echo "</td>";
					echo "<td>";
					echo $jam;
					echo "</td>";
					if($item['status']=='Requested') {
						echo '<td><b><font color="brown">'.$status.'</td>';
					}
					if($item['status']=='Rejected') {
						echo '<td><b><font color="red">'.$status.'</td>';
					}
					if($item['status']=='Accepted') {
						echo '<td><b><font color="success">'.$status.'</td>';
					}
					echo "<td>";
					echo "<a href='transaksi.php?detail=".$id_transaksi."' class='btn btn-sm btn-primary'>lebih detail</a>&emsp;";
					echo "</td>";
					echo "</tr>";
				}
			?>
		</table>
		</div>
		</center>
		<?php } ?>

		<?php  
			if(isset($_GET['detail'])) {
			
			$id_transaksi = $_GET['detail'];

			$resItem = getDetailCart($id_transaksi);      		
		?>
		<center>
		<div class="col-md-10">
		<br><br>
		<h3>Detail transaksi</h3>
		<br>
		<table class="table table-stripped table-bordered table-hover">
			<tr>
				<td>Nama produk</td>
				<th>Harga per produk</th>
				<td>jumlah pesanan</td>
				<td>Total harga</td>
				<td>status</td>
			</tr>
			<?php  
				$total_hargas=0;
				while($item = mysqli_fetch_array($resItem)) {
					$id_item = $item['id_items'];
					$id_keranjang = $item['id_keranjang'];
					$id_produk = $item['id_produk'];
					$id_user = $item['id_user'];
					$total_harga = $item['total_harga'];
					$status = $item['status'];
					$jumlah_pesanan = $item['jumlah'];

					//Mengambil nama produk
					$queri ="SELECT nama_prod,harga FROM t_produk WHERE id_produk='$id_produk'";
					$hasil = mysqli_query($conn,$queri);
					while($data = mysqli_fetch_array($hasil)) {
						$nama_produk = $data['nama_prod'];
						$harga_produk = $data['harga'];
					}

					$query = "SELECT nama,alamat FROM t_akun WHERE id = '$id_user'";
					$hasil = mysqli_query($conn,$query);
					while ($data = mysqli_fetch_array($hasil)) {
						$nama = $data['nama'];
						$alamat = $data['alamat'];
					}

					$queri = "SELECT status FROM t_transaksi WHERE id_transaksi = '$id_transaksi'";
					$hasil = mysqli_query($conn,$queri);
					while($data = mysqli_fetch_array($hasil)) {
						$status = $data['status'];
					}

					echo "<tr>";
					echo "<td>";
					echo $nama_produk;
					echo "</td>";
					echo "<td>";
					echo $harga_produk;
					echo "</td>";
					echo "<td>";
					echo $jumlah_pesanan;
					echo "</td>";
					echo "<td>";
					echo $total_harga;
					echo "</td>";
					echo "<td>";
					echo $status;
					echo "</td>";

					echo "</tr>";
					$total_hargas+=$total_harga;
				}
			
		echo '</table>';
		echo '</div>';

		echo 	'<div class="col-md-6">';
		echo 	'<table class="table table-stripped table-bordered table-hover">';
		echo		'<tr>';
		echo			'<td colspan="2">Nama pemesan</td>';
		echo			'<td>'.$nama. '</td>';
		echo		'</tr>';										
		echo		'<tr>';
		echo			'<td colspan="2">Alamat pemesan</td>';
		echo			'<td>'.$alamat. '</td>';
		echo		'</tr>';	
		echo		'<tr>';
		echo			'<td colspan="2">Jumlah yang harus dibayar</td>';
		echo			'<td>'.$total_hargas. '</td>';
		echo		'</tr>';
		if($status=='Requested') {																		
		echo		'<tr>';
		echo			'<td><a href="transaksi.php?semuaTransaksi" class="btn btn-primary">Kembali</a></td>';
		echo			'<td><a href="function.php?terimaTrans='.$id_transaksi.'" class="btn btn-success">Terima</a></td>';
		echo			'<td><a href="function.php?tolakTrans='.$id_transaksi.'" class="btn btn-danger">Tolak</a></td>';
		echo		'</tr>';
		}
		else if($status=='Rejected' || $status=='Accepted') {
		echo		'<tr>';
		echo			'<td><a href="transaksi.php?semuaTransaksi" class="btn btn-primary">Kembali</a></td>';		
		echo		'</tr>';	
		}																				
		echo	'</table>';
		echo	'</div>';
		echo  '</center>';
		?>
		<?php } ?>

		<?php  
			if(isset($_GET['bokingMeja'])) {
		?>
		<br><br>
		<center><h3>DAFTAR REQUEST Meja </h3></center>
		<br>
			<table class="table table-stripped table-bordered table-hover">
				<tr>
					<th>tanggal</th>
					<th>Pemesan</th>
					<th>meja yang diboking</th>
					<th>Jumlah Kursi yang mau di booking</th>
					<th>Keterangan</th>
					<th>Status</th>
					<th colspan="2">Aksi</th>
				</tr>
				<?php  
					$queri = "SELECT * FROM t_bookmeja ORDER BY tanggal DESC";
					$hasil = mysqli_query($conn,$queri);
						while($data = mysqli_fetch_array($hasil)) {
						$id_booking = $data['id_book'];
						$newQueri = "SELECT nama FROM t_akun WHERE id = ".$data['id_user']."";
						$datas = mysqli_query($conn,$newQueri);
						$result = mysqli_fetch_array($datas);
						$nama = $result['nama'];
						echo '<tr>';
						echo '<td>';
						echo $data['tanggal'];
						echo '</td>';
						echo '<td>';
						echo $nama;
						echo '</td>';
						echo '<td>';
						echo 'Meja'.' '.$data['id_meja'];
						echo '</td>';
						echo '<td>';
						echo $data['jumlah'];
						echo '</td>';
						echo '<td>';
						echo $data['keterangan'];
						echo '</td>';
						echo '<td>';
						echo $data['status'];
						echo '</td>';
						if($data['status'] == 'Accepted' || $data['status'] == 'Rejected') {
						echo '<td colspan="2"><center><a href="#" class="btn btn-success" disabled>Tidak bisa direspon lagi</a></td></center>';	
						} else {
						echo '<td><a href="function.php?terimaRequest='.$id_booking.'" class="btn btn-success">Terima</a></td>';
						echo '<td><a href="function.php?tolakRequest='.$id_booking.'" class="btn btn-danger">Tolak</a></td>';
						}
						echo '</tr>';
					}
				?>
			</table>	
		<?php  
			}
		?>
	</div>
</body>
</html>