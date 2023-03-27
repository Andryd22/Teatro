<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Registrazione Online</title>
    <link rel="stylesheet" href="stile.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>


<body>   
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="index.html"><img src="img/logo.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html"><i class="fas fa-home"></i> Home</a>
                </li>          
            </ul>
            <a class="nav-button" href="./eventi.php"> Accedi agli Eventi</a>
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
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-sm-offset-2 col-md-6 col-md-offset-0">
                                    <input type="text" name="nome" class="form-control " placeholder="Nome" required>
                                </div>
                                <div class="col-md-6 col-md-offset-0">
                                    <input type="text" name="cognome" class="form-control" placeholder="Cognome" required>
                                </div>
                            </div>
                            <p><br /></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="password2" class="form-control" placeholder="Ripeti Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                </div>
                            </div>
                            <p><br /></p>
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
                            <p><br />
                            

                            <div class="row">
                                <div class="box-largo">                               
                                    <label for="privacy"> Accetto la normativa sulla privacy: </label>
                                    <input type="checkbox" id="privacy" name="privacy" value="privacy" required>
                                    <br>                                    
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="box-largo">  
                                    <div id="pwdcheck">
                                        
                                        <p>La password deve contenere almeno:</p>
                                        <p id="minuscolo" class="invalid"><b>-</b> Una lettera <b>minuscola</b> </p>
                                        <p id="maiuscolo" class="invalid"><b>-</b> Una lettera <b>maiuscola</b> </p>
                                        <p id="numero" class="invalid"><b>-</b> Un <b>numero</b> </p>
                                        <p id="carspeciale" class="invalid"><b>-</b> Un <b>carattere speciale</b></p>
                                    </div>
                                </div>
                            </div>

                            <br />

                            <div class="form-group">
                                <button type="submit" class="button contact-submit">Invia Registrazione</button>                                   
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
                    <p class="small mb-4 mb-lg-0">Andrea Doni &copy; 2023. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>