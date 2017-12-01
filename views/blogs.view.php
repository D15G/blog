<?php include 'models/blogs.model.php' ?>

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
         echo '<form action="index.php?page=blogs" method="post">';
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
