<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
    require_once 'config.php';

    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a valid username.";
        }
        else {
          $username = trim($_POST["username"]);
          if(empty($_POST['password'])){
            $password_err = "Please enter a password you like.";
          }
          elseif(strlen($_POST['password']) < 8){
            $password_err = "Password must have atleast 8 characters.";
          }
          else {
            $password = $_POST['password'];

            $confirm_password = $_POST['confirm_password'];
            if($password != $confirm_password){
                $confirm_password_err = 'Passwords must match.';
            }
            else {
              if($link->connect_errno){
                printf("Connect failed: %s\n", $link->connect_error);
                exit();
              }

              $check = mysqli_query($link, "SELECT * FROM GameUsers WHERE username='$username'");
        			$found = mysqli_num_rows($check);

              if($found > 0) {
                $username_err .= "That username already exists. Try again.";
              }
            }
          }
        }

        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

          $query = "INSERT IGNORE INTO GameUsers(username, password) VALUES('$username', '$password')";
          if ($result = $link->query($query)) {
            echo "<h3>New user created!</h3>";
            $result->free(); // free result set
            $link->close(); /*close connection */
          }
        }
        echo "<h3>".$username_err.$password_err.$confirm_password_err."</h3>";
    }
    ?>
    <h5><a href="../index.html">Return to landing page...</a></h5>
  </body>
</html>
