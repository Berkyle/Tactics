<div class="rankings">
  <h3 id="ldrbrd"><u>Online Leaderboard:</u></h3>
  <?php
    $query = mysqli_query($link, "SELECT username, wins, draws, losses FROM Profiles");
    $profile = $link->query($query);
    $numrows = mysqli_num_rows($query);

    if($numrows > 0) { //User exists
      $users = array();
      $userPoints = array();
      
      while($row = $query->fetch_assoc()) {
        $profile = $row["username"];
        $wins = $row["wins"];
        $draws = $row["draws"];
        $points = 3*$wins + $draws;

        array_push($users, $profile);
        array_push($userPoints, $points);
      }

      //BubbleSort to organize Leaderboard by points
      $swapped = true;
      while($swapped) {
        $swapped = false;
        for($i = 0; $i < $numrows-1; $i++) {
          if($userPoints[$i] > $userPoints[$i+1]) {
            $tempPoints = $userPoints[$i+1];
            $tempUser = $users[$i+1];

            $userPoints[$i+1] = $userPoints[$i];
            $userPoints[$i] = $tempPoints;
            $users[$i+1] = $users[$i];
            $users[$i] = $tempUser;
            $swapped = true;
          }
        }
      }

      for($k = 0; $k < $numrows; $k++) {  //For loop to report all users and points sequentially
        echo "<p>".($k+1).": ".($users[$k])." (".($userPoints[$k])." points)</p>";
      }
      $link->close();
    }
  ?>
</div>
