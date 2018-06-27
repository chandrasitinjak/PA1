<!DOCTYPE html>
<html>
<head>
	<title>Keranjang</title>
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
		<br>
		<?php if(isset($_GET['keranjangSaya']))  { 
			$keranjang = getKeranjang();

			$a = "SELECT * FROM t_items WHERE status = 'waiting'";
			$x = mysqli_query($conn,$a);
			$s = mysqli_num_rows($x);
			if($s == 0) { ?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-danger">
							<center><h1><i class="fa fa-cart-arrow-down">  Keranjang Anda Kosong Saat Ini</i></h1></center>
						</div>
					</div>
				</div>
		<?php 
			}		

			 else if($keranjang != NULL) {
				foreach($keranjang as $data) {
					$status = $data['status'];
				}
				if($status =='waiting') {
		?>
			<center>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-primary">
							<center><h1><i class="fa fa-cart-arrow-down"> &nbsp;Isi Keranjang Anda</i></h1></center>
						</div>						
					</div>
				</div>			
			<br>			
			<table class="table table-light table-bordered table-hover">
				<thead class="thead-dark">
					<th>Nama produk</th>
					<th>Harga per buah</th>
					<th>Total Pesanan</th>
					<th>Total Harga</th>
					<th>Status</th>
					<th colspan="2">Tindakan</th>					
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
				echo '<center><td><a href="beli.php?lihatProduk" class="btn btn-primary">tambah</a></td></center>';
				
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
		<?php  
			if(isset($_GET['riwayatTransaksi'])) {
				$id_user = $_GET['riwayatTransaksi'];
				$resItem = getAllCarting();	

				$x = mysqli_num_rows($resItem);
				if($x == 0) { ?>
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-danger">
								<center><h1><i class="fa fa-close"> Anda Belum Memiliki Transaksi</i></h1></center>
							</div>
						</div>					
					</div>
			<?php } else {
		?>	
		<center>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary">
						<h1><i class="fa fa-book"> Riwayat Transaksi</i></h1>			
				</div>
			</div>
		</div>
						
				<table class="table table-stripped table-bordered table-hover">
				<tr>
					<th>Tanggal</th>
					<th>Waktu</th>					
					<th>Status</th>
					<th colspan="2"><center>Aksi</center></th>
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
					<td>
						<center><a href='function.php?hapusRiwayatTransaksi=".$id_trans."' class='btn btn-danger'>Hapus</a></center>
					</td>
					</tr>";
					// "<td> 
					// 	<center><a href='function.php?hapusRiwayatTransaksi=".$id_trans."' class='btn btn-sm btn-danger'>hapus</a></center>
					// </td>";				
		}
		echo "</table>";
	?>
	
	</center>
			
		<?php }} ?>		
		
	</div>
</body>
</html>