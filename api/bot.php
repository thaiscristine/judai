<?php 

// INICIO DA SESSAO GLOBAL
session_start();



	// INICIAR SESSÃO USUARIO
	if($_POST["session_id"]):
	    
	    // SALVAR SESSOES DO USUARIO
		$_SESSION["userSessao"] = $_POST["session_id"];
	    $_SESSION["userNome"]   = $_POST["name"]; 
	    $_SESSION["userEmail"]  = $_POST["email"];
	    
	    echo "200";

	else:

       echo "500";

	endif;






?>