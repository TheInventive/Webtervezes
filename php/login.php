<?php
require_once "User.php";
require_once "session-start.php";

  $fiokok = User::loadUsers("../users.txt");
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
         var_dump($fiok);
        if ($fiok->getUsername() === $felhasznalonev && $fiok->getPassword() === $jelszo)
        {
          $uzenet = "Sikeres belépés!";
          $_SESSION["user"] = $fiok;
          header("Location: ../Html/blog.php");
        }
     }
    }
  }
