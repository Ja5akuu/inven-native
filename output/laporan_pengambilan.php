<link href="../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<body OnLoad="window.print()" OnFocus="window.close()">

<?php
	include_once "../config/inc.connection.php";
	include_once "../config/inc.library.php";
	
	$tokoSql = "SELECT * FROM ms_toko ";
	$tokoQry = mysqli_query($koneksi,$tokoSql)  or die ("Query toko salah : ".mysqli_error());
	$tokoRow = mysqli_fetch_array($tokoQry);	
	
?>
<div align="center" style="margin-bottom:15px">
<h3 style="margin:0px 0px 0px 0px; font-weight:bold"><strong><?php echo $tokoRow['nama_toko']; ?></strong></h3>
<h4 style="margin:0px 0px 0px 0px"><?php echo $tokoRow['alamat_toko'] ?>, Telp: <?php echo $tokoRow['telp_toko'] ?>, Email: <?php echo $tokoRow['email_toko'] ?></h4>
<h4 style="margin:0px 0px 0px 0px; font-weight:bold"><b>LAPORAN PENGAMBILAN CUCIAN</b></h4>
<h4 style="margin:0px 0px 0px 0px">PERIODE : <?php echo IndonesiaTgl($_GET['awal'])?> S/D <?php echo IndonesiaTgl($_GET['akhir'])?></h4>
</div>
<br>
<table width="100%" border="1" style="border-spacing:0; border-collapse: collapse; padding: 1mm;">
	<tr>
	  	<th width="3%"><div align="center">NO</div></th>
        <th width="10%"><div align="center">TGL. TRANSAKSI</div></th>
        <th width="9%"><div align="center">NO. TRANSAKSI</div></th>
		<th width="10%"><div align="center">NO. PENCUCIAN</div></th>
		<th width="20%">NAMA CUSTOMER</th>
		<th width="10%">TELP</th>
		<th width="40%">ALAMAT</th>
	</tr>
	<?php
	$tglAwal		= $_GET['awal'];
	$tglAkhir		= $_GET['akhir'];
											
	$dataSql 		= mysqli_query($koneksi,"SELECT * FROM tr_pengambilan a 
									INNER JOIN tr_pencucian b ON a.kode_pencucian=b.kode_pencucian
									WHERE date(a.tgl_pengambilan) BETWEEN '$tglAwal' AND '$tglAkhir' 
									GROUP BY a.kode_pencucian
									ORDER BY a.tgl_pengambilan DESC");
	$nomor  				= 0;
	while($dataRow			= mysqli_fetch_array($dataSql)){	
		$nomor ++;
	?>
	<tr>
		<td><div align="center"><?php echo $nomor;?></div></td>
		<td><div align="center"><?php echo indonesiaTgl($dataRow ['tgl_pengambilan']); ?> </div></td>
		<td><div align="center"><?php echo $dataRow ['kode_pengambilan']; ?></div></td>
		<td><div align="center"><?php echo $dataRow ['kode_pencucian']; ?></div></td>
		<td><?php echo $dataRow ['nama_customer']; ?></td>
		<td><?php echo $dataRow ['telp_customer']; ?></td>
		<td><?php echo $dataRow ['alamat_customer']; ?></td>
	</tr>
	<?php } ?>
</table>
