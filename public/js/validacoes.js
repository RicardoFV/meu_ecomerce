$(document).ready(function () {

    // recebe o textarea
    var campo = $('#descricao')
    // passa as informaçoes digitadas
    var digitado = campo.val().trim();
    //devolve as informações sem espaço
    $('#descricao').val(digitado)
  
})
// diminue a soma 
function diminuir() {
    // inicia  a variavel com 1
    var numero2 = 1;
    var resultado;
    // recebe o valor digitado na tela 
    var numero = parseInt(document.getElementById("quantidade").value)
    // verificao o que esta recebendo
    if (numero === 0 || numero <= 1) {
        //coloca o valor como 1
        resultado = 1;
        //retorna o valor
        return document.getElementById("quantidade").value = resultado;
    } else {
        // faz a subtração
        resultado = numero - numero2;
        //retorna o valor
        return document.getElementById("quantidade").value = resultado;
    }

}

// aumanta a quantidade
function aumentar() {
    
    //  alert(valor)
    // inicia  a variavel com 1
    var numero2 = 1;
    // recebe o valor digitado na tela 
    var numero = parseInt(document.getElementById("quantidade").value)
    var qtde_maxima = parseInt(document.getElementById("qtde_maxima").value)
    // faz a verifição da quantidade 
    if (numero >= qtde_maxima) {
        //retorna o valor
        return document.getElementById("quantidade").value = qtde_maxima;
    }
    // faz a soma
    var resultado = numero + numero2;
    
    var valor = document.getElementById("valor_produto").value  
    var dados = valor *= resultado
   document.getElementById("valor").value = dados
    //retorna o valor
    return document.getElementById("quantidade").value = resultado;
}

// função responsavel por fazer a deleção
function deletar(url, nome) {
    if (window.confirm('Deseja realmente remover este ' + nome + '?')) {
        window.location = url
    }
}

