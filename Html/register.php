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
    <?php include "navBar.php"; ?>
</header>
<div class="outside">
    <?php
    try{
        include "../php/register.php";
    }catch (Exception $exception){
        $message = $exception->getMessage();
        echo "<p style='color: red; font-weight: bold;'>$message</p>";
    }
    ?>
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
                <input id="tel" name="tel" type="tel" maxlength="100" placeholder="+36 00 00 00 000" pattern="+[0-9]{2}-[0-9]{4}-[0-9]{3}"/>
            </fieldset>
            <br>
            <label for="pd">Jelszó</label>
            <input id ="pd" type="password" name="password" maxlength="100" autocomplete="off" required/>
            <label for="pd2">Jelszó újra</label>
            <input id ="pd2" type="password" name="password2" maxlength="100" autocomplete="off" required/>
            <br>
            <input type="submit" name="regis" value="Register">
            <input type="reset">
            <input type="hidden" id="custId" name="custId" value="2">
        </div>
    </form>
</div>
</body>
</html>