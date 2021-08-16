<?php
	require_once("include.php");

	$value = getTableDuyetDoiTac();

	echo json_encode($value);
?>