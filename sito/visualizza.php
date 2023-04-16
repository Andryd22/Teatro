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
    require  __DIR__ . "/php/connessione.php";

    // Attiva il controllo sessione in questa pagina
    session_start();

    // Controlla se siamo in sessione
    if (!isset($_SESSION['user'])) {
        $salto='Location: /eventi.php';
		header($salto, true, 303);
		die();
    }

    if(isset($_GET["addLike"]) && $_GET["addLike"] == 1) {
        $query3="UPDATE evento SET likes=likes+1 WHERE codice_evento=" . $_SESSION["disponibilita"];
        $result3=mysqli_query($connessionesql,$query3);  
    }

    if(isset($_GET["addDislike"]) && $_GET["addDislike"] == 1) {
        $query3="UPDATE evento SET dislike=dislike+1 WHERE codice_evento=" . $_SESSION["disponibilita"];
        $result3=mysqli_query($connessionesql,$query3);  
    }

    if(isset($_GET["addCommento"]) && $_GET["addCommento"] == 1) {
 
	// Recupero parametri per il cittadino
        $query30="SELECT id FROM cittadino WHERE mail=" . $_SESSION['user'];
        $result30=mysqli_query($connessionesql,$query30);
        $id=mysqli_fetch_row($result30);

        echo $id;
        $a=1/0;
        // Recupero gli altri valori
        $disponibilita = $_SESSION["disponibilita"];
        $commento=addslashes($_REQUEST['commento']);
       
		// Esegue la insert per la tabella commenti
        $query="INSERT INTO Commenti(codice_evento,id,commento) VALUES ('$disponibilita','$id','$commento');";
		mysqli_query($connessionesql,$query);		            
    }

?>   

<body>   
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="index.html"><img src=" ./img/logo.png" /></a>
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
            <li class="breadcrumb-item active" aria-current="page">Visualizza</li>
        </ol>
    </nav>

    <?php
        $disponibilita=-1;
        if(isset($_REQUEST["disponibilita"])){
            $disponibilita=$_REQUEST['disponibilita']; 
        }           

        $query="SELECT path_to_video FROM evento WHERE codice_evento=" . $disponibilita;

        $result=mysqli_query($connessionesql,$query);

        while ($campi = mysqli_fetch_row($result)) {
            $path_to_video=$campi[0];
        }


        $_SESSION["disponibilita"] = $disponibilita;
        
    ?>

    <video width="100%" controls>
      <source src="<?php echo $path_to_video; ?>">
        
    </video>
      
    <?php 
       
        $query21="SELECT likes, dislike FROM evento WHERE codice_evento=" . $disponibilita;
        $result21=mysqli_query($connessionesql,$query21);
        $valori=mysqli_fetch_row($result21);
        
    ?>
    
    <nav class="navbar navbar-expand-md">
        <input type="hidden" id="incrementaQuale" name="incrementaQuale">
        <button class="nav-button" onclick="incrementaValori(1);"> Like: <?php echo $valori[0] ?>
            
        </button>

    </nav>

    <nav class="navbar navbar-expand-md">
        <input type="hidden" id="incrementaQuale" name="incrementaQuale">
            <button class="nav-button" onclick="incrementaValori(-1);"> Dislike: <?php echo $valori[1] ?>
                
            </button>
    </nav>

    <script>

        function incrementaValori(tipo) {
            if(tipo > 0){
                fetch("/sito/visualizza.php?addLike=1", {
                    method: "GET"
                }).then(() => {
                    window.location.reload();
                })
            }
            else{
                fetch("/sito/visualizza.php?addDislike=1", {
                    method: "GET"
                }).then(() => {
                    window.location.reload();
                })
            }
        }

        function aggiungiCommento( ) {
            debugger;
     
            fetch("/sito/visualizza.php?addCommento=1", {
                    method: "GET"
                }).then(() => {
                    window.location.reload();
                })
        }

    </script>

    <!-- sezione commenti -->
    <div class="container center__display">
        <div class="top">
            <form>
           
                <div class="form__info center__display">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="commento" id="commento" placeholder="Inserisci un commento">
                            <button onclick="aggiungiCommento();">Commenta</button>                        
                        </div>                                  
                        <div class="col-lg-6">
                            <div class="row">Commenti precedenti:</div>
                            <?php 
                        
                                $query22="SELECT mail, commento FROM commenti c INNER JOIN cittadino i ON i.id=c.id WHERE codice_evento=" . $disponibilita;
                                $result22=mysqli_query($connessionesql,$query22);                                                      

                                while ($commenti = mysqli_fetch_row($result22)) {
                                    $mail_utente=$commenti[0];
                                    $commmento_utente=$commenti[1];

                                    echo "<div class=\"row\">" . $mail_utente . " : " . $commmento_utente . "</div>";
                                }
                        
                            ?>                           
                        </div>  
                    </div>                  
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>