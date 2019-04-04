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
		$persona_type = $res_personality->fetch_assoc()["name"];

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
		$res_seek_age = mysqli_query($dbase, $stmt);
		$seek_ages = $res_seek_age->fetch_assoc();
		$min_seek_age = (int)$seek_age["min_age"];
		$max_seek_age = (int)$seek_age["max_age"];

	}
}

//Since gender is submitted with radio, not input validating here
$seeking_gender =  (strcmp($gender,'M')==0 ? 'F' : 'M');
$candidate = array();

$stmt = "SELECT users.name, gender, age, ";
$stmt .= "fav_os.name as os, ";
$stmt .= "personalities.name as personality FROM users ";
$stmt .= "JOIN fav_os ON users.id = fav_os.user_id ";
$stmt .= "JOIN seeking_age ON users.id = seeking_age.user_id ";
$stmt .= "JOIN personalities ON users.id = personalities.user_id ";
$stmt .= "WHERE users.gender = ";
$stmt .= "'" . $seeking_gender . "' ";
$stmt .= "and users.age >= ". $min_seek_age . " ";
$stmt .= "and users.age <= ". $max_seek_age . " ";
$stmt .= "and seeking_age.min_age <= " . $age . " ";
$stmt .= "and seeking_age.max_age >= " . $age . " ";
$stmt .= "and fav_os.name = '" . $fav_os . "'; ";

$query = mysqli_query($dbase, $stmt);
}else{
?>
	<p> No match is found.</p>
<?php	
}


include('bottom.html');
?>