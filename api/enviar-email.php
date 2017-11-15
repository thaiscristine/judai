<?php
 
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require("phpmailer/class.phpmailer.php");
 
// Inicia a classe PHPMailer
$mail = new PHPMailer();
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "mail.diogenesjunior.com.br"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host email-ssl.com.br)
$mail->Port = 587;
$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtplw.com)
$mail->auth   = true;
$mail->secure = "TLS";
$mail->Username = 'sites@diogenesjunior.com.br'; // Usuário do servidor SMTP (site@enviador.casteloviana.com.br)
$mail->Password = 'Website0--'; // Senha do servidor SMTP (Website0--)
 
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = 'sites@diogenesjunior.com.br'; // Seu e-mail
$mail->Sender = 'sites@diogenesjunior.com.br'; // Seu e-mail
$mail->FromName = 'Judaí - Muitas possibilidades para tomar sua decisão'; // Seu nome
 
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('diogenesjunior.ti@gmail.com');
$mail->AddBCC('tiagodiord@gmail.com'); // Copia
$mail->AddBCC('sanches.giovanni@hotmail.com.br'); // Cópia Oculta
$mail->AddBCC('contato@diogenesjunior.com.br'); // Cópia Oculta
$mail->AddBCC('this.cristine06@gmail.com'); // Cópia Oculta
$mail->AddBCC('jarbas@vhlabs.com.br'); // Cópia Oculta
 
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
 
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Possibilidades Judaí"; // Assunto da mensagem

$mail->Body = "

     <div style='position:relative;display:block;width:100%;height:auto;font-family:Calibri;font-size:1.3em;background:#f2f2f2;paddding:25px;'>

        <div style='position:relative;display:block;width:100%;height:auto;background:#fff;paddding:25px'>

             <p style='text-align:center'>
                <img src='http://judai.com.br/images/87383640-b688-40a4-995d-146af8acdbf5.jpg' style='width:170px;height:auto' />
             </p>             

             <h3 style='text-align:center;'>Possibilidades Judaí</h3>
             
             <p style='text-align:center;'>
               Olá ".$nome["name"].", agora que te conhecemos um pouco melhor, temos essas oportunidades baseadas no seu perfil:
             </p>

             <p>&nbsp;</p>

             <p style='text-align:center;'>
               
               <a href='https://www.vivareal.com.br/imovel/apartamento-3-quartos-centro-bairros-farroupilha-com-garagem-91m2-venda-RS401337-id-85688607/?__vt=prefetch:c'>
               <img src='http://judai.com.br/images/imovel01.jpg' style='width:240px;height:auto;margin-left:8px;margin-right:8px;' />
               </a>
               
               <a href='https://www.vivareal.com.br/imovel/apartamento-3-quartos-centro-bairros-farroupilha-com-garagem-91m2-venda-RS401337-id-85688607/?__vt=prefetch:c'>
               <img src='http://judai.com.br/images/imovel02.jpg' style='width:240px;height:auto;margin-left:8px;margin-right:8px;' />
               </a>
               
               <a href='https://www.vivareal.com.br/imovel/apartamento-3-quartos-centro-bairros-farroupilha-com-garagem-91m2-venda-RS401337-id-80419812/?__vt=prefetch:c'>
               <img src='http://judai.com.br/images/imovel03.jpg' style='width:240px;height:auto;margin-left:8px;margin-right:8px;' />
               </a> 

             </p>

             
             <br><br>
             <h4 style='text-align:center;'>Quer mais ofertas?</h4>
             <p style='text-align:center;'>
               <a href='https://www.vivareal.com.br/venda/rio-grande-do-sul/farroupilha/bairros/centro/apartamento_residencial/?__vt=prefetch:c#onde=BR>Rio_Grande_do_Sul>NULL>Farroupilha>Barrios>Centro&quartos=3&tipo-usado=apartamento'>
               Acesse nosso link.</a>
             </p>

             <p style='text-align:center;'>
                <a href='http://www.judai.com.br'>www.judai.com.br</a>
             </p>

        </div>

     </div>

     ";
 
// Envia o e-mail
$enviado = $mail->Send();

if(!$enviado){
     echo "ERRO DE ENVIO: " , $mail->ErrorInfo;;
}

 
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();



