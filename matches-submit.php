<?php
include('top.html');
require_once('init_connection.php');


$given_name = $_GET['name'];
global $dbase;

if(!$dbase){
	print("Not Connected!!");
}

$uid = ''; 
$age = '';
$gender = '';
$persona_type = '';
$min_seek_age = '';
$max_seek_age = '';
$fav_os = '';

	//query dbase
$stmt = "SELECT * FROM users where name = '".$given_name."';";
$matches = mysqli_query($dbase, $stmt);
//not worrying about duplicates and using first result
$record = mysqli_fetch_assoc($matches);

$uid = $record["id"];
$gender = $record["gender"];
$age = (int)$record["age"];

//obtain user's personality type
$stmt = "SELECT name FROM personalities WHERE user_id = '".$uid."';";
$res_personality = mysqli_query($dbase, $stmt);
$persona_type = $res_personality->fetch_assoc()["name"];

//obtain user's favourite os
$stmt = "SELECT name FROM fav_os WHERE user_id = ".$uid;
$res_favos = mysqli_query($dbase, $stmt);
$fav_os = $res_favos->fetch_assoc()["name"];

//obtain the seeking age
$stmt = "SELECT min_age, max_age FROM seeking_age WHERE user_id = ".$uid;
$res_seek_age = mysqli_query($dbase, $stmt);
$seek_age = $res_seek_age->fetch_assoc();
$min_seek_age = (int)$seek_age["min_age"];
$max_seek_age = (int)$seek_age["max_age"];

//Since gender is submitted with radio, not input validating here
$seeking_gender =  (strcmp($gender,'M')==0 ? 'F' : 'M');
$candidate = array();

/*
	Discarded query so as to maintain the unique results
$stmt = "SELECT users.name AS name, gender, age, personalities.name AS personality, ";
$stmt.= "fav_os.name as os FROM users, personalities, fav_os, seeking_age ";
$stmt.= "WHERE users.id = personalities.user_id AND personalities.user_id = fav_os.user_id ";
$stmt.= "AND fav_os.user_id = seeking_age.user_id ";
$stmt.= "AND gender = '".$seeking_gender."' AND age >= ".$min_seek_age." ";
$stmt.= "AND age <= ".$max_seek_age." AND fav_os.name = '".$fav_os."';";
*/

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
if (mysqli_num_rows($query) > 0) {
?>
	<strong>Matches for <?= $_GET['name'] ?></strong><br>
	<div>
<?php
		while ($record = mysqli_fetch_assoc($query)) {
			//check if a compatible personality
			$persona_check = "/[".$persona_type."]/";
			if (preg_match($persona_check, $record["personality"]) === 1){
?>
				<div class="match">
					<img src="user.jpg" alt="photo"/>
					<div>
						<ul>
							<li><p><?= $record["name"] ?></p></li>
							<li><strong>gender:</strong> <?= $record["gender"] ?></li>
							<li><strong> age:</strong> <?= $record["age"] ?> </li>
							<li><strong> type:</strong> <?= $record["personality"] ?> </li>
							<li><strong> OS:</strong> <?= $record["os"] ?></li>
						</ul>
					</div>
				</div>
	
			}
		}

	</div>

<?php
}if(mysqli_num_rows($query)==0){
?>
	<div>
	<p> No match is found.</p>
	</div>
<?php
}
include('bottom.html');
?>
