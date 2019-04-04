<?php
	include('top.html');
	require_once('init_connection.php');


	$given_name = $_GET['name'];
	global $dbase;

	$gender = '';
	$persona_type = '';
	$fav_os = '';
	$min_seek_age = '';
	$max_seek_age = '';
	$age = '';
	$uid = ''; 

	//query dbase
	$stmt = "SELECT * FROM users where name = '" . $given_name . "';";

?>