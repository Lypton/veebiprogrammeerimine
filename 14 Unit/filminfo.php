<?php
	require("../../../config_vp2019.php");
	require("functions_film.php");
	//echo $serverHost;
	$userName = "Lypton";
	$database = "if19_kenet_pa_1";

  //sessioonihaldus
  require("classes/Session.class.php");
  SessionManager::sessionStart("vp", 0, "/~kenetpau/", "greeny.cs.tlu.ee");


	$filmInfoHTML = readAllFilms();
  	$filmAge = 40;
  	$oldFilmInfoHTML = readOldFilms($filmAge);
	
  //lisame lehe päise
  require("header.php");
?>


<body>
  <?php
    echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>
  <p>See leht on loodud koolis õppetöö raames
  ja ei sisalda tõsiseltvõetavat sisu!</p>
  <hr>
  <h2>Eesti filmid</h2>
  <p>Praegu on andmebaasis järgmised filmid:</p>
  <?php
	//echo "Server: " .$serverHost .", kasutaja: " .$serverUsername;
	echo $filmInfoHTML;
	echo "<hr>";
	echo "<h2>Filmid, mis on vanemad, kui " .$filmAge ." aastat.</h2>";
	echo $oldFilmInfoHTML;
  ?>
</body>
</html>