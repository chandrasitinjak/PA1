<!DOCTYPE html>
<html>
<head>
	<title>Beli produk</title>
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
			if(isset($_GET['lihatProduk'])) {
			if (isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1) {				
		?>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="jumbotron jumbotron-fluid" style="height: 150px;margin-bottom: 0px;padding-top: 25px;">
			 	 <div class="container">
			    <center><h1 class="display-5"><i class="fa fa-cutlery"> <i class="fa fa-coffee"> Anda Berada Di Menu Lihat Produk</i></i></h1>
			    <p class="lead">Silahkan Pilih Dan Pesan Makanan Dan Minuman Kesukaan Anda di <b>Dallas Fried Chicken</b></p></center>		
			</div>
		</div>
		<br><br>				
		<div class="row">
		<div class="col-md-2" style="padding-right: 30px;">		
			<ul class="list-group">
			  <li class="list-group-item active" style="background-color: #ecac4d"><h3 style="color : black">Kategori</h3></li>
			  <a href="makanan.php"><li class="list-group-item"><b><h5 style="color : black">Makanan</h5></b></li></a>
			  <a href="minuman.php"><li class="list-group-item"><b><h5 style="color : black">Minuman</h5></b></li></a>			  
			</ul>	
		</div>
		<div class="col-md-10">					
		<div class="row">
			<?php 
				$queri = "SELECT * FROM t_produk ";
				$produks = mysqli_query($conn,$queri);
				while($produk = mysqli_fetch_array($produks)) {
			?>	

			<div class="col-md-4">
				<div class="card" style="background-color: orange">
					<div class="card-header">
						<center><b><p class="card-title"><h3><?php echo  $produk['nama_prod'] ?></h3></b></center>
					</div>
					<a href="#"><img src="assets/img/produk/<?=$produk['gambar']?>" class="img-thumbnail" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $produk['deskripsi_prod']; ?>" alt="avatar" style="height: 200px; width: 350px;"></a>
					<div class="card-body">							
						<p class="card-title"><h5>harga : <?php echo  $produk['harga'] ?>
						<!-- <br>Jumlah stok : <?php //echo  $produk['stok'] ?> -->
					</h5></p>
						<!-- <p class="card-title">Deskripsi : <?php //echo  $produk['deskripsi_prod'] ?></p> -->
						<center>
							<?php 
								if (isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1) { 
							?>
							<br>
							<?php if($produk['stok'] == 1) {?>
								<a href="beli.php?beliProduct=<?php echo $produk['id_produk']?>"><button class="btn btn-primary">request</button></a>							
							<?php } else if($produk['stok'] == 0) { ?>							
								<a href="#"><button class="btn btn-danger">Tidak Tersedia</button></a>
							<?php }} ?>
						</center>
					</div>					
				</div>	
				<br>			
			</div>					
		<?php } ?>
		<?php }} ?>
		</div>
		</div>
		</div>
	</div>
		<?php if(isset($_GET['beliProduct'])) {
			$id = $_GET['beliProduct'];
			if(isset($_SESSION['is_logged_in']) == TRUE && $_SESSION['user_biasa'] == 1) {
		?>
			<?php 
				$queri = "SELECT * FROM  t_produk WHERE id_produk = '$id'"; 
				$hasil = $conn->query($queri);
				$produk = $hasil->fetch_assoc();
			?>
			
			<div class="container-fluid">
			<div class="row">
			<div class="col-md-6">
			<br>			
				<div class="card" style="background-color: #a5acb3">
					<div class="card-header">
						<center><b><p class="card-title"><?php echo  $produk['nama_prod'] ?></p></b></center>						
					</div>
					<a href="#"><img src="assets/img/produk/<?=$produk['gambar']?>" class="img-thumbnail" alt="avatar" data-container="body" data-toggle="popover" data-placement="top" data-content="<?php echo $produk['deskripsi_prod']; ?>" style="height: 339px;width: 655px"></a>
					<div class="card-body">												
						<!-- <p class="card-title">Sisa stok : <b><?php //echo  $produk['stok'] ?></b><br> -->
						<p class="card-title">Harga : <b><?php echo  $produk['harga'] ?></b><br>
						<p class="card-title">Deskripsi : <?php echo  $produk['deskripsi_prod'] ?></p>																
					</div>					
				</div>	
				<br>			
			</div>
			
			<div class="col-md-6">
			<br>
			<div class="alert alert-primary" style="height: 511px">		
			<div class="row">	
			<div class="col-md-8">	
			<form class="form-horizontal" action="function.php?masukKeranjang=<?php echo $produk['id_produk']?>" method="post">			
				<div class="form-group">				       
				    <div class="col-sm-10">
				        <label><h3>Jumlah Pesan</h3></label>				          		
				        <input type="number" class="form-control" name="jumlah" placeholder="Masukkan jumlah produk" style="width: 400px;" required>
				    </div>
				</div>
				<div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-8">
				        <button type="submit" class="btn btn-success">request</button>
				    </div>
				</div>
			</form>
			</div>
			<?php 

				$id_user = $_SESSION['id'];				
				$kkueri = "SELECT * FROM t_rating WHERE id_produk = '$id' AND id_user = '$id_user'";
				$exe = mysqli_query($conn,$kkueri);
				$hasil = mysqli_num_rows($exe);
				$qsuka = $conn->query("SELECT count(id_rating) AS jlh FROM t_rating WHERE id_produk = '$id' AND keterangan LIKE 'suka'");
				$qtaksuka = $conn->query("SELECT count(id_rating) AS jlh FROM t_rating WHERE id_produk = '$id' AND keterangan LIKE 'tidak suka'");
				$suka = $qsuka->fetch_assoc();
				$yes = $suka['jlh'];
				// var_dump($yes);
				$tidak = $qtaksuka->fetch_assoc();
				$no = $tidak['jlh'];
				// var_dump($hasil);
				if($hasil == 0) { 
				
				
			?>			
			<div class="col-md-8" id="poting">
				<h1>Berikan Penilaianmu!</h1>

                  <div class="col">
                    <input class="form-check-input" type="radio" name="vote" onclick="proses(this.value)" id="gridRadios1" value="1" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Suka
                    </label>
                  </div>
            
            
                  <div class="col">
                    <input class="form-check-input" type="radio" name="vote" onclick="proses(this.value)" id="gridRadios2" value="0">
                    <label class="form-check-label" for="gridRadios2">
                      Tidak Suka
                    </label>
                  </div>                
				</div>					

			<?php } else  { ?>
				<div class="col-md-8" id="poting">
				<b><h3>Hasil Rating</h3></b>				
				  <div class="row" >
                  <div class="col-4">
                    Suka
                  </div>
                  <div class="col-8">
                    <img src="assets/img/voting/poll.jpg" width="<?php echo (100*round($yes/($no+$yes),2)); ?>" height="15px;"><?php echo (100*round($yes/($no+$yes),2)); ?>%
                  </div>
                 </div>                
                <div class="row">
                  <div class="col-4">
                    Tidak Suka
                  </div>
                  <div class="col-8">
                    <img src="assets/img/voting/poll.jpg" width="<?php echo(100*round($no/($no+$yes),2)); ?>" height="15px;"><?php echo (100*round($no/($no+$yes),2)); ?>%
                  </div>
                </div>
				</div>					
			<?php } ?>
			</div>
		</div>
		</div>					
		</div>
		<?php }} ?>			
	</div>		
	<?php  
		if(isset($_GET['beliProduct'])) {
		$id_produk = $_GET['beliProduct'];
	?>
	<script>
      function proses(int) {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState === 4 && this.status==200) {
          document.getElementById("poting").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET","poll_vote.php?id="+<?php echo $id_produk;?>+"&vote="+int,true);
      xmlhttp.send();
    }
    </script>
<?php } ?>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
</body>
</html>