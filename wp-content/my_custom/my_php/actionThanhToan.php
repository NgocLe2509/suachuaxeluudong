<?php
	require_once("include.php");

	$userid = $_POST['userid'];
    $gia = $_POST['gia'];
    $madon = $_POST['madon'];
	$tienxu = $_POST['tienxu'];

	ThanhToan($userid, $gia, $madon, $tienxu);

	echo json_encode($userid.$gia.$madon.$tienxu);
?>