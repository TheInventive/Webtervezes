<?php
require_once "User.php";
require_once "session-start.php";

  $fiokok = User::loadUsers("../users.txt");
  if($fiokok == NULL){
    die("Nincs regisztrált felhasználó!");
  }

  if (isset($_POST["login"])) {
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "")
      throw new Exception("Hiba: Adj meg minden adatot!");

      $siker = false;
      foreach ($fiokok as $fiok) {
            if ($fiok->getUsername() === $_POST["username"] && $fiok->getPassword() === $_POST["password"])
            {
              $siker = true;
              $_SESSION["user"] = $fiok;
              header("Location: ../Html/profile.php");
            }
        }
      if(!$siker) throw new Exception("Sikertelen belépés! A belépési adatok nem megfelelők!");
  }
