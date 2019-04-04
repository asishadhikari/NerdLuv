<?php
include('top.html');
require_once('init_connection.php');


$given_name = $_GET['name'];
global $dbase;

$uid = ''; 
$age = '';
$gender = '';
$persona_type = '';
$min_seek_age = '';
$max_seek_age = '';
$fav_os = '';

	//query dbase
$stmt = "SELECT * FROM users where name = '" . $given_name . "';";
$matches = mysqli_query($dbase, $stmt);
/*
//not worrying about duplicates and using first result
$record = $matches->fetch_assoc()) 
$uid = $record["id"];
$gender = $record["gender"];
$age = (int)$record["age"];

//obtain user's personality type
$stmt = "SELECT name FROM personalities WHERE user_id = ".$uid;
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

$stmt = "SELECT users.name AS name, gender, age, personalities.name AS personality, fav_os.name as os FROM users, personalities, fav_os, seeking_age WHERE users.id = personalities.user_id = fav_os.user_id = seeking_age.user_id AND gender = ".$seeking_gender." AND age >= ".$min_seek_age." AND age <= ".$max_seek_age." AND fav_os = "$fav_os;

$query = mysqli_query($dbase, $stmt);

if ($query->num_rows > 0) {
	?>
	<strong>Matches for <?= $_GET['name'] ?></strong><br>
	<div>
		<?php
		while ($record = $query->fetch_assoc()) {
			//check if a compatible personality
			$persona_check = "/[".$persona_type."]/";
			if (preg_match($persona_check, $record["personality"]) === 1){
				?>
				<!--Display Matches  -->
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
	<p> No match is found.</p>
	<?php	
}

*/
include('bottom.html');
?>