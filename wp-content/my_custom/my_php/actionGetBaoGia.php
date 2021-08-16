<?php
	require_once("include.php");

	$STT = $_POST['STT'];

	$ThongTinDonDichVu = getThongTinDonDichVu($STT);

	$getBaoGiaPhuTung = getBaoGiaPhuTung($STT);

$value = array("thongtin" => $ThongTinDonDichVu, "phutung" => $getBaoGiaPhuTung);

	echo json_encode($value);
?>