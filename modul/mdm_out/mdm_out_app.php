<?php
					
	if(isset($_POST['btnApprove'])){
		$txtID 		= $_POST['txtID'];
		foreach ($txtID as $id_key) {		
			$hapus=mysqli_query($koneksi,"UPDATE tr_out SET status_out='Close' WHERE kode_out='$id_key'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
			
			if($hapus){	
				
				$_SESSION['pesan'] = 'Data pengeluaran barang berhasil disetujui';
				echo '<script>window.location="?page=dtappmdmout"</script>';
			}
		}
	}
 ?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form-horizontal">
	<div class="portlet box blue">
		<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Data Approval Pengeluaran Barang</span></div>
			<div class="actions">	
				<button class="btn blue" name="btnApprove" type="submit" onclick="return confirm('Anda yakin ingin menyetujui data penting ini !!')"><i class="icon-check"></i></button>
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
						<th width="20%">NAMA PROJECT</th>
					  	<th width="15%">PIC LAPANGAN</th>
						<th width="20%">PIC PROJECT</th>
                        <th width="10%"><div align="center">STATUS</div></th>
                      	<th width="10%"><div align="center">LIHAT</div></th>
                    </tr>
				</thead>
				<tbody>
                    <?php
						$dataSql = "SELECT * FROM tr_out a
									INNER JOIN ms_user b ON a.kode_teknisi=b.kode_user
									LEFT JOIN ms_customer c ON a.kode_customer=c.kode_customer
									LEFT JOIN ms_layanan d ON a.kode_layanan=d.kode_layanan
									WHERE a.principal='Purchasing' AND NOT status_out='Draft'
									ORDER BY a.kode_out DESC";
						$dataQry = mysqli_query($koneksi,$dataSql)  or die ("Query petugas salah : ".mysqli_error());
						$nomor  = 0; 
						while ($data = mysqli_fetch_array($dataQry)) {
						$nomor++;
						$Kode 		= $data['kode_out'];
						
						if($data ['status_out']=='Open'){
							$dataStatus= "<label class='label label-warning'>Pending</label>";
						}elseif($data ['status_out']=='Draft'){
							$dataStatus= "<label class='label label-danger'>Draft</label>";
						}else{
							$dataStatus= "<label class='label label-info'>Selesai</label>";
						}
					?>
                    <tr class="odd gradeX">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes" value="<?php echo $Kode; ?>" name="txtID[<?php echo $Kode; ?>]" />
                                <span></span>
                            </label>
                        </td>
						<td><div align="center"><?php echo $Kode; ?></div></td>
						<td><div align="center"><?php echo date("d/m/Y H:i", strtotime($data ['tgl_out'])); ?></div></td>
						<td><?php echo $data['nama_customer']; ?></td>
                        <td><?php echo $data['nama_layanan']; ?></td>
                        <td><?php echo $data['nama_user']; ?></td>
						<td><div align="center"><?php echo $dataStatus; ?></div></td>
						<td><div align="center"><a href="?page=dtlappmdmout&amp;id=<?php echo base64_encode($Kode); ?>" class="btn btn-xs green"><i class="icon-book-open"></i></a></div></td>
                    </tr>
                    <?php } ?>
				</tbody>
            </table>
			</div>
		</div>
	</div>
</form>