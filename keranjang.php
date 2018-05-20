<!DOCTYPE html>
<html>
<head>
	<title>Isi keranjang saya</title>
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
		<?php if(isset($_GET['keranjangSaya']))  { 
			$keranjang = getKeranjang();

			if($keranjang != NULL) {
				foreach($keranjang as $data) {
					$status = $data['status'];
				}
				if($status =='waiting') {
		?>
			<center>
				<br>
				<h1>Keranjang Saya</h1>			
			
			<br>
			<div class="col-md-10">
			<table class="table table-light table-bordered table-hover">
				<thead class="thead-dark">
					<th>Nama produk</th>
					<th>Harga per buah</th>
					<th>Total Pesanan</th>
					<th>Total Harga</th>
					<th>Status</th>
					<th>Tindakan</th>					
				</thead>		
				<?php 
					$jumlah_pesanan=0;
					$total_harga=0;					
					foreach($keranjang as $data) {
						if($data['status'] == "waiting") {	
				
					
				echo '<tr>';
				echo '<td>';
				echo $data['nama_produk'];
				echo '</td>';
				echo '<td>';
				echo 'Rp '.$data['harga_produk'].',-';
				echo '</td>';
				echo '<td>';
				echo $data['total_pesanan'].' buah';
				echo '</td>';
				echo '<td>';
				echo 'Rp '.$data['total_harga'].',-';
				echo '</td>';
				echo '<td>';
				echo $data['status'];
				echo '</td>';
				echo '<center><td><a href="function.php?batalPesan='.$data['id_item'].'" class="btn btn-danger">Hapus</a></td></center>';
				echo '</tr>';
				echo '<tr>';
				
				$jumlah_pesanan += $data['total_pesanan'];
				$total_harga += $data['total_harga'];
				
				}
			}
			?>		
			<?php  		
						
						echo '<td colspan="2"><b>Total</b></td>';
						echo '<td><b>'.$jumlah_pesanan." buah".'</b></td>';
						echo '<td><b>'."Rp ".$total_harga.",-".'</b></td>';						
					echo '</tr>';
				echo '</tbody>';
		?>	
			</table>
			<a href="function.php?prosesKeranjang=<?php echo $data['id_keranjang'];?>" class="btn btn-success">Proses</a>
			</center>
			</div>
		<?php }}} ?>
		<br>
		<?php  
			if(isset($_GET['riwayatTransaksi'])) {
				$id_user = $_GET['riwayatTransaksi'];
				$resItem = getAllCarting();	
		?>	
		<center>
			<h1>Riwayat Transaksi</h1>
		<br>
		<div class="col-md-10">
				<table class="table table-stripped table-bordered table-hover ">
				<tr>
					<th>Tanggal</th>
					<th>Waktu</th>					
					<th>Status</th>
					<th><center>Aksi</center></th>
				</tr>
	<?php
		while($item = mysqli_fetch_array($resItem)) {
			$id_trans 	= $item['id_transaksi'];
			$tanggal 	= $item['tanggal_transaksi'];
			$jam 		= $item['jam'];
			$status 	= $item['status'];


			echo "<tr>
					<td>".$tanggal."</td>
					<td>".$jam."</td>";					
					if($status=='Accepted'){
						echo "<td><b><font color='Green'>".$status."</font></b></td>";
					}
					else if($status=='Requested'){
						echo "<td><b><font color='Brown'>".$status."</font></b></td>";
					}
					else if($status=='Rejected'){
						echo "<td><b><font color='Red'>".$status."</font></b></td>";
					}
			echo	"<td>
						<center><a href='detailTransaksi.php?detailTransaksi=".$id_trans."' class='btn btn-sm btn-info'>Detail</a></center>
					</td>
					</tr>";
					// <td> 
					// 	<center><a href='function.php?hapusRiwayatTransaksi=".$id_trans."' class='btn btn-sm btn-danger'>hapus</a></center>
					// </td>
				 

		}
		echo "</table>";
	?>
	</div>
	</center>
			
		<?php 	} ?>		
		
	</div>
</body>
</html>