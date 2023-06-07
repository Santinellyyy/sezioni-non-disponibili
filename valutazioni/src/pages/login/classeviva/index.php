<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collega a Classeviva - Classeviva 2.0</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login.php" method="post" class="sign-in-form">
                    <h2 class="title">Collega il tuo account a Classeviva</h2>
                        <?php

                        session_start();

                        if(isset($_SESSION['username'])) {
                            echo '<a href="profilo.php"><img src="/public_html/picprofilo/'. $_SESSION['username'] .'.png" alt="Foto profilo">' . $_SESSION['username'] . '</a>';
                        }

                        else {
                            header("Location: ../index.html");
                        }

                        ?>
                    <div class="inserisci">Inserisci le tue credenziali di classeviva.</div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username_cv" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password_cv" required>
                    </div>
                    <input type="submit" value="Login" class="btn solid">
                    </div>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <img src="collegamento.png" class="image" alt="">
        </div>
    </div>
    <div class="info">I dati di classeviva vengono salvati all'accesso.
        Il salvataggio delle credenziali ha solo lo scopo di aggiornare i dati, dopo la sincronizzazione dei dati verranno cancellate le credenziali.
    </div>
</body>
</html>


