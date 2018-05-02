<?php
/**
  ** @brief Adds buttons on the nav bar for when the user is logged out
	** @pre none
	** @post none
	** @return None
  */
  require_once 'dirtracker.php';
?>

<ul class="nav navbar-nav navbar-right">
  <li><a href="<?php echo getDirectoryEscape(); ?>php/createaccount.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
  <li><a href="<?php echo getDirectoryEscape(); ?>php/login.php"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
</ul>
</div>
</nav>
<div class="container">
