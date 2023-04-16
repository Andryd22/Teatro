<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Registrazione Online</title>
    <link rel="stylesheet" href="./styles/register.css" type="text/css">
    
</head>

<script src="./checkpwd.js"></script>

<body>   
<nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="index.html"><img src=" ./img/logo.png" /></a>
       
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            
            <a class="nav-button" href="./index.html"> Home</a>

            <a class="nav-button right" href="./eventi.php"> Accedi agli Eventi</a>
        </div>
    </nav>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Registrazione</li>
        </ol>
    </nav>


    <?php

    require __DIR__ . "/php/connessione.php";
        $esito=-1;
        if(isset($_REQUEST["esito"])){
            $esito=$_REQUEST['esito'];                                                         
        }                                    

        switch ($esito) {

            case -1: 
                $titolo="Registrazione Utente";                                             
                break;

            case 0:
                $titolo="Errore nella registrazione. Ritenta";                                               
                break;         
        }
    ?>

    <div class="container2">
        <div class="row">
            <div class="box-largo ">
                <div id="board " class="box-largo">                   
                    <form action="./finereg.php" method="post" id="register" class="form-horizontal text-center" role="form">
                        <h1>                        
                            <?php echo "$titolo" ?>
                        </h1>
                        <br>

                        <div class="form-group ">
                            <div class="row">
                                <div class="col-sm-offset-2 col-md-6 col-md-offset-0">
                                    <input type="text" name="nome" class="form-control " placeholder="Nome" required>
                                </div>
                                <div class="col-md-6 col-md-offset-0">
                                    <input type="text" name="cognome" class="form-control" placeholder="Cognome" required>
                                </div>
                            </div>

                            <br><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" required onchange="verificaEmail(this)">
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required onkeyup="verificaPassword(this)">
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Ripeti Password" required>
                                </div>
                            </div>

                            <br><br>

                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="telefono" class="form-control" placeholder="Numero di Telefono" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="indirizzo" class="form-control" placeholder="Indirizzo" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="citta" class="form-control" placeholder="Città" required>
                                </div>                         
                            </div>

                            <br><br>
                            

                            <div class="row">
                                <div class="box-largo">                               
                                    <label for="privacy"> Accetto la normativa sulla privacy: </label>
                                    <input type="checkbox" id="privacy" name="privacy" value="privacy" required>
                                    <br>                                    
                                </div>
                            </div>
                            
                            <br>
                            <br>

                            <div class="row">
                                <div class="box-largo">  
                                    <div id="pwdcheck2">
                                        
                                        <p>La password deve contenere almeno:</p>
                                        <p id="minuscolo" class="invalid"><b>-</b> Una lettera <b>minuscola</b> </p>
                                        <p id="maiuscolo" class="invalid"><b>-</b> Una lettera <b>maiuscola</b> </p>
                                        <p id="numero" class="invalid"><b>-</b> Un <b>numero</b> </p>
                                        <p id="carspeciale" class="invalid"><b>-</b> Un <b>carattere speciale</b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="button contact-submit" onclick="verificaCampi();">Invia Registrazione</button>                                   
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
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">                  
                    <p class="small">Andrea Doni &copy; 2023. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>