<?php
	// Menghapus Data
	if(isset($_POST['btnHapus'])){
		$txtID 		= $_POST['txtID'];
		foreach ($txtID as $id_key) {
				
			$hapus=mysqli_query($koneksi,"DELETE FROM sys_submenu WHERE submenu_id='$id_key'") 
				or die ("Gagal kosongkan tmp".mysqli_error());
					if($hapus){
            $_SESSION['pesan'] = 'Data modul berhasil dihapus';
            echo '<script>window.location="?page=datamodul"</script>';
          }
		
        }
	}	
	
	
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
	<div class="portlet box blue">
	    <div class="portlet-title">
	        <div class="caption">
	            <span class="caption-subject uppercase bold hidden-xs">Data Menu & Modul</span>
	        </div>
	        <div class="actions">
				<a href="?page=tambahmodul" class="btn blue"><i class="icon-plus"></i></a>
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
                        <th width="37%">NAMA MODUL</th>
                        <th width="22%"> MENU</th>
						<th width="23%">LINK</th>
						<th width="16%"><div align="center">URUTAN</div></th>
                    </tr>
				</thead>
				<tbody>
               <?php
						$dataSql = "SELECT * FROM sys_submenu a
									INNER JOIN sys_menu b ON a.submenu_menu=b.menu_id
									ORDER BY a.submenu_id ASC";
						$dataQry = mysqli_query($koneksi,$dataSql);
						$nomor  = 0; 
						while ($data = mysqli_fetch_assoc($dataQry)) {
						$nomor++;
						$Kode = $data['submenu_id'];
				?>
                    <tr class="odd gradeX">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes" value="<?php echo $Kode; ?>" name="txtID[<?php echo $Kode; ?>]" />
                                <span></span>
                            </label>
                        </td>
						<td><div align="center"><?php echo $nomor ?></div></td>
						<td><a href="?page=ubahmodul&amp;id=<?php echo $Kode; ?>"><?php echo $data ['submenu_nama']; ?></a></td>
						<td><?php echo $data['menu_nama']; ?></td>
						<td><?php echo $data['submenu_link']; ?></td>
						<td>
						  <div align="center">
						    <?php echo $data ['submenu_urutan'] ?>						
				        </div></td>
                    </tr>
                    <?php } ?>
				</tbody>
            </table>
	    </div>
	</div>
</form>
    	