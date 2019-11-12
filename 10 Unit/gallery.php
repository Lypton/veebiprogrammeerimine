<?php
  require("../../../config_vp2019.php");
  //require("functions_main.php"); //test_inputi on vaja?
  require("functions_user.php"); //sessioon, kas oleme sisse loginud (kontroll)
  require("functions_pic.php");
  $database = "if19_kenet_pa_1"; //info saamine
  
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

  $userName = $_SESSION["userFirstname"] ." " .$_SESSION["userLastname"];
  $limit = 5;
  $page = 1;
  $picCount = countPics(2);
  if(!isset($_GET["page"]) or $_GET["page"] < 1){
    $page = 1;
  } elseif(round($_GET["page"] - 1) * $limit >= $picCount) {
    $page = round($picCount / $limit) - 1;
  } else {
    $page = $_GET["page"];
  }
  $galleryHTML = readgalleryImages(2, $page, $limit);

  require("header.php");
?>

  <?php
    echo "<h1>" .$userName ." koolitöö leht</h1>";
  ?>

  <p>See leht on loodud koolis õppetöö raames
  ja ei sisalda tõsiseltvõetavat sisu!</p>
  <hr>
  <p><a href="?logout=1">Logi välja!</a> | Tagasi <a href="home.php">avalehele</a></p>
  <hr>
  <h2>Pildigalerii</h2>
<p>
  <?php
    if($page > 1){
      echo '<a href="?page=' .($page - 1) .'">Eelmine leht</a> | ';
    } else {
      echo "<span>Eelmine leht</span> |";
    }
    if($page * $limit <= $picCount){
      echo '<a href="?page=' .($page + 1) .'"> Järgmine leht</a>';
    } else {
      echo "<span> Järgmine leht</span>";
    }
  ?>
</p>
<!-- 

Üleval on näide html tekstist php's, et toimiks edasi/tagasi minek leheküljel.
  <p><a href="?page=1">Eelmine leht</a> | <p><a href="?page=2">Järgmine leht</a></p>

 -->
  <?php
    echo $galleryHTML;
  ?>
  
</body>
</html>