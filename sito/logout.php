<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
    <link rel="icon" href="img/favicon.png">

    <title>Registrazione Online</title>
    <link rel="stylesheet" href="./styles/registered-logout-upload.css" type="text/css">
   
</head>

<?php
    
    // Attiva il controllo sessione in questa pagina
    session_start();

    // Esce dalla sessione
    session_destroy();   
?>

<body>
<nav class="navbar">
        <a class="navbar-alta" href="index.html"><img alt="Teatro di Firenze" src="./img/logo.png"></a>
        <div class="navbar-collapse">
            <a class="navbar-button" href="./index.html"> Home</a>
            <a class="navbar-button right" href="register.php"> Registrati</a>
        </div>
    </nav>
    
    <ol class="barretta-nera">
        <li class="barretta-nera-item">Home / </li>
        <li class="barretta-nera-item">Logout</li>
    </ol>  

    <div class="container">
        <div class="row">
            <div class="box-largo ">
                <div  class="box-largo">
                    <form action="./index.html" method="post" id="register" class="testo-centrato" >
                        <h1>
                            Logout Effettuato
                        </h1>
                      
                        <div class="form-group ">
                        
                            <br><br><br><br>   

                            Grazie per aver utilizzato il nostro servizio
                            
                            <br><br><br><br><br>                                           

                            <div class="form-group">
                                <button type="submit" class="button invia-form">Torna a Home Page</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="colonne12 testo-centrato">              
                    <p class="small">Andrea Doni &copy; 2023. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>