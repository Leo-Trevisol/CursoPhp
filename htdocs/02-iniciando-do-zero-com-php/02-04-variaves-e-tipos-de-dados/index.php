<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.04 - Variáveis e tipos de dados");

/**
 * [tipos de dados] https://php.net/manual/pt_BR/language.types.php
 * [ variáveis ] https://php.net/manual/pt_BR/language.variables.php
 */
fullStackPHPClassSession("variáveis", __LINE__);

$userFirstName = "Leozin";
$userLastName = "Tretre";
echo  "<h3> {$userFirstName} {$userLastName} </h3>";

$user_first_name = $userFirstName;
$user_last_name = $userLastName;

echo  "<h3> {$user_first_name} {$user_last_name} </h3>";

$userAge = 19;

$userFullName = "{$userFirstName} {$userLastName}";
echo "<p> {$userFullName} <span class='tag'> tem {$userAge} </span>";
echo '<p> {$userFullName} <span class="tag"> tem {$userAge} </span>';

?>

<!-- HTML COM PHP EMBUTIDO-->

<p> <?= $userFullName ?> tem : <span class = "tag" > <?= $userAge; ?> </span> </p>

<?php

$userEmail = "<p><span class = 'tag'> leotrevisol.2021@gmail.com </span> </p>";

echo $userEmail;    

$company = "zen";
$$company = "leozin";

echo "<h3> {$company} {$zen} </h3>";





/**
 * [ tipo boleano ] true | false
 */
fullStackPHPClassSession("tipo boleano", __LINE__);


$true = true;
$false = false;

$bestage = ($userAge > 20);
var_dump($bestage);






/**
 * [ tipo callback ] call | closure
 */
fullStackPHPClassSession("tipo callback", __LINE__);

$code = "<article> <h1> Call user function! </h1> </article> ";

$codeClear = call_user_func("strip_tags", $code);

var_dump($code, $codeClear);

$codeMore = function ($code){
    echo  "<h1> {$code} </h1>";
};

$moneyFormat = function ($val){
    return "R$ "  . number_format($val * 5.5, 2, ',', '.');
};

echo $moneyFormat('1000');

$codeMore("Aprendendo PHP");


/**
 * [ outros tipos ] string | array | objeto | numérico | null
 */
fullStackPHPClassSession("outros tipos", __LINE__);

$string = "Hello world!";
$array = array('key' => 'value');
$array = [$string];
$object = new StdClass();
$object-> hello = $string;
$null = null; // '' = 0 = '0' = false = NULL
$int = 123;
$float = 12.123;

var_dump( [$string, $array, $object, $null, $int, $float ]);