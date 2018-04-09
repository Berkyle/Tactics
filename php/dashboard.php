<?php
/**
  ** @brief PHP for dashboard page with login
	** @pre Needs successful connection to databse
	** @post allows the user to login given that he/she provides valid credentials
	** @return None
  */

  require_once 'config.php';
  include_once 'header.php';

  if(isset($_COOKIE["user"]) && isset($_COOKIE["pw"])){
    $username = $_COOKIE["user"];
    $password = $_COOKIE["pw"];

    $check = mysqli_query($link, "SELECT * FROM GameUsers WHERE username='$username'");
    $found = mysqli_num_rows($check);

    if($found > 0) { //User exists
      if($password == mysqli_fetch_object($check)->password) {
        echo "<div class=\"jumbotron\">
                <h1>Welcome Back $username!</h1>
              </div>";
        include 'rankings.php';
        include 'dashboardSuccess.php';
      }
      else{
        echo "<h3>Error accessing credentials...</h3>
              <a href=\"../index.html\"><button type=\"button\"><h3>Return to Landing</h3></button></a>";
      }
    }
    else {
      echo "<h3>Error accessing credentials....</h3>
            <a href=\"../index.html\"><button type=\"button\"><h3>Return to Landing</h3></button></a>";
    }
  }
  else {
    echo "<h3>Try logging in, doofus.</h3>
          <a href=\"../index.html\"><button type=\"button\"><h3>Proceed to Landing</h3></button></a>";
  }
  include_once 'footer.php';
?>
