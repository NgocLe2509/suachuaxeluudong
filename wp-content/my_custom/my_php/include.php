<?php
// global connection variable
date_default_timezone_set("Asia/Ho_Chi_Minh");  
$conn;

header('Content-Type: application/json; charset=UTF-8');

// connect database
function connect_db()
{
	global $conn;
	$conn=mysqli_connect("localhost","gongshop_wp412","@!K73a7pSh","gongshop_wp412") or die("Cannot connect");
	$conn -> set_charset("utf8");
}

// disconnect database
function disconnect_db()
{
	global $conn;
	mysqli_close($conn);
}

function addTableDuyetDoiTac($TenKhachHang, $ThongTinDangKy, $LoaiDichVu, $GhiChuThem) {
	global $conn;
	connect_db();

	$TenKhachHang = $conn -> real_escape_string($TenKhachHang);
  $ThongTinDangKy = $conn -> real_escape_string($ThongTinDangKy);
  $LoaiDichVu = $conn -> real_escape_string($LoaiDichVu);
  $GhiChuThem = $conn -> real_escape_string($GhiChuThem);

	mysqli_query($conn,"INSERT INTO DuyetDoiTac (TenKhachHang, ThongTinDangKy, LoaiDichVu, GhiChuThem, TinhTrang) VALUES ('$TenKhachHang', '$ThongTinDangKy', '$LoaiDichVu', '$GhiChuThem', 0)");

	disconnect_db();
	return;
}

function getTableDuyetDoiTac() {
	global $conn;
	connect_db();

	$query = mysqli_query($conn,"SELECT * FROM DuyetDoiTac WHERE TinhTrang = '0'");
 	 $list = array();
	while($row = mysqli_fetch_assoc($query))
	{
		$list[] = $row;
	}
	disconnect_db();

	return $list;
}

function duyetDoiTac($STT) {
	global $conn;
	connect_db();
  
  $STT = $conn -> real_escape_string($STT);

	mysqli_query($conn,"UPDATE DuyetDoiTac SET TinhTrang = '1' WHERE STT = '$STT'");
 
	disconnect_db();

	return;
}

function xoaDuyetDoiTac($STT){
	global $conn;
	connect_db();
  
  $STT = $conn -> real_escape_string($STT);

	mysqli_query($conn,"DELETE FROM DuyetDoiTac WHERE STT = '$STT'");
 
	disconnect_db();

	return;
}

function addTableOrderDichVu($firstname, $lastname, $city, $address, $phone, $email, $note, $product_name, $total){
	global $conn;
	connect_db();
  
    $firstname = $conn -> real_escape_string($firstname);
    $lastname = $conn -> real_escape_string($lastname);
    $city = $conn -> real_escape_string($city);
    $address = $conn -> real_escape_string($address);
    $phone = $conn -> real_escape_string($phone);
    $email = $conn -> real_escape_string($email);
    $note = $conn -> real_escape_string($note);
    $product_name = $conn -> real_escape_string($product_name);
    $total = $conn -> real_escape_string($total);
  
  	$sql = "INSERT INTO Order_Dich_Vu(Firstname, Lastname, City, Address, Phone, Email, OrderService, Note, Total, StatusOrder) 
			VALUES ('$firstname', '$lastname', '$city', '$address', '$phone', '$email', '$product_name', '$note', '$total', 0)";
	mysqli_query($conn, $sql) or die("Failed to query database");
  
  	$query = mysqli_query($conn, "SELECT * FROM Order_Dich_Vu ORDER BY STT DESC LIMIT 1;") or die("Failed to query database");
	$row = mysqli_fetch_assoc($query);

	disconnect_db();

	return $row;
}

function getTableNhanDon() {
	global $conn;
	connect_db();

	$query = mysqli_query($conn,"SELECT * FROM Order_Dich_Vu WHERE StatusOrder = '0'");
 	 $list = array();
	while($row = mysqli_fetch_assoc($query))
	{
		$list[] = $row;
	}
	disconnect_db();

	return $list;
}

function nhanDon($STT, $user) {
	global $conn;
	connect_db();
  
  $STT = $conn -> real_escape_string($STT);
  $user = $conn -> real_escape_string($user);

	mysqli_query($conn,"UPDATE Order_Dich_Vu SET StatusOrder = '1' WHERE STT = '$STT'");
  
  mysqli_query($conn,"INSERT INTO ThongTinSuaChua (MaDonHang,MaNguoiNhan) VALUES ('$STT', '$user')");
 
	disconnect_db();

	return;
}

