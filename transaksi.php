<!DOCTYPE html>
<html>
<head>
	<title>Semua transaksi</title>
	<link rel="icon" type="image/jpg" href="assets/img/beranda/logo.jpg">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php  
		include("hf/reference.php");
	?>
	<style type="text/css" href="assets/jquery/jquery.dataTables.min.css"></style>
	<style>
	.dataTables_wrapper .myfilter .dataTables_filter {
	    float:right
	}
	.dataTables_wrapper .mylength .dataTables_length {
	    float:left
	}
	.dataTables_wrapper .dataTables_paginate .paginate_button {
	  /*color: black!important;
	  background-color: #e0ef05;*/
	  margin-left: 5px;
	  cursor: pointer;
  /*change the hover text color*/
	}
	</style>
</head>
<body>
	<div class="container-fluid">	
		<?php include("hf/menubar.php"); ?>		
		<?php  
			if(isset($_GET['semuaTransaksi'])) {
			$id_transaksi = $_GET['semuaTransaksi'];
			$resItem = semuaTransaksi();			
		?>
		<?php  
			$kueri = "SELECT * FROM t_transaksi";
			$hasil = mysqli_query($conn,$kueri);
			$result = mysqli_num_rows($hasil);
			if($result == 0) { ?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-primary">
							<center><h1><i class="fa fa-book"> Tidak Ada Transaksi Saat Ini</i></h1></center>
						</div>
					</div>
				</div>
		<?php  } else if($result != 0) {			
		?>
		<!-- <center><br><H4>Semua pesanan yang masuk</H4> -->
		<center>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary">
					<center><h1>Pesanan Yang Masuk <i class="fa fa-hand-o-down"></i></h1></center>
				</div>
			</div>
		</div>
		<br>		
		<table id="example" class="table table-stripped table-bordered table-hover display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <td>User</td>
                <td>Status</td>
                <td>Aksi</td>
                
            </tr>
        </thead>
        <tbody>
            
                
	        <?php  
					while($item = mysqli_fetch_array($resItem)) {
						$id_transaksi = $item['id_transaksi'];
						$tanggal_transaksi = $item['tanggal_transaksi'];
						$jam	= $item['jam'];
						$id_user = $item['id_user'];
						$status = $item['status'];

						$kueri = "SELECT * FROM t_akun WHERE id = '$id_user'";
						$exeq = mysqli_query($conn,$kueri);
						$tampung = mysqli_fetch_assoc($exeq);
						$nama = $tampung['nama'];

						echo "<tr>";
						echo "<td>";
						echo $id_transaksi;
						echo "</td>";
						echo "<td>";
						echo $tanggal_transaksi;
						echo "</td>";
						echo "<td>";
						echo $jam;
						echo "</td>";
						echo "<td>";
						echo $nama;
						echo "</td>";
						echo "<td>";
						echo $status;
						echo "</td>";
						if($status == 'Accepted' || $status == 'Rejected') {
						echo "<td>";
						echo '<a class="btn btn-primary" href="index.php">Kembali</a>';
						echo '&nbsp;&nbsp&nbsp';
						echo '<a class="btn btn-danger" href="function.php?hapusRiwayatTrans='.$id_transaksi.'">Hapus</a>';
						echo "</td>";	
						} else {
						echo "<td>";
						echo '<a class="btn btn-success" href="function.php?terimaTrans='.$id_transaksi.'">approve</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						echo '<a class="btn btn-danger" href="function.php?tolakTrans='.$id_transaksi.'">reject</a>';
						echo "</td>";
						}			
						echo "</tr>";
					}
			?>
          </tbody>
         </table>
         <?php } ?>
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
		<?php 
		$queri = "SELECT * FROM t_bookmeja";
		$hasil = mysqli_query($conn,$queri);
		$h3 = mysqli_num_rows($hasil);
		if($h3 == 0) { ?>
	 		<div class="row">
				<div class="col-md-12">
					<div class="alert alert-danger">
						<center><h1><i class="fa fa-table"> Tidak Ada Request Sekarang</i></h1></center>
					</div>
				</div>
			</div>
		<?php } else if($h3 != 0 ) {
		?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-secondary">
					<center><h1><i class="fa fa-table"> Daftar Pembookingan Meja</i></h1></center>
				</div>
			</div>
		</div>
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
						echo '<td colspan="2"><center><a href="function.php?deleteRequestMeja='.$id_booking.'" class="btn btn-danger">Hapus</a></td></center>';								
						} else {
						echo '<td><a href="function.php?terimaRequest='.$id_booking.'" class="btn btn-success">approve</a></td>';
						echo '<td><a href="function.php?tolakRequest='.$id_booking.'" class="btn btn-danger">reject</a></td>';
						}
						echo '</tr>';
					}
				?>				
			</table>	
		<?php  
			}}
		?>
		<?php  
			$queri = "SELECT id_book FROM t_bookmeja WHERE status = 'Accepted' or status = 'Rejected'";
			$hasil = mysqli_query($conn,$queri)or die(mysqli_error($conn));

			$data = mysqli_num_rows($hasil);
			if($data >= 3) {
				// echo "<script>alert('Data kosong,tidak bisa dihapus!')</script>";
				// header("Refresh:0 url=transaksi.php?bokingMeja");				
		?>
		<center><a href="function.php?hapusSemuaRequest" class="btn btn-danger">Hapus semua data</a></center>
	<?php } else { echo ' '; }?>
	</div>
</body>
</html>
<script type="text/javascript" src="assets/jquery/jquery-3.3.1.js"></script>
<script type="text/javascript" src="assets/jquery/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#example').DataTable(
    	{
    		"pageLength": 7,
    		"dom": "<'myfilter'f><'mylength'l>t<'bottom'ip>", 

    		// "pagingType" : "simple"	
			// "pagingType" : "full_numbers"
			// "dom"			:"<'myfilter'f><'mylength'l>t"	    
    	}
    	);
	} );
</script>