<?php
$username = $_SESSION["username"];
$password = $_SESSION["password"];
?>

<div class="row">
  <div class="col-sm-4">
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading"><h2>Local Play</h2></div>
        <div class="panel-body">
          <p>
            Insert description about local play
          </p>
          <a href="../demos/singleBoardDemo/simpleBoard.html"><button type="button" class="btn btn-default btn-lg" id="3x3Butt">3 x 3 Board</button></a><a href="../demos/nineBoardDemo/ninerBoard.html"><button type="button" class="btn btn-default btn-lg" id="9x9butt">9 x 9 Board</button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading"><h2>Player Vs. Bot</h2></div>
        <div class="panel-body">
          <p>
            Insert description about PvB
          </p>
          <a href="../demos/singleBoardBotDemo/easy/simpleBoard.html"><button type="button" class="btn btn-default btn-lg" id="3x3Butt">3 x 3 Easy</button></a><a href="../demos/nineBoardBotDemo/easy/ninerBoard.html"><button type="button" class="btn btn-default btn-lg" id="9x9butt">9 x 9 Easy</button></a>
          <br>
          <a href="../demos/singleBoardBotDemo/medium/simpleBoard.html"><button type="button" class="btn btn-default btn-lg" id="3x3Butt">3 x 3 Medium</button></a><a href="../demos/nineBoardBotDemo/medium/ninerBoard.html"><button type="button" class="btn btn-default btn-lg" id="9x9butt">9 x 9 Medium</button></a>
          <br>
          <a href="../demos/singleBoardBotDemo/hard/simpleBoard.html"><button type="button" class="btn btn-default btn-lg" id="3x3Butt">3 x 3 Hard</button></a><a href="../demos/nineBoardBotDemo/hard/ninerBoard.html"><button type="button" class="btn btn-default btn-lg" id="9x9butt">9 x 9 Hard</button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading"><h2>Player Vs. Player</h2></div>
        <div class="panel-body">
          <p>
            Insert description about PvP
          </p>
          <button type="button" class="btn btn-default btn-lg">Coming Soon</button>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
