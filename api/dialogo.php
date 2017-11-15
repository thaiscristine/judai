<?php 
// INICIO DA SESSAO GLOBAL
session_start();

// PERMITIR O ACESSO DE QUALQUER ORIGEM
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT');
#define o encoding do cabeçalho para utf-8
@header("Content-Type: text/html; charset=utf-8");

require("funcoes.php");
require("conexao.php");

// RECUPERAR A SESSÃO DO USUARIO 
$userSessao = $_POST["userSession"];

if(!$userSessao){
    echo "500"; break;
}

// RECUPERAR DADOS GLOBAIS DO USUARIO
$sql = "SELECT * FROM sessoes WHERE sessao = '$userSessao' LIMIT 1";
$result = $PDO->query( $sql );
$dados = $result->fetchAll( PDO::FETCH_ASSOC );

require("perguntas.php");

    if(!$_GET["indice2"]):	         

             // PERGUNTA INICIAL PARA INICIO DA LÓGICA DO CHATBOT 
             $indice = $_GET["indice"];   
             echo $BASE_pergunta[$indice];

	else:
        
        // RECUPERAR O INDICE DA PERGUNTA ATUAL
        $indice = $_GET["indice2"]; 
        
        // RECEPERAR RESPOSTA DO USUÁRIO
        $entrada = $_POST["userResposta"];
        
        // LIMPAR ACENTOS DA ENTRADA
        $entrada = strtolower( ereg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($entrada)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

        if($indice>1 || preg_match('[sim|claro|com certeza|seria ótimo|quero|talvez|sem dúvida|porque não|ok|yep|arram|aham|ahan|legal|vamos]', strtolower($entrada))) {
            
                        // INSERIR DADOS NA TABELA
                        $sql = "INSERT INTO respostas(id_pergunta, id_usuario, resposta) VALUES(:id_pergunta, :id_usuario, :resposta)";
                        $stmt = $PDO->prepare( $sql );

                        $stmt->bindParam( ':id_pergunta', $indice );
                        $stmt->bindParam( ':id_usuario', $userSessao );
                        $stmt->bindParam( ':resposta', $entrada );

                        try {
                            
                            $result = $stmt->execute();
                            //sleep(1);
                            if($indice>=12):
                                
                                $indice = 12;
                                require("enviar-email.php");
                            
                            endif;


                            echo $BASE_pergunta[$indice]; 
                            

                        } catch (Exception $erro) {
                        
                            // SE DER ERRADO IMPRIMIR 100, E O CÓDIGO DO ERRO
                            echo "500 ".$erro->getMessage();

                        } 
                        // FIM INSERIR DADOS    
         	

         }else if(preg_match('[nao|nunca|jamais|nem pensar|odeio|never|not|nop]', strtolower($entrada))) {
            
            echo "Legal! Vamos salvar o seu e-mail, e te enviaremos ofertas no futuro.";

         }else{

         	echo "Não entendi o que você quis dizer, poderia ser mais claro?";

         }

	endif;

?>