<?php
  include_once 'header.php';

   
  $con = mysql_connect("mysql.eecs.ku.edu","k742b154","ahm3Thei");
  mysql_connect($mysql_host,$mysql_user,$mysql_password) or die(mysql_error());

         echo("User name: " . $_POST['username'] . "<br />\n");
?>
  mysql_select_db("k742b154", $con);
  $uName = mysql_real_escape_string($_POST['u_name']);
  

<form method="post">

   <p>Usere name: <input type="text" name="usertname" /></p>

   <input type="submit" name="submit" value="Submit" />


</form>
