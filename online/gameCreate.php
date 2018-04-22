<?php
  include_once '../php/header.php';
  $sessionUsr = $_COOKIE["user"];
  $inviteUsr  = $_POST["user2"];
  $plyrMove   = $_POST["move"];

  if(strtolower($sessionUsr) == strtolower($inviteUsr)) {
    echo "<h1>You can't play with yourself here..</h1><h3>.... you should probably go outside..</h3>";
  }
  else {
    $check = mysqli_query($link, "SELECT * FROM GameUsers WHERE username='$inviteUsr'");
    $found = mysqli_num_rows($check);
    if($found > 0) { //Check database for existing user with the same name
      if($plyrMove >= 0 && $plyrMove <= 8) { //Check move validity
        //At this point, all inputs valid.
        //Make that game!

        $nextID = mysqli_num_rows(mysqli_query($link, "SELECT * FROM ThreesBoards")) + 1;

        //Create row in game board table
        $queryTable = "INSERT IGNORE INTO ThreesBoards(user1, user2) VALUES('$sessionUsr', '$inviteUsr')";
        if ($result = $link->query($queryTable)) {
          echo "<h1>New game created!</h1>";
        }

        //Create row in game move table
        $queryMove = "INSERT IGNORE INTO ThreesMoves(game_id, isX, moveNumber, movePosition) VALUES('$nextID', '1', '1', '$plyrMove')";
        if ($result = $link->query($queryMove)) {
          echo "<h4>User ".$inviteUsr." has received your challenge!</h4>";
        }

        echo "<a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\">Home</button></a>";
        $result->free(); // free result set
        $link->close(); /*close connection */
      }
      else {
        echo "<h1>what the... hey bud that's no good...</h1>";
      }
    }
    else { //Invited user does not exist
      echo "<h1>User ".$inviteUsr." does not exist...</h1>
            <h3>Please reference the rankings in Tactics Home for active users.</h3>";
    }
  }
  echo "<a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\">Home</button></a>";
  include_once '../php/footer.php';
?>
