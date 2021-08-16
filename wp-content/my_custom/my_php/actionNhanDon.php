<?php
	require_once("include.php");

	$STT = $_POST['STT'];
	$current_user = $_POST['current_user'];

	nhanDon($STT, $current_user);

	echo json_encode($value);
?>