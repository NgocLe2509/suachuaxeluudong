<?php
	require_once("include.php");
	$sotientong = $_POST['sotientong'];
	$madon = $_POST['madon'];

	updateThongTinDonHang($sotientong, $madon);

	echo json_encode($sotientong);
?>