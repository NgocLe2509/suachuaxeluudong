<?php
	require_once("include.php");

	$value = getThongTinDonDichVuAdmin();
$array = array();
	foreach($value as $item) {
    	$thongtin = getThongTinSuaChua($item['STT']);
      $array[] = array("dichvu" => $item, "thongtin" => $thongtin);
    }

	echo json_encode($value);
?>