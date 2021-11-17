<link href="../assets/global/css/components-rounded.css" rel="stylesheet" id="style_components" type="text/css" />
<body OnLoad="window.print()" OnFocus="window.close()">
<?php
	include "../config/inc.connection.php";
	include "../config/inc.library.php";
				
	$kodeTransaksi = $_GET['id'];
				
	$beliSql = "SELECT * FROM tr_pencucian a
				INNER JOIN ms_user b ON a.kode_user=b.kode_user
				AND a.kode_pencucian='$kodeTransaksi'";
	$beliQry = mysql_query($beliSql, $koneksidb)  or die ("Query pendaftaran salah : ".mysql_error());
	$beliRow = mysql_fetch_array($beliQry);
	
	$tokoSql = "SELECT * FROM ms_toko ";
	$tokoQry = mysql_query($tokoSql, $koneksidb)  or die ("Query toko salah : ".mysql_error());
	$tokoRow = mysql_fetch_array($tokoQry);
?>
<div align="center">
<h4 style="margin-bottom:0px; font-weight: bold;"><?php echo strtoupper($tokoRow['nama_toko']) ?></h4>
<small style="margin-top:0px"><?php echo $tokoRow['alamat_toko'] ?>, Telp: <?php echo $tokoRow['telp_toko'] ?>, Email: <?php echo $tokoRow['email_toko'] ?></small>	
<div style="border-bottom:1px dashed #000;"></div>
<b style="margin-top:0px; text-decoration:underline">NOTA PENCUCIAN</b><br>
</div>
 <table style="font-size: 11px">
  <tr>
    <td width="4%">Nomor</td>
    <td width="96%">: <span style="margin-top:0px"><?php echo $beliRow['kode_pencucian'] ?></span></td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>: <span style="margin-top:0px"><?php echo IndonesiaTgl($beliRow['tgl_pencucian']) ?></span></td>
  </tr>
  <tr>
    <td>Diambil</td>
    <td>: <span style="margin-top:0px"><?php echo IndonesiaTgl($beliRow['tgl_selesai']) ?></span></td>
  </tr>
  <tr>
    <td width="4%">Customer</td>
    <td width="96%">: <span style="margin-top:0px"><?php echo $beliRow['nama_customer'] ?></span></td>
  </tr>
  <tr>
    <td colspan="2"><div style="border-bottom:1px dashed #000;"></div></td>
  </tr>
</table>
<table width="100%" style="font-size: 11px">
  
  <?php
		$listBarangSql = "SELECT 
							a.harga_jasa,
							a.kode_pencucian,
							b.nama_jasa,
							b.kode_jasa,
							a.jumlah_pencucian
							FROM tr_pencucian_item a
							INNER JOIN ms_jasa b ON a.kode_jasa=b.kode_jasa 
							WHERE a.kode_pencucian='$kodeTransaksi'";
		$listBarangQry = mysql_query($listBarangSql, $koneksidb)  or die ("Query list barang salah : ".mysql_error());
		$total 	= 0; 
		$qtyBrg = 0; 
		$itm	= 0;
		while ($listBarangRow = mysql_fetch_array($listBarangQry)) {
		$subSotal 	= $listBarangRow['jumlah_pencucian'] * intval($listBarangRow['harga_jasa']);
		$total 		= $total + $subSotal;
		$qtyBrg 	= $qtyBrg + $listBarangRow['jumlah_pencucian'];	
		$itm	 	= $itm + $listBarangRow['jumlah_pencucian'];	
	?>
  <tr>
    <td width="2%"><div align="center"><?php echo $listBarangRow['jumlah_pencucian']; ?></div></td>
    <td width="98%"><div align="left"><?php echo $listBarangRow['nama_jasa']; ?></div></td>
	<td width="98%"><div align="left"><?php echo format_angka($listBarangRow['harga_jasa']); ?></div></td>
	<td><div align="right"><?php echo format_angka($subSotal); ?></div></td>
  </tr>
  <?php } ?>
</table>
<div style="border-bottom:1px dashed #000;"></div>
<table width="100%" border="0" style="font-size: 11px">
  <tr>
    <td><div align="right">Grand Total </div></td>
    <td>:</td>
    <td><div align="right"><?php echo format_angka($total); ?></div></td>
  </tr>
  <?php 
  		$sqlBayar		= "SELECT * FROM tr_pembayaran WHERE kode_pencucian='$kodeTransaksi'";
  		$qryBayar 		= mysql_query($sqlBayar, $koneksidb);
  		$byrJumlah		= mysql_num_rows($qryBayar);
  		$dataBayar 		= mysql_fetch_assoc($qryBayar);

  		if ($byrJumlah>=1) {
  			# code...
  		
  ?>
  <tr>
    <td width="60%"><div align="right">Pembayaran  </div></td>
    <td width="1%">:</td>
    <td width="39%"><div align="right"><?php echo format_angka($dataBayar['total_bayar']); ?></div></td>
  </tr>
  <tr>
    <td><div align="right">Potongan </div></td>
    <td>:</td>
    <td><div align="right"><?php echo format_angka($dataBayar['potongan_pembayaran']); ?></div></td>
  </tr>
  <tr>
    <td><div align="right">Kembalian </div></td>
    <td>:</td>
    <td><div align="right"><?php echo format_angka($dataBayar['total_bayar']-($total-$dataBayar['potongan_pembayaran'])); ?></div></td>
  </tr>
  <?php } ?>
</table>
<div style="border-bottom:1px dashed #000;"></div>
<div align="center" style="margin-top:20px">
<b>TERIMA KASIH</b><br>
<?php echo $tokoRow['keterangan_toko'] ?>
</div>



