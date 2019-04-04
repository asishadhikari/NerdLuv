<?php 
include("top.html"); 
require_once('init_connection.php');
//print(phpinfo());
?>

<!-- Web Programming Step by Step, Homework 4 (NerdLuv)
     This provided file is the front page that links to two of the files you are going
     to write, signup.php and matches.php.  You don't need to modify this file. -->
<div>
	<h1>Welcome!</h1>

	<ul>
		<li>
			<a href="signup.php">
				<img src="signup.gif" alt="icon" />
				Sign up for a new account
			</a>
		</li>
		
		<li>
			<a href="matches.php">
				<img src="heartbig.gif" alt="icon" />
				Check your matches
			</a>
		</li>
	</ul>
</div>

<?php include("bottom.html"); ?>
<!-- SELECT users.name AS name, gender, age, personalities.name AS personality, fav_os.name as os FROM users, personalities, fav_os, seeking_age WHERE users.id = personalities.user_id = fav_os.user_id = seeking_age.user_id AND gender = 'M' AND age >= 20 AND age <= 25 AND fav_os.name = 'Windows';  -->