<?php
include_once "includes/config.php";
$database = new Config();
$db = $database->getConnection();

include_once 'includes/tiket.inc.php';
$pro = new Tiket($db);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$pro->id = $id;
	
if($pro->delete()){
	echo "<script>alert('Berhasil Hapus Data');location.href='tiket.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='tiket.php';</script>";
		
}
?>
