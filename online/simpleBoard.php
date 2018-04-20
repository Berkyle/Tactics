<?php include_once '../php/header.php'; ?>
<style type="text/css">
	label > input{ /* HIDE RADIO */
	  visibility: hidden; /* Makes input not-clickable */
	  position: absolute; /* Remove input from document flow */
	}
	label > input + td{ /* IMAGE STYLES */
	  cursor:pointer;
	  border:2px solid transparent;
	}
	label > input:checked + div{ /* (RADIO CHECKED) IMAGE STYLES */
	  border:2px solid #f00;
	}
</style>
<h1 onload="">Traditional Tic-Tac-Toe!</h1>
  <div class="tableContainer">
    <form action="gameCreate.php" method="post">
      <input type="text" name="user2" placeholder="Player 2">
      <table cellspacing="0">";

<?php
for($i = 0; $i<3; $i++) {
  echo "<tr>";
  for($j = 0; $j<3; $j++) {
    echo "<label>
			     <input type=\"radio\" name=\"move\" value=\"small\"><td class=\"board\"></td>
          </label>";
  }
  echo "</tr>";
}
?>
              </table>
            </form>
          </div>
        <br>
        <a href="../"><button type="button" class="btn btn-default btn-lg">Return Home</button></a>
      </div>
    </body>
  <script type="text/javascript" src="../js/ThreesClass.js"></script>
  <script type="text/javascript" src="../js/rules.js"></script>
  <script type="text/javascript" src="../js/pageState.js"></script>
</html>
