<nav>
    <ul>
        <li>
            <a <?php if(basename($_SERVER['PHP_SELF']) == "index.php") echo 'class="active"'?> href="index.php">Home</a>
        </li>
        <li>
            <a <?php if(basename($_SERVER['PHP_SELF']) == "casual-cars.php") echo 'class="active"'?> href="casual-cars.php">Hétköznapi autók</a>
        </li>
        <li>
            <a <?php if(basename($_SERVER['PHP_SELF']) == "electric-cars.php") echo 'class="active"'?> href="electric-cars.php">Elektromos autók</a>
        </li>
        <li>
            <a <?php if(basename($_SERVER['PHP_SELF']) == "luxury-cars.php") echo 'class="active"'?> href="luxury-cars.php">Luxus autók</a>
        </li>
        <li>
            <a <?php if(basename($_SERVER['PHP_SELF']) == "blog.php") echo 'class="active"'?> href="blog.php">Blog</a>
        </li>
        <?php
        include "../php/session-start.php";
        if(isset($_SESSION["user"])): ?>
            <li>
                <a href="../php/logout.php">Logout</a>
            </li>
        <?php else: ?>
        <li><a <?php if(basename($_SERVER['PHP_SELF']) == "login.php") echo 'class="active"' ?> href="login.php">Login</a></li>
        <li><a <?php if(basename($_SERVER['PHP_SELF']) == "register.php") echo 'class="active"' ?> href="register.php">Regisztráció</a></li>
        <?php endif ?>
    </ul>
</nav>