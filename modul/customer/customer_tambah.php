<?php
$qry	= mysqli_query($koneksi,"SELECT MAX(kode_customer) as kodeTerbesar FROM ms_customer ");
$row	= mysqli_fetch_array($qry); 
$kodeBarang = $row['kodeTerbesar'];


$urutan = (int) substr($kodeBarang, 3, 3);


$urutan++;

$huruf = "CTM";
$kodeBarang = $huruf . sprintf("%03s", $urutan);


	if(isset($_POST['btnSave'])){
		$message = array();
		if (trim($_POST['txtNama'])=="") {
			$message[] = "<b>Nama customer</b> tidak boleh kosong!";		
		}
		if (trim($_POST['txtTelpon'])=="") {
			$message[] = "<b>No. Telpon </b> tidak boleh kosong!";		
		}
		if (trim($_POST['cmbStatus'])=="") {
			$message[] = "<b>Status </b> tidak boleh kosong!";		
		}

		$txtNama		= $_POST['txtNama'];
		$txtAlamat		= $_POST['txtAlamat'];
		$txtTelpon		= $_POST['txtTelpon'];
		$txtJenis		= $_POST['txtJenis'];
		$cmbStatus		= $_POST['cmbStatus'];


		if(count($message)==0){		
			$kodeBaru	= $_POST['kode'];
			$qrySave=mysqli_query($koneksi,"INSERT INTO ms_customer SET kode_customer='$kodeBaru', 
															nama_customer='$txtNama', 
															telp_customer='$txtTelpon',
															status_customer='$cmbStatus'") or die ("Gagal query".mysqli_error());
			if($qrySave){
				$_SESSION['pesan'] = 'Data customer berhasil ditambahkan';
				echo '<script>window.location="?page=datacustomer"</script>';
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
	$dataKode		= $kodeBarang;
	$dataNama		= isset($_POST['txtNama']) ? $_POST['txtNama'] : '';
	$dataTelpon 	= isset($_POST['txtTelpon']) ? $_POST['txtTelpon'] : '';
	$dataStatus 	= isset($_POST['cmbStatus']) ? $_POST['cmbStatus'] : '';
?>
		 
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Form Pelanggan</span></div>
		<div class="actions">
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=datacustomer" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmadd" class="form-horizontal form-bordered" autocomplete='off'>
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Kode :</label>
					<div class="col-md-2">
						<input class="form-control" type="text" value="<?php echo $dataKode; ?>" name="kode" readonly/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Nama Customer :</label>
					<div class="col-md-5">
						<input class="form-control" name="txtNama" value="<?php echo $dataNama; ?>" type="text"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">No. Telp :</label>
					<div class="col-md-3">
						<input class="form-control" name="txtTelpon" value="<?php echo $dataTelpon; ?>" type="text"/>
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
			                <a href="?page=datacustomer" class="btn blue"><i class="fa fa-undo"></i> Kembali</a>
			            </div>
			        </div>
			    </div>
			</div>
		</form>
	</div>
</div>