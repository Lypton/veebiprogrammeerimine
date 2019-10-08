<?php

	function readAllFilms(){
		//var_dump($GLOBALS);
		//loeme andmebaasist filmide infot
		//loeme andmebaasiühenduse ($)
		//$conn = new mysqli($serverHost, $serverUsername, $serverPassword, $database);   //varasem jutt ilma functionita
		//functioniga allpool:
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistan ette päringu
		$stmt = $conn->prepare("SELECT pealkiri, aasta FROM film");
		echo $conn -> error;
		$filmTitle = "Tühjus";
		$stmt->bind_result($filmTitle, $filmYear, $filmDuration, $filmGenre, $filmStudio, $filmDirector);
		//Ühekordsed "fetch"-mised, siis kirjutad mitu korda välja $stmt -> fetch(); echo " Pealkiri: " .filmTitle;
		//sain pinu (stack) täie infot, hakkan õhekaupa võtma, kuni saab/olemas.
		//SQL KÄIVITUS;
		$stmt -> execute();
		$filmInfoHTML ="";
		while($stmt -> fetch()){
			//echo " Pealkiri: " .$filmTitle;
			$filmInfoHTML .= "<h3>" .$filmTitle ."</h3>";
			$filmHour = round($filmDuration / 60, 0);
			$filmMinute = $filmDuration%60;
			$filmDurationOutcome = "";

			if($filmHour > 0){
				if($filmHour == 1){
					$filmDurationOutcome .= $filmHour ." tund ja ";
				} else {
					$filmDurationOutcome .= $filmHour ." tundi ja ";
				}
				if($filmMinute == 1){
					$filmDurationOutcome .= $filmMinute ." minut.";
				} else {
					$filmDurationOutcome .= $filmMinute ." minutit.";
				}

			}
			$filmInfoHTML .= "<p>Zanr: " .$filmGenre .", lavastaja: " .$filmDirector .". Kestus: " .$filmDurationOutcome .". Stuudio: " .$filmStudio ." aastal: " .$filmYear .".<p>";
		} 		
		// .= pane selleks, et kõik algusest lõpuni :)
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

	function readOldFilms($filmAge){
		$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$maxYear = date("Y") - $filmAge;
		$stmt = $conn -> prepare("SELECT pealkiri, aasta FROM film WHERE aasta < ?");
		$stmt -> bind_param("i", $maxYear);
		$stmt -> bind_result($filmTitle, $filmYear);
		$stmt -> execute();
		$filmInfoHTML ="";
		while($stmt -> fetch()){
			$filmInfoHTML .= "<h3>" .$filmTitle ."<h3>";
			$filmInfoHTML .= "<p>" .$filmYear ."<p>";
		}

		$stmt -> close();
		$conn -> close();
		return $filmInfoHTML;









	}













?>