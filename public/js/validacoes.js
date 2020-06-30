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
        //passo esse calculo para a função calcularValor
        calcularValor(resultado)
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
    //passo esse calculo para a função calcularValor
    calcularValor(resultado)
    //retorna o valor
    return document.getElementById("quantidade").value = resultado;
}

function calcularValor(resultado)
{
    // recebe o valor do produto 
    var valor = parseFloat(document.getElementById("valor_produto").value)
    // faz o calculo com base na quantidade 
    var dados = parseFloat(valor *= resultado)
    // retorna o valor 
    return document.getElementById("valor").value = 'R$ ' + dados + '.00'
}

// função responsavel por fazer a deleção
function deletar(url, nome) {
    if (window.confirm('Deseja realmente remover este ' + nome + '?')) {
        window.location = url
    }
}

// metodo que faz o retorno para url, se cancelar ou se aprovar
function acaoBoleto(url) {
    if (window.confirm("Deseja realmente cancelar o boleto ?")) {
        window.location = url
    }
}
// exibe uma mensagem quando o boleto e gerado 
function  MensagemcarregarBoleto() {
    alert("Boleto sendo gerado ")
    //window.open(url) 
}

function verfiicaPagamento(url, codigoBoleto) {
    let tokenProduto = 'APP_USR-5310965525503370-051823-27d7f3b4e439fcd48abfe6e0a77f0a3d-570231747';
    // token homologação 
    let tokenHomologacao = 'TEST-5310965525503370-051823-2699a1d4c2e8138abcd476b39c70f433-570231747'
    // url do mercado pago
    let siteMercadoPago = 'https://api.mercadopago.com/v1/payments/' + codigoBoleto + '?' + 'access_token=' + tokenHomologacao

    // instancia a requisição 
    let requisicao = new XMLHttpRequest();
    // inicia a requisição 
    requisicao.open('GET', siteMercadoPago, true)
    // faz a requisição
    requisicao.onreadystatechange = function () {
        // veriica se a requisição terminou 
        if (requisicao.readyState === 4) {
            if (requisicao.status === 200) {
                let dados = JSON.parse(requisicao.responseText)
                if (dados.status_detail === 'pending_waiting_payment') {
                    alert('Pagamento ainda esta pendente')
                } else if (dados.status_detail === 'approved' || dados.status_detail === 'authorized') {
                    window.location = url
                }

            }
        }
    }
    // finaliza a requisição
    requisicao.send();
}




