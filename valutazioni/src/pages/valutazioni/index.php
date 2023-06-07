<?php
session_start();

$servername = "db4free.net";
$dbusername = "classeviva2";
$dbpassword = "passwordbella";
$dbname = "classeviva2";

$username = $_SESSION['username'];

try {
    # Connessione al database
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    
  } catch (Exception $e) {
    # Errore connessione database
    echo "<!DOCTYPE html>
          <html>
          <head>
            <title>Errore di connessione al database</title>
          </head>
          <body>
            <h1>Errore di connessione al database</h1>
            <p>Si è verificato un errore durante la connessione al database. Si prega di riprovare più tardi.</p>
          </body>
          </html>";
    // Interrompo l'esecuzione dello script
    die();
  }


  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Imposta il valore della variabile di sessione
    $_SESSION['periodo_voti'] = $_POST['nuovo_periodo'];

    header("Location: index.php");
    echo $_SESSION['periodo_voti'];
    
  }
    
    

if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    # Sessione attiva

    $sql_status = "SELECT cv_status FROM utenti WHERE username = '$username'";
    $result_status = $conn->query($sql_status);

    $row = $result_status->fetch_assoc();
    $status = $row["cv_status"];

    $mat_num = 100;
    
    if($status == "online"){
        # L'account classeviva è stato verificato
        echo '
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Valutazioni</title>
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="../../../StyleAll.css">
            <link rel="icon" href="../../icons/logo-browser.png">
        </head>
        <body class="body">
          
            <div class="blocco-bianco"></div>
            <div class="blocco-bianco"></div>
            <nav>
        
                <a href="../../../index.html" class="ScrittaCvv">
                    <img class="logo-classeviva" src="../../icons/logo.png" alt="CLASSEVIVA">
                </a>
                <div class="LinksNav">
                    <button class="LinkNav Apps" onclick="Menu()" >
                        <img src="../../icons/dots-menu.png" alt="9 pallini">    
                    </button>
                    <a href="../account/index.html" class="LinkNav Account">
                        <img src="../../icons/account.png" alt="account">
                    </a>    
                </div>
            </nav>
        
        
            <div style="display: none;" class="Menu" id="Menu" >
                <div class="SectionMenu">
                    <a href="../agenda/index.html">
                        <img class="ImgMenu" src="../../icons/menu/agenda.png" alt="agenda">
                    </a>
                    <a href="../agenda/index.html">
                        <p class="ScrittaMenu">Agenda</p>
                    </a>
                </div>
                <div class="SectionMenu">
                    <a href="../valutazioni/index.html">
                        <img class="ImgMenu" src="../../icons/menu/valutazioni.png" alt="agenda">
                    </a>
                    <a href="../valutazioni/index.html">
                        <p class="ScrittaMenu">Valutazioni</p>
                    </a>
                </div>
                <div class="SectionMenu">
                    <a href="../bacheca/index.html">
                        <img class="ImgMenu" src="../../icons/menu/bacheca.png" alt="agenda">
                    </a>
                    <a href="../bacheca/index.html">
                        <p class="ScrittaMenu">Bacheca</p>
                    </a>
                </div>
                <div class="SectionMenu">
                    <a href="../didattica/index.html">
                        <img class="ImgMenu" src="../../icons/menu/didattica.png" alt="agenda">
                    </a>
                    <a href="../didattica/index.html">
                        <p class="ScrittaMenu">Didattica</p>
                    </a>
                </div>
                <div class="SectionMenu">
                    <a href="../lezioni/index.html">
                        <img class="ImgMenu" src="../../icons/menu/lezioni.png" alt="agenda">
                    </a>
                    <a href="../lezioni/index.html">
                        <p class="ScrittaMenu">Lezioni</p>
                    </a>
                </div>
                <div class="SectionMenu">
                    <a href="../permessi/index.html">
                        <img class="ImgMenu" src="../../icons/menu/permessi.png" alt="agenda">
                    </a>
                    <a href="../permessi/index.html">
                        <p class="ScrittaMenu">Permessi</p>
                    </a>
                </div>
                <div class="SectionMenu">
                    <a href="../note/index.html">
                        <img class="ImgMenu" src="../../icons/menu/note.png" alt="agenda">
                    </a>
                    <a href="../note/index.html">
                        <p class="ScrittaMenu">Note</p>
                    </a>
                </div>
                <div class="SectionMenu">
                    <a href="../scrutini/index.html">
                        <img class="ImgMenu" src="../../icons/menu/scrutini.png" alt="agenda">
                    </a>
                    <a href="../scrutini/index.html">
                        <p class="ScrittaMenu">Scrutini</p>
                    </a>
                </div>
                <div class="SectionMenu">
                    <a href="../orario/index.html">
                        <img class="ImgMenu" src="../../icons/menu/orario.png" alt="agenda">
                    </a>
                    <a href="../orario/index.html">
                        <p class="ScrittaMenu">Orario</p>
                    </a>
                </div>
            </div>
        
        
            <p class="nome-pagina">Valutazioni</p>';


            # mostra tasti
                echo '
                    <center>
                        <div class="ButtonsPeriodi">
                            <a href="tutti.php" class="ButtonPeriodo Tutti" id="PrimoPeriodo" onclick="OnPrimo()" >
                                <p>Tutti</p>
                            </a>
                                
                            <a href="primo.php" class="ButtonPeriodo Primo" id="SecondoPeriodo" onclick="OnSecondo()" >
                                <p>Primo Periodo</p>
                            </a>
                                
                            <a href="secondo.php" class="ButtonPeriodo Secondo" id="TuttiPeriodi" onclick="OnTerzo()" >
                                <p>Secondo Periodo</p>
                            </a>
                        </div>
                    </center>
                    
                    <div class="Materie">
                    <div class="ContainerVotiMateria">';

            if(isset($_SESSION['Periodo'])) {

                if ($_SESSION['Periodo'] == 1) {
                    echo 
                    '
                        <style>
                            .Primo {
                                background: #CC1020;
                                color: #fff;
                            }
                            .Secondo {
                                background: #fff;
                                color: #CC1020;
                            }
                            .Tutti {
                                background: #fff;
                                color: #CC1020;
                            }
                        </style>
                    ';

                }

                elseif ($_SESSION['Periodo'] == 3) {
                    echo 
                    '
                        <style>
                            .Primo {
                                background: #fff;
                                color: #CC1020;
                            }
                            .Secondo {
                                background: #CC1020;
                                color: #fff;
                            }
                            .Tutti {
                                background: #fff;
                                color: #CC1020;
                            }
                        </style>
                    ';
                }

                elseif ($_SESSION['Periodo'] == 5) {
                    echo 
                    '
                        <style>
                            .Primo {
                                background: #fff;
                                color: #CC1020;
                            }
                            .Secondo {
                                background: #fff;
                                color: #CC1020;
                            }
                            .Tutti {
                                background: #CC1020;
                                color: #fff;
                            }
                        </style>
                    ';
                }

            } else {

                echo 
                '
                    <style>
                        .Primo {
                            background: #fff;
                            color: #CC1020;
                        }
                        .Secondo {
                            background: #fff;
                            color: #CC1020;
                        }
                        .Tutti {
                            background: #CC1020;
                            color: #fff;
                        }
                    </style>
                ';

            }

            #RECUPERO DATI

            $sql_materie = "SELECT nome, nomi_professori FROM santinellyyy_materie";
            $result_materie = $conn->query($sql_materie);

            if ($result_materie->num_rows > 0) {
                // Output dei dati
                while ($row = $result_materie->fetch_assoc()) {
                    $nome = $row["nome"];
                    $nomi_professori = $row["nomi_professori"];

                    $nomi_prof = substr($nomi_professori, 0, 50) . "...";

                    echo'

                            <button onclick="MostraVoti('.$mat_num.')" class="Button"> <!--  al posto di LIT devi mettere la varibaile dellacronimo della materia  -->
                                <div class="ValutazioniMateria '.$mat_num.'" id="ValutazioniMateria"> <!--  al posto di LIT devi mettere la varibaile dellacronimo della materia  -->
                                    <div class="InfoValutazioniMateria">
                                        <p class="NomeMateria">'.$nome.'</p>
                                        <p class="NomeProf">'.$nomi_prof.'</p>    
                                    </div>
                                    <div class="Voto">
                                        <div class="SfondoVoto green">
                                            <div class="SfondoBiancoVoto">
                                                <p class="NumeroVoto greenNumero">7.2</p>
                                            </div>
                                        </div>
                                    </div>
                                 </div>  
                            </button>
                    ';
                    

                    if(isset($_SESSION['Periodo'])) {
                        
                        if($_SESSION['Periodo'] == 1) {

                            $sql_voti = "SELECT materia, mtr, valore, valore_mostrato, tipo_voto, colore, notes, periodo, data FROM santinellyyy_voti WHERE materia = '$nome' AND periodo = 1";

                        }

                        elseif($_SESSION['Periodo'] == 3) {

                            $sql_voti = "SELECT materia, mtr, valore, valore_mostrato, tipo_voto, colore, notes, periodo, data FROM santinellyyy_voti WHERE materia = '$nome' AND periodo = 3";


                        }

                        elseif($_SESSION['Periodo'] == 5) {

                            $sql_voti = "SELECT materia, mtr, valore, valore_mostrato, tipo_voto, colore, notes, periodo, data FROM santinellyyy_voti WHERE materia = '$nome'";

                        }

                    }

                    else {

                        $sql_voti = "SELECT materia, mtr, valore, valore_mostrato, tipo_voto, colore, notes, periodo, data FROM santinellyyy_voti WHERE materia = '$nome'";

                    }
                    
                    $result_voti = $conn->query($sql_voti);

                    if ($result_voti->num_rows > 0) {
                        // Output dei dati<
                        while ($row = $result_voti->fetch_assoc()) {

                            $materia = htmlspecialchars($row["materia"]);
                            $mtr = htmlspecialchars($row["mtr"]);
                            $valore = htmlspecialchars($row["valore"]);
                            $valore_mostrato = htmlspecialchars($row["valore_mostrato"]);
                            $tipo_voto = htmlspecialchars($row["tipo_voto"]);
                            $colore = htmlspecialchars($row["colore"]);
                            $notes = htmlspecialchars($row["notes"]);
                            $periodo = htmlspecialchars($row["periodo"]);
                            $data = htmlspecialchars($row["data"]);


                            echo '
                            
                                <div id="'.$mat_num.'" class="MostraVoti" style=""> <!-- al posto di LIT devi mettere la varibaile dellacronimo della materia  -->
                                    <div class="VotoMostrato">
                                        <div class="CircleVotoMostrato '.$colore.'">
                                            <p class="NumeroVotoMostrato">'.$valore_mostrato.'</p>
                                        </div>
                                        <div class="InfoVoto">
                                            <p class="TipoVoto">'.$tipo_voto.'</p>
                                            <p class="DataVoto">'.$data.'</p>    
                                        </div>
                                    </div>
                                </div>

                            ';

                            $mat_num += 1;

                            
                        }


                    }

                    else {
                        echo 'Nessun voto trovato';
                    }

                }
            }

            else {

                echo 'Nessuna materia trovata.';

            }



        
            echo '


                    

        





                </div>
            </div>
        
            <footer>
                <p class="TextFooter">Classeviva Copyright @2023 | Produced by </p>
                <a href="mailto:battaglia.manuel07@gmail.com">
                    <p class="LinkFooter"> Manuel Battaglia</p>
                </a>
                <p> & </p>
                <a href="mailto:santinelliriccardo5@gmail.com">
                    <p class="LinkFooter"> Riccardo Santinelli</p>
                </a>
            </footer>
        
            <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" 
            integrity="sha512-DkPsH9LzNzZaZjCszwKrooKwgjArJDiEjA5tTgr3YX4E6TYv93ICS8T41yFHJnnSmGpnf0Mvb5NhScYbwvhn2w==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
            <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" 
            integrity="sha512-0xrMWUXzEAc+VY7k48pWd5YT6ig03p4KARKxs4Bqxb9atrcn2fV41fWs+YXTKb8lD2sbPAmZMjKENiyzM/Gagw==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        
            <script src="script.js"></script>
            <script src="../../../script.js"></script>
        
        </body>
        </html>
                
        

        ';

        
    }
  
}


?>