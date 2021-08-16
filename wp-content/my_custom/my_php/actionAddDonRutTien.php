<?php
	require_once("include.php");

	$curent_user = $_POST['curent_user'];
    $name = $_POST['name'];
    $sdt = $_POST['sdt'];
    $money = $_POST['money'];
    $stk = $_POST['stk'];

	addTableDonRutTien($curent_user, $name, $sdt, $money, $stk);


	echo json_encode("ahihi");
?>