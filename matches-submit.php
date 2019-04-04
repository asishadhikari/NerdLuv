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
$matches = mysqli_query($dbase, $stmt);


if ($matches->num_rows > 0) {
	while ($record = $matches->fetch_assoc()) {
		$uid = $record["id"];
		$gender = $record["gender"];
		$age = (int)$record["age"];

		$stmt = "SELECT name FROM personalities WHERE user_id = ";
		$stmt .= $uid . ";";
		$res_personality = mysqli_query($dbase, $stmt);
		$persona_type = $response_personality->fetch_assoc()["name"];

		$stmt = "SELECT name FROM fav_os WHERE user_id = ";
		$stmt .= $user_id . ";";
		$res_favos = mysqli_query($dbase, $stmt);
		$fav_os = $res_favos->fetch_assoc()["name"];

		$stmt = "SELECT min_age, max_age FROM seeking_age ";
		$stmt .= "WHERE user_id = ";
		$stmt .= $uid . ";";
		$res_seek_age = mysqli_query($dbase, $stmt);
		$seek_age = $res_seek_age->fetch_assoc();
		$min_seek_age = (int)$seek_age["min_age"];
		$max_seek_age = (int)$seek_age["max_age"];

		$stmt = "SELECT min_age, max_age FROM seeking_age ";
		$stmt .= "WHERE user_id = ";
		$stmt .= $uid . ";";
		$res_seek_ages = mysqli_query($dbase, $stmt);

	}
}




?>