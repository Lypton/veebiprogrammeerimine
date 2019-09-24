<?php
	$userName = "Lypton";

	$photoDir = "../photos/";
	$photoTypes = ["image/jpeg", "image/png"];

	$fullTimeNow = date("d.m.Y H:i:s");
	$hourNow = date("H");
	$partOfDay = "Tundub, et aeg on hägune.";

	if($hourNow < 8){
		$partOfDay = "Hetkel on hommik.";
	}
	
	if($hourNow > 23){
		$partOfDay = "Hetkel on päev.";
	}
	if($hourNow > 12){
		$partOfDay = "Hetkel on öö.";
	}

	//info semestri kulgemise kohta
	$semesterStart = new DateTime("2019-9-2");
	$semesterEnd = new DateTime("2019-12-13");
	$semesterDuration = $semesterStart -> diff($semesterEnd);
	$today = new DateTime("now");
	$semesterElapsed = $semesterStart -> diff($today);
	//echo $semesterStart;  (echoga ei saa näidata)
	//var_dump($semesterDuration);
	//<p>Semester on täies hoos:
	//<meter min="0" max="112" value="16">13%</meter>
	//</p>
	$semesterInfoHTML = null;
	if($semesterElapsed -> format("%r%a") >= 0) {
		$semesterInfoHTML = "<p>Semester on täies hoos:";
		$semesterInfoHTML .= '<meter min="0" max="' .$semesterDuration -> format("%r%a") .'" ';
		$semesterInfoHTML .= 'value="' . $semesterElapsed -> format("%r%a") .'">';
		$semesterInfoHTML .= round($semesterElapsed -> format("%r%a") / $semesterDuration -> format("%r%a") * 100, 1) ."%";
		$semesterInfoHTML .= "</meter> </p>";
	}

	//foto näitamine
	$fileList = array_slice(scandir($photoDir), 2);
	//var_dump($fileList);
	$photoList = [];

	foreach ($fileList as $file) {
		$fileInfo = getImagesize($photoDir .$file);
		//var_dump($fileInfo);
		if (in_array($fileInfo["mime"], $photoTypes)){
			array_push($photoList, $file);
		}
	}

	//$photoList = ["tlu_terra_600x400_1.jpg", "tlu_terra_600x400_2.jpg", "tlu_terra_600x400_3.jpg"];//array ehk massiiv (loeng erinevaid väärtuseid)
	//var_dump($photoList);
	$photoCount = count($photoList);
	//echo $photoCount;
	$photoNum = mt_rand(0, $photoCount -1);
	//echo $photoList[$photoNum];
	//<img src="../photos/tlu_terra_600x400_1.jpg" alt="TLÜ Terra õppehoone">
	$randomImgHTML = '<img src="' .$photoDir .$photoList [$photoNum] .'" alt=juhuslik foto">';

	require("header.php");


?>


	<div id="kast">
		<style>
		.kast {
		background-color: black;
		color: white;
		padding: 5px;
		height: 20px;
		width: 280px;

	}
</style>

	<?php
		echo "<h1>" .$userName .", veebiprogrammeerimine</h1>"
	?>

	<div>
</div>
	<p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tösiselt võetavat sisu</p>

	<?php
		echo $semesterInfoHTML;

	?>

	<br><br>

		<h3> Sotsiaalmeedia kontode loend:</h3>
	<ul>
		<li> <a href="https://www.instagram.com/kenetpaurmann"> Instagram - Kenet Paurmann </a></li>
		<li> <a href="https://www.instagram.com/martentreimn"> Instagram - Märten Treimann </a></li>
		<li> <a href="https://www.instagram.com/janmortenk"> Instagram - Jan Morten Kivi </a></li>
		
	</ul>

<hr>
	<?php
		echo "<p> Lehe avamise hetkel oli aeg: ".$fullTimeNow .",". "<br>"." ".$partOfDay ."</p>";
		//Massiivide tegemine:
		$weekDaysET = array("Monday" => "Esmaspäev", "Tuesday" => "Teisipäev", "Wendesday" => "Kolmapäev", "Thursday" => "Neljapäev","Friday" => "Reede", "Saturday" => "Laupäev", "Sunday" => "Pühapäev");
		//Tänase päeva kuvamine
		//echo "Tavaline tekst.;
		$weekDaysET = ["Esmaspäev", "Teisipäev", "Kolmapäev", "Neljapäev", "Reede", "Laupäev", "Pühapäev"];
		$weekDayToday = date("N"); //esmaspäev = 1;
		echo $weekDaysET[$weekDayToday - 1]. "<br>";
	
		echo $randomImgHTML;
		
	?>
</hr>



</body>
</html>
