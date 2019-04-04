<?php
// Make sure output buffering is turned on in php.ini before
// Turns off any browser built-in XSS protections  
header('X-XSS-Protection: 0');                    
                                                
require_once('init_connection.php');                           

$dbase = connect_to_db();                                  
                                                    
?>   
