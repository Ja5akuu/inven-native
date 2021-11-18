<?php
	

	if(isset($_POST['btnApp'])){
		$id_key		= $_POST['txtKode'];
		$update 	= mysqli_query($koneksi,"UPDATE tr_out SET status_out='Open' WHERE kode_out='$id_key'") 
						or die ("Gagal kosongkan tmp".mysqli_error());
		if($update){	
			
			$_SESSION['pesan'] = 'Data pengeluaran Part berhasil diperbaharui';
			echo '<script>window.location="?page=dtpartout"</script>';
		}
	}
	$kodeTransaksi = base64_decode($_GET['id']);
				
	$beliSql = "SELECT * FROM tr_out a
				INNER JOIN ms_user b ON a.kode_teknisi=b.kode_user
				INNER JOIN ms_layanan c ON a.kode_layanan=c.kode_layanan
				INNER JOIN ms_customer d ON a.kode_customer=d.kode_customer
				AND a.kode_out='".$kodeTransaksi."'";
	$beliQry = mysqli_query($koneksi,$beliSql)  or die ("Query pendaftaran salah : ".mysqli_error());
	$beliRow = mysqli_fetch_array($beliQry);
	if($beliRow['status_out']=='Draft'){
		$disabled 	='';
	}else{
		$disabled	='disabled';
	}
