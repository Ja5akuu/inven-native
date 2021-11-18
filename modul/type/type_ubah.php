<?php
	if(isset($_POST['btnSave'])){
		$message = array();
		if (trim($_POST['txttype'])=="") {
			$message[] = "Nama type tidak boleh kosong!";		
		}
		if (trim($_POST['txtKeterangan'])=="") {
			$message[] = "Keterangan tidak boleh kosong!";		
		}
		if (trim($_POST['cmbStatus'])=="") {
			$message[] = "Status tidak boleh kosong!";		
		}
				
		$txtkodsup		= $_POST['txtkodsup'];
		$txttype		= $_POST['txttype'];
		$txtpic			= $_POST['txtpic'];
		$txtalamat		= $_POST['txtalamat'];
		$txttelepon		= $_POST['txttelepon'];
		$txtnote		= $_POST['txtnote'];
		$txtKeterangan	= $_POST['txtKeterangan'];
		$cmbStatus		= $_POST['cmbStatus'];
				
		$sqlCek="SELECT * FROM ms_type WHERE nama_type='$txttype' AND NOT(nama_type='$txtLama')";
		echo $sqlCek;
		die;
		$qryCek=mysqli_query($koneksi,$sqlCek) or die ("Eror Query".mysqli_error()); 
		if(mysqli_num_rows($qryCek)>=1){
			$message[] = "Maaf, type service <b> $txttype </b> sudah ada, ganti dengan type lain";
		}
				
		if(count($message)==0){	
			$qryUpdate=mysqli_query($koneksi,"UPDATE ms_type SET      nama_kodsup='$txtkodsup',
															nama_type='$txttype',
															nama_pic='$txtpic',
															alamat_sup='$txtalamat',
															no_telepon='$txttelepon',
															sup_note='$txtnote', 
														keterangan_type='$txtKeterangan',
														status_type='$cmbStatus'	
													WHERE kode_type ='".$_POST['txtKode']."'") 
				   or die ("Gagal query update".mysqli_error());
			if($qryUpdate){
				$_SESSION['pesan'] = 'Data type service berhasil diperbaharui';
						echo '<script>window.location="?page=datatype"</script>';
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

$sqlShow 		= "SELECT * FROM ms_type WHERE kode_type='$KodeEdit'";
$qryShow 		= mysqli_query($koneksi,$sqlShow)  or die ("Query ambil data type salah : ".mysqli_error());
$dataShow 		= mysqli_fetch_array($qryShow);

$dataKode		= $dataShow['kode_type'];
$datakodsup		= isset($dataShow['nama_kodsup']) ?  $dataShow['nama_kodsup'] : $_POST['txtkodsup'];
$datatype		= isset($dataShow['nama_type']) ?  $dataShow['nama_type'] : $_POST['txttype'];
$dataNamaLm		= $dataShow['nama_type'];
$datapic		= isset($dataShow['nama_pic']) ?  $dataShow['nama_pic'] : $_POST['txtpic'];
$dataalamat		= isset($dataShow['alamat_sup']) ?  $dataShow['alamat_sup'] : $_POST['txtalamat'];
$datatelepon	= isset($dataShow['no_telepon']) ?  $dataShow['no_telepon'] : $_POST['txttelepon'];
$datanote		= isset($dataShow['sup_note']) ?  $dataShow['sup_note'] : $_POST['txtnote'];
$dataKeterangan	= isset($dataShow['keterangan_type']) ?  $dataShow['keterangan_type'] : $_POST['txtKeterangan'];
$dataStatus		= isset($dataShow['status_type']) ?  $dataShow['status_type'] : $_POST['cmbStatus'];
	
?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Forms Suplier</span></div>
		<div class="actions">
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=datatype" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmadd" class="form-horizontal form-bordered">
			<div class="form-body">
				<div class="form-group">
					<label class="col-md-2 control-label">Kode :</label>
					<div class="col-md-2">
						<input class="form-control" type="text" value="<?php echo $dataKode; ?>" name="txtKode" readonly/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Kode Suplier :</label>
					<div class="col-md-5">
						<input class="form-control" type="text" name="txtkodsup"  value="<?php echo $datakodsup; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Nama Suplier :</label>
					<div class="col-md-5">
						<input class="form-control" type="text" name="txttype"  value="<?php echo $datatype; ?>"/>
						<input class="form-control" type="hidden" name="txtLama"  value="<?php echo $dataNamaLm; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Nama PIC :</label>
					<div class="col-md-5">
						<input class="form-control" type="text" name="txtpic"  value="<?php echo $datapic; ?>"/>
						</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Alamat :</label>
					<div class="col-md-5">
						<input class="form-control" type="text" name="txtalamat"  value="<?php echo $dataalamat; ?>"/>
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Telpon :</label>
					<div class="col-md-5">
						<input class="form-control" type="text" name="txttelepon"  value="<?php echo $datatelepon; ?>"/>
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label">Catatan :</label>
					<div class="col-md-5">
						<input class="form-control" type="text" name="txtnote"  value="<?php echo $datanote; ?>"/>
						
					</div>
				</div>
				<div class="form-group">
		    	    <label class="col-lg-2 control-label">Keterangan :</label>
		    	    <div class="col-lg-3">
			        	<select class="form-control select2" data-placeholder="Pilih Keterangan" name="txtKeterangan">
		                	<option value=""></option>
		               		<?php
							  $pilihan	= array("Barang", "MHU","Part");
							  foreach ($pilihan as $nilai) {
								if ($dataKeterangan==$nilai) {
									$cek=" selected";
								} else { $cek = ""; }
								echo "<option value='$nilai' $cek>$nilai</option>";
							  }
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
			                <a href="?page=datatype" class="btn blue"><i class="fa fa-undo"></i> Kembali</a>
			            </div>
			        </div>
			    </div>
			</div>
		</form>
	</div>
</div>