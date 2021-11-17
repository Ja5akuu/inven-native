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
<h4 style="margin:0px 0px 0px 0px; font-weight:bold"><b>LAPORAN STOK BARANG</b></h4>
<h4 style="margin:0px 0px 0px 0px">PERIODE : <?php echo date('d-m-Y H:i:s');?></h4>
</div>
<br>
<table width="100%" border="1" style="border-spacing:0; border-collapse: collapse; padding: 1mm;">
	<tr>
		<th width="2%"><div align="center">NO</div></th>
        <th width="8%"><div align="center">KODE BARANG</div></th>
        <th width="35%"><div align="left">NAMA BARANG</div></th>
		<th width="15%">PRINCIPAL</th>
		<th width="15%">MERK</th>
		<th width="25%">TYPE</th>
      	<th width="13%"><div align="center">STOK</div></th>
	</tr>
	<?php
	
	$dataPrincipal	= $_GET['princ'];
	$dataMerk		= $_GET['merk'];
										
	$dataSql = mysql_query("SELECT * FROM ms_barang a
							LEFT JOIN ms_merk c ON a.kode_merk=c.kode_merk
							LEFT JOIN ms_type d ON a.kode_type=d.kode_type
							WHERE a.principal_barang LIKE '$dataPrincipal'
							AND c.kode_merk LIKE '$dataMerk'
							ORDER BY a.kode_barang ASC");
	
	$nomor  		= 0;
	$jumlahStok		= 0;
	while($dataRow	= mysql_fetch_array($dataSql)){
		$nomor ++;
		$jumlahStok	= $jumlahStok + $dataRow['stok_barang'];
		
	?>
	<tr>
        <td><div align="center"><?php echo $nomor;?></div></td>
		<td><div align="center"><?php echo $dataRow['kode_barang']; ?></div></td>
		<td><div align="left"><?php echo $dataRow['nama_barang']; ?></div></td>
		<td><?php echo $dataRow['principal_barang']; ?></td>
		<td><?php echo $dataRow['nama_merk']; ?></td>
		<td><?php echo $dataRow['nama_type']; ?></td>
        <td><div align="center"><?php echo number_format($dataRow['stok_barang']); ?></div></td>
    </tr>
    <?php } ?>
    <tr>
	  	<th colspan="6"><div align="right">SUBTOTAL : </div></th>
		<th width="8%"><div align="center"><?php echo number_format($jumlahStok); ?></div></th>
    </tr>
</table>
</body>
