<?php

require __DIR__ . '/../../../fullstackphp/fsphp.php';

fullStackPHPClassSession("conversão de caixa", __LINE__);

$string = "O último show do Pink Floyd no Brasil foi incrível!";

var_dump([
    "string" => $string,
    "strlen" => strlen($string),
    "mb_strlen" => mb_strlen($string),
    "substr" => substr($string, 14),
    "mb_substr" => mb_substr($string, 15)

]);

$mbString = $string;

var_dump([
    "strtoupper" => strtoupper($mbString),
    "strtolower" => strtolower($mbString),
    "mb_convert_case UPPER" => mb_convert_case($mbString, MB_CASE_UPPER),
    "mb_convert_case LOWER" => mb_convert_case($mbString, MB_CASE_LOWER),
    "mb_convert_case TITLE" => mb_convert_case($mbString, MB_CASE_TITLE),
]);

/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);

$mbReplace = $mbString . "O ultimo show do Pink Floyd no Brasil foi íncrivel.";
var_dump([
    "mb_strlen" => mb_strlen($mbReplace),

    "mb_strpos" => mb_strpos($mbReplace, ","),

    "mb_strrpos" => mb_strrpos($mbReplace, ","),

    "mb_substr" => mb_substr($mbReplace, 71 + 2),

    "mb_strstr" => mb_strstr($mbReplace, mb_substr($mbReplace, mb_strrpos($mbReplace, "!") + 2), true),

    "mb_strrchr" => mb_strrchr($mbReplace, "!", true)

]);

$strStr =
    mb_strstr($mbReplace, mb_substr($mbReplace, mb_strrpos($mbReplace, "! ") + 2), true);

$mbStrReplace = $string;
echo "<h1>", $mbStrReplace, "</h1>";
echo "<p>", str_replace("Pink Floyd", "Nirvana", $mbStrReplace), "</p>";
echo "<p>", str_replace(["Pink Floyd", "incrível"], "<span class='tag'> Nirvana </span>", $mbStrReplace),
"</p>";

echo "<p>",
str_replace(
    ["Pink Floyd", "incrível"],
    ["<b class='text_red'> NIRVANA</b>", "<b class='text_red'> ÉPICO</b>"],
    $mbStrReplace
), "</p>";

$article = <<<ROCK
 <article style="border: 4px solid purple"><h3> event</h3><p> description</p><span class="tag">pass</span></article>
 ROCK;

$articleData = [
    "event" => "Rock in Rio",
    "description" => $string,
    "pass" => "R$ 400,00"
];

echo str_replace(array_keys($articleData), array_values($articleData), $article);

fullStackPHPClassSession("parse string", __LINE__);

$endPoint = "name=Marcos Orlando Leão Moreira&email=marcos@zen.ppg.br&age=40";
mb_parse_str($endPoint, $parseEndPoint);

var_dump([
    $endPoint,
    $parseEndPoint
]);

$aluno = new stdClass();
$aluno = (object)$parseEndPoint;
var_dump($aluno);
echo "<p> Olá! Meu nome é {$aluno->name} e meu e-mail é <a href='malito:{$aluno->email}
?subject=Dúvidas&body=Corpo do e-maail www.zen.ppg.br'>{$aluno->email} </a> e eu tenho {$aluno->age} anos </p>";
