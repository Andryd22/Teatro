<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png">
    <title>Insert Effettuato</title>
    <link rel="stylesheet" href="styles/registered-logout-upload.css" type="text/css">
</head>

<?php   

    // Connessione al db
	require __DIR__ . "/php/connessione.php";
    
    // Recupero parametri per il video
    $nomefile=addslashes($_REQUEST['nome']);
    $data=addslashes($_REQUEST['data_evento']);
    $tipo=addslashes($_REQUEST['tipo']);
    $path_to_video= "./video/" . $nomefile . ".mp4";

    
    $query2 = "SELECT 1 FROM evento WHERE data_evento='" . $data . "' AND  nome='" . $nomefile . "';";
    $result2='';
    $result2=mysqli_query($connessionesql,$query2);
    
    //controllo se result2 è vuoto o ha un result
    if ($result2->num_rows!=0)  $giapresentenellastessadata=1;
    else $giapresentenellastessadata=0;
   
    $ok=-1; //var per inserimento

    // file già presente stessa data 
    if (file_exists(__DIR__ . "/video/" . $_FILES["file"]["name"]) && $giapresentenellastessadata==1 ){ 
        $ok=0; //non può essere inserito
    }

    // file non presente oppure file già presente ma in una data diversa
    if ((!file_exists(__DIR__ . "/video/" . $_FILES["file"]["name"])) || (file_exists(__DIR__ . "/video/" . $_FILES["file"]["name"]) && $giapresentenellastessadata==0)){

        $query = "INSERT INTO evento(nome,tipo,data_evento,path_to_video) VALUES ('$nomefile','$tipo','$data','$path_to_video')";
        $result=mysqli_query($connessionesql,$query);

        move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__ . "/video/" . $_FILES["file"]["name"]);
        $ok=1; //ok per l'inserimento
    }
    
?>

<body>
    <nav class="navbar">
        <a class="navbar-alta"><img alt="Teatro di Firenze" src="./img/logo.png"></a>
        <div class="navbar-collapse">
            <a class="navbar-button right" href="admin.php">Admin</a>
        </div>
    </nav>
    
    <nav aria-label="barretta-nera">
        <ol class="barretta-nera">
            <li class="barretta-nera-item active">Home</li>
            <li class="barretta-nera-item active">Admin</li>
        </ol>
    </nav>  

    <div class="container">
        <div class="row">
            <div class="box-largo ">
                <div class="box-largo">
                    <form action="./admin.php" method="post" class="testo-centrato" >
                        <h1>
                            Inserimento
                        </h1>
                      
                        <div class="form-group ">
                        
                            <br><br><br><br> 

                            <?php
                            if($ok==1) echo "Spettacolo inserito correttamente nel database"; 
                            if($ok==0) echo $_FILES["file"]["name"] . " esiste già in questa data";  
                            ?>

                            <br><br><br><br><br>                                           

                            <div class="form-group">
                                <button type="submit" class="button invia-form">Torna alla sezione Admin</button>
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
                <div class="colonne12 testo-centrato">              
                    <p class="small">Andrea Doni &copy; 2023. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>