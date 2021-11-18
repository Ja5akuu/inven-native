<?php	
	$dataPrincipal	= isset($_POST['cmbPrincipal']) ? $_POST['cmbPrincipal'] : '';
	$dataMerk		= isset($_POST['cmbMerk']) ? $_POST['cmbMerk'] : '';
	$dataType		= isset($_POST['cmbType']) ? $_POST['cmbType'] : '';
 ?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="fieldset-form">
	<div class="portlet box blue">
	    <div class="portlet-title">
	        <div class="caption">
	            <span class="caption-subject uppercase bold">Laporan Stok Barang & Item</span>
	        </div>
	        <div class="actions">
	        	<a href="<?php $_SERVER['PHP_SELF']; ?>" class="btn blue"><i class="icon-refresh"></i></a>
				<a href="?page=home" class="btn blue"><i class="icon-close"></i></a>
	        </div>
		</div>
		<div class="portlet-body">
			<div class="row">
				<div class="col-lg-3">	
					<div class="form-group">
						<label class="control-label">Departemen :</label>
						<select class="form-control select2" data-placeholder="Pilih Principal" name="cmbPrincipal">
			                <option value="%">Tampil Semua</option>
			                <?php
								  $pilihan	= array("Purchasing", "HRGA Pusat", "HRGA Batam");
								  foreach ($pilihan as $nilai) {
									if ($dataPrincipal==$nilai) {
										$cek=" selected";
									} else { $cek = ""; }
									echo "<option value='$nilai' $cek>$nilai</option>";
								  }
							?>
			            </select>
					</div>
				</div>
				<div class="col-lg-3">	
					<div class="form-group">
						<label class="control-label">Merk Barang :</label>
						<select name="cmbMerk" class="form-control select2" data-placeholder="Pilih Merk">
						  <option value="%"> PILIH SEMUA</option>
						  <?php
							  $dataSql = "SELECT * FROM ms_merk WHERE status_merk='Active' ORDER BY kode_merk";
							  $dataQry = mysqli_query($koneksi,$dataSql) or die ("Gagal Query".mysqli_error());
							  while ($dataRow = mysqli_fetch_array($dataQry)) {
								if ($dataMerk == $dataRow['kode_merk']) {
									$cek = " selected";
								} else { $cek=""; }
								echo "<option value='$dataRow[kode_merk]' $cek>$dataRow[nama_merk]</option>";
							  }
							  $sqlData ="";
						  ?>
					  	</select>
					</div>
				</div>
				<div class="col-lg-5">	
					<div class="form-group">
						<div class="controls" style="margin-top: 25px">
							<button type="submit" class="btn blue" name="btnTampil"><i class="icon-magnifier-add"></i></button>
							<?php
			                	if(isset($_POST['btnTampil'])){
			                ?>
							 <button name="bar" type="button" onClick="pdf()" class="btn red"><i class="fa fa-print"></i></button>
							 <a href="./output/excel_rpt_barang.php?princ=<?php echo $dataPrincipal; ?>&merk=<?php echo $dataMerk; ?>" target="_BLANK" class="btn green-seagreen"><i class="fa fa-file-excel-o"></i></a>
			                <?php } ?>
						</div>
					</div>
				</div>
				
			</div>	
			<hr>
			<table class="table table-condensed table-bordered table-hover " id="sample_1">
				<thead>
                    <tr class="active">
               	  	  	<th width="2%"><div align="center">NO</div></th>
                        <th width="8%"><div align="center">KODE BARANG</div></th>
                        <th width="35%"><div align="left">NAMA BARANG</div></th>
						<th width="15%">PRINCIPAL</th>
						<th width="15%">KATEGORI</th>
						<th width="25%">VENDOR</th>
                      	<th width="13%"><div align="center">STOK</div></th>
                    </tr>
				</thead>
				<tbody>
                    <?php
                    if(isset($_POST['btnTampil'])){
						$dataPrincipal	= $_POST['cmbPrincipal'];
						$dataMerk		= $_POST['cmbMerk'];
															
						$dataSql = mysqli_query($koneksi,"SELECT * FROM ms_barang a
												LEFT JOIN ms_merk c ON a.kode_merk=c.kode_merk
												LEFT JOIN ms_type d ON a.kode_type=d.kode_type
												WHERE a.principal_barang LIKE '$dataPrincipal'
												AND c.kode_merk LIKE '$dataMerk'
												ORDER BY a.kode_barang ASC");
					}
					$nomor  		= 0;
					$jumlahStok		= 0;
					while($dataRow	= mysqli_fetch_array($dataSql)){
						$nomor ++;
						$jumlahStok	= $jumlahStok + $dataRow['stok_barang'];
						
                    ?>
                    <tr>
                        <td><div align="center"><?php echo $nomor;?></div></td>
						<td><div align="center"><?php echo $dataRow['kode_barang']; ?></div></td>
						<td><div align="left"><?php echo $dataRow['nama_barang']; ?></div></td>
						<td><?php echo $dataRow['principal_barang']; ?></td>
						<td><?php echo $dataRow['nama_merk']; ?></td>
						<td><?php echo $dataRow['nama_type']; ?></td>
                        <td><div align="center"><?php echo number_format($dataRow['stok_barang']); ?></div></td>
                    </tr>
                    <?php } ?>
				</tbody>
				<tfoot>
                    <tr>
               	  	  	<th colspan="6"><div align="right">SUBTOTAL : </div></th>
						<th width="8%"><div align="center"><?php echo number_format($jumlahStok); ?></div></th>
                    </tr>
				</tfoot>
            </table>
	  </div>
  		</div>
	</div>
</div>
<script type="text/javascript"> 
    function pdf()	 
    { 
    win=window.open('./output/print_rpt_barang.php?princ=<?php echo $dataPrincipal; ?>&merk=<?php echo $dataMerk; ?>','win','width=1500, height=600, menubar=0, scrollbars=1, resizable=0, status=0'); 
    } 
</script>