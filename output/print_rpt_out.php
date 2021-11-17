<link href="../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<body OnLoad="window.print()" OnFocus="window.close()">
<?php
	include_once "../config/inc.connection.php";
	include_once "../config/inc.library.php";
	
	$tokoSql = "SELECT * FROM ms_toko ";
	$tokoQry = mysql_query($tokoSql, $koneksidb)  or die ("Query toko salah : ".mysql_error());
	$tokoRow = mysql_fetch_array($tokoQry);	
	
?>
<div align="center" style="margin-bottom:15px">
<h3 style="margin:0px 0px 0px 0px; font-weight:bold"><strong><?php echo $tokoRow['nama_toko']; ?></strong></h3>
<h4 style="margin:0px 0px 0px 0px"><?php echo $tokoRow['alamat_toko'] ?>, Telp: <?php echo $tokoRow['telp_toko'] ?>, Email: <?php echo $tokoRow['email_toko'] ?></h4>
<h4 style="margin:0px 0px 0px 0px; font-weight:bold"><b>LAPORAN PENGELUARAN</b></h4>
<h4 style="margin:0px 0px 0px 0px">PERIODE : <?php echo IndonesiaTgl($_GET['awal'])?> S/D <?php echo IndonesiaTgl($_GET['akhir'])?></h4>
</div>
<br>
<table width="100%" border="1" style="border-spacing:0; border-collapse: collapse; padding: 1mm;">
	<tr class="active">
        <th width="2%"><div align="center">NO</div></th>
        <th width="5%"><div align="center">TANGGAL</div></th>
        <th width="5%"><div align="center">NOMOR</div></th>
	  	<th width="10%">PRINCIPAL</th>
	  	<th width="10%">MERK</th>
	  	<th width="10%">TYPE</th>
		<th width="5%"><div align="center">SERIAL NUMBER</div></th>
		<th style="width: 60%">NAMA BARANG</th>
	  	<th width="10%">NAMA PELANGGAN</th>
		<th width="10%">LAYANAN</th>
		<th width="10%">ID ATM</th>
		<th width="10%">NAMA ATM</th>
		<th width="10%">LOKASI</th>
		<th width="10%">LAINNYA</th>
		<th width="10%">CATATAN</th>
		<th width="5%"><div align="center">JUMLAH</div></th>
    </tr>
	<?php
		
		$tglAwal		= $_GET['awal'];
		$tglAkhir		= $_GET['akhir'];	
		$dataCustomer	= $_GET['cus'];	
		$dataPrincipal	= $_GET['princ'];	
		$dataSql 		= mysql_query("SELECT * FROM tr_out_item a
										INNER JOIN tr_out b ON a.kode_out=b.kode_out
										LEFT JOIN ms_user c ON b.kode_user=c.kode_user
										LEFT JOIN ms_customer d ON d.kode_customer=b.kode_customer
										LEFT JOIN ms_layanan e ON b.kode_layanan=e.kode_layanan
										LEFT JOIN ms_atm f ON b.id_atm=f.id_atm
										LEFT JOIN ms_barang g ON a.id_barang=g.id_barang
										LEFT JOIN ms_merk i ON g.kode_merk=i.kode_merk
										LEFT JOIN ms_type j ON g.kode_type=j.kode_type
										WHERE date(b.tgl_out) BETWEEN '$tglAwal' AND '$tglAkhir' 
										AND b.kode_customer LIKE '$dataCustomer'
										AND b.principal LIKE '$dataPrincipal'
										ORDER BY b.tgl_out DESC");
		$nomor  		= 0;
		while($dataRow	= mysql_fetch_array($dataSql)){	
			$nomor ++;
	?>
	<tr>
        <td><div align="center"><?php echo $nomor;?></div></td>
		<td><div align="center"><?php echo date("d/m/Y", strtotime($dataRow['tgl_out'])); ?></div></td>
		<td><div align="center"><?php echo $dataRow ['kode_out']; ?></div></td>
		<td><?php echo $dataRow ['principal_barang']; ?></td>
		<td><?php echo $dataRow ['nama_merk']; ?></td>
		<td><?php echo $dataRow ['nama_type']; ?></td>
		<td><div align="center"><?php echo $dataRow ['kode_barang']; ?></div></td>
		<td><?php echo $dataRow ['nama_barang']; ?></td>
		<td><?php echo $dataRow ['nama_customer']; ?></td>
		<td><?php echo $dataRow ['nama_layanan']; ?></td>
		<td><?php echo $dataRow ['kode_atm']; ?></td>
		<td><?php echo $dataRow ['nama_atm']; ?></td>
		<td><?php echo $dataRow ['lokasi_pengerjaan']; ?></td>
		<td><?php echo $dataRow ['lokasi_lainnya']; ?></td>
		<td><?php echo $dataRow ['keterangan']; ?></td>
		<td><div align="center"><?php echo $dataRow ['jumlah_out']; ?></div></td>
    </tr>
	<?php } ?>
</table>
