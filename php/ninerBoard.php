<?php include_once '../php/header.php'; ?>

      <h1><u>Dark Web Tic-Tac-Toe >:)</u></h1>
      <div class="tableContainer">
      	<div id="outter" class="outter" cellspacing="0">

          <?php
            for($i = 0; $i < 3; $i++) {
              echo "<div class=\"snug\">";
              for($j = 0; $j < 3; $j++) {
                $k = $i*3 + $j;
                echo "<table class=\"subtable ".$k."\" cellspacing=\"0\"></table>";
              }
              echo "</div>";
            }
          ?>

      	</div>
      </div>
      <br>
      <a href="../"><button type="button" class="btn btn-default btn-lg" id="surrenderButt">Return Home</button></a>
    </div>
    <a class="twitter-share-button"
  href="https://twitter.com/intent/tweet?text=Hello%20world">
Tweet</a>
  </body>
  <script type="text/javascript" src="../js/ninerGame.js"></script>
</html>
