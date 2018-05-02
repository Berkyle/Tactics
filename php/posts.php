<?php
  include_once 'header.php';

  if($sessionUsr == "") { //Nobody is logged in.
    echo "<h1>PLease log in before you post!</h1>";
    exit();
  }
  else { //someone is logged in
    echo "<h1>Welcome to Tactics Forum!</h1>";

    echo "<h3>Make your post here!</h3>";
    echo "<form action=\"submitPost.php\" method=\"post\">
          <input type=\"text\" placeholder=\"Your Post Content Here!\" required>
          </form><br>";

    $query = mysqli_query($link, "SELECT * FROM Posts");

    while($row = $query->fetch_assoc()) {
      $user = $row["author_id"];
      $post = $row["content"];
      echo "<div class=\"jumbotron\"><h2>".$user." says: ".$post."</h2></div>";
       $profile = $row["username"];
       $wins = $row["wins"];
       $draws = $row["draws"];
       $points = 3*$wins + $draws;
      
       array_push($users, $profile);
       array_push($userPoints, $points);
    }





    include_once 'footer.php';
    exit();
  }
 ?>

<form action="submitPost.php" method="post">

</form>

<body>
  <div class="header">
  	<h2>Register</h2>
  </div>

  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
