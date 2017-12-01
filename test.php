<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  echo $_POST["id"] ?? 'nix';

  echo $_POST["horrible"] ?? '1';
  echo $_POST["meh"] ?? '2';
  echo $_POST["medium"] ?? '3';
  echo $_POST["good"] ?? '4';
  echo $_POST["godlike"] ?? '5';

    var_dump($_POST);

}
