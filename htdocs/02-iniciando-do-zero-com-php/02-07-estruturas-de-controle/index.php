<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.07 - Estruturas de controle");

/*
 * [ if ] https://php.net/manual/pt_BR/control-structures.if.php
 * [ elseif ] https://php.net/manual/pt_BR/control-structures.elseif.php
 * [ else ] https://php.net/manual/pt_BR/control-structures.else.php
 */
fullStackPHPClassSession("if, elseif, else", __LINE__);

$nota = 70;
$media = 50;

if($nota >= $media){
    echo "<p> Aprovado</p>";
}else{
    echo "<p>Reprovado</p>";
}
$test = false;
$age = 50;
$hour = 0;

if(isset($test)){
echo "existe test";
}elseif ($hour){
    echo "existe hora";
}else{
    echo "nada";
};



/*
 * [ isset ] https://php.net/manual/pt_BR/function.isset.php
 * [ empty] https://php.net/manual/pt_BR/function.empty.php
 */
fullStackPHPClassSession("isset, empty, !", __LINE__);

$pop = "Michael Jackson";

$rockAndRoll = "Queen";

echo "Essa eh uma banda " . ($rockAndRoll ? $rockAndRoll : "<span class = 'tag'> {$pop} </span>");


/*
 * [ switch ] https://secure.php.net/manual/pt_BR/control-structures.switch.php
 */
fullStackPHPClassSession("switch", __LINE__);


$payment = 3;

switch ($payment){
    case 'PIX':
        echo "<p> pagamento via pix </p> ";
        break;
        case 3:
            echo "<p> pagamento via dinheiro </p> ";
            break;
};






