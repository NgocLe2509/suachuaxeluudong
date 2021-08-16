<?php
	require_once("include.php");

	$value = getTableDonRutTien();

	echo json_encode($value);
?>