<?php
		
	if(isset($_POST['btnSave'])){
		$message = array();
		if (trim($_POST['txtNama'])=="") {
			$message[] = "Nama Lengkap tidak boleh kosong!";		
		}
		if (trim($_POST['txtUser'])=="") {
			$message[] = "Username tidak boleh kosong!";		
		}
		if (trim($_POST['cmbLevel'])=="BLANK") {
			$message[] = "Level tidak boleh kosong, silahkan pilih terlebih dahulu!";		
		}
		if (trim($_POST['cmbStatus'])=="") {
			$message[] = "status tidak boleh kosong!";		
		}
		if (trim($_POST['cmbKelamin'])=="") {
			$message[] = "jenis kelamin tidak boleh kosong!";		
		}
		if (trim($_POST['cmbJenis'])=="") {
			$message[] = "jenis user tidak boleh kosong!";		
		}
		
		$txtNama	= $_POST['txtNama'];
		$txtUser	= $_POST['txtUser'];
		$txtTelp	= $_POST['txtTelp'];
		$txtEmail	= $_POST['txtEmail'];
		$txtAlamat	= $_POST['txtAlamat'];
		$txtUserLm	= $_POST['txtUserLm'];
		$txtPassLama= $_POST['txtPassLama'];
		$txtPassBaru= $_POST['txtPassBaru'];
		$cmbLevel	= $_POST['cmbLevel'];
		$cmbStatus	= $_POST['cmbStatus'];
		$cmbKelamin	= $_POST['cmbKelamin'];
		$cmbJenis	= $_POST['cmbJenis'];

		$sqlCek="SELECT * FROM ms_user WHERE username_user='$txtUser' AND NOT(username_user='$txtUserLm')";
		$qryCek=mysqli_query($koneksi,$sqlCek) or die ("Eror Query".mysqli_error()); 
		if(mysqli_num_rows($qryCek)>=1){
			$message[] = "Maaf, Username <b> $ txtUsername </b> sudah ada, ganti dengan username lain";
		}
				
		if(count($message)==0){			
			if (trim($txtPassBaru)=="") {
				$sqlSub = " password_user='$txtPassLama'";
			}
			else {
				$sqlSub = "  password_user='".md5($txtPassBaru)."'";
			}
			
		
			$sqlSave="UPDATE ms_user SET nama_user='$txtNama', 
										telp_user='$txtTelp', 
										alamat_user='$txtAlamat', 
										username_user='$txtUser',
										$sqlSub, 
					  					user_group='$cmbLevel', 
					  					jenis_user='$cmbJenis',
										email_user='$txtEmail',
										kelamin_user='$cmbKelamin', 
										status_user='$cmbStatus' 
									WHERE kode_user='".$_POST['txtKode']."'";
			$qrySave=mysqli_query($koneksi,$sqlSave);
			if($qrySave){
				$_SESSION['pesan'] = 'Data admin & kasir berhasil diperbaharui';
				echo '<script>window.location="?page=datauser"</script>';
			}
		}	
		
		if (! count($message)==0 ){
			echo "<div class='alert alert-error'>";
				$Num=0;
				foreach ($message as $indeks=>$pesan_tampil) { 
				$Num++;
					echo "&nbsp;&nbsp;$Num. $pesan_tampil<br>";	
				} 
			echo "</div>"; 
		}
	} 
	$KodeEdit	= isset($_GET['id']) ?  $_GET['id'] : $_POST['txtKode']; 
	$sqlShow 	= "SELECT * FROM ms_user WHERE kode_user='$KodeEdit'";
	$qryShow 	= mysqli_query($koneksi,$sqlShow)  or die ("Query ambil data user salah : ".mysqli_error());
	$dataShow 	= mysqli_fetch_array($qryShow);

	$dataKode	= $dataShow['kode_user'];
	$dataNama	= isset($dataShow['nama_user']) ?  $dataShow['nama_user'] : $_POST['txtNama'];
	$dataTelp	= isset($dataShow['telp_user']) ?  $dataShow['telp_user'] : $_POST['txtTelp'];
	$dataAlamat	= isset($dataShow['alamat_user']) ?  $dataShow['alamat_user'] : $_POST['txtAlamat'];
	$dataUser	= isset($dataShow['username_user']) ?  $dataShow['username_user'] : $_POST['txtUser'];
	$dataUserLm	= $dataShow['username_user'];
	$dataPass	= isset($dataShow['password_user']) ?  $dataShow['password_user'] : $_POST['txtPassBaru'];
	$dataLevel 	= isset($dataShow['user_group']) ?  $dataShow['user_group'] : $_POST['cmbLevel'];
	$dataStatus = isset($dataShow['status_user']) ?  $dataShow['status_user'] : $_POST['cmbStatus'];
	$dataEmail	= isset($dataShow['email_user']) ?  $dataShow['email_user'] : $_POST['txtEmail'];
	$dataKelamin= isset($dataShow['kelamin_user']) ?  $dataShow['kelamin_user'] : $_POST['cmbKelamin'];
	$dataJenis	= isset($dataShow['jenis_user']) ?  $dataShow['jenis_user'] : $_POST['cmbJenis'];
			

