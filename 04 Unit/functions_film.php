<?php

	function readAllFilms(){
		//var_dump($GLOBALS);
		//loeme andmebaasist filmide infot
		//loeme andmebaasiühenduse ($)
		//$conn = new mysqli($serverHost, $serverUsername, $serverPassword, $database);   //varasem jutt ilma functionita
		//functioniga allpool:
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistan ette päringu
		$stmt = $conn -> prepare("SELECT pealkiri, aasta FROM film");
		echo $conn -> error;
		$filmTitle = "Tühjus";
		$filmInfoHTML = null;
		$stmt -> bind_result($filmTitle, $filmYear);
		$stmt -> execute();
		//Ühekordsed "fetch"-mised, siis kirjutad mitu korda välja $stmt -> fetch(); echo " Pealkiri: " .filmTitle;
		//sain pinu (stack) täie infot, hakkan õhekaupa võtma, kuni saab/olemas.
		while($stmt -> fetch()){
			//echo " Pealkiri: " .$filmTitle;
			$filmInfoHTML .= "<h3>" .$filmTitle ."</h3>";
			$filmInfoHTML .= "<h3>" .$filmYear ."</h3>";
		} 		// .= pane selleks, et kõik algusest lõpuni :)
		// kasuta {} !!!
		//sulgen ühenduse
		$stmt -> close();
		$conn -> close();
		return $filmInfoHTML;
	}

	function storeFilmInfo($filmTitle, $filmYear, $filmDuration, $filmGenre, $filmStudio, $filmDirector){
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $conn -> prepare("INSERT INTO film (pealkiri, aasta, kestus, zanr, tootja, lavastaja) VALUES(?,?,?,?,?,?)");
		echo $conn -> error;
		//andmetüübid: s -string, i-integer, d-decimal
		$stmt -> bind_param("siisss", $filmTitle, $filmYear, $filmDuration, $filmGenre, $filmStudio, $filmDirector);
		$stmt -> execute();
		//sulgen ühenduse
		$stmt -> close();
		$conn -> close();

	}


	
?>