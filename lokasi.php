<!DOCTYPE html>
<html>
<head>
	<title>Lokasi Dallas Fried Chicken</title>
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
	<br>	
	<!-- <center> -->
<div class="jumbotron text-center" style="height: 190px;">
  <h1>Dallas Fried Chicken Cabang Balige</h1>
  <p>Toba Samosir, Sumatera Utara</p> 
</div>
	<div class="row">
		<div class="col-md-6">
			<a href="#"><img src="assets/img/galeri/7.jpg" class="img-thumbnail" alt="avatar" style="max-height: 100%;max-width: 100%"></a>
		</div>
		<div class="col-md-6"> 	
			<div class="jumbotron" style="height: 100%;width: 100%;background-color: yellow">
		  		<h2>Mengapa Dallas Fried Chicken?</h2>
		  		<b>1) Disini Sangat Tepat Untuk Tempat Nongkrong Bersama Teman </b><br>
		  		<b>2) Free Wifi </b><br>
		  		<b>3) Tempat Yang Bersih Dan Dinding-Dinding Yang Cerah </b><br>
		  		<b>4) Makanan Dan Minuman Yang Nikmat Dan Sedap  </b>
			</div>
		</div>	
	</div>
  <br>	
	<h3>Lokasi Dallas Fried Chicken</h3>
	<br>		
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.5099885371797!2d99.05743011429745!3d2.333434498299388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e04605e226aff%3A0x6213d7b315e0e0c4!2sDallas+Fried+Chicken!5e0!3m2!1sid!2sid!4v1529247009268" width="1330" height="450" frameborder="2" style="max-width: 100%;max-height: 100%" allowfullscreen></iframe>
	</center>
	<br>	
	<div class="row">	
			<div class="col-md-6">	
				<h5>Alamat: Jl. Lintas Tengah Sumatera No.57a, Lumban Dolok Haume Bange, Balige, Kabupaten Toba Samosir, Sumatera Utara 22312, Indonesia</h4>
					<br>	
				<b><h5>Telp: +62 822-7789-7609</h5></b>
			</div>
			<div class="col-md-6">
				<h4>Jam Operasional:</h4>	
				<h6>Setiap Hari : 10:00 AM – 10:00 PM</h6>
				
				<br>	
			</div>
	</div>
	</div>
	<div class="col-md-12">
		<table class="table table-stripped table-bordered table-hover" style="background-color: white">
			<tr>
				<th>NO</th>
				<th>Nama Produk</th>
				<th>Jumlah Suka</th>
				<th>Jumlah Tidak Suka</th>
				<th>Persentasi Suka</th>
			</tr>
		
	</div>
	<?php  
		$kueri = "SELECT * FROM t_rating GROUP BY id_produk";
		$exe = mysqli_query($conn,$kueri);
		$no = 1;
		while($hasil = mysqli_fetch_array($exe)) {

			$id_produk = $hasil['id_produk'];
			$kueri1 = "SELECT * FROM t_produk WHERE id_produk = '$id_produk'";
			$exe1 = mysqli_query($conn,$kueri1);
			$has = mysqli_fetch_array($exe1);

			$kueri2 = "SELECT COUNT(id_produk) AS produk FROM t_rating WHERE keterangan LIKE  'suka' AND id_produk = '$id_produk'";
			$exe2 = mysqli_query($conn,$kueri2);
			$hasil2 = mysqli_fetch_array($exe2);

			$kueri3 = "SELECT COUNT(id_produk) AS produk FROM t_rating WHERE keterangan LIKE  'tidak suka' AND id_produk = '$id_produk'";
			$exe3 = mysqli_query($conn,$kueri3);
			$hasil3 = mysqli_fetch_array($exe3);

			$kueri4 = "SELECT COUNT(id_produk) AS produk FROM t_rating WHERE keterangan LIKE 'suka' AND id_produk = '$id_produk' || keterangan LIKE 'tidak suka' AND id_produk = '$id_produk'"; 
			$exe4 = mysqli_query($conn,$kueri4);
			$hasil4 = mysqli_fetch_array($exe4);

			$rata2kan = (($hasil2['produk'] / $hasil4['produk']) * 100);		

			echo "<tr>";
			echo "<td>";		
			echo $no;
			echo "</td>";
			echo "<td>";
			echo $has['nama_prod'];
			echo "</td>";
			echo "<td>";
			echo $hasil2['produk'];
			echo "</td>";
			echo "<td>";
			echo $hasil3['produk'];
			echo "</td>";
			echo "<td>";
			echo $rata2kan.'%';
			echo "</td>";
			echo "</tr>";
			$no++;
		}		
	?>
	</table>


	
</body>
</html>