<?php
	require_once("include.php");
	$TenKhachHang = $_POST['tenkhachhang'];
    $ThongTinDangKy = $_POST['thongtindangky'];
    $LoaiDichVu = $_POST['loaidichvu'];
	$GhiChuThem = $_POST['ghichuthem'];

	$value = $tenkhachhang.$thongtindangky.$loaidichvu.$ghichuthem;
	addTableDuyetDoiTac($TenKhachHang, $ThongTinDangKy, $LoaiDichVu, $GhiChuThem);


	echo json_encode($value);
?>