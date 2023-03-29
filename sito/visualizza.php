<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Visualizza</title>
    <link rel="stylesheet" href="stile.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

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
            <a class="loggato">
                <?php
                    echo "Logged as " . $_SESSION['user'] . "";
                ?>  
            </a>
            <a class="nav-button" href="logout.php"> Logout</a>
        </div>
    </nav>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizza
        </ol>
    </nav>

    <?php

        $disponibilita=-1;
        if(isset($_REQUEST["disponibilita"])){
            $disponibilita=$_REQUEST['disponibilita']; 
        }           
       
        require  __DIR__ . "/php/connessione.php";

        $query="SELECT path_to_video FROM evento WHERE codice_evento=" . $disponibilita;

        $result=mysqli_query($connessionesql,$query);

        while ($campi = mysqli_fetch_row($result)) {
           $path_to_video=$campi[0];
        }

    ?>

    <video width="100%" controls>
      <source src="<?php echo $path_to_video; ?>">
        
    </video>
      
    <?php 
        $query21="SELECT likes FROM evento WHERE codice_evento=" . $disponibilita;
        $result2=mysqli_query($connessionesql,$query21);
        $like=mysqli_fetch_row($result2);

        $query22="SELECT dislike FROM evento WHERE codice_evento=" . $disponibilita;
        $result2=mysqli_query($connessionesql,$query22);
        $dislike=mysqli_fetch_row($result2);
        
    ?>

    <nav class="navbar navbar-expand-md">
        <button class="nav-button" onclick=
                                            <?php 
                                                $query3="UPDATE evento SET likes=likes+1 WHERE codice_evento=" . $disponibilita;
                                                $result3=mysqli_query($connessionesql,$query3);
                                            ?> 
                                            window.location.reload();
                                            > Like: <?php echo $like[0] ?>
            
        </button>

    </nav>

    <nav class="navbar navbar-expand-md">
        <button class="nav-button" onclick=
                                            <?php 
                                                $query4="UPDATE evento SET dislike=dislike+1 WHERE codice_evento=" . $disponibilita;
                                                $result4=mysqli_query($connessionesql,$query3);
                                            ?> 
                                            window.location.reload();
                                            > Dislike: <?php echo $dislike[0] ?>
            
        </button>

    </nav>

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