<?php
	if(isset($_POST['btnSave'])){
		$message = array();
		if (trim($_POST['txtNama'])=="") {
			$message[] = "<b>Nama atm</b> tidak boleh kosong!";		
		}
		if (trim($_POST['txtAlamat'])=="") {
			$message[] = "<b>Lokasi </b> tidak boleh kosong";		
		}
		if (trim($_POST['txtIP'])=="") {
			$message[] = "<b>IP. ATM </b> tidak boleh kosong!";		
		}
		if (trim($_POST['txtKode'])=="") {
			$message[] = "<b>ID. ATM </b> tidak boleh kosong!";		
		}
		if (trim($_POST['cmbStatus'])=="") {
			$message[] = "<b>Status </b> tidak boleh kosong!";		
		}

		$txtNama		= $_POST['txtNama'];
		$txtAlamat		= $_POST['txtAlamat'];
		$txtKode		= $_POST['txtKode'];
		$txtIP			= $_POST['txtIP'];
		$cmbStatus		= $_POST['cmbStatus'];
		$txtKeterangan	= $_POST['txtKeterangan'];
		
		if(count($message)==0){	
			$qryUpdate=mysqli_query($koneksi,"UPDATE ms_atm SET kode_atm='$txtKode', 
														nama_atm='$txtNama', 
							  							alamat_atm='$txtAlamat',
														ip_atm='$txtIP',
														keterangan_atm='$txtKeterangan',
														status_atm='$cmbStatus'
													WHERE id_atm ='".$_POST['txtID']."'") 
					   or die ("Gagal query update".mysqli_error());
			if($qryUpdate){
				$_SESSION['pesan'] = 'Data atm berhasil diperbaharui';
				echo '<script>window.location="?page=dtatm"</script>';
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
	$KodeEdit		= isset($_GET['id']) ?  $_GET['id'] : $_POST['txtKode']; 
	$sqlShow 		= "SELECT * FROM ms_atm WHERE id_atm='".base64_decode($KodeEdit)."'";
	$qryShow 		= mysqli_query($koneksi,$sqlShow)  or die ("Query ambil data atm salah : ".mysqli_error());
	$dataShow 		= mysqli_fetch_array($qryShow);
	
	$dataID 		= $dataShow['id_atm'];
	$dataKode		= isset($dataShow['kode_atm']) ?  $dataShow['kode_atm'] : $_POST['txtKode'];
	$dataNama		= isset($dataShow['nama_atm']) ?  $dataShow['nama_atm'] : $_POST['txtNama'];
	$dataAlamat 	= isset($dataShow['alamat_atm']) ?  $dataShow['alamat_atm'] : $_POST['txtAlamat'];
	$dataIP		 	= isset($dataShow['ip_atm']) ?  $dataShow['ip_atm'] : $_POST['txtIP'];
	$dataStatus 	= isset($dataShow['status_atm']) ?  $dataShow['status_atm'] : $_POST['cmbStatus'];
	$dataKeterangan	= isset($dataShow['keterangan_atm']) ?  $dataShow['keterangan_atm'] : $_POST['txtKeterangan'];
?>
		
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold">Form ATM & Cabang</span></div>
		<div class="actions">
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=dtatm" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmadd" class="form-horizontal form-bordered">
			<div class="form-body">
				<div class="form-group">
					<label class="col-lg-2 control-label">ID ATM :</label>
					<div class="col-lg-3">
						<input class="form-control" type="text" value="<?php echo $dataKode; ?>" name="txtKode"/>
						<input class="form-control" type="hidden" value="<?php echo $dataID; ?>" name="txtID"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Nama ATM :</label>
					<div class="col-lg-5">
						<input class="form-control" name="txtNama" value="<?php echo $dataNama; ?>" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Lokasi :</label>
					<div class="col-lg-10">
						<textarea class="form-control" name="txtAlamat" type="text"/><?php echo $dataAlamat; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">IP. ATM :</label>
					<div class="col-lg-3">
						<input class="form-control" name="txtIP" value="<?php echo $dataIP; ?>" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Keterangan :</label>
					<div class="col-lg-10">
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
			                <a href="?page=dtatm" class="btn blue"><i class="fa fa-undo"></i> Kembali</a>
			            </div>
			        </div>
			    </div>
			</div>
		</form>
	</div>
</div>