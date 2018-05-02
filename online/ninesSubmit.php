<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include_once '../php/header.php';

  $gameID = $_POST['gameID'];
  $gameState = $_POST['gameState'];
  $moveNum = $_POST['move9'];
  $winner = $_POST['submit'];

  //Place move//////////////////
  $numMoves = 0;
  $moves = mysqli_query($link, "SELECT * FROM NinesMoves WHERE gameID = '$gameID'");
  $numMoves = mysqli_num_rows($moves);
  $thisMove = $numMoves+1;

  if($thisMove%2 == 0) $isX = 0;
  else $isX = 1;

  $checkForMeanies = mysqli_query($link, "SELECT * FROM NinesBoards WHERE gameID = '$gameID'");
  while($row = $checkForMeanies->fetch_assoc()) {
    $userX = $row["user1"];
    $userO = $row["user2"];
  }

  if(($numMoves%2 == 0 && strtolower($sessionUsr) == strtolower($userX)) || ($numMoves%2 == 1 && strtolower($sessionUsr) == strtolower($userO))) {

    $queryMove = "INSERT IGNORE INTO NinesMoves(gameID, isX, moveNumber, movePosition) VALUES('$gameID', '$isX', '$thisMove', '$moveNum')";
    if ($link->query($queryMove) === TRUE) {
      $status =  "<h1>Your move has been placed!</h1>";
    }
    else {
      echo "Error updating record: " . $link->error;
    }


    $queryState = "UPDATE NinesBoards SET gameState = '$gameState' WHERE gameID = '$gameID'";

    if ($link->query($queryState) === TRUE) {
      echo $status;
    }
    else {
      echo "Error updating record: " . $link->error;
    }


    //Finish place move//////////////////

    if($winner == 'X' || $winner == 'O' ) {
      //Session user won!
      $currGame = mysqli_query($link, "SELECT * FROM NinesBoards WHERE gameID = '$gameID'");
      while($row = $currGame->fetch_assoc()) {
        $userX = $row["user1"];
        $userO = $row["user2"];
      }
      //$currGame->close(); /*close connection */

      if(strtolower($userX) == strtolower($sessionUsr)) $opponent = $userO;
      else $opponent = $userX;

      if(($winner == 'X' && strtolower($userX) == strtolower($sessionUsr)) || ($winner == 'O' && strtolower($userO) == strtolower($sessionUsr))) {
        //Case where current user won the game
        echo "<h1>CONGRATULATIONS! You Won!</h1>
              <h3>You have been awarded 30 points!</h3>";
      }
      else {
        //Current user somehow ... lost the game...
        echo "<h1>CONGRATULATIONS! You ... LOST???</h1>
              <h3>You have STILL been awarded 30 points! A+ for effort!</h3>";
      }

      //Give wins and losses to players
      $winner = "UPDATE Profiles SET nineWins = nineWins + 1 WHERE username = '$sessionUsr'";
      $loser  = "UPDATE Profiles SET nineLosses = nineLosses + 1 WHERE username = '$opponent'";
      $board  = "UPDATE NinesBoards SET winner = '$sessionUsr' WHERE gameID = '$gameID'";

      if ($link->query($winner) === TRUE  && $link->query($loser) === TRUE && $link->query($board) === TRUE) {
        echo "<a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\">Home</button></a>";
      }
      else {
        echo "Error updating record: " . $link->error;
      }
    }
    elseif ($winner == "A") {
      //Catscratch game!
      echo "<h1>Game tie!</h1>
            <h3>Both players get 10 points!</h3>";

      //change each players profile to reflect tie
      $player = "UPDATE Profiles SET nineDraws = nineDraws + 1 WHERE username = '$sessionUsr'";
      $other  = "UPDATE Profiles SET nineDraws = nineDraws + 1 WHERE username = '$opponent'";
      $board  = "UPDATE NinesBoards SET winner = 'TIE' WHERE gameID = '$gameID'";

      if ($link->query($player) === TRUE  && $link->query($other) === TRUE && $link->query($board) === TRUE) {
        echo "<a href=\"continue.php\"><button type=\"button\" class=\"btn btn-default btn-lg\">View Games</button></a>";
        echo "<a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\">Home</button></a>";
      }
      else {
        echo "Error updating record: " . $link->error;
      }
    }
    else {
      //Game continues
      echo "<a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\">Home</button></a>";
      echo "<a href=\"continue.php\"><button type=\"button\" class=\"btn btn-default btn-lg\">View Games</button></a>";
    }
  }
  else {
    echo  "<h6>Think you're slick, huh...?</h6>".
          "<h6>Well... I appreciate your commitment to security...</h6>".
          "<h6>Now get outta here, I've got half a mind to log your IP address...</h6>";
    echo "<a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\">Home</button></a>";
  }

  include_once '../php/footer.php';

  //$currGame->close(); /*close connection */
  $moves->close(); /*close connection */
}
else {
  header('Location: ../');
}
?>