//###################
//#
//#
//#
// CONSULTOR
//#
//#
//#
//###################
// Inicia a classe PHPMailer
$mail = new PHPMailer();
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "mail.diogenesjunior.com.br"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host email-ssl.com.br)
$mail->Port = 587;
$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtplw.com)
$mail->auth   = true;
$mail->secure = "TLS";
$mail->Username = 'sites@diogenesjunior.com.br'; // Usuário do servidor SMTP (site@enviador.casteloviana.com.br)
$mail->Password = 'Website0--'; // Senha do servidor SMTP (Website0--)
 
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = 'sites@diogenesjunior.com.br'; // Seu e-mail
$mail->Sender = 'sites@diogenesjunior.com.br'; // Seu e-mail
$mail->FromName = 'Judaí - Muitas possibilidades para tomar sua decisão'; // Seu nome
 
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('diogenesjunior.ti@gmail.com');
//$mail->AddBCC('tiagodiord@gmail.com'); // Copia
$mail->AddBCC('sanches.giovanni@hotmail.com.br'); // Cópia Oculta
$mail->AddBCC('contato@diogenesjunior.com.br'); // Cópia Oculta
$mail->AddBCC('this.cristine06@gmail.com'); // Cópia Oculta
$mail->AddBCC('jarbas@vhlabs.com.br'); // Cópia Oculta
 
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)
 
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Novo perfil de cliente Judaí"; // Assunto da mensagem

     $sql = "SELECT * FROM respostas WHERE id_usuario = '$userSessao' LIMIT 12";
     $result = $PDO->query( $sql );
     $respostas = $result->fetchAll( PDO::FETCH_ASSOC );

     if($casado["relationship_status"]=="Married") $estado_civil = "Casado";
     if($casado["relationship_status"]!="Married") $estado_civil = "Solveiro";

$mail->Body = "

     <div style='position:relative;display:block;width:100%;height:auto;font-family:Calibri;font-size:1.3em;background:#f2f2f2;paddding:25px;'>

        <div style='position:relative;display:block;background:#fff;paddding:25px'>

             <p style='text-align:center'>
                <img src='http://judai.com.br/images/87383640-b688-40a4-995d-146af8acdbf5.jpg' style='width:170px;height:auto' />
             </p>
             
             <h3 style='text-align:center;'>Novo perfil de cliente Judaí</h3>
             
             <p style='text-align:center;'>
               O cliente: ".$nome["name"].", demonstrou interesse e disponibilizou os seguintes dados, através da judaí:
             </p>

             <p>
               <b>Comprar, Alugar ou ambos?</b>: ".$respostas[1]["resposta"]." <br>
             </p>
             <p>
               <b>Valor que o cliente tem interesse em investir</b>: ".$respostas[2]["resposta"]." <br>
             </p>
             <p>
               <b>Status de relacionamento</b>: ".$estado_civil." <br>
             </p>
             <p>
               <b>Se tem filhos, quantos</b>: 2 <br>
             </p>
             <p>
               <b>Quantidade de quartos que interessa ao cliente</b>: ".$respostas[6]["resposta"]." <br>
             </p>
             <p>
               <b>Qual seria o imóvel ideal para o cliente</b>: ".$respostas[5]["resposta"]." <br>
             </p>
             <p>
               <b>Raio de Localização da cidade do cliente (Farroupilha-RS)</b>: ".$respostas[7]["resposta"]."Km <br>
             </p>
             <p>
               <b>Comentários espontanêos</b>: ".$respostas[11]["resposta"]." <br>
             </p>
             <p>
               <b>Onde usuário trabalhou</b>: <br>".$trabalhos["work"][0]["name"]." <br>
               ".$trabalhos["work"][1]["employer"]["name"]." Localização: ".$trabalhos["work"][1]["location"]["name"]." <br>
               ".$trabalhos["work"][2]["employer"]["name"]." Localização: ".$trabalhos["work"][2]["location"]["name"]." <br>
             </p>
             <p>
               <b>Últimos interesses no Facebook: </b> <br>
               ".$likes["likes"]["data"][0]["name"]." <br>
               ".$likes["likes"]["data"][1]["name"]." <br>
               ".$likes["likes"]["data"][2]["name"]." <br>
               ".$likes["likes"]["data"][3]["name"]." <br>
               ".$likes["likes"]["data"][4]["name"]." <br>
               ".$likes["likes"]["data"][5]["name"]." <br>
               ".$likes["likes"]["data"][6]["name"]." <br>
             </p>
            
             <p style='text-align:center;'>
                <a href='http://www.judai.com.br'>www.judai.com.br</a>
             </p>
            

        </div>

     </div>

     ";

// Envia o e-mail
$enviado = $mail->Send();

if(!$enviado){
     echo "ERRO DE ENVIO: " , $mail->ErrorInfo;;
}

 
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

// Exibe uma mensagem de resultado
/*
if ($enviado) {
echo "<script type=\"text/javascript\">
	alert(\"Um consultor especializado entrará em contato com você em até 2 horas em horário comercial de segunda a sábado. Obrigado!\");
	window.location=('index.php');
	</script>";
} else {
echo "<script type=\"text/javascript\">
	alert(\"Nao foi possível enviar o e-mail.\");
	window.location=('index.php');
	</script>";
	
echo "Informações do erro: 
" . $mail->ErrorInfo;
}
 */
?>