<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Visualizza</title>
    <link rel="stylesheet" href="./styles/visualizza.css" type="text/css">

    <!-- ./styles/visualizza.css
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
-->
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

    $controlloclick="   SELECT click 
                        FROM interazionecittadinoevento 
                        WHERE codice_cittadino=" . $_SESSION["user"] .  
                        " AND codice_evento=" . $_SESSION["disponibilita"];
    
    $procedere=mysqli_query($connessionesql,$controlloclick);

    /*
    - se click = 0 -> dislike per l'evento
    - se click = 1 -> like per l'evento
    */

    if($procedere->num_rows!=0){

        if(isset($_GET["addLike"]) && $_GET["addLike"] == 1) {
            $query3="UPDATE interazionecittadinoevento SET click=1, codice_evento=" . $_SESSION["disponibilita"] .", codice_cittadino=" . $_SESSION["user"]; //WHERE codice_evento=" . $_SESSION["disponibilita"];
            $result3=mysqli_query($connessionesql,$query3);  
        }

        if(isset($_GET["addDislike"]) && $_GET["addDislike"] == 1) {
            $query3="UPDATE interazionecittadinoevento SET click=0, codice_evento=" . $_SESSION["disponibilita"] .", codice_cittadino=" . $_SESSION["user"]; //WHERE codice_evento=" . $_SESSION["disponibilita"];
            $result3=mysqli_query($connessionesql,$query3); 
        }

    }
    else {
        $inserimento="  INSERT INTO interazionecittadinoevento(codice_cittadino, codice_evento, click) 
                        VALUES ($_SESSION['user'], $_SESSION['disponibilita'], 1)";
        $result=mysqli_query($connessionesql,$inserimento);
    }

  
    if(isset($_POST['commento'])) {

	    // Recupero parametri per il cittadino
        $query30="SELECT id FROM cittadino WHERE mail='" . $_SESSION['user'] . "'";
        
        $result30=mysqli_query($connessionesql,$query30);
        $id=mysqli_fetch_row($result30);
        
        // Recupero gli altri valori
        $disponibilita = $_SESSION["disponibilita"];
        $commento=addslashes($_POST['commento']);

		// Esegue la insert per la tabella commenti
        $query40="INSERT INTO Commenti(codice_evento,id,commento) VALUES ($disponibilita,$id[0],'$commento');";
		mysqli_query($connessionesql,$query40);		            
    }

?>   

<body>   
<nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="index.html"><img src=" ./img/logo.png" /></a>
       
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            
            <a class="nav-button" href="./index.html"> Home</a>

            <a class="loggato spostare">
                <?php
                    echo "Logged as " . $_SESSION['user'] . "";
                ?>  
            </a>
            
            <a class="nav-button right" href="logout.php">Logout</a>
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
       
        $query21="SELECT COUNT() FROM interazionecittadinoevento WHERE click=1"; //likes
        $query22="SELECT COUNT() FROM interazionecittadinoevento WHERE click=0"; //dislike
        $result21=mysqli_query($connessionesql,$query21);
        $result22=mysqli_query($connessionesql,$query22);
        $likes=mysqli_fetch_row($result21);
        $dislike=mysqli_fetch_row($result22);
        
    ?>
    
    <nav class="navbar navbar-expand-md">
        <div class="row">
            <input type="hidden" id="incrementaQuale" name="incrementaQuale">
                <button class="nav-button" onclick="incrementaValori(1);"> Like: <?php echo $likes ?></button>

            <input type="hidden" id="incrementaQuale" name="incrementaQuale">
                <button class="nav-button" onclick="incrementaValori(-1);"> Dislike: <?php echo $dislike ?></button>
        </div>
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

    </script>

    <!-- sezione commenti -->
    <div class="container center__display">
        <div class="top">
         
            <form action="./visualizza.php" method="post" id="visualizza" class="form-horizontal text-center" role="form">

                <div class="form__info center__display"> <!--???-->
                    <div class="row">
                        <div class="col-lg-6">

                            <input type="hidden" id="disponibilita" name="disponibilita" value="<?php echo $disponibilita; ?>"> 

                            <input type="text" name="commento" id="commento" placeholder="Inserisci un commento">
                            <button type="submit" class="button contact-submit">Commenta</button>                                                              
                      
                        </div>                                  
                        <div class="col-lg-6-2">

                            <br>
                            <div class="row2">COMMENTI PRECEDENTI</div>
                            <br>
                            
                            <?php 
                        
                                $query22="SELECT mail, commento FROM commenti c INNER JOIN cittadino i ON i.id=c.id WHERE codice_evento=" . $disponibilita;
                                $result22=mysqli_query($connessionesql,$query22);                                                      

                                while ($commenti = mysqli_fetch_row($result22)) {

                                    $mail_utente=$commenti[0];
                                    $commento_utente=$commenti[1];

                                    echo "<div class=\"row2\">" . $mail_utente .  " -> "  . $commento_utente . "</div> <br>";
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