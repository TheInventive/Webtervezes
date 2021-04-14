<?php
  include "session-start.php";
  include "felhasznalok.php";
  $fiokok = loadUsers("../users.txt");
  if($fiokok == NULL){
  die();
  }

  $uzenet = "";

  if (isset($_POST["login"])) {
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "")
    {
      $uzenet = "Hiba: Adj meg minden adatot!";
    }
    else
    {
      $felhasznalonev = $_POST["username"];
      $jelszo = $_POST["password"];

      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";
      foreach ($fiokok as $fiok)
     {
        if ($fiok["username"] === $felhasznalonev && $fiok["password"] === $jelszo)
        {
          $uzenet = "Sikeres belépés!";
          $_SESSION["user"] = true;
          header("Location: ../Html/blog.php");
        }
     }
    }
  }
