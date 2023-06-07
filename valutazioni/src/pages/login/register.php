<?php



$servername = "db4free.net";
$dbusername = "classeviva2";
$dbpassword = "passwordbella";
$dbname = "classeviva2";


$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if (!$conn) {
  die("Connessione fallita: " . mysqli_connect_error());
}

# REGISTRAZIONE UTENTE

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  # Recupera i dati inviati tramite il metodo POST
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  # Controlla se l'email o l'username sono già presenti nel database
  $sql_email = "SELECT * FROM utenti WHERE email = '$email'";
  $result_email = mysqli_query($conn, $sql_email);
  $sql_username = "SELECT * FROM utenti WHERE username = '$username'";
  $result_username = mysqli_query($conn, $sql_username);

  if (mysqli_num_rows($result_email) > 0) {
    # L'email è già presente nel database
    header("location: registration_error_email.html");
    exit();
  } elseif (mysqli_num_rows($result_username) > 0) {
    # L'username è già presente nel database
    header("location: registration_error_username.html");
    exit();
  } else {
    # L'utente non esiste, inserisci i dati nel database
    $cv_status = "no_connection";
    $sql_insert = "INSERT INTO utenti (username, email, password, cv_status) VALUES ('$username', '$email', '$password', '$cv_status')";
    mysqli_query($conn, $sql_insert);

    session_start();
    $_SESSION['username'] = $username;

    # Crea tabelle

    $sql_voti = "CREATE TABLE ". $username ."_voti (
    materia VARCHAR(255),
    mtr VARCHAR(255),
    valore VARCHAR(255),
    valore_mostrato VARCHAR(255),
    tipo_voto VARCHAR(255),
    colore VARCHAR(255),
    notes TEXT,
    periodo VARCHAR(255),
    data VARCHAR(255)
    )";

    if ($conn->query($sql_voti) === TRUE) {
      echo "Tabella voti creata con successo";
    }

    $sql_materie = "CREATE TABLE ". $username ."_materie (
    nome VARCHAR(255),
    nomi_professori VARCHAR(500)
    )";

    if ($conn->query($sql_materie) === TRUE) {
      echo "Tabella materie creata con successo";
    }

    # Reindirizza l'utente alla pagina di login
    header("location: ../../../");
    exit();
  }
} else {
  header("location: index.html");
}


?>
