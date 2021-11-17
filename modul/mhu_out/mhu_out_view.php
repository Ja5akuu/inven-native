<?php
	if(isset($_POST['btnSave'])){
		$id_key		= $_POST['txtKode'];
		$update 	= mysql_query("UPDATE tr_out SET status_out='Open' WHERE kode_out='$id_key'", $koneksidb) 
						or die ("Gagal kosongkan tmp".mysql_error());
		if($update){	
			
			$_SESSION['pesan'] = 'Data pengeluaran MHU berhasil diperbaharui';
			echo '<script>window.location="?page=dtmhuout"</script>';
		}
	}

	$kodeTransaksi = base64_decode($_GET['id']);
				
	$beliSql = "SELECT * FROM tr_out a
				INNER JOIN ms_user b ON a.kode_user=b.kode_user
				INNER JOIN ms_layanan c ON a.kode_layanan=c.kode_layanan
				INNER JOIN ms_customer d ON a.kode_customer=d.kode_customer
				AND a.kode_out='".$kodeTransaksi."'";
	$beliQry = mysql_query($beliSql, $koneksidb)  or die ("Query pendaftaran salah : ".mysql_error());
	$beliRow = mysql_fetch_array($beliQry);
	if($beliRow['status_out']=='Draft'){
		$disabled 	='';
	}else{
		$disabled	='disabled';
	}
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="fieldset-form" autocomplete="off">
	<div class="portlet box blue">
		<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Detail Pengeluaran MHU Box</span></div>
			<div class="actions">
				<button <?php echo $disabled ?> class="btn blue tooltips" title="Save To Approve" type="submit" name="btnSave"><i class="icon-check"></i></button>
				<a href="?page=addmhuout" class="btn blue tooltips" title="Add New"><i class="icon-plus"></i></a>
				<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue tooltips" title="Refresh"><i class="icon-refresh"></i></a>
				<a href="?page=dtmhuout" class="btn blue tooltips" title="Back To Data"><i class="icon-close"></i></a>
			</div>
		</div>
		<div class="portlet-body form">
			
			<div class="form-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>No. Pengeluaran :</label>
							<input class="form-control" type="text" value="<?php echo $beliRow['kode_out']; ?>" name="txtKode" readonly/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Tgl. Pengeluaran :</label>
							<input class="form-control" type="text" value="<?php echo IndonesiaTgl($beliRow['tgl_out']); ?>" disabled="disabled"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Tgl. Pengiriman :</label>
							<input class="form-control" type="text" disabled="disabled" value="<?php echo IndonesiaTgl($beliRow['tgl_pengiriman']); ?>"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Nama Pelanggan :</label>
							<input type="text" disabled="disabled" class="form-control" value="<?php echo $beliRow['nama_customer']; ?>">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Jenis Layanan :</label>
							<input class="form-control" type="text" value="<?php echo $beliRow['nama_layanan']; ?>" disabled="disabled"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Lokasi :</label>
							<input class="form-control" type="text" value="<?php echo ($beliRow['lokasi_pengerjaan']); ?>" disabled="disabled"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Lainnya :</label>
							<input class="form-control" type="text" disabled="disabled" value="<?php echo $beliRow['lokasi_lainnya']; ?>"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Nama Penerima :</label>
							<input type="text" disabled="disabled" class="form-control" value="<?php echo $beliRow['nama_penerima']; ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Alamat Pelanggan :</label>
							<textarea class="form-control" disabled><?php echo $beliRow['alamat_pelanggan'] ?></textarea>
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
							  	  	<th width="40%"><div align="left">NAMA BARANG </div></th>
							  	  	<th width="20%"><div align="left">MERK </div></th>
							  	  	<th width="20%"><div align="left">MERK </div></th>
									<th width="5%"><div align="center">JUMLAH</div></th>
								</tr>
							</thead>
							<tbody>
							<?php
									$listBarangSql = "SELECT * FROM tr_out_item a
														INNER JOIN ms_barang b ON a.id_barang=b.id_barang 
														LEFT JOIN ms_merk c ON b.kode_merk=c.kode_merk
														LEFT JOIN ms_type d ON b.kode_type=d.kode_type
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
									<td><div align="left"><?php echo $listBarangRow['nama_merk']; ?></div></td>
									<td><div align="left"><?php echo $listBarangRow['nama_type']; ?></div></td>
									<td><div align="center"><?php echo format_angka($listBarangRow['jumlah_out']); ?></div></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="batas"></div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Upload CSR/BAM :</label>
		                        <span class="help-block"><a href="./photo/<?php echo $beliRow['file_csr'] ?>" target="_BLANK"><?php echo $beliRow['file_csr'] ?></a></span>
		                    </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Upload Image :</label>
		                        <span class="help-block"><a href="./photo/<?php echo $beliRow['file_image_1'] ?>" target="_BLANK"><?php echo $beliRow['file_image_1'] ?></a></span>
		                    </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Nama Pengirim :</label>
								<input class="form-control" type="text" disabled="disabled" value="<?php echo $beliRow['nama_pengirim']; ?>"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>Informasi & Rincian Masalah :</label>
							<textarea class="form-control" disabled rows="4"><?php echo $beliRow['keterangan_out'] ?></textarea>
						</div>
					</div>
				</div>
			</div>
	  	</div>
	</div>
</form>
		  	