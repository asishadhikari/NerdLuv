<?php
include('top.html');
require_once('init_connection.php');

//get provided name parameter
$given_name = $_GET['name'];
global $dbase;

//check if db connected
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

//query dbase for given name and consider only first record obtained
$stmt = "SELECT * FROM users where name = '".$given_name."';";
$matches = mysqli_query($dbase, $stmt);
$record = mysqli_fetch_assoc($matches);

//check if user with given name exists
$user_exists = (mysqli_num_rows($matches)==0) ? FALSE : TRUE;

//proceed with queries iff user exists
if($user_exists){
	//extract all entries in users table
	$uid = $record["id"];  
	$gender = $record["gender"];
	$age = (int)$record["age"];

	//Query personalities table for user's personality type
	$stmt = "SELECT name FROM personalities WHERE user_id = '".$uid."';";
	$res_personality = mysqli_query($dbase, $stmt);
	$persona_type = $res_personality->fetch_assoc()["name"];

	//Query fav_os table for the OS name
	$stmt = "SELECT name FROM fav_os WHERE user_id = ".$uid;
	$res_favos = mysqli_query($dbase, $stmt);
	$fav_os = $res_favos->fetch_assoc()["name"];

	//obtain the seeking age range and query seeking_age table
	$stmt = "SELECT min_age, max_age FROM seeking_age WHERE user_id = ".$uid;
	$res_seek_age = mysqli_query($dbase, $stmt);
	$seek_age = $res_seek_age->fetch_assoc();
	$min_seek_age = (int)$seek_age["min_age"];
	$max_seek_age = (int)$seek_age["max_age"];

	//Since gender is submitted with radio, not input validating here
	$seeking_gender =  (strcmp($gender,'M')==0 ? 'F' : 'M');
	$candidate = array();

	//construct query for all matching users for given user's information
	$stmt = "SELECT users.name, gender, age, ";
	$stmt .= "fav_os.name as os, ";
	$stmt .= "personalities.name as personality FROM users ";
	 //combine redundant info into one row
	$stmt .= "JOIN fav_os ON users.id = fav_os.user_id ";
	$stmt .= "JOIN seeking_age ON users.id = seeking_age.user_id ";
	$stmt .= "JOIN personalities ON users.id = personalities.user_id ";
	//conditions : opposite gender, age in range, same OS preference
	$stmt .= "WHERE users.gender = ";
	$stmt .= "'" . $seeking_gender . "' ";
	$stmt .= "and users.age >= ". $min_seek_age . " ";
	$stmt .= "and users.age <= ". $max_seek_age . " ";
	$stmt .= "and seeking_age.min_age <= " . $age . " ";
	$stmt .= "and seeking_age.max_age >= " . $age . " ";
	$stmt .= "and fav_os.name = '" . $fav_os . "'; ";

	$query = mysqli_query($dbase, $stmt);
	//only if matches obtained for given user query
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
	<?php
				}
			}
	?>
		</div>

	<?php
	}else{
	?>
		<p>No match is found. </p>
	<?php		
	}
	//Used to stop any queries for non existant users, check correcponding if stmt
}else{
	?>
	<strong>This User Does not Exist!!!</strong> 
	<?php
}
include('bottom.html');
?>
