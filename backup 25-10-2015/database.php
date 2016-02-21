 <?php 
  
    $server="68.178.253.2:3313";
    $user = "yuzh2748846212";
    $pass = "dhPJ3E@ZYv";
    $db="yuzh2748846212"; 
      
    // connect to mysql 
      
    mysql_connect($server, $user, $pass) or die("Sorry, can't connect to the mysql."); 
      
    // select the db 
      
    mysql_select_db($db) or die("Sorry, can't select the database."); 
  
?>