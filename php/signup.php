<?php
  session_start();
  include "kozos.php";
  $fiokok = loadUsers("users.txt");

  $hibak = [];

  // űrlapfeldolgozás

  if (isset($_POST["regiszt"])) { 
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "")
      $hibak[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["password"]) || trim($_POST["password"]) === "")
      $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["nem"]) || trim($_POST["nem"]) === "")
      $hibak[] = "A nem megadása kötelező!";


    $felhasznalonev = $_POST["username"];
    $jelszo = $_POST["password"];
    $nem = NULL;

    if (isset($_POST["nem"]))
      $nem = $_POST["nem"];

    foreach ($fiokok as $fiok) {
      if ($fiok["username"] === $felhasznalonev)
        $hibak[] = "A felhasználónév már foglalt!";
    }

    if (strlen($jelszo) < 5)
      $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";

    if ($jelszo !== $jelszo2)
      $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";


    if (count($hibak) === 0) {   // sikeres regisztráció
      $fiokok[] = ["username" => $felhasznalonev, "password" => $jelszo];
      saveUsers("users.txt", $fiokok);
      $siker = TRUE;
      header("Location: login.php");
    } else {                    // sikertelen regisztráció
      $siker = FALSE;
    }
  }
?>