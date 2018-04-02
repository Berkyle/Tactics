<link rel="stylesheet" href="../css/index.css">

<?php
$username = $_SESSION["username"];
$password = $_SESSION["password"];
?>

<table>
  <tr>
    <th><h3>3x3 Board</h3></th>
    <th><h3>9x9 Board</h3></th>
  </tr>
  <tr>
    <td><h5>Start 3x3 Game (Local)</h5></td>
    <td><h5>Start 9x9 Game (Local)</h5></td>
  </tr>
  <tr>
    <td><h5>Start 3x3 Game (Online)</h5></td>
    <td><h5>Start 9x9 Game (Online)</h5></td>
  </tr>
  <tr>
    <td><h5>Continue 3x3 Game (Online)</h5></td>
    <td><h5>Continue 9x9 Game (Online)</h5></td>
  </tr>
</table>

<a href=\"../html/profile.html\"><h3>-TODO- View my profile -TODO-</h3></a>
<a href=\"logout.php\"><h3>Log out</h3></a>
<div class="rankings">
  Eventually this will be full o' rankings
</div>
<h5><a href="../index.html">Return to landing page...</a></h5>
