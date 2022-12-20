<?php

/**
 * Function AjaxErro
 * @param $ErrMsg
 * @param $ErrNo

 */

function AjaxErro(
    $ErrMsg,
    $ErrNo = null
) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? 'trigger_info' : ($ErrNo == E_USER_WARNING ? 'trigger_alert' : ($ErrNo == E_USER_ERROR ? 'trigger-error' : 'trigger_sucess')));
};
function exercicio1($dias)
{

    $arrayAssociative = [
        "days" => 0,
        "months" => 0,
        "years" => 0

    ];

    if ($dias > 365) {
        $years = $dias / 365;
    }

    $arrayAssociative['years'] = $years;

    return $arrayAssociative;
};
function exercicio2($salario)
{
    $arrayAssociative = [
        "aumento" => 0,
        "desconto" => 0,
    ];

    $aumento = $salario + ($salario * 0.15);
    $desconto = $aumento - ($aumento * 0.08);

    $arrayAssociative['aumento'] = $aumento;
    $arrayAssociative['desconto'] = $desconto;
    return $arrayAssociative;
};
function exercicio3($numero)
{
    $str = $numero;
    $arr1 = str_split($str);
    return $arr1;
};
function exercicio4($raio)
{
    $area = 3.14 * ($raio * $raio);
    return $area;
};
function exercicio5($valorConta)
{
    $arrayAssociative = [
        "carlos" => 0,
        "andre" => 0,
        "felipe" => 0
    ];

    $conta = ($valorConta / 3);

    $arrayAssociative['carlos'] = $conta;
    $arrayAssociative['andre'] = $conta;
    $arrayAssociative['felipe'] = $conta;

    return $arrayAssociative;
};
function exercicio6($qtdHamburguer)
{
};
function exercicio7($temperatura)
{
};
