<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/über.css">
  <title>Über mich</title>
</head>
<body>
  <div class="logo">
    <img src="images/Logos-Blog2.png" alt="Bloglogo">
  </div>
  <div id="title">
    <h2>Ein Blog der Ihr Leben verändert!</h2>
  </div>

  <?php
    $dbconnection = new PDO('mysql:host=10.20.16.102;dbname=ipadressen','DB_BLJ','BLJ12345l');
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
  <main>
    <p>Mein Name ist David Gataric und ich bin momentan im ersten Lehrjahr als Informatiker unterwegs. Ich bekam<br>
      die Aufgabe, einen Blog mit PHP zu erstellen. Dieser Blog ist genau so entstanden. <br>
      <br>
      <h4>Meine Daten:</h4><br>
      Vorname: David<br>
      Nachname: Gataric<br>
      Kanton: Nidwalden<br>
      Wohnort: Buochs<br>
      Firma: CSS Versicherung<br>
      Beruf: Informatiker<br>
      Fachrichtung: Applikationsentwickler<br>
      Hobbys: Basketball<br>
      <br>
    </p>
    <div id="pics">
      <p>
        <a href="http://www.buochs.ch/de/" target="_blank"><img src="images/buochs.jpg" alt="Buochs"></a>
        <a href="https://www.css.ch/de/home.html" target="_blank"><img src="images/css.jpg" alt="CSS Hauptsitz"></a>
        <a href="http://www.nba.com/#/" target="_blank"><img src="images/bball.jpg" alt="Basketball"></a><br>
        <br>
          <a href="https://www.css.ch/de/home.html" target="_blank"><img src="images/csswerbung.jpg" alt="CSS Werbung"></a>
          <a href="https://www.ict-berufsbildung.ch/berufsbildung/informatikerin-efz-applikationsentwicklung/" target="_blank"><img src="images/informatiker.jpg" alt="Informatiker"></a>
          <a href="http://php.net/manual/de/intro-whatis.php" target="_blank"><img src="images/php.jpg" alt="PHP"></a>
      </p>
    </div>
  </main>
  <footer>
    <p id="footer1">Seite erstellt bei David Gataric<br>
      Gemacht mithilfe von Atom.
    </p>
    <a href="https://atom.io/" target="_blank"><img src="images/atomlogo.png" alt="Atom Logo"></a>
    <p id="footer2">
      gataricdavid@hotmail.com<br>
      Bei Fragen Kontaktieren!
    </p>
  </footer>
</body>
</html>