function addTableDonRutTien($curent_user, $name, $sdt, $money, $stk) {
	global $conn;
	connect_db();

	$curent_user = $conn -> real_escape_string($curent_user);
  $name = $conn -> real_escape_string($name);
  $sdt = $conn -> real_escape_string($sdt);
  $stk = $conn -> real_escape_string($stk);
  $money = $conn -> real_escape_string($money);

	mysqli_query($conn,"INSERT INTO DonRutTien (MaNguoiDung,SDT,SoTienCanRut,ThongTinTaiKhoan,TinhTrang) 
    			VALUES ('$curent_user', '$sdt', '$money', '$stk', 0)");

	disconnect_db();
	return;
}

function getThongTinDonDichVu($STT) {
  global $conn;
	connect_db();

  $STT = $conn -> real_escape_string($STT);
  
	$query = mysqli_query($conn,"SELECT * FROM Order_Dich_Vu WHERE STT = '$STT'");
 	$row = mysqli_fetch_assoc($query);
	disconnect_db();

	return $row;
}

function addTableBaoGiaPhuTung($madon, $itemTenPhuTung, $soluong_item, $gia_item) {
  global $conn;
	connect_db();

	$madon = $conn -> real_escape_string($madon);
  $itemTenPhuTung = $conn -> real_escape_string($itemTenPhuTung);
  $soluong_item = $conn -> real_escape_string($soluong_item);
  $gia_item = $conn -> real_escape_string($gia_item);

	mysqli_query($conn,"INSERT INTO BaoGia_PhuTung (STTBaoGia,TenPhuTung,SoLuong,Gia) 
    			VALUES ('$madon', '$itemTenPhuTung', '$soluong_item', '$gia_item')");
  

	disconnect_db();
	return;
}

function updateTinhTrangDonHang($STT) {
  global $conn;
	connect_db();
  
  $STT = $conn -> real_escape_string($STT);

	mysqli_query($conn,"UPDATE Order_Dich_Vu SET StatusOrder = '2' WHERE STT = '$STT'");
  
	disconnect_db();

	return;
}

function getBaoGiaPhuTung($STT) {
  global $conn;
	connect_db();

  $STT = $conn -> real_escape_string($STT);
  
	$query = mysqli_query($conn,"SELECT * FROM BaoGia_PhuTung WHERE STTBaoGia = '$STT'");
 	$list = array();
	while($row = mysqli_fetch_assoc($query))
	{
		$list[] = $row;
	}
	disconnect_db();

	return $list;
}

function updateThongTinDonHang($sotientong, $madon) {
  global $conn;
	connect_db();
  
  	$sotientong = $conn -> real_escape_string($sotientong);
  $madon = $conn -> real_escape_string($madon);

	mysqli_query($conn,"UPDATE ThongTinSuaChua SET SoTienTong = '$sotientong' WHERE MaDonHang = '$madon'");
  
	disconnect_db();

	return;
}

function getXu($userid) {
global $conn;
	connect_db();

  $userid = $conn -> real_escape_string($userid);
  
	$query = mysqli_query($conn,"SELECT * FROM TongXu WHERE STTNguoiDung = '$userid'");
 	$row = mysqli_fetch_assoc($query);
	disconnect_db();

	return $row;
}

function ThanhToan($userid, $gia, $madon, $tienxu) {
  global $conn;
	connect_db();
  
  	$userid = $conn -> real_escape_string($userid);
  $gia = $conn -> real_escape_string($gia);
   $madon = $conn -> real_escape_string($madon);
   $tienxu = $conn -> real_escape_string($tienxu);

	mysqli_query($conn,"UPDATE TongXu SET SoXu = '$tienxu' WHERE STTNguoiDung = '$userid'");
  mysqli_query($conn,"UPDATE Order_Dich_Vu SET StatusOrder = '3' WHERE STT = '$madon'");
  
	disconnect_db();

	return;
}

function getTableDonRutTien() {
	global $conn;
	connect_db();

	$query = mysqli_query($conn,"SELECT * FROM DonRutTien WHERE TinhTrang = '0'");
 	 $list = array();
	while($row = mysqli_fetch_assoc($query))
	{
		$list[] = $row;
	}
	disconnect_db();

	return $list;
}

function duyetRutTien($STT) {
	global $conn;
	connect_db();
  
  $STT = $conn -> real_escape_string($STT);

	mysqli_query($conn,"UPDATE DonRutTien SET TinhTrang = '1' WHERE STT = '$STT'");
 
	disconnect_db();

	return;
}

function xoaDuyetRutTien($STT) {
	global $conn;
	connect_db();
  
  $STT = $conn -> real_escape_string($STT);

	mysqli_query($conn,"DELETE FROM DonRutTien WHERE STT = '$STT'");
 
	disconnect_db();

	return;
}

function getThongTinDonDichVuAdmin() {
  global $conn;
	connect_db();

  
	$query = mysqli_query($conn,"SELECT * FROM Order_Dich_Vu ORDER BY STT DESC");
 	$row = mysqli_fetch_assoc($query);
	$list = array();
	while($row = mysqli_fetch_assoc($query))
	{
		$list[] = $row;
	}
	disconnect_db();

	return $list;
}

function getThongTinSuaChua($STT) {
  global $conn;
	connect_db();
  
   $STT = $conn -> real_escape_string($STT);
	$query = mysqli_query($conn,"SELECT * FROM ThongTinSuaChua WHERE MaDonHang = '$STT'");
 	$row = mysqli_fetch_assoc($query);
	disconnect_db();

	return $row;
}

?>