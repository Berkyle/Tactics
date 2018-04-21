<?php
  require_once '../php/header.php';
  $sessionUsr = $_COOKIE["user"];
  $inviteUsr  = $_POST["user2"];
  $plyrMove   = $_POST["move"];

  echo "<ol><li>$sessionUsr</li>";
  echo "<li>$inviteUsr</li>";
  echo "<li> $plyrMove</li></ol>";

  /*stop :  make game with a user that doesn't exist

          */

  if($sessionUsr == $inviteUsr) {
    //require_once '../php/header.php';
    echo "<h1>You can't play with yourself here..</h1><h3>.... you should probably go outside..</h3>";
    require_once '../php/footer.php';
  }
  else {
    $check = mysqli_query($link, "SELECT * FROM GameUsers WHERE username='$inviteUsr'");
    $found = mysqli_num_rows($check);
    if($found > 0) { //Check database for existing user with the same name

      echo "<h1>User ".$inviteUsr." has received your challenge!";
    }
  }
?>
