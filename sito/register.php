<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png">
    <title>Registrazione Online</title>
    <link rel="stylesheet" href="./styles/register.css" type="text/css">
    <script src="./checkpwd.js"></script>
    
</head>
<body>   
    <nav class="navbar">
        <a class="navbar-alta" href="index.html"><img alt="Teatro di Firenze" src="./img/logo.png"></a>
        <div class="navbar-collapse">
            <a class="navbar-button" href="./index.html"> Home</a>
            <a class="navbar-button right" href="./eventi.php"> Accedi agli Eventi</a>
        </div>
    </nav>
    
    <ol class="barretta-nera">
        <li class="barretta-nera-item">Home / </li>
        <li class="barretta-nera-item">Registrati</li>
    </ol>

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

    <div class="container">
        <div class="row">
            <div class="box-largo">               
                <form action="./finereg.php" method="post" id="register" class="testo-centrato" >
                    <br>
                    <h1>                        
                        <?php echo "$titolo" ?>
                    </h1>
                    <br>

                    <div class="form-group">
                        <div class="row">
                            <div class="colonne12">
                                <input type="text" name="nome" class="input-del-form" placeholder="Nome" required>
                            </div>
                            <div class="colonne12 ">
                                <input type="text" name="cognome" class="input-del-form" placeholder="Cognome" required>
                            </div>
                        </div>

                        <br><br>

                        <div class="row">
                            <div class="colonne12">
                                <input type="text" name="email" id="email" class="input-del-form" placeholder="Email" required onchange="verificaEmail(this)">
                            </div>
                            <div class="colonne14">
                                <input type="password" name="password" id="password" class="input-del-form" placeholder="Password" required onkeyup="verificaPassword(this)">
                            </div>
                            <div class="colonne14">
                                <input type="password" name="password2" id="password2" class="input-del-form" placeholder="Ripeti Password" required>
                            </div>
                        </div>

                        <br><br>

                        <div class="row">
                            <div class="colonne13">
                                <input type="text" name="telefono" class="input-del-form" placeholder="Numero di Telefono" required>
                            </div>
                            <div class="colonne13">
                                <input type="text" name="indirizzo" class="input-del-form" placeholder="Indirizzo" required>
                            </div>
                            <div class="colonne13">
                                <input type="text" name="citta" class="input-del-form" placeholder="Città" required>
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
                        
                        <br><br>

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
                            <button type="submit" class="button invia-form" onclick="verificaCampi();">Invia Registrazione</button>                                   
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