<?php
	$userName = "Lypton";
	$fullTimeNow = date("d.m.Y H:i:s");
	$hourNow = date("H");
	$partOfDay = "hägune aeg";

	if($hourNow < 8){
		$partOfDay = "hommik";
	}
	or($hourNow) > 8){
		$partOfDay = "õhtu";
	}
	or($hourNow > 23){
		$partOfDay = "öö";
	}
	or($hourNow > 12){
		$partOfDay = "päev";
	}


?>

<!doctype html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title>
<?php
	echo $userName;
?>

	Veebiprogrammeerimine</title>

</head>
<body>
	<div id="kast">
		<style>
		.kast {
		background-color: black;
		color: white;
		padding: 5px;
		height: 20px;
		width:280px;

	}
</style>

	<?php
		echo "<h1>" .$userName .", veebiprogrammeerimine</h1>"
	?>

	<div>
</div>
	<p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tösiselt võetavat sisu</p>
	<br><br>
		<h3> Sotsiaalmeedia kontode loend:</h3>
	<ul>
		<li> <a href="https://www.instagram.com/kenetpaurmann"> Instagram - Kenet Paurmann </a></li>
		<li> <a href="https://www.instagram.com/martentreimn"> Instagram - Märten Treimann </a></li>
		<li> <a href="https://www.instagram.com/janmortenk"> Instagram - Jan Morten Kivi </a></li>
		
	</ul>

<hr>
	<?php
		echo "<p> Lehe avamise hetkel oli aeg: ".$fullTimeNow .", ".$partOfDay .".</p>";
	?>
</hr>

</body>
</html>
