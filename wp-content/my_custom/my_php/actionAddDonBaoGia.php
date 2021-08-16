<?php
	require_once("include.php");

	$tenphutung = $_POST['tenphutung'];
    $soluong = $_POST['soluong'];
    $gia = $_POST['gia'];
    $madon = $_POST['madon'];

$index = 0;

	foreach($tenphutung as $itemTenPhuTung) {
      $soluong_item = $soluong[$index];
      $gia_item = $gia[$index];
      addTableBaoGiaPhuTung($madon, $itemTenPhuTung, $soluong_item, $gia_item);
      $index++;
    }

	updateTinhTrangDonHang($madon);
	

	$value = array("ten" => $tenphutung, "soluong" => $soluong, "gia" => $gia, "madon" => $madon);
	echo json_encode($value);
?>