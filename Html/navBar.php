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
            <a class="active" href="blog.php">Blog</a>
        </li>
        <?php
        include "../php/session-start.php";
        if(isset($_SESSION["user"])){
            echo '<li>
                <a href="../php/logout.php">Logout</a>
            </li>';
        }
        else
            echo
            '<li><a href="login.php">Login</a></li>
                <li><a href="register.php">Regisztráció</a></li>';
        ?>
    </ul>
</nav>