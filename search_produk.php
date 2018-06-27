<?php  
	include("hf/reference.php");
	include('function.php');

	global $conn;

	$keyword = $_GET["keyword"];
	$kueri = "SELECT  * FROM t_produk WHERE			 	 
				 nama_prod LIKE '%$keyword%' || 				 
				 harga LIKE '%$keyword%' ";					 
		// $produk = mysqli_query($conn,$kueri)or die(mysqli_error($conn));
		$produk = mysqli_query($conn,$kueri);
		$hasil = mysqli_fetch_array($produk);
		// var_dump($hasil);
?>
<center>
	
<div class="row">
			<?php 
				$queri = "SELECT * FROM t_produk WHERE 				
				 kategori = 1 AND 
				 nama_prod LIKE '%$keyword%' || kategori = 1 AND 
				 harga LIKE '%$keyword%'";

				$produks = mysqli_query($conn,$queri);

				while($produk = mysqli_fetch_array($produks)) {					
			?>	

			<div class="col-md-4">
				<div class="card" style="background-color: #a5acb3">
					<div class="card-header">
						<center><b><p class="card-title"><?php echo  $produk['nama_prod'] ?></p></b></center>										
					</div>
					<a href="#"><img src="assets/img/produk/<?=$produk['gambar']?>" class="img-thumbnail" alt="avatar" style="height: 250px;width: 450px" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $produk['deskripsi_prod']; ?>"></a>
					<div class="card-body">							
						<p class="card-title"><h5>harga : <?php echo  $produk['harga'] ?></h5></p>
						<!-- <p class="card-title"><h5>Jumlah stok : <?php //echo  $produk['stok'] ?></h5></p> -->
						<!-- <p class="card-title">Deskripsi : <?php //echo  $produk['deskripsi_prod'] ?></p> -->
						<center>
							<?php 
								if (isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1) { 
							?>
							<br>
							<?php if($produk['stok'] != 0) {?>
								<a href="beli.php?beliProduct=<?php echo $produk['id_produk']?>"><button class="btn btn-primary">Tambah Kekeranjang</button></a>							
							<?php } else if($produk['stok'] == 0) { ?>							
								<a href="#"><button class="btn btn-danger disabled">Tambah Kekeranjang</button></a>						
							<?php }} ?>
						</center>
					</div>					
				</div>	
				<br>			
			</div>					
		<?php } ?>
		</div>
<!-- <script type="text/javascript">
  $(function () {
  $('[data-toggle="popover"]').popover()
})
</script> -->
</center>	
		