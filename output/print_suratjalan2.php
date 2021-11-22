<link href="../assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<body OnLoad="window.print()" OnFocus="window.close()">
<?php
	include_once "../config/inc.connection.php";
	include_once "../config/inc.library.php";
	$Kode	= $_GET['Kode'];
	$tokoSql = "SELECT * FROM tr_out a
				INNER JOIN ms_user b ON a.kode_teknisi=b.kode_user
				INNER JOIN ms_layanan c ON a.kode_layanan=c.kode_layanan
				INNER JOIN ms_customer d ON a.kode_customer=d.kode_customer
				AND a.kode_out='".$Kode."'";
	$tokoQry = mysqli_query($koneksi,$tokoSql)  or die ("Query toko salah : ".mysqli_error());
	$tokoRow = mysqli_fetch_array($tokoQry);	
	
?>

<table>
	<tr>
		<td colspan="2">Jakarta, <?php echo IndonesiaTgl($tokoRow['tgl_out']); ?></td>
	</tr>
	<tr>
		<td colspan="2"><br></td>
	</tr>
	<tr>
		<td>Kepada :</td>
		<td><?php echo $tokoRow['nama_customer'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $tokoRow['alamat_customer'] ?></td>
	</tr>
	<tr>
		<td>Telepon :</td>
		<td><?php echo $tokoRow['telp_customer'] ?></td>
	</tr>
	<tr>
		<td>Pengirim :</td>
		<td><?php echo $tokoRow['nama_layanan'] ?></td>
	</tr>
	<tr>
		<td>PIC :</td>
		<td><?php echo $tokoRow['nama_layanan'] ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $tokoRow['lokasi_pengerjaan'] ?></td>
	</tr>
	<tr>
		<td>Telepon :</td>
		<td><?php echo $tokoRow['telp_customer'] ?></td>
	</tr>
</table>
<br>
<br>
<table>
	<tr>
		<td>SJ<?php echo substr(IndonesiaTgl($tokoRow['tgl_out']),0,2)?>/<?php echo substr(IndonesiaTgl($tokoRow['tgl_out']),3,2)?>/PTM/...../...../<?php echo substr(IndonesiaTgl($tokoRow['tgl_out']),6,4)?></td>
	</tr>
	<tr>
		<td style="font-size: 12px;">Packing List Pengiriman Barang <?php echo $tokoRow['nama_customer'] ?></td>
	</tr>
</table>

<br>
<table width="100%" border="1" style="border-spacing:0; border-collapse: collapse; padding: 1mm;">
	<tr>
		<th width="2%"><div align="center">NO</div></th>
        <th width="8%"><div align="center">KODE BARANG</div></th>
        <th width="40%"><div align="left">NAMA BARANG</div></th>
        <th width="8%"><div align="left">JUMLAH</div></th>
		<th width="8%">SATUAN</th>
	</tr>
	<?php
	
	$Kode	= $_GET['Kode'];
								$listBarangSql = "SELECT * FROM tr_out_item a
													INNER JOIN ms_barang b ON a.id_barang=b.id_barang 
													LEFT JOIN ms_merk c ON b.kode_merk=c.kode_merk
													LEFT JOIN ms_type d ON b.kode_type=d.kode_type
												  	WHERE a.kode_out='$Kode'
												  ORDER BY a.id_barang ASC";
								$listBarangQry = mysqli_query($koneksi,$listBarangSql)  or die ("Query list barang salah : ".mysqli_error());
								
								$nomor	= 0;
								while ($listBarangRow = mysqli_fetch_array($listBarangQry)) {
								$ID			= $listBarangRow['id'];										
								$nomor++;
						?>
							<tr>
								<td><div align="center"><?php echo $nomor; ?></div></td>
								<td><div align="center"><?php echo $listBarangRow['kode_barang']; ?></div></td>
								<td><div align="left"><?php echo $listBarangRow['nama_barang']; ?></div></td>
								<td><div align="center"><?php echo format_angka($listBarangRow['jumlah_out']); ?></div></td>
								<td><div align="center"><?php echo $listBarangRow['kategori_barang']; ?></div></td>
							</tr>
						<?php } ?>
</table>
<br>
<input type="checkbox"> &nbsp; Barang diterima dengan kondisi baik dan jumlah permintaan sesuai surat jalan
<h5>Note : Jika tidak sesuai dengan pengiriman / surat jalan mohon di isi pada kolom catatan</h5>
<h5>Catatan : ..............................................................................</h5>
<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;..............................................................................</h5>
<br>
<br>
<br>
<table width="100%">
	<tr>
		<td style="text-align: center;">Pengirim</td>
		<td style="text-align: center;">Penerima</td>
	</tr>
	<tr>
		<td style="text-align: center;">&nbsp;</td>
		<td style="text-align: center;">&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align: center;">&nbsp;</td>
		<td style="text-align: center;">&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align: center;">&nbsp;</td>
		<td style="text-align: center;">&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align: center;">&nbsp;</td>
		<td style="text-align: center;">&nbsp;</td>
	</tr>
	<tr>
		<td style="text-align: center;">(......)</td>
		<td style="text-align: center;">(......)</td>
	</tr>
</table>
</body>
