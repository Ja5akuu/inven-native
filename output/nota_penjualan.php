<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="../assets/css/metro.css" rel="stylesheet" />
<link href="../assets/css/style.css" rel="stylesheet" />
<body OnLoad="window.print()" OnFocus="window.close()">
<?php
	include "../config/inc.connection.php";
	include "../config/inc.library.php";
				
	$kodeTransaksi = $_GET['id'];				
	$beliSql = "SELECT * FROM tr_penjualan a
				LEFT JOIN ms_customer b ON a.kode_customer=b.kode_customer
				INNER JOIN ms_user c ON a.kode_user=c.kode_user
				AND a.kode_penjualan='$kodeTransaksi'";
	$beliQry = mysqli_query($koneksi,$beliSql)  or die ("Query pembelian salah : ".mysqli_error());
	$beliRow = mysqli_fetch_array($beliQry);
	
	$tokoSql = "SELECT * FROM ms_toko ";
	$tokoQry = mysqli_query($koneksi,$tokoSql)  or die ("Query toko salah : ".mysqli_error());
	$tokoRow = mysqli_fetch_array($tokoQry);
?>
<div align="center">
<h4 style="margin-bottom:0px; font-weight: bold;"><?php echo strtoupper($tokoRow['nama_toko']) ?></h4>
<small style="margin-top:0px"><?php echo $tokoRow['alamat_toko'] ?>, Telp: <?php echo $tokoRow['telp_toko'] ?>, Email: <?php echo $tokoRow['email_toko'] ?></small> 
<div style="border-bottom:1px dashed #000;"></div>
<b style="margin-top:0px; text-decoration:underline">NOTA PENJUALAN</b><br>
</div>
 <table style="font-size: 11px">
  <tr>
    <td width="4%">Nomor</td>
    <td width="96%">: <span style="margin-top:0px"><?php echo $beliRow['kode_penjualan'] ?></span></td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>: <span style="margin-top:0px"><?php echo $beliRow['tgl_penjualan'] ?></span></td>
  </tr>
  <tr>
    <td>Kasir</td>
    <td>: <span style="margin-top:0px"><?php echo $beliRow['nama_user'] ?></span></td>
  </tr>
  <tr>
    <td colspan="2"><div style="border-bottom:1px dashed #000;"></div></td>
  </tr>
</table>
<table width="100%" style="font-size: 11px">
<?php
	$listBarangSql = "SELECT * FROM tr_penjualan_item a
						LEFT JOIN tr_penjualan b ON a.kode_penjualan=b.kode_penjualan 
						INNER JOIN ms_barang c ON a.kode_barang=c.kode_barang
						WHERE a.kode_penjualan='$kodeTransaksi'
						ORDER BY c.kode_barang ASC";
	$listBarangQry = mysqli_query($koneksi,$listBarangSql)  or die ("Query list barang salah : ".mysqli_error());
	$total 	= 0; 
	$qtyBrg = 0; 
	$qtyPPN	= 0;
	while ($listBarangRow = mysqli_fetch_array($listBarangQry)) {
	$subSotal 	= $listBarangRow['jumlah_penjualan'] * intval($listBarangRow['harga_penjualan']);
	$total 		= $total + $subSotal;
	$qtyBrg 	= $qtyBrg + $listBarangRow['jumlah_penjualan'];
?>
  <tr>
    <td width="2%"><div align="center"><?php echo format_angka($listBarangRow['jumlah_penjualan']); ?></div></td>
    <td width="98%"><div align="left"><?php echo $listBarangRow['nama_barang']; ?></div></td>
	<td width="98%"><div align="left"><?php echo format_angka($listBarangRow['harga_penjualan']); ?></div></td>
	<td><div align="right"><?php echo format_angka($subSotal); ?></div></td>
  </tr>
  <?php } ?>
</table>
<div style="border-bottom:1px dashed #000;"></div>
<table width="100%" border="0" style="font-size: 11px">
  <tr>
    <td width="60%"><div align="right">Total  </div></td>
    <td width="1%">:</td>
    <td width="39%"><div align="right"><?php echo number_format($total); ?></div></td>
  </tr>
  <tr>
    <td><div align="right">Bayar </div></td>
    <td>:</td>
    <td><div align="right"><?php echo number_format($beliRow['nominal_pembayaran']); ?></div></td>
  </tr>
  <tr>
    <td><div align="right">Kembali </div></td>
    <td>:</td>
    <td><div align="right"><?php echo number_format(($beliRow['nominal_pembayaran']) - ($total)); ?></div></td>
  </tr>
</table>
<div style="border-bottom:1px dashed #000;"></div>
<div align="center" style="margin-top:20px">
<b>TERIMA KASIH</b><br>
<?php echo $tokoRow['keterangan_toko'] ?>
</div>
</body>



