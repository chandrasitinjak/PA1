	<?php
	require('cetak/fpdf.php');
	ob_end_clean(); //    the buffer and never prints or returns anything.
	ob_start(); // it starts buffering
	$pdf = new FPDF();	
	$pdf->AddPage();	
	$pdf->SetFont('Arial','B',16);	
	$pdf->Cell(190,7,'Pemasukan Keuangan',0,1,'C');
	$pdf->SetFont('Arial','B',12);	
	 
	// Memberikan space kebawah agar tidak terlalu rapat
	$pdf->Cell(10,7,'',0,1);
	 
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(45,6,'Tanggal Transaksi',1,0);
	$pdf->Cell(45,6,'Pemasukan',1,1);

	 
	$pdf->SetFont('Arial','',10);
	 
	
	session_start();
	global $conn;
	$conn = new mysqli("localhost","root","","db_pa1") or die("Error connection to database");
	
	

	$cetak = mysqli_query($conn, "SELECT *
					 FROM t_items,t_transaksi WHERE t_items.id_transaksi = t_transaksi.id_transaksi AND t_items.status = 'Accepted' && t_transaksi.status = 'Accepted'");
	$sum = 0;
	while ($row = $cetak->fetch_assoc()){

		// $id_produk = $row['id_produk'];
		// $kueri2 = "SELECT * FROM t_produk WHERE id_produk = '$id_produk'";
		// $exe2 = mysqli_query($conn,$kueri2);
		// $hasil2 = mysqli_fetch_array($exe2);

	    $pdf->Cell(40,6,$row['tanggal_transaksi'],1,0);	
	    $pdf->Cell(40,6,$row['total_harga'],1,1);
	    // $pdf->Cell(35,6,$row['jumlah'],1,0);
	    // $pdf->Cell(35,6,$row['total_harga'],1,0); 
	    // $pdf->Cell(35,6,$row['status'],1,1);
	    $sum += $row['total_harga'];
	}
	
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(40,6,'Total Pemasukan',1,0);

	$pdf->Cell(40,6,$sum,1,0);	

	// $pdf->Cell(10,7,'',0,1);
	// $pdf->Cell(10,7,'',0,1);
	// $pdf->Cell(190,7,$nama_user,0,1,'C');
	// $pdf->Cell(190,7,'Terima Kasih sudah berbelanja sudah di Dallas Fried Chicken',0,1,'C');
	$pdf->Output();
	ob_end_flush();
?>