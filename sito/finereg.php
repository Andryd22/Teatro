<?php	
	
	session_start();
    session_destroy();   

    if(isset($_REQUEST["email"])){
		
		// Connessione al db
		require __DIR__ . "/php/connessione.php";
			
		// Recupero parametri per il cittadino
        $nome=addslashes($_REQUEST['nome']);
        $cognome=addslashes($_REQUEST['cognome']);

		$pwd=addslashes($_REQUEST['password']);
		$pwd2=addslashes($_REQUEST['password2']);

		if ($pwd != $pwd2) {					
			$salto='Location: /register.php?esito=' . $esito;
			header($salto, true, 303);
			die();
		}	
			
		$pwdhash=password_hash($pwd,PASSWORD_DEFAULT);
	
        $telefono=addslashes($_REQUEST['telefono']);
		$mail=addslashes($_REQUEST['email']);	       
        $indirizzo=addslashes($_REQUEST['indirizzo']);
        $citta=addslashes($_REQUEST['citta']);
       
		// Esegue la insert per la tabella Cittadino
        $query="INSERT INTO Cittadino(nome,cognome,telefono,mail,password_account,via,citta) VALUES ('$nome','$cognome','$telefono','$mail','$pwdhash','$indirizzo','$citta');";

		if(!mysqli_query($connessionesql,$query)){		
            $salto='Location: ./register.php?esito=' . $esito;
			header($salto, true, 303);
			die();
        }   

        $salto='Location: ./registered.php';
		header($salto, true, 303);
		die();
        
    }
?>
