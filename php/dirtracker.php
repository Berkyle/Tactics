<?php
/**
  ** @brief Add html lines at the end of the php file to make it readable for browser
	** @pre none
	** @post none
	** @return None
  */
$numdots = 0;
$diradder = "";
$whatIWant = substr(getcwd(), strpos(getcwd(), "/Tactics") + 1);
for($i = 0; $i < substr_count($whatIWant, "/"); $i++) {
  $numdots++;
  $diradder .= "../" ;
}

function getPWDDepth() {
  $numdots = 0;
  $whatIWant = substr(getcwd(), strpos(getcwd(), "/Tactics") + 1);
  for($i = 0; $i < substr_count($whatIWant, "/"); $i++) {
    $numdots++;
  }
  return $numdots;
}

function getDirectoryEscape() {
  $diradder = "";
  $whatIWant = substr(getcwd(), strpos(getcwd(), "/Tactics") + 1);
  for($i = 0; $i < substr_count($whatIWant, "/"); $i++) {
    $diradder .= "../" ;
  }
  return $diradder;
}

?>
