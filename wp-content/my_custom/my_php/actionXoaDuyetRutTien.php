<?php
	require_once("include.php");
	$STT = $_POST['STT'];

	xoaDuyetRutTien($STT);

	echo json_encode($STT);
?>