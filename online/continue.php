<?php include_once '../php/header.php'; ?>

<h1>Continue game:</h1>
<div class="modal-body row">
  <div class="col-md-6">
    <?php include '../php/rankings.php'; ?>
  </div>
  <div class="col-md-6">
    <h2>Your games:</h2>

    <?php
    $query = mysqli_query($link, "SELECT * FROM ThreesBoards WHERE user1 = '$sessionUsr' OR user2 = '$sessionUsr'");
    $profile = $link->query($query);
    $numrows = mysqli_num_rows($query);

    echo "<h3>you have ".$numrows." games!</h3>";
    // for(let $i = 0; $i < $numrows; i++) {
    //   echo "<h3>you have ".$numrows." games!</h3>";
    // }

    ?>

  </div>
</div>
<?php include_once '../php/footer.php'; ?>
