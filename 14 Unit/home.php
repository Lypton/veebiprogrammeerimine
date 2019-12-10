<?php
  require("../../../config_vp2019.php");
  require("functions_main.php");
  require("functions_user.php");
  require("functions_news.php");
  $database = "if19_kenet_pa_1";
  
  //sessioonihaldus
  require("classes/Session.class.php");
  SessionManager::sessionStart("vp", 0, "/~kenetpau/", "greeny.cs.tlu.ee");

  //kontrollime, kas on sisse logitud
  if(!isset($_SESSION["userId"])){
  	header("Location: page.php");
  	exit();
  }

  //logime välja
  if(isset($_GET["logout"])){
  	session_destroy();
  	header("Location: page.php");
  	exit();
  }

  //Cookie ehk küpsis
  //nimi, väärtus, aegumine, path ehk kataloogid, domeen, kas https, kas üle http ehk üle veebi
  setcookie("vpusername", $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"], time() + (86400 * 31), "/~kenetpau/", "greeny.cs.tlu.ee", isset($_SERVER["HTTPS"]), true);

  if(isset($_COOKIE["vpusername"])){
  	echo "Leiti küpsis " .$_COOKIE["vpusername"];
  } else {
  	echo "Küpsist ei leitud!";
  }
  //count($_COOKIE)

  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];

  $newsHTML = readAllnews();

  
  require("header.php");
  echo "<h1>" .$userName .", veebiprogrammeerimine</h1>";
  ?>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <br>
  <br>
  <p><?php echo $userName; ?> l Logi <a href="?logout=1">välja!</a></p>

  <ul>
    <li><a href="userprofile.php">Kasutajaprofiil</a></li>
    <li><a href="messages.php">Sõnumid</a></li>
    <li><a href="picupload.php">Piltide üleslaadimine</a></li>
    <li><a href="gallery.php">Pildigalerii</a></li>
    <li><a href="">Kõik serveris olevad pildid</a></li>
    <li><a href="news.php">Uudiste leht</a></li>
  </ul>

  <hr>
  <h2>Senised uudised</h2>
  <?php
    echo $newsHTML;
  ?>

  
</body>
</html>
