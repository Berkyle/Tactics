  <?php
  /**
    ** @brief Shows the users ranked by their points
  	** @pre successful connection to database and user has logged in
  	** @post none
  	** @return none
    */
    $query = mysqli_query($link, "SELECT *, (30*nineWins + 10*nineDraws + 3*wins + 1*draws) AS POINTS FROM Profiles ORDER BY POINTS");
    $profile = $link->query($query);
    $numrows = mysqli_num_rows($query);

    if($numrows > 0) { //User exists
      $users = array();
      $userPoints = array();

      while($row = $query->fetch_assoc()) {
        $profile = $row["username"];

        $winsThree = $row["wins"];
        $drawsThree = $row["draws"];

        $winsNine = $row["nineWins"];
        $drawsNine = $row["nineDraws"];

        $points = 30*$winsNine + 10*$drawsNine + 3*$winsThree + $drawsThree;

        array_push($users, $profile);
        array_push($userPoints, $points);
      }

      echo "<h2>Online Leaderboard</h2>".
            "<div class=\"row\">".
              "<div class=\"col-sm-6 col-sm-offset-3\">".
                "<div class=\"table-responsive\">".
                  "<div class=\"table-sizer\">".
                    "<table class=\"table table-hover table-fixed table-bordered\">".
                      "<thead>".
                        "<tr>".
                          "<th class='text-center'>Rank</th>".
                          "<th class='text-center'>Username</th>".
                          "<th class='text-center'>Points</th>".
                        "</tr>".
                      "</thead>".
                      "<tbody>";
      if($sessionUsr == "") {
                   echo "<tr><td colspan=\"3\"><h3>You must be logged in to view rankings.</h3></td></tr>";
      }
      else {
        for($k = 0; $k < $numrows; $k++) {
                   echo "<tr>".
                          "<td class=\"fiterable-cell\">".($k+1)."</td>".                       //Rank
                          "<td class=\"fiterable-cell\">".(htmlspecialchars($users[$numrows-1-$k]))."</td>".      //User
                          "<td class=\"fiterable-cell\">".($userPoints[$numrows-1-$k])."</td>". //User's points
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
