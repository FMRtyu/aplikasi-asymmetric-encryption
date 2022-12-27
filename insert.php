<?php
session_start();
include('config/database_connection.php');
$kuncipub = $_COOKIE['keypub'];
$data = array(
    ':username' => $_GET['username'],
    ':password' => $_GET['password'],
    ':public' => $kuncipub
);

$query = "
INSERT INTO login 
(username, password, public_key) 
VALUES (:username, :password, :public)
";
$statement = $connect->prepare($query);
if ($statement->execute($data)) {
    $message = "<label>Pendaftaran berhasil !</label>";
}
header("location:login.php?msg=<label>Pendaftaran berhasil !</label>");
?>