<?php
	$kodeTransaksi = base64_decode($_GET['id']);
				
	$beliSql = "SELECT * FROM tr_in a
				INNER JOIN ms_user b ON a.kode_user=b.kode_user
				AND a.kode_in='".$kodeTransaksi."'";
	$beliQry = mysql_query($beliSql, $koneksidb)  or die ("Query pendaftaran salah : ".mysql_error());
	$beliRow = mysql_fetch_array($beliQry);
?>
<div class="portlet box blue">
	<div class="portlet-title">
	<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Detail Penerimaan MHU Box</span></div>
		<div class="actions">
			<a href="?page=addmhuin" class="btn blue"><i class="icon-plus"></i></a>
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=dtmhuin" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="fieldset-form" autocomplete="off">
		<div class="form-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>No. Penerimaan :</label>
						<input class="form-control" type="text" value="<?php echo $beliRow['kode_in']; ?>" disabled="disabled"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Tgl. Penerimaan :</label>
						<input class="form-control" type="text" value="<?php echo IndonesiaTgl($beliRow['tgl_in']); ?>" disabled="disabled"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Dibuat Oleh :</label>
						<input class="form-control" type="text" disabled="disabled" value="<?php echo $beliRow['nama_user']; ?>"/>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Keterangan :</label>
						<input type="text" disabled="disabled" class="form-control" value="<?php echo $beliRow['keterangan_in']; ?>">
					</div>
				</div>
			</div>
			<div class="batas"></div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-condensed table-striped table-bordered" id="sample_1">
						<thead>
							<tr class="active">
				  	  	  	  	<th width="5%"><div align="center">NO</div></th>
						  	  	<th width="10%"><div align="center">KODE</div></th>
						  	  	<th width="40%"><div align="left">NAMA MHU BOX </div></th>
						  	  	<th width="20%"><div align="left">MERK </div></th>
						  	  	<th width="20%"><div align="left">MERK </div></th>
								<th width="5%"><div align="center">JUMLAH</div></th>
							</tr>
						</thead>
						<tbody>
						<?php
								$listBarangSql = "SELECT * FROM tr_in_item a
													INNER JOIN ms_barang b ON a.id_barang=b.id_barang 
													LEFT JOIN ms_merk c ON b.kode_merk=c.kode_merk
													LEFT JOIN ms_type d ON b.kode_type=d.kode_type
												  	WHERE a.kode_in='$kodeTransaksi'
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
								<td><div align="left"><?php echo $listBarangRow['nama_merk']; ?></div></td>
								<td><div align="left"><?php echo $listBarangRow['nama_type']; ?></div></td>
								<td><div align="center"><?php echo format_angka($listBarangRow['jumlah_in']); ?></div></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>
  </div>
</div>
		  	