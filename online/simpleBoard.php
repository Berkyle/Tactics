<?php include_once '../php/header.php'; ?>

<style type="text/css">
	/* div.board {
		display: inline-block;
		height: 40px;
		weight: 40px;
	} */
	/* label > input{ // HIDE RADIO
	  visibility: hidden; // Makes input not-clickable
	  position: absolute; // Remove input from document flow
	} */
	input[type=radio] {
		display: none;
	}
	input[type=text] {
		margin: auto;
		min-width: 400px;
		width: 30%;
	}
	input + td.board{
	  cursor:pointer;
	  border:2px solid transparent;
	}
	input:checked + div{
	  border:2px solid #f00;
	}
</style>
<h1>Traditional Tic-Tac-Toe!</h1>
  <form action="gameCreate.php" method="post">
    <input type="text" name="user2" class="form-control" placeholder="Player 2" required>
		<br>
		<div class="tableContainer">
      <table cellspacing="0">

<?php
for($i = 0; $i<3; $i++) {
  echo "<tr>";
  for($j = 0; $j<3; $j++) {
		$k = ($i*3)+$j;
    echo "<input type=\"radio\" name=\"move\" value=\"".$k."\" class=\"radio\" required>
					 <td class=\"board\"></td>";
  }
  echo "</tr>";
}
?>
              </table>
							<br>
						</div>
						<div class="">
							<a href="../"><button type="button" class="btn btn-default btn-lg">Return Home</button></a>
							<input type="submit" class="btn btn-default btn-lg" name="submit" value="Create Game!">
						</div>
          </form>
        <br>
        <!-- <a href="../"><button type="button" class="btn btn-default btn-lg">Return Home</button></a> -->
      </div>
    </body>
		<script type="text/javascript" src="maybeJS.js"></script>
  <!-- <script type="text/javascript" src="../js/ThreesClass.js"></script> -->
  <!-- <script type="text/javascript" src="../js/rules.js"></script> -->
  <!-- <script type="text/javascript" src="../js/pageState.js"></script> -->
</html>
