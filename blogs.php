<?php

  $vorname = "";
  $nachname = "";
  $kommentar = "";
  $bewertung = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

  $dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
  $stmt = $dbh->query('SELECT summe_bewertungen FROM blogs');
  $id = $_POST["id"] ?? '';
  if(isset($_POST["horrible"])){
    $bewertung= "Horrible";
  }
  if(isset($_POST["meh"])){
    $bewertung= "Meh";
  }
  if(isset($_POST["medium"])){
    $bewertung= "Medium";
  }
  if(isset($_POST["good"])){
    $bewertung= "Good";
  }
  if(isset($_POST["godlike"])){
    $bewertung= "Godlike";
  }

  if($bewertung == "Horrible"){
      $stmt = $dbh->query("UPDATE blogs SET summe_bewertungen = summe_bewertungen +1 WHERE id ='$id'");
      $stmt1 = $dbh->query("UPDATE blogs SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE id ='$id'");
  }
  if($bewertung == "Meh"){
      $stmt = $dbh->query("UPDATE blogs SET summe_bewertungen = summe_bewertungen +2 WHERE id ='$id'");
      $stmt1 = $dbh->query("UPDATE blogs SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE id ='$id'");
  }
  if($bewertung == "Medium"){
      $stmt = $dbh->query("UPDATE blogs SET summe_bewertungen = summe_bewertungen +3 WHERE id ='$id'");
      $stmt1 = $dbh->query("UPDATE blogs SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE id ='$id'");
  }
  if($bewertung == "Good"){
      $stmt = $dbh->query("UPDATE blogs SET summe_bewertungen = summe_bewertungen +4 WHERE id ='$id'");
      $stmt1 = $dbh->query("UPDATE blogs SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE id ='$id'");
  }
  if($bewertung == "Godlike"){
      $stmt = $dbh->query("UPDATE blogs SET summe_bewertungen = summe_bewertungen +5 WHERE id ='$id'");
      $stmt1 = $dbh->query("UPDATE blogs SET anzahl_bewertungen = anzahl_bewertungen +1 WHERE id ='$id'");
  }


}
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
  <main>
    <?php
      $dbh = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
      $stmt = $dbh->query('SELECT * FROM blogs ORDER BY id DESC');

      foreach($stmt->fetchAll() as $x) {

           echo '<div id="sachen">';
           echo 'Vorname: '. $x["vorname"] . '<br />';
           echo 'Nachname: '. $x["nachname"] . '<br />';
           echo 'Erstelldatum: '. $x["erstelldatum"] . '<br />';
           echo 'Erstellzeit: '. $x["erstellzeit"] . '<br />';
           echo 'Blogeintrag: ' . '<br />' . $x["blogeintrag"] . '<br />' . '<br />';
           echo '<form action="blogs.php" method="post">';
           echo '<br />' . '<button class="btn-1" name="horrible" type="submit">Horrible</button> <button class="btn-2" name="meh" type="submit">Meh</button> <button class="btn-3" name="medium" type="submit">Medium</button> <button class="btn-4" name="good" type="submit">Good</button> <button class="btn-5" name="godlike" type="submit">Godlike</button>'. '<br />';
           echo '<input name = "id" type="hidden" value="'. $x["id"] . '" />' . '<br />';
           if($x["anzahl_bewertungen"] > 0) {
             $bewertung = $x["summe_bewertungen"] / $x["anzahl_bewertungen"];
             if($bewertung < 2)
              echo 'Durchschnittsbewertung: Horrible';
             if($bewertung >=2 && $bewertung < 3)
              echo 'Durchschnittsbewertung: Meh';
             if($bewertung >=3 && $bewertung < 4)
              echo 'Durchschnittsbewertung: Medium';
             if($bewertung >=4 && $bewertung < 4.8)
              echo 'Durchschnittsbewertung: Good';
             if($bewertung == 5 && $bewertung > 4.8)
               echo 'Durchschnittsbewertung: Godlike';
           }
           else {
             echo 'Seien Sie der erste der bewertet! :C';
           }
           echo '</form>';
         echo '<hr />';
         echo '</div>';
      } ?>
  </main>
  <footer>
    <p id="footer1">Seite erstellt bei David Gataric<br>
      Gemacht mithilfe von <a href="https://atom.io/">Atom</a><br>
      gataricdavid@hotmail.com<br>
      Bei Fragen Kontaktieren!
    </p>
  </footer>
</body>
</html>
