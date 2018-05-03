<?php
/**
  ** @brief
	** @pre none
	** @post none
	** @return None
  */
include_once 'php/header.php';

//Initial test to check for faulty moves in the database
function checkThreesMoves() {
  $checkOdd = mysqli_query($link, "SELECT * FROM ThreesMoves WHERE isX = '1'");
  $checkEvn = mysqli_query($link, "SELECT * FROM ThreesMoves WHERE isX = '0'");

  echo "<h6>Running check for errors in odd-valued moves ...</h6>";
  while($row = $checkOdd->fetch_assoc()) {
    if($row["moveNumber"]%2 != 1) {
      echo "<p>ERROR - Poorly placed move in three's board ".$row['gameID']." in move number ".$row['moveNumber']." at position ".$row['movePosition']."</p>";
    }
    echo "<p>done</p>";
  }
  $checkOdd->close();

  echo "<h6>Running check for errors in even-valued moves ...</h6>";
  while($row2 = $checkEvn->fetch_assoc()) {
    if($row2["moveNumber"]%2 != 0) {
      echo "ERROR - Poorly placed move in three's board ".$row2['gameID']." in move number ".$row2['moveNumber']." at position ".$row2['movePosition'];
    }
  }
  $checkEvn->close();
}

function checkNinesMoves() {
  $checkOdd = mysqli_query($link, "SELECT * FROM NinesMoves WHERE isX = '1'");
  $checkEvn = mysqli_query($link, "SELECT * FROM NinesMoves WHERE isX = '0'");

  echo "<h6>Running check for errors in odd-valued moves ...</h6>";
  while($row = $checkOdd->fetch_assoc()) {
    if($row['moveNumber']%2 != 1) {
      echo "<p>ERROR - Poorly placed move in nine's board ".$row['gameID']." in move number ".$row['moveNumber']." at position ".$row['movePosition']."</p>";
    }
  }
  $row->close();

  echo "<h6>Running check for errors in even-valued moves ...</h6>";
  while($row2 = $checkEvn->fetch_assoc()) {
    if($row2['moveNumber']%2 != 0) {
      echo "ERROR - Poorly placed move in nine's board ".$row2['gameID']." in move number ".$row2['moveNumber']." at position ".$row2['movePosition'];
    }
  }
  $row2->close();
}

checkThreesMoves();
checkNinesMoves();

include_once 'php/footer.php';
?>
