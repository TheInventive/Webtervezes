<?php
require_once "User.php";
require_once "session-start.php";
    $fiokok = User::loadUsers("../users.txt");

    $hibak = [];

    if (isset($_POST["regis"])) {
     if (!isset($_POST["username"]) || trim($_POST["username"]) === "")
      $hibak[] = "A felhasználónév megadása kötelező!";

        if (!isset($_POST["password"]) || trim($_POST["password"]) === "")
        $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";


        $felhasznalonev = $_POST["username"];
        $jelszo = $_POST["password"];

        if($fiokok != NULL){
         foreach ($fiokok as $fiok) {
            if ($fiok["username"] === $felhasznalonev)
                $hibak[] = "A felhasználónév már foglalt!";
            }
        }

    if (strlen($jelszo) < 8)
      $hibak[] = "A jelszónak legalább 8 karakter hosszúnak kell lennie!";

    if (count($hibak) === 0) {
      $fiokok[] = new User($felhasznalonev, $jelszo,
              $_POST["date-of-birth"],$_POST["sex"], $_POST["email"], $_POST["tel"]);
      User::saveUsers("../users.txt", $fiokok);
      $siker = TRUE;
      header("Location: ../Html/login.php");

    } else {
      $siker = FALSE;
      User::saveUsers("users.txt", $hibak);
      header("Location: index.php");
    }
  }
