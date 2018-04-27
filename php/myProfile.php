<?php
/**
  ** @brief Shows a particular users profile
	** @pre successful connection to database
	** @post none
	** @return none
  */
  if(isset($_COOKIE['user'])) {
    include_once 'header.php';

    $query = mysqli_query($link, "SELECT wins, draws, losses FROM Profiles WHERE username='$sessionUsr'");
    $profile = $link->query($query);

    if(mysqli_num_rows($query) == 1) { //User exists
      $row = $query->fetch_assoc();

      $wins = $row["wins"];
      $draws = $row["draws"];
      $losses = $row["losses"];
      $points = 3*$wins + $draws;

      echo "<h1>Profile for $username</h1>
            <div class=\"profile\">
              <h3>Wins: $wins</h3>
              <h3>Draws: $draws</h3>
              <h3>Losses: $losses</h3>
              <h3>Total Points: $points</h3>
            </div>";

      $link->close();
    }
    else {
      echo "<h3>Internal database error: cannot locate user $username....</h3>";
    }
    echo "<a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\" id=\"surrenderButt\">Return Home</button></a>";

    include_once 'footer.php';
  }
  else {
    header('Location: ../');
  }
?>
