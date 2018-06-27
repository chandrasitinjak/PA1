<!DOCTYPE html>
<html>
<head>
	<title>Komentar</title>
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
	<?php  if((isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1) && (isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1)) {
	 if(isset($_GET['buatKomentari'])) {
	?>
	<br><br>
	<center>
	<div class="well" style="width: 600px;">	        
  	<form class="form-horizontal" action="komentar.php?buatKomentar=<?php echo $_SESSION['id']?>" method="post" style="background-color: #9c938b">
  		<br>
      <center><b><h2 style="color: white">Buat Komentar</h2></b>
      		  <h5 style="color : white">Semua Tentang Dallas Fried Chicken</h5>
      </center>
      <br>
      <br>
      <h3><i class="fa fa-arrow-down"></i></h3>                    		        
        <div class="input-group" style="width: 500px;">
						  <div class="input-group-prepend">    
						  </div>
						  <textarea class="form-control" aria-label="With textarea" name="komentar" rows="6" placeholder="Masukkan Komentar Disini"required></textarea>
						</div>				      				       
    		<div class="form-group">
    			<br><br>
      		<div class="col-sm-offset-2 col-sm-8">
        			<button type="submit" class="btn btn-primary">Kirim</button>
              <br>
      		</div>
    		</div>
        <br>
  	</form>
  </div>
  <br><br><br>
	</center>
	<?php }} ?>
	<center>
	<?php  
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
		if(isset($_GET['allKomentar'])) {
			$komentar = getAllComentar();
			if($komentar==NULL) { ?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-primary">
							<center><h1><i class="fa fa-comments-o"> Tidak Ada Komentar Saat Ini</i></h1></center>
						</div>
					</div>
				</div>
		<?php  } else  {			
	?>		
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary">
					<center><h1><i class="fa fa-comments"> Kelola Komentar</i></h1></center>
				</div>
			</div>
		</div>			
		<table class="table table-striped table-bordered table-hover" >
			<tr>
				<!-- <th>Id komentar</th> -->
				<th>Tanggal</th>
				<th>Nama Pengirim</th>
				<th>Isi komentar</th>
				<th>Tanggapan Admin</th>
				<th colspan="2">Aksi</th>
			</tr>
			<?php foreach($komentar as $data)  {
				echo '<tr>';
				// echo '<td>';
				// echo $data['id_komentar'];
				// echo '</td>';
				echo '<td>';
				echo $data['tanggal_komentar'];
				echo '</td>';
				echo '<td>';
				echo $data['nama'];
				echo '</td>';
				echo '<td>';
				echo $data['isi_komentar'];
				echo '</td>';
				echo '<td>';
				echo $data['tanggapan'];
				echo '</td>';
				if($data['tanggapan'] != NULL) {
				echo '<td>';
				echo "<center>
                  	  <div class='btn-group btn-group-center'>
                      <a class='btn btn-danger' href='function.php?deleteComent=".$data['id_komentar']."'>HAPUS</a>&nbsp;&nbsp;                      
                  </div>
                  </center>";
				echo '</td>';	
				} else {									
				echo '<td>';
				echo "<center>
                  	  <div class='btn-group btn-group-center'>
                      <a class='btn btn-danger' href='function.php?deleteComent=".$data['id_komentar']."'>HAPUS</a>&nbsp;&nbsp;
                      <a class='btn btn-success' href='komentar.php?tanggapiKomentar=".$data['id_komentar']."'>tanggapi</a>
                  </div>
                  </center>";
				echo '</td>';
				}
				echo '</tr>';
			}?>
		</table>
</center>

	<?php }}}?>
	<center>

	<?php if(isset($_GET['tanggapiKomentar'])) { 
		$id_komentar = $_GET['tanggapiKomentar'];
		$kueri = "SELECT * FROM t_komentar WHERE id_komentar = '$id_komentar'";
		$ex = mysqli_query($conn,$kueri);
		$hasils = mysqli_fetch_array($ex);
	?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary">
					<center><h1><i class="fa fa-comment"> Berikan Tanggapan</i></h1></center>
					<!-- <center><i class="fa fa-arrow-down"></i></center> -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success">
					<center><h1><i class="fa fa-arrow-down"></i></h1></center>
				</div>
			</div>
		</div>
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-primary">
							<center><h1><i class="fa fa-hand-o-down"> Komentar User</i></h1></center>
						</div>
					</div>
				</div>
		<form class="form-horizontal">
  		
  		<div class="input-group" style="width: 580px;">
						  <div class="input-group-prepend">    
						  </div>
						  <textarea class="form-control" aria-label="With textarea"rows="6" placeholder="<?php echo $hasils['isi']; ?>"></textarea>
						</div>				      				         		
		</form>	
			</div>

			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-primary">
							<center><h1><i class="fa fa-hand-o-down"> Masukkan Tanggapan Disini</i></h1></center>
						</div>
					</div>
				</div>
				<form class="form-horizontal" action="komentar.php?tanggapKomentar=<?php echo $_GET['tanggapiKomentar']?>" method="post">
  		
  		<div class="input-group" style="width: 580px;">
						  <div class="input-group-prepend">    
						  </div>
						  <textarea class="form-control" aria-label="With textarea" name="tanggapan" rows="6" placeholder="Masukkan Tanggapan Anda Disini"></textarea>
						</div>
						<br>				      				       
  		<div class="form-group"> 
    		<div class="col-sm-offset-2 col-sm-8">
      			<button type="submit" class="btn btn-primary">Kirim</button>
    		</div>
  		</div>
		</form>	
			</div>
		</div>
		</div>
	<?php } ?>	
	</center>
	<?php 
		if((isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1) && (isset($_SESSION['user_biasa']) && $_SESSION['user_biasa'] == 1)) {
		if(isset($_GET['getAllComentar'])) {
			$komentar = getAllComentar();
			if($komentar==NULL) { ?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-primary">
							<center><h1><i class="fa fa-comments-o"> Tidak Ada Komentar Saat Ini</i></h1></center>
						</div>
					</div>
				</div>
		 <?php 	} else  {			
	?>		
		<br>
		<center>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-primary">
					<h1><i class="fa fa-comments"> Semua Komentar</i></h1>
				</div>
			</div>
		</div>					
		<table class="table table-bordered table-hover">
			<thead>
				<th>Id komentar</th>
				<th>Tanggal</th>
				<th>Nama Pengirim</th>
				<th>Isi komentar</th>
				<th>Tanggapan Admin</th>				
			</thead>
			<?php foreach($komentar as $data)  {
				echo '<tr>';
				echo '<td>';
				echo ''.$data['id_komentar'].'';
				echo '</td>';
				echo '<td>';
				echo ''.$data['tanggal_komentar'].'';
				echo '</td>';
				echo '<td>';
				echo ''.$data['nama'].'';
				echo '</td>';
				echo '<td>';
				echo ''.$data['isi_komentar'].'';
				echo '</td>';
				echo '<td>';
				echo ''.$data['tanggapan'].'';
				echo '</td>';				
				echo '</tr>';
			}?>
		</table>		
		
		</center>
	<?php }?>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php }} ?>
	
	</div>
</body>
</html>