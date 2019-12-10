<?php
  require("../../../config_vp2019.php");
  require("functions_main.php");
  require("functions_user.php");
  require("functions_news.php");
  $database = "if19_kenet_pa_1";


  //sessioonihaldus
  require("classes/Session.class.php");
  SessionManager::sessionStart("vp", 0, "/~kenetpau/", "greeny.cs.tlu.ee");

  
  //kui pole sisseloginud
  if(!isset($_SESSION["userId"])){
    //siis jõuga sisselogimise lehele
    header("Location: page.php");
    exit();
  }
  

  //väljalogimine
  if(isset($_GET["logout"])){
    session_destroy();
    header("Location: page.php");
    exit();
  }


  $error = "";
  $newsTitle = "";
  $news = "";
  $expiredate = date("Y-m-d");


  if(isset($_POST["newsBtn"])){
    $newsTitle = test_input($_POST["newsTitle"]);
    $news = test_input($_POST["newsEditor"]);
    if(!empty($news)){
      $notice = storenews($news, $newsTitle, $expiredate);
    } else {
      $notice = "Tühja uudist ei salvestata!";
    }
  }
  




  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];

  $newsHTML = readAllnews();

  require("header.php");
  echo "<h1>" .$userName .", veebiprogrammeerimine</h1>";
?>

<hr>
  <p><a href="?logout=1">Logi välja!</a> | Tagasi <a href="home.php">avalehele</a></p>
<hr>

<!-- Lisame tekstiredaktory TinyMCE -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
tinymce.init({
    selector:'textarea#newsEditor',
    plugins: "link",
    menubar: 'edit',
});
</script>

<h2>Lisa uudis</h2>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Uudise pealkiri:</label>
    <br>
    <input type="text" name="newsTitle" id="newsTitle" style="width: 100%;" value="<?php echo $newsTitle; ?>">
    <br>
    <label>Uudise sisu:</label>
    <br>
    <textarea name="newsEditor" id="newsEditor">
    <?php echo $news;
    ?></textarea>
    <br>
    <label>Uudis nähtav kuni (kaasaarvatud)</label>
    <input type="date" name="expiredate" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="<?php echo $expiredate; ?>">
    
    <input name="newsBtn" id="newsBtn" type="submit" value="Salvesta uudis!"> <span>&nbsp;</span><span><?php echo $error; ?></span>
  </form>

  <hr>
  <h2>Senised uudised</h2>
  <?php
    echo $newsHTML;
  ?>

</body>
</html>
