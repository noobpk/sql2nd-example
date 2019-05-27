<?php

// Require cac thu vien.

require_once('classes/session.php'); // session 
require_once('classes/database.php'); // database

//Khoi tao class Database - Ket noi toi database.
$db = new DB();

$db->connect();
$db->query("SET NAMES utf8");

$session = new Session();

$session->start();

$user = $session->get();

// Lay thong tin user
if($user){
	$sql_get_data_user = "SELECT * FROM users WHERE username = '$user'";
	if($db->num_rows($sql_get_data_user)){
	$ck = $db->fetch_assoc($sql_get_data_user, 1);
		$user_name = $ck['username'];
	}
}
?>