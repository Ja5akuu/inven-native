<?php
if($_POST) {
	if(isset($_POST['btnHapus'])){
		mysql_query("DELETE FROM tr_out_tmp WHERE id='".$_POST['btnHapus']."' AND kode_user='".$_SESSION['kode_user']."'", $koneksidb) 
				or die ("Gagal kosongkan tmp".mysql_error());
	}
	if(isset($_POST['btnUpdate'])){
		foreach ($_POST['id'] as $key=>$val) {
	        $txtIDItem      	= (int) $_POST['id'][$key];
	        $txtJumlahItm     	= $_POST['txtJumlahItm'][$key];
	        $txtKeteranganItm 	= $_POST['txtKeteranganItm'][$key];

	        $doSql ="UPDATE tr_out_tmp SET jumlah_out='$txtJumlahItm',
	        								keterangan='$txtKeteranganItm'
	        							WHERE id='$txtIDItem'";
	        $doQry = mysql_query($doSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
	    }
	}
	if(isset($_POST['btnBatal'])){
		mysql_query("DELETE FROM tr_out_tmp WHERE kode_user='".$_SESSION['kode_user']."'", $koneksidb) 
				or die ("Gagal kosongkan tmp".mysql_error());
				
				$_SESSION['pesan'] = 'Penerimaan barang berhasil dibatalkan, seluruh item barang dihapus';
				echo '<script>window.location="?page=dtout"</script>';
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
		$txtKeterangan		= $_POST['txtKeterangan'];
		
		if(count($message)==0){			
			$barangSql 		="SELECT * FROM ms_barang WHERE kode_barang='$cmbBarang'";
			$barangQry 		= mysql_query($barangSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
			$barangRow 		= mysql_fetch_assoc($barangQry);
			$barangQty 		= mysql_num_rows($barangQry);
			if ($barangQty >= 1) {
				$tmpSql = "INSERT INTO tr_out_tmp SET id_barang='$barangRow[id_barang]',
													jumlah_out='$txtJumlah', 
													keterangan='$txtKeterangan',
													kode_user='".$_SESSION['kode_user']."'";
				mysql_query($tmpSql, $koneksidb) or die ("Gagal Query detail barang : ".mysql_error());
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
		if (trim($_POST['txtTanggal'])=="") {
			$message[] = "Tgl Penerimaan belum diisi, silahkan pilih tanggal terlebih dahulu !";		
		}
		if (trim($_POST['cmbLayanan'])=="") {
			$message[] = "Data layanan belum diisi, silahkan pilih terlebih dahulu !";		
		}
		if (trim($_POST['cmbAtm'])=="") {
			$message[] = "Data ATM belum diisi, silahkan pilih terlebih dahulu !";		
		}
		if (trim($_POST['cmbCustomer'])=="") {
			$message[] = "Data customer belum diisi, silahkan pilih terlebih dahulu !";		
		}

		$tmpSql ="SELECT COUNT(*) As qty FROM tr_out_tmp WHERE kode_user='".$_SESSION['kode_user']."'";
		$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
		$tmpRow = mysql_fetch_array($tmpQry);
		if ($tmpRow['qty'] < 1) {
			$message[] = "Item barang belum ada yang dimasukan, minimal 1 barang & pelayanan.";
		}

		$laySql ="SELECT * FROM ms_layanan WHERE kode_layanan='".$_POST['cmbLayanan']."'";
		$layQry = mysql_query($laySql, $koneksidb) or die ("Gagal Query layanan Tmp".mysql_error());
		$layRow = mysql_fetch_array($layQry);
		if ($layRow['kembali_layanan']=='Y' AND empty($_POST['txtKembali'])) {
			$message[] = "Tgl. kembali belum ada yang dimasukan, silahkan isi terlebih dahulu";
		}
		
		$txtCatatan		= $_POST['txtCatatan'];
		$txtTanggal		= InggrisTgl($_POST['txtTanggal']);
		$cmbLayanan		= $_POST['cmbLayanan'];
		$cmbCustomer	= $_POST['cmbCustomer'];
		$cmbAtm			= $_POST['cmbAtm'];
		$cmbTeknisi		= $_POST['cmbTeknisi'];
		$txtKembali		= InggrisTgl($_POST['txtKembali']);
				
		if(count($message)==0){			
			$kodeBaru		= kodeUnik("tr_out", "kode_out", "".date('ymd')."", "10","tgl_out");
			$qrySave		= mysql_query("INSERT INTO tr_out SET kode_out='$kodeBaru', 
																tgl_out='$txtTanggal',  
																keterangan_out='$txtCatatan',
																created_out='".date('Y-m-d H:i:s')."',
																kode_layanan='$cmbLayanan',
																id_atm='$cmbAtm',
																kode_customer='$cmbCustomer',
																status_out='Open',
																tgl_kembali='$txtKembali',
																kode_user='$cmbTeknisi'") 
								  or die ("Gagal query".mysql_error());
			if($qrySave){
				$tmpSql ="SELECT * FROM tr_out_tmp WHERE kode_user='".$_SESSION['kode_user']."'";
				$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
				while ($tmpRow = mysql_fetch_array($tmpQry)) {
					$barangSql = "INSERT INTO tr_out_item SET kode_out='$kodeBaru', 
															id_barang='$tmpRow[id_barang]', 
															keterangan='$tmpRow[keterangan]',
															jumlah_out='$tmpRow[jumlah_out]'";
					mysql_query($barangSql, $koneksidb) or die ("Gagal Query Simpan detail barang".mysql_error());
					$barangSql = "UPDATE ms_barang SET stok_barang=stok_barang - $tmpRow[jumlah_out]
											WHERE id_barang='$tmpRow[id_barang]'";
					mysql_query($barangSql, $koneksidb) or die ("Gagal Query Edit Stok".mysql_error());

					
				}
				mysql_query("DELETE FROM tr_out_tmp WHERE kode_user='".$_SESSION['kode_user']."'", $koneksidb) 
						or die ("Gagal kosongkan tmp".mysql_error());
						
				$_SESSION['pesan'] = 'Pengeluaran barang dengan nomor transaksi '.$kodeBaru.' berhasil dibuat';
				echo '<script>window.location="?page=dtlout&id='.base64_encode($kodeBaru).'"</script>';
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
$nomorTransaksi = kodeUnik("tr_out", "kode_out", "".date('ymd')."", "10","tgl_out");
$dataTanggal 	= isset($_POST['txtTanggal']) ? $_POST['txtTanggal'] : date('d-m-Y');
$dataCatatan	= isset($_POST['txtCatatan']) ? $_POST['txtCatatan'] : '';
$dataCustomer	= isset($_POST['cmbCustomer']) ? $_POST['cmbCustomer'] : '';
$dataLayanan	= isset($_POST['cmbLayanan']) ? $_POST['cmbLayanan'] : '';
$dataAtm 		= isset($_POST['cmbAtm']) ? $_POST['cmbAtm'] : '';
$dataKembali	= isset($_POST['txtKembali']) ? $_POST['txtKembali'] : '';
$dataTeknisi	= isset($_POST['cmbTeknisi']) ? $_POST['cmbTeknisi'] : $_SESSION['kode_user'];
?>
		
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Form Pengeluaran Barang</span></div>
		<div class="actions">
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=dtout" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="fieldset-form" autocomplete="off">
			<div class="form-body">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label">No. Pengeluaran :</label>
						<input class="form-control" type="text" name="txtNomor" value="<?php echo $nomorTransaksi; ?>" disabled="disabled"/>
					</div>
					<div class="form-group">
						<label class="control-label">Tgl. Pengeluaran :</label>
						<input class="form-control date-picker" data-date-format="dd-mm-yyyy" type="text" name="txtTanggal" value="<?php echo $dataTanggal; ?>" readonly="readonly"/>
					</div>
					<div class="form-group">
						<label>Customer :</label>
						<select name="cmbCustomer" class="form-control select2" data-placeholder="Pilih Customer" tabindex="1">
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
					<div class="form-group">
						<label>Teknisi & Dibuat Oleh :</label>
						<select name="cmbTeknisi" class="form-control select2" data-placeholder="Pilih Teknisi" tabindex="1">
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
					<div class="form-group">
						<label class="control-label">Keterangan & Catatan :</label>
						<textarea class="form-control" type="text" name="txtCatatan" rows="10" /><?php echo $dataCatatan; ?></textarea>
					</div>
				</div>
				<div class="col-md-9">				
					<div class="row">
						<div class="col-md-4">
							<label>Pilih Barang & Item :</label>
							<div class="input-group">
                                <input class="form-control" type="text" name="cmbBarang" id="kode_barang" autofocus="on" />
                                <span class="input-group-btn">
                                    <a class="btn blue btn-block" data-toggle="modal" data-target="#barang"><i class="icon-magnifier-add"></i></a>
                                </span>
                            </div>
						</div>
						<div class="col-md-5">
							<label>Keterangan :</label>
                               <input type="text" class="form-control" name="txtKeterangan"/>
						</div>
						<div class="col-md-3">
							<label>Jumlah :</label>
							<div class="input-group">
                                <input type="tel" class="form-control" name="txtJumlah" value="1" onblur="if (value == '') {value = '1'}" onfocus="if (value == '1') {value =''}"/>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn blue btn-block" name="btnPilih"><i class="icon-plus"></i></button>
                                </span>
                            </div>
						</div>
					</div>
					<hr />
					<div class="scroller" data-height="300px">
					<table class="table table-hover table-bordered" width="100%" id="sample_1">
						<thead>
							<tr class="active">
						  	  	<th width="10%"><div align="center">UPDATE</div></th>
							  	<th width="10%">KODE</th>
								<th width="40%">NAMA BARANG </th>
								<th width="30%">KETERANGAN </th>
						  	  	<th width="10%"><div align="center">JUMLAH</div></th>
						  	  	<th width="10%"><div align="center">DELETE</div></th>
							</tr>
						</thead>
						<tbody>
							<?php
									$tmpSql ="SELECT * FROM tr_out_tmp a
												INNER JOIN ms_barang b ON a.id_barang=b.id_barang
												WHERE a.kode_user='".$_SESSION['kode_user']."'
												ORDER BY a.id DESC";
									$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
									$qtyBrg = 0; 
									$nomor	= 0;
									while($tmpRow = mysql_fetch_array($tmpQry)) {
										$ID			= $tmpRow['id'];
										$qtyBrg 	= $qtyBrg + $tmpRow['jumlah_in'];											
										$nomor++;
							?>
							<tr>
								<input type="hidden" name="id[]" value="<?php echo $ID; ?>">
								<td><div align="center"><button type="submit" class="btn btn-xs blue" name="btnUpdate" value="<?php echo $ID; ?>"><i class="fa fa-save"></i></div></td>
								<td><?php echo $tmpRow['kode_barang']; ?></td>
								<td><?php echo $tmpRow['nama_barang']; ?></td>
								<td><input type="text" name="txtKeteranganItm[]" class="form-control input-xs" value="<?php echo $tmpRow['keterangan'] ?>"></td>
								<td><div align="center"><input type="text" name="txtJumlahItm[]" class="form-control input-xs" value="<?php echo $tmpRow['jumlah_out'] ?>"></div></td>
								<td>
								<div align="center">
									<button type="submit" class="btn btn-xs blue" name="btnHapus" value="<?php echo $ID; ?>"><i class="icon-close"></i></button>
								</div>										
								</td>
							</tr>
							<?php } ?>
						</tbody>		
					</table>
					</div>
					<hr />
					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label>ATM & Cabang :</label>
								<select name="cmbAtm" class="form-control select2" data-placeholder="Pilih ATM" tabindex="1">
								  <option value=""> </option>
								  <?php
									  $dataSql = "SELECT * FROM ms_atm WHERE status_atm='Active' ORDER BY id_atm";
									  $dataQry = mysql_query($dataSql, $koneksidb) or die ("Gagal Query".mysql_error());
									  while ($dataRow = mysql_fetch_array($dataQry)) {
										if ($dataAtm == $dataRow['id_atm']) {
											$cek = " selected";
										} else { $cek=""; }
										echo "<option value='$dataRow[id_atm]' $cek>$dataRow[kode_atm] - $dataRow[nama_atm]</option>";
									  }
									  $sqlData ="";
								  ?>
							  	</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Layanan :</label>
								<select name="cmbLayanan" class="form-control select2" data-placeholder="Pilih Layanan" tabindex="1">
								  <option value=""> </option>
								  <?php
									  $dataSql = "SELECT * FROM ms_layanan WHERE status_layanan='Active' ORDER BY kode_layanan";
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
								<label class="control-label">Tgl. Kembali :</label>
								<input class="form-control date-picker" data-date-format="dd-mm-yyyy" type="text" name="txtKembali" value="<?php echo $dataKembali; ?>" readonly="readonly"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-actions">
            <button type="submit" class="btn blue" name="btnSave"><i class="fa fa-save"></i> Simpan</button>
			<button type="submit" class="btn blue" name="btnBatal"><i class="fa fa-remove"></i> Batalkan</button>
		</div>
		</form>
	</div>
</div>

<div class="modal fade bs-modal-lg" id="barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data Item Barang</h4>
            </div>
            <div class="modal-body"> 
            	<table class="table table-condensed table-bordered table-hover" width="100%" id="sample_2">
		            <thead>
		                <tr class="active">
		                  	<th width="50"><div align="center">KODE</div></th>
		                    <th width="400">NAMA BARANG</th>
		                    <th width="200">PRINCIPAL</th>
		                    <th width="200">MERK</th>
		                    <th width="300">TYPE</th>
		                    <th width="50"><div align="center">STOCK</div></th>
		                </tr>
		            </thead>
		            <tbody>
		                <?php
		                //Data mentah yang ditampilkan ke tabel    
		                $query = mysql_query("SELECT * FROM ms_barang a
												LEFT JOIN ms_principal b ON a.kode_principal=b.kode_principal
												LEFT JOIN ms_merk c ON a.kode_merk=c.kode_merk
												LEFT JOIN ms_type d ON a.kode_type=d.kode_type
												WHERE status_barang='Active' AND NOT stok_barang='0'
												ORDER BY a.id_barang DESC");
		                while ($data = mysql_fetch_array($query)) {
		                    ?>
		                    <tr class="pilihBarang" data-dismiss="modal" aria-hidden="true" 
								data-kode="<?php echo $data['kode_barang']; ?>">
		                        <td><div align="center"><?php echo $data['kode_barang']; ?></div></td>
		                        <td><?php echo $data['nama_barang']; ?></td>
		                        <td><?php echo $data['nama_principal']; ?></td>
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="./assets/scripts/jquery-1.11.2.min.js"></script>
<script src="./assets/scripts/bootstrap.js"></script>
<script type="text/javascript">
    $(document).on('click', '.pilihBarang', function (e) {
        document.getElementById("kode_barang").value = $(this).attr('data-kode');
    });
</script>	

				
										
								