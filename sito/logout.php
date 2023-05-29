<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
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
<nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="index.html"><img alt="Teatro di Firenze" src="./img/logo.png"></a>
       
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

    <div class="container">
        <div class="row">
            <div class="box-largo ">
                <div  class="box-largo">
                    <form action="./index.html" method="post" id="register" class="form-horizontal text-center" >
                        <h1>
                            Logout Effettuato
                        </h1>
                      
                        <div class="form-group ">
                        
                            <br>                           
                            <br>            
                            <br>    
                            <br>     
                            Grazie per aver utilizzato il nostro servizio
                            <br>                           
                            <br>            
                            <br>    
                            <br>     
                            <br>                                            

                            <div class="form-group">
                                <button type="submit" class="button contact-submit">Torna a Home Page</button>
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