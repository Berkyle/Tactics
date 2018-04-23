<?php include_once '../php/header.php'; ?>

<h1>ADVANCED Tic-Tac-Toe!</h1>
  <form action="gameCreate.php" method="post">
    <h3>Choose your opponent</h3>
    <input type="text" name="user2" class="form-control online" placeholder="Choose another player by their username..." required>
		<h3>Choose your first move below:</h3>
		<div class="tableContainer">
      <!-- <table cellspacing="0"> -->
      <div id="outter" class="outter" cellspacing="0">

<?php
for($i = 0; $i<3; $i++) {
  echo "<div class=\"snug\">";
  for($j = 0; $j<3; $j++) {
		$k = $i*3+$j;
    echo "<table class=\"subtable ".$k."\" cellspacing=\"0\"></table>";
  }
  echo "</div>";
}
?>

						</div>
            <br>
						<div>
							<a href="../"><button type="button" class="btn btn-default btn-lg">Return Home</button></a>
							<input type="submit" class="btn btn-default btn-lg" name="submit" value="Create Game!">
						</div>
          </form>
        <br>
      </div>
    </body>
		<script type="text/javascript" src="ninesJS.js"></script>
</html>
