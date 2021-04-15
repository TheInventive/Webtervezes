<?php include "../php/login.php" ?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/navStyle.css">
    <link rel="stylesheet" href="../Css/login.css">
    <title>Belépés</title>
</head>
<body>
<header>
    <?php include "navBar.php"; ?>
</header>
<div class="outside">
    <form method="post">
        <div class="container">
            <label for="un">E-mail-cím</label>
            <input id="un" type="text" name="username" maxlength="100" placeholder="example@online.com" autocomplete="off" required/>
            <br>
            <label for="pd">Jelszó</label>
            <input id ="pd" type="password" name="password" maxlength="100" autocomplete="off" required/>
            <input type="submit" value="Login" name="login">
            <input type="reset">
            <input type="hidden" id="custId" name="custId" value="1">
        </div>
    </form>
</div>
</body>
</html>