<?php
	require_once("include.php");
	$STT = $_POST['STT'];

	duyetRutTien($STT);

	echo json_encode($STT);
?>