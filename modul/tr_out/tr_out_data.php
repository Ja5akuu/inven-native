<?php
					
	if(isset($_POST['btnHapus'])){
		$txtID 		= $_POST['txtID'];
		foreach ($txtID as $id_key) {
				
			$hapus=mysqli_query($koneksi,"DELETE FROM tr_out WHERE kode_out='$id_key'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
			
			if($hapus){	
				$itmQry			= mysqli_query($koneksi,"SELECT * FROM tr_out_item WHERE kode_out='$id_key'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
				while ($itmRow	= mysqli_fetch_assoc($itmQry)) {
					$update=mysqli_query($koneksi,"UPDATE ms_barang SET stok_barang=stok_barang+$itmRow[jumlah_out] 
										WHERE id_barang='".$itmRow['id_barang']."'") 
					or die ("Gagal kosongkan tmp".mysqli_error());
				}


				$itemHapus=mysqli_query($koneksi,"DELETE FROM tr_out_item WHERE kode_out='$id_key'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
				
				$_SESSION['pesan'] = 'Data pengeluaran barang berhasil dihapus';
				echo '<script>window.location="?page=dtout"</script>';
			}
			
		}
	}
 ?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal">
	<div class="portlet box blue">
		<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Daftar Pengeluaran Barang</span></div>
			<div class="actions">
				<a href="?page=addout" class="btn blue"><i class="icon-plus"></i></a>	
				<button class="btn blue" name="btnHapus" type="submit" onclick="return confirm('Anda yakin ingin menghapus data penting ini !!')"><i class="icon-trash"></i></button>
				<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
			</div>
		</div>
		<div class="portlet-body">     	
            <table class="table table-condensed table-bordered table-hover" id="sample_2">
				<thead>
                    <tr>
       	  	  	  	  	<th class="table-checkbox" width="3%">
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                <span></span>
                            </label>
                        </th>
                        <th width="10%"><div align="center">NO. PENGELUARAN </div></th>
                        <th width="15%"><div align="center">TGL. PENGELUARAN</div></th>
						<th width="20%">NAMA PELANGGAN</th>
					  	<th width="15%">LAYANAN</th>
						<th width="20%">TEKNISI</th>
                        <th width="10%"><div align="center">STATUS</div></th>
                    </tr>
				</thead>
				<tbody>
                    <?php
						$dataSql = "SELECT * FROM tr_out a
									INNER JOIN ms_user b ON a.kode_user=b.kode_user
									LEFT JOIN ms_customer c ON a.kode_customer=c.kode_customer
									LEFT JOIN ms_layanan d ON a.kode_layanan=d.kode_layanan
									LEFT JOIN ms_atm e ON a.id_atm=e.id_atm
									ORDER BY a.kode_out DESC";
						$dataQry = mysqli_query($koneksi,$dataSql)  or die ("Query petugas salah : ".mysqli_error());
						$nomor  = 0; 
						while ($data = mysqli_fetch_array($dataQry)) {
						$nomor++;
						$Kode 		= $data['kode_out'];
						$qryItm		= mysqli_query($koneksi,"SELECT 
														SUM(harga_penjualan*jumlah_penjualan) as total 
													FROM tr_penjualan_item 
													WHERE kode_penjualan='$Kode'");
						$dataItm	= mysqli_fetch_assoc($qryItm);
						if($data ['status_out']=='Open'){
							$dataStatus= "<label class='label label-warning'>Open</label>";
						}else{
							$dataStatus= "<label class='label label-info'>Approved</label>";
						}
					?>
                    <tr class="odd gradeX">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes" value="<?php echo $Kode; ?>" name="txtID[<?php echo $Kode; ?>]" />
                                <span></span>
                            </label>
                        </td>
						<td><div align="center"><a href="?page=dtlout&amp;id=<?php echo base64_encode($Kode); ?>"><?php echo $Kode; ?></a></div></td>
						<td><div align="center"><?php echo date("d/m/Y H:i", strtotime($data ['tgl_out'])); ?></div></td>
						<td><?php echo $dataSupplier; ?></td>
                        <td><?php echo $data ['nama_layanan']; ?></td>
                        <td><?php echo $data ['nama_user']; ?></td>
						<td><div align="center"><?php echo $dataStatus; ?></div></td>
                    </tr>
                    <?php } ?>
				</tbody>
            </table>
			</div>
		</div>
	</div>
</form>