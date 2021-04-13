<?php
  session_start();
  include "kozos.php";
  $fiokok = loadUsers("users.txt");

  $hibak = [];

  if (isset($_POST["regis"])) {
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "")
      $hibak[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["password"]) || trim($_POST["password"]) === "")
      $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";



    $felhasznalonev = $_POST["username"];
    $jelszo = $_POST["password"];

    foreach ($fiokok as $fiok) {
      if ($fiok["username"] === $felhasznalonev)
        $hibak[] = "A felhasználónév már foglalt!";
    }

    if (strlen($jelszo) < 8)
      $hibak[] = "A jelszónak legalább 8 karakter hosszúnak kell lennie!";



    if (count($hibak) === 0) {
      $fiokok[] = ["username" => $felhasznalonev, "password" => $jelszo];
      saveUsers("users.txt", $fiokok);
      $siker = TRUE;
      header("Location: login.php");
    } else {
      $siker = FALSE;
    }
  }
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/navStyle.css">
    <link rel="stylesheet" href="../Css/login.css">
    <title>Regisztráció</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="casual-cars.html">Hétköznapi autók</a>
            </li>
            <li>
                <a href="electric-cars.html">Elektromos autók</a>
            </li>
            <li>
                <a href="luxury-cars.html">Luxus autók</a>
            </li>
            <li>
                <a href="blog.html">Blog</a>
            </li>
            <li>
                <a href="login.html">Login</a>
            </li>
            <li>
                <a class="active" href="register.html">Regisztráció</a>
            </li>
        </ul>
    </nav>
</header>
<div class="outside">
    <form method="POST">
        <div class="container">
            <label for="us">Felhasználónév</label>
            <input id ="us" type="text" name="username" maxlength="100" autocomplete="off" required/>
            <br>
            <br>
            <fieldset class="data">
                <legend>Neme</legend>
                <label class="opLabel" for="op1">Férfi:</label>
                <input type="radio" id="op1" name="sex" value="m"/>
                <label class="opLabel" for="op2">Nő:</label>
                <input type="radio" id="op2" name="sex" value="f"/>
            </fieldset>
            <br>
            <label for="dt" >Születési dátum: </label>
            <div class="data">
                <input type="date" id="dt" name="date-of-birth" min="1920-01-01"/>
                <br>
            </div>
            <fieldset class="data">
                <legend>Elérhetőség</legend>
                <label for="un">E-mail-cím</label>
                <input id="un" type="email" name="email" maxlength="100" placeholder="example@online.com" autocomplete="off" required/>
                <label for="tel">Telefonszám</label>
                <input id="tel" type="tel" maxlength="100" placeholder="+36 00 00 00 000" pattern="+[0-9]{2}-[0-9]{4}-[0-9]{3}"/>
            </fieldset>
            <br>
            <label for="pd">Jelszó</label>
            <input id ="pd" type="password" name="password" maxlength="100" autocomplete="off" required/>
            <br>
            <input type="submit" name="regis" value="Register">
            <input type="reset">
            <input type="hidden" id="custId" name="custId" value="2">
        </div>
    </form>
</div>
</body>
</html>