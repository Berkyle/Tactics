<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tactics</title>
  </head>
  <body>
    <?php
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    ?>
    <h1>You have logged out successfuly. Come back soon!</h1>
    <h5><a href="../index.html">Return to landing page...</a></h5>
  </body>
</html>
