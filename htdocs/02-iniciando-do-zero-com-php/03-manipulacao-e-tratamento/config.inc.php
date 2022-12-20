<?php

function dollarNow(){

$dolarToday = file_get_contents('https://dollarhoje.com/');

$table = substr(
    $dolarToday, strpos($dolarToday, '<table class="conversao">'), 
    strpos($dolarToday, '<table>') + 8 - strpos($dolarToday, '<table class=conversao">')

);

$body = explode(
    '</a> <td> <td>', 
    str_replace(["   ", "   ", "   "],
    ' ', 
    mb_strcut($table, strpos($table, '<tbody>'),
    strpos($table, '</tbody>') + 8 - strpos($table, '<tbody>')))
);

$body = array_map('strip_tags', $body);
$body = array_map('trim', $body);

$bodyString = implode(" - ", $body);
$stringToArr = explode("  ", $bodyString);

foreach($stringToArr as $key => $value){
    $cityValue = explode(" - ", $value);


    $cotationNow [] = [
        "city" => $cityValue[0],
        "cotation" => str_replace(['R$', '', ','], ['', '', '.'], $cityValue[1])]
};

return $cotationNow;

};

echo dollarNow();