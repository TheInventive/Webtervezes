<!DOCTYPE html>
<html lang="hu">
<meta charset="UTF-8">
<title>Profile</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="../Css/navStyle.css">
<link rel="stylesheet" href="../Css/profile.css">
<body>
<header>
<?php include "navBar.php"; $user = $_SESSION["user"];?>
</header>
<main class="container">
    <!-- <h1><?php echo $user["gender"];?></h1>
    <h1><?php echo $user["tel"];?></h1> -->
    <div class="card">
        <img src="../uploads/<?php echo $user["file"]?>" alt="Tölts fel egy képet." style="width:100%">
        <h1><?php echo $user["username"];?></h1>
        <p class="title"><?php echo $user["email"];?></p>
        <p><?php echo $user["date_of_birth"];?></p>
        <a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-facebook"></i></a>
        <form action="../php/upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
</main>
</body>
</html>
