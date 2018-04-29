<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include_once '../php/header.php';
    require_once 'nineClass.php';
    $gameID = $_POST['selectGame'];

    $currGame = mysqli_query($link, "SELECT * FROM NinesBoards WHERE gameID = '$gameID'");
    $moves = mysqli_query($link, "SELECT * FROM NinesMoves WHERE gameID = '$gameID'");

    while($row = $currGame->fetch_assoc())
    {
      $userX = $row["user1"];
      $userO = $row["user2"];
    }

    $opponent = ($userX == $sessionUsr ? $userO : $userX);

    echo "<h1>Continue game:</h1>
          <h2>Your 9x9 game with ".$opponent."</h2>";

?>

  <form action="ninesSubmit.php" onsubmit="checkState()" method="post">
    <h3>Choose your next move below:</h3>
    <div class="tableContainer">
      <div id="outter" class="outter">

<?php
          $OMoves = array();
          $XMoves = array();
          $AllMoves = array();
          // $lastMove = 0;
          // $bigMove = "";
          while($move = $moves->fetch_assoc())
          {
            array_push($AllMoves, $move["movePosition"]);

            if($move["isX"] == 1)
              array_push($XMoves, $move["movePosition"]);
            else
              array_push($OMoves, $move["movePosition"]);
            // if($move["moveNumber"] > $lastMove) {
            //   $lastMove = $move["moveNumber"];
            //   $bigMove = $move["movePosition"];
            // }
          }

          $game = new ninerBoard($userX, $userO, $AllMoves, $gameID);
          $notGray = ($game->getLastMove())%9;

          echo "<h1>".$notGray."</h1>";

          //Create and populate table with Xs and Os already made
          for($i = 0; $i < 3; $i++)
          {
            echo "<div class=\"snug\">";
            for($j = 0; $j<3; $j++)
            {
              $k = $i*3+$j;
              $classAdd = "";
              if($k != $notGray) $classAdd = "gray";

              echo "<table class=\"subtable ".$k."\" cellspacing=\"0\">";

              for($m = 0; $m < 3; $m++)
              {
                echo "<tr>";
                for($n = 0; $n < 3; $n++)
                {
                  $tile = ($k*9)+($m*3)+$n;
                  if (in_array($tile, $OMoves)) echo "<td class=\"board ".$classAdd."\">O</td>";
                  elseif (in_array($tile, $XMoves)) echo "<td class=\"board\">X</td>";
                  else
                  {
                    echo "<input type=\"radio\" name=\"move9\" value=\"".$tile."\" class=\"radio online\" required>
             					  <td class=\"board\"></td>";
                  }
                }
                echo "</tr>";
              }
              echo "</table>";
            }
            echo "</div>";
          }

?>

            </div>
            <input type="hidden" name="gameID" value="<?php echo $gameID; ?>">
            <input id="ignoreMe" type="hidden" name="gameState" value="<?php echo $bigMove; ?>">
						<br>
					</div>
					<div>
						<a href="../"><button type="button" class="btn btn-default btn-lg">Return Home</button></a>
						<input type="submit" class="btn btn-default btn-lg" name="submit" value="Place move!">
					</div>
        </form>
      <br>
    </div>
  </body>
	<!-- <script type="text/javascript" src="ninesJS.js"></script> -->
</html>

<?php
}
else {
    header('Location: ../');
}
?>
