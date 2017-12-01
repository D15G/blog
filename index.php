<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/blogs.css">
  <link rel="stylesheet" href="css/über.css">
  <title>BLOG</title>
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
        <li><a href="index.php?page=über">Über mich</a></li>
        <li><a href="index.php?page=blogs">Alle Blogs</a></li>
      </ul>
    </div>

    <?php
      $page = $_GET['page'] ?? 'home';
      include 'views/' . $page . '.view.php';

    /*
     include 'views/blogs.view.php'
     include 'views/über.view.php'
    */

      ?>
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
