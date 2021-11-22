<?php
					
	// if(isset($_POST['btnHapus'])){
	// 	$txtID 		= $_POST['txtID'];
	// 	foreach ($txtID as $id_key) {
				
	// 		$hapus=mysqli_query($koneksi,"DELETE FROM tr_in WHERE kode_in='$id_key'") 
	// 			or die ("Gagal kosongkan tmp".mysqli_error());
			
	// 		if($hapus){	
	// 			$itmQry			= mysqli_query($koneksi,"SELECT * FROM tr_in_item WHERE kode_in='$id_key'") 
	// 			or die ("Gagal kosongkan tmp".mysqli_error());
	// 			while ($itmRow	= mysqli_fetch_assoc($itmQry)) {
	// 				$update=mysqli_query($koneksi,"UPDATE ms_barang SET stok_barang=stok_barang-$itmRow[jumlah_in] 
	// 									WHERE id_barang='".$itmRow['id_barang']."'") 
	// 				or die ("Gagal kosongkan tmp".mysqli_error());
	// 			}


	// 			$itemHapus=mysqli_query($koneksi,"DELETE FROM tr_in_item WHERE kode_in='$id_key'") 
	// 			or die ("Gagal kosongkan tmp".mysqli_error());
				
	// 			$_SESSION['pesan'] = 'Data penerimaan MHU Box berhasil dihapus';
	// 			echo '<script>window.location="?page=dtmhu"</script>';
	// 		}
			
	// 	}
	// }

	if(isset($_POST['btnApprove'])){
		$txtID 		= $_POST['txtID'];
		foreach ($txtID as $id_key) {		
			$hapus=mysqli_query($koneksi,"UPDATE tr_in SET status_in='Close' WHERE kode_in='$id_key'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
			
			if($hapus){	
				
				$_SESSION['pesan'] = 'Data pemasukan barang berhasil disetujui';
				echo '<script>window.location="?page=dtappmdmin"</script>';
			}
		}
	}
 ?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
	<div class="portlet box blue">
		<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">DETAIL APPROVAL PEMASUKAN BARANG MHU BOX</span></div>
			<div class="actions">	
				<button class="btn blue" name="btnApprove" type="submit" onclick="return confirm('Anda yakin ingin menyetujui data penting ini !!')"><i class="icon-check"></i></button>
				<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			</div>
		</div>
		<div class="portlet-body">     	
            <table class="table table-condensed table-bordered table-hover" id="sample_2">
				<thead>
                    <tr class="active">
       	  	  	  	  	<th class="table-checkbox" width="3%">
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                <span></span>
                            </label>
                        </th>
                        <th width="10%"><div align="center">NO. PENERIMAAN </div></th>
                      	<th width="14%"><div align="center">TGL. PENERIMAAN</div></th>
						<th width="40%">KETERANGAN</th>
						<th width="20%">DIBUAT OLEH</th>
						<th width="20%">STATUS</th>
                      	<th width="10%"><div align="center">LIHAT</div></th>
                    </tr>
				</thead>
				<tbody>
                    <?php
						
						$dataSql = "SELECT * FROM tr_in a
									INNER JOIN ms_user b ON a.kode_user=b.kode_user
									WHERE principal='MHU Box'
									ORDER BY a.kode_in DESC";
						$dataQry = mysqli_query($koneksi,$dataSql)  or die ("Query petugas salah : ".mysqli_error());
						$nomor  = 0; 
						while ($data = mysqli_fetch_array($dataQry)) {
						$nomor++;

						$Kode 		= $data['kode_in'];
							if($data ['status_in']=='Open'){
							$dataStatus= "<label class='label label-warning'>Pending</label>";
						}elseif($data ['status_in']=='Draft'){
							$dataStatus= "<label class='label label-danger'>Draft</label>";
						}else{
							$dataStatus= "<label class='label label-info'>Selesai</label>";
						}
						?>
					?>
                    <tr class="odd gradeX">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes" value="<?php echo $Kode; ?>" name="txtID[<?php echo $Kode; ?>]" />
                                <span></span>
                            </label>
                        </td>
						<td><div align="center"><?php echo $data ['kode_in']; ?></div></td>
						<td><div align="center"><?php echo date("d/m/Y", strtotime($data['tgl_in'])); ?></div></td>
						<td><?php echo $data ['keterangan_in']; ?></td>
						<td><?php echo $data ['kode_user']; ?> - <?php echo $data ['nama_user']; ?></td>
						<td><div align="center"><?php echo $dataStatus; ?></div></td>
						<td><div align="center"><a href="?page=dtappmhuin&amp;id=<?php echo base64_encode($Kode); ?>" class="btn btn-xs green"><i class="icon-book-open"></i></a></div></td>
                    </tr>
                    <?php } ?>
				</tbody>
            </table>
		</div>
	</div>
</form>