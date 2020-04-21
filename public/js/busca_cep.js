// inicio do codigo jquery
$(document).ready(function () {
    // no momento que sai do campo 
    $('body').on('blur', '#cep', function () {
        let cep = $('#cep').val()

        // verifica se o que esta dentro esta vazio, e outras verificações
        if (cep == '') {
            // coloca a mensagem 
            alert('não pode ser vazio')
        }
        if (cep.length < 8) {
            alert('dados insuficientes ')
        }
        if (cep.length > 8) {
            alert('Cep incorreto ')
        } else {
            // faz a requisição 
            $.ajax({
                type: 'get',
                url: 'https://viacep.com.br/ws/' + cep + '/json/',
                dataType: 'json',
                success: function (resposta) {
                    if (resposta.erro == true) {
                        alert('Cep incorreto ')
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
                    console.log(erro)
                }
            })
        }

    })

})
