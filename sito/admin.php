<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Scelta</title>
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

<nav class="navbar navbar-expand-md">
        <a class="navbar-brand"><img alt="Teatro di Firenze" src="./img/logo.png"></a>
       
        <div class="collapse navbar-collapse">
            
            <a class="loggato spostare">
                <?php
                    echo "Logged as " . $_SESSION['user'] . "";
                ?>  
            </a>
            
            <a class="nav-button right" href="logout.php"> Logout</a>
        </div>
    </nav>
    
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home</li>
            <li class="breadcrumb-item active">Inserimento Evento</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            <div class="box-largo ">
                <div  class="box-largo">
                    <form action="upload.php" method="post" id="register" class="form-horizontal text-center"  enctype="multipart/form-data">
                        
                        <br>

                        <h1>
                            Inserisci l'Evento
                        </h1>                            
                        
                        <br><br><br>

                        <div class="row">
                            <div class="col-sm-offset-2 col-md-6 col-md-offset-0">
                                <input type="text" name="nome" class="form-control " placeholder="Nome evento" required>
                            </div>
                            <div class="col-md-6 col-md-offset-0">
                                <input type="date" name="data_evento" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-2 col-md-6 col-md-offset-0">
                                <input type="text" name="tipo" class="form-control " placeholder="Tipo spettacolo" required>
                            </div>
                            <div class="col-md-6 col-md-offset-0">
                                <input type="file" name="file" class="form-control" accept=".mp4" id="file" required>
                                <p class="gradient"><?php echo "Seleziona il file in formato .mp4 che vuoi inserire nel database"; ?></p>
                            </div>
                        </div>
                 
                        <br><br><br>

                        <div class="form-group">
                            <button type="submit" class="button contact-submit"><?php echo "Conferma" ?></button> 
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
   
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <p class="small">Andrea Doni &copy; 2023. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>