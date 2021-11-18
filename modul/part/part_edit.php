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
		
		$txtNama		= $_POST['txtNama'];
		$cmbType		= $_POST['cmbType'];
		$txtKeterangan	= $_POST['txtKeterangan'];
		$cmbStatus		= $_POST['cmbStatus'];
		$txtStok		= $_POST['txtStok'];
		$cmbMerk		= $_POST['cmbMerk'];
		$txtSerial		= $_POST['txtSerial'];
		
		
		if(count($message)==0){			
			$qrySave=mysqli_query($koneksi,"UPDATE ms_barang SET nama_barang='$txtNama', 
														kode_type='$cmbType', 
														stok_barang='$txtStok',
														kode_merk='$cmbMerk',
														kode_barang='$txtSerial',
														status_barang='$cmbStatus',
														keterangan_barang='$txtKeterangan'
													WHERE id_barang='".$_POST['txtKode']."'") or die ("Gagal query".mysqli_error());
			if($qrySave){
				$_SESSION['pesan'] = 'Data part berhasil diperbaharui';
						echo '<script>window.location="?page=dtpart"</script>';
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
	$KodeEdit			= isset($_GET['id']) ?  $_GET['id'] : $_POST['txtKode']; 
	$sqlShow 			= "SELECT * FROM ms_barang WHERE id_barang='".base64_decode($KodeEdit)."'";
	$qryShow 			= mysqli_query($koneksi,$sqlShow)  or die ("Query ambil data supplier salah : ".mysqli_error());
	$dataShow 			= mysqli_fetch_array($qryShow);
	
	$dataID				= $dataShow['id_barang'];
	$dataNama			= isset($dataShow['nama_barang']) ?  $dataShow['nama_barang'] : $_POST['txtNama'];
	$dataType			= isset($dataShow['kode_type']) ?  $dataShow['kode_type'] : $_POST['cmbType'];
	$dataMerk			= isset($dataShow['kode_merk']) ?  $dataShow['kode_merk'] : $_POST['cmbMerk'];
	$dataKeterangan		= isset($dataShow['keterangan_barang']) ?  $dataShow['keterangan_barang'] : $_POST['txtKeterangan'];
	$dataStatus			= isset($dataShow['status_barang']) ?  $dataShow['status_barang'] : $_POST['cmbStatus'];
	$dataStok			= isset($dataShow['stok_barang']) ?  format_angka($dataShow['stok_barang']) : $_POST['txtStok'];
	$dataSerial			= isset($dataShow['kode_barang']) ?  $dataShow['kode_barang'] : $_POST['txtSerial'];

?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold"> Form Part</span></div>
		<div class="actions">
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=dtitem" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" class="form-horizontal form-bordered" autocomplete='off'>
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Serial Number :</label>
					<div class="col-md-3">
						<input class="form-control" type="text" value="<?php echo $dataSerial; ?>" name="txtSerial"/>
						<input class="form-control" type="hidden" value="<?php echo $dataID; ?>" name="txtKode"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Nama Part :</label>
					<div class="col-md-7">
						<input class="form-control" name="txtNama" value="<?php echo $dataNama; ?>" type="text"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-2 control-label">Merk :</label>
					<div class="col-md-4">
					<select name="cmbMerk" class="form-control input-sm select2" data-placeholder="Pilih Merk" tabindex="1">
					  <option value=""> </option>
					  <?php
						  $dataSql = "SELECT * FROM ms_merk WHERE status_merk='Active' ORDER BY kode_merk";
						  $dataQry = mysqli_query($koneksi,$dataSql) or die ("Gagal Query".mysqli_error());
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
					<label class="col-md-2 control-label">Nama Part :</label>
					<div class="col-md-5">
						<input class="form-control" name="txtNama" value="<?php echo $dataNama; ?>" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Type :</label>
					<div class="col-md-4">
					<select name="cmbType" class="form-control input-sm select2" data-placeholder="Pilih Type" tabindex="1">
					  <option value=""> </option>
					  <?php
						  $dataSql = "SELECT * FROM ms_type WHERE status_type='Active' AND keterangan_type='Part' ORDER BY kode_type";
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
					<label class="col-md-2 control-label">Stok :</label>
					<div class="col-md-2">
						<input class="form-control" name="txtStok" value="<?php echo $dataStok; ?>" type="text"/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-2 control-label">Keterangan :</label>
					<div class="col-md-10">
						<textarea class="form-control" name="txtKeterangan" type="text"/><?php echo $dataKeterangan; ?></textarea>
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
			                <a href="?page=dtpart" class="btn blue"><i class="fa fa-undo"></i> Kembali</a>
			            </div>
			        </div>
			    </div>
			</div>
		</form>
	</div>
</div>