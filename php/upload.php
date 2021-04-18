<?php
include "session-start.php";
require_once "User.php";


if(isset($_POST["submit"])) {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check === false) {
        throw new Exception("Nem kép!");
    }

    if (file_exists($target_file)) {
        throw new Exception("Ezt a file-t már feltöltötték!");
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        throw new Exception("A file túl nagy!");
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        throw new Exception("Csak JPG, JPEG, PNG & GIF fileokat lehet feltölteni.");
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        if($_SESSION["user"]->getFile() != NULL AND file_exists("../uploads/".$_SESSION["user"]->getFile())){
            unlink("../uploads/".$_SESSION["user"]->getFile());
        }
        User::updateUsers();
        header("Location: ../Html/profile.php");
    } else {
        throw new Exception("Egy nem várt hiba lépett fel.");
    }
}



