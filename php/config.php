<?php
  define('DB_SERVER', 'mysql.eecs.ku.edu');
  define('DB_USERNAME', 'k742b154');
  define('DB_PASSWORD', 'ahm3Thei');
  define('DB_NAME', 'k742b154');

  $link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
?>
