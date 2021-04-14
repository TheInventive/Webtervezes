<?php include "../php/login.php" ?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/navStyle.css">
    <link rel="stylesheet" href="../Css/login.css">
    <title>Benevolent</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="casual-cars.php">Hétköznapi autók</a>
            </li>
            <li>
                <a href="electric-cars.php">Elektromos autók</a>
            </li>
            <li>
                <a href="luxury-cars.php">Luxus autók</a>
            </li>
            <li>
                <a href="blog.php">Blog</a>
            </li>
            <?php
            include "../php/session-start.php";
            if(isset($_SESSION["user"])){
                echo '<li>
                <a href="../php/logout.php">Logout</a>
            </li>';
            }else
                echo
                '<li><a href="login.php">Login</a></li>
                <li><a href="register.php">Regisztráció</a></li>';
            ?>
        </ul>
    </nav>
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