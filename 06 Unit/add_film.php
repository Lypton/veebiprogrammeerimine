<?php
	require("../../../config_vp2019.php");
	require("functions_film.php");
	//echo $serverHost;
	$userName = "Lypton";
	$database = "if19_kenet_pa_1";

	$filmTitle = "";
	$filmYear = date("Y");
	$filmDuration = 80;
	$filmGenre = "";
	$filmStudio = "";
	$filmDirector = "";
	$notice = "";


	//var_dump($_POST);
	if(isset($_POST["submitFilm"])){
	storeFilmInfo($_POST["filmTitle"], $_POST["filmYear"], $_POST["filmDuration"], $_POST["filmGenre"], $_POST["filmStudio"], $_POST["filmDirector"]);
	}
	//$filmInfoHTML = readAllFilms();

	//KODUNE 4. NÄDAL!
	if(isset($POST["submitFilm"])){
	$filmTitle = $_POST["filmTitle"];
		$filmYear = $_POST["filmYear"];
		$filmDuration = $_POST["filmDuration"];	
		$filmGenre = $_POST["filmGenre"];	
		$filmStudio = $_POST["filmStudio"];	
		$filmDirector = $_POST["filmDirector"];

	if(!empty($_POST["filmTitle"])){
		storeFilmInfo($_POST["filmTitle"], $_POST["filmYear"], $_POST["filmDuration"], $_POST["filmGenre"], $_POST["filmStudio"], $_POST["filmDirector"]);
		$filmTitle = "";
			$filmYear = date("Y");
			$filmDuration = 80;
			$filmGenre = "";
			$filmStudio = "";
			$filmDirector ="";
	}	else {
		$notice = "Sisesta vähemalt üks filmi pealkiri!";
	}	
	}
	//KODUSE LÕPP 4.NÄDAL

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
<p>Lisa uus film andmebaasi</p>

<hr>
<form method="POST">
<form>
	<label>Kirjuta filmi pealkiri:</label>
	<input type="text" name="filmTitle">
	<br>
	<label>Filmi tootmisaasta:</label>
	<input type="number" min="1912" max="2019" value="2019" name="filmYear">
	<br>
	<label>Filmi kestus:</label>
	<input type="number" min="1" max="300" name="filmDuration">
	<br>
	<label>Filmi žanr:</label>
	<input type="text" name="filmGenre">
	<br>
	<label>Filmi tootja:</label>
	<input type="text" name="filmStudio">
	<br>
	<label>Filmi lavastaja:</label>
	<input type="text" name="filmDirector">
	<br>
	<input type="submit" value="Talleta filmi info" name="submitFilm">
</form>

</body>
</html>
