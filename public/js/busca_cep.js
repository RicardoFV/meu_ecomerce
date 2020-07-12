// inicio do codigo jquery
$(document).ready(function () {
    // no momento que sai do campo 
    $('body').on('blur', '#cep', function () {
        let cep = $('#cep').val()
        let msg = ''
        // verifica se o que esta dentro esta vazio, e outras verificações
        if (cep == '') {
            // coloca a mensagem
            msg = 'CEP não pode ser vazio'
            mensagem(msg)
        }
        if (cep.length < 8) {
            msg = 'Digitos do CEP incompletos'
            mensagem(msg)
        }
        if (cep.length > 8) {
            msg = 'CEP digitado esta incorreto'
            mensagem(msg)
        } else {
            // faz a requisição 
            $.ajax({
                type: 'get',
                url: 'https://viacep.com.br/ws/' + cep + '/json/',
                dataType: 'json',
                success: function (resposta) {
                    if (resposta.erro == true) {

                        msg = 'CEP digitado esta incorreto'
                        mensagem(msg)
                        msg = ''
                    } else {
                        // coloca os dados nas variaveis 
                        //$('#meu_cep').val(resposta.cep)
                        $('#logradouro').val(resposta.logradouro)
                        $('#complemento').val(resposta.complemento)
                        $('#bairro').val(resposta.bairro)
                        $('#localidade').val(resposta.localidade)
                        $('#uf').val(resposta.uf)
                    }

                },
                error: function (erro) {
                    //console.log(erro)
                }
            })
        }

    })


    // campo de mensangem sobre o cep
    function mensagem(mensagem) {
        let dados
        // cria a div
        dados = '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
        dados += '<strong></strong>'+mensagem
        dados += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
        dados += '<span aria-hidden="true">&times;</span>'
        dados += '</button>'
        dados += '</div>'
        // adiciona a mesnagem na tela
        $('#mensagem').append(dados)
        // limpa o campo
        dados = ''
    }

})
