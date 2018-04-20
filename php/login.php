<?php include_once 'header.php';?>

<h1>Log in below:</h1>
<form action="<?php getDirectoryEscape(); ?>validate.php" method="post">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="form-body">
          <div class="form-group">
            <label for="usernamed">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-default" value="Log in">Log in</button>
          <a class="btn btn-default" href="../index.php">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</form>

<?php  include_once 'footer.php';?>
