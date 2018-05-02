<?php
  include_once 'header.php';
?>
        <h1><u>TRADITIONAL Tic-Tac-Toe!</u></h1>
          <div class="tableContainer">
            <table cellspacing="0">

<?php
  for($i = 0; $i<3; $i++) {    //Build table rows and cells
    echo "<tr>";
    for($j = 0; $j<3; $j++) {
      echo "<td class=\"board\"></td>";
    }
    echo "</tr>";
  }
?>
            </table>
          </div>
        <br>
        <iframe id="myFacebook" src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fpeople.eecs.ku.edu%2F~k742b154%2FTactics%2F&layout=button&size=small&mobile_iframe=true&width=59&height=20&appId" width="65" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"
              style="padding: 0;"></iframe>
        <iframe
          src="https://platform.twitter.com/widgets/tweet_button.html?size=l&url=https%3A%2F%2F&via=twitterdev&related=twitterapi%2Ctwitter&text=Playing%20Tactics!%20&hashtags=TwitterAPI%2Ctactics%2C"
          height="28"
          title="Twitter Tweet Button"
          style="border: 0; overflow: hidden;"
          id="myTwitter">
        </iframe>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {

          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <a href="../"><button type="button" class="btn btn-default btn-lg">Return Home</button></a>
      </div>
    </body>
  <script type="text/javascript" src="../js/ThreesClass.js"></script>
  <script type="text/javascript" src="../js/rules.js"></script>
  <script type="text/javascript" src="../js/pageState.js"></script>
</html>
