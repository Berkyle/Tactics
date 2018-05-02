<?php
  include_once 'header.php';

         echo("User name: " . $_POST['Username'] . "<br />\n");
?>


<form method="post">

   <p>First name: <input type="text" name="firstname" /></p>

   <p>Last name: <input type="text" name="firstname" /></p>

   <input type="submit" name="submit" value="Submit" />

</form>
