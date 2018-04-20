<?php
  include_once 'header.php';
  echo "<h1 onload=\"addEvents()\">Traditional Tic-Tac-Toe!</h1>
        <div class=\"tableContainer\">
          <table cellspacing=\"0\">";

  for($i = 0; $i<3; $i++) {
    echo "<tr>";
    for($j = 0; $j<3; $j++) {
      echo "<td class=\"board\"></td>";
    }
    echo "</tr>";
  }
?>
            </table>
          </div>
        <br>
        <a href="../"><button type="button" class="btn btn-default btn-lg">Return Home</button></a>
      </div>
    </body>
  <script type="text/javascript" src="../js/ThreesClass.js"></script>
  <script type="text/javascript" src="../js/rules.js"></script>
  <script type="text/javascript" src="../js/pageState.js"></script>
</html>
