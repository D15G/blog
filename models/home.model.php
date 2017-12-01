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


?>
