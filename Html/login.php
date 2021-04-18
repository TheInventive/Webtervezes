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
    <?php
    try {
        include "../php/login.php" ;
    }catch (Exception $exception){
        $message = $exception->getMessage();
        echo "<p style='color: red; font-weight: bold;'>$message</p>";
    }
    ?>
    <form method="post">
        <div class="container">
            <label for="un">Felhasználónév</label>
            <input id="un" type="text" name="username" maxlength="100" autocomplete="off" required/>
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