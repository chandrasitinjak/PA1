	<?php
	require('cetak/fpdf.php');
	ob_end_clean(); //    the buffer and never prints or returns anything.
	ob_start(); // it starts buffering
	$pdf = new FPDF();	
	$pdf->AddPage();	
	$pdf->SetFont('Arial','B',16);	
	$pdf->Cell(190,7,'BUKTI TRANSAKSI DALLAS FRIED CHICKEN',0,1,'C');
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,7,'DAFTAR PEMBELIAN',0,1,'C');
	 
	// Memberikan space kebawah agar tidak terlalu rapat
	$pdf->Cell(10,7,'',0,1);
	 
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(40,6,'Nama Produk',1,0);
	$pdf->Cell(40,6,'Harga Produk',1,0);
	$pdf->Cell(35,6,'Jumlah Pesanan',1,0);
	$pdf->Cell(35,6,'Total Harga',1,0);
	$pdf->Cell(35,6,'Status',1,1);
	 
	$pdf->SetFont('Arial','',10);
	 
	
	session_start();
	global $conn;
	$conn = new mysqli("localhost","root","","db_pa1") or die("Error connection to database");
	$id_user = $_SESSION['id'];
	$nama_user = $_SESSION['nama'];
	$id = $_GET['id_transaksi'];

	$cetak = mysqli_query($conn, "SELECT * FROM t_items WHERE id_transaksi = '$id' && id_user = '$id_user' AND status = 'Accepted'");
	while ($row = $cetak->fetch_assoc()){

		$id_produk = $row['id_produk'];
		$kueri2 = "SELECT * FROM t_produk WHERE id_produk = '$id_produk'";
		$exe2 = mysqli_query($conn,$kueri2);
		$hasil2 = mysqli_fetch_array($exe2);

	    $pdf->Cell(40,6,$hasil2['nama_prod'],1,0);	
	    $pdf->Cell(40,6,$hasil2['harga'],1,0);
	    $pdf->Cell(35,6,$row['jumlah'],1,0);
	    $pdf->Cell(35,6,$row['total_harga'],1,0); 
	    $pdf->Cell(35,6,$row['status'],1,1);
	}
	 
	$pdf->Cell(10,7,'',0,1);
	$pdf->Cell(10,7,'',0,1);
	$pdf->Cell(190,7,$nama_user,0,1,'C');
	$pdf->Cell(190,7,'Terima Kasih sudah berbelanja sudah di Dallas Fried Chicken',0,1,'C');
	$pdf->Output();
	ob_end_flush();
?>