<?php

function echoThrees($difficulty) {
  echo "<h1>TRADITIONAL Tic-Tac-Toe: <u>".$difficulty."</u> difficulty!</h1>
        <div class=\"tableContainer\">
          <table cellspacing=\"0\">";

  for($i = 0; $i<3; $i++) {
    echo "<tr>";
    for($j = 0; $j<3; $j++) {
      echo "<td class=\"board\"></td>";
    }
    echo    "</tr>";
  }
  echo     "</table>
          </div>
          <br>
          <a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\">Return Home</button></a>";
  addNewGameMenu();
   echo  "</div>
      </body>".
      "<script type=\"text/javascript\" src=\"../js/pageState.js\"></script>".
      "<script type=\"text/javascript\" src=\"../js/ThreesClass.js\"></script>";
}

function echoNines($difficulty) {
  echo "<h1>EXTREME Tic-Tac-Toe: ".$difficulty." difficulty!</h1>
        <div class=\"tableContainer\">
          <div id=\"outter\" class=\"outter\" cellspacing=\"0\">";

  for($i = 0; $i < 3; $i++) {
    echo "<div class=\"snug\">";
    for($j = 0; $j < 3; $j++) {
      $k = $i*3 + $j;
      echo "<table class=\"subtable ".$k."\" cellspacing=\"0\"></table>";
    }
    echo "</div>";
  }

  echo      "</div>
          </div>
          <br>
          <a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\">Return Home</button></a>";
  addNewGameMenu();
  echo  "</div>
      </body>".
      "<script type=\"text/javascript\" src=\"../js/9by9PageState.js\"></script>".
      "<script type=\"text/javascript\" src=\"../js/nineByNine.js\"></script>";
}

function addNewGameMenu() {
  ?>
  <div class="container">
    <div class="col-xl-2">
      <br>
      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading"><h2>Play Another Bot Game!</h2></div>
          <div class="panel-body">
            <form action="botGame.php" method="post">
              <button name="type" value = "3e" class="btn btn-default btn-lg">3 x 3 Easy</button>
              <button name="type" value = "9e" class="btn btn-default btn-lg">9 x 9 Easy</button>
              <br>
              <button name="type" value = "3m" class="btn btn-default btn-lg">3 x 3 Medium</button>
              <button name="type" value = "9m" class="btn btn-default btn-lg">9 x 9 Medium</button>
              <br>
              <button name="type" value = "3h" class="btn btn-default btn-lg">3 x 3 Hard</button>
              <button name="type" value = "9h" class="btn btn-default btn-lg">9 x 9 Hard</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
}

 ?>
