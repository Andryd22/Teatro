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
			$isPasswordCorrect = password_verify($password, $campi[0]);		

			$isAdmin = false;
			if ($campi[1] == 1) {
				$isAdmin = true;
			}
			
			//$isPasswordCorrect =true;
						
		}

		// Fai partire la sessione 
		session_start();
			
		// Salva l'utente attuale in sessione
		$_SESSION['user'] = $email;
		
		if($isPasswordCorrect && $isAdmin) { 		 //non funge isAdmin = 0
			echo $isPasswordCorrect;
			echo $isAdmin;
			$salto='Location: ./admin.php';
	    } 
		elseif($isPasswordCorrect && !$isAdmin) {
			echo $isPasswordCorrect;
			echo $isAdmin;
			$salto='Location: ./eventi.php';
		} 
		else {
			echo $isPasswordCorrect;
			echo $isAdmin;
			$salto='Location: ./eventi.php?esito=0';
		}     
		
		header($salto, true, 303);
		die();
    }
?>
