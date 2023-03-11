<?php	

    if(isset($_REQUEST["email"])){
		
		// Connessione al db
		require  __DIR__ . "/php/connessione.php";
			
		// Recupero parametri  
		$email=addslashes($_REQUEST['email']);
		$password=addslashes($_REQUEST['password']);
		
		// Esegue la insert per la tabella Cittadino
        $query="SELECT password_account FROM Cittadino WHERE mail='" . $email . "' LIMIT 1;";     	  
		
		$result=mysqli_query($connessionesql,$query);
        
		$isPasswordCorrect=false;
        while ($campi = mysqli_fetch_row($result)) {	
			$isPasswordCorrect = password_verify($password, $campi[0]);									
		}

		if($isPasswordCorrect){		            
			$salto='Location: ./admin.php';
		
			// Fai partire la sessione 
			session_start();
			
			// Salva l'utente attuale in sessione
			$_SESSION['user'] = $email;

	    } else {
			$salto='Location: /eventi.php?esito=0';
		}      
		
		header($salto, true, 303);
		die();
    }
?>
