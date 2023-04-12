<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
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
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="index.html"><img src=" ./img/logo.png" /></a>
       
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            
            <a class="nav-button" href="./index.html"> Home</a>

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
                    <p class="small">Andrea Doni &copy; 2023. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>