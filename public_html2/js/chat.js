"use strict"

$(function() {
    var indice = 0;
    var userSession = '123123213';
    var userNome = 'Jarbas';
    var userEmail = 'jarbas@vhlabs.com.br';

    var api_url = 'http://judai.com.br/api/';

    // LOGON
    var request = $.ajax({
        method: "POST",
        url: api_url + "criar-sessao",
        data: {
            userSession: userSession,
            userNome: userNome,
            userEmail: userEmail
        }
    });

    request.done(function(dados) {
        if (dados == 200) {
            App.CallAsks(indice, false, false, userSession, false, false, function(mensagem){
                indice++;

                if(indice === 1){
                    App.NewMessage(mensagem, 'server');

                    console.log($('.botao-enviar'));
                    $('.form-group.resposta, .botao-enviar').show();
                }
            });
        } else {
            console.log("NÃO CONSEGUIMOS RECUPERAR A SESSÃO DO FACEBOOK");
        }
    });

    request.fail(function(dados) {
        // NÃO CONSEGUIMOS ACESSAR A API
        console.log("NÃO POSSÍVEL COMUNICAÇÃO COM O SERVIDOR DA API");

    });
    // ./LOGON

    $('form.resposta').on('submit', function(e){
        e.preventDefault();

        var $form = $(this);
        var userResposta = '';

        if($('#chat').find('input[type="radio"]').length >= 1){
            userResposta = $('input[name="tipoProcura"]:checked').val();

            if(! userResposta) {
                userResposta = $('input[name="tipoCasou"]:checked').val();
            }

            if(! userResposta) {
                userResposta = $('input[name="maisFilhos"]:checked').val();
            }

            if(! userResposta) {
                userResposta = $('input[name="larIdeal"]:checked').val();
            }

            if(! userResposta) {
                userResposta = $('input[name="pet"]:checked').val();
            }

            if(! userResposta) {
                if($('input[name="preco"]:checked').val() && $('input[name="condicoes"]:checked').val()){
                    userResposta = $('input[name="preco"]:checked').val()+', '+$('input[name="condicoes"]:checked').val();
                }
            }

            if(! userResposta) {
                userResposta = $('input[name="condicoes"]:checked').val();
            }
        } else if($('#chat').find('input[type="range"]').length >= 1){
            userResposta = $('input[name="valorInvestimento"]').val();

            if(! userResposta) {
                userResposta = $('input[name="valorKm"]').val();
            }
        } else if($('#chat').find('select').length >= 1){
            userResposta = $('select[name="numQuartos"]').val();
        } else if($('#chat').find('textarea').length >= 1){
            userResposta = $('textarea[name="descricao"]').val();
        }else{
            userResposta = $('input.dialogo').val();
        }

        App.NewMessage(userResposta, 'client');

        App.CallAsks(indice, userResposta, false, userSession, false, false, function(mensagem){
            App.NewMessage('...', 'server');

            setTimeout(function(){
                App.NewMessage(mensagem, 'server');

                indice++;
            }, 1);
        });
    });
});
