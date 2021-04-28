<?php
require_once "User.php";
require_once "session-start.php";
    $fiokok = User::loadUsers("../users.txt");

    if (isset($_POST["regis"])) {
        if (!isset($_POST["username"]) || trim($_POST["username"]) === "")
            throw new Exception("A felhasználónév megadása kötelező!");

        if (!isset($_POST["password"]) || trim($_POST["password2"]) === "")
            throw new Exception("A jelszó és az ellenőrző jelszó megadása kötelező!");

        if($_POST["password"] != $_POST["password2"])
            throw new Exception("A jelszavak nem egyeznek meg!");

        $felhasznalonev = $_POST["username"];
        $jelszo = $_POST["password"];

        if ($fiokok != NULL) {
            foreach ($fiokok as $fiok) {
                if ($fiok->getUsername() === $felhasznalonev)
                    throw new Exception("A felhasználónév már foglalt!");
            }
        }

        if (strlen($jelszo) < 8)
            throw new Exception("A jelszónak legalább 8 karakter hosszúnak kell lennie!");

        if (strlen($felhasznalonev)<6)
           throw new Exception("A felhasználónévnek legalább 6 karakter hosszúnak kell lennie")



        $fiokok[] = new User($felhasznalonev, $jelszo,
            $_POST["date-of-birth"], $_POST["sex"], $_POST["email"], $_POST["tel"]);
        User::saveUsers("../users.txt", $fiokok);
        $siker = TRUE;
        header("Location: ../Html/login.php");
    }
