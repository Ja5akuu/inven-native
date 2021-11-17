<?php
	if(isset($_POST['btnSave'])){	
		$message = array();
		if (trim($_POST['cmbCustomer'])=="") {
			$message[] = "Pelanggan belum diisi, silahkan pilih terlebih dahulu !";		
		}
		if (trim($_POST['cmbLayanan'])=="") {
			$message[] = "Layanan belum diisi, silahkan pilih terlebih dahulu !";		
		}
		if (trim($_POST['cmbTeknisi'])=="") {
			$message[] = "Teknisi belum diisi, silahkan pilih terlebih dahulu !";		
		}
		if (trim($_POST['cmbKategori'])=="") {
			$message[] = "kategori belum diisi, silahkan pilih terlebih dahulu !";		
		}
		
		$cmbLayanan			= $_POST['cmbLayanan'];
		$txtIP				= $_POST['txtIP'];
		$txtLokasi			= $_POST['txtLokasi'];
		$txtLainnya			= $_POST['txtLainnya'];
		$cmbTeknisi			= $_POST['cmbTeknisi'];
		$cmbCustomer		= $_POST['cmbCustomer'];
		$txtRincian			= $_POST['txtRincian'];
		$txtTglTransaksi	= ($_POST['txtTglTransaksi']);
		$txtTglPengerjaan	= ($_POST['txtTglPengerjaan']);
		$txtAlamat			= $_POST['txtAlamat'];
		$cmbKategori		= $_POST['cmbKategori'];
		$cmbStatusOut		= $_POST['cmbStatusOut'];
		
				
		if(count($message)==0){			
			// UPLOAD CSR
			// if (! empty($_FILES['txtCSR']['tmp_name'])) {
			// 	$file_csr = $_FILES['txtCSR']['name'];
			// 	$file_csr = stripslashes($file_csr);
			// 	$file_csr = str_replace("'","",$file_csr);
					
			// 	$file_csr = $kodeBaru."_".$file_csr;
			// 	copy($_FILES['txtCSR']['tmp_name'],"photo/".$file_csr);
			// }
			// else {
			// 	$file_csr = "";
			// }
			// // UPLOAD IMAGE 1
			// if (! empty($_FILES['txtImage1']['tmp_name'])) {
			// 	$file_image_1 = $_FILES['txtImage1']['name'];
			// 	$file_image_1 = stripslashes($file_image_1);
			// 	$file_image_1 = str_replace("'","",$file_image_1);
					
			// 	$file_image_1 = $kodeBaru."_".$file_image_1;
			// 	copy($_FILES['txtImage1']['tmp_name'],"photo/".$file_image_1);
			// }
			// else {
			// 	$file_image_1 = "";
			// }

			

			$qrySave		= mysql_query("UPDATE tr_out SET tgl_out='$txtTglTransaksi',  
																keterangan_out='$txtRincian',
																kode_customer='$cmbCustomer',
																kode_layanan='$cmbLayanan',
																tgl_pengerjaan='$txtTglPengerjaan',
																kode_teknisi='$cmbTeknisi',
																id_atm='$txtIDAtm',
																ip_atm='$txtIP',
																lokasi_pengerjaan='$txtLokasi',
																kategori_pengerjaan='$cmbKategori',
																status_pengarjaan='$cmbStatusOut',
																lokasi_lainnya='$txtLainnya',
																alamat_pelanggan='$txtAlamat'
															WHERE kode_out='".$_POST['txtKode']."'") 
								  or die ("Gagal query".mysql_error());
			if($qrySave){
				$_SESSION['pesan'] = 'Pengeluaran barang dengan nomor transaksi '.$_POST['txtKode'].' berhasil diperbaharui';
				echo '<script>window.location="?page=dtlmdmout&id='.base64_encode($_POST['txtKode']).'"</script>';
			}	
			
		}	
	} 
	if(isset($_POST['btnApp'])){
		$id_key		= $_POST['txtKode'];
		$update 	= mysql_query("UPDATE tr_out SET status_out='Open' WHERE kode_out='$id_key'", $koneksidb) 
						or die ("Gagal kosongkan tmp".mysql_error());
		if($update){	
			
			$_SESSION['pesan'] = 'Data pengeluaran modem berhasil diperbaharui';
			echo '<script>window.location="?page=dtmdmout"</script>';
		}
	}

	$kodeTransaksi = base64_decode($_GET['id']);
				
	$beliSql = "SELECT * FROM tr_out a
				INNER JOIN ms_user b ON a.kode_teknisi=b.kode_user
				INNER JOIN ms_layanan c ON a.kode_layanan=c.kode_layanan
				INNER JOIN ms_customer d ON a.kode_customer=d.kode_customer
				AND a.kode_out='".$kodeTransaksi."'";
	$beliQry = mysql_query($beliSql, $koneksidb)  or die ("Query pendaftaran salah : ".mysql_error());
	$dataShow = mysql_fetch_array($beliQry);



	$dataTglTransaksi 	= isset($dataShow['tgl_out']) ?  $dataShow['tgl_out'] : $_POST['txtTglTransaksi'];
	$dataTglPengerjaan 	= isset($dataShow['tgl_pengerjaan']) ?  $dataShow['tgl_pengerjaan'] : $_POST['txtTglPengerjaan'];
	$dataKategori		= isset($dataShow['kategori_pengerjaan']) ?  $dataShow['kategori_pengerjaan'] : $_POST['cmbKategori'];
	$dataLainnya		= isset($dataShow['lokasi_lainnya']) ?  $dataShow['lokasi_lainnya'] : $_POST['txtLainnya'];
	$dataLokasi			= isset($dataShow['lokasi_pengerjaan']) ?  $dataShow['lokasi_pengerjaan'] : $_POST['txtLokasi'];

	$dataCustomer		= isset($dataShow['kode_customer']) ?  $dataShow['kode_customer'] : $_POST['cmbCustomer'];
	$dataAlamat			= isset($dataShow['alamat_pelanggan']) ?  $dataShow['alamat_pelanggan'] : $_POST['txtAlamat'];
	$dataLayanan		= isset($dataShow['kode_layanan']) ?  $dataShow['kode_layanan'] : $_POST['cmbLayanan'];
	$dataIP				= isset($dataShow['ip_atm']) ?  $dataShow['ip_atm'] : $_POST['txtIP'];
	$dataRincian		= isset($dataShow['keterangan_out']) ?  $dataShow['keterangan_out'] : $_POST['txtRincian'];
	$dataStatusOut		= isset($dataShow['status_pengarjaan']) ?  $dataShow['status_pengarjaan'] : $_POST['cmbStatusOut'];
	$dataTeknisi		= isset($dataShow['kode_teknisi']) ?  $dataShow['kode_teknisi'] : $_POST['cmbTeknisi'];

	// if($beliRow['status_out']=='Draft'){
	// 	$disabled 	='';
	// }else{
	// 	$disabled	='disabled';
	// }
?>	
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="fieldset-form" autocomplete="off" name="form1" enctype="multipart/form-data">
	<div class="portlet box blue">
		<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Detail Pengeluaran Barang</span></div>
			<div class="actions">
				<button <?php echo $disabled ?> class="btn blue tooltips" title="Save To Approve" type="submit" name="btnApp"><i class="icon-check"></i></button>
				<button class="btn blue tooltips" title="Save Change" type="submit" name="btnSave"><i class="fa fa-save"></i></button>
				<a href="?page=addmdmout" class="btn blue tooltips" title="Add New"><i class="icon-plus"></i></a>
				<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue tooltips" title="Refresh"><i class="icon-refresh"></i></a>
				<a href="?page=dtmdmout" class="btn blue tooltips" title="Back To Data"><i class="icon-close"></i></a>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">No. Pengeluaran :</label>
							<input class="form-control" type="text" value="<?php echo $kodeTransaksi; ?>" readonly name="txtKode"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Tgl. Pengeluaran :</label>
							<div class="input-icon left">
								<i class="icon-calendar"></i>
								<input class="form-control date-picker" data-date-format="yyyy-mm-dd" type="text" name="txtTglTransaksi" value="<?php echo $dataTglTransaksi; ?>" />
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Tgl. Pengerjaan :</label>
							<input class="form-control date-picker" data-date-format="yyyy-mm-dd" type="text" name="txtTglPengerjaan" value="<?php echo $dataTglPengerjaan; ?>"/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Nama Project :</label>
								<select name="cmbCustomer" class="form-control select2" data-placeholder="Pilih Customer" >
									<option value=""> </option>
									<?php
									  $dataSql = "SELECT * FROM ms_customer WHERE status_customer='Active' ORDER BY kode_customer";
									  $dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query".mysql_error());
									  while ($dataRow = mysql_fetch_array($dataQry)) {
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
							<label class="control-label">PIC Lapangan :</label>
								<select name="cmbLayanan" class="form-control select2" data-placeholder="Pilih Layanan" >
									<option value=""> </option>
									<?php
									  $dataSql = "SELECT * FROM ms_layanan 
									  				WHERE status_layanan='Active' 
									  				ORDER BY kode_layanan";
									  $dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query".mysql_error());
									  while ($dataRow = mysql_fetch_array($dataQry)) {
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
							<label class="control-label">Jenis Pengiriman :</label>
							<select class="form-control select2" data-placeholder="Pilih Kategori" name="cmbKategori" onChange="javascript:submitform();">
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
										if ($dataKategori==$nilai) {
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
							<label class="control-label">Lainnya :</label>
							<input class="form-control" type="text" name="txtLainnya" value="<?php echo $dataLainnya; ?>" <?php echo $disable ?>/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Lokasi :</label>
							<input class="form-control" type="text" name="txtLokasi" value="<?php echo $dataLokasi; ?>"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Nama Penerima :</label>
							<input class="form-control" type="text" name="txtIP" value="<?php echo $dataIP; ?>"/>
						</div>
						<div class="form-group">
							<label class="control-label">Status :</label>
							<select class="form-control select2" data-placeholder="Pilih Status" name="cmbStatusOut" >
				                <option value=""></option>
				                <?php
									  $pilihan	= array("DITERIMA", 
									  					"RETUR");
									  foreach ($pilihan as $nilai) {
										if ($dataStatusOut==$nilai) {
											$cek=" selected";
										} else { $cek = ""; }
										echo "<option value='$nilai' $cek>$nilai</option>";
									  }
								?>
				            </select>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label class="control-label">Alamat Pelanggan :</label>
							<textarea class="form-control" type="text" rows="3" name="txtAlamat"><?php echo $dataAlamat; ?></textarea>
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
							  	  	<th width="10%"><div align="center">SERIAL NUMBER</div></th>
							  	  	<th width="20%"><div align="left">MERK </div></th>
							  	  	<th width="20%"><div align="left">TYPE </div></th>
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
									  $dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query".mysql_error());
									  while ($dataRow = mysql_fetch_array($dataQry)) {
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
		  	