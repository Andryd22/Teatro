<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="icon" href="img/favicon.png">
    <title>Scelta</title>
    <link rel="stylesheet" href="./styles/scelta.css" type="text/css">
    
</head>

 <?php
    // Attiva il controllo sessione in questa pagina
    session_start();

    // Controlla se siamo in sessione
    if (!isset($_SESSION['user'])) {
        $salto='Location: /eventi.php';
		header($salto, true, 303);
		die();
    }
 ?>   

<body>
    <nav class="navbar">
        <a class="navbar-alta" href="index.html"><img alt="Teatro di Firenze" src="./img/logo.png"></a>
        <div class="navbar-collapse">
            <a class="navbar-button" href="./index.html"> Home</a>
            <a class="loggato spostare">
                <?php
                    echo "Logged as " . $_SESSION['user'] . "";
                ?>  
            </a>
            <a class="navbar-button right" href="logout.php">Logout</a>
        </div>
    </nav>
    
    <ol class="barretta-nera">
        <li class="barretta-nera-item">Home / </li>
        <li class="barretta-nera-item">Scelta</li>
    </ol>
    
    <div class="container">
        <div class="row">
            <div class="box-largo ">
                <div  class="box-largo">
                    <form action="<?php echo "./visualizza.php" ?>" method="post" id="register" class="testo-centrato" >
                        <h1>
                            Scegliere l'Evento
                        </h1>  
                                                
                        <br>    
                        <br>
                        <div class="form-group ">

                            <br>
                            <div class="row">
                                <div class="centra">
                                     <select name="disponibilita" id="disponibilita" class="input-del-form" required="required">

                                        <?php
                                            require __DIR__ .  "/php/connessione.php";

                                            $query="SELECT * FROM evento ORDER BY data_evento ASC";

                                            $result=mysqli_query($connessionesql,$query);

                                            while ($campi = mysqli_fetch_row($result)) {
                                                echo "<option value='".$campi[0]."'>" . $campi[1] . " del " . $campi[3] . "</option>";
                                            }

                                            
                                        ?>
                                    </select>
                                </div>                               
                            </div>
        
                            <br><br><br>                                            

                            <div class="form-group">
                                <button type="submit" class="button invia-form"><?php echo "Conferma" ?></button>
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