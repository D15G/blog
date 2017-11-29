<!DOCTYPE html>
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
    <ul>
      <h4>Andere Blogs</h4>
      <li><a href="041er-blj.ch">Björn</a></li>
      <li><a href="041er-blj.ch">Fynn</a></li>
      <li><a href="041er-blj.ch">Raffi</a></li>
      <li><a href="041er-blj.ch">Carolina</a></li>
      <li><a href="041er-blj.ch">Céline</a></li>
      <li><a href="041er-blj.ch">Jennifer</a></li>
      <h4>Navigation<h4>
      <li><a href="index.php">Home</a></li>
      <li><a href="über.php">Über mich</a></li>
      <li><a href="blogs.php">Alle Blogs</a></li>
    </ul>
  </div>
  <main>
    <?php
      $dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
      $stmt = $dbh->query('SELECT * FROM blogs ORDER BY erstelldatum, erstellzeit DESC');
      foreach($stmt->fetchAll() as $x) {

           echo 'Vorname: '. $x["vorname"] . '<br />';
           echo 'Nachname: '. $x["nachname"] . '<br />';
           echo 'Erstelldatum: '. $x["erstelldatum"] . '<br />';
           echo 'Erstellzeit: '. $x["erstellzeit"] . '<br />';
           echo 'Blogeintrag: '. $x["blogeintrag"] . '<br />';
           echo '<hr />';
         }?>
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
