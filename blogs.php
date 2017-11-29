<?php


?><!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/blogs.css">
  <title>Document</title>
</head>
<body>
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
  <main>
    <?php
      $dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
      $stmt = $dbh->query('SELECT * FROM blogs ORDER BY id DESC');

      foreach($stmt->fetchAll() as $x) {


           echo 'Vorname: '. $x["vorname"] . '<br />';
           echo 'Nachname: '. $x["nachname"] . '<br />';
           echo 'Erstelldatum: '. $x["erstelldatum"] . '<br />';
           echo 'Erstellzeit: '. $x["erstellzeit"] . '<br />';
           echo 'Blogeintrag: '. $x["blogeintrag"] . '<br />';
           echo '<form action="test.php" method="post">';
           echo '<button class="btn-primary" name="horrible" type="submit">1</button> <button class="btn-primary" name="meh" type="submit">2</button> <button class="btn-primary" name="medium" type="submit">3</button> <button class="btn-primary" name="good" type="submit">4</button> <button class="btn-primary" name="godlike" type="submit">5</button>';
           echo '<input name = "id" type="hidden" value="'. $x["id"] . '" />';
           if($x["anzahl_bewertungen"] > 0) {
             echo 'Durchschnittsbewertung: '. $x["summe_bewertungen"] / $x["anzahl_bewertungen"] . '<br />';
           }
           else {
             echo 'Seien Sie der erste der bewertet! :C';
           }
           echo '</form>';
            echo '<hr />';
         }


         ?>
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
