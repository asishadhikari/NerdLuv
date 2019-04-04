<?php
require_once('connect_mysql.php');
header('X-XSS-Protection: 0');                    

function connect_to_db() {                                                          
	$conn = mysqli_connect(DB_SERV, DB_USR, DB_PASS, DB_NAME);            
	if(mysqli_connect_errno()) {                                                   
		$err = "Failed to initiate connection. ";                                       
		$err .= mysqli_connect_error();                                              
		$err .= " (" . mysqli_connect_errno() . ")";                                 
		exit($msg);                                                                  
	}                                                                              
	return $conn;                                                            
}   

$dbase = connect_to_db();                                  

?>