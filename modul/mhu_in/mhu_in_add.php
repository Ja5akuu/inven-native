<?php
if($_POST) {
	if(isset($_POST['btnHapus'])){
		mysql_query("DELETE FROM tr_in_tmp WHERE id='".$_POST['btnHapus']."' AND kode_user='".$_SESSION['kode_user']."'", $koneksidb) 
				or die ("Gagal kosongkan tmp".mysql_error());
	}
	if(isset($_POST['btnUpdate'])){
		foreach ($_POST['id'] as $key=>$val) {
	        $txtIDItem      	= (int) $_POST['id'][$key];
	        $txtJumlahItm     	= $_POST['txtJumlahItm'][$key];

	        $doSql ="UPDATE tr_in_tmp SET jumlah_in='$txtJumlahItm' WHERE id='$txtIDItem'";
	        $doQry = mysql_query($doSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
	    }
	}
	if(isset($_POST['btnBatal'])){
		mysql_query("DELETE FROM tr_in_tmp WHERE kode_user='".$_SESSION['kode_user']."'", $koneksidb) 
				or die ("Gagal kosongkan tmp".mysql_error());
				
				$_SESSION['pesan'] = 'Penerimaan barang berhasil dibatalkan, seluruh item barang dihapus';
				echo '<script>window.location="?page=dtmhuin"</script>';
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
			$barangQry 		= mysql_query($barangSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
			$barangRow 		= mysql_fetch_assoc($barangQry);
			$barangQty 		= mysql_num_rows($barangQry);
			if ($barangQty >= 1) {
				$tmpSql = "INSERT INTO tr_in_tmp SET id_barang='$barangRow[id_barang]',
													jumlah_in='$txtJumlah', 
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
		
		$txtCatatan		= $_POST['txtCatatan'];
		$txtTanggal		= InggrisTgl($_POST['txtTanggal']);
		$cmbBarang		= $_POST['cmbBarang'];
		$txtJumlah		= $_POST['txtJumlah'];
		if (empty($cmbBarang)) {
			$tmpSql ="SELECT COUNT(*) As qty FROM tr_in_tmp WHERE kode_user='".$_SESSION['kode_user']."'";
			$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
			$tmpRow = mysql_fetch_array($tmpQry);
			if ($tmpRow['qty'] < 1) {
				$message[] = "Item barang belum ada yang dimasukan, minimal 1 barang & pelayanan.";
			}
		}
				
		if(count($message)==0){			
			$kodeBaru		= kodeUnik("tr_in", "kode_in", "".date('ymd')."", "10","tgl_in");
			$qrySave		= mysql_query("INSERT INTO tr_in SET kode_in='$kodeBaru', 
																tgl_in='$txtTanggal',  
																principal='MHU Box',
																keterangan_in='$txtCatatan',
																created_in='".date('Y-m-d H:i:s')."',
																kode_user='".$_SESSION['kode_user']."'") 
								  or die ("Gagal query".mysql_error());
			if(!empty($cmbBarang)){
				$barangSql 		="SELECT * FROM ms_barang WHERE kode_barang='$cmbBarang'";
				$barangQry 		= mysql_query($barangSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
				$barangRow 		= mysql_fetch_assoc($barangQry);
				$barangQty 		= mysql_num_rows($barangQry);
				if ($barangQty >= 1) {
					$save = "INSERT INTO tr_in_item SET kode_in='$kodeBaru', 
														id_barang='$barangRow[id_barang]', 
														jumlah_in='$txtJumlah'";
					mysql_query($save, $koneksidb) or die ("Gagal Query Simpan detail barang".mysql_error());
					if($save){
						$stock = "UPDATE ms_barang SET stok_barang=stok_barang + $txtJumlah
												WHERE id_barang='$barangRow[id_barang]'";
						mysql_query($stock, $koneksidb) or die ("Gagal Query Edit Stok".mysql_error());
					}
				}
				else {
					$message[] = "Tidak ada barang dengan kode $cmbBarang, silahkan ganti";
				}				
			}	
			if($qrySave){
				$tmpSql ="SELECT * FROM tr_in_tmp WHERE kode_user='".$_SESSION['kode_user']."'";
				$tmpQry = mysql_query($tmpSql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
				while ($tmpRow = mysql_fetch_array($tmpQry)) {
					$barangSql = "INSERT INTO tr_in_item SET kode_in='$kodeBaru', 
															id_barang='$tmpRow[id_barang]', 
															jumlah_in='$tmpRow[jumlah_in]'";
					mysql_query($barangSql, $koneksidb) or die ("Gagal Query Simpan detail barang".mysql_error());
					$barangSql = "UPDATE ms_barang SET stok_barang=stok_barang + $tmpRow[jumlah_in]
											WHERE id_barang='$tmpRow[id_barang]'";
					mysql_query($barangSql, $koneksidb) or die ("Gagal Query Edit Stok".mysql_error());

					
				}
				mysql_query("DELETE FROM tr_in_tmp WHERE kode_user='".$_SESSION['kode_user']."'", $koneksidb) 
						or die ("Gagal kosongkan tmp".mysql_error());
					
				$_SESSION['pesan'] = 'Penerimaan barang dengan nomor transaksi '.$kodeBaru.' berhasil dibuat';
				echo '<script>window.location="?page=dtlmhuin&id='.base64_encode($kodeBaru).'"</script>';
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
$nomorTransaksi = kodeUnik("tr_in", "kode_in", "".date('ymd')."", "10","tgl_in");
$tglTransaksi 	= isset($_POST['cmbTanggal']) ? $_POST['cmbTanggal'] : date('d-m-Y');
$dataCatatan	= isset($_POST['txtCatatan']) ? $_POST['txtCatatan'] : '';
?>
		
<div class="portlet box blue">
	<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Form Penerimaan MHU Box</span></div>
		<div class="actions">
			<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			<a href="?page=dtmhuin" class="btn blue"><i class="icon-close"></i></a>
		</div>
	</div>
	<div class="portlet-body form">
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="fieldset-form" autocomplete="off">
			<div class="form-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">No. Penerimaan :</label>
							<div class="input-icon left">
								<i class="fa fa-barcode"></i>
								<input class="form-control" type="text" name="txtNomor" value="<?php echo $nomorTransaksi; ?>" disabled="disabled"/>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Tgl. Penerimaan :</label>
							<div class="input-icon left">
								<i class="icon-calendar"></i>
								<input class="form-control date-picker" data-date-format="dd-mm-yyyy" type="text" name="txtTanggal" value="<?php echo $tglTransaksi; ?>" readonly="readonly"/>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Dibuat Oleh :</label>
							<div class="input-icon left">
								<i class="icon-user"></i>
								<input class="form-control" type="text" value="<?php echo $userRow['nama_user']; ?>" disabled/>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label class="control-label">Keterangan :</label>
							<input class="form-control" type="text" name="txtCatatan" value="<?php echo $dataCatatan; ?>"/>
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
						<label>Nama MHU Box :</label>
                          <input type="text" class="form-control" id="nama_barang" disabled/>
					</div>
					<div class="col-md-3">
						<label>Type MHU :</label>
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
							<th width="40%">NAMA MHU BOX </th>
							<th width="30%">MERK </th>
							<th width="30%">TYPE </th>
					  	  	<th width="10%"><div align="center">JUMLAH</div></th>
					  	  	<th width="10%"><div align="center">DELETE</div></th>
						</tr>
					</thead>
					<tbody>
						<?php
								$tmpSql ="SELECT * FROM tr_in_tmp a
											INNER JOIN ms_barang b ON a.id_barang=b.id_barang
											LEFT JOIN ms_merk c ON b.kode_merk=c.kode_merk
											LEFT JOIN ms_type d ON b.kode_type=d.kode_type
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
							<td><?php echo $tmpRow['nama_merk']; ?></td>
							<td><?php echo $tmpRow['nama_type']; ?></td>
							<td><div align="center"><input type="text" name="txtJumlahItm[]" class="form-control input-xsmall" value="<?php echo $tmpRow['jumlah_in'] ?>"></div></td>
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
			<div class="form-actions">
	            <button type="submit" class="btn blue" name="btnPilih" onclick="return confirm('Anda yakin ingin menambah data modem lainnya?')"><i class="fa fa-plus-circle"></i> Add Item</button>
	            <button type="submit" class="btn blue" name="btnSave"><i class="fa fa-save"></i> Save</button>
				<button type="submit" class="btn blue" name="btnBatal"><i class="fa fa-remove"></i> Cancel</button>
			</div>
		</form>
	</div>
</div>

<div class="modal fade bs-modal-lg" id="barang" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Data MHU Box</h4>
            </div>
            <div class="modal-body"> 
            	<table class="table table-condensed table-bordered table-hover" width="100%" id="sample_2">
		            <thead>
		                <tr class="active">
		                  	<th width="150"><div align="center">KODE</div></th>
		                    <th width="400">NAMA MHU BOX</th>
		                    <th width="200">MERK</th>
		                    <th width="200">TYPE</th>
		                    <th width="50"><div align="center">STOCK</div></th>
		                </tr>
		            </thead>
		            <tbody>
		                <?php
		                //Data mentah yang ditampilkan ke tabel    
		                $query = mysql_query("SELECT * FROM ms_barang a
												LEFT JOIN ms_merk c ON a.kode_merk=c.kode_merk
												LEFT JOIN ms_type d ON a.kode_type=d.kode_type
												WHERE status_barang='Active'
												AND principal_barang='MHU Box'
												ORDER BY a.id_barang DESC");
		                while ($data = mysql_fetch_array($query)) {
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

				
										
								