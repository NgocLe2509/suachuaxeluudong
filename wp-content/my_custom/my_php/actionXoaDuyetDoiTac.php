<?php
	require_once("include.php");
	$STT = $_POST['STT'];

	xoaDuyetDoiTac($STT);

	echo json_encode($STT);
?>