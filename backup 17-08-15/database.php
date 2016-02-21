 <?php 
  
    $server="68.178.253.53:3306";
    $user = "yuzh2379444012";
    $pass = "eQ-ic,7{BE";
    $db="yuzh2379444012"; 
      
    // connect to mysql 
      
    mysql_connect($server, $user, $pass) or die("Sorry, can't connect to the mysql."); 
      
    // select the db 
      
    mysql_select_db($db) or die("Sorry, can't select the database."); 
  
?>