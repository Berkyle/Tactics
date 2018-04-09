<?php
$username = $_SESSION["username"];
$password = $_SESSION["password"];
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tactics</title>
    <link rel="stylesheet" href="../css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">Tactics</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="dashboard.php">Home</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Social Media<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="myProfile.php"><span class="glyphicon glyphicon-user"></span> My profile</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
