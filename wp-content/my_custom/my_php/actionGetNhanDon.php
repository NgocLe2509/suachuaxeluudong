<?php
	require_once("include.php");

	$value = getTableNhanDon();

	echo json_encode($value);
?>