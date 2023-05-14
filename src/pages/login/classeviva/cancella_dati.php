<?php
session_start();

if(isset($_SESSION['username'])) {


  $dir = $_SESSION['username'];
  if (is_dir($dir)) {
    $files = scandir($dir);
    foreach ($files as $file) {
      if ($file != '.' && $file != '..') {
        unlink("$dir/$file");
      }
    }
    rmdir($dir);
  }


  $username_file = $_SESSION['username'] . '_username.txt';
  $password_file = $_SESSION['username'] . '_password.txt';
  unlink($username_file);
  unlink($password_file);

  header('Location: ../../index.php');


} else {

  echo "Non hai effettuato l'accesso";
}

?>
