<?php
  include_once 'php/header.php';

  $greetStr = "";
  if($sessionUsr != "") {
    $greetStr .= ", ".$sessionUsr;
  }
?>


<div class="jumbotron text-center">
  <h1>Welcome To Tactics<?php echo $greetStr; ?>!</h1>
  <p>Group 1's take on the classic game, now re-imagined in a whole new board!</p>
</div>
<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
    <div class="panel panel-default text-center">
      <div class="panel-body text-center">
        <h2>Social Media Coming Soon!</h2>
      </div>
    </div>
  </div>
</div>


<?php
  include_once 'php/dashboardSuccess.php';
  include_once 'php/footer.php';
?>
