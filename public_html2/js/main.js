"use strict"

var App = {};

$(function() {
    App.NewMessage = (function(message, side) {
        if (side === 'client') {
            var html = '<div class="row">';
            html += '<div class="col-lg-10 text-right">';
            html += '<div class="chat-bubble ' + side + '"></div>';
            html += '</div>';
            html += '<div class="col-lg-2 text-left">';
            html += '<span class="avatar">';
            html += '<img src="images/jarbas.jpg" alt="" />';
            html += '</span>';
            html += '</div>';
            html += '</div>';
        } else if (side === 'server') {
            var html = '<div class="row">';
            html += '<div class="col-lg-2 text-right">';
            html += '<span class="avatar">';
            html += '<img src="images/ia-avatar.png" alt="" />';
            html += '</span>';
            html += '</div>';
            html += '<div class="col-lg-10 text-left">';
            html += '<div class="chat-bubble ' + side + '"></div>';
            html += '</div>';
            html += '</div>';
        }

        $("#chat").html(html).promise().done(function(e) {
            var $bubble = $(this).find('.chat-bubble');

            if (side === 'server') {
                $bubble.addClass('loading');

                $bubble.html('...');
            }

            $bubble.removeClass('loading');

            $bubble.html(message);

            if ($('#chat').find('input[type="radio"]').length >= 1) {
                $('.form-group.resposta').hide();
            }
        });
    });

    App.CallAsks = (function(indice, userResposta, logon, userSession, userNome, userEmail, callback) {
        var api_url = 'http://judai.com.br/api/';

        var url = '';

        var dataRequest = {};

        if (indice == 0) {
            url = api_url + 'dialogo/' + indice;
        } else {
            url = api_url + 'dialogo/resposta/' + indice;
        }

        if(indice>=12){

            $(".btn-send-message").fadeOut("500");
            $("#retornoSaida").html("Muito obrigado! Foi muito bom falar com você.");

        }

        if (logon) {
            dataRequest = {
                userSession: userSession,
                userNome: userNome,
                userEmail: userEmail
            };
        } else if (indice == 0) {
            dataRequest = {
                indice: indice,
                userSession: userSession
            }
        } else if (indice >= 1) {
            dataRequest = {
                userSession: userSession,
                userResposta: userResposta
            }
        }

        var request = $.ajax({
            method: "POST",
            url: url,
            data: dataRequest
        });

        request.done(function(mensagem) {
            if (mensagem !== 500) {
                callback(mensagem);
            } else {
                console.log("NÃO CONSEGUIMOS RECUPERAR A SESSÃO DO FACEBOOK");
            }
        });
    });
});

function valorRange(valor) {
    $("#valor").html("R$ " + valor + ",00");
}

function km(valor) {
    $("#distancia").html(valor + "Km");
}
