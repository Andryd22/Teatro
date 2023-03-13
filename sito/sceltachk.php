<?php	


    if(isset($_REQUEST["email"])){
		
		// Connessione al db
		require  __DIR__ . "/php/connessione.php";
			
		// Recupero parametri  
		$email=addslashes($_REQUEST['email']);
		$password=addslashes($_REQUEST['password']);
		
		// Esegue la insert per la tabella Cittadino
        $query="SELECT password_account, isAdmin FROM Cittadino WHERE mail='" . $email . "' LIMIT 1;";     	  
		echo $query;
		$result=mysqli_query($connessionesql,$query);
        
		$isPasswordCorrect=false;
        while ($campi = mysqli_fetch_row($result)) {				
			
			// Da fixare funzione
			//$isPasswordCorrect = password_verify($password, $campi[0]);		
			echo $password;
			echo $campi[0];
			echo $isAdmin;
			$isAdmin = false;
			if ($campi[1] == 1) {
				$isAdmin = true;
			}
			
			$isPasswordCorrect =true; // non entra proprio
						
		}

		// Fai partire la sessione 
		session_start();
			
		// Salva l'utente attuale in sessione
		$_SESSION['user'] = $email;

		// Salva se è admin in sessione
		$_SESSION['admin'] = $isAdmin;
		
		if($isPasswordCorrect && $isAdmin) { 			// admin ok
			$salto='Location: ./admin.php';
	    } 
		elseif($isPasswordCorrect && !$isAdmin) { 		// non trova utente normale ma va sempre esito=0
			$salto='Location: ./eventi.php';
		} 
		else {
			$salto='Location: ./eventi.php?esito=0';
		}     
		
		header($salto, true, 303);
		die();
    }
?>
