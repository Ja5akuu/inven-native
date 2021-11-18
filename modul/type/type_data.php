<?php
			
	if(isset($_POST['btnHapus'])){
		$txtID 		= $_POST['txtID'];
		foreach ($txtID as $id_key) {
				
			$hapus=mysqli_query($koneksi,"DELETE FROM ms_type WHERE kode_type='$id_key'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
				
			if($hapus){
				$_SESSION['pesan'] = 'Data type service berhasil dihapus';
				echo '<script>window.location="?page=datatype"</script>';
			}	
					
		}
	}
 ?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
	<div class="portlet box blue">
		<div class="portlet-title">
		<div class="caption"><span class="caption-subject uppercase bold hidden-xs">Data Suplier</span></div>
			<div class="actions">
				<a href="?page=tambahtype" class="btn blue"><i class="icon-plus"></i></a>	
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
                        <th width="10%"><div align="center">Kode Suplier</div></th>
                        <th width="30%">Nama Suplier</th>
						<th width="20%">Nama PIC</th>
						<th width="20%">No Telepon</th>
						<th width="400%">Alamat</th>
						<th width="30%">Bidang Usaha</th>
			  	  	  	<th width="11%"><div align="center">STATUS</div></th>
                    </tr>
				</thead>
				<tbody>
                    <?php
						$dataSql = "SELECT * FROM ms_type ORDER BY kode_type DESC";
						$dataQry = mysqli_query($koneksi,$dataSql)  or die ("Query petugas salah : ".mysqli_error());
						$nomor  = 0; 
						while ($data = mysqli_fetch_array($dataQry)) {
						$nomor++;
						$Kode = $data['kode_type'];
					?>
                   <tr class="odd gradeX">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes" value="<?php echo $Kode; ?>" name="txtID[<?php echo $Kode; ?>]" />
                                <span></span>
                            </label>
                        </td>
						<td><div align="center"><a href="?page=ubahtype&amp;id=<?php echo $data['kode_type']; ?>"><?php echo $data ['kode_type']; ?></a></div></td>
						<td><?php echo $data ['nama_type']; ?></td>
						<td><?php echo $data ['nama_pic']; ?></td>
						<td><?php echo $data ['no_telepon']; ?></td>
						<td><?php echo $data ['alamat_sup']; ?></td>
						<td><?php echo $data ['sup_note']; ?></td>
                        <td>
						  <div align="center">
						    <?php 
						if($data ['status_type']=='Active'){
							echo "<label class='label label-success'>Active</label>";
						}else{
							echo "<label class='label label-important'>Non Active</label>";
						}
						?>						
				        </div></td>
                    </tr>
                    <?php } ?>
				</tbody>
            </table>
		</div>
	</div>
</form>