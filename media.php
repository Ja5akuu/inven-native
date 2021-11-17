<?php
session_start();
include_once "config/inc.connection.php";
include_once "config/inc.library.php";
date_default_timezone_set('Asia/Jakarta');
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING |E_DEPRECATED));

if(!isset($_SESSION['kode_user'])){
	$_SESSION['pesan'] = 'Session anda terhapus, silahkan login kembali';
    header("Location:index.php"); 
}


$userSql = "SELECT * FROM ms_user a
            LEFT JOIN sys_group b ON a.user_group=b.group_id
            WHERE a.kode_user='".$_SESSION['kode_user']."'";

$userQry = mysqli_query($koneksi,$userSql)  or die ("Query penjualan salah : ".mysqli_error());

$userRow = mysqli_fetch_array($userQry);

if($userRow['photo_pegawai'] =="") {
	$namaFoto	= "images.jpg";
}
else {
	$namaFoto	= $userRow['photo_pegawai'];
}
	
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Inventory - Sistem Management Stock</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-md.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-md.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout3/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout3/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-menu-fixed">
        <div class="loader"></div>
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo">
                                    <a href="?page=home">
                                        <img src="assets/pages/img/logo_header.png" alt="logo" class="logo-default" width="210px">
                                    </a>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->
                                <div class="top-menu">
                                    <ul class="nav navbar-nav pull-right">
                                        
                                        <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                                            <a  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <span class="circle"><?php echo $userRow['group_id'] ?> </span>
                                                <span class="corner"></span>
                                            </a>
                                            
                                        </li>
                                        <li class="dropdown dropdown-user dropdown-dark">
                                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                <img alt="" class="img-circle" src="photo/<?php echo $namaFoto; ?>">
                                                <span class="username username-hide-mobile uppercase"><?php echo $userRow['nama_user']; ?></span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li><a href="?page=confprofile"><i class="fa fa-pencil-square"></i> Change Profile </a></li>
                                                <li><a href="?page=confpassword"><i class="fa fa-lock"></i> Change Password </a></li>
                                                <li class="divider"></li>
                                                <li><a href="keluar.php"><i class="fa fa-sign-out"></i> Log Out </a></li>
                                            </ul>
                                        </li>
                                        <!-- END USER LOGIN DROPDOWN -->
                                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                                        <li class="droddown dropdown-separator">
                                            <span class="separator"></span>
                                        </li>
                                        <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                                            <a href="keluar.php" class="dropdown-toggle">
                                                <i class="icon-logout"></i>
                                            </a>
                                        </li>
                                        <!-- END QUICK SIDEBAR TOGGLER -->
                                    </ul>
                                </div>
                                <!-- END TOP NAVIGATION MENU -->
                            </div>
                        </div>
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        <div class="page-header-menu">
                            <div class="container">
                                <!-- BEGIN HEADER SEARCH BOX -->
                                <form class="search-form" action="?page=search" method="POST">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter Serial Number" name="txtCari">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                                <!-- END HEADER SEARCH BOX -->
                                <!-- BEGIN MEGA MENU -->
                                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                                <div class="hor-menu  ">
                                    <ul class="nav navbar-nav">
                                        <li class="menu-dropdown classic-menu-dropdown">
                                            <a href="?page=home"> Dasboard
                                                <span class="arrow"></span>
                                            </a>
                                            
                                        </li>
                                        <?php
                                            $menuSql    = "SELECT * FROM sys_menu WHERE menu_id IN (SELECT c.menu_id FROM sys_akses a 
                                                                                                    INNER JOIN sys_submenu b ON a.akses_submenu=b.submenu_id
                                                                                                    INNER JOIN sys_menu c ON b.submenu_menu=c.menu_id
                                                                                                    WHERE a.akses_group='".$userRow['user_group']."')
                                                            ORDER BY menu_urutan ASC";
                                            $menuQry    = mysqli_query($koneksi,$menuSql) or die ("Query menu salah : ".mysql_error());              
                                            while ($menuShow    = mysqli_fetch_assoc($menuQry)) {
                                                
                                        ?>
                                        <li class="menu-dropdown classic-menu-dropdown ">
                                          <a href="javascript:;">
                                          <i class="<?php echo $menuShow['menu_icon'] ?>"></i> <?php echo $menuShow['menu_nama'] ?> <i class="fa fa-angle-down"></i>
                                          </a>
                                          <ul class="dropdown-menu pull-left">
                                            <?php 
                                              $submenuSql     = "SELECT * FROM sys_submenu 
                                                                  WHERE submenu_menu='$menuShow[menu_id]' AND submenu_id IN (SELECT b.submenu_id FROM sys_akses a 
                                                                                              INNER JOIN sys_submenu b ON a.akses_submenu=b.submenu_id
                                                                                              WHERE a.akses_group='".$userRow['user_group']."')
                                                                  ORDER BY submenu_urutan ASC";
                                              $submenuQry     = mysqli_query($koneksi,$submenuSql) or die ("Query petugas salah : ".mysql_error());                
                                              while ($submenuShow = mysqli_fetch_assoc($submenuQry)) {
                                              $submenulink    =$submenuShow['submenu_link'];
                                              $submenunama    =$submenuShow['submenu_nama'];
                                          ?>
                                            <li><a href="<?php echo $submenulink ?>">
                                              <i class="fa fa-angle-right"></i> <?php echo $submenunama ?>
                                              </a>
                                            </li>
                                            <?php } ?>
                                          </ul>
                                        </li>
                                        <?php } ?>
                                        
                                        
                                    </ul>
                                </div>
                                <!-- END MEGA MENU -->
                            </div>
                        </div>
                        <!-- END HEADER MENU -->
                    </div>
                    <!-- END HEADER -->
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container">
                                  <div class="page-content-inner">
                                    <br>
                                  <?php
                                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                                      echo '<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><i class="icon-check"></i>&nbsp;'.$_SESSION['pesan'].'</div>';
                                    }
                                    $_SESSION['pesan'] = '';
                                  
                                    if(isset($_GET['page'])){
                                      include("pages.php");
                                    }
                                    else{
                                      include("modul/home.php");
                                    }
                                  ?>  
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- END QUICK SIDEBAR -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>
            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    <!-- BEGIN FOOTER -->
                    <!-- BEGIN PRE-FOOTER -->
                   
                    <!-- END PRE-FOOTER -->
                    <!-- BEGIN INNER FOOTER -->
                    <div class="page-footer">
                        <div class="container"> 2017 &copy; PT Primajasa Tunas Mandiri
                            <a target="_blank" href="http://seventhmedia.web.id">Software Solution</a> &nbsp;|&nbsp;
                            <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Design By Metronic</a>
                        </div>
                    </div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                    <!-- END INNER FOOTER -->
                    <!-- END FOOTER -->
                </div>
            </div>
        </div>
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

    <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    
    <script src="assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/form-validation.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
    <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
    <script src="assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
    <script src="assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
    <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script>
         $(document).ready(function(){setTimeout(function(){$(".alert").fadeIn('slow');}, 500);});
         setTimeout(function(){$(".alert").fadeOut('slow');}, 3000);
    </script>
    <script type="text/javascript">
      $(window).load(function() {
        $(".loader").fadeOut("slow");
      });
    </script>
    <script type="text/javascript" src="assets/scripts/my.js"></script>
    <script type="text/javascript" charset="utf-8">
      function fnHitung() {
      var angka = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('inputku').value)))); //input ke dalam angka tanpa titik
      if (document.getElementById('inputku').value == "") {
        alert("Jangan Dikosongi");
        document.getElementById('inputku').focus();
        return false;
      }
      else
        if (angka >= 1) {
        alert("angka aslinya : "+angka);
        document.getElementById('inputku').focus();
        document.getElementById('inputku').value = tandaPemisahTitik(angka) ;
        return false; 
        }
      }
    </script>
    <script>
         $(document).ready(function(){setTimeout(function(){$(".alert").fadeIn('slow');}, 500);});
         setTimeout(function(){$(".alert").fadeOut('slow');}, 3000);
    </script>

</body>
<!-- END BODY -->
</html>
