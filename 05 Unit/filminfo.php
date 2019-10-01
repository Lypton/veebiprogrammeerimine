<?php
	require("../../../config_vp2019.php");
	require("functions_film.php");
	//echo $serverHost;
	$userName = "Lypton";
	$database = "if19_kenet_pa_1";


	$filmInfoHTML = readAllFilms();
	$filmAge = 40;
	$oldFilmInfoHTML = readOldFilms($filmAge);


	require("header.php");
	echo "<h1>" .$userName .", veebiprogrammeerimine</h1>"
?>

<p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tösiselt võetavat sisu</p>
<br><br>
<h3> Sotsiaalmeedia kontode loend:</h3>
	<ul>
		<li> <a href="https://www.instagram.com/kenetpaurmann"> Instagram - Kenet Paurmann </a></li>
		<li> <a href="https://www.instagram.com/martentreimn"> Instagram - Märten Treimann </a></li>
		<li> <a href="https://www.instagram.com/janmortenk"> Instagram - Jan Morten Kivi </a></li>
		
	</ul>
<br><br>
<h2>Eesti filmid</h2>
<p>Praegu meie andmebaasis on järgmised filmid:</p>

<?php
	echo $filmInfoHTML;
	echo "<h2>Filmid, mis on vanemad, kui " .$filmAge ." aastat.<h2>";
	echo $oldFilmInfoHTML;
?>

</body>
</html>
