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
        $email = $_POST["email"];

        if ($fiokok != NULL) {
            foreach ($fiokok as $fiok) {
                if ($fiok->getUsername() === $felhasznalonev)
                    throw new Exception("A felhasználónév már foglalt!");
            }
        }

        if (strlen($_POST["password"]) < 8)
            throw new Exception("A jelszónak legalább 8 karakter hosszúnak kell lennie!");

        if(preg_match('/[0-9a-zA-Z]+/', $jelszo) == false)
            throw new Exception("A jelszó nem mást tartalmazhat csak kis- és nagybetűt vagy számot");

        if (strlen($felhasznalonev) < 6 && strlen($felhasznalonev) > 10)
           throw new Exception("A felhasználónévnek legalább 6 és maximum 10 karakter hosszúnak kell lennie");

        if(preg_match('/[A-Z][A-Za-z0-9]+/', $felhasznalonev) == false)
            throw new Exception("A felhasználónévnek nagybetűvel kell kezdődnie");

        if(preg_match('/[a-zA-Z0-9\.-]+@([a-z0-9]+\.)+[a-z]{2,4}/', $email) == false)
            throw new Exception("Nem megfelelő az email formátuma");


        $fiokok[] = new User($felhasznalonev, $jelszo,
            $_POST["date-of-birth"], $_POST["sex"], $_POST["email"], $_POST["tel"]);
        User::saveUsers("../users.txt", $fiokok);
        $siker = TRUE;
        header("Location: ../Html/login.php");
    }
