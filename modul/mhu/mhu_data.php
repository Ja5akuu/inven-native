<?php
			
	if(isset($_POST['btnHapus'])){
		$txtID 		= $_POST['txtID'];
		foreach ($txtID as $id_key) {
				
			$hapus=mysql_query("DELETE FROM ms_barang WHERE id_barang='$id_key'", $koneksidb) 
				or die ("Gagal kosongkan tmp".mysql_error());
			
			if($hapus){	
				$_SESSION['pesan'] = 'Data barang dan item berhasil dihapus';
				echo '<script>window.location="?page=dtmhu"</script>';
			}else{
				$_SESSION['pesan'] = 'Tidak ada data yang dihapus';
				echo '<script>window.location="?page=dtmhu"</script>';
			}	
		}
	}
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
	<div class="portlet box blue">
		<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold">Data MHU Box</span></div>
			<div class="actions">
				<a href="?page=addmhu" class="btn blue"><i class="icon-plus"></i></a>	
				<button class="btn blue" name="btnHapus" type="submit" onclick="return confirm('Anda yakin ingin menghapus data penting ini !!')"><i class="icon-trash"></i></button>
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
                      	<th width="20%"><div align="center">SERIAL NUMBER </div></th>
						<th width="10%">MERK</th>
						<th width="30%">TYPE</th>
						<th width="5%"><div align="center">QTY</div></th>
					  	<th width="5%"><div align="center">STATUS</div></th>
                    </tr>
				</thead>
				<tbody>
                    <?php
						$dataSql = "SELECT * FROM ms_barang a
									LEFT JOIN ms_merk c ON a.kode_merk=c.kode_merk
									LEFT JOIN ms_type d ON a.kode_type=d.kode_type
									WHERE principal_barang='MHU Box'
									ORDER BY a.id_barang DESC";
						$dataQry = mysql_query($dataSql, $koneksidb)  or die ("Query petugas salah : ".mysql_error());
						$nomor  = 0; 
						while ($data = mysql_fetch_array($dataQry)) {
						$nomor++;
						$Kode = $data['id_barang'];
						if($data ['status_barang']=='Active'){
							$dataStatus= "<label class='label label-success'>Active</label>";
						}else{
							$dataStatus= "<label class='label label-danger'>Non Active</label>";
						}
					?>
                    <tr class="odd gradeX">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes" value="<?php echo $Kode; ?>" name="txtID[<?php echo $Kode; ?>]" />
                                <span></span>
                            </label>
                        </td>
						<td><div align="center"><a href="?page=edtmhu&amp;id=<?php echo base64_encode($Kode); ?>"><?php echo $data['kode_barang']; ?></a></div></td>
						<td><?php echo $data ['nama_merk']; ?></td>
						<td><?php echo $data ['nama_type']; ?></td>
						<td><div align="center"><?php echo $data ['stok_barang']; ?></div></td>
                        <td><div align="center"><?php echo $dataStatus; ?></div></td>
                    </tr>
                    <?php } ?>
				</tbody>
            </table>
		</div>
	</div>
</form>
