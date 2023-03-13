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
			
			echo "</br>";			
			echo $email;
			echo "</br>";
			echo $campi[0];
			echo "</br>";
			echo $campi[1];
			echo "</br>";

			
			// Da fixare funzione
			$isPasswordCorrect = password_verify(trim($password), trim($campi[0]));		
			
			$isAdmin = false;
			if ($campi[1] == 1) {
				$isAdmin = true;
			}
			//$isPasswordCorrect = 1; // non entra proprio
						
			echo "</br>isa:";
			if ($isAdmin == true) {
				echo "1";
			} else {
				echo "0";
			}

			echo "</br>isp:";

			if ($isPasswordCorrect == true) {
				echo "1";
			} else {
				echo "0";
			}
			echo "</br>";

			//$a=1/0;
			
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
