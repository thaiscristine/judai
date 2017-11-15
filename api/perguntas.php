<?php

// DADOS INTEGRAÇÃO FACEBOOK
// token diogenes
//$token = "https://graph.facebook.com/v2.11/me?fields=id%2Cname&access_token=EAACEdEose0cBAPZA9985cfeNn9cyEqt0m1eZAZBVC02HWIhIUNUKLdDFaBEP2TtYHePQXroqRiwVbjAk1xY3j7lCr9MUcNakCoMlvRAvFqgZARTw8GCM7CaXPCHiGPkITX0HglJkPeZCCJoyK3GHAbCtpYj2nzWZBzP4scXcluU3kQiFZAqLYceqtiX7JVY7FNCJ8pNBCN0TQZDZD";

// token tiago
$token = "EAACEdEose0cBADoLeZCimYitkx2GQXbgDmyjAeZA8KZArswNKY9ZCjLAJQ2VgsfNPdDdoLz1fVelH86h2ZCfiMbMAZAGxOviFWqoTOSRd1krw2ikoBUH0WZC2TOGia1q7hdkZC47Rj1qyjQvzj3sZC3e0RgINI8RZAJZCb2gZBsibsa9hb59dQL2abvoOZCdxGA6ymOS8MLTF4KjAwwZDZD";

// NOME
$facebook = file_get_contents("https://graph.facebook.com/v2.11/me?fields=name&access_token=".$token);
$nome = json_decode($facebook, true); 

// TRABALHOS
$facebook = file_get_contents("https://graph.facebook.com/v2.11/me?fields=work&access_token=".$token);
$trabalhos = json_decode($facebook, true);

// SE É CASADO OU NÃO
$facebook = file_get_contents("https://graph.facebook.com/v2.11/me?fields=relationship_status&access_token=".$token);
$casado = json_decode($facebook, true);

// NOME DA ESPOSA
$facebook = file_get_contents("https://graph.facebook.com/v2.11/me?fields=significant_other&access_token=".$token);
$nomeEsposa = json_decode($facebook, true);

// OUTROS PARENTES
$facebook = file_get_contents("https://graph.facebook.com/v2.11/me?fields=family&access_token=".$token);
$familia = json_decode($facebook, true);


// PÁGINAS QUE CURTIU
$facebook = file_get_contents("https://graph.facebook.com/v2.11/me?fields=likes&access_token=".$token);
$likes = json_decode($facebook, true);
 
 //echo '<pre>'.print_r($trabalhos, true).'</pre>';


// LISTA GERAL DE PERGUNTAS
$BASE_pergunta[0] = "Olá <b>".$nome["name"]."</b>, seja bem vindo ao Judaí! Como é bom ter sua companhia.
Nossa missão é ajudar e é o que vamos fazer! A decisão de um imóvel é muito importante, queremos transformá-la em algo real proporcionando uma experiência única para você. Vamos lá?";

$BASE_pergunta[1] = '<b>'.$nome["name"].'</b>, sua necessidade hoje seria alugar um imóvel? Comprar um imóvel ? Ou ainda está pensando em ambas as possibilidades? <br><br> <div class="radio"><label><input type="radio" name="tipoProcura" id="tipoProcura" value="alugar" checked> Alugar</label></div><div class="radio"><label><input type="radio" name="tipoProcura" id="tipoProcura" value="comprar"> Comprar</label></div><div class="radio"><label><input type="radio" name="tipoProcura" id="tipoProcura" value="ambos"> Ambos</label></div>';

$BASE_pergunta[2] = 'Quem bom, comprar um imóvel realmente é uma passo importante. Bom <b>'.$nome["name"].'</b>, aproximadamente qual seria o investimento que você estaria disposto a fazer no momento em que tomar sua decisão? <input id="valorInvestimento" name="valorInvestimento" type="range" min="0" max="2000000" step="150" required value="0" onchange="valorRange(this.value);"/><div id="valor">R$ 0,00</div>';

if($casado["relationship_status"]=="Married"):
	$BASE_pergunta[3] = 'De acordo com seu perfil percebo que se casou recentemente com <b>'.$nomeEsposa["significant_other"]["name"].'</b> , parabéns por este momento tão especial. Percebemos que tem 02 filhos (<b>'.$familia["family"]["data"][1]["name"].'</b> e <b>'.$familia["family"]["data"][2]["name"].'</b>), eles moram com você ? <br><br> <div class="radio"><label><input type="radio" name="tipoCasou" id="tipoCasou" value="sim" checked> Sim</label></div><div class="radio"><label><input type="radio" name="tipoCasou" id="tipoCasou" value="Não" > Não</label></div>';
