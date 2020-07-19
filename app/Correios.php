<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correios extends Model {
    
    // metodo que pesquisa o frete 
    public static function pesquisaPrecoPrazo($CepOrigem,$CepDestino)
    {
         // atributos
    $Peso = 0.900;
    $Formato = 1;
    $Comprimento = 20;
    $Altura = 30;
    $Largura = 20;
    $MaoPropria ='N';
    $ValorDeclarado = 0;
    $AvisoRecebimento = 'N';
    $Codigo = 40010;
    $Diametro = 0;
    $Retorno = '';    
        
        $Url="http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem={$CepOrigem}&sCepDestino={$CepDestino}&nVlPeso={$Peso}&nCdFormato={$Formato}&nVlComprimento={$Comprimento}&nVlAltura={$Altura}&nVlLargura={$Largura}&sCdMaoPropria={$MaoPropria}&nVlValorDeclarado={$ValorDeclarado}&sCdAvisoRecebimento={$AvisoRecebimento}&nCdServico={$Codigo}&nVlDiametro={$Diametro}&StrRetorno=xml&nIndicaCalculo=3";
        
        $Retorno = simplexml_load_string(file_get_contents($Url));
        // retorna em formato de string
        return $Retorno;
    }
}
