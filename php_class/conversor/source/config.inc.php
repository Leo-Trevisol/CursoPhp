<?php

$dollarToday = file_get_contents('https://dolarhoje.com/');

function dollarNow()
{
    $dollarToday = file_get_contents('https://dolarhoje.com/');

    $table = substr(
        $dollarToday,
        strpos($dollarToday, '<table class="conversao">'),
        strpos($dollarToday, '</table>') + 8 - strpos($dollarToday, '<table class="conversao">')
    );


    $body = explode(
        '</a></td> <td>',
        str_replace(
            ["    ", "   ", "  "],
            ' ',
            mb_strcut($table, strpos($table, '<tbody>'), strpos($table, '</tbody>') + 8 - strpos($table, '<tbody>'))
        )
    );

    $body = array_map('strip_tags', $body); //limpa tags de codigo
    $body = array_map('trim', $body); //elimina espaços vazios inicio e fim da string
    $bodyString = implode(" - ", $body);//converte em string
    $stringToArr = explode("   ", $bodyString);//converte em array

    foreach ($stringToArr as $value) {
        $cityValue = explode(" - ", $value); //converte em array para $value

        //atribui para uma novo array associativo os dados já tratados.
        $cotationNow [] = [
            "city" => $cityValue[0],
            "cotation" => (float)str_replace(['R$', ' ', ','], ['', '', '.'], $cityValue[1])
        ];
    }

    return $cotationNow;
}

function AjaxErro(
    $ErrMsg,
    $ErrNo = null
) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? 'trigger_info' :
    ($ErrNo == E_USER_WARNING ? 'trigger_alert' :
     ($ErrNo == E_USER_ERROR ? 'trigger-error' : 'trigger_sucess') ));
}
;
