<?php


$servername = "db4free.net";
$dbusername = "classeviva2";
$dbpassword = "passwordbella";
$dbname = "classeviva2";


$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
  die("Connessione al database fallita: " . $conn->connect_error);
}

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ottieni l'username e la password inseriti nel form
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Query per verificare l'esistenza dell'utente nel database
  $query = "SELECT * FROM utenti WHERE username = '$username'";
  $result = $conn->query($query);

  if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      // Verifica la correttezza della password
      if ($password == $row["password"]) {
          // Avvia la sessione
          session_start();
          // Imposta la variabile di sessione per l'utente
          $_SESSION["username"] = $username;
          // Reindirizza alla pagina desiderata
          header("Location: ../../../index.php");
          exit();
      } else {
          // Password errata
          header("Location: index.html");
          exit();
      }
  } else {
      // Username non trovato
      header("Location: index.html");
      exit();
  }
}

$conn->close();
?>