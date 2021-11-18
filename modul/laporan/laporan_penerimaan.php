<?php
		
	$tglAwal		= isset($_POST['txtTglAwal']) ? $_POST['txtTglAwal'] : date('d-m-Y');
	$tglAkhir		= isset($_POST['txtTglAkhir']) ? $_POST['txtTglAkhir'] : date('d-m-Y');
	$dataPrincipal	= isset($_POST['cmbPrincipal']) ? $_POST['cmbPrincipal'] : '';
	
 ?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="fieldset-form">
	<div class="portlet box blue">
	    <div class="portlet-title">
	        <div class="caption">
	            <span class="caption-subject uppercase bold">Laporan Penerimaan Barang</span>
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
				<div class="col-lg-4">	
					<div class="form-group">
						<label class="control-label">Periode Transaksi :</label>
						<div class="input-group input-large date-picker input-daterange" data-date-format="dd-mm-yyyy">
							<input type="text" class="form-control" name="txtTglAwal" value="<?php echo $tglAwal ?>">
							<span class="input-group-addon">
							to </span>
							<input type="text" class="form-control" name="txtTglAkhir" value="<?php echo $tglAkhir ?>">
						</div>
					</div>
				</div>
				<div class="col-lg-2">	
					<div class="form-group">
						<div class="controls" style="margin-top: 25px">
							<button type="submit" class="btn blue" name="btnTampil"><i class="icon-magnifier-add"></i></button>
							<?php
	                    	if(isset($_POST['btnTampil'])){
		                    ?>
							<button name="bar" type="button" onClick="cetak()" class="btn red"><i class="fa fa-print"></i></button>
							<a href="./output/excel_rpt_in.php?princ=<?php echo $dataPrincipal; ?>&awal=<?php echo InggrisTgl($tglAwal); ?>&akhir=<?php echo InggrisTgl($tglAkhir) ?>" target="_BLANK" class="btn green-seagreen"><i class="fa fa-file-excel-o"></i></a>
		                    <?php } ?>
						</div>
					</div>
				</div>
			</div>	
			<hr>
			<table class="table table-striped table-bordered table-hover " id="sample_1">
		   		<thead>
                    <tr>
                        <th width="2%"><div align="center">NO</div></th>
                        <th width="5%"><div align="center">TANGGAL</div></th>
                        <th width="5%"><div align="center">NOMOR</div></th>
						<th width="5%"><div align="center">SERIAL NUMBER</div></th>
						<th width="35%">NAMA BARANG</th>
					  	<th width="15%">PRINCIPAL</th>
						<th width="10%">MERK</th>
						<th width="10%">TYPE</th>
						<th width="5%"><div align="right">JUMLAH</div></th>
                    </tr>
				</thead>
				<tbody>
					<?php
                    if(isset($_POST['btnTampil'])){
						$tglAwal	= InggrisTgl($_POST['txtTglAwal']);
						$tglAkhir	= InggrisTgl($_POST['txtTglAkhir']);
						$dataPrincipal	= $_POST['cmbPrincipal'];
															
						$dataSql 		= mysqli_query($koneksi,"SELECT * FROM tr_in_item a 
														INNER JOIN tr_in b ON a.kode_in = b.kode_in
														INNER JOIN ms_barang c ON a.id_barang = c.id_barang
														LEFT JOIN ms_merk d ON c.kode_merk = d.kode_merk
														LEFT JOIN ms_type e ON c.kode_type = e.kode_type 
														WHERE date(b.tgl_in) BETWEEN '$tglAwal' AND '$tglAkhir' 
														AND b.principal LIKE '%$dataPrincipal%'
														ORDER BY b.tgl_in DESC");
					}
					$nomor  		= 0;
					$jumlah			= 0;
					$subtotal		= 0;
					while($dataRow	= mysqli_fetch_array($dataSql)){	
						$nomor ++;
						$jumlah 	= $jumlah + $dataRow ['jumlah_in'];
                    ?>
                    <tr>
                        <td><div align="center"><?php echo $nomor;?></div></td>
						<td><div align="center"><?php echo date("d/m/Y", strtotime($dataRow['tgl_in'])); ?></div></td>
						<td><div align="center"><?php echo $dataRow ['kode_in']; ?></div></td>
						<td><div align="center"><?php echo $dataRow ['kode_barang']; ?></div></td>
						<td><?php echo $dataRow ['nama_barang']; ?></td>
						<td><?php echo $dataRow ['principal_barang']; ?></td>
						<td><?php echo $dataRow ['nama_merk']; ?></td>
						<td><?php echo $dataRow ['nama_type']; ?></td>
						<td><div align="right"><?php echo number_format($dataRow ['jumlah_in'],2); ?></div></td>
                    </tr>
                    <?php } ?>
				</tbody>
				<thead>
                    <tr>
                        <th colspan="8"><div align="right">GRAND TOTAL : </div></th>
						<th width="8%"><div align="right"><?php echo number_format($jumlah,2) ?></div></th>
                    </tr>
				</thead>
            </table>
	 
	</div>
</div>
<script type="text/javascript"> 
    function cetak()	 
    { 
    win=window.open('./output/print_rpt_in.php?princ=<?php echo $dataPrincipal; ?>&awal=<?php echo $tglAwal; ?>&akhir=<?php echo $tglAkhir ?>','win','width=1500, height=600, menubar=0, scrollbars=1, resizable=0, status=0'); 
    } 
</script>