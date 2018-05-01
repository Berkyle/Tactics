<?php
  if($_SERVER["REQUEST_METHOD"] != "POST"){
    header('Location: ../');
  }
  else {
    include_once '../php/header.php';
    $gameType = $_POST['type'];

    function echoThrees() {
      echo "<h1>Traditional Tic-Tac-Toe!</h1>
            <div class=\"tableContainer\">
              <table cellspacing=\"0\">";

      for($i = 0; $i<3; $i++) {
        echo "<tr>";
        for($j = 0; $j<3; $j++) {
          echo "<td class=\"board\"></td>";
        }
        echo    "</tr>";
      }
      echo     "</table>
              </div>
              <br>
              <iframe id=\"myFacebook\" src=\"https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fpeople.eecs.ku.edu%2F~k742b154%2FTactics%2F&layout=button&size=small&mobile_iframe=true&width=59&height=20&appId\" width=\"65\" height=\"20\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowTransparency=\"true\" allow=\"encrypted-media\"
                    style=\"padding: 0;\"></iframe>
              <iframe
                src=\"https://platform.twitter.com/widgets/tweet_button.html?size=l&url=https%3A%2F%2F&via=twitterdev&related=twitterapi%2Ctwitter&text=Playing%20Tactics!%20&hashtags=TwitterAPI%2Ctactics%2C\"
                height=\"28\"
                title=\"Twitter Tweet Button\"
                style=\"border: 0; overflow: hidden;\"
                id=\"myTwitter\">
              </iframe>
              <div id=\"fb-root\"></div>
              <script>(function(d, s, id) {

                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3\";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\" id=\"surrenderButt\">Return Home</button></a>
              </div>
            </body>";
    }

    function echoNines() {
      echo "<h1><u>Dark Web Tic-Tac-Toe >:)</u></h1>
            <div class=\"tableContainer\">
            	<div id=\"outter\" class=\"outter\" cellspacing=\"0\">";

      for($i = 0; $i < 3; $i++) {
        echo "<div class=\"snug\">";
        for($j = 0; $j < 3; $j++) {
          $k = $i*3 + $j;
          echo "<table class=\"subtable ".$k."\" cellspacing=\"0\"></table>";
        }
        echo "</div>";
      }

      echo "</div>
          </div>
          <br>
          <iframe id=\"myFacebook\" src=\"https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fpeople.eecs.ku.edu%2F~k742b154%2FTactics%2F&layout=button&size=small&mobile_iframe=true&width=59&height=20&appId\" width=\"65\" height=\"20\" style=\"border:none;overflow:hidden\" scrolling=\"no\" frameborder=\"0\" allowTransparency=\"true\" allow=\"encrypted-media\"
                style=\"padding: 0;\"></iframe>
          <iframe
            src=\"https://platform.twitter.com/widgets/tweet_button.html?size=l&url=https%3A%2F%2F&via=twitterdev&related=twitterapi%2Ctwitter&text=Playing%20Tactics!%20&hashtags=TwitterAPI%2Ctactics%2C\"
            height=\"28\"
            title=\"Twitter Tweet Button\"
            style=\"border: 0; overflow: hidden;\"
            id=\"myTwitter\">
          </iframe>
          <div id=\"fb-root\"></div>
          <script>(function(d, s, id) {

            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3\";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>

          <a href=\"../\"><button type=\"button\" class=\"btn btn-default btn-lg\" id=\"surrenderButt\">Return Home</button></a>
          </div>
        </body>";
    }

    if($gameType == "3e") {
      echoThrees();
      echo "<script type=\"text/javascript\" src=\"easy/simpleGame.js\"></script>
        </html>";
    }
    if($gameType == "9e") {
      echoNines();
      echo "<script type=\"text/javascript\" src=\"easy/gameLogicEasy.js\"></script>
        </html>";
    }
    if($gameType == "3m") {
      echoThrees();
      echo "<script type=\"text/javascript\" src=\"medium/simpleGame.js\"></script>
        </html>";
    }
    if($gameType == "9m") {
      echoNines();
      echo "<script type=\"text/javascript\" src=\"medium/gameLogicMed.js\"></script>
        </html>";
    }
    if($gameType == "3h") {
      echoThrees();
      echo "<script type=\"text/javascript\" src=\"hard/simpleGame.js\"></script>
        </html>";
    }
    if($gameType == "9h") {
      echoNines();
      echo "<script type=\"text/javascript\" src=\"hard/gameLogicHard.js\"></script>
        </html>";
    }
  }
?>
