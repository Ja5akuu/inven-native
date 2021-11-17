
<div class="portlet box blue">
	<div class="portlet-title">
	<div class="caption"><span class="caption-subject uppercase bold">Data Hasil Pencarian</span></div>
	</div>
	<div class="portlet-body">     	
        <table class="table table-condensed table-bordered table-hover" id="sample_2">
			<thead>
                <tr class="active">
                  	<th width="10%"><div align="center">TGL. INPUT </div></th>
                  	<th width="10%"><div align="center">SERIAL NUMBER</div></th>
					<th width="15%">TYPE</th>
					<th width="15%">PELANGGAN</th>
					<th width="10%">ID CABANG</th>
                    <th width="15%">LAYANAN</th>
                    <th width="15%">TEKNISI</th>
				  	<th width="5%"><div align="center">STATUS</div></th>
				  	<th width="5%"><div align="center">ATTACHMENT</div></th>
				  	<th width="5%"><div align="center">CSR/BAN</div></th>
                </tr>
			</thead>
			<tbody>
                <?php
                	$txtCari = $_POST['txtCari'];
					$dataSql = "SELECT 
								a.tgl_out,
								a.status_out,
								a.id_atm,
								c.nama_customer,
								d.nama_layanan,
								e.kode_barang,
								e.nama_barang,
								f.nama_type,
								g.nama_user,
								a.file_image_1,
								a.file_image_2,
								a.file_csr
								FROM tr_out a
								INNER JOIN tr_out_item b ON a.kode_out=b.kode_out
								INNER JOIN ms_customer c ON a.kode_customer=c.kode_customer
								INNER JOIN ms_layanan d ON a.kode_layanan=d.kode_layanan
								INNER JOIN ms_barang e ON b.id_barang=e.id_barang
								INNER JOIN ms_type f ON e.kode_type=f.kode_type
								INNER JOIN ms_user g ON a.kode_teknisi=g.kode_user
								WHERE e.kode_barang = '$txtCari'";
					$dataQry = mysql_query($dataSql, $koneksidb)  or die ("Query petugas salah : ".mysql_error());

					$nomor  = 0; 
					while ($data = mysql_fetch_array($dataQry)) {
					$nomor++;
					$Kode = $data['id_barang'];
					if($data ['status_out']=='Close'){
						$dataStatus= "<label class='label label-success'>Selesai</label>";
					}else{
						$dataStatus= "<label class='label label-danger'>Pending</label>";
					}
				?>
                <tr class="odd gradeX">
					<td><div align="center"><?php echo date("d/m/Y", strtotime($data ['tgl_out'])); ?></div></td>
					<td><?php echo $data ['kode_barang']; ?></td>
					<td><?php echo $data ['nama_type']; ?></td>
					<td><?php echo $data ['nama_customer']; ?></td>
					<td><?php echo $data ['id_atm']; ?></td>
					<td><?php echo $data ['nama_layanan']; ?></td>
					<td><?php echo $data ['nama_user']; ?></td>
                    <td><div align="center"><?php echo $dataStatus; ?></div></td>
                    <td><div align="center"><a href="./photo/<?php echo $data['file_image_1'] ?>" class="btn btn-xs blue" target="_BLANK"><i class="fa fa-download"></i></a></div></td>
                    <td><div align="center"><a href="./photo/<?php echo $data['file_csr'] ?>" class="btn btn-xs blue" target="_BLANK"><i class="fa fa-download"></i></a></div></td>
                </tr>
                <?php } ?>
			</tbody>
        </table>
	</div>
</div>
