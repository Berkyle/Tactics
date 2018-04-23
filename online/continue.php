<?php include_once '../php/header.php'; ?>

<h1>Continue game:</h1>
<h2>Your games:</h2>

<div class="col-sm-4">
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><h2>Your 3x3 Matches</h2></div>
      <div class="panel-body">
        <?php
        $query = mysqli_query($link, "SELECT * FROM ThreesBoards WHERE user1 = '$sessionUsr' OR user2 = '$sessionUsr'");
        $numrows = 0 + mysqli_num_rows($query);

        echo "<h3>you have ".$numrows." 3x3 games!</h3>";
      
        ?>
      </div>
    </div>
  </div>
</div>

<div class="col-sm-4">
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><h2>Rankings</h2></div>
      <div class="panel-body">
        <?php include '../php/rankings.php'; ?>
      </div>
    </div>
  </div>
</div>

<div class="col-sm-4">
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><h2>Your 9x9 Matches</h2></div>
      <div class="panel-body">
        <?php
        $query = mysqli_query($link, "SELECT * FROM NinesBoards WHERE user1 = '$sessionUsr' OR user2 = '$sessionUsr'");
        $numrows = 0 + mysqli_num_rows($query);

        echo "<h3>you have ".$numrows." 9x9 games!</h3>";

        $link->close(); /*close connection */
        ?>
      </div>
    </div>
  </div>
</div>
<?php include_once '../php/footer.php'; ?>
