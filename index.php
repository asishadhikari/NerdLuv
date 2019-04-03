<?php include("../html/top.html"); ?>


<?php
	//set a cookie
	setcookie(login, "sikari", time()+3800);
	echo $_COOKIE;

	
?>

<!-- Web Programming Step by Step, Homework 4 (NerdLuv)
     This provided file is the front page that links to two of the files you are going
     to write, signup.php and matches.php.  You don't need to modify this file. -->
<div>
	<h1>Welcome!</h1>

	<ul>
		<li>
			<a href="signup.php">
				<img src="../assets/signup.gif" alt="icon" />
				Sign up for a new account
			</a>
		</li>
		
		<li>
			<a href="matches.php">
				<img src="../assets/heartbig.gif" alt="icon" />
				Check your matches
			</a>
		</li>
	</ul>
</div>

<?php include("../html/bottom.html"); ?>
