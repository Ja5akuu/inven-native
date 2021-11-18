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
<h4 style="margin:0px 0px 0px 0px; font-weight:bold"><b>LAPORAN DETAIL PENERIMAAN</b></h4>
<h4 style="margin:0px 0px 0px 0px">PERIODE : <?php echo IndonesiaTgl($_GET['awal'])?> S/D <?php echo IndonesiaTgl($_GET['akhir'])?></h4>
</div>
<br>
<table width="100%" border="1" style="border-spacing:0; border-collapse: collapse; padding: 1mm;">
	<tr>
		<th width="2%"><div align="center">NO</div></th>
        <th width="5%"><div align="center">TANGGAL</div></th>
        <th width="5%"><div align="center">NOMOR</div></th>
		<th width="5%"><div align="center">KODE</div></th>
		<th width="35%">NAMA BARANG</th>
	  	<th width="15%">PRINCIPAL</th>
		<th width="10%">MERK</th>
		<th width="10%">TYPE</th>
		<th width="5%"><div align="right">JUMLAH</div></th>
	</tr>
	<?php
		
		$tglAwal		= $_GET['awal'];
		$tglAkhir		= $_GET['akhir'];	
		$dataPrincipal	= $_GET['princ'];		
		$dataSql 		= mysqli_query($koneksi,"SELECT * FROM tr_in_item a 
										INNER JOIN tr_in b ON a.kode_in = b.kode_in
										INNER JOIN ms_barang c ON a.id_barang = c.id_barang
										LEFT JOIN ms_merk e ON c.kode_merk = e.kode_merk
										LEFT JOIN ms_type f ON c.kode_type = f.kode_type 
										WHERE date(b.tgl_in) BETWEEN '$tglAwal' AND '$tglAkhir' 
										AND b.principal LIKE '$dataPrincipal'
										ORDER BY b.tgl_in DESC");
		$nomor  		= 0;
		$jumlah			= 0;
		$subtotal		= 0;
		while($dataRow	= mysqli_fetch_array($dataSql)){	
			$nomor ++;
			$jumlah 	= $jumlah + $dataRow ['jumlah_in'];
	?>
	<tr>
		<td><div align="center"><?php echo $nomor;?></div></td>
		<td><div align="center"><?php echo indonesiaTgl($dataRow ['tgl_in']); ?> </div></td>
		<td><div align="center"><?php echo $dataRow ['kode_in']; ?></div></td>
		<td><div align="center"><?php echo $dataRow ['kode_barang']; ?></div></td>
		<td><?php echo $dataRow ['nama_barang']; ?></td>
		<td><?php echo $dataRow ['principal_barang']; ?></td>
		<td><?php echo $dataRow ['nama_merk']; ?></td>
		<td><?php echo $dataRow ['nama_type']; ?></td>
		<td><div align="right"><?php echo number_format($dataRow ['jumlah_in'],2); ?></div></td>
	</tr>
	<?php } ?>
	<tr>
        <th colspan="8"><div align="right">GRAND TOTAL : </div></th>
		<th width="8%"><div align="right"><?php echo number_format($jumlah,2) ?></div></th>
    </tr>
</table>
</body>