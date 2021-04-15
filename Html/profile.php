<!DOCTYPE html>
<html lang="hu">
<meta charset="UTF-8">
<title>Profile</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../Css/navStyle.css">
<link rel="stylesheet" href="../Css/profile.css">
<body>
<header>
<?php include "navBar.php"; $user = $_SESSION["user"]; if(!isset($_SESSION["user"])) header("Location: login.php");?>
</header>
<main class="container">
    <div class="card">
        <img src="../uploads/<?php echo $user->getFile(); ?>" alt="Tölts fel egy képet." style="width:100%">
        <h1><?php echo $user->getUsername() ?></h1>
        <p class="title"><?php echo $user->getEmail(); ?></p>
        <p><?php echo $user->getDateOfBirth(); ?></p>
        <form action="../php/upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
</main>
</body>
</html>
