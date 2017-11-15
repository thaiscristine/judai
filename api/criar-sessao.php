<?php 
// PERMITIR O ACESSO DE QUALQUER ORIGEM
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT');
#define o encoding do cabeçalho para utf-8
@header("Content-Type: text/html; charset=utf-8");

require("conexao.php");


	// INICIAR SESSÃO USUARIO
	if($_POST["userSession"]):
	    
	    // SALVAR SESSOES DO USUARIO
		$userSessao = $_POST["userSession"];
	    $userNome   = $_POST["userNome"]; 
	    $userEmail  = $_POST["userEmail"];

	    $sql = "INSERT INTO sessoes(sessao,user_nome,user_email) VALUES(:sessao,:user_nome,:user_email)";
		$stmt = $PDO->prepare( $sql );

		$stmt->bindParam( ':sessao', $userSessao );
		$stmt->bindParam( ':user_nome', $userNome );
		$stmt->bindParam( ':user_email', $userEmail );

		        try {
                         
                    $result = $stmt->execute();

                } catch (Exception $erro) {
                       
                    // SE DER ERRADO IMPRIMIR 500, E O CÓDIGO DO ERRO
                    echo "500 ".$erro->getMessage();

                } 
	    
	    echo "200";

	else:

       echo "500";

	endif;

?>