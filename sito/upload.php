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
    $num=mysqli_num_rows($result2);

    if ($num!=0)  $giapresentenellastessadata=1;
    else $giapresentenellastessadata=0;
   

    // file già presente stessa data 
    if (file_exists(__DIR__ . "/video/" . $_FILES["file"]["name"]) && $giapresentenellastessadata==1 ){ 
        echo $_FILES["file"]["name"] . " esiste già in questa data"; //PERCHE ENTRI QUA INFAME
    }

    // file non presente oppure file già presente ma in una data diversa
    if ((!file_exists(__DIR__ . "/video/" . $_FILES["file"]["name"])) || (file_exists(__DIR__ . "/video/" . $_FILES["file"]["name"]) && $giapresentenellastessadata==0)){

        $query = "INSERT INTO evento(nome,tipo,data_evento,path_to_video) VALUES ('$nomefile','$tipo','$data','$path_to_video')";
        $result=mysqli_query($connessionesql,$query);

        move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__ . "/video/" . $_FILES["file"]["name"]);
        echo "Inserito in: " . __DIR__ . "/video/" . $_FILES["file"]["name"];
    }
    
?>
</html>