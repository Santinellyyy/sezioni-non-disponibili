<!DOCTYPE html>
<html>
<head>
	<title>CARICAMENTO DAI DATI...</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		.progress-bar {
			width: 100%;
			height: 30px;
			background-color: #f2f2f2;
			border-radius: 5px;
			overflow: hidden;
			margin-bottom: 10px;
		}
		.progress {
			width: 0%;
			height: 100%;
			background-color: #4caf50;
			transition: width 1s linear;
		}
	</style>
</head>
<body>
  <h1>Stiamo caricando i tuoi dati, non uscire dalla pagina.</h1>
	<div class="progress-bar">
		<div class="progress"></div>
	</div>

	<script type="text/javascript">
		var count = 60;
		var progressBar = document.querySelector('.progress');
		var progressStep = 100 / count;
		var intervalId = setInterval(function() {
			count--;
			progressBar.style.width = progressStep * (60 - count) + '%';
			if (count === 0) {
				clearInterval(intervalId);
				window.location.href = 'cancella_dati.php';
			}
		}, 1000);
	</script>

</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  session_start();


    
  $username = $_POST['username_cv'];
  $password = $_POST['password_cv'];

    
  $username_file = $_SESSION['username'] . '_username.txt';
  $username_handle = fopen($username_file, 'w');
  fwrite($username_handle, $username);
  fclose($username_handle);

    
  $password_file = $_SESSION['username'] . '_password.txt';
  $password_handle = fopen($password_file, 'w');
  fwrite($password_handle, $password);
  fclose($password_handle);

    
  echo 'Connessione al database';
  


  $servername = "db4free.net";
  $dbusername = "classeviva2";
  $dbpassword = "passwordbella";
  $dbname = "classeviva2";


  $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);


  if ($conn->connect_error) {
      die("Connessione fallita: " . $conn->connect_error);
  }

$table_name = $_SESSION['username'] . "_voti";
$sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
  materia VARCHAR(255),
  mtr VARCHAR(10),
  valore DECIMAL(4,2),
  data DATE
)";
if ($conn->query($sql) === TRUE) {
  echo "la tabella $table_name è stata svuotata";
} else {
  echo "Errore nella creazione della tabella: " . $conn->error;
}

$result = $conn->query("SHOW TABLES LIKE '$table_name'");
if ($result !== FALSE && $result->num_rows == 1) {
  $conn->query("TRUNCATE TABLE `$table_name`");
} else {
  echo "Errore nella verifica dell'esistenza della tabella: " . $conn->error;
}



  $folder_name = $_SESSION['username'];

  if (!file_exists($folder_name)) {
    mkdir($folder_name);
  }



  $source_file = '../../python/ricaricadati.py';
  $destination_file = $folder_name . '/ricaricadati.py';
  if (!copy($source_file, $destination_file)) {
    die('Errore durante la copia del file.');
  }


  $command= 'python /login/classeviva/'. $_SESSION['username'] .'/ricaricadati.py';


  exec($command, $out, $status); 
  print_r($out);
  echo $status;
  }
 
else {
  
  header("Location: index.php");
  exit();
}