@extends('layouts.layout')

@section('conteudo')

<div class="container">

    <h1 class="text-center mt-0 mb-3">Realizar Pagamento</h1>

    <form>
        <!-- campos especificos  -->
        <input type="text" name="amount" id="amount"/>
        <input type="hidden" name="payment_method_id" id="payment_method_id"/>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="description"> Descrição</label>
                <input class="form-control" type="text" name="description" readonly="readonly" value="Produtos Diversos" id="description"/>    
            </div>

            <div class="form-group col-md-3">
                <label for="cardholderName">Nome e Sobrenome</label>
                <input type="text" class="form-control" id="cardholderName" value="{{$dados['nomecliente']}}" data-checkout="cardholderName" />    
            </div>

            <div class="form-group col-md-3">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" value="{{$dados['emailCliente']}}" name="email" />   
            </div>

            <div class="form-group col-md-3">
                <label for="transaction_amount">Valor a Pagar</label>
                <input  class="form-control" name="transaction_amount" readonly="readonly" value="R$ {{$dados['valor_final']}}" id="transaction_amount" />    
            </div>

            <div class="form-group col-md-3">
                <label for="cardNumber">Numero do Cartão</label>
                <input type="text" class="form-control" id="cardNumber" data-checkout="cardNumber" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                <div class="brand"></div>    
            </div>

            <div class="form-group col-md-3">
                <label for="cardExpirationMonth">Mês de Vencimento</label>
                <input type="text" class="form-control" id="cardExpirationMonth" data-checkout="cardExpirationMonth" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />    
            </div>

            <div class="form-group col-md-3">
                <label for="cardExpirationYear">Ano de Vencimento</label>
                <input type="text" class="form-control" id="cardExpirationYear" data-checkout="cardExpirationYear" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />   
            </div>

            <div class="form-group col-md-3">
                <label for="securityCode">Código de Segurança</label>
                <input type="text" class="form-control" id="securityCode" data-checkout="securityCode" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
            </div>

            <div class="form-group col-md-4">
                <label for="transaction_amount">Parcelas</label>
                <select id="installments" class="form-control" name="installments"></select>    
            </div>

            <div class="form-group col-md-4">
                <label for="transaction_amount">Tipo de Documento</label>
                <select class="form-control" id="docType" data-checkout="docType"></select>    
            </div>

            <div class="form-group col-md-4">
                <label for="securityCode">Número do Documento</label>
                <input type="text" class="form-control" id="docNumber" data-checkout="docNumber"/>
            </div>
        </div>

        <div class="text-right mb-3">
            <a target="_blank" href="https://www.mercadopago.com.br/ajuda/Custos-de-parcelamento_322">Juros de Parcelamento</a>
            <button class="btn btn-success ml-1">Realizar Pagamento</button>  
        </div> 
    </form>



    <label for="termo_condicoes"><strong>Termos e condições</strong></label><br>
    <input type="checkbox" name="termo_condicoes" id="termo_condicoes"required="required">
    Estou ciente que meus dados estão protegidos e que o sistema e-commerce não reterá nenhum 
    dado aqui digitado.
    <br><br>
    <div class="mb-5 mt-3 text-center">
        <img src="https://imgmp.mlstatic.com/org-img/MLB/MP/BANNERS/tipo2_735X40.jpg?v=1" 
             alt="Mercado Pago - Meios de pagamento" title="Mercado Pago - Meios de pagamento" 
             width="735" height="40"/>
    </div>

   
</div>
@endsection