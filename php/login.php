<?php
  session_start();
  include "kozos.php";              
  $fiokok = loadUsers("users.txt"); 

  $uzenet = ""; 

  // űrlapfeldolgozás

  if (isset($_POST["login"])) {
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "") {
      $uzenet = "Hiba: Adj meg minden adatot!";
    } else {
      $felhasznalonev = $_POST["username"];
      $jelszo = $_POST["password"];

      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";

      foreach ($fiokok as $fiok) {
        if ($fiok["username"] === $felhasznalonev && $fiok["password"] === $jelszo) { // sikeres bejelentkezés
          $uzenet = "Sikeres belépés!";
          $_SESSION["user"] = $fiok;           // a "user" nevű munkamenet-változó a bejelentkezett felhasználót reprezentáló tömböt fogja tárolni
          header("Location: index.php");       // átirányítás az index.php oldalra
        }
      }
    }
  }
?>