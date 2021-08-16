<?php
	require_once("include.php");
	$STT = $_POST['STT'];

	duyetDoiTac($STT);

	echo json_encode($STT);
?>