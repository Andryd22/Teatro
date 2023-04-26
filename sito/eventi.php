<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Registrazione Online</title>
    <link rel="stylesheet" href="./styles/eventi.css" type="text/css">
    
</head>

<?php 
    session_start();

    /*if(isset($_SESSION['user'])) {
        $salto='Location: ./scelta.php';
		header($salto, true, 303);
		die();
    }*/
?>

<body>
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="index.html"><img src=" ./img/logo.png" /></a>
       
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            
            <a class="nav-button" href="./index.html"> Home</a>

            <a class="nav-button right" href="register.php"> Registrati</a>

        </div>
    </nav>
   
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Eventi</li>
        </ol>
    </nav>

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
            <div class="box-largo ">
                <div id="board " class="box-largo"> 
                    <form action="<?php echo "$salto" ?>" method="post" id="register" class="form-horizontal text-center" role="form">
                        <h1>
                            <?php echo "$titolo" ?>
                        </h1>
                        <h7>
                            Se non sei ancora un utente registrato, <a href="register.php">Registrati Qui</a>
                        </h7>
                        <div class="form-group ">

                        <p><br></p>
                        <div class="row">
                            <div class="centra">
                                <input type="text" name="email" class="form-control" placeholder="Email usata in fase di registrazione" required> 
                            </div>                               
                        </div>
                        
                        <p><br></p>            
                        <div class="row">                               
                            <div class="centra">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>

                        <p><br></p>    
                        <p><br></p>     
                        
                        <p><br></p>                                            

                        <div class="form-group">
                            <button type="submit" class="button contact-submit"><?php echo "$bottone" ?></button>
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
                <div class="col-lg-12 h-100 text-center text-lg-left my-auto">
                    <p class="small">Andrea Doni &copy; 2023. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>