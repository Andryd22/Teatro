<?php	
	
	session_start();

    if(isset($_SESSION['user'])){
		

		// Connessione al db
		require __DIR__ . "/php/connessione.php";
			
	
        // Torno a visualizza evento
        $salto='Location: ./visualizza.php';
		header($salto, true, 303);
		die();        
    }
?>
