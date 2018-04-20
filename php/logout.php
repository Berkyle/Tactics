<?php
/**
  ** @brief Allows the user to logout by unsetting cookies
	** @pre successful connection to database
	** @post user is logged out
	** @return success message
  */
  setcookie("user", "", time()-1, "/"); //Unset cookie
  setcookie("pw", "", time()-1, "/");  //Unset cookie

  include_once 'header.php';
  echo "<h1>You have logged out successfuly!</h1>
        <a href=\"../index.php\"><button type=\"button\"><h3>Return to Landing</h3></button></a>";
  include_once 'footer.php';
?>
