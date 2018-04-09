<?php
/**
  ** @brief configuration for sql database connection
	** @pre Needs login credentials
	** @post Establishes a conection to the database and gives an error if it cannot.
	** @return None
  */

  define('DB_SERVER', 'mysql.eecs.ku.edu');
  define('DB_USERNAME', 'k742b154');
  define('DB_PASSWORD', 'ahm3Thei');
  define('DB_NAME', 'k742b154');

  $link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
?>
