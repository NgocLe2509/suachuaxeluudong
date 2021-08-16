<?php
	require_once("include.php");

	$STT = $_POST['STT'];

	$value = getThongTinDonDichVu($STT);

	echo json_encode($value);
?>