$dataKode			= $beliRow['kode_out'];
$dataTglOut			= isset($_POST['txtTglOut']) ? $_POST['txtTglOut'] : $beliRow['tgl_out'];
$dataTglDikerjakan	= isset($_POST['txtTglDikerjakan']) ? $_POST['txtTglDikerjakan'] : $beliRow['tgl_pengerjaan'];
$dataCustomer		= isset($_POST['cmbCustomer']) ? $_POST['cmbCustomer'] : $beliRow['kode_customer'];
$dataLayanan		= isset($_POST['cmbLayanan']) ? $_POST['cmbLayanan'] : $beliRow['kode_layanan'];
$dataAlamat			= isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : $beliRow['alamat_pelanggan'];
$dataLokasi			= isset($_POST['cmbLokasi']) ? $_POST['cmbLokasi'] : $beliRow['lokasi_pengerjaan'];
if($dataLokasi=='LAINNYA'){
	$disable 		= '';
}else{
	$disable 		= 'disabled';
}
$dataLainnya		= isset($_POST['txtLainnya']) ? $_POST['txtLainnya'] : $beliRow['lokasi_lainnya'];
$dataIP				= isset($_POST['txtIP']) ? $_POST['txtIP'] : $beliRow['ip_atm'];
$dataIDAtm			= isset($_POST['txtIDAtm']) ? $_POST['txtIDAtm'] : $beliRow['id_atm'];
$dataRincian		= isset($_POST['txtRincian']) ? $_POST['txtRincian'] : $beliRow['keterangan_out'];
$dataTeknisi		= isset($_POST['cmbTeknisi']) ? $_POST['cmbTeknisi'] : $beliRow['kode_teknisi'];
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="fieldset-form" autocomplete="off">
	<div class="portlet box blue">
		<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Detail Penerimaan Modem</span></div>
			<div class="actions">
				<button <?php echo $disabled ?> class="btn blue tooltips" title="Save To Approve" type="submit" name="btnApp"><i class="icon-check"></i></button>
				<button class="btn blue tooltips" title="Save Change" type="submit" name="btnSave"><i class="fa fa-save"></i></button>
				<a href="?page=addpartout" class="btn blue"><i class="icon-plus"></i></a>
				<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
				<a href="?page=dtpartout" class="btn blue"><i class="icon-close"></i></a>
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
							<input class="form-control date-picker" data-date-format="yyyy-mm-dd" type="text" value="<?php echo $dataTglOut; ?>" name="txtTglOut"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Tgl. Pengerjaan :</label>
							<input class="form-control date-picker" data-date-format="yyyy-mm-dd" type="text" value="<?php echo $dataTglDikerjakan; ?>" name="txtTglDikerjakan"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Nama Pelanggan :</label>
							<select name="cmbCustomer" class="form-control select2" data-placeholder="Pilih Customer" >
								<option value=""> </option>
								<?php
								  $dataSql = "SELECT * FROM ms_customer WHERE status_customer='Active' ORDER BY kode_customer";
								  $dataQry = mysqli_query($koneksi,$dataSql) or die ("Gagal Query".mysqli_error());
								  while ($dataRow = mysqli_fetch_array($dataQry)) {
									if ($dataCustomer == $dataRow['kode_customer']) {
										$cek = " selected";
									} else { $cek=""; }
									echo "<option value='$dataRow[kode_customer]' $cek>$dataRow[nama_customer]</option>";
								  }
								  $sqlData ="";
								?>
						  	</select>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Jenis Layanan :</label>
							<select name="cmbLayanan" class="form-control select2" data-placeholder="Pilih Layanan" >
								<option value=""> </option>
								<?php
								  $dataSql = "SELECT * FROM ms_layanan 
								  				WHERE status_layanan='Active' 
								  				ORDER BY kode_layanan";
								  $dataQry = mysqli_query($koneksi,$dataSql) or die ("Gagal Query".mysqli_error());
								  while ($dataRow = mysqli_fetch_array($dataQry)) {
									if ($dataLayanan == $dataRow['kode_layanan']) {
										$cek = " selected";
									} else { $cek=""; }
									echo "<option value='$dataRow[kode_layanan]' $cek>$dataRow[nama_layanan]</option>";
								  }
								  $sqlData ="";
								?>
						  	</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Lokasi :</label>
							<select class="form-control select2" data-placeholder="Pilih Lokasi" name="cmbLokasi" onChange="javascript:submitform();">
				                <option value=""></option>
				                <?php
									  $pilihan	= array("ATM OFF SITE", 
									  					"PAYMENT POINT",
									  					"MOBILE BRANCH",
									  					"KANTOR CABANG",
									  					"KANTOR KAS",
									  					"EOC",
									  					"VENDING MECHINE",
									  					"GERAI EVENT",
									  					"SERVER",
									  					"LAINNYA");
									  foreach ($pilihan as $nilai) {
										if ($dataLokasi==$nilai) {
											$cek=" selected";
										} else { $cek = ""; }
										echo "<option value='$nilai' $cek>$nilai</option>";
									  }
								?>
				            </select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Lokasi Lainnya :</label>
							<input class="form-control" type="text" name="txtLainnya" value="<?php echo $dataLainnya; ?>" <?php echo $disable ?>/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>IP ATM :</label>
							<input class="form-control" type="text" name="txtIP" value="<?php echo $dataIP; ?>"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Alamat Pelanggan :</label>
							<textarea class="form-control" type="text" name="txtAlamat"><?php echo $dataAlamat; ?></textarea>
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
									$listBarangQry = mysqli_query($koneksi,$listBarangSql)  or die ("Query list barang salah : ".mysqli_error());
									
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
								<input type="file" class="form-control" name="txtCSR" value="<?php echo $dataCSR ?>" />
		                        <span class="help-block"><a href="./photo/<?php echo $beliRow['file_csr'] ?>" target="_BLANK"><?php echo $beliRow['file_csr'] ?></a></span>
		                    </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Upload Image :</label>
								<input type="file" class="form-control" name="txtImage1" value="<?php echo $dataImage1 ?>" />
		                        <span class="help-block"><a href="./photo/<?php echo $beliRow['file_image_1'] ?>" target="_BLANK"><?php echo $beliRow['file_image_1'] ?></a></span>
		                    </div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Nama Teknisi :</label>
								<select name="cmbTeknisi" class="form-control select2" data-placeholder="Pilih Teknisi">
								  <option value=""> </option>
								  <?php
									  $dataSql = "SELECT * FROM ms_user 
									  				WHERE status_user='Active' 
									  				AND jenis_user='Teknisi'
									  				ORDER BY kode_user";
									  $dataQry = mysqli_query($koneksi,$dataSql) or die ("Gagal Query".mysqli_error());
									  while ($dataRow = mysqli_fetch_array($dataQry)) {
										if ($dataTeknisi == $dataRow['kode_user']) {
											$cek = " selected";
										} else { $cek=""; }
										echo "<option value='$dataRow[kode_user]' $cek>$dataRow[nama_user]</option>";
									  }
									  $sqlData ="";
								  ?>
							  	</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label>Informasi & Rincian Masalah :</label>
							<textarea class="form-control" name="txtRincian" rows="4"><?php echo $dataRincian ?></textarea>
						</div>
					</div>
				</div>
			</div>
	  	</div>
	</div>
</form>
			  	