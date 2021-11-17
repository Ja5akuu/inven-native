<?php
	if(isset($_POST['btnSave'])){
		$message = array();
		if (trim($_POST['cmbStatus'])=="") {
			$message[] = "Data status belum dipilih, silahkan pilih terlebih dahulu!";		
		}
		if (trim($_POST['cmbType'])=="") {
			$message[] = "Data type masih kosong, silahkan diisi terlebih dahulu";		
		}
		if (trim($_POST['cmbMerk'])=="") {
			$message[] = "Data Merk masih kosong, silahkan diisi terlebih dahulu";		
		}
		if (trim($_POST['txtSerial'])=="") {
			$message[] = "Data Serial masih kosong, silahkan diisi terlebih dahulu";		
		}

		$cmbType		= $_POST['cmbType'];
		$txtNama		= $_POST['txtNama'];
		$txtHsuplier	= $_POST['txtHsuplier'];
		$txtHpenawaran	= $_POST['txtHpenawaran'];
		$txtDiskon		= $_POST['txtDiskon'];
		$txtPpn			= $_POST['txtPpn'];
		$txtKeterangan	= $_POST['txtKeterangan'];
		$cmbStatus		= $_POST['cmbStatus'];
		$txtStok		= $_POST['txtStok'];
		$cmbMerk		= $_POST['cmbMerk'];
		$txtSerial		= $_POST['txtSerial'];
		$cmbKategori	= $_POST['cmbKategori'];
		

		if(count($message)==0){	
			$qrySave=mysqli_query($koneksi,"INSERT INTO ms_barang SET principal_barang='Purchasing', 
															kode_type='$cmbType',
															nama_barang='$txtNama',
															harga_suplier='$txtHsuplier',
															harga_penawaran='$txtHpenawaran',
															harga_diskon='$txtDiskon',
															data_ppn='$txtPpn', 
															stok_barang='$txtStok',
															kode_merk='$cmbMerk',
															kode_barang='$txtSerial',
															kategori_barang='$cmbKategori',
															status_barang='$cmbStatus',
															keterangan_barang='$txtKeterangan'") or die ("Gagal query".mysqli_error());
			if($qrySave){
				$_SESSION['pesan'] = 'Data modem berhasil ditambahkan';
				echo '<script>window.location="?page=dtmdm"</script>';
			}
			exit;
		}	
		
		if (! count($message)==0 ){
			echo "<div class='alert alert-danger alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>";
				$Num=0;
				foreach ($message as $indeks=>$pesan_tampil) { 
				$Num++;
					echo "&nbsp;&nbsp;$Num. $pesan_tampil<br>";	
				} 
			echo "</div>"; 
		}
	}
	$dataNama		= isset($_POST['txtNama']) ? $_POST['txtNama'] : ''; 
	$dataType		= isset($_POST['cmbType']) ? $_POST['cmbType'] : '';
	$dataMerk	 	= isset($_POST['cmbMerk']) ? $_POST['cmbMerk'] : '';
	$dataSerial		= isset($_POST['txtSerial']) ? $_POST['txtSerial'] : '';
	$dataKeterangan	= isset($_POST['txtKeterangan']) ? $_POST['txtKeterangan'] : '';
	$dataHsuplier	= isset($_POST['txtHsuplier']) ? $_POST['txtHsuplier'] : '';
	$dataDiskon		= isset($_POST['txtDiskon']) ? $_POST['txtDiskon'] : '';
	$dataPpn		= isset($_POST['txtPpn']) ? $_POST['txtPpn'] : '';
	$dataStatus		= isset($_POST['cmbStatus']) ? $_POST['cmbStatus'] : '';
	$dataStok		= isset($_POST['txtStok']) ? $_POST['txtStok'] : '';
	$dataKategori	= isset($_POST['cmbKategori']) ? $_POST['cmbKategori'] : '';
	$dataHpenawaran	= isset($_POST['txtHpenawaran']) ? $_POST['txtHpenawaran'] : '';
 
?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold">Form Barang</span></div>
		<div class="actions">
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=dtitem" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" class="form-horizontal form-bordered" autocomplete='off'>
			<div class="form-body">				
				<div class="form-group">
					<label class="col-md-2 control-label">Kode Barang :</label>
					<div class="col-md-5">
						<input class="form-control" name="txtSerial" value="<?php echo $dataSerial; ?>" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Nama Barang :</label>
					<div class="col-md-5">
						<input class="form-control" name="txtNama" value="<?php echo $dataNama; ?>" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Kategori :</label>
					<div class="col-md-4">
					<select name="cmbMerk" class="form-control input-sm select2" data-placeholder="Pilih Kategori" tabindex="1">
					  <option value=""> </option>
					  <?php
						  $dataSql = "SELECT * FROM ms_merk WHERE status_merk='Active' ORDER BY kode_merk";
						  $dataQry = mysqli_query($koneksi,$dataSql) or die ("Gagal Query".mysql_error());
						  while ($dataRow = mysqli_fetch_array($dataQry)) {
							if ($dataMerk == $dataRow['kode_merk']) {
								$cek = " selected";
							} else { $cek=""; }
							echo "<option value='$dataRow[kode_merk]' $cek>$dataRow[nama_merk]</option>";
						  }
						  $sqlData ="";
					  ?>
				  	</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-2 control-label">Satuan :</label>
					<div class="col-md-2">
						<select class="form-control select2" data-placeholder="Pilih Kategori" name="cmbKategori">
			                <option value=""></option>
			                <?php
								  $pilihan	= array("Inch", "Cm","Meter","Ml", "Liter", "Botol", "Galon", "Gram","Kg","S","M","L","XL","XXL", "Krg", "Krng", "Pak", "PCS", "PSG", "ROL", "Can/Kaleng");
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
				<div class="form-group">
					<label class="col-md-2 control-label">Stok :</label>
					<div class="col-md-2">
						<input class="form-control" name="txtStok" value="<?php echo $dataStok; ?>" type="text"/>
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-md-2 control-label">Harga Penawaran :</label>
					<div class="col-md-2">
						<input class="form-control" name="txtHpenawaran" value="<?php echo $dataHpenawaran; ?>" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Harga Suplier :</label>
					<div class="col-md-2">
						<input class="form-control" name="txtHsuplier" value="<?php echo $dataHsuplier; ?>" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Diskon Harga :</label>
					<div class="col-md-2">
						<input class="form-control" name="txtDiskon" value="<?php echo $dataDiskon; ?>" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">PPN :</label>
					<div class="col-md-2">
						<input class="form-control" name="txtPpn" value="<?php echo $dataPpn; ?>" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Harga Beli :</label>
					<div class="col-md-2">
						<textarea class="form-control" name="txtKeterangan" type="text"/><?php echo $dataKeterangan; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Vendor :</label>
					<div class="col-md-4">
					<select name="cmbType" class="form-control input-sm select2" data-placeholder="Pilih Vendor" tabindex="1">
					  <option value=""> </option>
					  <?php
						  $dataSql = "SELECT * FROM ms_type WHERE status_type='Active' AND keterangan_type='Barang' ORDER BY kode_type";
						  $dataQry = mysqli_query($koneksi,$dataSql) or die ("Gagal Query".mysqli_error());
						  while ($dataRow = mysqli_fetch_array($dataQry)) {
							if ($dataType == $dataRow['kode_type']) {
								$cek = " selected";
							} else { $cek=""; }
							echo "<option value='$dataRow[kode_type]' $cek>$dataRow[nama_type]</option>";
						  }
						  $sqlData ="";
					  ?>
				  	</select>
					</div>
				</div>
				<div class="form-group">
	                <label class="col-md-2 control-label">Status :</label>
	                <div class="col-md-10">
	                    <div class="md-radio-list">
	                    	<?php
								if($dataStatus=='Active'){
				                    echo " 	<div class='md-radio'>
				                    			<input type='radio' id='radio53' name='cmbStatus' value='Active' class='md-radiobtn' checked>
				                            	<label for='radio53'><span></span><span class='check'></span><span class='box'></span> Active </label>
				                            </div>
				                        	<div class='md-radio'>
				                            	<input type='radio' id='radio54' name='cmbStatus' value='Non Active' class='md-radiobtn'>
				                            	<label for='radio54'><span></span><span class='check'></span><span class='box'></span> Non Active </label>
				                        	</div>";
				                }elseif($dataStatus=='Non Active'){
				                	echo "	<div class='md-radio'>
				                            	<input type='radio' id='radio53' name='cmbStatus' value='Active' class='md-radiobtn'>
				                            	<label for='radio53'><span></span><span class='check'></span><span class='box'></span> Active </label>
				                        	</div>
				                        	<div class='md-radio'>
				                            	<input type='radio' id='radio54' name='cmbStatus' value='Non Active' class='md-radiobtn' checked>
				                            	<label for='radio54'><span></span><span class='check'></span><span class='box'></span> Non Active </label>
				                            </div>";
				                }else{
				                	echo "	<div class='md-radio'>
				                            	<input type='radio' id='radio53' name='cmbStatus' value='Active' class='md-radiobtn'>
				                            	<label for='radio53'><span></span><span class='check'></span><span class='box'></span> Active </label>
				                        	</div>
				                        	<div class='md-radio'>
				                            	<input type='radio' id='radio54' name='cmbStatus' value='Non Active' class='md-radiobtn'>
				                            	<label for='radio54'><span></span><span class='check'></span><span class='box'></span> Non Active </label>
				                            </div>";
				                }
				            ?>
	                    </div>
	                </div>
	            </div>
			</div>
			<div class="form-actions">
			    <div class="row">
			        <div class="form-group">
			            <div class="col-lg-offset-2 col-lg-10">
			                <button type="submit" name="btnSave" class="btn blue"><i class="fa fa-save"></i> Simpan Data</button>
			                <a href="?page=dtmdm" class="btn blue"><i class="fa fa-undo"></i> Kembali</a>
			            </div>
			        </div>
			    </div>
			</div>
		</form>
	</div>
</div>