<?php
/**
  ** @brief Add html lines at the beginning of the php file to make it readable for browser
	** @pre none
	** @post none
	** @return None
  */

  require 'dirtracker.php';
  require_once 'config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tactics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href= <?php echo getDirectoryEscape()."css/index.css"; ?> >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href= <?php echo $diradder."index.php"; ?> >Tactics</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href=<?php echo getDirectoryEscape()."index.php"; ?> >Home</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Social Media<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Twitter<?php while($numdots != 0) {echo "!"; $numdots--;} //echo $numdots; ?></a></li>
              <li><a href="#">Facebook<?php while($numdots != 0) {echo "!"; $numdots--;} //echo $numdots; ?></a></li>
            </ul>
          </li>
        </ul>
<?php
  if($_COOKIE["user"] != "") include_once 'loggedin.php';
  else include_once 'loggedout.php';
?>
