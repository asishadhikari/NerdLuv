<?php
require_once('connect_mysql.php');
//used to establish connection with db on first request
function connect_to_db() {                                                          
	$conn = mysqli_connect(DB_SRV, DB_USR, DB_PASS, DB_NAME);            
	if(mysqli_connect_errno()) {                                                   
		$err = "Failed to initiate database connection. ";                                       
		$err .= mysqli_connect_error();                                              
		$err .= " (" . mysqli_connect_errno() . ")";                                 
		exit($msg);                                                                  
	}                                                                              
	return $conn;                                                            
}

$dbase = connect_to_db();                                  

?>