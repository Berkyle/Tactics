<?php include_once '../php/header.php'; ?>

<h1>Continue game:</h1>
<h2>Your games:</h2>

<div class="col-sm-6">
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><h2>Your 3x3 Matches</h2></div>
      <div class="panel-body">
        <?php
        $queryThrees = mysqli_query($link, "SELECT * FROM ThreesBoards WHERE user1 = '$sessionUsr' OR user2 = '$sessionUsr'");
        $numrows = 0 + mysqli_num_rows($queryThrees);

        echo "<h3>You have ".$numrows." active 3x3 games!</h3>";

        if($numrows > 0) { //User has active games
          while($row = $queryThrees->fetch_assoc()) {
            $ID = $row["gameID"];
            $userX = $row["user1"];
            $userO = $row["user2"];

            $boardMoves = mysqli_query($link, "SELECT * FROM ThreesMoves WHERE gameID = '$ID'");

            if($userX == $sessionUsr) $userX = "You";
            else $userO = "you";

            echo "<div class=\"container\">
                    <div class=\"col-sm-6\">".
                    $userX." (X)<br><br>challenged<br><br>".$userO." (O): ".
                    "</div>
                    <div class=\"col-sm-6\">
                      <table>";

            $OMoves = array();
            $XMoves = array();
            while($move = $boardMoves->fetch_assoc()) {
              if($move["isX"] == 1) array_push($XMoves, $move["movePosition"]);
              else array_push($OMoves, $move["movePosition"]);
            }

            for($i = 0; $i < 3; $i++) {
              echo "<tr>";
              for($j = 0; $j < 3; $j++) {
                $tile = ($i*3)+$j;

                echo "<td class=\"board\">";
                if (in_array($tile, $OMoves)) echo "O";
                elseif (in_array($tile, $XMoves)) echo "X";
                echo "</td>";
              }
              echo "</tr>";
            }

            echo     "</table>
                    </div>
                  </div><br>";

            $boardMoves->close(); /*close connection */
          }
        }

        $queryThrees->close(); /*close connection */
        ?>
      </div>
    </div>
  </div>
</div>

<div class="col-sm-6">
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><h2>Your 9x9 Matches</h2></div>
      <div class="panel-body">
        <?php
        $queryNines = mysqli_query($link, "SELECT * FROM NinesBoards WHERE user1 = '$sessionUsr' OR user2 = '$sessionUsr'");
        $numrows = 0 + mysqli_num_rows($queryNines);

        echo "<h3>You have ".$numrows." active 9x9 games!</h3>";

        $queryNines->close(); /*close connection */
        ?>
      </div>
    </div>
  </div>
</div>
<?php include_once '../php/footer.php'; ?>
