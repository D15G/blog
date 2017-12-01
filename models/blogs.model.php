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
