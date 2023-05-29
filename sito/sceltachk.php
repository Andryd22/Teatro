<?php	

    if(isset($_REQUEST["email"])){
		
		// Connessione al db
		require  __DIR__ . "/php/connessione.php";
			
		// Recupero parametri  
		$email=addslashes($_REQUEST['email']);
		$password=addslashes($_REQUEST['password']);
		
		// Esegue la insert per la tabella Cittadino
        $query="SELECT password_account, isAdmin FROM Cittadino WHERE mail='" . $email . "' LIMIT 1;";     	  

		$result=mysqli_query($connessionesql,$query);
        
		$isPasswordCorrect = false;
		$isAdmin = false;
		
        while ($campi = mysqli_fetch_row($result)) {				
			
			$isPasswordCorrect = password_verify($password, rtrim($campi[0]));		
			
			if ($campi[1] == 1) {
				$isAdmin = true;
			}
			 		
		}

		// Fai partire la sessione 
		session_start();
			
		// Salva l'utente attuale in sessione
		$_SESSION['user'] = $email;

		// Salva se è admin in sessione
		$_SESSION['admin'] = $isAdmin;
		
		if($isPasswordCorrect && $isAdmin) { 
			$salto='Location: ./admin.php';
	    } 
		elseif($isPasswordCorrect && (!$isAdmin)) { 		
			$salto='Location: ./scelta.php';
		} 
		else {
			$salto='Location: ./eventi.php?esito=0';
		}     
		
		header($salto, true, 303);
		die();
    }
?>
