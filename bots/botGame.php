<?php
  if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('Location: ../');
  }
  else {
    include_once '../php/header.php';
    $gameType = $_POST['type'];

    function echoThrees() {
      echo "<h1>Traditional Tic-Tac-Toe!</h1>
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
              <a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\" id=\"surrenderButt\">Return Home</button></a>
              </div>
            </body>";
    }

    function echoNines() {
      echo "<h1><u>Dark Web Tic-Tac-Toe >:)</u></h1>
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

      echo "</div>
          </div>
          <br>
          <a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\" id=\"surrenderButt\">Return Home</button></a>
          </div>
        </body>";
    }

    if($gameType == "3e") {
      echoThrees();
      echo "<script type=\"text/javascript\" src=\"easy/simpleGame.js\"></script>
        </html>";
    }
    if($gameType == "9e") {
      echoNines();
      echo "<script type=\"text/javascript\" src=\"easy/gameLogicEasy.js\"></script>
        </html>";
    }
    if($gameType == "3m") {
      echoThrees();
      echo "<script type=\"text/javascript\" src=\"medium/simpleGame.js\"></script>
        </html>";
    }
    if($gameType == "9m") {
      echoNines();
      echo "<script type=\"text/javascript\" src=\"medium/gameLogicMed.js\"></script>
        </html>";
    }
    if($gameType == "3h") {
      echoThrees();
      echo "<script type=\"text/javascript\" src=\"hard/simpleGame.js\"></script>
        </html>";
    }
    if($gameType == "9h") {
      echoNines();
      echo "<script type=\"text/javascript\" src=\"hard/gameLogicHard.js\"></script>
        </html>";
    }
  }
?>
