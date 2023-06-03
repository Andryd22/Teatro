<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png">
    <title>Registrazione Online</title>
    <link rel="stylesheet" href="./styles/eventi.css" type="text/css">
    
</head>

<?php 
    session_start();

    if(isset($_SESSION['user'])) {
        $salto='Location: ./scelta.php';
		header($salto, true, 303);
		die();
    }
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
        <li class="barretta-nera-item">Eventi</li>
    </ol>
    
    <?php
        $esito=-1;
        if(isset($_REQUEST["esito"])){
            $esito=$_REQUEST['esito'];
        }

        switch ($esito) {

            case -1:
                $titolo="Accesso Eventi";
                $salto="/sito/sceltachk.php";
                $bottone="Login Eventi";
                break;

            case 0:
                $titolo="Errore durante il login. Ritenta";
                $salto="/sito/sceltachk.php";
                $bottone="Login Eventi";
                break;          
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="box-largo"> 
                <form action="<?php echo "$salto" ?>" method="post" id="register" class="testo-centrato">
                    <h1>
                        <?php echo "$titolo" ?>
                    </h1>
                    <p>
                        Se non sei ancora un utente registrato, <a href="register.php">Registrati Qui</a>
                    </p>
                    <div class="form-group ">

                        <br>
                        <div class="row">
                            <div class="centra">
                                <input type="text" name="email" class="input-del-form" placeholder="Email usata in fase di registrazione" required> 
                            </div>                               
                        </div>
                        
                        <br>            
                        <div class="row">                               
                            <div class="centra">
                                <input type="password" name="password" class="input-del-form" placeholder="Password" required>
                            </div>
                        </div>

                        <br>    
                        <br> 
                        <br>  
                        <div class="form-group">
                            <button type="submit" class="button invia-form"><?php echo "$bottone" ?></button>
                        </div>

                    </div>
                </form>
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