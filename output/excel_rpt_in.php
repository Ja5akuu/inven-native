<?php
    session_start();
    include_once "../config/inc.connection.php";
    include_once "../config/inc.library.php";
    
    header("Content-type: application/vnd.ms-excel; charset=UTF-8" );
    header("Content-Disposition: attachment; filename=Report_Penerimaan_".date('ymd').".xls"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 
    header('Content-Transfer-Encoding: binary');

    ob_end_flush();
  
    
?>
<table width="100%">
  <tr>
    <td colspan="9" align="center"><h3><u>LAPORAN PENERIMAAN BARANG</u></h3></td>
  </tr>
  <tr>
    <td colspan="9" align="center" valign="top"></td>
  </tr>
</table>
<table width="100%" border="1">
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
		$dataSql 		= mysql_query("SELECT * FROM tr_in_item a 
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
		while($dataRow	= mysql_fetch_array($dataSql)){	
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
