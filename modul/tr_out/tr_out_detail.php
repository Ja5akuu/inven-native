<?php
	$kodeTransaksi = base64_decode($_GET['id']);
				
	$beliSql = "SELECT * FROM tr_out a
				INNER JOIN ms_user b ON a.kode_user=b.kode_user
				LEFT JOIN ms_layanan c ON a.kode_layanan=c.kode_layanan
				LEFT JOIN ms_customer d ON a.kode_customer=d.kode_customer
				LEFT JOIN ms_atm e ON a.id_atm=e.id_atm
				AND a.kode_out='".$kodeTransaksi."'";
	$beliQry = mysql_query($beliSql, $koneksidb)  or die ("Query pendaftaran salah : ".mysql_error());
	$beliRow = mysql_fetch_array($beliQry);
?>
<div class="portlet box blue">
	<div class="portlet-title">
	<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Detail Pengeluaran Barang</span></div>
		<div class="actions">
			<a href="?page=addout" class="btn blue"><i class="icon-plus"></i></a>
			<button name="bar" type="button" onclick="cetak()" class="btn blue"><i class="icon-printer"></i></button>
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=dtout" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="fieldset-form" autocomplete="off">
		<div class="form-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>No. Pengeluaran :</label>
						<input class="form-control" type="text" value="<?php echo $beliRow['kode_out']; ?>" disabled="disabled"/>
					</div>
					<div class="form-group">
						<label>Tgl. Pengeluaran :</label>
						<input class="form-control" type="text" value="<?php echo IndonesiaTgl($beliRow['tgl_out']); ?>" disabled="disabled"/>
					</div>
					<div class="form-group">
						<label>Customer :</label>
						<input class="form-control" type="text" disabled="disabled" value="<?php echo $beliRow['nama_customer']; ?>"/>
					</div>
					<div class="form-group">
						<label>Teknisi & Dibuat Oleh :</label>
						<input class="form-control" type="text" disabled="disabled" value="<?php echo $beliRow['nama_user']; ?>"/>
					</div>
					<div class="form-group">
						<label>Keterangan :</label>
						<textarea class="form-control" type="text" rows="10" disabled="disabled"><?php echo $beliRow['keterangan_out']; ?></textarea>
					</div>
				</div>
				<div class="col-md-9">
					<div class="scroller" data-height="380px">
					<table class="table table-hover table-condensed table-striped table-bordered" id="sample_1">
						<thead>
							<tr class="active">
				  	  	  	  	<th width="5%"><div align="center">NO</div></th>
						  	  	<th width="10%"><div align="center">KODE</div></th>
						  	  	<th width="40%"><div align="left">NAMA BARANG </div></th>
						  	  	<th width="40%"><div align="left">KETERANGAN </div></th>
								<th width="5%"><div align="center">JUMLAH</div></th>
							</tr>
						</thead>
						<tbody>
						<?php
								$listBarangSql = "SELECT * FROM tr_out_item a
													INNER JOIN ms_barang b ON a.id_barang=b.id_barang 
												  	WHERE a.kode_out='$kodeTransaksi'
												  ORDER BY a.id_barang ASC";
								$listBarangQry = mysql_query($listBarangSql, $koneksidb)  or die ("Query list barang salah : ".mysql_error());
								
								$nomor	= 0;
								while ($listBarangRow = mysql_fetch_array($listBarangQry)) {
								$ID			= $listBarangRow['id'];										
								$nomor++;
						?>
							<tr>
								<td><div align="center"><?php echo $nomor; ?></div></td>
								<td><div align="center"><?php echo $listBarangRow['kode_barang']; ?></div></td>
								<td><div align="left"><?php echo $listBarangRow['nama_barang']; ?></div></td>
								<td><div align="left"><?php echo $listBarangRow['keterangan']; ?></div></td>
								<td><div align="center"><?php echo format_angka($listBarangRow['jumlah_out']); ?></div></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>ATM & Cabang :</label>
								<input class="form-control" type="text" disabled="disabled" value="<?php echo $beliRow['nama_atm']; ?>"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Layanan :</label>
								<input class="form-control" type="text" disabled="disabled" value="<?php echo $beliRow['nama_layanan']; ?>"/>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Tgl. Kembali :</label>
								<input class="form-control" type="text" disabled="disabled" value="<?php echo $beliRow['tgl_kembali']; ?>"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
  </div>
</div>
<script type="text/javascript"> 
    function cetak()	 
    { 
    win=window.open('./cetak/nota_pengeluaran.php?id=<?php echo $kodeTransaksi; ?>','win','width=250, height=400, menubar=0, scrollbars=1, resizable=0, status=0'); 
    } 
</script>	
		  	