<?php
			
	if(isset($_POST['btnHapus'])){
		$txtID 		= $_POST['txtID'];
		foreach ($txtID as $id_key) {
				
			mysqli_query($koneksi,"DELETE FROM ms_user WHERE kode_user='$id_key'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
					
		}
	}
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
	<div class="portlet box blue">
	    <div class="portlet-title">
	        <div class="caption">
	            <span class="caption-subject uppercase bold hidden-xs">Daftar Admin & User</span>
	        </div>
	        <div class="actions">
				<a href="?page=tambahuser" class="btn blue"><i class="icon-plus"></i></a>
				<button class="btn blue" name="btnHapus" type="submit" onclick="return confirm('Anda yakin ingin menghapus data penting ini !!')"><i class="icon-trash"></i></button>
				<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a> 
			</div>
		</div>
    	<div class="portlet-body">
           <table class="table table-condensed table-bordered table-hover" id="sample_2">
				<thead>
                    <tr class="active">
       	  	  	  	  	<th class="table-checkbox">
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                <span></span>
                            </label>
                        </th>
						<th width="5%"><div align="center">NO</div></th>
						<th width="10%"><div align="center">KODE</div></th>
                        <th width="25%">NAMA USER</th>
                        <th width="20%">USERNAME</th>
						<th width="25%">EMAIL</th>
						<th width="13%">GROUP LEVEL</th>
						<th width="9%"><div align="center">STATUS</div></th>
                    </tr>
				</thead>
				<tbody>
               <?php
						$dataSql = "SELECT * FROM ms_user a 
									INNER JOIN sys_group b ON a.user_group=b.group_id
									ORDER BY kode_user DESC";
						$dataQry = mysqli_query($koneksi,$dataSql)  or die ("Query petugas salah : ".mysqli_error());
						$nomor  = 0; 
						while ($data = mysqli_fetch_array($dataQry)) {
						$nomor++;
						$Kode = $data['kode_user'];
				?>
                    <tr class="odd gradeX">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes" value="<?php echo $Kode; ?>" name="txtID[<?php echo $Kode; ?>]" />
                                <span></span>
                            </label>
                        </td>
						<td><div align="center"><?php echo $nomor ?></div></td>
						<td><div align="center"><a href="?page=ubahuser&amp;id=<?php echo $data['kode_user']; ?>"><?php echo $data ['kode_user']; ?></a></div></td>
						<td><?php echo $data ['nama_user']; ?></td>
						<td><?php echo $data ['username_user']; ?></td>
						<td><?php echo $data ['email_user']; ?></td>
						<td><?php echo $data ['group_nama']; ?></td>
						<td>
						  <div align="center">
						    <?php 
						if($data ['status_user']=='Active'){
							echo "<label class='label label-success'>Active</label>";
						}else{
							echo "<label class='label label-danger'>Non Active</label>";
						}
						?>						
				        </div></td>
                    </tr>
                    <?php
                        
                    }
                    ?>
				</tbody>
            </table>
  		</div>
	</div>
</form>