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
            <a class="nav-button" href="register.php"> Registrati</a>
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
                <div id="board " class="box-largo"> <!-- come fa a anda sulla scelta -->
                    <form action="<?php echo "$salto" ?>" method="post" id="register" class="form-horizontal text-center" role="form">
                        <h1>
                            <?php echo "$titolo" ?>
                        </h1>
                        <h7>
                            Se non sei ancora un utente registrato, <a href="register.php">Registrati Qui</a>
                        </h7>
                        <div class="form-group ">

                        <p><br /></p>
                        <div class="row">
                            <div class="centra">
                                <input type="text" name="email" class="form-control" placeholder="Email usata in fase di registrazione" required> 
                            </div>                               
                        </div>
                        
                        <p><br /></p>            
                        <div class="row">                               
                            <div class="centra">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                        </div>

                        <p><br /></p>    
                        <p><br /></p>     
                        
                        <p><br /></p>                                            

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
                    <p class="small mb-4 mb-lg-0">Andrea Doni &copy; 2023. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>