<?php
function storenews($news, $newsTitle, $expiredate){
	$notice = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn->prepare("INSERT INTO news (userid, title, content, expire) VALUES (?,?,?,?)");
	echo $conn->error; //näitab sql käsu errorit
	$stmt -> bind_param("isss", $_SESSION["userId"], $newsTitle, $news, $expiredate);
	if($stmt -> execute()) {
		$notice = "Uudis salvestati!";
	} else {
		$notice = "Uudist ei salvestatud!" .$stmt->error;
	} 
	$stmt -> close();
	$conn -> close();
	return $notice;
}

function readAllnews(){
	$newsHTML = null;
	$conn = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
	$stmt = $conn -> prepare("SELECT title, content, added FROM news WHERE deleted IS NULL ORDER BY id DESC");
	echo $conn -> error;
	$stmt -> bind_result($titleFromDb, $contentFromDb, $addedFromDb);
	$stmt -> execute();
	while($stmt -> fetch()){
		$newsHTML .= "<div> \n";
		$newsHTML .= "\t <h3>" .$titleFromDb ."</h3> \n";
		$newsHTML .= "\t <div>" .htmlspecialchars_decode($contentFromDb) ."</div> \n";
		$newsHTML .= "<p> Lisatud: " .$addedFromDb ."</p> \n";

	}
	if(!empty($newsHTML)){
		$newsHTML = "<ul> \n" .$newsHTML ."</ul> \n";
	} else {
		$newsHTML = "<p>Uudiseid pole!</p> \n";
	}

	$stmt -> close();
	$conn -> close();
	return $newsHTML;
}