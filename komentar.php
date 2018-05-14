<!DOCTYPE html>
<html>
<head>
	<title>Komentar</title>
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
	<?php  if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1 && $_SESSION['admin'] != 1) {
	 if(isset($_GET['buatKomentari'])) {
	?>
	<br><br>
	<center><h2>Buat Komentar</h2>
		<p>Tentang Dallas Fried Chicken</p>
	<form class="form-horizontal" action="komentar.php?buatKomentar=<?php echo $_SESSION['id']?>" method="post">
  		<div class="form-group">
    		<label class="control-label col-sm-4"></label>
    			<div class="col-sm-4">
      				<textarea class="form-control" name="komentar" rows="5" id="comment"></textarea>
    			</div>
  		</div>
  		<div class="form-group"> 
    		<div class="col-sm-offset-2 col-sm-8">
      			<button type="submit" class="btn btn-primary">Kirim</button>
    		</div>
  		</div>
	</form>
	</center>
	<?php }} ?>
	<center>
	<?php  
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
		if(isset($_GET['allKomentar'])) {
			$komentar = getAllComentar();
			if($komentar==NULL) {
				echo '<br><br><h3>tidak ada komentar saat ini!</h3>';
			}
			else  {			
	?>
		<br><br>
		<h1>Kelola Komentar</h1><br>	
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>Id komentar</th>
				<th>Tanggal</th>
				<th>Nama Pengirim</th>
				<th>Isi komentar</th>
				<th>Tanggapan Admin</th>
				<th colspan="2">Aksi</th>
			</tr>
			<?php foreach($komentar as $data)  {
				echo '<tr>';
				echo '<td>';
				echo $data['id_komentar'];
				echo '</td>';
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
				echo '<td colspan="2">';
				echo "<center>
                  	  <div class='btn-group btn-group-center'>
                      <a class='btn btn-danger' href='function.php?deleteComent=".$data['id_komentar']."'>HAPUS</a>&nbsp;&nbsp;
                      <a class='btn btn-success' href='komentar.php?tanggapiKomentar=".$data['id_komentar']."'>tanggapi</a>
                  </div>
                  </center>";
				echo '</td>';
				echo '</tr>';
			}?>
		</table>
</center>
	<?php }}}?>
	<center>

	<?php if(isset($_GET['tanggapiKomentar'])) { ?>
		<br><br>
		<h3>Tanggapi komentar!</h3>
		<form class="form-horizontal" action="komentar.php?tanggapKomentar=<?php echo $_GET['tanggapiKomentar']?>" method="post">
  		<div class="form-group">
    		<label class="control-label col-sm-4"></label>
    			<div class="col-sm-4">
      				<textarea class="form-control" name="tanggapan" rows="5" id="comment"></textarea>
    			</div>
  		</div>
  		<div class="form-group"> 
    		<div class="col-sm-offset-2 col-sm-8">
      			<button type="submit" class="btn btn-primary">Kirim</button>
    		</div>
  		</div>
		</form>
	<?php } ?>	
	</center>
	<?php 
		if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == 1 && $_SESSION['admin']!=1) {
		if(isset($_GET['getAllComentar'])) {
			$komentar = getAllComentar();
			if($komentar==NULL) {
				echo '<br><br><h3>tidak ada komentar saat ini!</h3>';
			}
			else  {			
	?>
		<br><br>
		<h1>Semua Komentar</h1><br>	
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>Id komentar</th>
				<th>Tanggal</th>
				<th>Nama Pengirim</th>
				<th>Isi komentar</th>
				<th>Tanggapan Admin</th>				
			</tr>
			<?php foreach($komentar as $data)  {
				echo '<tr>';
				echo '<td>';
				echo $data['id_komentar'];
				echo '</td>';
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
				echo '</tr>';
			}?>
		</table>

	<?php }}} ?>
	</div>
</body>
</html>