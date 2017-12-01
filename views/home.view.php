<?php include 'models/home.model.php' ?>

<div id="info">
  <p>Dies ist der Blog von David Gataric. Sie werden hier verschiedene Einträge sehen.<br>
    Seien Sie bitte freundlich zur Community und geniessen Sie Ihren Aufenthalt<br> auf meinem Blog!
    Falls Sie Fragen zu meinem Blog hätten, dann<br> stellen Sie mir privat die Frage.<br>
    Erreichen können Sie mich unter: gataricdavid@hotmail.com.
  </p>
</div>
<div id="info1">
  <p>
  </p>
</div>
<fieldset>
<form action="index.php" method="post">
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
</form>
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
