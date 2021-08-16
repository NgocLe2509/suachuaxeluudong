<?php
	require_once("include.php");
	$userid = $_POST['userid'];

	$getXu = getXu($userid);

	echo json_encode($getXu);
?>