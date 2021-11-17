<?php			
	if(isset($_POST['btnHapus'])){
		$txtID 		= $_POST['txtID'];
		foreach ($txtID as $id_key) {
				
			$hapus=mysqli_query($koneksi,"DELETE FROM ms_atm WHERE kode_atm='$id_key'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
				
			if($hapus){
				$_SESSION['pesan'] = 'Data berhasil dihapus';
				echo '<script>window.location="?page=dtatm"</script>';
			}	
		}
	}
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
				<span class="caption-subject uppercase bold hidden-xs">Data ATM & Cabang</span>
			</div>
			<div class="actions">
				<a href="?page=addatm" class="btn blue"><i class="icon-plus"></i></a>	
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
                      	<th width="9%"><div align="center">ID ATM</div></th>
                        <th width="30%">NAMA ATM</th>
						<th width="40%">LOKASI</th>
                      	<th width="9%"><div align="center">IP ATM</div></th>
			  	  	  	<th width="9%"><div align="center">STATUS</div></th>
                    </tr>
				</thead>
				<tbody>
                    <?php
						$dataSql = "SELECT * FROM ms_atm ORDER BY id_atm DESC";
						$dataQry = mysqli_query($koneksidb,$dataSql)  or die ("Query atm salah : ".mysqli_error());
						$nomor  = 0; 
						while ($data = mysqli_fetch_array($dataQry)) {
						$nomor++;
						$Kode = $data['id_atm'];
						if($data ['status_atm']=='Active'){
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
						<td><div align="center"><a href="?page=edtatm&amp;id=<?php echo base64_encode($Kode); ?>"><?php echo $data['kode_atm']; ?></a></div></td>
						<td><?php echo $data ['nama_atm']; ?></td>
						<td><?php echo $data ['alamat_atm']; ?></td>
						<td><?php echo $data ['ip_atm']; ?></td>
                        <td><div align="center"><?php echo $dataStatus ?></div></td>
                    </tr>
                    <?php } ?>
				</tbody>
            </table>
		</div>
	</div>
</form>