<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Scelta</title>
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
            <a class="nav-button" href="logout.php">Logout</a>
        </div>
    </nav>
    
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Scelta</li>
        </ol>
    </nav>
    <div class="container">
        <div class="row">
            <div class="box-largo ">
                <div id="board " class="box-largo">
                    <form action="<?php echo "./visualizza.php" ?>" method="post" id="register" class="form-horizontal text-center" role="form">
                        <h1>
                            Scegliere l'Evento
                        </h1>  
                                                
                        <p><br /></p>    
                        <p><br /></p>
                        <div class="form-group ">

                            <p><br /></p>
                            <div class="row">
                                <div class="centra">
                                     <select name="disponibilita" id="disponibilita" class="form-control" required="required" aria-required="true">

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
                            
                          

                            <p><br /></p>    
                            <p><br /></p>     
                            
                            <p><br /></p>                                            

                            <div class="form-group">
                                <button type="submit" class="button contact-submit"><?php echo "Conferma" ?></button>
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