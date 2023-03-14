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
/* 
    $data=addslashes($_REQUEST['data_evento']);
    $nome=addslashes($_REQUEST['nome']);
    echo $data; echo $nome;
    $query = "SELECT 1 FROM evento WHERE data_evento='" . $data . "' AND  nome='" . $nome . "';";
    $scelta=0;
    if($query==1) $scelta=1;
    echo $scelta;
    echo $query;
*/ 
//da provare codice sopra, non può funzionare non essendo presente nel db ancora
    //$data= __DIR__ . "/video/" . $_FILES["file"]["data_evento"];
    //echo $data;
    echo "</br></br></br>";
    if (file_exists(__DIR__ . "/video/" . $_FILES["file"]["name"]) && $scelta==1 ) //&& (__DIR__ . "/video/" . $_FILES["file"]["data_evento"])==date("Y-m-d")
    {
    echo $_FILES["file"]["name"] . "esiste già in questa data";
    }
    else if (!file_exists(__DIR__ . "/video/" . $_FILES["file"]["name"]))
    {
    move_uploaded_file($_FILES["file"]["tmp_name"], __DIR__ . "/video/" . $_FILES["file"]["name"]);
    echo "Inserito in: " . __DIR__ . "/video/" . $_FILES["file"]["name"];
    }
    else echo "Stampa qualcosa perfavore";
?>
</html>