else:
	$BASE_pergunta[3] = 'De acordo com seu perfil percebo que você é solteiro. Você mora sozinho? <br><br> <div class="radio"><label><input type="radio" name="tipoCasou" id="tipoCasou" value="sim" checked> Sim</label></div><div class="radio"><label><input type="radio" name="tipoCasou" id="tipoCasou" value="Não" > Não</label></div>';
endif;

$BASE_pergunta[4] = 'Certo, pensam ainda em ter mais filhos? <br><br> <div class="radio"><label><input type="radio" name="maisFilhos" id="maisFilhos" value="sim" checked> Sim</label></div><div class="radio"><label><input type="radio" name="maisFilhos" id="maisFilhos" value="Não" > Não</label></div>';

$BASE_pergunta[5] = 'Que bom, filhos são realmente presentes preciosos, representam uma parte de vocês! <br>
Um imóvel para chamar de seu seria: <br><br> <div class="radio"><label><input type="radio" name="larIdeal" id="larIdeal" value="casa" checked> Uma casa?</label></div><div class="radio"><label><input type="radio" name="larIdeal" id="larIdeal" value="apartamento"> Um apartamento?</label></div><div class="radio"><label><input type="radio" name="larIdeal" id="larIdeal" value="ambos" > Ou ambos?</label></div>  ';

$BASE_pergunta[6] = 'Quantos quartos seria ideal para seu lar? <br> <div class="form-group"><select class="form-control" name="numQuartos" id="numQuartos"><option value="1"> 1</option><option value="2"> 2</option><option value="3"> 3</option><option value="4"> 4</option></select></div>';

$BASE_pergunta[7] = 'Em um lugar para chamar de seu, qual seria o raio de distância máximo a partir da sua residência atual? <input id="valorKm" name="valorKm" type="range" min="0" max="50" step="1" required value="0" onchange="km(this.value);"/><div id="distancia"> 0Km</div>';

if(preg_match('[cao|gato|cachorro|cão|pet|animais|Gatos|Pet Shop Itaim]', strtolower($likes["likes"]["data"][0]["name"]))):
	$BASE_pergunta[8] = 'Parece que você gosta de animais de estimação, você tem algum pet na sua vida? <br><br> <div class="radio"><label><input type="radio" name="pet" id="pet" value="sim" checked> Sim</label></div><div class="radio"><label><input type="radio" name="pet" id="pet" value="Não" > Não</label></div>';
else:
	$BASE_pergunta[8] = 'No seu perfil, não encontrei nada relacionado com Pets, porém gostariamos de saber. Você gosta, tem um pet ou deseja ter em breve? <br><br> <div class="radio"><label><input type="radio" name="pet" id="pet" value="sim" checked> Sim, eu gosto, ou tenho</label></div><div class="radio"><label><input type="radio" name="pet" id="pet" value="Não" > Não, não gosto ou não tenho</label></div>';
endif;

$BASE_pergunta[9] = 'Ter ou não ter Pets faz toda a diferença na hora de procurar o imóvel ideal e levamos isso em consideração!';

$BASE_pergunta[10] = 'Se pudesse escolher sua principal de necessidade, qual seria? <br> <div class="form-group"> <label>Preço?</label> </div><div class="radio"><label><input type="radio" name="preco" id="preco" value="Pouco relevante" checked> Pouco relevante</label></div><div class="radio"><label><input type="radio" name="preco" id="preco" value="Relevante "> Relevante </label></div><div class="radio"><label><input type="radio" name="preco" id="preco" value="Muito relevante"> Muito relevante</label></div><div class="form-group"> <label> Condição de pagamento?</label> </div><div class="radio"><label><input type="radio" name="condicoes" id="condicoes" value="Pouco relevante" checked> Pouco relevante</label></div><div class="radio"><label><input type="radio" name="condicoes" id="condicoes" value="Relevante "> Relevante </label></div><div class="radio"><label><input type="radio" name="condicoes" id="condicoes" value="Muito relevante"> Muito relevante</label></div>';

$BASE_pergunta[11] = 'Descreva em poucas palavras um lugar único para chamar de seu: <textarea class="form-control" rows="3" name="descricao"></textarea>';

$BASE_pergunta[12] = '<b>'.$nome["name"].'</b> começamos bem, agora por que não dá uma olhadinha no seu e-mail? Acabamos de enviar uma prévia com algumas possibilidades, olha lá, tenho certeza que vai ajudar você.';

?>