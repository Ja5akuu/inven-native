<?php
		
	$tglAwal		= isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : date('d-m-Y');
	$tglAkhir		= isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : date('d-m-Y');
	$dataCustomer	= isset($_POST['cmbCustomer']) ? $_POST['cmbCustomer'] : '';
	$dataPrincipal	= isset($_POST['cmbPrincipal']) ? $_POST['cmbPrincipal'] : '';
	
 ?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="fieldset-form">
	<div class="portlet box blue">
	    <div class="portlet-title">
	        <div class="caption">
	            <span class="caption-subject uppercase bold">Laporan Pengeluaran Barang</span>
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
						<label class="control-label">Principal :</label>
						<div class="controls" style="margin-top: 6px">
							<select class="form-control select2" data-placeholder="Pilih Principal" name="cmbPrincipal">
				                <option value="%">Tampil Semua</option>
				                <?php
									  $pilihan	= array("Purchasing", "MHU Box", "Part");
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
				</div>
				<div class="col-lg-4">	
					<div class="form-group">
						<label>Periode Transaksi :</label>
						<div class="controls" style="margin-top: 6px">
								<div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
								<input type="text" class="form-control" name="txtTglAwal" value="<?php echo $tglAwal ?>">
								<span class="input-group-addon">
								to </span>
								<input type="text" class="form-control" name="txtTglAkhir" value="<?php echo $tglAkhir ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">	
					<div class="form-group">
						<label>Pelanggan & Customer :</label>
						<div class="controls" style="margin-top: 6px">
							<select name="cmbCustomer" class="form-control select2" data-placeholder="Pilih Pelanggan" tabindex="1">
							  <option value="%"> PILIH SEMUA</option>
							  <?php
								  $dataSql = "SELECT * FROM ms_customer WHERE status_customer='Active' ORDER BY kode_customer";
								  $dataQry = mysqli_query($koneksi,$dataSql) or die ("Gagal Query".mysqli_error());
								  while ($dataRow = mysqli_fetch_array($dataQry)) {
									if ($dataCustomer == $dataRow['kode_customer']) {
										$cek = " selected";
									} else { $cek=""; }
									echo "<option value='$dataRow[kode_customer]' $cek>$dataRow[nama_customer]</option>";
								  }
								  $sqlData ="";
							  ?>
						  	</select>
						
						</div>
					</div>
				</div>
				<div class="col-lg-2">	
					<div class="form-group">
						<div class="controls" style="margin-top: 30px">
							<button type="submit" class="btn blue" name="btnTampil"><i class="icon-magnifier-add"></i></button>
							<?php
	                    	if(isset($_POST['btnTampil'])){
		                    ?>
							<button name="bar" type="button" onClick="cetak()" class="btn red"><i class="fa fa-print"></i></button>
							<a href="./output/excel_rpt_out.php?princ=<?php echo $dataPrincipal; ?>&awal=<?php echo InggrisTgl($tglAwal); ?>&akhir=<?php echo InggrisTgl($tglAkhir) ?>&cus=<?php echo $dataCustomer ?>" target="_BLANK" class="btn green-seagreen"><i class="fa fa-file-excel-o"></i></a>
		                    <?php } ?>
						</div>
					</div>
				</div>
				
			</div>	
			<hr>
			<table class="table table-condensed table-bordered table-hover" id="sample_1">
		   		<thead>
                    <tr class="active">
                        <th width="2%"><div align="center">NO</div></th>
                        <th width="5%"><div align="center">TANGGAL</div></th>
                        <th width="5%"><div align="center">NOMOR</div></th>
					  	<th width="10%">PRINCIPAL</th>
					  	<th width="10%">MERK</th>
					  	<th width="10%">TYPE</th>
						<th width="5%"><div align="center">SERIAL NUMBER</div></th>
						<th style="width: 60%">NAMA BARANG</th>
					  	<th width="10%">NAMA PELANGGAN</th>
						<th width="10%">LAYANAN</th>
						<th width="5%"><div align="center">JUMLAH</div></th>
                    </tr>
				</thead>
				<tbody>
					<?php
                    if(isset($_POST['btnTampil'])){
						$tglAwal	= InggrisTgl($_POST['txtTglAwal']);
						$tglAkhir	= InggrisTgl($_POST['txtTglAkhir']);
															
						$dataSql 		= mysqli_query($koneksi,"SELECT * FROM tr_out_item a
														INNER JOIN tr_out b ON a.kode_out=b.kode_out
														LEFT JOIN ms_user c ON b.kode_user=c.kode_user
														LEFT JOIN ms_customer d ON d.kode_customer=b.kode_customer
														LEFT JOIN ms_layanan e ON b.kode_layanan=e.kode_layanan
														LEFT JOIN ms_atm f ON b.id_atm=f.id_atm
														LEFT JOIN ms_barang g ON a.id_barang=g.id_barang
														LEFT JOIN ms_merk i ON g.kode_merk=i.kode_merk
														LEFT JOIN ms_type j ON g.kode_type=j.kode_type
														WHERE date(b.tgl_out) BETWEEN '$tglAwal' AND '$tglAkhir' 
														AND b.kode_customer LIKE '%$dataCustomer%'
														AND b.principal LIKE '%$dataPrincipal%'
														ORDER BY b.tgl_out DESC");
					}
					$nomor  		= 0;
					$jumlah			= 0;
					while($dataRow	= mysqli_fetch_array($dataSql)){	
						$nomor ++;
						$jumlah 	= $jumlah + $dataRow ['jumlah_out'];
                    ?>
                    <tr>
                        <td><div align="center"><?php echo $nomor;?></div></td>
						<td><div align="center"><?php echo date("d/m/Y", strtotime($dataRow['tgl_out'])); ?></div></td>
						<td><div align="center"><?php echo $dataRow ['kode_out']; ?></div></td>
						<td><?php echo $dataRow ['principal_barang']; ?></td>
						<td><?php echo $dataRow ['nama_merk']; ?></td>
						<td><?php echo $dataRow ['nama_type']; ?></td>
						<td><div align="center"><?php echo $dataRow ['kode_barang']; ?></div></td>
						<td><?php echo $dataRow ['nama_barang']; ?></td>
						<td><?php echo $dataRow ['nama_customer']; ?></td>
						<td><?php echo $dataRow ['nama_layanan']; ?></td>
						<td><div align="center"><?php echo $dataRow ['jumlah_out']; ?></div></td>
                    </tr>
                    <?php } ?>
				</tbody>
				<thead>
                    <tr>
                        <th colspan="10"><div align="right">GRAND TOTAL : </div></th>
						<th width="8%"><div align="center"><?php echo format_angka($jumlah) ?></div></th>
                    </tr>
				</thead>
            </table>
	 
	</div>
</div>
<script type="text/javascript"> 
    function cetak()	 
    { 
    win=window.open('./output/print_rpt_out.php?princ=<?php echo $dataPrincipal; ?>&awal=<?php echo $dataTglAwal; ?>&akhir=<?php echo $dataTglAkhir ?>&cus=<?php echo $dataCustomer ?>','win','width=1500, height=600, menubar=0, scrollbars=1, resizable=0, status=0'); 
    } 
</script>