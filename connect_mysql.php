<?php                                                                           
  define("DB_SRV", "localhost");                                             
  define("DB_USR", "USER1");                                                    
  define("DB_PASS", "USER1PASSWORD");                                                
  define("DB_NAME", "NERDLUV");                                                    

?>  


<!-- SELECT users.name AS name, gender, age, personalities.name AS personality, fav_os.name as os FROM users, personalities, fav_os, seeking_age WHERE users.id = personalities.user_id = fav_os.user_id = seeking_age.user_id AND gender = 'F' AND age >= 20 AND age <= 25 AND fav_os = 'Windows';  -->