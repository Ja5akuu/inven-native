<?php     
  if(isset($_POST['btnHapus'])){
    $txtID    = $_POST['txtID'];
    foreach ($txtID as $id_key) {
        
      $hapus=mysqli_query($koneksi,"DELETE FROM sys_group WHERE group_id='$id_key'") 
        or die ("Gagal kosongkan tmp".mysqli_error());
        
      if($hapus){
        $_SESSION['pesan'] = 'Data group berhasil dihapus';
        echo '<script>window.location="?page=datagroup"</script>';
      } 
    }
  }
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
  <div class="portlet box blue">
    <div class="portlet-title">
      <div class="caption">
        <span class="caption-subject uppercase bold hidden-xs">Data Group & Akses</span>
      </div>
      <div class="actions">
        <a href="?page=tambahgroup" class="btn blue"><i class="icon-plus"></i></a> 
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
            <th width="30%">NAMA GROUP</th>
            <th width="60%">KETERANGAN</th>
            <th width="10%"><div align="center">STATUS</div></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $dataSql = "SELECT * FROM sys_group ORDER BY group_id DESC";
            $dataQry = mysqli_query($koneksi,$dataSql)  or die ("Query supplier salah : ".mysqli_error());
            $nomor  = 0; 
            while ($data = mysqli_fetch_array($dataQry)) {
            $nomor++;
            $Kode = $data['group_id'];
          ?>
        <tr class="odd gradeX">
            <td>
                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                    <input type="checkbox" class="checkboxes" value="<?php echo $Kode; ?>" name="txtID[<?php echo $Kode; ?>]" />
                    <span></span>
                </label>
            </td>
            <td><div align="center"><?php echo $nomor; ?></div></td>
            <td><a href="?page=ubahgroup&amp;id=<?php echo $Kode; ?>"><?php echo $data['group_nama']; ?></a></td>
            <td><?php echo $data ['group_keterangan']; ?></td>
            <td>
              <div align="center">
                <?php 
                if($data ['group_status']=='Active'){
                  echo "<label class='label label-success'>Active</label>";
                }else{
                  echo "<label class='label label-danger'>Non Active</label>";
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