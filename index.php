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

    <div id="links">
    <h4>Andere Blogs</h4>
      <ul>
        <li><a href="http://10.20.16.106/Blog/">Björn</a></li>
        <li><a href="http://10.20.16.102/BlogSite/">Fynn</a></li>
        <li><a href="http://10.20.16.105/david/">Carolina</a></li>
        <li><a href="http://10.20.16.104/Blog/">Raffaele</a></li>
        <li><a href="http://10.20.16.103/projektseite">Celine</a></li>
        <li><a href="http://10.20.16.111/Blog01">Jennifer</a></li>
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
  			<input type="text" name="vorname" id="vorname" placeholder="Vorname..." value="<?php if(!isset($vorname)) { echo ''; } else { echo $vorname; } ?>"/>
  		</p>
  		<p>
        <label>Nachname:</label>
  			<input type="text" name="nachname" id="nachname" placeholder="Nachname..." value="<?php if(!isset($nachname)) { echo ''; } else { echo $nachname; } ?>"/>
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
        $dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
        $stmt = $dbh->query("INSERT INTO blogs  (vorname, nachname, erstelldatum, erstellzeit, blogeintrag)  VALUES ('$vorname', '$nachname', CURDATE(), CURTIME(), '$eintrag')"); ?>
        <ul class="errors2">
            <li><?= 'Ihr Blog wurde erfolgreich gepostet!' ?></li>
          <?php  ?>
        </ul>

      <?php }

      $allowed = [
        '<br>',
        '</br>',
        '<br />',
        '<a>',
        '<img>',
        '<br>'
            ];

      $vorname = htmlspecialchars($vorname);
       foreach($allowed as $allow){
       $vorname = str_replace(htmlspecialchars($allow), $allow, $vorname);
       }
       $nachname = htmlspecialchars($nachname);
       foreach($allowed as $allow){
       $nachname = str_replace(htmlspecialchars($allow), $allow, $nachname);
       }
       $eintrag = htmlspecialchars($eintrag);
       foreach($allowed as $allow){
       $eintrag = str_replace(htmlspecialchars($allow), $allow, $eintrag);
       }
        echo $eintrag;
      ?>
</fieldset>
<footer>
  <p id="footer1">Seite erstellt bei David Gataric<br>
    Gemacht mithilfe von Atom.
  </p>
  <a href="https://atom.io/" target="_blank"><img class="bildfoot" src="images/atomlogo.png" alt="Atom Logo"></a>
  <p id="footer2">
    gataricdavid@hotmail.com<br>
    Bei Fragen Kontaktieren!
  </p>
</footer>
</form>
</body>
</html>
