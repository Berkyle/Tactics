<?php
  include_once 'header.php';
  setcookie("user", "", time()-1);
  setcookie("pw", "", time()-1);

  ?>
  <h1>You have logged out successfuly!</h1>
  <a href="../index.html"><button type="button"><h3>Return to Landing</h3></button></a>
  <?php
  include_once 'footer.php';
?>
