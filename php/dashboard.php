<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tactics Dashboard</title>
  </head>
  <body>
    <?php
      require_once 'config.php';

      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $check = mysqli_query($link, "SELECT * FROM GameUsers WHERE username='$username'");
        $found = mysqli_num_rows($check);

        if($found > 0) { //User exists
          if($password == mysqli_fetch_object($check)->password) {
            echo "<h1>Login successful! Welcome $username !</h1>";
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

            include 'dashboardSuccess.php';
          }
          else{
            echo "<h3>That password is not correct...</h3>";
            ?>
            <h5><a href="../index.html">Return to landing page...</a></h5>
            <?php
          }
        }
        else {
          echo "<h3>No user found with that username....</h3>";
          ?>
          <h5><a href="../index.html">Return to landing page...</a></h5>
          <?php
        }
      }
      else {
        echo "<h3>Hey man, that ain't right....</h3>";
        ?>
        <h5><a href="../index.html">Return to landing page...</a></h5>
        <?php
      }
    ?>
  </body>
</html>