?>
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption">
            <span class="caption-subject uppercase bold">Form Admin & User</span>
        </div>
		<div class="actions">
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=datauser" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
			<div class="form-body">
				<div class="form-group">
					<label class="col-lg-2 control-label">Kode :</label>
					<div class="col-lg-2">
						<input class="form-control" type="text" value="<?php echo $dataKode; ?>" readonly="readonly" name="txtKode"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Nama Lengkap :</label>
					<div class="col-lg-5">
						<input class="form-control" type="text" name="txtNama" value="<?php echo $dataNama; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Alamat :</label>
					<div class="col-lg-10">
						<textarea class="form-control" name="txtAlamat" type="text"/><?php echo $dataAlamat; ?></textarea>
					</div>
				</div>
				<div class="form-group">
	                <label class="col-md-2 control-label">Jenis Kelamin :</label>
	                <div class="col-md-10">
	                    <div class="md-radio-list">
	                    	<?php
								if($dataKelamin=='Pria'){
				                    echo " 	<div class='md-radio'>
				                    			<input type='radio' id='radio50' name='cmbKelamin' value='Pria' class='md-radiobtn' checked>
				                            	<label for='radio50'><span></span><span class='check'></span><span class='box'></span> Pria </label>
				                            </div>
				                        	<div class='md-radio'>
				                            	<input type='radio' id='radio51' name='cmbKelamin' value='Wanita' class='md-radiobtn'>
				                            	<label for='radio51'><span></span><span class='check'></span><span class='box'></span> Wanita </label>
				                        	</div>";
				                }elseif($dataKelamin=='Wanita'){
				                	echo "	<div class='md-radio'>
				                            	<input type='radio' id='radio50' name='cmbKelamin' value='Pria' class='md-radiobtn'>
				                            	<label for='radio50'><span></span><span class='check'></span><span class='box'></span> Pria </label>
				                        	</div>
				                        	<div class='md-radio'>
				                            	<input type='radio' id='radio51' name='cmbKelamin' value='Wanita' class='md-radiobtn' checked>
				                            	<label for='radio51'><span></span><span class='check'></span><span class='box'></span> Wanita </label>
				                            </div>";
				                }else{
				                	echo "	<div class='md-radio'>
				                            	<input type='radio' id='radio50' name='cmbKelamin' value='Pria' class='md-radiobtn'>
				                            	<label for='radio50'><span></span><span class='check'></span><span class='box'></span> Pria </label>
				                        	</div>
				                        	<div class='md-radio'>
				                            	<input type='radio' id='radio51' name='cmbKelamin' value='Wanita' class='md-radiobtn'>
				                            	<label for='radio51'><span></span><span class='check'></span><span class='box'></span> Wanita </label>
				                            </div>";
				                }
				            ?>
	                    </div>
	                </div>
	            </div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Username :</label>
					<div class="col-lg-3">
						<input class="form-control" type="text" name="txtUser"  value="<?php echo $dataUser; ?>"/>
						<input name="txtUserLm" type="hidden" value="<?php echo $dataUserLm; ?>" />
					</div>
				</div>
				<div class="form-group">
                    <label class="col-md-2 control-label">Password :</label>
                    <div class="col-md-9">
                        <div class="input-inline input-medium">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <input class="form-control" name="txtPassBaru" type="password" />
                                <input name="txtPassLama" type="hidden" value="<?php echo $dataPass; ?>" />
                           </div>
                        </div>
                        <span class="help-inline"> Kosongkan apabila tidak diubah. </span>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-lg-2 control-label">No. Telp :</label>
					<div class="col-lg-3">
						<input class="form-control" name="txtTelp" type="text" value="<?php echo $dataTelp; ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Email :</label>
					<div class="col-lg-3">
						<input class="form-control" name="txtEmail" type="text" value="<?php echo $dataEmail; ?>"/>
					</div>
				</div>	
				<div class="form-group">
		    	    <label class="col-lg-2 control-label">Jenis User :</label>
		    	    <div class="col-lg-3">
			        	<select class="form-control select2" data-placeholder="Pilih Jenis" name="cmbJenis">
		                	<option value=""></option>
		               		<?php
							  $pilihan	= array("Admin", "Teknisi");
							  foreach ($pilihan as $nilai) {
								if ($dataJenis==$nilai) {
									$cek=" selected";
								} else { $cek = ""; }
								echo "<option value='$nilai' $cek>$nilai</option>";
							  }
							?>
		              	</select>
		            </div>
		        </div>				
				<div class="form-group">
					<label class="col-lg-2 control-label">Level Group :</label>
					<div class="col-lg-2">
						<select name="cmbLevel" class="select2 form-control" data-placeholder="Pilih Level">
							<option value="BLANK"> </option>
							<?php
							  $dataSql = "SELECT * FROM sys_group ORDER BY group_id DESC";
							  $dataQry = mysqli_query($koneksi,$dataSql) or die ("Gagal Query".mysqli_error());
							  while ($dataRow = mysqli_fetch_array($dataQry)) {
								if ($dataLevel == $dataRow['group_id']) {
									$cek = " selected";
								} else { $cek=""; }
								echo "<option value='$dataRow[group_id]' $cek>$dataRow[group_nama]</option>";
							  }
							  $sqlData ="";
							?>
						</select>
					</div>
				</div>
				<div class="form-group last">
	                <label class="col-md-2 control-label">Status User :</label>
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
			                <a href="?page=datauser" class="btn blue"><i class="fa fa-undo"></i> Kembali</a>
			            </div>
			        </div>
			    </div>
			</div>
		</form>
	</div>
</div>