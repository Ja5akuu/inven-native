<?php
if($_POST) {
	if(isset($_POST['btnHapus'])){
		mysqli_query($koneksi,"DELETE FROM tr_out_tmp WHERE id='".$_POST['btnHapus']."' AND kode_user='".$_SESSION['kode_user']."'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
	}
	if(isset($_POST['btnUpdate'])){
		foreach ($_POST['id'] as $key=>$val) {
	        $txtIDItem      	= (int) $_POST['id'][$key];
	        $txtJumlahItm     	= $_POST['txtJumlahItm'][$key];

	        $doSql ="UPDATE tr_out_tmp SET jumlah_out='$txtJumlahItm' WHERE id='$txtIDItem'";
	        $doQry = mysqli_query($koneksi,$doSql) or die ("Gagal Query Tmp".mysqli_error());
	    }
	}
	if(isset($_POST['btnBatal'])){
		mysqli_query($koneksi,"DELETE FROM tr_out_tmp WHERE kode_user='".$_SESSION['kode_user']."'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
				
				$_SESSION['pesan'] = 'Pengeluaran berhasil dibatalkan, seluruh item barang dihapus';
				echo '<script>window.location="?page=dtpartout"</script>';
	}
	if(isset($_POST['btnPilih'])){
		$message = array();
		if (trim($_POST['cmbBarang'])=="") {
			$message[] = "Kode barang belum diisi, silahkan pilih barang dan layanan terlebih dahulu !";		
		}
		if (trim($_POST['txtJumlah'])=="" OR ! is_numeric(trim($_POST['txtJumlah']))) {
			$message[] = "Data Jumlah barang (Qty) belum diisi, silahkan isi dengan angka !";		
		}
	
		$cmbBarang			= $_POST['cmbBarang'];
		$txtJumlah			= $_POST['txtJumlah'];
		
		if(count($message)==0){			
			$barangSql 		="SELECT * FROM ms_barang WHERE kode_barang='$cmbBarang'";
			$barangQry 		= mysqli_query($koneksi,$barangSql) or die ("Gagal Query Tmp".mysqli_error());
			$barangRow 		= mysqli_fetch_assoc($barangQry);
			$barangQty 		= mysqli_num_rows($barangQry);
			if ($barangQty >= 1) {
				$tmpSql = "INSERT INTO tr_out_tmp SET id_barang='$barangRow[id_barang]',
													jumlah_out='$txtJumlah', 
													kode_user='".$_SESSION['kode_user']."'";
				mysqli_query($koneksi,$tmpSql) or die ("Gagal Query detail barang : ".mysqli_error());
				$txtKode	= "";
				$txtJumlah	= "";
			}
			else {
				$message[] = "Tidak ada barang dengan kode $cmbBarang, silahkan ganti";
			}
		}

	}
	
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
		
		$cmbLayanan			= $_POST['cmbLayanan'];
		$txtIP				= $_POST['txtIP'];
		$txtIDAtm			= $_POST['txtIDAtm'];
		$cmbTeknisi			= $_POST['cmbTeknisi'];
		$cmbCustomer		= $_POST['cmbCustomer'];
		$txtRincian			= $_POST['txtRincian'];
		$txtTglTransaksi	= ($_POST['txtTglTransaksi']);
		$cmbLokasi			= $_POST['cmbLokasi'];
		$txtLainnya			= $_POST['txtLainnya'];
		$txtTglPengerjaan	= ($_POST['txtTglPengerjaan']);
		$cmbBarang			= $_POST['cmbBarang'];
		$txtJumlah			= $_POST['txtJumlah'];
		$txtAlamat 			= $_POST['txtAlamat'];
		if (empty($cmbBarang)) {
			$tmpSql ="SELECT COUNT(*) As qty FROM tr_in_tmp WHERE kode_user='".$_SESSION['kode_user']."'";
			$tmpQry = mysqli_query($koneksi,$tmpSql) or die ("Gagal Query Tmp".mysqli_error());
			$tmpRow = mysqli_fetch_array($tmpQry);
			if ($tmpRow['qty'] < 1) {
				$message[] = "Item barang belum ada yang dimasukan, minimal 1 barang & pelayanan.";
			}
		}
				
		if(count($message)==0){			
			$kodeBaru		= kodeUnik("tr_out", "kode_out", "".date('ymd')."", "10","tgl_out");
			// UPLOAD CSR
			if (! empty($_FILES['txtCSR']['tmp_name'])) {
				$file_csr = $_FILES['txtCSR']['name'];
				$file_csr = stripslashes($file_csr);
				$file_csr = str_replace("'","",$file_csr);
					
				$file_csr = $kodeBaru."_".$file_csr;
				copy($_FILES['txtCSR']['tmp_name'],"photo/".$file_csr);
			}
			else {
				$file_csr = "";
			}
			// UPLOAD IMAGE 1
			if (! empty($_FILES['txtImage1']['tmp_name'])) {
				$file_image_1 = $_FILES['txtImage1']['name'];
				$file_image_1 = stripslashes($file_image_1);
				$file_image_1 = str_replace("'","",$file_image_1);
					
				$file_image_1 = $kodeBaru."_".$file_image_1;
				copy($_FILES['txtImage1']['tmp_name'],"photo/".$file_image_1);
			}
			else {
				$file_image_1 = "";
			}
			
			if($_POST['btnSave']=='Draft'){
				$dataStatus='Draft';
			}else{
				$dataStatus='Open';
			}
			$qrySave		= mysqli_query("INSERT INTO tr_out SET kode_out='$kodeBaru', 
																tgl_out='$txtTglTransaksi',  
																principal='Part',
																keterangan_out='$txtRincian',
																kode_customer='$cmbCustomer',
																kode_layanan='$cmbLayanan',
																lokasi_pengerjaan='$cmbLokasi',
																lokasi_lainnya='$txtLainnya',
																status_out='$dataStatus',
																kode_teknisi='$cmbTeknisi',
																tgl_pengerjaan='$txtTglPengerjaan',
																id_atm='$txtIDAtm',
																alamat_pelanggan='$txtAlamat',
																ip_atm='$txtIP',
																file_csr='$file_csr',
																file_image_1='$file_image_1',
																file_image_2='$file_image_2',
																created_out='".date('Y-m-d H:i:s')."',
																kode_user='".$_SESSION['kode_user']."'") 
								  or die ("Gagal query".mysqli_error());
			if(!empty($cmbBarang)){
				$barangSql 		="SELECT * FROM ms_barang WHERE kode_barang='$cmbBarang'";
				$barangQry 		= mysqli_query($koneksi,$barangSql) or die ("Gagal Query Tmp".mysqli_error());
				$barangRow 		= mysqli_fetch_assoc($barangQry);
				$barangQty 		= mysqli_num_rows($barangQry);
				if ($barangQty >= 1) {
					$save = "INSERT INTO tr_out_item SET kode_out='$kodeBaru', 
														id_barang='$barangRow[id_barang]', 
														jumlah_out='$txtJumlah'";
					mysqli_query($koneksi,$save) or die ("Gagal Query Simpan detail barang".mysqli_error());
					if($save){
						$stock = "UPDATE ms_barang SET stok_barang=stok_barang - $txtJumlah
												WHERE id_barang='$barangRow[id_barang]'";
						mysqli_query($koneksi,$stock) or die ("Gagal Query Edit Stok".mysqli_error());
					}
				}
				else {
					$message[] = "Tidak ada barang dengan kode $cmbBarang, silahkan ganti";
				}				
			}	
			if($qrySave){
				$tmpSql ="SELECT * FROM tr_out_tmp WHERE kode_user='".$_SESSION['kode_user']."'";
				$tmpQry = mysqli_query($koneksi,$tmpSql) or die ("Gagal Query Tmp".mysqli_error());
				while ($tmpRow = mysql_fetch_array($tmpQry)) {
					$barangSql = "INSERT INTO tr_out_item SET kode_out='$kodeBaru', 
															id_barang='$tmpRow[id_barang]', 
															jumlah_out='$tmpRow[jumlah_out]'";
					mysqli_query($barangSql, $koneksi) or die ("Gagal Query Simpan detail barang".mysqli_error());
					$barangSql = "UPDATE ms_barang SET stok_barang=stok_barang - $tmpRow[jumlah_out]
											WHERE id_barang='$tmpRow[id_barang]'";
					mysqli_query($koneksi,$barangSql) or die ("Gagal Query Edit Stok".mysqli_error());

					
				}
				mysqli_query($koneksi,"DELETE FROM tr_out_tmp WHERE kode_user='".$_SESSION['kode_user']."'") 
						or die ("Gagal kosongkan tmp".mysqli_error());
					
				$_SESSION['pesan'] = 'Pengeluaran barang dengan nomor transaksi '.$kodeBaru.' berhasil dibuat';
				echo '<script>window.location="?page=dtlpartout&id='.base64_encode($kodeBaru).'"</script>';
			}
			else{
				$message[] = "Gagal penyimpanan ke database";
			}
		}	
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
$nomorTransaksi 	= kodeUnik("tr_in", "kode_in", "".date('ymd')."", "10","tgl_in");
$dataTglTransaksi 	= isset($_POST['txtTglTransaksi']) ? $_POST['txtTglTransaksi'] : date('Y-m-d');
$dataTglPengerjaan	= isset($_POST['txtTglPengerjaan']) ? $_POST['txtTglPengerjaan'] : '';
$dataCustomer		= isset($_POST['cmbCustomer']) ? $_POST['cmbCustomer'] : '';
$dataLayanan		= isset($_POST['cmbLayanan']) ? $_POST['cmbLayanan'] : '';
$dataAlamat			= isset($_POST['txtAlamat']) ? $_POST['txtAlamat'] : '';
$dataLokasi			= isset($_POST['cmbLokasi']) ? $_POST['cmbLokasi'] : '';
if($dataLokasi=='LAINNYA'){
	$disable 		= '';
}else{
	$disable 		= 'disabled';
}
$dataLainnya		= isset($_POST['txtLainnya']) ? $_POST['txtLainnya'] : '';
$dataIP				= isset($_POST['txtIP']) ? $_POST['txtIP'] : '';
$dataIDAtm			= isset($_POST['txtIDAtm']) ? $_POST['txtIDAtm'] : '';
$dataRincian		= isset($_POST['txtRincian']) ? $_POST['txtRincian'] : '';
?>
<SCRIPT language="JavaScript">
function submitform() {
    document.form1.submit();
}
</SCRIPT>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="fieldset-form" autocomplete="off" name="form1" enctype="multipart/form-data">	
	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Form Pengeluaran Part MHU</span></div>
			<div class="actions">
				<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
				<button type="submit" class="btn blue" name="btnBatal"><i class="icon-close"></i></button>
			</div>
		</div>
		<div class="portlet-body form">
			<div class="form-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">No. Pengeluaran :</label>
							<input class="form-control" type="text" value="<?php echo $nomorTransaksi; ?>" disabled="disabled"/>
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
							<label class="control-label">Nama Pelanggan :</label>
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
							<label class="control-label">Jenis Layanan :</label>
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
							<label class="control-label">Lokasi :</label>
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
							<label class="control-label">Lainnya :</label>
							<input class="form-control" type="text" name="txtLainnya" value="<?php echo $dataLainnya; ?>" <?php echo $disable ?>/>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">IP ATM :</label>
							<input class="form-control" type="text" name="txtIP" value="<?php echo $dataIP; ?>"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label">Alamat Pelanggan :</label>
							<textarea class="form-control" type="text" name="txtAlamat"><?php echo $dataAlamat; ?></textarea>
						</div>
					</div>
				</div>
				<div class="batas"></div>	

				<div class="note note-success"><i class="icon-info"></i> Klik tombol add item apabila data stok masuk lebih dari 2 barang berbeda</div>		
				<div class="row">
					<div class="col-md-3">
						<label>Serial Number :</label>
						<div class="input-group">
                            <input class="form-control" type="text" name="cmbBarang" id="kode_barang" autofocus="on" />
                            <span class="input-group-btn">
                                <a class="btn blue btn-block" data-toggle="modal" data-target="#barang"><i class="icon-magnifier"></i></a>
                            </span>
                        </div>
					</div>
					<div class="col-md-3">
						<label>Nama Modem :</label>
                        <input type="text" class="form-control" id="nama_barang" disabled/>
					</div>
					<div class="col-md-3">
						<label>Type Modem :</label>
                        <input type="text" class="form-control" id="nama_type" disabled />
					</div>
					<div class="col-md-3">
						<label>Jumlah :</label>
                        <input type="tel" class="form-control" name="txtJumlah" value="1" onblur="if (value == '') {value = '1'}" onfocus="if (value == '1') {value =''}"/>
					</div>
				</div>
				<div class="batas"></div>	
				<table class="table table-hover table-condensed" width="100%" id="sample_1">
					<thead>
						<tr class="active">
					  	  	<th width="10%"><div align="center">UPDATE</div></th>
						  	<th width="10%">KODE</th>
							<th width="40%">NAMA BARANG </th>
							<th width="30%">MERK </th>
							<th width="30%">TYPE </th>
					  	  	<th width="10%"><div align="center">JUMLAH</div></th>
					  	  	<th width="10%"><div align="center">DELETE</div></th>
						</tr>
					</thead>
					<tbody>
						<?php
								$tmpSql ="SELECT * FROM tr_out_tmp a
											INNER JOIN ms_barang b ON a.id_barang=b.id_barang
											LEFT JOIN ms_merk c ON b.kode_merk=c.kode_merk
											LEFT JOIN ms_type d ON b.kode_type=d.kode_type
											WHERE a.kode_user='".$_SESSION['kode_user']."'
											ORDER BY a.id DESC";
								$tmpQry = mysqli_query($koneksi,$tmpSql) or die ("Gagal Query Tmp".mysqli_error());
								$qtyBrg = 0; 
								$nomor	= 0;
								while($tmpRow = mysqli_fetch_array($tmpQry)) {
									$ID			= $tmpRow['id'];
									$qtyBrg 	= $qtyBrg + $tmpRow['jumlah_out'];											
									$nomor++;
						?>
						<tr>
							<input type="hidden" name="id[]" value="<?php echo $ID; ?>">
							<td><div align="center"><button type="submit" class="btn btn-xs blue" name="btnUpdate" value="<?php echo $ID; ?>"><i class="fa fa-save"></i></div></td>
							<td><?php echo $tmpRow['kode_barang']; ?></td>
							<td><?php echo $tmpRow['nama_barang']; ?></td>
							<td><?php echo $tmpRow['nama_merk']; ?></td>
							<td><?php echo $tmpRow['nama_type']; ?></td>
							<td><div align="center"><input type="text" name="txtJumlahItm[]" class="form-control input-xsmall" value="<?php echo $tmpRow['jumlah_out'] ?>"></div></td>
							<td>
							<div align="center">
								<button type="submit" class="btn btn-xs blue" name="btnHapus" value="<?php echo $ID; ?>"><i class="icon-close"></i></button>
							</div>										
							</td>
						</tr>
						<?php } ?>
					</tbody>		
				</table>
				<div class="batas"></div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Upload CSR/BAM :</label>
	                        <input type="file" class="form-control" name="txtCSR" value="<?php echo $dataCSR ?>" />
	                    </div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label">Upload Image :</label>
	                        <input type="file" class="form-control" name="txtImage1" value="<?php echo $dataImage1 ?>" />
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
			<div class="form-actions">
	            <button type="submit" class="btn blue" name="btnPilih" onclick="return confirm('Anda yakin ingin menambah data modem lainnya?')"><i class="fa fa-plus-circle"></i> Add Item</button>
	            <button type="submit" class="btn blue" name="btnSave"><i class="fa fa-save"></i> Save</button>
				<button type="submit" class="btn blue" name="btnBatal"><i class="fa fa-remove"></i> Cancel</button>
	            <button type="submit" class="btn blue" name="btnSave" value="Draft"><i class="fa fa-save"></i> Save to Draft</button>
			</div>
		</div>
	</div>
</form>

<div class="modal fade bs-modal-lg" id="barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Part MHU</h4>
            </div>
            <div class="modal-body"> 
            	<table class="table table-condensed table-bordered table-hover" width="100%" id="sample_2">
		            <thead>
		                <tr class="active">
		                  	<th width="150"><div align="center">KODE</div></th>
		                    <th width="400">NAMA BARANG</th>
		                    <th width="200">MERK</th>
		                    <th width="200">TYPE</th>
		                    <th width="50"><div align="center">STOCK</div></th>
		                </tr>
		            </thead>
		            <tbody>
		                <?php
		                //Data mentah yang ditampilkan ke tabel    
		                $query = mysqli_query($koneksi,"SELECT * FROM ms_barang a
												LEFT JOIN ms_merk c ON a.kode_merk=c.kode_merk
												LEFT JOIN ms_type d ON a.kode_type=d.kode_type
												WHERE status_barang='Active'
												AND principal_barang='Part'
												ORDER BY a.id_barang DESC");
		                while ($data = mysqli_fetch_array($query)) {
		                    ?>
		                    <tr class="pilihBarang" data-dismiss="modal" aria-hidden="true" 
								data-kode="<?php echo $data['kode_barang']; ?>"
								data-nama="<?php echo $data['nama_barang']; ?>"
								data-type="<?php echo $data['nama_type']; ?>">
		                        <td><div align="center"><?php echo $data['kode_barang']; ?></div></td>
		                        <td><?php echo $data['nama_barang']; ?></td>
		                        <td><?php echo $data['nama_merk']; ?></td>
		                        <td><?php echo $data['nama_type']; ?></td>
		                        <td><div align="center"><?php echo $data['stok_barang']; ?></div></td>
		                    </tr>
		                    <?php
		                }
		                ?>
		            </tbody>
		        </table> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn blue" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="./assets/scripts/jquery-1.11.2.min.js"></script>
<script src="./assets/scripts/bootstrap.js"></script>
<script type="text/javascript">
    $(document).on('click', '.pilihBarang', function (e) {
        document.getElementById("kode_barang").value = $(this).attr('data-kode');
        document.getElementById("nama_barang").value = $(this).attr('data-nama');
        document.getElementById("nama_type").value = $(this).attr('data-type');
    });
</script>	

				
										
								