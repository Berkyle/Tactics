  <?php
  /**
    ** @brief Shows the users ranked by their points
  	** @pre successful connection to database and user has logged in
  	** @post none
  	** @return none
    */
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
      echo "<h2>Online Leaderboard</h2>".
            "<div class=\"row\">".
              "<div class=\"col-sm-6 col-sm-offset-3\">".
                "<div class=\"table-responsive\">".
                  "<div class=\"table-sizer\">".
                    "<table class=\"table table-hover table-fixed table-bordered\">".
                      "<thead>".
                        "<tr>".
                          "<th>Rank</th>".
                          "<th>Username</th>".
                          "<th>Points</th>".
                        "</tr>".
                      "</thead>".
                      "<tbody>";
      if($sessionUsr == "") {
                   echo "<tr><td colspan=\"3\"><h3>You must be logged in to view rankings.</h3></td></tr>";
      }
      else {
        for($k = 0; $k < $numrows; $k++) {
                   echo "<tr>".
                          "<td class=\"fiterable-cell\">".($k+1)."</td>".
                          "<td class=\"fiterable-cell\">".($users[$numrows-1-$k])."</td>".
                          "<td class=\"fiterable-cell\">".($userPoints[$numrows-1-$k])."</td>".
                        "</tr>";
        }
      }
                echo  "</tbody>".
                    "</table>".
                  "</div>".
                "</div>".
              "</div>".
            "</div>".
            "<br>";
      $query->close();
    }
  ?>
