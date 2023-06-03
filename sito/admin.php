<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="icon" href="img/favicon.png">
    <title>Admin</title>
    <link rel="stylesheet" href="./styles/admin.css" type="text/css">
</head>

<?php
    session_start();

    // Controlla se siamo in sessione
    if (!isset($_SESSION['user'])) {
        $salto='Location: /scelta.php';
		header($salto, true, 303);
		die();
    }

?>   

<body>

    <nav class="navbar">
        <a class="navbar-alta"><img alt="Teatro di Firenze" src="./img/logo.png"></a>
        <div class="navbar-collapse">
            <a class="loggato spostare">
                <?php
                    echo "Logged as " . $_SESSION['user'] . "";
                ?>  
            </a>
            <a class="navbar-button right" href="logout.php"> Logout</a>
        </div>
    </nav>
    
    <ol class="barretta-nera">
        <li class="barretta-nera-item">Home / </li>
        <li class="barretta-nera-item">Admin</li>
    </ol>
    
    <div class="container">
        <div class="row">
            <div class="box-largo ">
                <div class="box-largo">
                    <form action="upload.php" method="post" id="register" class="testo-centrato"  enctype="multipart/form-data">
                        
                        <br>

                        <h1>
                            Inserisci l'Evento
                        </h1>                            
                        
                        <br><br><br>

                        <div class="row">
                            <div class="colonne12">
                                <input type="text" name="nome" class="input-del-form " placeholder="Nome evento" required>
                            </div>
                            <div class="colonne12 ">
                                <input type="date" name="data_evento" class="input-del-form" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="colonne12">
                                <input type="text" name="tipo" class="input-del-form " placeholder="Tipo spettacolo" required>
                            </div>
                            <div class="colonne12 ">
                                <input type="file" name="file" class="input-del-form" accept=".mp4" id="file" required>
                                <p class="gradient"><?php echo "Seleziona il file in formato .mp4 che vuoi inserire nel database"; ?></p>
                            </div>
                        </div>
                 
                        <br><br><br>

                        <div class="form-group">
                            <button type="submit" class="button invia-form"><?php echo "Conferma" ?></button> 
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