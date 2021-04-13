<?php
  session_start();
  include "kozos.php";              
  $fiokok = loadUsers("users.txt"); 

  $uzenet = ""; 


  if (isset($_POST["login"])) {
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "") {
      $uzenet = "Hiba: Adj meg minden adatot!";
    } else {
      $felhasznalonev = $_POST["username"];
      $jelszo = $_POST["password"];

      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";

      foreach ($fiokok as $fiok) {
        if ($fiok["username"] === $felhasznalonev && $fiok["password"] === $jelszo) {
          $uzenet = "Sikeres belépés!";
          $_SESSION["user"] = $fiok;
          header("Location: index.php");
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/navStyle.css">
    <link rel="stylesheet" href="../Css/login.css">
    <title>Bejelentkezés</title>
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
                <a class="active" href="login.html">Login</a>
            </li>
            <li>
                <a href="register.html">Regisztráció</a>
            </li>
        </ul>
    </nav>
</header>
<div class="outside">
    <form class="login" method="post">
        <div class="container">
            <label for="un">E-mail-cím</label>
            <input id="un" type="email" name="email" maxlength="100" placeholder="example@online.com" autocomplete="off" required/>
            <br>
            <label for="pd">Jelszó</label>
            <input id ="pd" type="password" name="password" maxlength="100" autocomplete="off" required/>
            <input type="submit" value="Login">
            <input type="reset">
            <input type="hidden" id="custId" name="custId" value="1">
        </div>
    </form>
</div>
</body>
</html>