<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    include_once '../php/header.php';
    require_once 'ninerFunctions.php';
    require_once 'nineClass.php';
    $gameID = $_POST['selectGame'];

    $currGame = mysqli_query($link, "SELECT * FROM NinesBoards WHERE gameID = '$gameID'");
    $moves = mysqli_query($link, "SELECT * FROM NinesMoves WHERE gameID = '$gameID'");

    while($row = $currGame->fetch_assoc())
    {
      $userX = $row["user1"];
      $userO = $row["user2"];
      $boardState = $row["gameState"];
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
          $AllMoves = array();
          while($move = $moves->fetch_assoc())
          {
            array_push($AllMoves, $move["movePosition"]);
          }

          $GAME = new ninerBoard($userX, $userO, $AllMoves, $gameID);

          $grayNum = ($GAME->getGrayStatus())%9;
          $boardArray = buildBoardArray($boardState); //won boards
          $grayArray = makeGrayArray($grayNum); //Grayed boards

          //Create and populate table with Xs and Os already made
          for($i = 0; $i < 3; $i++)
          {
            echo "<div class=\"snug\">";
            for($j = 0; $j<3; $j++)
            {
              //Begin BOARD build
              $k = ($i*3)+$j;
              echo "<table class=\"subtable ".$k." ".$boardArray[$k]."\" cellspacing=\"0\">";

              for($m = 0; $m < 3; $m++)
              {
                echo "<tr>";
                for($n = 0; $n < 3; $n++)
                {
                  //Begin TILE build
                  $tile = ($k*9)+($m*3)+$n;

                  if ($GAME->getTileValue($tile) == "O")
                  {
                    echo "<td class=\"board selected OSelect\">O</td>";
                  }
                  elseif ($GAME->getTileValue($tile) == "X")
                  {
                    echo "<td class=\"board selected XSelect\">X</td>";
                  }
                  else
                  {
                    if(!$grayArray[$k])
                    {
                      echo "<input type=\"radio\" name=\"move9\" value=\"".$tile."\" class=\"radio online\" required>
               					    <td class=\"board\"></td>";
                    }
                    else
                    {
                      echo "<td class=\"board grayed\"></td>";
                    }
                  }
                }
                echo "</tr>";
              }
              echo "</table>";
            }
            echo "</div>";
          }
          echo "</div>";
?>
            <input type="hidden" name="gameID" value="<?php echo $gameID; ?>">
            <input id="ignoreMe" type="hidden" name="gameState" value="<?php echo $GAME->getNumMoves(); ?>">
						<br>
					</div>
					<div>
						<a href="../"><button type="button" class="btn btn-default btn-lg">Return Home</button></a>
						<button type="submit" class="btn btn-default btn-lg" id="submit" name="submit">Place move!</button>
					</div>
        </form>
      <br>
    </div>
  </body>
	<script type="text/javascript" src="ninesJS.js"></script>
  <script type="text/javascript" src="../js/9by9PageState.js"></script>
  <script type="text/javascript" src="../js/nineByNine.js"></script>
</html>

<?php
}
else {
    header('Location: ../');
}
?>
