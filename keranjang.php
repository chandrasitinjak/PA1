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
				
				echo '<tbody>';
				echo '<tr>';
				echo '<td>';
				echo $data['nama_produk'];
				echo '</td>';
				echo '<td>';
				echo $data['harga_produk'];
				echo '</td>';
				echo '<td>';
				echo $data['total_pesanan'];
				echo '</td>';
				echo '<td>';
				echo $data['total_harga'];
				echo '</td>';
				echo '<td>';
				echo $data['status'];
				echo '</td>';
				echo '<center><td><a href="#" class="btn btn-danger">Hapus</a></td></center>';
				echo '</tr>';
				echo '<tr>';

			?>		
			<?php  		$jumlah_pesanan += $data['total_pesanan'];
							$total_harga += $data['total_harga'];
						
						echo '<td colspan="2"><b>Total</b></td>';
						echo '<td><b>'.$jumlah_pesanan." buah".'</b></td>';
						echo '<td><b>'."Rp ".$total_harga.",-".'</b></td>';						
					echo '</tr>';
				echo '</tbody>';
		?>	
			</table>
			</center>
			</div>
		<?php }}}}} ?>
	</div>
</body>
</html>