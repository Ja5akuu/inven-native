
<?php
	$pg=$_GET['page'];
		if($pg=="home"){ include"modul/home.php"; }
		elseif($pg=="search"){ include"modul/search.php"; }
	// DATA KONFIGURASI
		elseif($pg=="confstore"){ include"modul/konfigurasi/conf_toko.php"; }
		elseif($pg=="confprofile"){ include"modul/konfigurasi/conf_profil.php"; }
		elseif($pg=="confpassword"){ include"modul/konfigurasi/conf_password.php"; }
		elseif($pg=="confbackup"){ include"modul/konfigurasi/conf_backup.php"; }
	// DATA USER
		elseif($pg=="datauser"){ include"modul/user/user_data.php"; }
		elseif($pg=="tambahuser"){ include"modul/user/user_tambah.php"; }
		elseif($pg=="ubahuser"){ include"modul/user/user_ubah.php"; }
	// DATA GROUP
		elseif($pg=="datagroup"){ include"modul/group/group_data.php"; }
		elseif($pg=="tambahgroup"){ include"modul/group/group_tambah.php"; }
		elseif($pg=="ubahgroup"){ include"modul/group/group_ubah.php"; }
	// DATA TYPE
		elseif($pg=="datatype"){ include"modul/type/type_data.php"; }
		elseif($pg=="tambahtype"){ include"modul/type/type_tambah.php"; }
		elseif($pg=="ubahtype"){ include"modul/type/type_ubah.php"; }
	// DATA CUSTOMER
		elseif($pg=="datacustomer"){ include"modul/customer/customer_data.php"; }
		elseif($pg=="tambahcustomer"){ include"modul/customer/customer_tambah.php"; }
		elseif($pg=="ubahcustomer"){ include"modul/customer/customer_ubah.php"; }
	// DATA DATA MODUL
		elseif($pg=="datamodul"){ include"modul/modul/modul_data.php"; }
		elseif($pg=="tambahmodul"){ include"modul/modul/modul_tambah.php"; }
		elseif($pg=="ubahmodul"){ include"modul/modul/modul_ubah.php"; }
	// DATA MERK
		elseif($pg=="datamerk"){ include"modul/merk/merk_data.php"; }
		elseif($pg=="addmerk"){ include"modul/merk/merk_tambah.php"; }
		elseif($pg=="editmerk"){ include"modul/merk/merk_ubah.php"; }
	// DATA LAYANAN
		elseif($pg=="datalayanan"){ include"modul/layanan/layanan_data.php"; }
		elseif($pg=="tambahlayanan"){ include"modul/layanan/layanan_tambah.php"; }
		elseif($pg=="ubahlayanan"){ include"modul/layanan/layanan_ubah.php"; }
	// DATA MODEM
		elseif($pg=="addmdm"){ include"modul/modem/modem_add.php"; }
		elseif($pg=="dtmdm"){ include"modul/modem/modem_data.php"; }
		elseif($pg=="edtmdm"){ include"modul/modem/modem_edit.php"; }
	// DATA MCU BOX
		elseif($pg=="addmhu"){ include"modul/mhu/mhu_tambah.php"; }
		elseif($pg=="dtmhu"){ include"modul/mhu/mhu_data.php"; }
		elseif($pg=="edtmhu"){ include"modul/mhu/mhu_ubah.php"; }
	// DATA PART
		elseif($pg=="addpart"){ include"modul/part/part_add.php"; }
		elseif($pg=="dtpart"){ include"modul/part/part_data.php"; }
		elseif($pg=="edtpart"){ include"modul/part/part_edit.php"; }
	// DATA ATM
		elseif($pg=="addatm"){ include"modul/atm/atm_tambah.php"; }
		elseif($pg=="dtatm"){ include"modul/atm/atm_data.php"; }
		elseif($pg=="edtatm"){ include"modul/atm/atm_ubah.php"; }
	// DATA MODEM IN
		elseif($pg=="addmdmin"){ include"modul/mdm_in/mdm_in_add.php"; }
		elseif($pg=="dtmdmin"){ include"modul/mdm_in/mdm_in_data.php"; }
		elseif($pg=="dtlmdmin"){ include"modul/mdm_in/mdm_in_view.php"; }
	// DATA MODEM OUT
		elseif($pg=="addmdmout"){ include"modul/mdm_out/mdm_out_add.php"; }
		elseif($pg=="dtmdmout"){ include"modul/mdm_out/mdm_out_data.php"; }
		elseif($pg=="dtlmdmout"){ include"modul/mdm_out/mdm_out_view.php"; }	
		elseif($pg=="dtappmdmout"){ include"modul/mdm_out/mdm_out_app.php"; }
		elseif($pg=="dtlappmdmout"){ include"modul/mdm_out/mdm_out_view_app.php"; }
	// DATA MHU IN
		elseif($pg=="addmhuin"){ include"modul/mhu_in/mhu_in_add.php"; }
		elseif($pg=="dtmhuin"){ include"modul/mhu_in/mhu_in_data.php"; }
		elseif($pg=="dtlmhuin"){ include"modul/mhu_in/mhu_in_view.php"; }
	// DATA MHU OUT
		elseif($pg=="addmhuout"){ include"modul/mhu_out/mhu_out_add.php"; }
		elseif($pg=="dtmhuout"){ include"modul/mhu_out/mhu_out_data.php"; }
		elseif($pg=="dtlmhuout"){ include"modul/mhu_out/mhu_out_view.php"; }	
		elseif($pg=="dtappmhuout"){ include"modul/mhu_out/mhu_out_app.php"; }
		elseif($pg=="dtlappmhuout"){ include"modul/mhu_out/mhu_out_view_app.php"; }
	// DATA PART IN
		elseif($pg=="addpartin"){ include"modul/part_in/part_in_add.php"; }
		elseif($pg=="dtpartin"){ include"modul/part_in/part_in_data.php"; }
		elseif($pg=="dtlpartin"){ include"modul/part_in/part_in_view.php"; }
	// DATA PART OUT
		elseif($pg=="addpartout"){ include"modul/part_out/part_out_add.php"; }
		elseif($pg=="dtpartout"){ include"modul/part_out/part_out_data.php"; }
		elseif($pg=="dtlpartout"){ include"modul/part_out/part_out_view.php"; }	
		elseif($pg=="dtapppartout"){ include"modul/part_out/part_out_app.php"; }
		elseif($pg=="dtlapppartout"){ include"modul/part_out/part_out_view_app.php"; }
	// LAPORAN
		elseif($pg=="rptstock"){ include"modul/laporan/laporan_stok.php"; }
		elseif($pg=="rptin"){ include"modul/laporan/laporan_penerimaan.php"; }
		elseif($pg=="rptout"){ include"modul/laporan/laporan_pengeluaran.php"; }
		else {
		echo "<div class='col-md-12'><div class='alert alert-dismissable alert-warning'><i class='icon-exclamation-sign'></i> Belum Ada Modul</div></div>";
		}
?>
		
		