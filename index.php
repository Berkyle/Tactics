<?php
  include_once 'php/header.php';
  if($_COOKIE["user"] != "") include_once 'php/loggedin.php';
  else include_once 'php/loggedout.php';

  // <!DOCTYPE html>
  // <html>
  //   <head>
  //     <title>Tactics</title>
  //     <meta charset="utf-8">
  //     <meta name="viewport" content="width=device-width, initial-scale=1">
  //     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  //     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  //     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  //   </head>
  //   <body>
  //     <nav class="navbar navbar-inverse">
  //       <div class="container-fluid">
  //         <div class="navbar-header">
  //           <a class="navbar-brand">Tactics</a>
  //         </div>
  //         <ul class="nav navbar-nav">
  //           <li class="active"><a href="dashboard.php">Home</a></li>
  //           <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Social Media<span class="caret"></span></a>
  //             <ul class="dropdown-menu">
  //               <li><a href="#">Twitter</a></li>
  //               <li><a href="#">Facebook</a></li>
  //             </ul>
  //           </li>
  //         </ul>
  //         <ul class="nav navbar-nav navbar-right">
  //           <li><a href="html/register.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
  //           <li><a href="html/login.html"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
  //         </ul>
  //       </div>
  //     </nav>
  //     <div class="container">
?>
<div class="jumbotron text-center">
  <h1>Welcome To Tactics!</h1>
  <p>
     Group 1's take on the classic game, now re-imagined in a whole new board!
  </p>
</div>
<div class="row">
  <div class="col-sm-6">

  </div>
  <div class="col-sm-6 col-sm-offset-3">
    <div class="panel panel-default text-center">
      <div class="panel-body text-center">
        <h2>Twitter Coming Soon!</h2>
      </div>
    </div>
  </div>
</div>
<?php include_once 'php/dashboardSuccess.php'; ?>
<!-- <div class="row">
  <div class="col-sm-4">
    <div class="panel-group text-center">
      <div class="panel panel-default">
        <div class="panel-heading"><h2>Local Play</h2></div>
        <div class="panel-body">
          <p>
            <h4>Play with a friend at the same computer!</h4>
          </p>
          <a href="offline/html/simpleBoard.html"><button type="button" class="btn btn-default btn-lg" id="3x3Butt">3 x 3 Board</button></a><a href="offline/html/ninerBoard.html"><button type="button" class="btn btn-default btn-lg" id="9x9butt">9 x 9 Board</button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="panel-group text-center">
      <div class="panel panel-default">
        <div class="panel-heading"><h2>Player Vs. Bot</h2></div>
        <div class="panel-body">
          <p>
            <h4>Play against a bot of your choice!</h4>
          </p>
          <a href="offline/demos/singleBoardBotDemo/easy/simpleBoard.html"><button type="button" class="btn btn-default btn-lg" id="3x3Butt">3 x 3 Easy</button></a><a href="offline/demos/nineBoardBotDemo/easy/ninerBoard.html"><button type="button" class="btn btn-default btn-lg" id="9x9butt">9 x 9 Easy</button></a>
          <br>
          <a href="offline/demos/singleBoardBotDemo/medium/simpleBoard.html"><button type="button" class="btn btn-default btn-lg" id="3x3Butt">3 x 3 Medium</button></a><a href="offline/demos/nineBoardBotDemo/medium/ninerBoard.html"><button type="button" class="btn btn-default btn-lg" id="9x9butt">9 x 9 Medium</button></a>
          <br>
          <a href="offline/demos/singleBoardBotDemo/hard/simpleBoard.html"><button type="button" class="btn btn-default btn-lg" id="3x3Butt">3 x 3 Hard</button></a><a href="offline/demos/nineBoardBotDemo/hard/ninerBoard.html"><button type="button" class="btn btn-default btn-lg" id="9x9butt">9 x 9 Hard</button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="panel-group text-center">
      <div class="panel panel-default">
        <div class="panel-heading"><h2>Player Vs. Player</h2></div>
        <div class="panel-body">
          <p>
            <h4>Play against a friend online (coming soon!)</h4>
          </p>
          <button type="button" class="btn btn-default btn-lg">Coming Soon</button>
        </div>
      </div>
    </div>
  </div>
</div> -->

    </div>
    <br>
  </body>
</html>
