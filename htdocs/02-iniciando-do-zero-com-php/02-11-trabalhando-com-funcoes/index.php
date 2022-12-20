<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.11 - Trabalhando com funções");

/*
 * [ functions ] https://php.net/manual/pt_BR/language.functions.php
 */
fullStackPHPClassSession("functions", __LINE__);

require __DIR__ . './functions.php';

var_dump(functionName('jhonas', 'leo', 'porco','galinha', 'cavalo', 'urias'));

var_dump(optionArg("<br> jhonas"));




/*
 * [ global access ] global $var
 */
fullStackPHPClassSession("global access", __LINE__);

$weight = 200;
$height = 20;

echo "Seu peso é " . calcImc();

/*
 * [ static arguments ] static $var
 */
fullStackPHPClassSession("static arguments", __LINE__);

$pay = payTotal(200);

$pay = payTotal(500);

$pay = payTotal(400);

echo $pay;


/*
 * [ dinamic arguments ] get_args | num_args
 */
fullStackPHPClassSession("dinamic arguments", __LINE__);

var_dump(myClass('jhonas', 'urias', 'felps', 'gus', 'carlos'));
