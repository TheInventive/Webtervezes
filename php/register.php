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

        function validate_password( $jelszo ) {
          $match = '/^[a-z][A-za-z0-9]*$/';
          if ( preg_match( $match, $jelszo ) ) {
            return true;
          } else {
            return false;
          };
        }
        if( validate_password( $jelszo ) ) {
          echo 'A jelszó megfelel a követelményeknek';
        } else {
          echo 'A jelszónak kisbetűvel kell kezdődnie';
        };

        function validate_username( $felhasznalonev ) {
                  $match = '/^[A-Z][A-za-z]{3,6}[0-9]{2}$/';
                  if ( preg_match( $match, $felhasznalonev ) ) {
                    return true;
                  } else {
                    return false;
                  };
                }
                if( validate_username( $felhasznalonev ) ) {
                  echo 'A felhasználónév megfelel a követelményeknek';
                } else {
                  echo 'A felhasználónévnek nagybetűvel kell kezdődnie és 2 db számmal kell végződnie';
                };

        $fiokok[] = new User($felhasznalonev, $jelszo,
            $_POST["date-of-birth"], $_POST["sex"], $_POST["email"], $_POST["tel"]);
        User::saveUsers("../users.txt", $fiokok);
        $siker = TRUE;
        header("Location: ../Html/login.php");
    }
