<?php
  include_once 'header.php';
  setcookie("user", "", time()+(86400*10), "/");
  setcookie("pw", "", time()+(86400*10), "/");

  ?>
  <h1>You have logged out successfuly. Come back soon!</h1>
  <h5><a href="../index.html">Return to landing page...</a></h5>
  <?php
  include_once 'footer.php';
?>
