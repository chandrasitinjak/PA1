<?php
	include_once "function.php";
		
	if($_GET['vote']==1){
		$vote = 'suka';
	}
	else if($_GET['vote']==0){
		$vote = 'tidak suka';
	}
	$id_produk = $_GET['id'];
	$id_user = $_SESSION['id'];



	$query = $conn->query("INSERT INTO t_rating(id_produk,id_user,keterangan) VALUES('$id_produk','$id_user','$vote')");
	$qsuka = $conn->query("SELECT count(id_rating) AS jlh FROM t_rating WHERE id_produk = $id_produk AND keterangan LIKE 'suka'");
	$qtaksuka = $conn->query("SELECT count(id_rating) AS jlh FROM t_rating WHERE id_produk = $id_produk AND keterangan LIKE 'tidak suka'");
	$suka = $qsuka->fetch_assoc();
	$yes = $suka['jlh'];
	$tidak = $qtaksuka->fetch_assoc();
	$no = $tidak['jlh'];
?>                  
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
                

              