<?php

  function loadUsers($path) {
    $users = [];

    $file = fopen($path, "r");
    if ($file === FALSE)
      die("HIBA: A fájl megnyitása nem sikerült!");

        while (($line = fgets($file)) !== FALSE) {
          $user = unserialize($line);
          $users[] = $user;

        }
          fclose($file);
          return $users;
  }


  function saveUsers($path, $users) {
    $file = fopen($path, "w");
    if ($file === FALSE)
      die("HIBA: A fájl megnyitása nem sikerült!");

    foreach($users as $user) {
      $serialized_user = serialize($user);
      fwrite($file, $serialized_user . "\n");
    }

    fclose($file);
  }

  function updateUsers() {
      $_SESSION["user"]["file"] = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
      $fiokok = loadUsers("../users.txt");
      for ($x = 0; $x < count($fiokok); $x++)
      {
          if ($fiokok[$x]["username"] == $_SESSION["user"]["username"])
          {
              $fiokok[$x] = $_SESSION["user"];
          }
      }
      saveUsers("../users.txt", $fiokok);

  }
