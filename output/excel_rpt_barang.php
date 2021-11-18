<?php
    session_start();
    include_once "../config/inc.connection.php";
    include_once "../config/inc.library.php";
    
    header("Content-type: application/vnd.ms-excel; charset=UTF-8" );
    header("Content-Disposition: attachment; filename=Stock_Report_".date('ymd').".xls"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 
    header('Content-Transfer-Encoding: binary');

    ob_end_flush();
  
    
?>
<table width="100%">
  <tr>
    <td colspan="7" align="center"><h3><u>LAPORAN STOK BARANG</u></h3></td>
  </tr>
  <tr>
    <td colspan="7" align="center" valign="top"></td>
  </tr>
</table>

<table width="100%" border="1">
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
										
	$dataSql = mysqli_query($koneksi,"SELECT * FROM ms_barang a
							LEFT JOIN ms_merk c ON a.kode_merk=c.kode_merk
							LEFT JOIN ms_type d ON a.kode_type=d.kode_type
							WHERE a.principal_barang LIKE '$dataPrincipal'
							AND c.kode_merk LIKE '$dataMerk'
							ORDER BY a.kode_barang ASC");
	
	$nomor  		= 0;
	$jumlahStok		= 0;
	while($dataRow	= mysqli_fetch_array($dataSql)){
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
