<?php
	require_once("include.php");

	$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $note = $_POST['note'];
    $product_name = $_POST['product_name'];
    $total = $_POST['total'];

	$value = addTableOrderDichVu($firstname, $lastname, $city, $address, $phone, $email, $note, $product_name, $total);

	echo json_encode($value);
?>