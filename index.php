<?php $errors = [];

$vorname = "";
$nachname = "";
$date = "";
$eintrag = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST')



$vorname = $_POST["vorname"] ?? '';
$nachname = $_POST["nachname"] ?? '';
$date = $_POST["date"] ?? '';
$eintrag = trim($_POST["message"] ?? '');


?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/index.css">
  <title>Startseite</title>
</head>
<body>

  <form action="index.php" method="post">

    <div class="logo">
      <img src="images/Logos-Blog2.png" alt="Bloglogo">
    </div>
    <div id="title">
      <h2>Ein Blog der Ihr Leben verändert!</h2>
    </div>

    <?php
      $dbconnection = new PDO('mysql:host=10.20.16.107;dbname=ipadressen','DB_BLJ','BLJ12345l');
      $stmt = $dbconnection->query("SELECT ip,home FROM t_ipadress order by id");
      $ipArray = $stmt -> fetchAll();
            ?>

    <div id="links">
    <h4>Andere Blogs</h4>

      <ul>
        <li><a href="http://<?php echo $ipArray[6][0] ?><?php echo $ipArray[6][1] ?>">Björn</a></li>
        <li><a href="http://<?php echo $ipArray[2][0] ?><?php echo $ipArray[2][1] ?>">Fynn</a></li>
        <li><a href="http://<?php echo $ipArray[1][0]?><?php echo $ipArray[1][1] ?>">Carolina</a></li>
        <li><a href="http://<?php echo $ipArray[7][0]?><?php echo $ipArray[7][1] ?>">Raffi</a></li>
        <li><a href="http://<?php echo $ipArray[3][0]?><?php echo $ipArray[3][1] ?>">Céline</a></li>
        <li><a href="http://<?php echo $ipArray[4][0]?><?php echo $ipArray[4][1] ?>">Jennifer</a></li>
        <li><a href="http://<?php echo $ipArray[5][0]?><?php echo $ipArray[5][1] ?>">Timon</a></li>
      </ul>
    <h4>Navigation</h4>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="über.php">Über mich</a></li>
        <li><a href="blogs.php">Alle Blogs</a></li>
      </ul>
    </div>


    <div id="info">
      <p>Dies ist der Blog von David Gataric. Sie werden hier verschiedene Einträge sehen.<br>
        Seien Sie bitte freundlich zur Community und geniessen Sie Ihren Aufenthalt auf meinem Blog!
      </p>
    </div>
  <fieldset>
    <div id="blog">
  		<h4>Schreiben Sie drauf los:</h4>
      <div class="picture">
        <img src="images/zitat.jpg" alt="Zitat">
      </div>
  		<p>
        <label>Vorname:</label>
  			<input class="name" type="text" name="vorname" id="vorname" placeholder="Vorname..." value="<?php if(!isset($vorname)) { echo ''; } else { echo $vorname; } ?>"/>
  		</p>
  		<p>
        <label>Nachname:</label>
  			<input class="name" type="text" name="nachname" id="nachname" placeholder="Nachname..." value="<?php if(!isset($nachname)) { echo ''; } else { echo $nachname; } ?>"/>
  		</p>
        <p>
          Blogeintrag:<br>
  			<textarea name="message" id="message"></textarea>
  		</p>
      <p><input class="btn-primary" type="submit" value="Submit"><br></p>
    </div>
    <?php

      if ($vorname == '') {
        array_push($errors, "Geben Sie bitte einen Vornamen an!");
      }

      if ($nachname == '') {
        array_push($errors, "Geben Sie bitte einen Nachnamen an!");
      }

      if ($eintrag == '') {
        array_push($errors, "Sie müssen einen Blog erfassen!");
      }

      if (strpos($eintrag, ' ') === false) {
        array_push($errors, "Ihr Blog MUSS Leerzeichen enthalten!");
      }

      if ( ! empty($errors)) {?>
        <ul class="errors">
          <?php foreach ($errors as $err) { ?>
            <li><?= $err ?></li>
          <?php } ?>
        </ul>
      <?php }
      if ( empty($errors)) {
        $eintrag = nl2br($eintrag);
        $eintrag=strip_tags($eintrag, '<img><a><br>');
        $vorname=htmlspecialchars($vorname);
        $nachname=htmlspecialchars($nachname);
        $dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $stmt = $dbh->query("INSERT INTO blogs  (vorname, nachname, erstelldatum, erstellzeit, blogeintrag)  VALUES ('$vorname', '$nachname', CURDATE(), CURTIME(), '$eintrag')"); ?>
        <ul class="errors2">
            <li><?= 'Ihr Blog wurde erfolgreich gepostet!' ?></li>
          <?php  ?>
        </ul>

      <?php }
      ?>
</fieldset>
<footer>
  <p id="footer1">
    Seite erstellt bei David Gataric<br>
    Gemacht mithilfe von <a href="https://atom.io/">Atom</a><br>
    gataricdavid@hotmail.com<br>
    Bei Fragen Kontaktieren!
  </p>
</footer>
</form>
</body>
</html>
