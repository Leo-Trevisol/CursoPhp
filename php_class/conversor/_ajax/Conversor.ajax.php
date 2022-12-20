<?php

require __DIR__ . "/../source/config.inc.php";

$jSON = null;
$CallBack = 'Conversor';
$PostData = filter_input_array(INPUT_POST);


if ($PostData && $PostData['callback_action'] && $PostData['callback'] == $CallBack) {
    $Case = $PostData['callback_action'];
    unset($PostData['callback'], $PostData['callback_action'], $PostData['result']);

    switch ($Case) {
        case 'conversion':
            if (array_search('', $PostData)) {
                $jSON['trigger'] = AjaxErro("<p class 'align-center'> <b class icon-warning'> Opss!</b> por favor preecha todos os campos!</p>", E_USER_WARNING);
                $jSON['field'] = array_search('', $PostData);
            } else {
                $cotationNow = dollarNow();

                switch ($PostData['city']) {
                    case 'bh':
                        $cotacao = (int)$PostData['usd'] * (float)$cotationNow[0]['cotation'];
                        break;
                    case 'rj':
                        $cotacao = (int)$PostData['usd'] * (float)$cotationNow[1]['cotation'];
                        break;
                    case 'sp':
                        $cotacao = (int)$PostData['usd'] * (float)$cotationNow[2]['cotation'];
                        break;
                }

                $jSON['cotacao'] = 'R$' . number_format($cotacao, 2, ",", ".");

                $jSON['trigger'] = AjaxErro("<p class 'align-center'> <b class icon-smile'> Tudo certo!</b> por favor preecha todos os campos!</p>");
            }

            break;
    }

    if ($jSON) {
        echo json_encode($jSON);
    } else {
        $jSON['trigger'] = AjaxErro('<b> OPPSSSS!</b> deu ruim meu chapa', E_USER_ERROR);
        echo json_encode($jSON);
    }
} else {
    die('<br><br><br> <h1 style="text-align:center; width=100%"> Acesso restrito</h1>');
}
