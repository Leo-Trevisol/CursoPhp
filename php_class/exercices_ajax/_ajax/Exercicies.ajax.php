<?php

require __DIR__ . "/../source/functions.php";

$jSON = null;
$CallBack = 'Exercicies';
$PostData = filter_input_array(INPUT_POST);


if ($PostData && $PostData['callback_action'] && $PostData['callback'] == $CallBack) {
    $Case = $PostData['callback_action'];
    unset($PostData['callback'], $PostData['callback_action'], $PostData['result']);
    switch ($Case) {
        case 'conversion1':
            $valor =  exercicio1($PostData['diasSemAcidente']);
            $jSON['ex11'] = number_format($valor['years'], 0, ",", ".");
            $jSON['ex111'] = number_format($valor['years'], 0, ",", ".");

            break;
        case 'conversion2':
            $valor =  exercicio2($PostData['valorSalario']);
            $jSON['ex12'] = number_format($valor['aumento'], 0, ",", ".");
            $jSON['ex121'] = number_format($valor['desconto'], 0, ",", ".");
            break;
        case 'conversion3':
            $valor = exercicio3($PostData['numero']);
            $jSON['ex13'] = number_format($valor[0]);
            $jSON['ex131'] = number_format($valor[1]);
            $jSON['ex132'] = number_format($valor[2]);
            break;
        case 'conversion4':
            $valor = exercicio4($PostData['raio']);
            $jSON['ex14'] = number_format($valor);
            break;
        case 'conversion5':
            $valor = exercicio5($PostData['valorConta']);
            $jSON['ex15'] = number_format($valor['carlos']);
            $jSON['ex151'] = number_format($valor['andre']);
            $jSON['ex152'] = number_format($valor['felipe']);
            break;
        case 'conversion6':
            break;
        case 'conversion7':
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
