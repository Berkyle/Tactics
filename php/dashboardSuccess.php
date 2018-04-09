/* @brief Goes to this page if login is successful
	** @pre Valid login
	** @post Takes user to the dashboard
	** @return None*/

<?php
$username = $_COOKIE["user"];
$password = $_COOKIE["pw"];
?>

<div class="bootstrapContainer">
  <div class="bootstrapDiv bs1">
    <div class="gameContainer">
      <a href="../html/simpleBoard.html"><h5>Start 3x3 Game (Local)</h5></a>
    </div>
    <div class="gameContainer">
      <a href="../html/ninerBoard.html"><h5>Start 9x9 Game (Local)</h5></a>
    </div>
  </div>
  <div class="bootstrapDiv bs2">
    <div class="gameContainer">
      <h5>Start 3x3 Game Against Bot (Local)</h5>
    </div>
    <div class="gameContainer">
      <h5>Start 9x9 Game Against Bot (Local)</h5>
    </div>
  </div>
  <div class="bootstrapDiv bs3">
    <div class="gameContainer">
      <h5>Start 3x3 Game (Online)</h5>
    </div>
    <div class="gameContainer">
      <h5>Start 9x9 Game (Online) (Coming Soon!)</h5>
    </div>
  </div>
  <div class="bootstrapDiv bs4">
    <div class="gameContainer">
      <h5>Continue 3x3 Game (Online)</h5>
    </div>
    <div class="gameContainer">
      <h5>Continue 9x9 Game (Online)(Coming Soon!)</h5>
    </div>
  </div>
</div>
<br>
<a href="../php/myProfile.php"><button type="button"><h3>View my profile</h3></button></a>
<a href="logout.php"><button type="button"><h3>Log out</h3></button></a>
