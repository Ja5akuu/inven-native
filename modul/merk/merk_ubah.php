<?php
	if(isset($_POST['btnSave'])){
		$message = array();
		if (trim($_POST['txtNama'])=="") {
			$message[] = "Nama tidak boleh kosong!";		
		}
		if (trim($_POST['txtKeterangan'])=="") {
			$message[] = "Keterangan tidak boleh kosong!";		
		}
		if (trim($_POST['cmbStatus'])=="") {
			$message[] = "Status tidak boleh kosong!";		
		}	
		$txtNama		= $_POST['txtNama'];
		$txtLama		= $_POST['txtLama'];
		$txtKeterangan	= $_POST['txtKeterangan'];
		$cmbStatus		= $_POST['cmbStatus'];
				
		$sqlCek="SELECT * FROM ms_merk WHERE nama_merk='$txtNama' AND NOT(nama_merk='$txtLama')";
		$qryCek=mysqli_query($koneksi,$sqlCek) or die ("Eror Query".mysqli_error()); 
		if(mysqli_num_rows($qryCek)>=1){
			$message[] = "Maaf, <b> $txtNama </b> sudah ada, ganti dengan yang lain";
		}
				
		if(count($message)==0){	
			$qryUpdate=mysqli_query($koneksi,"UPDATE ms_merk SET nama_merk='$txtNama', 
														keterangan_merk='$txtKeterangan',
														status_merk='$cmbStatus'	
													WHERE kode_merk ='".$_POST['txtKode']."'") 
				   or die ("Gagal query update".mysqli_error());
			if($qryUpdate){
				$_SESSION['pesan'] = 'Data berhasil diperbaharui';
						echo '<script>window.location="?page=datamerk"</script>';
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
$sqlShow 		= "SELECT * FROM ms_merk WHERE kode_merk='$KodeEdit'";
$qryShow 		= mysqli_query($koneksi,$sqlShow)  or die ("Query ambil data jasa salah : ".mysqli_error());
$dataShow 		= mysqli_fetch_array($qryShow);

$dataKode		= $dataShow['kode_merk'];
$datajasa		= isset($dataShow['nama_merk']) ?  $dataShow['nama_merk'] : $_POST['txtNama'];
$dataNamaLm		= $dataShow['nama_merk'];
$dataKeterangan	= isset($dataShow['keterangan_merk']) ?  $dataShow['keterangan_merk'] : $_POST['txtKeterangan'];
$dataStatus		= isset($dataShow['status_merk']) ?  $dataShow['status_merk'] : $_POST['cmbStatus'];
	
?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Form Merk</span></div>
		<div class="actions">
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=datamerk" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmadd" class="form-horizontal form-bordered" >
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Kode :</label>
					<div class="col-md-2">
						<input class="form-control" type="text" value="<?php echo $dataKode; ?>" name="txtKode" readonly/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Nama Merk :</label>
					<div class="col-md-3">
						<input class="form-control" type="text" name="txtNama"  value="<?php echo $datajasa; ?>"/>
						<input class="form-control" type="hidden" name="txtLama"  value="<?php echo $dataNamaLm; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Keterangan :</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="txtKeterangan"  value="<?php echo $dataKeterangan; ?>"/>
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
			                <a href="?page=datamerk" class="btn blue"><i class="fa fa-undo"></i> Kembali</a>
			            </div>
			        </div>
			    </div>
			</div>
		</form>
	</div>
</div>