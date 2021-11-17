<?php 
$dataTanggal    = date('Y');


$userSql = "SELECT * FROM ms_user WHERE kode_user='".$_SESSION['kode_user']."'";
$userQry = mysqli_query($koneksi,$userSql)  or die ("Query penjualan salah : ".mysqli_error());
$userRow = mysqli_fetch_array($userQry);
?>


<div class="row">
    <div class="col-sm-3 responsive" data-tablet="span3" data-desktop="span3">
        <div class="dashboard-stat blue">
            <div class="visual">
                <i class="icon-feed"></i>
            </div>
            <?php
            $itemTerjualSql     = "SELECT * FROM ms_merk";
            $itemTerjualQry     = mysqli_query($koneksi,$itemTerjualSql)  or die ("Query pembelian salah : ".mysqil_error());
            $totalItemTerjual = mysqli_num_rows($itemTerjualQry);
            
            ?>
            <div class="details">
                <div class="number"><?php echo $totalItemTerjual; ?></div>
                <div class="desc">Data Merk & Brand</div>
            </div>
            <a class="more">Total Merk & Brand <i class="m-icon-swapright m-icon-white"></i></a>                      
        </div>
    </div>
    <div class="col-sm-3 responsive" data-tablet="span3" data-desktop="span3">
        <div class="dashboard-stat green">
            <div class="visual">
                <i class="icon-badge"></i>
            </div>
            
            <?php
            $itemALatSql    = "SELECT * FROM ms_barang WHERE principal_barang='Part'";
            $itemAlatQry    = mysqli_query($koneksi,$itemALatSql)  or die ("Query pembelian salah : ".mysqli_error());
            $totalAlat  = mysqli_num_rows($itemAlatQry);
            
            ?>
            <div class="details">
                <div class="number"><?php echo $totalAlat; ?></div>
                <div class="desc">Data HRGA Batam</div>
            </div>
            <a class="more" >Total Data HRGA Batam<i class="m-icon-swapright m-icon-white"></i></a>                      
        </div>
    </div>
    <div class="col-sm-3 responsive" data-tablet="span3" data-desktop="span3">
        <div class="dashboard-stat purple">
            <div class="visual">
                <i class="icon-users"></i>
            </div>
            <?php
            
            $itemTypeSql    = "SELECT * FROM ms_barang WHERE principal_barang='MHU Box'";
            $itemTypeQry    = mysqli_query($koneksi,$itemTypeSql)  or die ("Query type salah : ".mysqli_error());
            $totalType      = mysqli_num_rows($itemTypeQry);
            
            ?>
            <div class="details">
                <div class="number"><?php echo $totalType ?></div>
                <div class="desc">Data HRGA Pusat</div>
            </div>
            <a class="more">Total HRGA Pusat <i class="m-icon-swapright m-icon-white"></i></a>                       
        </div>
    </div>
    <div class="col-sm-3 responsive" data-tablet="span3" data-desktop="span3">
        <div class="dashboard-stat yellow">
            <div class="visual">
                <i class="icon-feed"></i>
            </div>
            <?php
            $itemTerjualSql     = "SELECT * FROM ms_barang WHERE principal_barang='Purchasing'";
            $itemTerjualQry     = mysqli_query($koneksi,$itemTerjualSql)  or die ("Query pembelian salah : ".mysqli_error());
            $totalItemTerjual = mysqli_num_rows($itemTerjualQry);
            
            ?>
            <div class="details">
                <div class="number"><?php echo $totalItemTerjual; ?></div>
                <div class="desc">Data Purchasing</div>
            </div>
            <a class="more">Total Purchasing <i class="m-icon-swapright m-icon-white"></i></a>                      
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">Grafik Penerimaan Stock</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div id='container_1'></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">Grafik Pengeluaran Stock</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div id='container_3'></div>
            </div>
        </div>
    </div>
</div>

<script src="assets/scripts/highcharts.js"></script>
<script src="assets/scripts/modules/data.js"></script>
<script src="assets/scripts/highcharts-3d.js"></script>
<script src="assets/scripts/modules/drilldown.js"></script>
<script src="assets/scripts/modules/exporting.js"></script>


<script type="text/javascript">

Highcharts.chart('container_1', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Total Penerimaan Barang',
        style: {
            fontSize: '14px',
            fontFamily: 'Abel'
        }
    },
    subtitle: {
        text: 'Pada Tahun <?php echo date('Y') ?>',
        style: {
            fontSize: '14px',
            fontFamily: 'Abel'
        }
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Penerimaan'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Penerimaan pada <?php echo date('Y') ?>: <b>{point.y:.1f}</b>'
    },
    series: [{
            name: 'Penerimaan',
            data: [
            <?php 
                $dataTahun      = date('Y');
                $pilihan        = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
                foreach ($pilihan as $nilai) {
                $tahunSql       = "SELECT
                                        IFNULL(SUM(jumlah_in),0) AS total_terima
                                    FROM
                                        tr_in_item a
                                        INNER JOIN tr_in b on a.kode_in=b.kode_in
                                    WHERE
                                        YEAR(b.tgl_in)='$dataTahun'
                                        AND MONTH(b.tgl_in)='$nilai'";        
                $tahunQry       = mysqli_query($koneksi,$tahunSql) or die(mysqli_error());
                while( $dataRow = mysqli_fetch_assoc($tahunQry)){
                   $jml_in = $dataRow['total_terima'];                 
                }             
            ?>
                  
                       ['<?php echo $nilai; ?>',<?php echo $jml_in; ?>],
                  
                  <?php } ?>
                  
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#000',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Abel'
                }
            }
        }]
});
        </script>

<script type="text/javascript">

Highcharts.chart('container_3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total Pengeluaran Barang',
        style: {
            fontSize: '14px',
            fontFamily: 'Abel'
        }
    },
    subtitle: {
        text: 'Pada Tahun <?php echo date('Y') ?>',
        style: {
            fontSize: '14px',
            fontFamily: 'Abel'
        }
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Pengeluaran'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Pengeluaran pada <?php echo date('Y') ?>: <b>{point.y:.1f}</b>'
    },
    series: [{
            name: 'Pengeluaran',
            data: [
            <?php 
                $dataTahun      = date('Y');
                $pilihan        = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
                foreach ($pilihan as $nilai) {
                $tahunSql       = "SELECT
                                        IFNULL(SUM(jumlah_out),0) AS total_out
                                    FROM
                                        tr_out_item a
                                        INNER JOIN tr_out b on a.kode_out=b.kode_out
                                    WHERE
                                        YEAR(b.tgl_out)='$dataTahun'
                                        AND MONTH(b.tgl_out)='$nilai'";        
                $tahunQry       = mysqli_query($koneksi,$tahunSql) or die(mysqli_error());
                while( $dataRow = mysqli_fetch_assoc($tahunQry)){
                   $jml_out = $dataRow['total_out'];                 
                }             
            ?>
                  
                       ['<?php echo $nilai; ?>',<?php echo $jml_out; ?>],
                  
                  <?php } ?>
                  
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#000',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Abel'
                }
            }
        }]
});
        </script>

