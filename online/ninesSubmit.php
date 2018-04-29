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
  while($row = $moves->fetch_assoc()) {
    $numMoves++;
  }
  //$row->close(); /*close connection */
  $thisMove = $numMoves+1;

  if($thisMove%2 == 0) $isX = 0;
  else $isX = 1;

  $queryMove = "INSERT IGNORE INTO NinesMoves(gameID, isX, moveNumber, movePosition) VALUES('$gameID', '$isX', '$thisMove', '$moveNum')";
  if ($link->query($queryMove) === TRUE) {
    $status =  "Your move has been placed!";
  }
  else {
    echo "Error updating record: " . $link->error;
  }


  $queryState = "UPDATE NinesBoards SET gameState = '$gameState' WHERE gameID = '$gameID'";

  if ($link->query($queryState) === TRUE) {
    $status .= " Game state saved!";
  }
  else {
    echo "Error updating record: " . $link->error;
  }

  echo "<h3>".$status."</h3>";

  //Finish place move//////////////////

  if($winner == 'X' || $winner == 'O' ) {
    //Session user won!
    $currGame = mysqli_query($link, "SELECT * FROM NinesBoards WHERE gameID = '$gameID'");
    while($row = $currGame->fetch_assoc()) {
      $userX = $row["user1"];
      $userO = $row["user2"];
    }
    //$currGame->close(); /*close connection */

    if($userX == $sessionUsr) $opponent = $userO;
    else $opponent = $userX;

    if(($gameState == 'X' && $userX == $sessionUsr) || ($gameState == 'O' && $userO == $sessionUsr)) {
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

  include_once '../php/footer.php';

  //$currGame->close(); /*close connection */
  $moves->close(); /*close connection */
}
else {
  header('Location: ../');
}
?>
