<?php include_once '../php/header.php'; ?>

<h1>Traditional Tic-Tac-Toe!</h1>
  <form action="gameCreate.php" method="post">
    <h3>Choose your opponent</h3>
    <input type="text" name="user2" class="form-control online" placeholder="Choose another player by their username..." required>
		<h3>Choose your first move below:</h3>
		<div class="tableContainer">
      <table cellspacing="0">

<?php
for($i = 0; $i<3; $i++) {
  echo "<tr>";
  for($j = 0; $j<3; $j++) {
		$k = ($i*3)+$j;
    echo "<input type=\"radio\" name=\"move\" value=\"".$k."\" class=\"radio online\" required>
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
