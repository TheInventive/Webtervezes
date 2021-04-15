<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/navStyle.css">
    <link rel="stylesheet" href="../Css/blog.css">
    <title>Blog</title>
</head>
<body>
<header>
    <?php
    include "navBar.php";
    ?>
</header>
<main>
<?php
include "../php/session-start.php";
if(isset($_SESSION["user"])) {
    echo '<section>
<h2>Post hozzáadása</h2>
<form>
<input type="text" name="add" >
<input type="submit" name="subm">
</form>
</section>';
}?>
<section>
    <h2>Mercedes W123</h2>
    <iframe width="960" height="540"
            src="https://www.youtube.com/embed/CuHJ2-B-CrM">
    </iframe>
</section>
    <aside>
        <h2>Ebben a videóban egy klasszikus Mercedes W123 kerül bemutatásra</h2>
    </aside>
<section>
    <h2>Skyactiv-X</h2>
    <iframe width="960" height="540"
            src="https://www.youtube.com/embed/2bdpL_3cITE">
    </iframe>
</section>
    <aside>
        <h2>Itt egy újabb különleges autó</h2>
    </aside>
</main>
</body>
</html>