$(document).ready(function () {
    
        // recebe o textarea
        var campo = $('#descricao')
        // passa as informaçoes digitadas
        var digitado = campo.val().trim()
        //devolve as informações sem espaço
        $('#descricao').val(digitado)
    

})

// função responsavel por fazer a deleção
    function deletar(url, nome) {
        if (window.confirm('Deseja realmente remover este ' + nome + '?')) {
            window.location = url
        }
    }

